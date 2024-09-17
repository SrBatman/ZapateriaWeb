<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminsController extends Controller
{
    //
    public function index()
    {
        return view('admin.admins.index');
    }

    public function create()
    {
        return view('admin.admins.create');
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
