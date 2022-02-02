@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashbord</div>

                <div class="card-body">
                    @if (auth()->user()->is_admin == 1))

                    <a href="{{ url('admin.home') }}">Admin</a>

                    @else
                    <div class="panel-heading">Normal User</div>
                        
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>