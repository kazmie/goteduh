<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Beneficiary;
use App\Models\Company;
use App\Models\Country;
use App\Models\CountryRegion;
use App\Models\Insurance;
use App\Models\InsuranceEnrollment;
use App\Models\InsuranceEnrollmentHeadcount;
use App\Models\Package;
use App\Models\Plan;
use App\Models\Region;
use App\Models\User;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Neonexxa\BillplzWrapperV3\BillplzBill;

class HomeController extends Controller
{
    public function password()
    {
        return view('public.password');
    }
    public function index()
    {
        $regions = Region::all();
        $countries = Country::all();
        $plans = Plan::all();

        $items = array(
            'regions' => $regions,
            'plans' => $plans,
            'countries' => $countries,
        );

        if (\Session::has('users')) {
            \Session::forget('items');
            \Session::flush();
        }

        return view('public.home')->with($items);
    }

    public function packages(Request $request)
    {
        //dd($request->all());

        $validated = $request->validate([
            'country_id' => 'required',
            'departure' => 'required',
            'arrival' => 'required',
        ]);

        $country_id = $request->country_id;
        $departure = $request->departure;
        $arrival = $request->arrival;
        $plan = $request->plan;
        $journey = $request->journey;
        $purpose = $request->purpose;

        $adult = $request->adult;
        $child = $request->child;

        $countriesPackage = CountryRegion::where('country_id', $country_id)->first();
        if (!$countriesPackage) {
            \Session::flash('message', 'No package for selected country.');
            return redirect()->route('public.home');
        }

        $today = Carbon::now();
        $dt1 = Carbon::parse($departure);
        $dt2 = Carbon::parse($arrival);
        $noOfDays = $dt1->diffInDays($dt2);
        if ($noOfDays > 31) {
            \Session::flash('message', 'No of days cannot be more than 31 days');
            return redirect()->route('public.home');
        }

        if ($dt1 < $today) {
            \Session::flash('message', 'Departure date must not less than today date');
            return redirect()->route('public.home');
        }

        if ($dt1 >= $dt2) {
            \Session::flash('message', 'Arrival date must not less than departure date');
            return redirect()->route('public.home');
        }

        $noOfWeeks = 0;
        $extraPrice = 0;

        if ($noOfDays > 31) {
            //get no of weeks
            $dt3 = $dt1->addDays(31);
            $noOfWeeks = $dt3->diffInWeeks($dt2) + 1;
        }

        $packageIdArray = array();

        // foreach($countriesPackage as $item)
        // {
        //     array_push($packageIdArray, $item->region_id);
        // }

        if ($countriesPackage) {
            array_push($packageIdArray, $countriesPackage->region_id);
        }

        if ($noOfDays > 31) {
            $packages = Package::join('package_extras', function ($join) {
                $join->on('packages.insurance_id', '=', 'package_extras.insurance_id')
                    ->on('packages.plan_id', '=', 'package_extras.plan_id');
            }
            )->join('insurances', function ($join) {
                $join->on('insurances.id', '=', 'package_extras.insurance_id')
                    ->on('insurances.id', '=', 'packages.insurance_id');
            })->where([['insurances.status', '=', '1']])
                ->select('*')->whereIn('package_extras.region_id', $packageIdArray)->where([
                // ['packages.region_id', '=', $region_id],
                ['packages.plan_id', '=', $plan],
                ['to_day', '=', 31]])
                ->get();

            for ($i = 0; $i < $packages->count(); $i++) {
                $newPrice = $packages[$i]->price + ($packages[$i]->price_extra * $noOfWeeks);
                $packages[$i]->price = $newPrice;
            }

        } else {
            $packages = Package::with('plan', 'categoryplan')->where('from_day', '<', $noOfDays)
                ->where('to_day', '>', $noOfDays)
                ->where('plan_id', $request->plan)                      
                ->get();
            //$packages = Package::all();
            //     $packages = Insurance::join('packages', 'packages.insurance_id', '=', 'insurances.id')
            // ->where([
            //     ['plan_id', '=', $plan],
            //     ['from_day', '<=', $noOfDays],
            //     ['to_day', '>=', $noOfDays],
            //     ['insurances.status', '=', '1'],
            // ])
            // ->whereIn('region_id', $packageIdArray)
            // ->get();

        }

        
        $items = array(
            'region_id' => $countriesPackage->region_id,
            //'region' => $region,
            // 'region_name' => $region->name,
            'departure' => $departure,
            'arrival' => $arrival,
            'noOfDays' => $noOfDays,
            'plan' => $plan,
            'journey' => $journey,
            'purpose' => $purpose,
            'adult' => $adult,
            'child' => $child,
            'packages' => $packages,
            'noOfWeeks' => $noOfWeeks,
        );

        //dd($items);
        \Session::put('plans', $items);
        return view('public.packages')->with($items);
    }

    public function filterPackages(Request $request)
    {
        $items = \Session::get('plans');
        if ($items['noOfDays'] <= 31) {
            if ($request->priceOrder) {
                $items['order'] = $request->priceOrder;
                $packages = Package::where([
                    ['region_id', '=', $items['region_id']],
                    ['plan_id', '=', $items['plan']],
                    ['from_day', '<=', $items['noOfDays']],
                    ['to_day', '>=', $items['noOfDays']],
                ])->orderBy('price', $request->priceOrder)->get();
            } else {
                $packages = Package::where([
                    ['region_id', '=', $items['region_id']],
                    ['plan_id', '=', $items['plan']],
                    ['from_day', '<=', $items['noOfDays']],
                    ['to_day', '>=', $items['noOfDays']],
                ])->get();
            }
        } else {
            if ($request->priceOrder) {
                $packages = Package::join('package_extras', function ($join) {
                    $join->on('packages.insurance_id', '=', 'package_extras.insurance_id')
                        ->on('packages.region_id', '=', 'package_extras.region_id')
                        ->on('packages.plan_id', '=', 'package_extras.plan_id');
                })
                    ->select('*')
                    ->where([
                        //['packages.region_id', '=', $items['region_id']],
                        ['packages.plan_id', '=', $items['plan']],
                        ['to', '=', 31]])
                    ->orderBy('price', $request->priceOrder)
                    ->get();
            } else {
                $packages = Package::join('package_extras', function ($join) {
                    $join->on('packages.insurance_id', '=', 'package_extras.insurance_id')
                        ->on('packages.region_id', '=', 'package_extras.region_id')
                        ->on('packages.plan_id', '=', 'package_extras.plan_id');
                })
                    ->select('*')
                    ->where([
                        ['packages.region_id', '=', $items['region_id']],
                        ['packages.plan_id', '=', $items['plan']],
                        ['to', '=', 31]])
                    ->get();
            }

            for ($i = 0; $i < $packages->count(); $i++) {
                $newPrice = $packages[$i]->price + ($packages[$i]->price_extra * $items['noOfWeeks']);
                $packages[$i]->price = $newPrice;
            }

        }

        $items['packages'] = $packages;

        \Session::put('plans', $items);

        return view('public.packages')->with($items);
    }

    public function details(Request $request)
    {
        $items = \Session::get('plans');

        $items['price'] = $request->price;
        $items['insurance_id'] = $request->insurance_id;
        $items['package_id'] = $request->package_id;

        \Session::put('plans', $items);
        $details = array(
            'items' => $items,
            'user' => new User(),
        );
        return view('public.personal-details')->with($details);
    }

    public function searchNric(Request $request)
    {
        $user = User::where([
            ['nric', '=', $request->searchNric],
        ])->first();

        if (!$user) {
            $user = new User();
        }
        $items = \Session::get('plans');
        $details = array(
            'items' => $items,
            'user' => $user,
        );

        return view('public.personal-details')->with($details);
    }

    public function payment(Request $request)
    {

        $items = \Session::get('plans');

        //dd($items);

        $user = User::where([
            ['nric', '=', $request->nric],
        ])->first();

        if (!$user) {
            print_r('user not found');
            $user = new User();
        }

        $user->name = $request->name;
        $user->nric = $request->nric;
        $user->email = $request->email;
        $user->contact = $request->contact;
        $user->passport = '';
        $user->gender = $request->gender;
        $user->address = $request->address1;
        $user->address2 = $request->address2;
        $user->city = $request->city;
        $user->state = $request->state;
        $user->postcode = $request->postcode;
        $user->birthdate = $request->birthdate;

        $user->password = '';
        $user->remember_token = '';
        $user->image_url = '';
        $user->image_url_thumb = '';
        $user->save();

        $items['user_id'] = $user->id;

        \Session::put('users', $user);

        $enrollment = new InsuranceEnrollment();

        // print_r($items['departure']);
        // print_r($items['arrival']);
        // return;

        $dt1 = Carbon::parse($items["departure"]);
        $dt2 = Carbon::parse($items["arrival"]);

        $enrollment->policy_no = $request->nric . "-" . date("y");
        $enrollment->user_id = $user->id;
        $enrollment->reference_no = '';
        $enrollment->group = '';
        $enrollment->insurance_id = $items['insurance_id'];
        $enrollment->package_id = $items['package_id'];
        $enrollment->depart_date = $dt1->toDateString();
        $enrollment->return_date = $dt2->toDateString();
        $enrollment->status = 2;
        $enrollment->amount = $items['price'];
        $enrollment->country_id = 0; //$items['region_id'];
        $enrollment->region_id = $items['region_id'];
        $enrollment->plan_coverage = $items['plan'];
        $enrollment->journey_type = $items['journey'];
        $enrollment->purpose = $items['purpose'];
        $enrollment->save();

        $items['enrollment_id'] = $enrollment->id;
        \Session::put('plans', $items);

        if ($items['adult'] > 1) {
            for ($i = 0; $i < $items['adult'] - 1; $i++) {
                $adult = new InsuranceEnrollmentHeadcount();
                $adult->insurance_product_enrollment_id = $enrollment->id;
                $adult->name = $request->adultName[$i];
                $adult->nric = $request->adultNric[$i];
                $adult->passport_no = '';
                $adult->gender = $request->adultGender[$i];
                $adult->birth_date = $request->adultBirthdate[$i];
                $adult->type = 'A';
                $adult->save();
            }
        }

        if ($items['child'] > 0) {
            for ($i = 0; $i < $items['child']; $i++) {
                $child = new InsuranceEnrollmentHeadcount();
                $child->insurance_product_enrollment_id = $enrollment->id;
                $child->name = $request->childName[$i];
                $child->nric = $request->childNric[$i];
                $child->passport_no = '';
                $child->gender = $request->childGender[$i];
                $child->birth_date = $request->childBirthdate[$i];
                $child->type = 'C';
                $child->save();
            }
        }

        $beneficiary = new Beneficiary();
        $beneficiary->insurance_enrollment_id = $enrollment->id;
        $beneficiary->name = $request->nextOfKinName;
        $beneficiary->nric = '';
        $beneficiary->contact_no = $request->nextOfKinContact;
        $beneficiary->save();

        $insurance = Insurance::find($items["insurance_id"]);
        $items["insurance"] = $insurance;

        //dd($items);
        return view('public.payment')->with($items);
        //return view('public.completed');
    }

    public function beneficiary(Request $request)
    {
        $items = \Session::get('plans');

        return view('public.beneficiary')->with($items);
    }

    public function openPayment(Request $request)
    {
        //dd($request->all());
        $items = \Session::get('plans');
        //dd($items);
        $user = User::find($items['user_id']);
        $insurance = Insurance::find($items['insurance_id']);
        //$insurance = Insurance::find($items['file_url']);
        //var_dump($items);

        $enrollment = InsuranceEnrollment::findOrFail($items['enrollment_id']);
        // from the guide
        $res0 = new BillplzBill;
        $res0->collection_id = 'midkwptu';
        //$res0->collection_id = 'nux9bhzn'; //sandbox
        $res0->description = $insurance->name;
        $res0->email = $user->email;
        $res0->name = $user->name;
        $res0->amount = $items['price'] * 100;
        //$res0->amount = 1 * 100; //debug
        $res0->callback_url = url("/payment/result");
        $res0->redirect_url = url("/payment/result");
        $res0->reference_1 = $insurance->id;
        $result = $res0->create_bill();
        //dd($result);
        list($rhead, $rbody) = explode("\n\r\n", $result);
        $bplz_result = json_decode($rbody);
        //dd($bplz_result);
        $enrollment->trans_id = $bplz_result->id;
        $enrollment->save();
        return redirect($bplz_result->url);
        //return view('public.completed');
    }

    public function paymentRedirect(Request $request)
    {

        //https://myteduh.com/payment/result?billplz[id]=li0i7o7d
        //http://localhost:8000/payment/result?billplz[id]=fd0uxvk2
        //var_dump("payment_id : " . $request->billplz['id']); return;
        //http://localhost:8000/payment/result?billplz[id]=iwhrovkp
        //$items = \Session::get('plans');

        $paymentId = $request->billplz['id'];
        $res = new BillplzBill;
        $res->bill_id = $paymentId;
        $res = $res->get_bill();

        list($rhead, $rbody) = explode("\n\r\n", $res);
        $result = json_decode($rbody);
        //dd($result);
        if (!$result->paid) {
            $enrollment = InsuranceEnrollment::find($result->reference_1);
            if ($enrollment)
               $enrollment->delete();

            return view('public.layouts.error');
        }
        //dd($result);

        $enrollment = InsuranceEnrollment::where('trans_id', $result->id)->first();
        if (!$enrollment) {
            return view('public.layouts.error');
        }

        $policyRunning = InsuranceEnrollment::where([
            ['user_id', '=', $enrollment->user_id],
            ['status', '=', 2],
        ])->count();

        $pad_length = 2;
        $pad_char = 0;
        $str_type = 'd'; // treats input as integer, and outputs as a (signed) decimal number

        $format = "%{$pad_char}{$pad_length}{$str_type}"; // or "%04d"
        $formatted_str = sprintf($format, $policyRunning + 1);
        $enrollment->policy_no = $enrollment->policy_no . $formatted_str;
        $enrollment->trans_id = $result->id;
        $enrollment->status = 2;
        $enrollment->paid = 1;
        //dd($enrollment);
        //$enrollment->save();

        $user = User::find($enrollment->user_id);

        $to_name = $user->name;
        $to_email = $user->email;
        $data = array(
            'name' => $user->name,
            'body' => 'Thank you for believe with MyTeduh',
            'policy_no' => $enrollment->policy_no,
            'url' => 'http://goteduh.com/claims',
        );
        Mail::send('public.emails.success-policy', $data, function ($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                ->subject('Thank your for subscribing with GoTeduh');
            $message->from('support@goteduh.com', 'GoTeduh');
        });

        return redirect()->route('public.completed');
    }

    public function completePayment()
    {
        return view('public.completed');
    }

    public function paymentResult(Request $request)
    {
        $items = \Session::get('plans');

        if ($request->paid == 'false') {
            print_r('payment not successfull');
            return;
        }

        $enrollment = InsuranceEnrollment::find($request->reference_1);
        if (!$enrollment) {
            return view('public.layouts.error');
        }

        $policyRunning = InsuranceEnrollment::where([
            ['user_id', '=', $enrollment->user_id],
            ['status', '=', 2],

        ])->count();

        $pad_length = 2;
        $pad_char = 0;
        $str_type = 'd'; // treats input as integer, and outputs as a (signed) decimal number

        $format = "%{$pad_char}{$pad_length}{$str_type}"; // or "%04d"
        $formatted_str = sprintf($format, $policyRunning + 1);
        $enrollment->policy_no = $enrollment->policy_no . $formatted_str;
        $enrollment->trans_id = $request->id;
        $enrollment->status = 2;
        $enrollment->paid = 1;
        $enrollment->save();

        $user = User::find($enrollment->user_id);

        $to_name = $user->name;
        $to_email = $user->email;
        $data = array('name' => $user->name, 'policy_no' => $enrollment->policy_no);
        Mail::send('public.emails.success-policy', $data, function ($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                ->subject('Thank your for subscribing with MyTeduh');
            $message->from('support@myteduh.com', 'MyTeduh');
        });

        return view('public.completed');

        //return view('public.beneficiary')->with($items);
    }

    public function storeBenificiary(Request $request)
    {
        $items = \Session::get('plans');

        $enrollment = InsuranceEnrollment::find($items['enrollment_id']);
        if (!$enrollment) {
            return view('public.layouts.error');
        }
        $user = User::find($enrollment->user_id);

        $beneficiary = new Beneficiary();
        $beneficiary->insurance_enrollment_id = $items['enrollment_id'];
        $beneficiary->name = $request->name;
        $beneficiary->nric = $request->nric;
        $beneficiary->contact_no = $request->contact;
        $beneficiary->save();

        //var_dump($user);
        $to_name = $user->name;
        $to_email = $user->email;
        $data = array('name' => $user->name, 'body' => 'test mail');
        Mail::send('public.emails.success-policy', $data, function ($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                ->subject('Thank your for subscribing with MyTeduh');
            $message->from('support@myteduh.com', 'MyTeduh');
        });

        return view('public.completed');
    }

    public function policyDownload(Request $request)
    {

        $items = \Session::get('plans');
        //dd($items);
        //for user details
        $user = User::findOrFail($items['user_id']);
        $items["user"] = $user;

        //for enrollment details
        $product = InsuranceEnrollment::find($items["enrollment_id"]);
        $items["product"] = $product;

        //for headcounts details
        $package = Package::find($items["package_id"]);
        $items["package"] = $package;

        $region = Region::find($package->region_id);
        $items["region"] = $region;

        // $headcounts1 = Plan::find($package["plan_id"]);
        // $items["headcounts1"] = $headcounts1;

        //for company details
        $insurance = Insurance::find($items["insurance_id"]);
        $items["insurance"] = $insurance;

        $company = Company::find($insurance["company_id"]);
        $items["company"] = $company;

        //cari headcounts details

        $headcounts = DB::table('insurance_enrollment_headcounts')
            ->where('insurance_product_enrollment_id', '=', $items["enrollment_id"])
            ->get();

        $items["headcounts"] = $headcounts;

        return view('public.policy')->with($items);
    }

}
