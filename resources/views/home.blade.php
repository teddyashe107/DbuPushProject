@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center"> 
        <div class="col-md-7 mt-5"> 
            <div class="jumbotron">
           
           
                    <h1 class="text-center text-danger">Debrebirhan University</h1>
                    <h2>Lists of students working with Semister Project</p>
                        <ul class="text-primary">
                            <li>Teddy Code Night</li>
                            <li>Kidusan</li>
                            <li>Ahmed</li>
                            <li>Kal</li>
                     
                        </ul>
                
             
           
            </div>
        
        
   
    
    </div>
</div>
@endsection
