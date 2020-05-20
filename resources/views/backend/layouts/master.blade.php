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
@if(Auth::check())
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 col-lg-2">
            <section class="sidebar">
                @include('backend.includes.sidebar')
            </section>
        </div>

        <div class="col-md-9 col-lg-10">
            <section class="page">
                @yield('content')
            </section>
        </div>
    </div>
</div>
@else
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <section class="page">
                @yield('content')
            </section>
        </div>
    </div>
</div>
@endif

<footer>
    @include('backend.includes.footer')
</footer>

@include('includes.scripts')

</body>

</html>
