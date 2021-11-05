<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Insurance;
use App\Models\Company;
use App\Models\InsuranceBenefitType;
use App\Models\InsuranceProductBenefit;
use App\Models\Region;
use App\Models\Plan;
use App\Models\CategoryPlan;
use DB;
use App\Models\Package;
use App\Models\PackageExtra;
use App\Models\InsuranceType;
use App\Models\Country;
use App\Models\CountryPackage;
use App\Models\CountryPackageExtra;

class InsuranceController extends Controller
{
    public function index() {

        $items = Insurance::paginate(15);
        return view('admin.insurance.home')->with('items', $items);
    }

    public function create(){

        $items = Company::all();
        $types = InsuranceType::all();
        $items = array(
            'items'=>$items,
            'types'=>$types

        );
        return view('admin.insurance.new')->with($items);
    }

    public function store(Request $request)
    {
        $item = new Insurance();

        $item->name = $request->name;
        $item->description = $request->description;
        $item->short_description = $request->description;
        $item->company_id = $request->company;
        $item->takaful = $request->takaful;
        $item->insurance_type_id = $request->type;
        $item->status = 1;

        if ($request->product_disclosure == null){
            $item->file_url = "No Product Disclosure Uploaded";
        }
        else {
            $fileName = "Product Disclosure: " . time() . '.' . request()->product_disclosure->getClientOriginalExtension();
            $request->product_disclosure->storeAs('public', $fileName);
            $item->file_url = $fileName;
        }
        $item->save();

        \Session::flash('message', 'New insurance product successfully added');
        return redirect()->route('admin-insurance-product');

    }

    public function edit($id) {
        $item = Insurance::findOrFail($id);
        $types = InsuranceBenefitType::all();

        $benefits = InsuranceProductBenefit::where([
            ['insurance_id', '=' , $id],
        ])->get();

        $regions = Region::where([
            ['id', '=' , $id],
        ])->get();

        $plans = Plan::all();

        $packages = Package::where([
            ['insurance_id', '=' , $id],
        ])->get();

        $items = array(
            'product' => $item,
            'types' => $types,
            'benefits' => $benefits,
            'regions' => $regions,
            'plans'=> $plans,
            'packages' => $packages
        );
        return view('admin.insurance.edit')->with($items);
    }

    public function update(Request $request)
    {
        $item = Insurance::find($request->id);

        $item->name = $request->name;
        $item->description = $request->description;
        $item->short_description = $request->description;
        //$item->status = $request->status;
        if ($request->product_disclosure) {
            $fileName = "Product Disclosure: " . time() . '.' . request()->product_disclosure->getClientOriginalExtension();
            $request->product_disclosure->storeAs('public', $fileName);
            $item->file_url = $fileName;
        }

        $item->save();

        \Session::flash('message', 'New insurance product successfully updated');
        return redirect()->route('admin-insurance-product');

    }

    public function changeStatus(Request $request)
 {
    $item = Insurance::findOrFail($request->id);
     $item->status = $request->status;
     $item->save();

     return response()->json(['success'=>'Status change successfully.']);
 }

    public function deleteProduct(Request $request){
        $item = Insurance::findOrFail($request->id);
        if ($item != null){
            $item->delete();
        }

        \Session::flash('message', 'Insurance product successfully deleted');
        return response()->json(['message'=> 'success']);
    }


    public function showBenefit($id)
    {
        $item = Insurance::findOrFail($id);
        $types = InsuranceBenefitType::all();
        $categoryplans = CategoryPlan::all();
        $plans = Plan::all();

        $benefits = InsuranceProductBenefit::where([
            ['insurance_id', '=' , $id],
        ])->get();


        $items = array(
            'product' => $item,
            'types' => $types,
            'benefits' => $benefits,
            'categoryplans'=> $categoryplans,
            'plans'=> $plans,
        );
        return view('admin.insurance.add-benefit')->with($items);
    }

    public function editBenefit($product_id, $id)
    {
        $item = Insurance::findOrFail($product_id);
        $types = InsuranceBenefitType::all();
        $categoryplans = CategoryPlan::all();
        $plans = Plan::all();
        $benefits = InsuranceProductBenefit::find($id);

        $items = array(
            'product_id' => $product_id,
            'product' => $item,
            'types' => $types,
            'benefits' => $benefits,
            'categoryplans'=> $categoryplans,
            'plans'=> $plans,
        );
        return view('admin.insurance.edit-benefit')->with($items);
    }

    public function updateBenefit(Request $request)
    {
        $item = InsuranceProductBenefit::find($request->id);
        $item->insurance_benefit_type_id = $request->benefit_id;
        $item->category_plan_id = $request->category_plan_id;
        $item->plan_id = $request->plan_id;
        $item->value = $request->value;
        \Session::flash('message', 'Insurance product benefit successfully updated');
        $item->save();

        return redirect()->route('admin-insurance-product-show-benefit', $request->product_id);
    }

    public function addBenefit(Request $request)
    {
        $item = new InsuranceProductBenefit();
        $item->insurance_id = $request->id;
        $item->insurance_benefit_type_id = $request->benefit_id;
        $item->category_plan_id = $request->category_plan_id;
        $item->plan_id = $request->plan_id;
        $item->value = $request->value;
        \Session::flash('message', 'Insurance product benefit successfully added');
        $item->save();

        return redirect()->route('admin-insurance-product-show-benefit', $request->id);
    }


    public function deleteBenefit(Request $request){
        $item = InsuranceProductBenefit::findOrFail($request->id);
        if ($item != null){
            $item->delete();
        }
        \Session::flash('message', 'Insurance product benefit successfully deleted');
        return response()->json(['message'=> 'success']);
    }


    public function showPackage($id)
    {
        $product = Insurance::findOrFail($id);

        $regions = Region::all();

        $plans = Plan::all();

        $countryregions = DB::table('packages')
                     ->select('countries.name')
                     ->join('regions', 'packages.region_id', '=', 'regions.id')
                     ->join('country_region', 'regions.id', '=', 'country_region.region_id')
                     ->join('countries', 'country_region.country_id', '=', 'countries.id')
                     ->where('regions.id', '=', $id)
                     ->get();

        $categoryplans = CategoryPlan::all();

        $countries = Country::all();

        $packages = Package::where([
            ['insurance_id', '=' , $id],
        ])->with("categoryplan")->orderBy('from_day', 'asc')->get();

        $packageExtras = PackageExtra::where([
            ['insurance_id', '=' , $id],
        ])->get();

        $items = array(
            'product' => $product,
            'regions' => $regions,
            'plans'=> $plans,
            'categoryplans'=> $categoryplans,
            'packages' => $packages,
            'packageExtras' => $packageExtras,
            'countries' => $countries,
        );

        //dd($packages); return;
        return view('admin.insurance.add-package')->with($items);
    }

    public function editPackage($product_id, $id)
    {
        $countries = Country::all();
        $categoryplans = CategoryPlan::all();

        $packages1 = DB::table('packages')
                     ->select('countries.name')
                     ->join('country_packages', 'packages.id', '=', 'country_packages.package_id')
                     ->join('countries', 'country_packages.country_id', '=', 'countries.id')
                     ->where('packages.id', '=', $id)
                     ->get();

        $countriesPackage = CountryPackage::all();
        $regions = Region::all();
        $plans = Plan::all();
        $packages = Package::find($id);
        $items = array(
            'product_id' => $product_id,
            'regions' => $regions,
            'plans'=> $plans,
            'packages' => $packages,
            'countries' => $countries,
            'categoryplans'=> $categoryplans,
            'countriesPackage' => $countriesPackage,
            'items' => $packages1,

        );


        return view('admin.insurance.edit-package')->with($items);
    }

    public function editPackageExtra($product_id, $id)
    {
        $countries = Country::all();
        $categoryplans = CategoryPlan::all();

        $packages1 = DB::table('packages')
                     ->select('countries.name')
                     ->join('country_packages', 'packages.id', '=', 'country_packages.package_id')
                     ->join('countries', 'country_packages.country_id', '=', 'countries.id')
                     ->where('packages.id', '=', $id)
                     ->get();

        $countriesPackage = CountryPackage::all();
        $regions = Region::all();
        $plans = Plan::all();
        $packages = PackageExtra::find($id);
        $items = array(
            'product_id' => $product_id,
            'regions' => $regions,
            'plans'=> $plans,
            'packages' => $packages,
            'countries' => $countries,
            'categoryplans'=> $categoryplans,
            'countriesPackage' => $countriesPackage,
            'items' => $packages1,

        );


        return view('admin.insurance.edit-packageExtra')->with($items);
    }


        public function duplicate($product_id, $id)
        {
            $countries = Country::all();
            $countriesPackage = CountryPackage::all();
            $regions = Region::all();
            $categoryplans = CategoryPlan::all();
            $plans = Plan::all();
            $packages = Package::find($id);
            $packages1 = DB::table('packages')
                         ->select('countries.name')
                         ->join('country_packages', 'packages.id', '=', 'country_packages.package_id')
                         ->join('countries', 'country_packages.country_id', '=', 'countries.id')
                         ->where('packages.id', '=', $id)
                         ->get();

            $items = array(
                'product_id' => $product_id,
                'regions' => $regions,
                'plans'=> $plans,
                'packages' => $packages,
                'categoryplans'=> $categoryplans,
                'countries' => $countries,
                'items' => $packages1,

            );
            return view('admin.insurance.duplicate-package')->with($items);

        }
        public function duplicateExtra($product_id, $id)
        {
            $countries = Country::all();
            $countriesPackage = CountryPackage::all();
            $regions = Region::all();
            $categoryplans = CategoryPlan::all();
            $plans = Plan::all();
            $packages = PackageExtra::find($id);
            $packages1 = DB::table('packages')
                         ->select('countries.name')
                         ->join('country_packages', 'packages.id', '=', 'country_packages.package_id')
                         ->join('countries', 'country_packages.country_id', '=', 'countries.id')
                         ->where('packages.id', '=', $id)
                         ->get();

            $items = array(
                'product_id' => $product_id,
                'regions' => $regions,
                'plans'=> $plans,
                'packages' => $packages,
                'categoryplans'=> $categoryplans,
                'countries' => $countries,
                'items' => $packages1,

            );
            return view('admin.insurance.duplicate-packageExtra')->with($items);

        }

        public function saveDuplicate(Request $request)
        {
            $item = new Package();
            $item->insurance_id = $request->id;
            $item->region_id = $request->region_id;
            //$item->region_id = -1;
            $item->plan_id = $request->plan_id;
            $item->category_plan_id = $request->category_plan_id;
            $item->from_day = $request->from_day;
            $item->to_day = $request->to_day;
            $item->price = $request->price;
            $item->description = $request->description;

            \Session::flash('message', 'Insurance product package successfully duplicated');
            $item->save();
            $id = $item->id;

            return redirect()->route('admin-insurance-product');
        }

        public function saveDuplicateExtra(Request $request)
        {
            $item = new PackageExtra();
            $item->insurance_id = $request->id;
            $item->region_id = $request->region_id;
            //$item->region_id = -1;
            $item->plan_id = $request->plan_id;
            $item->category_plan_id = $request->category_plan_id;
            $item->price_extra = $request->price;
            $item->description = $request->description;

            \Session::flash('message', 'Insurance product package successfully duplicated');
            $item->save();
            $id = $item->id;

            return redirect()->route('admin-insurance-product');
        }


    public function updatePackage(Request $request)
    {
        $item = Package::find($request->id);

        $item->region_id = $request->region_id;
        //$item->region_id = -1;
        $item->plan_id = $request->plan_id;
        $item->category_plan_id = $request->category_plan_id;
        $item->from_day = $request->from_day;
        $item->to_day = $request->to_day;
        $item->price = $request->price;
        $item->description = $request->description;
        $item->save();
        $id = $item->id;

        // CountryPackage::where([
        //      ['package_id', '=' , $id]
        //  ])->delete();


        \Session::flash('message', 'Insurance product package successfully updated');
        return redirect()->route('admin-insurance-product-show-package', $request->product_id);
    }

    public function updatePackageExtra(Request $request)
    {
        $item = PackageExtra::find($request->id);

        $item->region_id = $request->region_id;
        //$item->region_id = -1;
        $item->plan_id = $request->plan_id;
        $item->category_plan_id = $request->category_plan_id;
        $item->price_extra = $request->price;
        $item->description = $request->description;
        $item->save();
        $id = $item->id;

        // CountryPackage::where([
        //      ['package_id', '=' , $id]
        //  ])->delete();


        \Session::flash('message', 'Insurance product package successfully updated');
        return redirect()->route('admin-insurance-product-show-package', $request->product_id);
    }

    public function addPackage(Request $request)
    {
        $item = new Package();
        $item->insurance_id = $request->id;
        $item->region_id = $request->region_id;
        //$item->region_id = -1;
        $item->plan_id = $request->plan_id;
        $item->category_plan_id = $request->category_plan_id;
        $item->from_day = $request->from_day;
        $item->to_day = $request->to_day;
        $item->price = $request->price;
        $item->description = $request->description;

        \Session::flash('message', 'Insurance product package successfully added');
        $item->save();
        $id = $item->id;


        return redirect()->route('admin-insurance-product-show-package', $request->id);
    }

    public function addPackageExtra(Request $request)
    {
        $item = new PackageExtra();
        $item->insurance_id = $request->id;
        $item->region_id = $request->region_id;
        $item->category_plan_id = $request->category_plan_id;
        $item->plan_id = $request->plan_id;
        $item->price_extra = $request->price;
        $item->description = $request->description;
        $item->save();
        $id = $item->id;

        \Session::flash('message', 'Insurance product package successfully added');


        return redirect()->route('admin-insurance-product-show-package', $request->id);
    }

    public function deletePackage(Request $request){
        $item = Package::findOrFail($request->id);
        if ($item != null){
            $item->delete();
        }
        \Session::flash('message', 'Insurance plan successfully deleted');
        return response()->json(['message'=> 'success']);
    }

    public function deletePackageExtra(Request $request){
        $item = PackageExtra::findOrFail($request->id);
        if ($item != null){
            $item->delete();
        }
        \Session::flash('message', 'Insurance plan successfully deleted');
        return response()->json(['message'=> 'success']);
    }

    public function filterPackage(Request $request)
    {
        $product = Insurance::findOrFail($request->package_id);

        $regions = Region::all();

        $plans = Plan::all();

        $countryregions = DB::table('packages')
                     ->select('countries.name')
                     ->join('regions', 'packages.region_id', '=', 'regions.id')
                     ->join('country_region', 'regions.id', '=', 'country_region.region_id')
                     ->join('countries', 'country_region.country_id', '=', 'countries.id')
                     ->where('regions.id', '=', $request->package_id)
                     ->get();

        $categoryplans = CategoryPlan::all();

        $countries = Country::all();
        $packages = Package::where('insurance_id', $request->package_id);
        $packageExtras = PackageExtra::where('insurance_id', $request->package_id);

        if ($request->region_id > 0) {
            $packages = $packages->where('region_id', '=' , $request->region_id);
            $packageExtras = $packageExtras->where('region_id', '=' , $request->region_id);
        }

        if ($request->category_id > 0) {
            $packages = $packages->where('category_plan_id', '=' , $request->category_id);
            $packageExtras = $packageExtras->where('category_plan_id', '=' , $request->category_id);
        }

        if ($request->plan_id > 0) {
            $packages = $packages->where('plan_id', '=' , $request->plan_id);
            $packageExtras = $packageExtras->where('plan_id', '=' , $request->plan_id);
        }

        $packages = $packages->with("categoryplan")
            ->orderBy('from_day', 'asc')
            ->get();

        $packageExtras = $packageExtras->with("categoryplan")->get();
        // $packages = Package::where([
        //     ['insurance_id', '=' , $request->package_id],
        //     ['region_id', '=' , $request->region_id],
        // ])->with("categoryplan")
        // ->orderBy('from_day', 'asc')
        // ->get();

        // $packageExtras = PackageExtra::where([
        //     ['insurance_id', '=' , $request->package_id],
        //     ['region_id', '=' , $request->region_id],
        // ])->with("categoryplan")
        // ->get();

        $items = array(
            'product' => $product,
            'regions' => $regions,
            'plans'=> $plans,
            'categoryplans'=> $categoryplans,
            'packages' => $packages,
            'packageExtras' => $packageExtras,
            'countries' => $countries,
        );
        return view('admin.insurance.add-package')->with($items);
        //return redirect()->route('admin-insurance-product-show-package', $request->package_id)->with($items);

    }


}
