@extends('b::layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5">
                <div class="card-header">{{ __('b::auth.title.login') }}</div>

                <div class="card-body">
                    {!! Form::open(['route' => 'login', 'errors' => $errors]) !!}

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

                        {!! Form::group_open('remember row') !!}
                            <div class="col-md-6 offset-md-4">
                                {!! Form::checkbox('remember', null, ['class' => 'form-check-input']) !!}
                                {!! Form::label('remember', __('b::auth.label.remember-password')) !!}
                            </div>
                        {!! Form::group_close() !!}

                        {!! Form::group_open('row mb-0') !!}
                            <div class="col-md-8 offset-md-4">
                                {!! Form::submit(__('b::auth.button.login'), ['class' => 'btn btn-primary']) !!}
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('b::auth.label.forgot-password') }}
                                    </a>
                                @endif
                            </div>
                        {!! Form::group_close() !!}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
