<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="xmlrpc.php">
    <title>Houzez - Real Estate WordPress Theme</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="wp-content/uploads/2016/03/favicon.png">
    <!-- end favicon -->
    @section('css')
    {{ Html::style('wp-content/plugins/revslider/public/assets/css/settingsc225.css?ver=5.4.1') }}
    {{ Html::style('wp-content/themes/houzez/css/bootstrap.min.css') }}
    {{ Html::style('wp-content/themes/houzez/css/font-awesome.min.css') }}
    {{ Html::style('wp-content/themes/houzez/css/all.min.css') }}
    {{ Html::style('wp-content/themes/houzez/css/main.css') }}
    {{ Html::style('wp-content/themes/houzez/css/style.css') }}
    {{ Html::style('wp-content/themes/houzez/css/custom.index.css') }}
    {{ Html::style('wp-content/plugins/js_composer/assets/css/js_composer.min3c21.css') }}
    {{ Html::style('wp-content/plugins/js_composer/assets/lib/bower/animate-css/animate.min3c21.css') }}
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
<div class="container">
    @yield('content')
</div>
</div>
@include('layouts.includes.footer')
@section('footerscript')
{{ Html::script('wp-content/themes/houzez/js/bootstrap.min.js') }}
<script type='text/javascript'>
    /* <![CDATA[ */
    var hz_plugin = {
        "rating_terrible": "Terrible",
        "rating_poor": "Poor",
        "rating_average": "Average",
        "rating_vgood": "Very Good",
        "rating_exceptional": "Exceptional"
    };
    /* ]]> */
</script>
{{ Html::script('wp-content/themes/houzez/js/plugins2846.js?ver=1.5.5') }}
{{ Html::script('wp-content/wp-includes/js/jquery/ui/core.mine899.js?ver=1.11.4') }}
{{ Html::script('wp-content/wp-includes/js/jquery/ui/widget.mine899.js?ver=1.11.4') }}
{{ Html::script('wp-content/wp-includes/js/jquery/ui/position.mine899.js?ver=1.11.4') }}
{{ Html::script('wp-content/wp-includes/js/jquery/ui/menu.mine899.js?ver=1.11.4') }}
{{ Html::script('wp-content/wp-includes/js/wp-a11y.min66f2.js?ver=4.7.5') }}
<script type='text/javascript'>
    /* <![CDATA[ */
    var uiAutocompleteL10n = {
        "noResults": "No results found.",
        "oneResult": "1 result found. Use up and down arrow keys to navigate.",
        "manyResults": "%d results found. Use up and down arrow keys to navigate.",
        "itemSelected": "Item selected."
    };
    /* ]]> */
</script>
{{ Html::script('wp-content/wp-includes/js/jquery/ui/autocomplete.mine899.js?ver=1.11.4') }}
{{ Html::script('wp-content/wp-includes/js/jquery/ui/mouse.mine899.js?ver=1.11.4') }}
{{ Html::script('wp-content/wp-includes/js/jquery/jquery.ui.touch-punchc682.js?ver=0.2.2') }}
<script type="text/javascript">
$(document).ready(function () {
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
})
</script>
<script type='text/javascript'>
    /* <![CDATA[ */
    var HOUZEZ_ajaxcalls_vars = {
        "admin_url": "{{ action('AjaxController@getMap') }}",
        "houzez_rtl": "no",
        "redirect_type": "same_page",
        "login_redirect": "http:\/\/houzez01.favethemes.com",
        "login_loading": "Sending user info, please wait...",
        "direct_pay_text": "Processing, Please wait...",
        "user_id": "0",
        "transparent_menu": "no",
        "simple_logo": "http:\/\/houzez01.favethemes.com\/wp-content\/uploads\/2016\/03\/logo-houzez-color.png",
        "retina_logo": "http:\/\/houzez01.favethemes.com\/wp-content\/uploads\/2016\/03\/logo-houzez-color@2x.png",
        "retina_logo_mobile": "http:\/\/houzez01.favethemes.com\/wp-content\/uploads\/2016\/03\/logo-houzez-color@2x.png",
        "retina_logo_mobile_splash": "http:\/\/houzez01.favethemes.com\/wp-content\/uploads\/2016\/03\/logo-houzez-white@2x.png",
        "retina_logo_splash": "http:\/\/houzez01.favethemes.com\/wp-content\/uploads\/2016\/03\/logo-houzez-white@2x.png",
        "retina_logo_height": "24",
        "retina_logo_width": "140",
        "property_lat": "",
        "property_lng": "",
        "property_map": "",
        "property_map_street": "",
        "is_singular_property": "",
        "process_loader_refresh": "fa fa-spin fa-refresh",
        "process_loader_spinner": "fa fa-spin fa-spinner",
        "process_loader_circle": "fa fa-spin fa-circle-o-notch",
        "process_loader_cog": "fa fa-spin fa-cog",
        "success_icon": "fa fa-check",
        "prop_featured": "Featured",
        "featured_listings_none": "You have used all the \"Featured\" listings in your package.",
        "prop_sent_for_approval": "Sent for Approval",
        "paypal_connecting": "Connecting to paypal, Please wait... ",
        "mollie_connecting": "Connecting to mollie, Please wait... ",
        "confirm": "Are you sure you want to delete?",
        "confirm_featured": "Are you sure you want to make this a featured listing?",
        "confirm_featured_remove": "Are you sure you want to remove from featured listing?",
        "confirm_relist": "Are you sure you want to relist this property?",
        "delete_property": "Processing, please wait...",
        "delete_confirmation": "Are you sure you want to delete?",
        "not_found": "We didn't find any results",
        "for_rent": "for-rent",
        "for_rent_price_range": "for-rent",
        "currency_symbol": "$",
        "advanced_search_widget_min_price": "1000",
        "advanced_search_widget_max_price": "4500000",
        "advanced_search_min_price_range_for_rent": "50",
        "advanced_search_max_price_range_for_rent": "26000",
        "advanced_search_widget_min_area": "50",
        "advanced_search_widget_max_area": "13000",
        "advanced_search_price_slide": "1",
        "fave_page_template": "template-homepage.php",
        "google_map_style": "[{\"featureType\":\"administrative\",\"elementType\":\"labels.text.fill\",\"stylers\":[{\"color\":\"#444444\"}]},{\"featureType\":\"landscape\",\"elementType\":\"all\",\"stylers\":[{\"color\":\"#f2f2f2\"}]},{\"featureType\":\"poi\",\"elementType\":\"all\",\"stylers\":[{\"visibility\":\"off\"}]},{\"featureType\":\"road\",\"elementType\":\"all\",\"stylers\":[{\"saturation\":-100},{\"lightness\":45}]},{\"featureType\":\"road.highway\",\"elementType\":\"all\",\"stylers\":[{\"visibility\":\"simplified\"}]},{\"featureType\":\"road.arterial\",\"elementType\":\"labels.icon\",\"stylers\":[{\"visibility\":\"off\"}]},{\"featureType\":\"transit\",\"elementType\":\"all\",\"stylers\":[{\"visibility\":\"off\"}]},{\"featureType\":\"water\",\"elementType\":\"all\",\"stylers\":[{\"color\":\"#46bcec\"},{\"visibility\":\"on\"}]}]",
        "googlemap_default_zoom": "1",
        "googlemap_pin_cluster": "yes",
        "googlemap_zoom_cluster": "5",
        "map_icons_path": "http:\/\/houzez01.favethemes.com\/wp-content\/themes\/houzez\/images\/map\/",
        "infoboxClose": "http:\/\/houzez01.favethemes.com\/wp-content\/themes\/houzez\/images\/map\/close.png",
        "clusterIcon": "http:\/\/houzez01.favethemes.com\/wp-content\/themes\/houzez\/images\/map\/cluster-icon.png",
        "google_map_needed": "yes",
        "paged": "1",
        "search_result_page": "normal_page",
        "search_keyword": "",
        "search_country": "",
        "search_state": "",
        "search_city": "",
        "search_feature": "",
        "search_area": "",
        "search_status": "",
        "search_label": "",
        "search_type": "",
        "search_bedrooms": "",
        "search_bathrooms": "",
        "search_min_price": "",
        "search_max_price": "",
        "search_min_area": "",
        "search_max_area": "",
        "search_publish_date": "",
        "search_no_posts": "10",
        "search_location": "",
        "use_radius": "on",
        "search_lat": "",
        "search_long": "",
        "search_radius": "",
        "transportation": "Transportation",
        "supermarket": "Supermarket",
        "schools": "Schools",
        "libraries": "Libraries",
        "pharmacies": "Pharmacies",
        "hospitals": "Hospitals",
        "sort_by": "",
        "measurement_updating_msg": "Updating, Please wait...",
        "autosearch_text": "Searching...",
        "currency_updating_msg": "Updating Currency, Please wait...",
        "currency_position": "before",
        "submission_currency": "USD",
        "wire_transfer_text": "To be paid",
        "direct_pay_thanks": "Thank you. Please check your email for payment instructions.",
        "direct_payment_title": "Direct Payment Instructions",
        "direct_payment_button": "SEND ME THE INVOICE",
        "direct_payment_details": "Please send payment to\u00a0<strong>Houzez Inc<\/strong>. <br\/>\r\n\r\nBank Account -\u00a0<strong>BWA7849843FAVE007<\/strong>\u00a0\u00a0<br\/>\r\n\r\nPlease include the invoice number in payment details Thank you for your business with us! <br\/>",
        "measurement_unit": "sqft",
        "header_map_selected_city": ["new-york"],
        "thousands_separator": ",",
        "current_tempalte": "template\/template-homepage.php",
        "monthly_payment": "Monthly Payment",
        "weekly_payment": "Weekly Payment",
        "bi_weekly_payment": "Bi-Weekly Payment",
        "compare_button_url": "http:\/\/houzez01.favethemes.com\/compare-properties\/",
        "template_thankyou": "http:\/\/houzez01.favethemes.com\/thank-you\/",
        "compare_page_not_found": "Please create page using compare properties template",
        "property_detail_top": "v1",
        "keyword_search_field": "prop_title",
        "keyword_autocomplete": "1",
        "houzez_date_language": "",
        "houzez_default_radius": "30",
        "enable_radius_search": "0",
        "enable_radius_search_halfmap": "1",
        "houzez_primary_color": "#00aeef",
        "geocomplete_country": "",
        "houzez_logged_in": "no",
        "ipinfo_location": "0",
        "gallery_autoplay": "1",
        "stripe_page": "http:\/\/houzez01.favethemes.com\/stripe\/",
        "twocheckout_page": "http:\/\/houzez01.favethemes.com\/"
    };
    /* ]]> */
</script>
{{ Html::script('wp-content/themes/houzez/js/houzez_ajax_calls2846.js?ver=1.5.5') }}
{{ Html::script('wp-content/themes/houzez/js/custom2846.js?ver=1.5.5') }}
{{ Html::script('wp-content/wp-includes/js/wp-embed.min66f2.js?ver=4.7.5') }}
{{ Html::script('wp-content/plugins/js_composer/assets/js/dist/js_composer_front.min3c21.js?ver=5.1.1') }}
<script type='text/javascript'>
    /* <![CDATA[ */
    var prop_carousel_v2_uo8oC = {
        "slide_auto": "false",
        "auto_speed": "3000",
        "slide_dots": "true",
        "slide_infinite": "true",
        "slides_to_scroll": "1"
    };
    var prop_carousel_v2_cSQhv = {
        "slide_auto": "false",
        "auto_speed": "3000",
        "slide_dots": "true",
        "slide_infinite": "true",
        "slides_to_scroll": "1"
    };
    /* ]]> */
</script>
{{ Html::script('wp-content/themes/houzez/js/property-carousels-v22846.js?ver=1.5.5') }}
{{ Html::script('wp-content/plugins/js_composer/assets/lib/bower/skrollr/dist/skrollr.min3c21.js?ver=5.1.1') }}
{{ Html::script('wp-content/plugins/js_composer/assets/lib/waypoints/waypoints.min3c21.js?ver=5.1.1') }}
@show
</body>
</html>