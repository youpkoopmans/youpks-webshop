<div class="row">
    <div class="col-md-6">
        <div class="form-group row">
            {!! Form::label('title', 'Title', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
            <div class="col-md-8">
                {!! Form::text('title', isset($product) ? $product->title : old('title'), ['class' => 'form-control']) !!}
                @error('title')
                <span class="validation-error">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            {!! Form::label('intro', 'Intro', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
            <div class="col-md-8">
                {!! Form::textarea('intro', isset($product) ? $product->intro : old('intro'), ['class' => 'form-control', 'rows' => '2']) !!}
                @error('intro')
                <span class="validation-error">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            {!! Form::label('body', 'Body', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
            <div class="col-md-8">
                {!! Form::textarea('body', isset($product) ? $product->body : old('body'), ['class' => 'form-control']) !!}
                @error('body')
                <span class="validation-error">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            {!! Form::label('brand', 'Brand', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
            <div class="col-md-8">
                {!! Form::select('brand_id', $brands, isset($product->brand) ? [$product->brand->title => $product->brand->id] : old('brand_id'), ['class' => 'form-control']) !!}
                @error('brand_id')
                <span class="validation-error">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            {!! Form::label('category', 'Category', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
            <div class="col-md-8">
                {!! Form::select('category_id', $categories, isset($product->category) ? [$product->category->title => $product->category->id] : old('category_id'), ['class' => 'form-control']) !!}
                @error('category_id')
                <span class="validation-error">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            {!! Form::label('price', 'Price', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
            <div class="col-md-8">
                {!! Form::number('price', isset($product) ? $product->price : old('price'), ['class' => 'form-control', 'step' => 'any']) !!}
                @error('price')
                <span class="validation-error">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            {!! Form::label('published_at', 'Active', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
            <div class="col-md-8">
                <div class="btn-group btn-group-toggle w-100" data-toggle="buttons">
                    <label class="btn btn-outline-secondary w-50">
                        {!! Form::input('radio', 'active', 1,  [isset($product) && $product->published_at != null ? 'checked' : null]) !!}
                        <i class="fa fa-check"></i> Yes
                    </label>
                    <label class="btn btn-outline-secondary w-50">
                        {!! Form::input('radio', 'active', 0,  [isset($product) && $product->published_at == null ? 'checked' : null]) !!}
                        <i class="fa fa-ban"></i> No
                    </label>
                </div>
            </div>
        </div>

    </div>
    <div class="col-md-6">
        <div class="form-group row">
            {!! Form::label('image', 'Image', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
            <div class="col-md-8">
                @if(isset($product->image))
                    <img src="{{asset($product->image)}}" alt="{{$product->image}}" id="image-edit-preview" class="img-fluid mb-3 rounded border bg-light">
                @endif
                    <img id="image-preview" src="" class="img-fluid mb-3 rounded border bg-light">
                {!! Form::file('image', ['id' => 'image-input', 'class' => 'd-block']) !!}
                @error('image')
                <span class="validation-error">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('images', 'Images', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
            <div class="col-md-8">
                @if(isset($product->files))
                    @foreach($product->files as $image)
                        <img src="{{asset($image->path)}}" alt="{{$image->path}}" class="img-fluid mb-3 rounded border bg-light">
                    @endforeach
                @endif
{{--                <img id="image-preview" src="" class="img-fluid mb-3 rounded border bg-light">--}}
                {!! Form::file('images[]', ['multiple']) !!}
{{--                @error('image')--}}
{{--                <span class="validation-error">{{ $message }}</span>--}}
{{--                @enderror--}}
            </div>
        </div>
    </div>
</div>

<div class="float-right">
    {!! Form::submit('Send', ['class' => 'btn btn-primary']) !!}
    <a class="btn btn-dark" href="{{ route('backend.product.index') }}">Back</a>
</div>

