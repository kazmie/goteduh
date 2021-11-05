<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Session;
use App\Models\Region;
use App\Models\Country;
use App\Models\CountryPackage;
use App\Models\CountryRegion;
use DB;

class RegionController extends Controller
{
    public function index()
    {
        $regions = Region::paginate(15);
        $countries = Country::all();
        return view('admin.region.home')->with('regions', $regions)->with('countries', $countries);
    }

    public function store(Request $request)
    {
        $item = new Region();
        $item->description = $request->description;
        \Session::flash('message', 'Insurance product region successfully added');
        $item->save();
        $id = $item->id;

        foreach( $request->country_id  as $countryId)
        {
            $country = new CountryRegion();
            $country->country_id = $countryId;
            $country->region_id = $id;
            $country->save();
        }

        return redirect()->route('admin-insurance-region');
    }

    public function edit($id)
    {
        $region = Region::find($id);
        $countries = Country::all();
        $country_region = DB::table('regions')
                     ->select('countries.id','countries.name')
                     ->join('country_region', 'regions.id', '=', 'country_region.region_id')
                     ->join('countries', 'country_region.country_id', '=', 'countries.id')
                     ->where('regions.id', '=', $id)
                     ->get();

        $items = array(
                'region' => $region,
                'countries' => $countries,
                'country_region' => $country_region,
        );

        return view('admin.region.edit')->with($items);
    }

    public function update(Request $request)
    {
        $item = Region::find($request->id);
        $item->description = $request->description;
        \Session::flash('message', 'Insurance product region successfully updated');
        $item->save();
        $id = $item->id;

        CountryRegion::where([
            ['region_id', '=' , $id]
        ])->delete();


        foreach( $request->region_id  as $countryId)
        {
            $country = new CountryRegion();
            $country->country_id = $countryId;
            $country->region_id = $id;
            $country->save();
        }

        return redirect()->route('admin-insurance-region');
    }

    public function delete(Request $request)
    {
        $item = Region::findOrFail($request->id);
        if ($item != null){
            $item->delete();
        }
        \Session::flash('message', 'Region successfully deleted');
        return response()->json(['message'=> 'success']);
    }

    public function RegionDuplicate($id)
    {

        $region = Region::find($id);
        $countries = Country::all();
        $country_region = DB::table('regions')
                     ->select('countries.id', 'countries.name')
                     ->join('country_region', 'regions.id', '=', 'country_region.region_id')
                     ->join('countries', 'country_region.country_id', '=', 'countries.id')
                     ->where('regions.id', '=', $id)
                     ->get();

        $items = array(
                'region' => $region,
                'countries' => $countries,
                'country_region' => $country_region,
        );

        return view('admin.region.duplicate')->with($items);

    }

    public function saveRegionDuplicate(Request $request)
    {
        $item = new Region(); //create new region_id
        $item->description = $request->description; //save request description
        \Session::flash('message', 'Insurance product region successfully duplicated');
        $item->save();
        $id = $item->id;



        foreach($request->selected_country as $countryId2)
        {
            $country = new CountryRegion();
            $country->country_id = $countryId2;
            $country->region_id = $id;
            $country->save();
        }


        return redirect()->route('admin-insurance-region');
    }
}
