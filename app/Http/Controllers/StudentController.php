<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;


class StudentController extends Controller
{
    //
    public function index(){
        return view('home');
    }

    public function create(){
        return view('student.form');
    }

    public function store(Request $request){
        // form validiation
        $validated = $request->validate([
            'image' => ['required','mimes:png,jpg','max:5048'],
            'fname' => 'required',
            'lname' => 'required',
            'department' => 'required'

        ]);

        $newImageName = time(). '-'.$request->fname.'.'.$request->image->extension();
 
        $request->image->move(public_path('images'), $newImageName);

     
        // create a new post using the request data


       $stud = new Student();
       $stud->fname = request('fname');
       $stud->lname =  request('lname'); 
       $stud->department = request('department');
       $stud->image_path = $newImageName;
       

       // save it to the database
       $stud->save();

       // redirect to the homepage
          
       return redirect('/layout');

    }
    

}
