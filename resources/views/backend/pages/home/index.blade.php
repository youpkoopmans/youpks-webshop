@extends('b::layouts.master')
@section('meta_title', 'Dashboard')
@section('content')
<div class="card mt-5">
    <div class="card-header">
        <h1>Dashboard</h1>
    </div>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

    </div>
</div>
@endsection
