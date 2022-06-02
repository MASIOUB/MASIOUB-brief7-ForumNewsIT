@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center align-items-center">
        <div class="col-lg-6 col-md-10 col-sm-12">
            <img src="#" style="height: auto" width="100%" />
        </div>

        <div class="col-lg-6 col-md-10 col-sm-12  ">

            <h1 class="">{{ $post->title }}</h1>
            <ul class="list-inline">
                <li>Date | {{ $post->created_at }}</li>
            </ul>
            <p class="lead mt-5">{{ $post->description }}</p>
            @auth

            <div class="row justify-content-between" style="gap: 5px;">
                <div class="d-flex align-items-center" style="gap: 5px;">
                    <div>
                        <div class="input-group d-flex">
                            <div class="input-group-btn">

                                {{-- @if ($hasVoted) --}}
                                {{-- <a type="button" id="decreaseButton" href="#"
                                class="btn btn-danger">
                                <i class="fas fa-thumbs-down"></i>
                                </a> --}}
                                {{-- @else --}}
                                <a type="button" id="increaseButton" href="#" class="btn btn-success" style="border-radius: 50%;">
                                    <i class="fas fa-thumbs-up"></i>
                                </a>
                                {{-- @endif --}}
                                <input type="hidden" class="form-control" disabled id="vote" placeholder="Vote" value="#" />
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="input-group">
                            <div class="input-group-btn">

                                <a type="button" id="decreaseButton" href="#" class="btn badge-danger" style="border-radius: 50%;">
                                    <i class="fas fa-thumbs-down"></i>
                                </a>
                                <input type="hidden" class="form-control" disabled id="vote" placeholder="Vote" value="#" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <!-- <p class="my-0">{{ $upvotes }} Upvotes, {{ $downvotes }} Downvotes</p> -->
                </div>
            </div>
            @endauth
        </div>

        {{-- <div class="col-lg-3  col-md-3 col-sm-12">
                <div class="well">
                    <h2>Subscription Box</h2>
                    <p>Form Description Goes here</p>
                    <div class="input-group">
      <input type="text" class="form-control" placeholder="Search for...">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button">Go!</button>
      </span>
    </div>
                </div>
                <div class="well">
                    <h2>Share love</h2>
                    <ul class="list-inline">
                        <li><span class="glyphicon glyphicon-heart" aria-hidden="true"></span></li>
                        <li><span class="glyphicon glyphicon-heart" aria-hidden="true"></span></li>
                        <li><span class="glyphicon glyphicon-heart" aria-hidden="true"></span></li>
                        <li><span class="glyphicon glyphicon-heart" aria-hidden="true"></span></li>

                    </ul>
                </div>
                <div class="well">
                    <h2>About Author</h2>
                    <img src="" class="img-rounded" />
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna</p>
                    <a href="#" class="btn btn-default">Read more</a>
                </div>
                <div class="list-group">
                    <a class="list-group-item active" href="#"> <h4 class="list-group-item-heading">List group item heading</h4> <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p> </a>
                    <a class="list-group-item" href="#"> <h4 class="list-group-item-heading">List group item heading</h4> <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p> </a>
                    <a class="list-group-item" href="#"> <h4 class="list-group-item-heading">List group item heading</h4> <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p> </a> </div>
                <div class="well">
                    <div class="media"> <div class="media-left"> <a href="#"> <img data-src="holder.js/64x64" class="media-object" alt="64x64" style="width: 64px; height: 64px;" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iNjQiIGhlaWdodD0iNjQiIHZpZXdCb3g9IjAgMCA2NCA2NCIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+PCEtLQpTb3VyY2UgVVJMOiBob2xkZXIuanMvNjR4NjQKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNTY5MjIxZTM1NSB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE1NjkyMjFlMzU1Ij48cmVjdCB3aWR0aD0iNjQiIGhlaWdodD0iNjQiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSIxMi41IiB5PSIzNi44Ij42NHg2NDwvdGV4dD48L2c+PC9nPjwvc3ZnPg==" data-holder-rendered="true"> </a> </div> <div class="media-body"> <h4 class="media-heading">Media heading</h4> Cras sit amet nibh libero, in gravida nulla.</div> </div>
                    <div class="media"> <div class="media-left"> <a href="#"> <img data-src="holder.js/64x64" class="media-object" alt="64x64" style="width: 64px; height: 64px;" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iNjQiIGhlaWdodD0iNjQiIHZpZXdCb3g9IjAgMCA2NCA2NCIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+PCEtLQpTb3VyY2UgVVJMOiBob2xkZXIuanMvNjR4NjQKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNTY5MjIxZTM1NSB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE1NjkyMjFlMzU1Ij48cmVjdCB3aWR0aD0iNjQiIGhlaWdodD0iNjQiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSIxMi41IiB5PSIzNi44Ij42NHg2NDwvdGV4dD48L2c+PC9nPjwvc3ZnPg==" data-holder-rendered="true"> </a> </div> <div class="media-body"> <h4 class="media-heading">Media heading</h4> Cras sit amet nibh libero, in gravida nulla.</div> </div>
                    <div class="media"> <div class="media-left"> <a href="#"> <img data-src="holder.js/64x64" class="media-object" alt="64x64" style="width: 64px; height: 64px;" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iNjQiIGhlaWdodD0iNjQiIHZpZXdCb3g9IjAgMCA2NCA2NCIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+PCEtLQpTb3VyY2UgVVJMOiBob2xkZXIuanMvNjR4NjQKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNTY5MjIxZTM1NSB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE1NjkyMjFlMzU1Ij48cmVjdCB3aWR0aD0iNjQiIGhlaWdodD0iNjQiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSIxMi41IiB5PSIzNi44Ij42NHg2NDwvdGV4dD48L2c+PC9nPjwvc3ZnPg==" data-holder-rendered="true"> </a> </div> <div class="media-body"> <h4 class="media-heading">Media heading</h4> Cras sit amet nibh libero, in gravida nulla.</div> </div>
                </div>
            </div> --}}
    </div>
    {{-- replies --}}
    <div class=" mb-5 mt-5">
        <div class="container">
            @auth
            <form action="#" method="POST">
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
                        


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div> <!-- /container -->
@endsection