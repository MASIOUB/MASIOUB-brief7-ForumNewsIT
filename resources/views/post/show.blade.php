@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center align-items-center">
            <div class="col-lg-6 col-md-10 col-sm-12">
                <img src="{{ asset('uploads/post/' . $post->image) }}" style="height: auto" width="100%" />
            </div>

            <div class="col-lg-6 col-md-10 col-sm-12  ">

                <h1 class="">{{ $post->title }}</h1>
                <ul class="list-inline">
                    <li>Posted on {{ $post->created_at }} - by {{ $post->user->name }}</li>
                </ul>

                <p class="lead mt-5">{{ $post->description }}</p>

                @auth

                    <div class="row justify-content-between" style="gap: 5px;">
                        <div class="d-flex align-items-center" style="gap: 5px;">
                            <div class="d-flex">
                                <div class="input-group">
                                    <div class="input-group-btn">
                                        <a type="button" id="increaseButton" href="{{ route('posts@upvote', $post->id) }}"
                                            class="btn btn-success" style="border-radius: 50%;">
                                            <i class="fas fa-thumbs-up"></i>
                                        </a>
                                    </div>
                                </div>

                                <div class="input-group">
                                    <div class="input-group-btn">

                                        <a type="button" id="decreaseButton" href="{{ route('posts@downvote', $post->id) }}"
                                            class="btn btn-danger" style="border-radius: 50%;">
                                            <i class="fas fa-thumbs-down"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <p class="my-0">{{count($upvotes)}} Upvotes, {{count($downvotes)}} Downvotes</p>
                            {{-- <p>{{count($downvotes)}}</p> --}}
                        </div>
                    </div>
                @endauth
            </div>
            <div class=" mb-5 mt-5">
                <div class="container">
                    @auth
                        <form action="{{ route('comments@store') }}" method="POST">
                            @csrf
                            Leave a response
                            <textarea cols="30" rows="4" name="comment" class="form-control"></textarea>
                            <input type="hidden" name="Post_id" value="{{ $post->id }}">
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <button class="btn btn-primary mt-3">Submit</button>
                        </form>
                    @endauth
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class=" my-5">comment section :</h3>
                            <div class="row">
                                @foreach ($post->comments as $item)
                                    <div class="col-md-12 ">
                                        <div class="media"> <img class="mr-3 rounded-circle"
                                                alt="Bootstrap Media Preview" height="70" width="70"
                                                src="https://www.logolynx.com/images/logolynx/5c/5c5fbe66daa900ad13c9a0046596c465.png" />
                                            <div class="media-body">
                                                <div class="row">
                                                    <div class="col-8 d-flex">
                                                        <h5>{{ $item->user->name }} - </h5> <span>
                                                            {{ $item->created_at }}</span> -
                                                        @if (Auth::user()->role == 'admin' || Auth::user()->id == $item->user_id)
                                                            <a
                                                                href="{{ route('comments@destroy', $item->id) }}">supprimer</a>
                                                        @endif
                                                    </div>

                                                </div>{{ $item->comment }}
                                            </div>

                                        </div>
                                        <hr>
                                    </div>
                                @endforeach


                            </div>
                        </div>
                    </div>

                </div>
            </div>


        </div>
    </div> <!-- /container -->
@endsection
