@php
    $baseUrl = url('/');
    $data = [
        'admin_url' => action('AjaxController@getMap'),
        "houzez_rtl" =>  "no",
        "validate" =>  trans('validate'),
        "login_loading" =>  "Sending user info, please wait...",
        "direct_pay_text" =>  "Processing, Please wait...",
        "user_id" =>  auth()->check() ? auth()->user()->id : 0,
        "like_url" =>  action('AjaxController@like'),
        "transparent_menu" =>  "",
        "simple_logo" =>  "{$baseUrl}/img/logo.png",
        "retina_logo" =>  "{$baseUrl}/img/logo.png",
        "retina_logo_mobile" =>  "{$baseUrl}/img/logo.png",
        "retina_logo_mobile_splash" =>  "{$baseUrl}/img/logo.png",
        "retina_logo_splash" =>  "{$baseUrl}/img/logo.png",
        "retina_logo_height" =>  "50",
        "retina_logo_width" =>  "50",
        "property_lat" =>  '',
        "property_lng" =>  '',
        "property_map" =>  "1",
        "property_map_street" =>  "show",
        "is_singular_property" =>  "yes",
        "process_loader_refresh" =>  "fa fa-spin fa-refresh",
        "process_loader_spinner" =>  "fa fa-spin fa-spinner",
        "process_loader_circle" =>  "fa fa-spin fa-circle-o-notch",
        "process_loader_cog" =>  "fa fa-spin fa-cog",
        "success_icon" =>  "fa fa-check",
        "prop_featured" =>  "Featured",
        "featured_listings_none" =>  "You have used all the 'Featured' listings in your package.",
        "prop_sent_for_approval" =>  "Sent for Approval",
        "paypal_connecting" =>  "Connecting to paypal, Please wait... ",
        "mollie_connecting" =>  "Connecting to mollie, Please wait... ",
        "confirm" =>  "Are you sure you want to delete?",
        "confirm_featured" =>  "Are you sure you want to make this a featured listing?",
        "confirm_featured_remove" =>  "Are you sure you want to remove from featured listing?",
        "confirm_relist" =>  "Are you sure you want to relist this property?",
        "delete_property" =>  "Processing, please wait...",
        "delete_confirmation" =>  "Are you sure you want to delete?",
        "not_found" =>  "We didn't find any results",
        "for_rent" =>  "for-rent",
        "for_rent_price_range" =>  "for-rent",
        "currency_symbol" =>  "$",
        "advanced_search_widget_min_price" =>  $prices->min,
        "advanced_search_widget_max_price" =>  $prices->max,
        "advanced_search_min_price_range_for_rent" =>  "50",
        "advanced_search_max_price_range_for_rent" =>  "26000",
        "advanced_search_widget_min_area" =>  "50",
        "advanced_search_widget_max_area" =>  "13000",
        "advanced_search_price_slide" =>  "1",
        "fave_page_template" =>  "",
        "google_map_style" =>  '[
            {
                "featureType":"administrative",
                "elementType":"labels.text.fill",
                "stylers":[
                    {"color":"#444444"}
                ]
            },
            {
                "featureType":"landscape",
                "elementType":"all",
                "stylers":[
                    {"color":"#f2f2f2"}
                ]
            },
            {
                "featureType":"poi",
                "elementType":"all",
                "stylers":[
                    {"visibility":"off"}
                ]
            },
            {
                "featureType":"road",
                "elementType":"all",
                "stylers":[
                    {"saturation":-100},
                    {"lightness":45}
                ]
            },
            {
                "featureType":"road.highway",
                "elementType":"all",
                "stylers":[
                    {"visibility":"simplified"}
                ]
            },
            {
                "featureType":"road.arterial",
                "elementType":"labels.icon",
                "stylers":[
                    {"visibility":"off"}
                ]
            },
            {
                "featureType":"transit",
                "elementType":"all",
                "stylers":[
                    {"visibility":"off"}
                ]
            },
            {
                "featureType":"water",
                "elementType":"all",
                "stylers":[
                    {"color":"#46bcec"},
                    {"visibility":"on"}
                ]
            }
        ]',
        "googlemap_default_zoom" =>  "16",
        "googlemap_pin_cluster" =>  "yes",
        "googlemap_zoom_cluster" =>  "5",
        "map_icons_path" =>  "{$baseUrl}/img/",
        "infoboxClose" =>  "{$baseUrl}/img/close.png",
        "clusterIcon" =>  "{$baseUrl}/img/cluster-icon.png",
        "google_map_needed" =>  "yes",
        "paged" =>  "",
        "search_result_page" =>  "normal_page",
        "search_keyword" =>  "",
        "search_country" =>  "",
        "search_state" =>  "",
        "search_city" =>  "",
        "search_feature" =>  "",
        "search_area" =>  "",
        "search_status" =>  "",
        "search_label" =>  "",
        "search_type" =>  "",
        "search_bedrooms" =>  "",
        "search_bathrooms" =>  "",
        "search_min_price" =>  "",
        "search_max_price" =>  "",
        "search_min_area" =>  "",
        "search_max_area" =>  "",
        "search_publish_date" =>  "",
        "search_no_posts" =>  "10",
        "search_location" =>  "",
        "use_radius" =>  "on",
        "search_lat" =>  "",
        "search_long" =>  "",
        "search_radius" =>  "",
        "transportation" =>  "Transportation",
        "supermarket" =>  "Supermarket",
        "schools" =>  "Schools",
        "libraries" =>  "Libraries",
        "pharmacies" =>  "Pharmacies",
        "hospitals" =>  "Hospitals",
        "sort_by" =>  "",
        "measurement_updating_msg" =>  "Updating, Please wait...",
        "autosearch_text" =>  "Searching...",
        "currency_updating_msg" =>  "Updating Currency, Please wait...",
        "currency_position" =>  "before",
        "submission_currency" =>  "USD",
        "wire_transfer_text" =>  "To be paid",
        "direct_pay_thanks" =>  "Thank you. Please check your email for payment instructions.",
        "direct_payment_title" =>  "Direct Payment Instructions",
        "direct_payment_button" =>  "SEND ME THE INVOICE",
        "direct_payment_details" =>  "Please send payment to\u00a0<strong>Houzez Inc<\/strong>. <br\/>\r\n\r\nBank Account -\u00a0<strong>BWA7849843FAVE007<\/strong>\u00a0\u00a0<br\/>\r\n\r\nPlease include the invoice number in payment details Thank you for your business with us! <br\/>",
        "measurement_unit" =>  "sqft",
        "header_map_selected_city" =>  [],
        "thousands_separator" =>  ",",
        "current_tempalte" =>  "",
        "monthly_payment" =>  "Monthly Payment",
        "weekly_payment" =>  "Weekly Payment",
        "bi_weekly_payment" =>  "Bi-Weekly Payment",
        "compare_button_url" =>  "",
        "template_thankyou" =>  "",
        "compare_page_not_found" =>  "Please create page using compare properties template",
        "property_detail_top" =>  "v1",
        "keyword_search_field" =>  "prop_title",
        "keyword_autocomplete" =>  "1",
        "houzez_date_language" =>  "",
        "houzez_default_radius" =>  "30",
        "enable_radius_search" =>  "0",
        "enable_radius_search_halfmap" =>  "1",
        "houzez_primary_color" =>  "#00aeef",
        "geocomplete_country" =>  "",
        "houzez_logged_in" =>  "no",
        "ipinfo_location" =>  "1",
        "gallery_autoplay" =>  "1",
        "stripe_page" =>  "",
        "twocheckout_page" =>  ""
    ];
@endphp
<div>
    <div id='variable-javascript' data-variable="{{ json_encode($data) }}"></div>
</div>
