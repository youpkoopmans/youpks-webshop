@extends('b::layouts.master')
@section('meta_title', 'Dashboard | Brand')
@section('content')
<div class="card mt-5">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h1>{{ __('b::brand.title.index') }}</h1>
        <a class="btn btn-success" href="{{ route('backend.brand.create') }}">{{ __('b::brand.button.add') }}</a>
    </div>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <table class="table">
            <tr>
                <th class="w-25">{{ __('b::brand.table.id') }}</th>
                <th>{{ __('b::brand.table.title') }}</th>
                <th>{{ __('b::brand.table.active') }}</th>
                <th colspan="2" class="w-25">{{ __('b::brand.table.options') }}</th>
            </tr>
            @forelse($brands as $brand)
                <tr>
                    <td>{{ $brand->id }}</td>
                    <td>{{ $brand->title }}</td>
                    <td>{!! $brand->active !!}</td>
                    <td>
                        <a class="btn btn-dark" href="{{ route('backend.brand.edit', $brand->id) }}">
                            {{ __('b::brand.button.edit') }}
                        </a>
                    </td>
                    <td>
                        <a class="btn btn-danger" href="{{ route('backend.brand.destroy', $brand->id) }}">
                            {{ __('b::brand.button.delete') }}
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">
                        {{ __('b::brand.table.no-results') }}
                    </td>
                </tr>
            @endforelse
        </table>
        <a class="btn btn-success" href="{{ route('backend.brand.export-excel') }}">{{ __('b::brand.button.export-excel') }}</a>
    </div>
</div>
@endsection
