<div class="row">
    <div class="col-md-6">
        <div class="form-group row">
            {!! Form::label('root_category', 'Root category', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
            <div class="col-md-8">
                {!! Form::select('root_category', $categories, isset($category) ? [$category->getRoot()->title => $category->getRoot()->id] : old('root_category'), ['class' => 'form-control', 'placeholder' => 'No root']) !!}
            </div>
        </div>

        <div class="form-group row">
            {!! Form::label('title', 'Title', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
            <div class="col-md-8">
                {!! Form::text('title', isset($category) ? $category->title : old('title'), ['class' => 'form-control']) !!}
                @error('title')
                <span class="validation-error">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            {!! Form::label('published_at', 'Active', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
            <div class="col-md-8">
                <div class="btn-group btn-group-toggle w-100" data-toggle="buttons">
                    <label class="btn btn-outline-secondary w-50">
                        {!! Form::input('radio', 'active', 1,  [isset($category) && $category->published_at != null ? 'checked' : null]) !!}
                        <i class="fa fa-check"></i> Yes
                    </label>
                    <label class="btn btn-outline-secondary w-50">
                        {!! Form::input('radio', 'active', 0,  [isset($category) && $category->published_at == null ? 'checked' : null]) !!}
                        <i class="fa fa-ban"></i> No
                    </label>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="float-right">
    {!! Form::submit('Send', ['class' => 'btn btn-primary']) !!}
    <a class="btn btn-dark" href="{{ route('backend.category.index') }}">Back</a>
</div>

