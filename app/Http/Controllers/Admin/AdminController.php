<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    protected function login(){
        return view('Admin.login.login');
    }

    protected function doLogin(Request $request){
        dd($request);
    }
}
