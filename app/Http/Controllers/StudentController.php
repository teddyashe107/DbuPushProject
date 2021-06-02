<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;


class StudentController extends Controller
{
    //
    public function index(){
        return view('contents.index');
    }

    public function create(){
        return view('student.form');
    }

    public function store(Request $request){
        // form validiation
        $validated = $request->validate([

            'fname' => 'required',
            'lname' => 'required',
            'department' => 'required'

        ]);
        // create a new post using the request data
       $stud = new Student();
       $stud->fname = request('fname');
       $stud->lname =  request('lname'); 
       $stud->department = request('department');
       

       // save it to the database
       $stud->save();

       // redirect to the homepage
          
       return redirect('/');

    }

}
