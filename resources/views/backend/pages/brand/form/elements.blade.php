<div class="row">
    <div class="col-md-6">

        {!! Form::group_open('title row') !!}
            {!! Form::label('title', __('b::brand.label.title'), ['class' => 'col-md-4 text-md-right']) !!}
            <div class="col-md-8">
                {!! Form::text('title', isset($brand) ? $brand->title : old('title')) !!}
            </div>
        {!! Form::group_close() !!}

        {!! Form::group_open('published_at row') !!}
            {!! Form::label('published_at', __('b::brand.label.active'), ['class' => 'col-md-4 text-md-right']) !!}
            <div class="col-md-8">
                <div class="btn-group btn-group-toggle w-100" data-toggle="buttons">
                    <label class="btn btn-outline-secondary w-50">
                        {!! Form::input('radio', 'active', 1,  [isset($brand) && $brand->published_at != null ? 'checked' : null]) !!}
                        <i class="fa fa-check"></i> {{ __('b::brand.label.yes') }}
                    </label>
                    <label class="btn btn-outline-secondary w-50">
                        {!! Form::input('radio', 'active', 0,  [isset($brand) && $brand->published_at == null ? 'checked' : null]) !!}
                        <i class="fa fa-ban"></i> {{ __('b::brand.label.no') }}
                    </label>
                </div>
            </div>
        {!! Form::group_close() !!}

    </div>
</div>

<div class="float-right">
    {!! Form::submit(__('b::brand.button.send'), ['class' => 'btn btn-primary']) !!}
    <a class="btn btn-dark" href="{{ route('backend.brand.index') }}"> {{ __('b::brand.button.back') }}</a>
</div>

