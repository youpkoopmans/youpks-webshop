@extends('backend.layouts.master')
@section('meta_title', 'Dashboard | Product')
@section('content')
<div class="card mt-5">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h1>Products</h1>
        <a class="btn btn-success" href="{{ route('backend.product.create') }}">Add product</a>
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
                <th colspan="2" class="w-25">Options</th>
            </tr>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->title }}</td>
                    <td><a class="btn btn-dark" href="{{ route('backend.product.edit', $product->id) }}">Edit</a></td>
                    <td><a class="btn btn-danger" href="{{ route('backend.product.destroy', $product->id) }}">Delete</a></td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection