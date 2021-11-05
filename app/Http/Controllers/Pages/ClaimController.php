<?php

namespace App\Http\Controllers\Pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\InsuranceEnrollment;
use App\Models\InsuranceEnrollmentHeadcount;
use App\Models\Claim;
use App\Models\ClaimType;
use App\Models\ClaimDocumentType;
use App\Models\ClaimDocument;

class ClaimController extends Controller
{
    public function index()
    {
        return view('public.claim.claim');
    }

    public function detail(Request $request)
    {
        $user = User::where([
            ['nric', '=', $request->nric]
        ])->first();

        if (!$user){
            \Session::flash('message', 'NRIC/ID number Not found');
            return redirect()->route('public.claim');
        }

        $enrollment = InsuranceEnrollment::where([
            ['user_id', '=', $user->id],
            ['status', '=', 2],
        ])->orderBy('created_at', 'DESC')->paginate(15);

        $claims = Claim::where([
            ['user_id', '=', $user->id]
        ])->paginate(15);

        $items = array(
            'user' => $user,
            'items' => $enrollment,
            'claims' => $claims
        );
        return view('public.claim.claim-list')->with($items);
    }

    public function new($userId, $id)
    {
        $user = User::find($userId);
        if (!$user){
            \Session::flash('message', 'Product not found');
            return redirect()->route('public.claim');
        }

        $enrollment = InsuranceEnrollment::find($id);
        if (!$enrollment) {
            \Session::flash('message', 'Product not found');
            return redirect()->route('public.claim');
        }

        $headcounts = InsuranceEnrollmentHeadcount::where([
            ['insurance_product_enrollment_id', '=', $enrollment->id]
        ])->get();

        // /var_dump($enrollment->id); return;

        $types = ClaimType::where([
            ['insurance_type_id', '=', $enrollment->insurance->insurance_type_id]
        ])->get();

        $items = array(
            'user' => $user,
            'types' =>$types,
            'enrollment' => $enrollment,
            'headcounts' => $headcounts
        );


        return view('public.claim.new')->with($items);
    }

    public function store(Request $request)
    {
        $claim = new Claim();

        $user = User::find($request->user_id);

        $insurance = InsuranceEnrollment::find($request->id);

        if (($request->accident_date >= $insurance->depart_date && $request->accident_date <= $insurance->return_date))
        {
            $claim->insurance_enrollment_id = $request->id;
            $claim->reference_no = '';
            $claim->user_id = $request->user_id;
            $claim->claim_type_id = $request->type_id;
            $claim->status = 1; //1 = new, 2 = document uploaded, 3 = process, 4 = approved
            $claim->accident_date = $request->accident_date;
            $claim->amount = $request->amount;
            $claim->description = $request->description;
            $claim->bank_account_no = $request->account_no;
            $claim->bank_account_name = $request->account_name;
            $claim->bank_name = $request->bank_name;
            $claim->save();

            $pad_length = 6;
            $pad_char = 0;
            $str_type = 'd'; // treats input as integer, and outputs as a (signed) decimal number

            $format = "%{$pad_char}{$pad_length}{$str_type}"; // or "%04d"
            // output to a variable
            $formatted_str = sprintf($format, $claim->id);
            $claim->reference_no = 'MCL'. $formatted_str;
            $claim->save();

            $types = ClaimDocumentType::where([
                ['claim_type_id', '=', $request->type_id]
            ])->get();

            if ($types) {
                foreach ($types as $item) {
                    $document = new ClaimDocument();
                    $document->claim_id = $claim->id;
                    $document->claim_document_type_id = $item->id;
                    $document->save();
                }
            }
        }

        else {
            \Session::flash('message', 'Choose Accident Date Between Travelled Date Only ');
            return redirect()->back();
        }

        return redirect()->route('public.claim.documents', ['id' => $claim->id]);
    }

    public function uploadDocuments($id)
    {
        $claim = Claim::find($id);

        $user = User::find($claim->user_id);

        $types = ClaimDocumentType::where([
            ['claim_type_id', '=', $claim->claim_type_id]
        ])->get();

        $documents = ClaimDocument::where([
            ['claim_id', '=', $id]
        ])->get();

        $items = array(
            'claim' => $claim,
            'user' => $user,
            'types' => $types,
            'documents' => $documents,
        );
        return view('public.claim.claim-documents')->with($items);
    }

    public function saveDocuments(Request $request)
    {        
        $document = ClaimDocument::where([
            ['claim_id', '=', $request->claim_id],
            ['claim_document_type_id', '=', $request->claim_type_id],
        ])->first();

        if (!$document){
            $document = new ClaimDocument();
        }

        $fileName = "fileName".time().'.'.request()->document->getClientOriginalExtension();
        $request->document->storeAs('public/claim', $fileName);

        $document->claim_id = $request->claim_id;
        $document->claim_document_type_id = $request->claim_type_id;
        $document->filename = $fileName;
        $document->original_filename = $request->document->getClientOriginalName();

        $document->save();

        return redirect()->route('public.claim.documents', [
            'id' => $request->claim_id
        ]);
    }

    public function complete(Request $request) {
        $claim = Claim::find($request->id);
        if ($claim) {
            $claim->status = 2;
            $claim->save();
        }

        return view('public.claim.completed')->with('claim', $claim);
    }


    public function downloadPolicy(Request $request) {

        $claim = Claim::find($request->id);
        if ($claim) {
            $claim->status = 2;
            $claim->save();
        }

        return view('public.claim.completed')->with('claim', $claim);
    }
}
