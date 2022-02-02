@extends('dashboard.admin.layouts.admin-dash-layout')

@section('content')


<div class="container">

    <h1 class="text-bold text-left p-3">Create Post</h1>
    @if ($errors->any())
            
    <ul class="bg-danger">
        @foreach ($errors->all() as $error)
            <li>{{ $errors }}</li>
        @endforeach
    </ul>
        
    @endif
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card bg-dark text-light">
                <div class="card-header text-center">
                    Update the Post
                </div>

                <div class="card-body">
                    <form action="admin/update/{{ $post->slug }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        

                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" value="{{ $post->title }}">

                        <textarea class="form-control mt-2" rows="10" name="description">{{ $post->description }}</textarea>
                       

                        <button type="submit" class="btn btn-primary form-control m-2 ">Update Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>


@endsection