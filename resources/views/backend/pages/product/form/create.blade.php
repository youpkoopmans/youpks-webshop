@extends('backend.layouts.master')
@section('meta_title', 'Dashboard | Product create')
@section('content')
<div class="card mt-5">
    <div class="card-header">
        <h1>Product create</h1>
    </div>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        {!! Form::open(['route' => 'backend.product.store', 'errors' => $errors]) !!}

        @include('backend.pages.product.form.elements')

        {!! Form::close() !!}

    </div>
</div>
@endsection
