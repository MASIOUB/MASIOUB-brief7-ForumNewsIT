@extends('layouts.master')

@section('centent')

<div class="container">
    <div class="card">
        <div class="card-body">
            @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Category Name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $item)
                    <tr>
                        <td>{{$item->id }}</td>
                        <td>
                            <img src="{{ asset('uploads/post/'.$item->image) }}" alt="">
                        </td>
                        <td>{{$item->title }}</td>
                        <td>{{$item->category_name }}</td>
                    </tr>
                        
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection