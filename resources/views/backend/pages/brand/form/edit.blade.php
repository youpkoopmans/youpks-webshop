@extends('backend.layouts.master')
@section('meta_title', 'Dashboard | Brand edit')
@section('content')
<div class="card mt-5">
    <div class="card-header">
        <h1>Brand edit</h1>
    </div>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        {!! Form::open(['route' => ['backend.brand.update', $brand->id], 'errors' => $errors]) !!}

        @include('backend.pages.brand.form.elements')

        {!! Form::close() !!}

    </div>
</div>
@endsection
