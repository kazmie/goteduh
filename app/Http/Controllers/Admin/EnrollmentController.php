<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InsuranceEnrollment;
use Illuminate\Http\Request;

use App\Exports\InsuranceEnrollmentExport;
use Maatwebsite\Excel\Facades\Excel;

use App\Models\Insurance;
use App\Models\ExportGroup;
use DB;
use Input;

use Carbon\Carbon;

class EnrollmentController extends Controller
{
    public function index() {
        $enrollments = InsuranceEnrollment::where('status', '=', 2)->where('paid', '1')->orderBy('created_at', 'DESC')->paginate(10);

        $insurances = Insurance::all();

        $items = array(
            'items' => $enrollments,
            'insurances' => $insurances,
            'insurance_id' => '',
            'exported' => '',
            'from_day' => '',
            'to_day' => ''
        );
        return view('admin.insurance.sales.home')->with($items);
    }

    public function view($id)
    {

        $enrollment = InsuranceEnrollment::find($id);

        return view('admin.insurance.sales.view')->with('enrollment', $enrollment);
    }

    public function filterDate(Request $request)
    {
        $insurances = Insurance::all();
        $from_day = $request->from_day;
        $to_day = $request->to_day;
        $insurance_id = $request->insurance_id;
        $exported = $request->exported;

        $dateType = $request->date_type;

        if($dateType = 1) {
        $travelleddate = InsuranceEnrollment::where('status', '=', 2)
            ->where("insurance_id", $insurance_id)
            ->whereBetween('depart_date', [$from_day, $to_day])
            ->orderBy('depart_date', 'DESC')
            ->paginate(10);

            $items = array(
                'items' => $travelleddate,
                'insurances' => $insurances,
                'insurance_id' => $insurance_id,
                'exported' => $exported,
                'from_day' => $from_day,
                'to_day' => $to_day,
            );

        } else {
        //function issued date
        $issueddate = InsuranceEnrollment::where('status', '=', 2)
            ->where("insurance_id", $insurance_id)
            ->whereBetween('created_at', [$from_day, $to_day])
            ->orderBy('created_at', 'DESC')
            ->paginate(10);

            $items = array(
                'items' => $issueddate,
                'insurances' => $insurances,
                'insurance_id' => $insurance_id,
                'exported' => $exported,
                'from_day' => $from_day,
                'to_day' => $to_day,
            );
        }

        return view('admin.insurance.sales.home')->with($items);
    }

    public function exportSales(Request $request) {
        $policyIds = preg_split ('/\,/', $request->policy_id);
        //dd($policyIds);
        $enrollments = InsuranceEnrollment::whereIn('id', $policyIds)->latest();
        return (new InsuranceEnrollmentExport)->data($enrollments->get())->download('product_enrollment ' . Carbon::now('GMT+8'). '.xlsx');
    }

    public function makeExported(Request $request) {
        if ($request->id){
            $enrollments = InsuranceEnrollment::whereIn('id', $request->id)->latest()->get();
            return view('admin.insurance.sales.mark-exported')->with('enrollments',$enrollments);
        }
        \Session::flash('No policy numbers selected');
        return redirect()->back();      
    }

    public function Exported(Request $request) {        
        $total = 0;
        $exportGroup = new ExportGroup();
        $exportGroup->name = $request->name;
        $exportGroup->save();
        $policyIds = preg_split ('/\,/', $request->policy_id);
        $policyNumbers = preg_split ('/\,/', $request->policy_no);
        
        foreach ($policyIds as $policyId) {
            $enrollment = InsuranceEnrollment::find($policyId);
            if ($enrollment){
                $enrollment->exported = 1;
                $enrollment->group_id = $exportGroup->id;
                $enrollment->save();
                $total++;
            }            
        }
        $exportGroup->total_record = $total;
        $exportGroup->save();

        \Session::flash('message', $total . ' policy number is successfully exported');
        return redirect()->route('admin-insurance.sales');        
    }
}
