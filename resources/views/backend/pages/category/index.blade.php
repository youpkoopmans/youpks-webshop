@extends('b::layouts.master')
@section('meta_title', 'Dashboard | Category')
@section('content')
<div class="card mt-5">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h1>{{ __('b::category.title.index') }}</h1>
        {!! Html::linkRoute('backend.category.create', __('b::category.button.add'), null, ['class' => 'btn btn-success']) !!}
    </div>

    <div class="card-body">
        <x-alert message="{{session('status')}}"/>
        <table class="table">
            <tr>
                <th>{{ __('b::category.table.title') }}</th>
                <th>{{ __('b::category.table.active') }}</th>
                <th colspan="2" class="w-25">{{ __('b::category.table.options') }}</th>
            </tr>
            @forelse($categories as $category)
                <tr>
                    <td>{{ $category->title }}</td>
                    <td>{!! $category->active !!}</td>
                    <td>
                        {!! Html::linkRoute('backend.category.edit', __('b::category.button.edit'), [$category->id], ['class' => 'btn btn-dark']) !!}
                    </td>
                    <td>
                        {!! Html::linkRoute('backend.category.destroy', __('b::category.button.delete'), [$category->id], ['class' => 'btn btn-danger']) !!}
                    </td>
                </tr>
                @foreach($category->children as $category)
                    <tr>
                        <td>----- {{ $category->title }}</td>
                        <td>{!! $category->active !!}</td>
                        <td>
                            {!! Html::linkRoute('backend.category.edit', __('b::category.button.edit'), [$category->id], ['class' => 'btn btn-dark']) !!}
                        </td>
                        <td>
                            {!! Html::linkRoute('backend.category.destroy', __('b::category.button.delete'), [$category->id], ['class' => 'btn btn-danger']) !!}
                        </td>
                    </tr>
                    @foreach($category->children as $category)
                        <tr>
                            <td>---------- {{ $category->title }}</td>
                            <td>{!! $category->active !!}</td>
                            <td>
                                {!! Html::linkRoute('backend.category.edit', __('b::category.button.edit'), [$category->id], ['class' => 'btn btn-dark']) !!}
                            </td>
                            <td>
                                {!! Html::linkRoute('backend.category.destroy', __('b::category.button.delete'), [$category->id], ['class' => 'btn btn-danger']) !!}
                            </td>
                        </tr>
                    @endforeach
                @endforeach
            @empty
                <tr>
                    <td colspan="5">
                        {{ __('b::category.table.no-results') }}
                    </td>
                </tr>
            @endforelse
        </table>
        {!! Html::linkRoute('backend.category.export-excel', __('b::category.button.export-excel'), null, ['class' => 'btn btn-success']) !!}
    </div>
</div>
@endsection
