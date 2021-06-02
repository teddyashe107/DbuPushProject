@extends('contents.layout');
@include('layouts.app')


@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
              <div class="card justify-content-center">
                    <div class="card-header">{{ __('Register') }}</div>  

                    <div class="card-body">

                 
                          <form method="POST" action="/forms" >
                              @csrf
  
                             <div class="form-group">
                           <label for="firstname">First name</label>
                           <input type="text" name="fname" class="form-control" > 
                           </div>

                             <div class="form-group">
                            <label for="lastname">Last name</label>
                            <input type="text" class="form-control"  name="lname"> 
                            </div>
   
                           <div class="form-group">
                           <label for="department">Department</label>
                           <input type="text" class="form-control" name="department"> 
                           </div>
                      
                           <div class="form-group">
                           <button class="btn btn-success" type="submit">Submit form</button>
                           </div>
          
                            @include('student.errors')
     
                        </form>
                 </div>
             </div>
         </div>
      </div>
    </div>

 @endsection

