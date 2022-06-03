@extends('layouts.master')

@section('content')
    <div class="container">

        <div class="row justify-content-center align-items-center">

            <div class="col-lg-6 col-md-10 col-sm-12  ">
                <p class="lead mt-5">Full Name: {{ $user->name }}</p>
                <p class="lead mt-5">Email: {{ $user->email }}</p>
                <a href="{{ url('admin/delete-user/' . $user->id) }}" class="btn btn-danger">Delete</a>
            </div>
        </div>
    </div>
    </div> <!-- /container -->
@endsection
