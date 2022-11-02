<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //show register form
    public function create(){
        return view('users.register');
    }
    // create new user
    public function store(Request $request)
    {
        $formfields = $request->validate([
            'name' => ['required', 'min:3'],
            'email'=>['required', 'email' , Rule::unique('users','email')],
            'password'=>  'required|confirmed|min:6',

        ]);
        // hash password
        $formfields['password'] = bcrypt($formfields['password']);

        //create user
        $user = User::create($formfields);
        
        // login redirect
        auth()->login($user);

        return redirect('/')->with('message','User registered and logged in successfully');
    }
    // show login form
    public function login()
    {
        return view('users.login');
    }
    // authenticate user
    public function authenticate(Request $request)
    {
        $formfields = $request->validate([
            'email' => ['required', 'email'],
            'password' =>  'required',
        ]);

        if (auth()->attempt($formfields)) {
            $request->session()->regenerate();

            return redirect('/')->with('message','User Logged in successful');
        }

        return back()->withErrors(['email'=>'Invalid credentials'])->onlyInput('email');
    }

    // user logout
    public function logout(request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerate();

        return redirect('/')->with('message','User Logout Successfully');
    }
}
