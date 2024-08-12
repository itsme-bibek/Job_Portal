<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    // This method will show user registration page 
    public function registration()
    {
        return view('front.account.registration');
    }


    // This method will save user 

    public function processRegistration(Request $request)
    {

        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:5|same:confirm_password',
            'confirm_password' => 'required'

        ];

        $Validator = Validator::make($request->all(), $rules);

        if ($Validator->passes()) {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();

            session()->flash('success', 'Registration Sucessfull');



            return response()->json([
                'status' => true,
                'errors' => []
            ]);
            
        } else {
            return response()->json([
                'status' => false,
                'errors' => $Validator->errors()
            ]);
        }
    }
    // This method will send us to login page 


    public function login()
    {
        return view('front.account.login');
    }


    // This method will help us to authenticate the user and admin from the login page 
    public function authenticate(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required'

        ];

        $Validator = Validator::make($request->all(), $rules);

        if ($Validator->passes()) {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) { // To check the email and password from the database 
                return redirect()->route('account.profile');  // Returning to the profile page once the login is successfull


            } else {
                return redirect()->route('account.login')->with('error', 'Either Email/Password is Incorrect !!');
            }
        } else {
            return redirect()->route('account.login')->withInput($request->only('email'))->withErrors($Validator);
        }
    }


    public function profile()
    {
        $id=Auth::user()->id;
        $user =User::findOrFail($id);
        // dd($user);
     
        return view('front.account.profile',[
            'user' => $user
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('account.login');
    }
}
