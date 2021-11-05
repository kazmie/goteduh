<?php

namespace App\Http\Controllers\Admin;

use App\Models\Company;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function __construct()
    {
        //$this->middleware('guest')->except('logout');
    }

    public function index()
    {
        $items = Company::paginate(15);
        return view('admin.company.home')->with('items', $items);
    }

    public function create()
    {
        return view('admin.company.new');
    }

    public function store(Request $request)
    {
        $item = new Company();

        $item->name = $request->name;
        $item->address1 = $request->address1;
        $item->address2 = $request->address2;
        $item->address3 = $request->address3;
        $item->postcode = $request->postcode;
        $item->state = $request->state;
        $item->city = $request->city;
        $item->email = $request->email;
        $item->phone = $request->phone;
        $item->fax = $request->fax;

        $fileName = "fileName" . time() . '.' . request()->image->getClientOriginalExtension();

        $request->image->storeAs('public', $fileName);

        $item->image_url = $fileName;
        $item->save();

        \Session::flash('message', 'New company successfully added');
        return redirect()->route('admin-insurance-company');
    }

    public function edit($id)
    {
        return view('admin.company.edit')->with('company', Company::find($id));
    }

    public function update(Request $request)
    {
        $item = Company::find($request->id);

        $item->name = $request->name;
        $item->address1 = $request->address1;
        $item->address2 = $request->address2;
        $item->address3 = $request->address3;
        $item->postcode = $request->postcode;
        $item->state = $request->state;
        $item->city = $request->city;
        $item->email = $request->email;
        $item->phone = $request->phone;
        $item->fax = $request->fax;

        if ($request->image) {
            $fileName = "fileName" . time() . '.' . request()->image->getClientOriginalExtension();
            $request->image->storeAs('public/logo', $fileName);
            $item->image_url = $fileName;
        }
        $item->save();

        \Session::flash('message', 'Company successfully updated');
        return redirect()->route('admin-insurance-company');
    }
}
