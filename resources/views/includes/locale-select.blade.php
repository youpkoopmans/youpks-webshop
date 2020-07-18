@foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
    <li class="mr-3">
        <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
            {{ $properties['native'] }}
        </a>
    </li>
@endforeach
