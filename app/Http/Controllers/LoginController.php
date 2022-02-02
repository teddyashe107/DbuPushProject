<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
         $loginData = $request->validate([
             'email' => 'email|required',
             'password' => 'required'
         ]);
        
         if(!auth()->attempt($loginData)) {
             return response(['message'=>'Invalid credentials']);
         }
 
         $accessToken = auth()->user()->createToken('authToken')->accessToken;
 
         return response(['user' => auth()->user(), 'access_token' => $accessToken]);
 
    }
   
}
