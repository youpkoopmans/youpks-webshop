@extends('b::layouts.master')
@section('meta_title', 'Dashboard | Category edit')
@section('content')
<div class="card mt-5">
    <div class="card-header">
        <h1>{{ __('b::category.title.edit') }}</h1>
    </div>

    <div class="card-body">

        {!! Form::open(['route' => ['backend.category.update', $category->id], 'errors' => $errors]) !!}

        @include('b:category::form.elements')

        {!! Form::close() !!}

    </div>
</div>
@endsection
