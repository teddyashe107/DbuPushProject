@extends('layouts.app')
@include('layouts.navbar')

@section('content')


<div class="container">

    <h1 class="text-bold text-center p-3">{{ $post->title }}</h1>

    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-8">
            <img src="{{ asset('Post/'.$post->image_path ) }}"  class="img-fluid img-thumbnails" alt="">
        </div>
    </div>
   <div class="row">
       <div class="col-md-2"></div>
       <div class="col-md-8">
        <h6> <i class="bi bi-clock"> <span class="text-bold">By  <Strong>{{ $post->user->name }}</Strong> Created on  {{ date('jS M Y',
            strtotime($post->created_at) ) }}</span> </i></h6>
            <p class="lead text-left"> {{ $post->description }}</p>
           
       </div>
   </div>

</div>

@include('layouts.footer')

@endsection

