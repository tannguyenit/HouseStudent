<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="xmlrpc.php">
    @yield('seo')
    <title>House For Student</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="/img/favicon.png">
    <!-- end favicon -->
    <!-- Start Css -->
    @section('css')
        <link rel="stylesheet" href="{{ elixir('css/layout.css') }}">
    @show
    <!-- End css -->
    @section('headerscript')
        {{ Html::script('http://maps.googleapis.com/maps/api/js?libraries=places&amp;language=en_US&amp;key=AIzaSyCBnyL9MhOZlec1Mz1_qImukxi-VFqQKJw&amp;ver=1.0') }}
        <script src="{{ elixir('js/headerscript.js') }}"></script>
    @show
</head>
<div id="fb-root"></div>
<body>
    @section('include')
        @include('layouts.includes.modal')
        @include('layouts.includes.header')
        @include('layouts.includes.header-mobile')
    @show
    @yield('create')
    <div class="container">
        @yield('content')
    </div>
    @if (\Route::currentRouteName() != 'property.create')
        @include('layouts.includes.footer')
    @endif
    @include('layouts.includes.facebook-messenger')
    @include('layouts.includes.variable-javascript')
    @section('footerscript')
        <script src="{{ elixir('js/themes.js') }}"></script>
        <script src="{{ elixir('js/plugins.js') }}"></script>
        <script src="{{ elixir('js/setting-component.js') }}"></script>
        <script src="{{ elixir('js/custom-jquery.js') }}"></script>
        <script type='text/javascript'>
            /* <![CDATA[ */
            const lat = $('#getGoogleMaps').data('lat');
            const lng = $('#getGoogleMaps').data('lng');
            var VARIABLE_JS = $('#variable-javascript').data('variable');
            VARIABLE_JS.lat = lat
            VARIABLE_JS.lng = lng
            /* ]]> */
        </script>
    @show
</body>
</html>
