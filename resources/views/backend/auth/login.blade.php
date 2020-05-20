@extends('backend.layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    {!! Form::open(['route' => 'login', 'errors' => $errors]) !!}

                        <div class="form-group row">
                            {!! Form::label('email', __('E-Mail Address'), ['class' => 'col-md-4 col-form-label text-md-right']) !!}
                            <div class="col-md-6">
                                {!! Form::text('email', old('email'), ['class' => 'form-control']) !!}
                                @error('email')
                                    <span class="validation-error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            {!! Form::label('password', __('Password'), ['class' => 'col-md-4 col-form-label text-md-right']) !!}
                            <div class="col-md-6">
                                {!! Form::password('password', ['class' => 'form-control']) !!}
                                @error('password')
                                    <span class="validation-error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                {!! Form::checkbox('remember', null, ['class' => 'form-check-input']) !!}
                                {!! Form::label('remember', __('Remember Me'), ['class' => 'form-check-label']) !!}
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                {!! Form::submit(__('Login'), ['class' => 'btn btn-primary']) !!}
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection