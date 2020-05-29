@extends('backend.layouts.master')
@section('meta_title', 'Dashboard | Category')
@section('content')
<div class="card mt-5">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h1>Categories</h1>
        <a class="btn btn-success" href="{{ route('backend.category.create') }}">Add category</a>
    </div>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <table class="table">
            <tr>
                <th>Title</th>
                <th>Active</th>
                <th colspan="2" class="w-25">Options</th>
            </tr>
            @forelse($categories as $category)
                <tr>
                    <td>{{ $category->title }}</td>
                    <td>{!! $category->active !!}</td>
                    <td><a class="btn btn-dark" href="{{ route('backend.category.edit', $category->id) }}">Edit</a></td>
                    <td><a class="btn btn-danger" href="{{ route('backend.category.destroy', $category->id) }}">Delete</a></td>
                </tr>
                @foreach($category->children as $category)
                    <tr>
                        <td>----- {{ $category->title }}</td>
                        <td>{!! $category->active !!}</td>
                        <td><a class="btn btn-dark" href="{{ route('backend.category.edit', $category->id) }}">Edit</a></td>
                        <td><a class="btn btn-danger" href="{{ route('backend.category.destroy', $category->id) }}">Delete</a></td>
                    </tr>
                    @foreach($category->children as $category)
                        <tr>
                            <td>---------- {{ $category->title }}</td>
                            <td>{!! $category->active !!}</td>
                            <td><a class="btn btn-dark" href="{{ route('backend.category.edit', $category->id) }}">Edit</a></td>
                            <td><a class="btn btn-danger" href="{{ route('backend.category.destroy', $category->id) }}">Delete</a></td>
                        </tr>
                    @endforeach
                @endforeach
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
