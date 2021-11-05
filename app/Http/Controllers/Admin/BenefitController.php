<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\InsuranceBenefitType;

class BenefitController extends Controller
{
    public function index()
    {
        $items = InsuranceBenefitType::paginate(50);
        return view('admin.benefit.home')->with('items', $items);
    }

    public function create()
    {
        return view('admin.benefit.new');
    }

    public function store(Request $request)
    {
        $item = new InsuranceBenefitType();
        $item->name = $request->name;
        $item->save();

        \Session::flash('message', 'New insurance product  benefit successfully added');
        return redirect()->route('admin-insurance-benefit');
    }

    public function edit($id)
    {
        $benefit = InsuranceBenefitType::find($id);
        return view('admin.benefit.edit')->with('benefit', $benefit);
    }

    public function update(Request $request)
    {
        $item = InsuranceBenefitType::find($request->id);
        $item->name = $request->name;
        $item->save();

        \Session::flash('message', 'Insurance product benefit successfully updated');
        return redirect()->route('admin-insurance-benefit');
    }

    public function delete(Request $request)
    {
        $item = InsuranceBenefitType::findOrFail($request->id);
        if ($item != null){
            $item->delete();
        }
        \Session::flash('message', 'Insurance benefit successfully deleted');
        return response()->json(['message'=> 'success']);
    }
}
