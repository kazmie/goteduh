<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\CategoryPlan;
class CategoryController extends Controller
{
    function index() 
    {
        $items = CategoryPlan::paginate(20);
        return view('admin.category.home', compact('items'));
    }

    function create() 
    {
        return view('admin.category.new');
    }

    function save(Request $request) {
        $request->validate([
            'category_name' => 'required|max:255',
            'color' => 'required|max:255',
        ]);

        CategoryPlan::create([
            'category_name' => $request->category_name,
            'color' => $request->color,
        ]);

        \Session::flash('message', 'Product category plan added');
        return redirect()->route('admin-insurance-category');
    }

    function edit($id) {
        $item = CategoryPlan::findOrFail($id);
        return view('admin.category.edit', compact('item'));
    }

    function update(Request $request) {
        $request->validate([
            'category_name' => 'required|max:255',
            'color' => 'required|max:255',
        ]);

        $category = CategoryPlan::findOrFail($request->id);
            
        $category->category_name = $request->category_name;
        $category->color = $request->color;
        $category->save();

        \Session::flash('message', 'Product category plan edited');
        return redirect()->route('admin-insurance-category');
    }

    public function delete(Request $request)
    {
        $item = CategoryPlan::findOrFail($request->id);
        if ($item != null){
            $item->delete();
        }
        \Session::flash('message', 'Product category plan successfully deleted');
        return response()->json(['message'=> 'success']);
    }
}
