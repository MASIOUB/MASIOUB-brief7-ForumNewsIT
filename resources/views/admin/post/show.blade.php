@extends('layouts.master')

@section('content')
<div class="container">

    <div class="row justify-content-center align-items-center">
        <div class="col-lg-6 col-md-10 col-sm-12">
            <img src="{{ asset('uploads/post/'.$post->image) }}" style="height: auto" width="100%" />
        </div>

        <div class="col-lg-6 col-md-10 col-sm-12  ">

            <h1 class="">{{ $post->title }}</h1>
            <ul class="list-inline">
                <li>Date | {{ $post->created_at }}</li>
            </ul>
            <p class="lead mt-5">{{ $post->description }}</p>
            <a href="{{ url('admin/delete-post/' . $post->id) }}" class="btn btn-danger">Delete</a>
        </div>
    </div>
</div>
</div> <!-- /container -->
@endsection