@extends('b::layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5">
                <div class="card-header">{{ __('b::auth.title.register') }}</div>

                <div class="card-body">
                    {!! Form::open(['route' => 'register', 'errors' => $errors]) !!}
                        <div class="form-group row">
                            {!! Form::label('name', __('b::auth.label.name'), ['class' => 'col-md-4 col-form-label text-md-right']) !!}
                            <div class="col-md-6">
                                {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                                @error('name')
                                    <span class="validation-error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            {!! Form::label('email', __('b::auth.label.email-adress'), ['class' => 'col-md-4 col-form-label text-md-right']) !!}
                            <div class="col-md-6">
                                {!! Form::text('email', old('email'), ['class' => 'form-control']) !!}
                                @error('email')
                                    <span class="validation-error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('b::auth.label.password') }}</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password">
                                @error('password')
                                    <span class="validation-error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('b::auth.label.confirm-password') }}</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password_confirmation">
                                @error('password_confirmation')
                                    <span class="validation-error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                {!! Form::submit(__('b::auth.button.register'), ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
