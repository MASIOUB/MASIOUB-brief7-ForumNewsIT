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
                <form class="card-body form-group d-flex flex-column align-items-center" method="POST" enctype="multipart/form-data" action="{{route('posts@update', $post)}}">
                    @csrf
                    @method("PUT")
                    <label for="name">
                        Title :
                    </label>
                    <input type="text" class="form-control" name="title" value="{{ $post->title }}" placeholder="Write Something ...">
                    <label for="price" class="mt-3">
                        Description :
                    </label>
                    <input type="text" class="form-control" name="description" value="{{ $post->description }}" placeholder="Write Something ...">

                    <label for="price" class="mt-3">
                        Category :
                    </label>
                    <select class="form-control" name="category_id">
                        @foreach ($categories as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    <label for="image" class="mt-3"> Image : </label>
                    <input type="file" class="form-control" name="image" placeholder="Write Something ...">
                    <input type="hidden" class="form-control" name="created_by" value="{{Auth::user()->id}}">
                    <input name="submit-form" value="Add" type="submit" class="btn btn-primary px-4 mt-3" />
                </form>
            </div>

        </div>
    </div>
</div>

@endsection
