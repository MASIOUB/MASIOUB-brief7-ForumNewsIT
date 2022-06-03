@extends('layouts.app')

@section('content')
    <div class="container">

        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif



        {{-- toolbar --}}
        <div class="row justify-content-center">
            <div class="col-11 row">
                @foreach ($posts as $post)
                    {{-- begin of column --}}
                    <div class="col-12  mb-3">
                        <div class="card mb-3">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="{{ asset('uploads/post/' . $post->image) }}" class="card-img"
                                        style="height: 100%;object-fit: cover" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h1 class="card-title">{{ $post->title }}</h1>
                                        <p class="mb-4" style="color: #747474">Posted on {{ $post->created_at }} - Category : <a href="{{ route('posts@index') . '?category=' . $post->category->id }}" style="text-decoration: none">{{$post->category->name}}</a></p>
                                        <p class="card-text">{{ $post->description }}</p>
                                        <div class="p-0 d-flex align-items-center">
                                            <a href="{{ url('posts/show_post/' . $post->id) }}"
                                                class="btn btn-primary mx-0">Read More</a>
                                            <div class="d-flex" style="gap: 10px;">

                                                <p>{{ $post->user_id }}</p>

                                                @auth

                                                    @if (auth()->user()->id == $post->created_by)
                                                        {{-- <a href="#" class="btn btn-warning w-md-25 w-50">Edit</a> --}}

                                                        <form action="#" method="GET">
                                                            @csrf
                                                            @method('PUT')
                                                            <a href="{{ url('posts/edit_post/' . $post->id) }}"
                                                                class="btn btn-success">edit</a>

                                                        </form>

                                                        <form action="#" method="GET">
                                                            @csrf
                                                            @method('DELETE')
                                                            <a href="{{ url('posts/delete_post/' . $post->id) }}"
                                                                class="btn btn-danger">Delete</a>

                                                        </form>
                                                    @endif

                                                @endauth

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    {{-- end of column --}}
                @endforeach



            </div>
        </div>
    </div>
@endsection
