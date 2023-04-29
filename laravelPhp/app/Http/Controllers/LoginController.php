<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function viewFormlogin()
    {
        if (Auth::check()) {
            return redirect()->route('listTask');
        }

        return view('login');
    }

    public function checkUserInfo(Request $request)
    {
        $credentials = $request->only('user_name', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('listTask');
        }
         redirect()->route('listTask');

    }

}
