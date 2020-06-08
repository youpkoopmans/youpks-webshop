@extends('b::layouts.master')
@section('meta_title', 'Dashboard | Product')
@section('content')
<div class="card mt-5">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h1>{{ __('b::product.title.index') }}</h1>
        <a class="btn btn-success" href="{{ route('backend.product.create') }}">{{ __('b::product.button.add') }}</a>
    </div>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <table class="table">
            <tr>
                <th class="w-25">{{ __('b::product.table.id') }}</th>
                <th>{{ __('b::product.table.title') }}</th>
                <th>{{ __('b::product.table.active') }}</th>
                <th colspan="2" class="w-25">{{ __('b::product.table.options') }}</th>
            </tr>
            @forelse($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->title }}</td>
                    <td>{!! $product->active !!}</td>
                    <td>
                        <a class="btn btn-dark" href="{{ route('backend.product.edit', $product->id) }}">
                            {{ __('b::product.button.edit') }}
                        </a>
                    </td>
                    <td>
                        <a class="btn btn-danger" href="{{ route('backend.product.destroy', $product->id) }}">
                            {{ __('b::product.button.delete') }}
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">
                        {{ __('b::product.table.no-results') }}
                    </td>
                </tr>
            @endforelse
        </table>
        <a class="btn btn-success" href="{{ route('backend.product.export-excel') }}">{{ __('b::product.button.export-excel') }}</a>
    </div>
</div>
@endsection
