<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\CountryRegion;
use App\Models\Package;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $countries = Country::all();
        return view('public.welcome', compact('countries'));
    }

    public function quote(Request $request)
    {
        $request->validate([
            'country' => 'required',
            'from' => 'required',
            'to' => 'required',
        ]);

        $countriesPackage = CountryRegion::where('country_id', $request->country)->first();
        if (!$countriesPackage) {
            \Session::flash('message', 'No package for selected country.');
            return redirect()->route('public.home');
        }

        $today = Carbon::now();
        $dt1 = Carbon::parse($request->from);
        $dt2 = Carbon::parse($request->to);
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
            $packages = Package::where('from_day', '<', $noOfDays)
                ->where('to_day', '>', $noOfDays)
                ->where('category_plan_id', $request->plan)
                ->get();
        }
        $items = array(
            'region_id' => $countriesPackage->region_id,
            //'region' => $region,
            // 'region_name' => $region->name,
            'from' => $request->from,
            'to' => $request->to,
            'noOfDays' => $noOfDays,
            'plan' => $request->plan,
            // 'journey' => $journey,
            // 'purpose' => $purpose,
            // 'adult' => $adult,
            // 'child' => $child,
            'packages' => $packages,
            'noOfWeeks' => $noOfWeeks,
        );

        \Session::put('plans', $items);
        return view('public.quote')->with($items);
    }

    function detailForm($id) {
        return view('public.detail');
    }
}
