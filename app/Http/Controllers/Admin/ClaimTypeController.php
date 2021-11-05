<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ClaimType;

class ClaimTypeController extends Controller
{
    public function index()
    {
        $items = ClaimType::paginate(50);
        return view('admin.claimType.home')->with('items', $items);
    }

    public function create()
    {
        return view('admin.claimType.new');
    }

    public function store(Request $request)
    {
        $item = new ClaimType();
        $item->name = $request->name;
        $item->insurance_type_id = 1;
        $item->save();

        \Session::flash('message', 'New type of claim is successfully added');
        return redirect()->route('admin-insurance-claimType');
    }

    public function edit($id)
    {
        $claimType = ClaimType::find($id);
        return view('admin.claimType.edit')->with('claimType', $claimType);
    }

    public function update(Request $request)
    {
        $item = ClaimType::find($request->id);
        $item->name = $request->name;
        $item->save();

        \Session::flash('message', 'Type of claim is successfully updated');
        return redirect()->route('admin-insurance-claimType');
    }

    public function delete(Request $request)
    {
        $item = ClaimType::findOrFail($request->id);
        if ($item != null){
            $item->delete();
        }
        \Session::flash('message', 'Type of claim successfully deleted');
        return response()->json(['message'=> 'success']);
    }
}
