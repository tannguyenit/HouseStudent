<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="xmlrpc.php">
    <title>Houzez - Real Estate WordPress Theme</title>
    <link rel="shortcut icon" href="wp-content/uploads/2016/03/favicon.png">
    @section('css')
        {{ Html::style('wp-content/themes/houzez/css/bootstrap.min.css') }}
        {{ Html::style('wp-content/themes/houzez/css/font-awesome.min.css') }}
        {{ Html::style('wp-content/themes/houzez/css/all.min.css') }}
        {{ Html::style('wp-content/themes/houzez/css/main.css') }}
        {{ Html::style('wp-content/themes/houzez/css/style.css') }}
        {{ Html::style('wp-content/themes/houzez/css/custom.index.css') }}
        {{ Html::style('wp-content/themes/houzez/css/custom.admin.css') }}
    @show
    @section('headerscript')
        {{ Html::script('http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js') }}
        {{ Html::script('wp-content/wp-includes/js/jquery/jquery-migrate.min.js') }}
        {{ Html::script('http://maps.googleapis.com/maps/api/js?libraries=places&amp;language=en_US&amp;key=AIzaSyCBnyL9MhOZlec1Mz1_qImukxi-VFqQKJw&amp;ver=1.0') }}
        {{ Html::script('wp-content/themes/houzez/js/infobox.js') }}
        {{ Html::script('wp-content/themes/houzez/js/markerclusterere1fc.js') }}
    @show
</head>
<body class="home page-template page-template-template page-template-template-homepage
    page-template-templatetemplate-homepage-php page page-id-194
    transparent-no js-comp-ver-5.1.1 vc_responsive">
    @section('include')
        @include('layouts.includes.modal')
        @include('layouts.includes.header')
        @include('layouts.includes.header-mobile')
    @show
    <div id="section-body" class="landing-page">
        @include('layouts.admin.leftbar')
        <div class="user-dashboard-right dashboard-with-panel">
            @yield('content')
        </div>
    </div>
    @section('footerscript')
        {{ Html::script('wp-content/themes/houzez/js/bootstrap.min.js') }}
        {{ Html::script('wp-content/themes/houzez/js/jquery.validate.min.js') }}
        {{ Html::script('wp-content/themes/houzez/js/plugins2846.js?ver=1.5.5') }}
        {{ Html::script('wp-content/wp-includes/js/jquery/ui/core.mine899.js?ver=1.11.4') }}
        {{ Html::script('wp-content/wp-includes/js/jquery/ui/widget.mine899.js?ver=1.11.4') }}
        {{ Html::script('wp-content/wp-includes/js/jquery/ui/position.mine899.js?ver=1.11.4') }}
        {{ Html::script('wp-content/wp-includes/js/jquery/ui/menu.mine899.js?ver=1.11.4') }}
        {{ Html::script('wp-content/wp-includes/js/wp-a11y.min66f2.js?ver=4.7.5') }}
        {{ Html::script('wp-content/wp-includes/js/jquery/ui/autocomplete.mine899.js?ver=1.11.4') }}
        {{ Html::script('wp-content/wp-includes/js/jquery/ui/mouse.mine899.js?ver=1.11.4') }}
        {{ Html::script('wp-content/wp-includes/js/jquery/jquery.ui.touch-punchc682.js?ver=0.2.2') }}
        {{ Html::script('wp-content/themes/houzez/js/custom2846.js?ver=1.5.5') }}
        {{ Html::script('wp-content/wp-includes/js/wp-embed.min66f2.js?ver=4.7.5') }}
    @show
</body>
</html>