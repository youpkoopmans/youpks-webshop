<div class="card mt-5">
    <div class="card-header">
        <h1>{{ __('backend/home.title.navigation') }}</h1>
    </div>
    <div class="card-body">
        <a class="btn btn-primary w-100 d-block mb-3" href="{{ route('backend.home.index') }}">
            {{ __('backend/home.title.index') }}
        </a>
        <a class="btn btn-primary w-100 d-block mb-3" href="{{ route('backend.product.index') }}">
            {{ __('backend/product.title.index') }}
        </a>
        <a class="btn btn-primary w-100 d-block mb-3" href="{{ route('backend.brand.index') }}">
            {{ __('backend/brand.title.index') }}
        </a>
        <a class="btn btn-primary w-100 d-block mb-3" href="{{ route('backend.category.index') }}">
            {{ __('backend/category.title.index') }}
        </a>
    </div>
</div>
