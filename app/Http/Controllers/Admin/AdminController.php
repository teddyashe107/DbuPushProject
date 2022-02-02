<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Cviebrock\EloquentSluggable\Services\SlugService;
use App\Models\Admin;
use App\Models\Post;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.admin.home')
        ->with('posts',Post::orderBy('updated_at', 'DESC')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=> 'required',
            'description' => 'required',
            'image_path' => ['required','mimes:png,jpg','max:5048']
        ]);

        $newImageName = uniqid().'-'.$request->title.'.'.$request->image_path->extension();

        $request->image_path->move(public_path('Post'), $newImageName);

         

         Post::create([
             'slug' =>SlugService::createSlug(Post::class,'slug',$request->title),
             'title' => $request->input('title'),
             'description'=>$request->input('description'),
             'image_path' => $newImageName,
             'user_id' => Auth()->user()->id
         ]);

         return redirect('admin/dashboard')
         ->with('message','Your post has been added!');
         ;
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        return view('dashboard.admin.show')
        ->with('post',Post::where('slug',$slug)->first());
     
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        return view('dashboard.admin.edit')
        ->with('post',Post::where('slug',$slug)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $request->validate([
            'title'=> 'required',
            'description' => 'required',
          //  'image_path' => ['required','mimes:png,jpg','max:5048']
        ]);

             Post::where('slug',$slug)->update([
                 'slug' =>SlugService::createSlug(Post::class,'slug',$request->title),
                 'title' => $request->title,
                 'description'  => $request->description,
                 'user_id' => Auth()->user()->id
             ]);

             return redirect('admin/dashboard')
             ->with('message','your post has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $post =  Post::where('slug',$slug);
        $post->delete();
 
         return redirect('admin/dashboard')
         ->with('message','your post has been Deleted');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required','email','exists:admins,email'],
            'password' => ['required','min:8','max:30'],
        ]);


        $creds = $request->only('email','password');

        if(Auth::guard('admin')->attempt($creds)){
             return redirect()->route('admin.dashboard');
        }
        else{
            return redirect()->route('admin.login')->with('fail','Incorrect credentials');
        }
    }

    public function glide(){
        return view('layouts.glide');
    }

    public function profile(){
        return view('dashboard.admin.layouts.profile');
    }
}
