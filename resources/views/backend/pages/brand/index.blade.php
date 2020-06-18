@extends('b::layouts.master')
@section('meta_title', 'Dashboard | Brand')
@section('content')
<div class="card mt-5">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h1>{{ __('b::brand.title.index') }}</h1>
        {!! Html::linkRoute('backend.brand.create', __('b::brand.button.add'), null, ['class' => 'btn btn-success']) !!}
    </div>

    <div class="card-body">
        <x-alert message="{{session('status')}}"/>
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
                        {!! Html::linkRoute('backend.brand.edit', __('b::brand.button.edit'), [$brand->id], ['class' => 'btn btn-dark']) !!}
                    </td>
                    <td>
                        {!! Html::linkRoute('backend.brand.destroy', __('b::brand.button.delete'), [$brand->id], ['class' => 'btn btn-danger']) !!}
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
        {!! Html::linkRoute('backend.brand.export-excel', __('b::brand.button.export-excel'), null, ['class' => 'btn btn-success']) !!}
    </div>
</div>
@endsection
