@extends('layouts.master')

@section('content')


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
                        <th>Name</th>
                        <th>Email</th>
                        <th>Delete</th>
                        <th>Show</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $item)
                    <tr>
                        <td>{{$item->id }}</td>
                        <td>{{$item->name }}</td>
                        <td>{{$item->email }}</td>
                        <td>
                            <a href="{{ url('admin/delete-user/' . $item->id) }}" class="btn btn-danger">Delete</a>
                        </td>
                        <td>
                            <a href="{{ url('admin/show-user/' . $item->id) }}" class="btn btn-primary">Show</a>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
