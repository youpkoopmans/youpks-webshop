<div class="row">
    <div class="col-md-6">

        {!! Form::group_open('root_category row') !!}
            {!! Form::label('root_category', __('b::category.label.root-category'), ['class' => 'col-md-4 text-md-right']) !!}
            <div class="col-md-8">
                {!! Form::select('root_category', $categories, isset($category) ? [$category->getRoot()->title => $category->getRoot()->id] : old('root_category'), ['placeholder' => 'No root']) !!}
            </div>
        {!! Form::group_close() !!}

        {!! Form::group_open('title row') !!}
            {!! Form::label('title', __('b::category.label.title'), ['class' => 'col-md-4 text-md-right']) !!}
            <div class="col-md-8">
                {!! Form::text('title', isset($category) ? $category->title : old('title')) !!}
            </div>
        {!! Form::group_close() !!}

        {!! Form::group_open('published_at row') !!}
            {!! Form::label('published_at', __('b::category.label.active'), ['class' => 'col-md-4 text-md-right']) !!}
            <div class="col-md-8">
                <div class="btn-group btn-group-toggle w-100" data-toggle="buttons">
                    <label class="btn btn-outline-secondary w-50">
                        {!! Form::input('radio', 'active', 1,  [isset($category) && $category->published_at != null ? 'checked' : null]) !!}
                        <i class="fa fa-check"></i> {{ __('b::category.label.yes') }}
                    </label>
                    <label class="btn btn-outline-secondary w-50">
                        {!! Form::input('radio', 'active', 0,  [isset($category) && $category->published_at == null ? 'checked' : null]) !!}
                        <i class="fa fa-ban"></i> {{ __('b::category.label.no') }}
                    </label>
                </div>
            </div>
        {!! Form::group_close() !!}

    </div>
</div>

<div class="float-right">
    {!! Form::submit(__('b::category.button.send'), ['class' => 'btn btn-primary']) !!}
    {!! Html::linkRoute('backend.category.index', __('b::category.button.back'), null, ['class' => 'btn btn-dark']) !!}
</div>

