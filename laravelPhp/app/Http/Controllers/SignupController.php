<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;

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
        $validator = Validator::make($request->all(),
            ['user_name' => 'unique:users']);
        if ($validator->fails()) {
            return redirect('/sign_up')->withErrors($validator, 'login')->withInput($request->input());
        }
        User::create([
            'user_name' => $request->user_name,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('login')->with('messageSignup', 'You have successfully registered,
         please login to view task list');
    }
}
