<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected function login(){
        return view('Admin.auth.login');
    }

    protected function doLogin(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(auth()->guard('admin')->attempt(['email' => $request->email,  'password' => $request->password])){

            $user = auth()->guard('admin')->user();
            return redirect()->route('admin.roles.index')->with('success','You are Logged in sucessfully.');
        }else {
            return back()->with('error','Whoops! invalid email and password.');
        }
    }

}
