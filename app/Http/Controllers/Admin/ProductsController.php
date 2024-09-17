<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    //
    public function index()
    {
        return view('admin.products.index');
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email|unique:admins',
        //     'password' => 'required|min:6',
        // ]);

        // $admin = new Admin();
        // $admin->name = $request->name;
        // $admin->email = $request->email;
        // $admin->password = bcrypt($request->password);
        // $admin->save();

        // return redirect()->route('admin.admins.index');
    }


}
