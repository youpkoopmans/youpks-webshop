@extends('backend.layouts.master')
@section('meta_title', 'Dashboard | Brand')
@section('content')
<div class="card mt-5">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h1>Brands</h1>
        <a class="btn btn-success" href="{{ route('backend.brand.create') }}">Add brand</a>
    </div>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <table class="table">
            <tr>
                <th class="w-25">ID</th>
                <th>Title</th>
                <th>Active</th>
                <th colspan="2" class="w-25">Options</th>
            </tr>
            @foreach($brands as $brand)
                <tr>
                    <td>{{ $brand->id }}</td>
                    <td>{{ $brand->title }}</td>
                    <td>{!! $brand->active !!}</td>
                    <td><a class="btn btn-dark" href="{{ route('backend.brand.edit', $brand->id) }}">Edit</a></td>
                    <td><button data-id="{{$brand->id}}" class="btn btn-danger delete-brand">Delete</button></td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
