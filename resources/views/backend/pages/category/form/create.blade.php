@extends('b::layouts.master')
@section('meta_title', 'Dashboard | Category create')
@section('content')
<div class="card mt-5">
    <div class="card-header">
        <h1>{{ __('b::category.title.create') }}</h1>
    </div>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        {!! Form::open(['route' => 'backend.category.store', 'errors' => $errors]) !!}

        @include('b:category::form.elements')

        {!! Form::close() !!}

    </div>
</div>
@endsection
