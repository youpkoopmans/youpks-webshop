@extends('b::layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {!! Form::open(['route' => 'password.email', 'errors' => $errors]) !!}

                        {!! Form::group_open('email row') !!}
                            {!! Form::label('email', __('b::auth.label.email-adress'), ['class' => 'col-md-4 text-md-right']) !!}
                            <div class="col-md-6">
                                {!! Form::text('email', old('email')) !!}
                            </div>
                        {!! Form::group_close() !!}

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                {!! Form::submit(__('Send Password Reset Link'), ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
