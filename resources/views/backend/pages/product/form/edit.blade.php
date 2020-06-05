@extends('b::layouts.master')
@section('meta_title', 'Dashboard | Product edit')
@section('content')
<div class="card mt-5">
    <div class="card-header">
        <h1>{{ __('b::product.title.edit') }}</h1>
    </div>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        {!! Form::open(['route' => ['backend.product.update', $product->id], 'files' => true, 'errors' => $errors]) !!}

        @include('b:product::form.elements')

        {!! Form::close() !!}

    </div>
</div>
@endsection
