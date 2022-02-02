@extends('layouts.app')
@include('layouts.navbar')

@section('content')

<section class="bg-dark text-light p-5">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-4">
                <h4>Welcome to <span class="text-warning">Debre Birhan University</span> </h4>
                <p>Debre Brehan University is one of the thirteen New Universities which was established in 1999 E.C... Debre berhan, Debre Berhan, Ethiopia.</p>
                <button class="btn btn-primary btn-lg">Learn More</button>
            </div>
            <div class="col-md-8 text-center">
                <img src="https://previews.agefotostock.com/previewimage/medibigoff/745cceecd57eb8e0124f094fae6b730d/x3n-3369719.jpg" class="w-50 img-fluid img-thumbnail d-none d-md-flex" alt="">
            </div>
        </div>
    </div>
</section>

<!-- main content-->
<section class="p-5">
    <div class="container">
        <div class="row g-4" id="courses">
            <div class="col-md-6">
                <div class="card bg-dark text-light text-center">
                    <div class="card-header">
                            Courses
                    </div>
                    <div class="card-body">
                        <i class="bi bi-book h1"></i>
                        <p class="card-text">Starting learning for free with a wide range of free online courses covering ... See your personalised recommendations based on your interests and goals.</p>
                        <a href="{{ route('home') }}" class="btn btn-primary">See Your Courses</a>
                    </div>
                </div>
            </div>
          
            <div class="col-md-6">
                <div class="card bg-dark text-light text-center">
                    <div class="card-header">    
                              Blog
                    </div>
                    <div class="card-body">
                        <i class="bi bi-info-circle h1"></i>
                        <p class="card-text">Tap Recent to see recent posts from the pages and people you follow. The most recent post appears at the top. That's all. See: How to Hide Likes Count from ....</p>
                        <a href="{{ route('user.posts') }}" class="btn btn-primary">Blog</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--Serivices-->
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="public/" alt="">
            </div>
            <div class="col-md-6"></div>
        </div>
    </div>
</section>

    

<section p-5 m-5 >
    <div class="container">
        <h1 class="text-center text-bold mb-2"> Recent Posts</h1>
        <div class="row mt-2">
            <div class="col-md-6">
               <h1 class="text-center ">{{ $post->title }}</h1>
               <i class="bi bi-clock text-left">{{ $post->created_at }} By <strong>{{ $post->user->name }} </strong></i>
               <p class="text-bold text-left"> {{ $post->description }}</p>
              
               <a href="{{ route('user.posts') }}" class="btn btn-primary btn-lg rounden-pill">ReadMore</a>
            </div>
            <div class="col-md-6">
                <img src="https://previews.agefotostock.com/previewimage/medibigoff/745cceecd57eb8e0124f094fae6b730d/x3n-3369719.jpg" class="img-fluid img-thumbnail w-50 mt-2" alt="">
            </div>
        </div>
    </div>
</section>


<!--footer section-->
@includeIf('layouts.footer')

@endsection
