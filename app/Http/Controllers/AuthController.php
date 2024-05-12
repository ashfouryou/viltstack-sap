<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;


class AuthController extends Controller
{

    function login_view(){
        return Inertia::render('auth/login');
    }

    function register_view(){
        return Inertia::render('auth/register');
    }

   
   public function register(Request $request)
   {
       // Validation rules
       $rules = [
           'email' => 'required|email|unique:users,email',
           'name' => 'required|string|max:255',
           'password' => 'required|string|regex:/^\w+$/',
       ];
   
       // Custom validation messages
       $messages = [
           'password.regex' => 'The password must be alphanumeric.',
       ];
   
       // Validate the request
       $validator = Validator::make($request->all(), $rules, $messages);
   
       // Check if validation fails
       if ($validator->fails()) {
           return Inertia::render('auth/register', ['errors' => $validator->errors()->toArray()]);
       }
   
       // Create a new user
       $user = new User();
       $user->email = $request->email;
       $user->name = $request->name;
       $user->password = bcrypt($request->password);
       $user->save();
   
       // Attempt authentication
       if (Auth::attempt($request->only('email', 'password'))) {
           // Authentication successful
           return redirect()->intended('/');
       } else {
           // Authentication failed
           return Inertia::render('index', ['msg' => "Registration Failed"]);
       }
   }

     public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->intended('/login');
    }


    public function login(Request $request)
    {
        // Validate the request data
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        // Attempt to log in the user
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/');
        } else {
            return Inertia::render('auth/login', ['errors' => "Login Failed"]);

        }
    }
   
    
}
