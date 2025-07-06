<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
     public function create(){

    return view('auth.login');
  }
  

  public function store(){
// valid
$credentials  = request()->validate([

 'email' => ['required', 'email'],
    'password' => ['required'],
]);


// attempt to login the user
if(! Auth::attempt($credentials)){
  throw ValidationException::withMessages([

    'email'=>'sorry the crendentials match'


  ]);
}


// session token 
request()->session()->regenerate();
//redirct 
    return redirect('/jobs');

  }

  // Handle logout
    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'You have been logged out.');
    }
}
