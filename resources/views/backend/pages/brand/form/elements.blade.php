<div class="row">
    <div class="col-md-6">
        <div class="form-group row">
            {!! Form::label('title', __('backend/brand.label.title'), ['class' => 'col-md-4 col-form-label text-md-right']) !!}
            <div class="col-md-8">
                {!! Form::text('title', isset($brand) ? $brand->title : old('title'), ['class' => 'form-control']) !!}
                @error('title')
                <span class="validation-error">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            {!! Form::label('published_at', __('backend/brand.label.active'), ['class' => 'col-md-4 col-form-label text-md-right']) !!}
            <div class="col-md-8">
                <div class="btn-group btn-group-toggle w-100" data-toggle="buttons">
                    <label class="btn btn-outline-secondary w-50">
                        {!! Form::input('radio', 'active', 1,  [isset($brand) && $brand->published_at != null ? 'checked' : null]) !!}
                        <i class="fa fa-check"></i> {{ __('backend/brand.label.yes') }}
                    </label>
                    <label class="btn btn-outline-secondary w-50">
                        {!! Form::input('radio', 'active', 0,  [isset($brand) && $brand->published_at == null ? 'checked' : null]) !!}
                        <i class="fa fa-ban"></i> {{ __('backend/brand.label.no') }}
                    </label>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="float-right">
    {!! Form::submit(__('backend/brand.button.send'), ['class' => 'btn btn-primary']) !!}
    <a class="btn btn-dark" href="{{ route('backend.brand.index') }}"> {{ __('backend/brand.button.back') }}</a>
</div>

