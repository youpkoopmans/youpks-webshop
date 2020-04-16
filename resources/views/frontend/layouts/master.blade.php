<!doctype html>
<html lang="nl">

<head>
    @include('includes.favicon')
    @include('includes.meta')
    @include('includes.styles')
</head>

<body id="frontend">

<header>
    @include('frontend.includes.header')
</header>

<section class="page">
    @yield('content')
</section>

<footer>
    @include('frontend.includes.footer')
</footer>

@include('includes.scripts')

</body>

</html>
