@extends('b::layouts.master')
@section('meta_title', 'Dashboard | Category edit')
@section('content')
<div class="card mt-5">
    <div class="card-header">
        <h1>Category edit</h1>
    </div>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        {!! Form::open(['route' => ['backend.category.update', $category->id], 'errors' => $errors]) !!}

        @include('b:category::form.elements')

        {!! Form::close() !!}

    </div>
</div>
@endsection
