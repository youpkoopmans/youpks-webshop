<div class="card mt-5">
    <div class="card-header">
        <h1>{{ __('b::home.title.navigation') }}</h1>
    </div>
    <div class="card-body">
        <a class="btn btn-primary w-100 d-block mb-3" href="{{ route('backend.home.index') }}">
            {{ __('b::home.title.index') }}
        </a>
        <a class="btn btn-primary w-100 d-block mb-3" href="{{ route('backend.product.index') }}">
            {{ __('b::product.title.index') }}
        </a>
        <a class="btn btn-primary w-100 d-block mb-3" href="{{ route('backend.brand.index') }}">
            {{ __('b::brand.title.index') }}
        </a>
        <a class="btn btn-primary w-100 d-block mb-3" href="{{ route('backend.category.index') }}">
            {{ __('b::category.title.index') }}
        </a>
    </div>
</div>
