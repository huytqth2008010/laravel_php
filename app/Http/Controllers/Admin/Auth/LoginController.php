<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request){
        if ($request->method() =="GET")
            return view("admin.login");
        $credentials = $request->only(["email","password"]);
        if (Auth::guard("admin")->attempt($credentials)){
            return redirect()->to("admin");
        }
        return redirect()->back()->withInput();
    }
}
