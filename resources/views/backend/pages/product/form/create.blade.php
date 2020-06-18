@extends('b::layouts.master')
@section('meta_title', 'Dashboard | Product create')
@section('content')
<div class="card mt-5">
    <div class="card-header">
        <h1>{{ __('b::product.title.create') }}</h1>
    </div>

    <div class="card-body">

        {!! Form::open(['route' => 'backend.product.store', 'files' => true, 'errors' => $errors]) !!}

        @include('b:product::form.elements')

        {!! Form::close() !!}

    </div>
</div>
@endsection
