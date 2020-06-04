@extends('b::layouts.master')
@section('meta_title', 'Dashboard | Brand')
@section('content')
<div class="card mt-5">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h1>{{ __('backend/brand.title.index') }}</h1>
        <a class="btn btn-success" href="{{ route('backend.brand.create') }}">{{ __('backend/brand.button.add') }}</a>
    </div>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <table class="table">
            <tr>
                <th class="w-25">{{ __('backend/brand.table.id') }}</th>
                <th>{{ __('backend/brand.table.title') }}</th>
                <th>{{ __('backend/brand.table.active') }}</th>
                <th colspan="2" class="w-25">{{ __('backend/brand.table.options') }}</th>
            </tr>
            @forelse($brands as $brand)
                <tr>
                    <td>{{ $brand->id }}</td>
                    <td>{{ $brand->title }}</td>
                    <td>{!! $brand->active !!}</td>
                    <td>
                        <a class="btn btn-dark" href="{{ route('backend.brand.edit', $brand->id) }}">
                            {{ __('backend/brand.button.edit') }}
                        </a>
                    </td>
                    <td>
                        <a class="btn btn-danger" href="{{ route('backend.brand.destroy', $brand->id) }}">
                            {{ __('backend/brand.button.delete') }}
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">
                        {{ __('backend/brand.table.no-results') }}
                    </td>
                </tr>
            @endforelse
        </table>
    </div>
</div>
@endsection
