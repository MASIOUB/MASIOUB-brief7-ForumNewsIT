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
                            <img src="{{ asset($post->image) }}" class="card-img" style="height: 100%;object-fit: cover" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h1 class="card-title">{{ $post->title }}</h1>
                                <p class="card-text">{{ $post->description }}</p>
                                <div class="row align-items-center p-3" style="gap: 10px;">
                                    <!-- <a href="#" class="btn btn-primary d-block mx-0 d-inline-block w-100">Read More</a> -->
                                    <div class="w-100 d-flex" style="gap: 10px;">

                                        <a href="#" class="btn btn-warning w-md-25 w-50">Edit</a>

                                        <form action="#" method="GET" class="w-50">
                                            @csrf
                                            @method('DELETE')
                                            <!-- <a href="" class="btn btn-danger col-3">Delete</a> -->
                                            <button class="btn btn-danger w-100" type="submit">Delete</button>
                                            <input type="hidden" name="id" value="{{ $post->id }}" />
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="{{ asset($Post->image) }}" height="300" class=" rounded-start"
                alt="{{ $post->title }}">
            </div>
            <div class="col-md-6">
                <div class="card-body text-black">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ $post->description }}</p>


                </div>
            </div>
        </div> --}}

    </div>

    {{-- end of column --}}
    @endforeach



</div>
</div>
</div>


@endsection