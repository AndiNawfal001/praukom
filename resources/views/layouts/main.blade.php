<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>
<body >
@include('partials.navbar')

<div class="lg:flex ">
    <div class="lg:basis-1/5 relative hidden lg:block  sidebar">
        @include('partials.sidebar')
    </div>

    <div class="lg:basis-4/5 lg:p-10">
        @yield('container')

    </div>
</div>

<script src="{{ asset('js/index.js') }}"></script>

</body>
</html>
