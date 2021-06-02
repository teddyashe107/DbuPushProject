<?php

namespace App\Http\Controllers;
use App\Models\Student;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    //
    public function index(){

       return Student::all();
       
    }


    public function store(Request $request){

        // request validation
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'department' => 'required'
         ]);
       // create a new post using the request data
      return Student::create($request->all());

    }

    public function show($id){

         return Student::find($id);
    }

    public function update(Request $request,$id){

         $user = Student::find($id);
         $user -> update($request-all());

    }

    public function destroy($id){

        return Student::destroy($id);
    }


}
