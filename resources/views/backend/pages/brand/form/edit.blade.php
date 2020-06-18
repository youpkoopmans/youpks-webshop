@extends('b::layouts.master')
@section('meta_title', 'Dashboard | Brand edit')
@section('content')
<div class="card mt-5">
    <div class="card-header">
        <h1>{{ __('b::brand.title.edit') }}</h1>
    </div>

    <div class="card-body">
        {!! Form::open(['route' => ['backend.brand.update', $brand->id], 'errors' => $errors]) !!}

        @include('b:brand::form.elements')

        {!! Form::close() !!}

    </div>
</div>
@endsection
