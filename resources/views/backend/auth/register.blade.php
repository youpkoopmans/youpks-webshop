@extends('b::layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5">
                <div class="card-header">{{ __('b::auth.title.register') }}</div>

                <div class="card-body">
                    {!! Form::open(['route' => 'register', 'errors' => $errors]) !!}

                        {!! Form::group_open('name row') !!}
                            {!! Form::label('name', __('b::auth.label.name'), ['class' => 'col-md-4 text-md-right']) !!}
                            <div class="col-md-6">
                                {!! Form::text('name', old('name')) !!}
                            </div>
                        {!! Form::group_close() !!}

                        {!! Form::group_open('email row') !!}
                            {!! Form::label('email', __('b::auth.label.email-adress'), ['class' => 'col-md-4 text-md-right']) !!}
                            <div class="col-md-6">
                                {!! Form::text('email', old('email')) !!}
                            </div>
                        {!! Form::group_close() !!}

                        {!! Form::group_open('password row') !!}
                            {!! Form::label('password', __('b::auth.label.password'), ['class' => 'col-md-4 text-md-right']) !!}
                            <div class="col-md-6">
                                {!! Form::password('password') !!}
                            </div>
                        {!! Form::group_close() !!}

                        {!! Form::group_open('password-confirm row') !!}
                        {!! Form::label('password-confirm', __('b::auth.label.confirm-password'), ['class' => 'col-md-4 text-md-right']) !!}
                            <div class="col-md-6">
                                {!! Form::password('password_confirmation') !!}
                            </div>
                        {!! Form::group_close() !!}

                        {!! Form::group_open('row mb-0') !!}
                            <div class="col-md-8 offset-md-4">
                                {!! Form::submit(__('b::auth.button.register'), ['class' => 'btn btn-primary']) !!}
                            </div>
                        {!! Form::group_close() !!}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
