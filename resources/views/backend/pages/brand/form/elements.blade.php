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
                {!! Form::published_at('brand',
                    [isset($brand) && $brand->published_at != null ? 'checked' : null],
                    [isset($brand) && $brand->published_at == null ? 'checked' : null]
                ) !!}
            </div>
        {!! Form::group_close() !!}

    </div>
</div>

<div class="float-right">
    {!! Form::submit(__('b::brand.button.send'), ['class' => 'btn btn-primary']) !!}
    {!! Html::linkRoute('backend.brand.index', __('b::brand.button.back'), null, ['class' => 'btn btn-dark']) !!}
</div>

