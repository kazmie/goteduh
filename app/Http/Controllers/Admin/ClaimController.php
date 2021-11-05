<?php

namespace App\Http\Controllers\Admin;

use App\Models\Claim;
use App\Models\Company;
use App\Models\InsuranceEnrollment;
use App\Models\User;
use App\Exports\ClaimExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use DB;
use Carbon\Carbon;

class ClaimController extends Controller
{
    public function index()
    {
        $claims = Claim::paginate(15);

        $items = array(
            'from_day' => '',
            'to_day' => '',
            'claims' => $claims,
        );
        return view('admin.claim.home')->with($items);
    }

    public function view($id)
    {
        $claims = Claim::find($id);

        $items = array(
            'claims' => $claims,
        );

            \Session::put('claims', $claims);
        return view('admin.claim.view')->with($items);
    }

    public function updateStatus(Request $request)
    {
        $claims = Claim::findOrFail($request->id);

        if ($claims) {
            $claims->status = $request->status;
            $claims->remarks = $request->remarks;
            $claims->save();

            $this->sendEmailNotification($claims);
            \Session::flash('message', 'Claim status updated');
        }
        else {
            \Session::flash('message', 'Failed to update claim status');
        }

            \Session::put('claims', $claims);
        return redirect()->route('admin.claim');
    }

    public function filterClaims(Request $request) {

        $claims = Claim::paginate(15);

        if ($request->status > 0){
            $claims = Claim::where("status", $request->status)->paginate(15);
        }

        $items = array(
            'from_day' => '',
            'to_day' => '',
            'claims' => $claims,
        );
        return view('admin.claim.home')->with($items);
    }


    private function sendEmailNotification($item)
    {
        $user = User::find($item->user_id);
        $sendEmail = false;

        if ($user) {
            $to_name = $user->name;
            $to_email = $user->email;
            $reference_no = $item->reference_no;

            if ($item->status == 3) {
                $data = array(
                    "name" => $to_name,
                    "body" => "Your claim accepted for PROCESSING. Thank you for using MyTeduh",

                );
                $sendEmail = true;
            }
            else if ($item->status == 4) {
                $data = array(
                    "name" => $to_name,
                    "body" => "Your claim have been APPROVED. Thank you for using MyTeduh",

                );

                $sendEmail = true;
            }
            else if ($item->status == 99) {
                $data = array(
                    "name" => $to_name,
                    "body" => "Your claim have been REJECTED. " . $item->remarks . ". Thank you for using MyTeduh",
                );
                $sendEmail = true;
            }

            if ($sendEmail) {
                Mail::send("admin.mail.notification", $data, function ($message) use ($to_name, $to_email) {
                    $message->to($to_email, $to_name)
                        ->subject("Claim Status");
                    $message->from("support@joompe.com", "MyTeduh");
                });
            }
        }
    }

    public function exportClaims(Request $request) {

        $claims = Claim::where('status', 2);

        if (isset($request->from1) && isset($request->to1))
        {
            $claims = Claim::where('status', 2)->whereBetween('created_at', [$this->from, $this->to]);
        }

        //$enrollments->update(['exported' => 1]);

        return (new ClaimExport)->data($claims->get())->download('claims' . Carbon::now('GMT+8'). '.xlsx');
    }


        public function makeExportedClaim(Request $request) {
            return view('admin.claims.mark-exported');
        }

        public function claimpolicyDownload(Request $request)
        {
            $items = \Session::get('claims');


            return view('admin.claim.claimpolicy')->with('claims', $items);
        }
}
