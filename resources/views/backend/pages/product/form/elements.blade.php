<div class="col-md-6">
    <div class="form-group row">
        {!! Form::label('title', 'title', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
        <div class="col-md-8">
            {!! Form::text('title', isset($product) ? $product->title : old('title'), ['class' => 'form-control']) !!}
            @error('title')
            <span class="validation-error">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        {!! Form::label('slug', 'slug', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
        <div class="col-md-8">
            {!! Form::text('slug', isset($product) ? $product->slug : old('slug'), ['class' => 'form-control']) !!}
            @error('slug')
            <span class="validation-error">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        {!! Form::label('intro', 'intro', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
        <div class="col-md-8">
            {!! Form::textarea('intro', isset($product) ? $product->intro : old('intro'), ['class' => 'form-control', 'rows' => '2']) !!}
            @error('intro')
            <span class="validation-error">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        {!! Form::label('body', 'body', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
        <div class="col-md-8">
            {!! Form::textarea('body', isset($product) ? $product->body : old('body'), ['class' => 'form-control']) !!}
            @error('body')
            <span class="validation-error">{{ $message }}</span>
            @enderror
        </div>
    </div>

</div>
<div class="float-right">
    {!! Form::submit('Send', ['class' => 'btn btn-primary']) !!}
    <a class="btn btn-dark" href="{{ route('backend.product.index') }}">Back</a>
</div>

