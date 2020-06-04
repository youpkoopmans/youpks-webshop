@extends('b::layouts.master')
@section('meta_title', 'Dashboard | Brand create')
@section('content')
<div class="card mt-5">
    <div class="card-header">
        <h1>{{ __('backend/brand.title.create') }}</h1>
    </div>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        {!! Form::open(['route' => 'backend.brand.store', 'errors' => $errors]) !!}

        @include('b:brand::form.elements')

        {!! Form::close() !!}

    </div>
</div>
@endsection
