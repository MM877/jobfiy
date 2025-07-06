<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
  public function create(){

    return view('auth.register');
  }


  public function store(){
    // valid
$validation = request()->validate([
    'first_name' => ['required', 'string', 'max:255'],
    'last_name'  => ['required', 'string', 'max:255'],
    'email'      => ['required', 'email', 'max:255', 'unique:users,email'],
    'password'   => [
        'required',
        'min:8',
        'confirmed',
        'regex:/[!@#$%^&*(),.?":{}|<>]/'
    ],
], [
    'password.regex' => 'Password must contain at least one special character (e.g. !@#$%^&*).',
    'password.min' => 'Password must be at least 8 characters long.',
    'password.confirmed' => 'Password confirmation does not match.',
]);


//hash the pass
$validation['password']=bcrypt($validation['password']);

    // create user 
$user=User::create($validation);


    //login

  Auth::login($user);

    //redirect 
    return redirect()->route('about')->with('success','Acount created successfully!');
  }
}
