@extends('layouts.app')
@include('layouts.navbar')

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
                    Create New Post
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" placeholder="title">

                        <textarea class="form-control mt-2" name="description" placeholder="description..." ></textarea>
                        <input type="file" name="image_path" class="btn btn-primary bg-dark mt-2 mb-2 form-control">

                        <button type="submit" class="btn btn-primary form-control mt-2 ">Submit Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>

@include('layouts.footer')

@endsection

