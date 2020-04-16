<!doctype html>
<html lang="nl">

<head>
    @include('includes.favicon')
    @include('includes.meta')
    @include('includes.styles')
</head>

<body id="backend">

<header>
    @include('backend.includes.header')
</header>

<section class="page">
    @yield('content')
</section>

<footer>
    @include('backend.includes.footer')
</footer>

@include('includes.scripts')

</body>

</html>
