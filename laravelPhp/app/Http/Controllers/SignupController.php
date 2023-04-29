<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SignupController extends Controller
{
    public function signup()
    {
        if (Auth::check()) {
            return redirect()->route('listTask');
        }
        return view('signUp');
    }

    public function signupComplete(Request $request)
    {
        $request->validate([
            'user_name' => 'required|email|max:250|unique:users',
            'password' => 'required|min:8',
            'psw-repeat' => 'same:password',
        ]);

        User::create([
            'user_name' => $request->user_name,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('login')->with('message', 'You have successfully registered,
         please login to view task list');
    }
}
