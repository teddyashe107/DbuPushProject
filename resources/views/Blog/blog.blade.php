@extends('layouts.app')

@include('layouts.navbar')
@section('content')


<div class="container">
    <h1 class="text-bold text-center p-3">Blog Posts</h1>

    @if (session()->has('message'))
        <div class="alert alert-success">{{ session()->get('message')}}</div>
    @endif
    

   @if (Auth::check())
     <div class="row text-center">
         <div class="col-md-12">
             <a href="{{ route('admin.create') }}" class="btn btn-primary btn-lg">Create New Post</a>
         </div>
     </div>
     @endif 
@foreach ($posts as $post )
     <div class="row p-5 ">
        <div class="col-md-6">
            <img style="height:250px; width:250px" src="{{ asset('Post/'.$post->image_path ) }}"  class="img-fluid img-thumbnails" alt="">
        </div>
        <div class="col-md-6 text-center">

            <h3 class="text-bold">{{ $post->title }}</h3>

            <h6> <i class="bi bi-clock"> <span class="text-bold">By  <Strong>{{ $post->user->name }}</Strong> Created on  {{ date('jS M Y',
            strtotime($post->created_at) ) }}</span> </i></h6>
            <p class="lead text-left"> {{ $post->description }}</p>
            <a href="posts/show/{{ $post->slug }}" class="btn btn-primary btn-rounded">Keep Reading</a>


               @if (isset(Auth::user()->id) && Auth::user()->id == $post->user_id )
                         <a href="posts/edit/{{ $post->slug }}" class="btn btn-primary m-2 ">Edit</a>
                         
                         <form class="inline" action="posts/delete/{{ $post->slug }}" method="POST">
                         @csrf
                         @method('delete')
                         <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
               @endif
                       
        </div>
    </div>

    @endforeach
</div>

@include('layouts.footer')
@endsection





