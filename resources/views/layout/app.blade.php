<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="{{asset('icon/favicon.ico')}}" rel="icon">
    <link href="{{asset('icon/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <title>@yield('title') - {{ config('app.name') }}</title>
    <!-- Favicons -->
    <!-- <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->

  @filamentStyles
  @vite('resources/css/app.css')
    @include('parts.links')
    @yield('links')
    <!-- Vendor CSS Files -->

</head>

<body>

    <!-- ======= Header ======= -->
    @include('parts.header')

    <!-- ======= Sidebar ======= -->
    @include('parts.sidebar')
    @yield('main')

    {{-- {{ $slot }} --}}

    <footer id="footer" class="footer">
        <div class="copyright">
            <strong>Copyright &copy; 2024 Pricol</strong>
        </div>
        <div class="credits">
            <span> Developed by @Pricol-IT Team, Version 1.0</span>
        </div>
    </footer>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    @include('parts.script')
    @yield('script')
    @filamentScripts
    @vite('resources/js/app.js')
</body>

</html>
