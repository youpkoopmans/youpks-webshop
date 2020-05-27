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
            @forelse($brands as $brand)
                <tr>
                    <td>{{ $brand->id }}</td>
                    <td>{{ $brand->title }}</td>
                    <td>{!! $brand->active !!}</td>
                    <td><a class="btn btn-dark" href="{{ route('backend.brand.edit', $brand->id) }}">Edit</a></td>
                    <td><a class="btn btn-danger" href="{{ route('backend.brand.destroy', $brand->id) }}">Delete</a></td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">
                        Er zijn geen resultaten.
                    </td>
                </tr>
            @endforelse
        </table>
    </div>
</div>
@endsection
