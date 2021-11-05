<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Plan;
class PlanController extends Controller
{
    function index() {
        $items = Plan::paginate(20);
       return view('admin.plan.home', compact('items'));
    }

    function create() 
    {
        return view('admin.plan.new');
    }

    function save(Request $request) {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        Plan::create([
            'name' => $request->name,
        ]);

        \Session::flash('message', 'Product Plan added');
        return redirect()->route('admin-insurance-plan');
    }

    public function delete(Request $request)
    {
        $item = Plan::findOrFail($request->id);
        if ($item != null){
            $item->delete();
        }
        \Session::flash('message', 'Product plan successfully deleted');
        return response()->json(['message'=> 'success']);
    }
}
