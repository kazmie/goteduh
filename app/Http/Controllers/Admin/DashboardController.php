<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InsuranceEnrollment;
use App\Models\Insurance;
use App\Models\Company;
use App\Models\Claim;
use App\Models\ClaimType;
use App\Models\User;
use Charts;
use DB;

class DashboardController extends Controller
{
    public function index()
    {
        $enrollments = InsuranceEnrollment::where('status', 2)->where('paid', 1)->paginate(5);

        $RecentClaims = Claim::where('status', 2)->paginate(5);

        $items = array(
            'items'=>$enrollments,
            'item1'=>$RecentClaims,
        );

        $enrollments = InsuranceEnrollment::where('status', 2)->where('paid', 1)->orderBy('created_at', 'DESC')->paginate(5);

        $insurances = InsuranceEnrollment::paginate(5);

        //calculate all sales
        $totalsales = InsuranceEnrollment::where('status', 2)->where('paid', 1)->whereMonth('created_at', '=', date('m'))->sum('amount');

        $items["totalsales"] = $totalsales;

        $countSales = InsuranceEnrollment::where([
            ['status', '=', 2],
        ])->whereMonth('created_at', '=', date('m'))->count();
        $items["countSales"] = $countSales;

        //count all claims
        $countClaims = Claim::where([
            ['status', '=', 2],
        ])->whereMonth('created_at', '=', date('m'))->count();
        $items["countClaims"] = $countClaims;

        $totalClaims = Claim::where([
            ['status', '=', 2],
        ])->whereMonth('created_at', '=', date('m'))->sum('amount');
        $items["totalClaims"] = $totalClaims;

        //count all Product
        $countProduct = Insurance::count();
        $items["countProduct"] = $countProduct;

        //count all Company
        $countCompany = Company::count();
        $items["countCompany"] = $countCompany;

        //count all user
        $countUser = User::count();
        $items["countUser"] = $countUser;

        // $SalesChart = InsuranceEnrollment::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))->where('status','=', 2)->where('paid', 1)->get();
        // $saleschart = Charts::database($SalesChart, 'bar', 'highcharts')
		// 	      ->title("Total Sales Per Month")
		// 	      ->elementLabel("Total Sales")
		// 	      ->dimensions(1000, 500)
		// 	      ->responsive(true)
		// 	      ->groupByMonth(date('Y'), true);

        // $ClaimsChart = Claim::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))->where('status','=', 2)->get();
        // $claimschart = Charts::database($ClaimsChart, 'bar', 'highcharts')
        //   		  ->title("Total Claims Per Month")
        //           ->elementLabel("Total Claims")
        //           ->dimensions(1000, 500)
        //           ->responsive(true)
        //           ->groupByMonth(date('Y'), true);


        // $Claimchart = DB::table('claims')
		// 	     ->join('claim_types', 'claims.claim_type_id', '=', 'claim_types.id')
		// 	     ->select ('claim_types.name as claimsName', DB::raw('count(claim_types.name) as number'), DB::raw('sum(amount) as sums'))
        //          ->where('claims.status', '=', '2')
        //          ->groupBy('claims.claim_type_id')
		// 	     ->get();

        // $Claims_pie_chart = Charts::create('pie', 'highcharts')
        //          ->title('Total Claims Based On Type of Claims')
        //          ->labels($Claimchart->pluck('claimsName'))
		// 		 ->values($Claimchart->pluck('number'))
        //          ->colors(['#9ff288', '#88b9f2', '#bf88f2', '#f288d9', '#f2889f', '#f28888', '#ffca5f'])
		// 		 ->dimensions(1000,500)
		// 		 ->responsive(true);

        // $Insuranceschart = DB::table('insurance_enrollments')
        //  		 ->join('insurances', 'insurance_enrollments.insurance_id', '=', 'insurances.id')
        //          ->join('companies', 'insurances.company_id', '=', 'companies.id')
        //  		 ->select('companies.name as companyName', DB::raw('count(companies.name) as numberCompany'))
        //          ->where('insurance_enrollments.status', '=', '2')
        //          ->where('insurance_enrollments.paid', '=', '1')
        //          ->groupBy('insurance_enrollments.insurance_id')
        //  		 ->get();

        // $Insurances_pie_chart = Charts::create('pie', 'highcharts')
        //          ->title('Total Insurances Based On Companies')
        //          ->labels($Insuranceschart->pluck('companyName'))
		// 		 ->values($Insuranceschart->pluck('numberCompany')) 
        //  		 ->dimensions(1000,500)
        //  		 ->responsive(true);

        return view('admin.dashboard')->with($items);
    }

}
