<div class="row">
    <div class="col-md-6">

        {!! Form::group_open('title row') !!}
            {!! Form::label('title', __('b::product.label.title'), ['class' => 'col-md-4 text-md-right']) !!}
            <div class="col-md-8">
                {!! Form::text('title', isset($product) ? $product->title : old('title')) !!}
            </div>
        {!! Form::group_close() !!}

        {!! Form::group_open('intro row') !!}
            {!! Form::label('intro', __('b::product.label.intro'), ['class' => 'col-md-4 text-md-right']) !!}
            <div class="col-md-8">
                {!! Form::textarea('intro', isset($product) ? $product->intro : old('intro'), ['rows' => '2']) !!}
            </div>
        {!! Form::group_close() !!}

        {!! Form::group_open('body row') !!}
            {!! Form::label('body', __('b::product.label.body'), ['class' => 'col-md-4 text-md-right']) !!}
            <div class="col-md-8">
                {!! Form::textarea('body', isset($product) ? $product->body : old('body')) !!}
            </div>
        {!! Form::group_close() !!}

        {!! Form::group_open('brand_id row') !!}
            {!! Form::label('brand_id', __('b::product.label.brand'), ['class' => 'col-md-4 text-md-right']) !!}
            <div class="col-md-8">
                {!! Form::select('brand_id', $brands, isset($product->brand) ? [$product->brand->title => $product->brand->id] : old('brand_id')) !!}
            </div>
        {!! Form::group_close() !!}

        {!! Form::group_open('category_id row') !!}
            {!! Form::label('category_id', __('b::product.label.category'), ['class' => 'col-md-4 text-md-right']) !!}
            <div class="col-md-8">
                {!! Form::select('category_id', $categories, isset($product->category) ? [$product->category->title => $product->category->id] : old('category_id')) !!}
            </div>
        {!! Form::group_close() !!}

        {!! Form::group_open('price row') !!}
            {!! Form::label('price', __('b::product.label.price'), ['class' => 'col-md-4 col-form-label text-md-right']) !!}
            <div class="col-md-8">
                {!! Form::number('price', isset($product) ? $product->price : old('price'), ['step' => 'any']) !!}
            </div>
        {!! Form::group_close() !!}

        {!! Form::group_open('published_at row') !!}
            {!! Form::label('published_at', __('b::product.label.active'), ['class' => 'col-md-4 text-md-right']) !!}
            <div class="col-md-8">
                <div class="btn-group btn-group-toggle w-100" data-toggle="buttons">
                    <label class="btn btn-outline-secondary w-50">
                        {!! Form::input('radio', 'active', 1,  [isset($product) && $product->published_at != null ? 'checked' : null]) !!}
                        <i class="fa fa-check"></i> {{ __('b::product.label.yes') }}
                    </label>
                    <label class="btn btn-outline-secondary w-50">
                        {!! Form::input('radio', 'active', 0,  [isset($product) && $product->published_at == null ? 'checked' : null]) !!}
                        <i class="fa fa-ban"></i> {{ __('b::product.label.no') }}
                    </label>
                </div>
            </div>
        {!! Form::group_close() !!}

    </div>
    <div class="col-md-6">

        {!! Form::group_open('image row') !!}
            {!! Form::label('image', __('b::product.label.main-image'), ['class' => 'col-md-4 text-md-right']) !!}
            <div class="col-md-8">
                @if(isset($product->image))
                    {!! Html::image(asset($product->image), $product->image, ['id'=> 'image-edit-preview', 'class' => 'img-fluid mb-3 rounded border bg-light']) !!}
                @endif
                {!! Html::image(null, null, ['id'=> 'image-preview', 'class' => 'img-fluid mb-3 rounded border bg-light']) !!}
                {!! Form::file('image', ['id' => 'image-input', 'class' => 'd-block']) !!}
            </div>
        {!! Form::group_close() !!}

        {!! Form::group_open('images row') !!}
            {!! Form::label('images', __('b::product.label.sub-images'), ['class' => 'col-md-4 text-md-right']) !!}
            <div class="col-md-8">
                <div class="row">
                    @if(isset($product->images))
                        @foreach($product->images as $image)
                            <div class="col-sm-6">
                                {!! Html::image(asset($image->path), $image->path, ['class' => 'image-edit-preview img-fluid mb-3 rounded border bg-light']) !!}
                            </div>
                        @endforeach
                    @endif
                </div>
                {!! Form::file('images[]', ['multiple']) !!}
            </div>
        {!! Form::group_close() !!}

    </div>
</div>

<div class="float-right">
    {!! Form::submit(__('b::product.button.send'), ['class' => 'btn btn-primary']) !!}
    {!! Html::linkRoute('backend.product.index', __('b::product.button.back'), null, ['class' => 'btn btn-dark']) !!}
</div>

