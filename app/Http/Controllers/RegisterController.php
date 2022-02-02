<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
         $validatedData = $request->validate([
             'name'=>'required|max:55',
             'email'=>'email|required|unique:users',
             'password'=>'required',
             'c_password'=>'required|same:password'
           
             
         ]);
 
         $validatedData['password'] = bcrypt($request->password);
 
         $user = User::create($validatedData);
 
         $accessToken = $user->createToken('authToken')->accessToken;
 
         return response(['user'=> $user, 'access_token'=> $accessToken]);
        
    }
}
