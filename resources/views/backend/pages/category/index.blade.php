@extends('b::layouts.master')
@section('meta_title', 'Dashboard | Category')
@section('content')
<div class="card mt-5">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h1>{{ __('backend/category.title.index') }}</h1>
        <a class="btn btn-success" href="{{ route('backend.category.create') }}">{{ __('backend/category.button.add') }}</a>
    </div>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <table class="table">
            <tr>
                <th>{{ __('backend/category.table.title') }}</th>
                <th>{{ __('backend/category.table.active') }}</th>
                <th colspan="2" class="w-25">{{ __('backend/category.table.options') }}</th>
            </tr>
            @forelse($categories as $category)
                <tr>
                    <td>{{ $category->title }}</td>
                    <td>{!! $category->active !!}</td>
                    <td>
                        <a class="btn btn-dark" href="{{ route('backend.category.edit', $category->id) }}">
                            {{ __('backend/category.button.edit') }}
                        </a>
                    </td>
                    <td>
                        <a class="btn btn-danger" href="{{ route('backend.category.destroy', $category->id) }}">
                            {{ __('backend/category.button.delete') }}
                        </a>
                    </td>
                </tr>
                @foreach($category->children as $category)
                    <tr>
                        <td>----- {{ $category->title }}</td>
                        <td>{!! $category->active !!}</td>
                        <td>
                            <a class="btn btn-dark" href="{{ route('backend.category.edit', $category->id) }}">
                                {{ __('backend/category.button.edit') }}
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-danger" href="{{ route('backend.category.destroy', $category->id) }}">
                                {{ __('backend/category.button.delete') }}
                            </a>
                        </td>
                    </tr>
                    @foreach($category->children as $category)
                        <tr>
                            <td>---------- {{ $category->title }}</td>
                            <td>{!! $category->active !!}</td>
                            <td>
                                <a class="btn btn-dark" href="{{ route('backend.category.edit', $category->id) }}">
                                    {{ __('backend/category.button.edit') }}
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-danger" href="{{ route('backend.category.destroy', $category->id) }}">
                                    {{ __('backend/category.button.delete') }}
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @endforeach
            @empty
                <tr>
                    <td colspan="5">
                        {{ __('backend/category.table.no-results') }}
                    </td>
                </tr>
            @endforelse
        </table>
    </div>
</div>
@endsection
