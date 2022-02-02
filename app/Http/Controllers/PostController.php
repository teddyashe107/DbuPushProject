<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Cviebrock\EloquentSluggable\Services\SlugService;

class PostController extends Controller
{


  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Blog.blog')
        ->with('posts',Post::orderBy('updated_at', 'DESC')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Blog.create');
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

         return redirect('admin/posts')
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
        return view('Blog.show')
        ->with('post', Post::where('slug',$slug)->first()); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        return view('Blog.edit')
        ->with('post',Post::where('slug',$slug)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $string
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

             return redirect('admin/posts')
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

        return redirect('admin/posts')
        ->with('message','your post has been Deleted');
    }
}
