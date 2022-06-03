@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class=" col-lg-6 col-md-8 col-sm-10 col-11">
            <div class="card">

                @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                    @endforeach
                </div>
                @endif

                <h2 class="card-header bg-primary text-white text-center">
                    Add Post
                </h2>
                <form class="card-body form-group d-flex flex-column align-items-center" method="POST" enctype="multipart/form-data" action="{{route('profile@update', Auth::user()->id)}}">
                    @csrf
                    @method("PUT")
                    <label for="name">
                        Full Name :
                    </label>
                    <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}" placeholder="Write Something ...">
                    <label for="price" class="mt-3">
                        Email :
                    </label>
                    <input type="text" class="form-control" name="email" value="{{Auth::user()->email}}" placeholder="Write Something ...">

                    <input name="submit-form" value="Add" type="submit" class="btn btn-primary px-4 mt-3" />
                </form>
            </div>

        </div>
    </div>
</div>

@endsection
