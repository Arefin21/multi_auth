<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Seller;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class SellerController extends Controller
{
    public function index(){
        return view('seller.login');
    }
    public function dashboard(){
        return view('seller.dashboard');
    }
    public function login(Request $request){
        // dd($request->all());
        $check=$request->all();
        if (Auth::guard('seller')->attempt(['email' => $check['email'],
         'password' => $check['password']])) {
            return redirect()->route('seller.dashboard')->with('error','Seller Login Successfully');
        }else{
            return back()->with('error','Invaild Email or Password');
        }
    }
    public function SellerLogout(){
        Auth::guard('seller')->logout();
        return redirect()->route('seller_login_form')->with('error','Seller Logout Successfully');
    }
    public function SellerRegister(){
        return view('seller.register');
    }
    public function SellerRegisterCreate(Request $request){
        Seller::insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->pass),
            'created_at'=>Carbon::now(),
        ]);
        return redirect()->route('seller_login_form')->with('error','Seller Created Successfully');
        }
    }

