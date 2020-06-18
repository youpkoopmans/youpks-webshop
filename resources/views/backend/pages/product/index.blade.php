@extends('b::layouts.master')
@section('meta_title', 'Dashboard | Product')
@section('content')
<div class="card mt-5">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h1>{{ __('b::product.title.index') }}</h1>
        {!! Html::linkRoute('backend.product.create', __('b::product.button.add'), null, ['class' => 'btn btn-success']) !!}
    </div>

    <div class="card-body">
       <x-alert message="{{session('status')}}"/>
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
                        {!! Html::linkRoute('backend.product.edit', __('b::product.button.edit'), [$product->id], ['class' => 'btn btn-dark']) !!}
                    </td>
                    <td>
                        {!! Html::linkRoute('backend.product.destroy', __('b::product.button.delete'), [$product->id], ['class' => 'btn btn-danger']) !!}
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
        {!! Html::linkRoute('backend.product.export-excel', __('b::product.button.export-excel'), null, ['class' => 'btn btn-success']) !!}
    </div>
</div>
@endsection
