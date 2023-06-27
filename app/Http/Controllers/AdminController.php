<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index(){
        return view('admin.login');
    }

    public function login(Request $request){
        //dd($request->all());
        $check=$request->all();
        if (Auth::guard('admin')->attempt(['email' => $check['email'],
         'password' => $check['password']])) {
            return redirect()->route('admin.dashboard')->with('error','Admin Login Successfully');
        }else{
            return back()->with('error','Invaild Email or Password');
        }
    }

    public function dashboard(){
        return view('admin.dashboard');
    }
    
    public function AdminLogout(){
        Auth::guard('admin')->logout();
        return redirect()->route('login_form')->with('error','Admin Logout Successfully');
    }
    public function AdminRegister(){
        return view('admin.register');
    }
    public function AdminRegisterCreate(Request $request){
    //dd($request->all());
    Admin::insert([
        'name'=>$request->name,
        'email'=>$request->email,
        'password'=>Hash::make($request->pass),
        'created_at'=>Carbon::now(),
    ]);
    return redirect()->route('login_form')->with('error','Admin Created Successfully');
    }
}
