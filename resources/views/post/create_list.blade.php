<!DOCTYPE html>
<html lang="en-US">
<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="../xmlrpc.php">
    <title>Add New Property &#8211; Houzez</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="/wp-content/uploads/2016/03/favicon.png">
    <!-- end favicon -->
    <!-- Style css -->
    <link rel='stylesheet' id='contact-form-7-css' href='/wp-content/plugins/contact-form-7/includes/css/styles4906.css?ver=4.7' type='text/css' media='all' />
    <link rel='stylesheet' id='rs-plugin-settings-css' href='/wp-content/plugins/revslider/public/assets/css/settingsc225.css?ver=5.4.1' type='text/css' media='all' />
    <link rel='stylesheet' id='bootstrap.min-css' href='/wp-content/themes/houzez/css/bootstrap.min.css?ver=3.3.5' type='text/css' media='all' />
    {{ Html::style('wp-content/themes/houzez/css/font-awesome.min.css') }}
    <link rel='stylesheet' id='houzez-all-css' href='/wp-content/themes/houzez/css/all.min.css?ver=1.5.5' type='text/css' media='all' />
    <link rel='stylesheet' id='houzez-main-css' href='/wp-content/themes/houzez/css/main.css?ver=1.5.5' type='text/css' media='all' />
    <link rel='stylesheet' id='houzez-style-css' href='/wp-content/themes/houzez/css/style.css?ver=1.5.5' type='text/css' media='all' />
    <link rel="stylesheet" href="/wp-content/themes/houzez/css/custom.index.css" type='text/css' media='all'>



    <!-- end style css and start script -->
    {{ Html::script('http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js') }}
    {{ Html::script('wp-content/wp-includes/js/jquery/jquery-migrate.min.js') }}


    {{-- <script type='text/javascript' src='/wp-content/plugins/revslider/public/assets/js/jquery.themepunch.tools.minc225.js?ver=5.4.1'></script> --}}
    {{-- <script type='text/javascript' src='/wp-content/plugins/revslider/public/assets/js/jquery.themepunch.revolution.minc225.js?ver=5.4.1'></script> --}}
    {{ Html::script('http://maps.googleapis.com/maps/api/js?libraries=places&amp;language=en_US&amp;key=AIzaSyCBnyL9MhOZlec1Mz1_qImukxi-VFqQKJw&amp;ver=1.0') }}
    {{ Html::script('wp-content/themes/houzez/js/infobox.js') }}
    {{ Html::script('wp-content/themes/houzez/js/markerclusterere1fc.js') }}
    {{ Html::script('wp-content/wp-includes/js/plupload/plupload.full.mincc91.js') }}

    <!-- end script -->
    <noscript>
        <style type="text/css">
        .wpb_animate_when_almost_visible { opacity: 1; }
    </style>
</noscript>
</head>

<body class="page-template page-template-template page-template-submit_property page-template-templatesubmit_property-php page page-id-14  transparent- wpb-js-composer js-comp-ver-5.1.1 vc_responsive">
    <div w3-include-html="../wp-include/modal.php"></div>
    <div w3-include-html="../wp-include/header.php"></div>
    <div w3-include-html="../wp-include/header-mobile.php"></div>
    <div id="section-body" class="landing-page">

        <div class="user-dashboard-right houzez-m-step-form ">
            <div class="board-header board-header-4">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <div class="board-header-left">
                                <h3 class="board-title">Add New Property</h3>
                            </div>
                            <div class="board-header-right">
                                <div class="steps-progress-main">
                                    <div class="steps-progress">
                                        <span style="width: 40%;"></span>
                                    </div>
                                    Step (<span class="steps-counter">1</span>/<span class="steps-total">1</span>)
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dashboard-content-area dashboard-fix">
                <div class="container">
                    <ol class="pay-step-bar">
                        <li class="pay-step-block active">
                            <span>Create Listing</span>
                        </li>
                        <li class="pay-step-block ">
                            <span>
                                <span class="hidden-xs"> Select a </span> Package
                            </span>
                        </li>
                        <li class="pay-step-block ">
                            <span>Payment</span>
                        </li>
                        <li class="pay-step-block ">
                            <span>Done</span>
                        </li>
                    </ol>
                    <div class="row dashboard-inner-main">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <form autocomplete="off" id="submit_property_form" name="new_post" method="post" action="#" enctype="multipart/form-data" class="add-frontend-property">
                                <div class="validate-errors alert alert-danger alert-dismissible" role="alert">
                                    <button type="button" class="close" data-hide="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <strong>Error!</strong> Please fill out the following required fields.
                                </div>
                                <div class="validate-errors-gal alert alert-danger alert-dismissible" role="alert">
                                    <button type="button" class="close" data-hide="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <strong>Error!</strong> Upload at least one image.
                                </div>
                                <div class="submit-form-wrap">
                                    <div class="account-block form-step">
                                        <div class="add-title-tab">
                                            <h3>Property description and price</h3>
                                            <div class="add-expand"></div>
                                        </div>
                                        <div class="add-tab-content">
                                            <div class="add-tab-row push-padding-bottom">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label for="prop_title">Property Title* </label>
                                                            <input type="text" id="prop_title" class="form-control" name="prop_title" placeholder="Enter your property title"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label>Description</label>
                                                            <div id="wp-prop_des-wrap" class="wp-core-ui wp-editor-wrap html-active">
                                                                <link rel='stylesheet' id='dashicons-css' href='/wp-content/wp-includes/css/dashicons.min66f2.css?ver=4.7.5' type='text/css' media='all' />
                                                                <link rel='stylesheet' id='editor-buttons-css' href='/wp-content/wp-includes/css/editor.min66f2.css?ver=4.7.5' type='text/css' media='all' />
                                                                <div id="wp-prop_des-editor-container" class="wp-editor-container">
                                                                    <div id="qt_prop_des_toolbar" class="quicktags-toolbar"></div>
                                                                    <textarea class="wp-editor-area" rows="18" cols="40" name="prop_des" id="prop_des"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="add-tab-row push-padding-bottom">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="prop_type">Type</label>
                                                            <select name="prop_type" id="prop_type" class="selectpicker" data-live-search="false" data-live-search-style="begins">
                                                                <option selected="selected" value="">None</option>
                                                                <option value="3"> Apartment</option>
                                                                <option value="47"> Condo</option>
                                                                <option value="51"> Farm</option>
                                                                <option value="49"> Loft</option>
                                                                <option value="50"> Lot</option>
                                                                <option value="52"> Multi Family Home</option>
                                                                <option value="10"> Single Family Home</option>
                                                                <option value="48"> Townhouse</option>
                                                                <option value="9"> Villa</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="prop_status">Status</label>
                                                            <select name="prop_status" id="prop_status" class="selectpicker" data-live-search="false" data-live-search-style="begins">
                                                                <option selected="selected" value="">None</option>
                                                                <option value="8"> For Rent</option>
                                                                <option value="7"> For Sale</option>
                                                                <option value="55"> Foreclosures</option>
                                                                <option value="56"> New Costruction</option>
                                                                <option value="59"> New Listing</option>
                                                                <option value="57"> Open House</option>
                                                                <option value="58"> Reduced Price</option>
                                                                <option value="54"> Resale</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="prop_labels">Label</label>
                                                            <select name="prop_labels" id="prop_labels" class="selectpicker" data-live-search="false" data-live-search-style="begins">
                                                                <option selected="selected" value="">None</option>
                                                                <option value="289"> Hot Offer</option>
                                                                <option value="288"> Open House</option>
                                                                <option value="356"> Sold</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="add-tab-row push-padding-bottom">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="prop_price"> Sale or Rent Price* </label>
                                                            <input type="text" id="prop_price" class="form-control" name="prop_price" value="" placeholder="Enter Sale or Rent Price">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="prop_sec_price">Second Price (Optional)</label>
                                                            <input type="text" id="prop_sec_price" class="form-control" name="prop_sec_price" placeholder="Enter your property second price">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="prop_label">After Price Label (ex: monthly)</label>
                                                            <input type="text" id="prop_label" class="form-control" name="prop_label" placeholder="Enter after price label">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="prop_price_prefix">Price Prefix (ex: Start from)</label>
                                                            <input type="text" id="prop_price_prefix" class="form-control" name="prop_price_prefix" placeholder="Enter before price label">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="account-block form-step">
                                        <div class="add-title-tab">
                                            <h3>Property media</h3>
                                            <div class="add-expand"></div>
                                        </div>
                                        <div class="add-tab-content">
                                            <div class="add-tab-row">
                                                <div class="property-media">
                                                    <div class="media-gallery">
                                                        <div class="row">
                                                            <div id="houzez_property_gallery_container"> </div>
                                                        </div>
                                                    </div>
                                                    <div id="houzez_gallery_dragDrop" class="media-drag-drop">
                                                        <span class="icon-cloud-upload text-primary"><i class="fa fa-cloud-upload"></i></span>
                                                        <h4 class="drag-title">Drag and drop images here</h4>
                                                        <a id="select_gallery_images" href="javascript:;" class="btn btn-primary">Select Images</a>
                                                    </div>
                                                    <div id="plupload-container"></div>
                                                    <div id="houzez_errors"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="account-block form-step">
                                        <div class="add-title-tab">
                                            <h3>Property Details</h3>
                                            <div class="add-expand"></div>
                                        </div>
                                        <div class="add-tab-content">
                                            <div class="add-tab-row push-padding-bottom">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="property_id">Property ID</label>
                                                            <input type="text" id="property_id" class="form-control" name="property_id" placeholder="Enter property ID">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="prop_size">Area Size ( Only digits )*</label>
                                                            <input type="text" id="prop_size" class="form-control" name="prop_size" placeholder="Enter property area size" value="">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="prop_size_prefix">Size Prefix</label>
                                                            <input type="text" id="prop_size_prefix" class="form-control" name="prop_size_prefix" value="sqft">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="prop_land_area">Land Area ( Only digits )</label>
                                                            <input type="text" id="prop_land_area" class="form-control" name="prop_land_area" placeholder="Enter property land area size" value="">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="prop_land_area_prefix">Land Area Size Postfix</label>
                                                            <input type="text" id="prop_land_area_prefix" class="form-control" name="prop_land_area_prefix" value="sqft">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="prop_beds">Bedrooms</label>
                                                            <input type="text" id="prop_beds" class="form-control" name="prop_beds" placeholder="Enter number of bedrooms" value="">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="prop_baths">Bathrooms</label>
                                                            <input type="text" id="prop_baths" class="form-control" name="prop_baths" placeholder="Enter number of bathrooms" value="">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="prop_garage">Garages</label>
                                                            <input type="text" id="prop_garage" class="form-control" name="prop_garage" placeholder="Enter number of garages" value="">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="prop_garage_size">Garages Size</label>
                                                            <input type="text" id="prop_garage_size" class="form-control" name="prop_garage_size" placeholder="Enter garage size" value="">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="prop_year_built">Year Built</label>
                                                            <div class="input-group">
                                                                <div class="input-group-addon"><i class="fa fa-calendar"></i>
                                                                </div>
                                                                <input type="text" id="prop_year_built" class="input_date form-control" name="prop_year_built" placeholder="Enter year built" value="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="prop_video_url">Video URL</label>
                                                            <input class="form-control" name="prop_video_url" id="prop_video_url" placeholder="YouTube, Vimeo, SWF File and MOV File are supported">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="add-tab-row">
                                                <h4>Additional Features</h4>
                                                <table class="additional-block">
                                                    <thead>
                                                        <tr>
                                                            <td> </td>
                                                            <td><label>Title</label></td>
                                                            <td><label>Value</label></td>
                                                            <td> </td>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="houzez_additional_details_main">
                                                        <tr>
                                                            <td class="action-field">
                                                                <span class="sort-additional-row"><i class="fa fa-navicon"></i></span>
                                                            </td>
                                                            <td class="field-title">
                                                                <input class="form-control" type="text" name="additional_features[0][fave_additional_feature_title]" id="fave_additional_feature_title_0" placeholder="Eg: Equipment" value="">
                                                            </td>
                                                            <td>
                                                                <input class="form-control" type="text" name="additional_features[0][fave_additional_feature_value]" id="fave_additional_feature_value_0" placeholder="Grill - Gas" value="">
                                                            </td>
                                                            <td class="action-field">
                                                                <span data-remove="0" class="remove-additional-row"><i class="fa fa-remove"></i></span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td></td>
                                                            <td>
                                                                <button data-increment="0" class="add-additional-row"><i class="fa fa-plus"></i> Add New</button>
                                                            </td>
                                                            <td></td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="account-block form-step">
                                        <div class="add-title-tab">
                                            <h3>Property Features</h3>
                                            <div class="add-expand"></div>
                                        </div>
                                        <div class="add-tab-content">
                                            <div class="add-tab-row push-padding-bottom">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" name="prop_features[]" id="feature-1" value="21"/>Air Conditioning
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" name="prop_features[]" id="feature-2" value="22"/>Barbeque
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" name="prop_features[]" id="feature-3" value="20"/>Dryer
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" name="prop_features[]" id="feature-4" value="11"/>Gym
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" name="prop_features[]" id="feature-5" value="12"/>Laundry
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" name="prop_features[]" id="feature-6" value="6"/>Lawn
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" name="prop_features[]" id="feature-7" value="18"/>Microwave
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" name="prop_features[]" id="feature-8" value="26"/>Outdoor Shower
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" name="prop_features[]" id="feature-9" value="15"/>Refrigerator
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" name="prop_features[]" id="feature-10" value="14"/>Sauna
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" name="prop_features[]" id="feature-11" value="4"/>Swimming Pool
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" name="prop_features[]" id="feature-12" value="13"/>TV Cable
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" name="prop_features[]" id="feature-13" value="19"/>Washer
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" name="prop_features[]" id="feature-14" value="5"/>WiFi
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" name="prop_features[]" id="feature-15" value="25"/>Window Coverings
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="account-block form-step">
                                        <script>
                                            jQuery(function($) {
                                                "use strict";
                                                var geo_input = $("#geocomplete");

                                                function houzez_geocomplete() {
                                                    geo_input.geocomplete({
                                                        map: ".map_canvas",
                                                        details: "form",
                                                        types: ["geocode", "establishment"],
                                                        country: '',
                                                        markerOptions: {
                                                            draggable: true
                                                        }
                                                    });
                                                    geo_input.bind("geocode:dragged", function(event, latLng) {
                                                        $("input[name=lat]").val(latLng.lat());
                                                        $("input[name=lng]").val(latLng.lng());
                                                        $("#reset").show();
                                                        var map = $("#geocomplete").geocomplete("map");
                                                        map.panTo(latLng);
                                                        var geocoder = new google.maps.Geocoder();
                                                        geocoder.geocode({
                                                            'latLng': latLng
                                                        }, function(results, status) {
                                                            if (status == google.maps.GeocoderStatus.OK) { //alert(JSON.stringify(results));
                                                                if (results[0]) {
                                                                    var road = results[0].address_components[1].short_name;
                                                                    var town = results[0].address_components[2].short_name;
                                                                    var county = results[0].address_components[3].long_name;
                                                                    var country = results[0].address_components[4].short_name;
                                                                    $("input[name=property_map_address]").val(road + ' ' + town + ' ' + county + ' ' + country);
                                                                }
                                                            }
                                                        });
                                                    });
                                                    geo_input.on('focus', function() {
                                                        var map = $("#geocomplete").geocomplete("map");
                                                        google.maps.event.trigger(map, 'resize')
                                                    });
                                                    $("#reset").on("click", function() {
                                                        $("#geocomplete").geocomplete("resetMarker");
                                                        $("#reset").hide();
                                                        return false;
                                                    });
                                                    $("#find").on("click", function(e) {
                                                        e.preventDefault();
                                                        $("#geocomplete").trigger("geocode");
                                                    });
                                                }
                                                houzez_geocomplete();
                                            });
                                        </script>
                                        <div class="add-title-tab">
                                            <h3>Property location</h3>
                                            <div class="add-expand"></div>
                                        </div>
                                        <div class="add-tab-content">
                                            <div class="add-tab-row  push-padding-bottom">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="geocomplete">Address*</label>
                                                            <input class="form-control" name="property_map_address" id="geocomplete" placeholder="Enter your property address">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="zip">Postal Code / Zip</label>
                                                            <input class="form-control" name="postal_code" id="zip" placeholder="Enter your property zip code">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 submit_country_field">
                                                        <div class="form-group">
                                                            <label for="country">Country</label>
                                                            <input class="form-control" name="country" id="country" placeholder="Enter your property country">
                                                            <input name="country_short" type="hidden" value="">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="countyState">County / State</label>
                                                            <input class="form-control" name="administrative_area_level_1" id="countyState" placeholder="Enter your property county/state">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="city">City</label>
                                                            <input class="form-control" name="locality" id="city" placeholder="Enter your property city">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="neighborhood">Neighborhood</label>
                                                            <input class="form-control" name="neighborhood" id="neighborhood" placeholder="Enter your property neighborhood">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="add-tab-row">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="map_canvas" id="map"> </div>
                                                        <button id="find" class="btn btn-primary btn-block">Place the pin the address above</button>
                                                        <a id="reset" href="#" style="display:none;">Reset Marker</a>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="latitude">Google Maps latitude</label>
                                                            <input class="form-control" name="lat" id="latitude" placeholder="Enter google maps latitude">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="longitude">Google Maps longitude</label>
                                                            <input class="form-control" name="lng" id="longitude" placeholder="Enter google maps longitude">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="prop_google_street_view">Google Map Street View</label>
                                                            <select name="prop_google_street_view" id="prop_google_street_view" class="selectpicker" data-live-search="false">
                                                                <option value="hide">Hide</option>
                                                                <option selected value="show">Show</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="account-block form-step">
                                        <div class="add-title-tab">
                                            <h3>Private Note</h3>
                                            <div class="add-expand"></div>
                                        </div>
                                        <div class="add-tab-content">
                                            <div class="add-tab-row push-padding-bottom">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <textarea class="form-control" name="private_note" id="private_note" rows="6" placeholder="Write private note for this property, it will not display for public."></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="account-block class-for-register-msg form-step">
                                        <div class="add-title-tab">
                                            <h3>Do you have an account?</h3>
                                            <div class="add-expand"></div>
                                        </div>
                                        <div class="add-tab-content">
                                            <div class="add-tab-row push-padding-bottom">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <p>If you don't have an account you can create one below by entering your email address. Your account details will be confirmed via email. Otherwise you can </p>
                                                        <div class="form-group step-login-btn">
                                                            <a href="#" class="login-here">Login here</a>
                                                            <a href="#" class="register-here" style="display: none">Register here</a>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="houzez_messages_register message"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="tab-content">
                                                            <div class="tab-pane fade in active step-tab-register">
                                                                <div class="row">
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <label for="username">Username* </label>
                                                                            <input type="text" id="username" name="username" class="form-control" placeholder="Enter your username">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <label for="user_email">Email Address* </label>
                                                                            <input type="email" id="user_email" class="form-control" name="user_email" placeholder="Enter your email address">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade step-tab-login">
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label for="sp_username">Username* </label>
                                                                            <input type="text" id="sp_username" name="sp_username" class="form-control" placeholder="Enter Your Username">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label for="sp_password">Password* </label>
                                                                            <input type="password" id="sp_password" class="form-control" name="sp_password" placeholder="Enter Your Password">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" id="houzez_register_security2" name="houzez_register_security2" value="65b705e9ec"/>
                                                    <input type="hidden" name="_wp_http_referer" value="/add-new-property/"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" id="property_nonce" name="property_nonce" value="b9c50e0257"/>
                                    <input type="hidden" name="_wp_http_referer" value="/add-new-property/"/>
                                    <input type="hidden" name="action" value="add_property"/>
                                    <input type="hidden" name="prop_featured" value="0"/>
                                    <input type="hidden" name="prop_payment" value="not_paid"/>
                                    <input type="hidden" name="user_submit_has_no_membership" value="yes"/>
                                    <div class="steps-nav">
                                        <div class="btn-left btn-back action">
                                            <button type="button" class="btn">
                                                <i class="fa fa-angle-left"></i>
                                            </button>
                                            <span>Back</span>
                                        </div>
                                        <div class="btn-right btn-next action">
                                            <span>Next</span>
                                            <button type="button" class="btn">
                                                <i class="fa fa-angle-right"></i>
                                            </button>
                                        </div>
                                        <div class="btn-right action btn-submit btn-step-submit">
                                            <span>Submit Property</span>
                                            <button id="add_new_property" type="submit" class="btn">
                                                <i class="fa fa-angle-right"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <link rel='stylesheet' id='buttons-css' href='/wp-content/wp-includes/css/buttons.min66f2.css?ver=4.7.5' type='text/css' media='all' />
        <script type='text/javascript' src='/wp-content/plugins/contact-form-7/includes/js/jquery.form.mind03d.js?ver=3.51.0-2014.06.20'></script>
        <script type='text/javascript'>
            /* <![CDATA[ */
            var _wpcf7 = {
                "recaptcha": {
                    "messages": {
                        "empty": "Please verify that you are not a robot."
                    }
                },
                "cached": "1"
            };
            /* ]]> */
        </script>
        <script type='text/javascript' src='/wp-content/plugins/contact-form-7/includes/js/scripts4906.js?ver=4.7'></script>
        <script type='text/javascript' src='/wp-content/themes/houzez/js/bootstrap.min.js?ver=3.3.5'></script>
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
        <script type='text/javascript' src='/wp-content/themes/houzez/js/plugins2846.js?ver=1.5.5'></script>
        <script type='text/javascript' src='/wp-content/wp-includes/js/jquery/ui/core.mine899.js?ver=1.11.4'></script>
        <script type='text/javascript' src='/wp-content/wp-includes/js/jquery/ui/datepicker.mine899.js?ver=1.11.4'></script>
        <script type='text/javascript'>
            jQuery(document).ready(function(jQuery) {
                jQuery.datepicker.setDefaults({
                    "closeText": "Close",
                    "currentText": "Today",
                    "monthNames": ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                    "monthNamesShort": ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    "nextText": "Next",
                    "prevText": "Previous",
                    "dayNames": ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
                    "dayNamesShort": ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
                    "dayNamesMin": ["S", "M", "T", "W", "T", "F", "S"],
                    "dateFormat": "MM d, yy",
                    "firstDay": 1,
                    "isRTL": false
                });
            });
        </script>
        <script type='text/javascript' src='/wp-content/wp-includes/js/jquery/ui/widget.mine899.js?ver=1.11.4'></script>
        <script type='text/javascript' src='/wp-content/wp-includes/js/jquery/ui/position.mine899.js?ver=1.11.4'></script>
        <script type='text/javascript' src='/wp-content/wp-includes/js/jquery/ui/menu.mine899.js?ver=1.11.4'></script>
        <script type='text/javascript' src='/wp-content/wp-includes/js/wp-a11y.min66f2.js?ver=4.7.5'></script>
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
        <script type='text/javascript' src='/wp-content/wp-includes/js/jquery/ui/autocomplete.mine899.js?ver=1.11.4'></script>
        <script type='text/javascript' src='/wp-content/wp-includes/js/jquery/ui/mouse.mine899.js?ver=1.11.4'></script>
        <script type='text/javascript' src='/wp-content/wp-includes/js/jquery/jquery.ui.touch-punchc682.js?ver=0.2.2'></script>
        <script type='text/javascript'>
            /* <![CDATA[ */
            var HOUZEZ_ajaxcalls_vars = {
                "admin_url": "/houzez01.favethemes.com\/wp-admin\/",
                "houzez_rtl": "no",
                "redirect_type": "same_page",
                "login_redirect": "http:\/\/houzez01.favethemes.com\/add-new-property\/",
                "login_loading": "Sending user info, please wait...",
                "direct_pay_text": "Processing, Please wait...",
                "user_id": "0",
                "transparent_menu": "",
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
                "fave_page_template": "submit_property.php",
                "google_map_style": "[{\"featureType\":\"administrative\",\"elementType\":\"labels.text.fill\",\"stylers\":[{\"color\":\"#444444\"}]},{\"featureType\":\"landscape\",\"elementType\":\"all\",\"stylers\":[{\"color\":\"#f2f2f2\"}]},{\"featureType\":\"poi\",\"elementType\":\"all\",\"stylers\":[{\"visibility\":\"off\"}]},{\"featureType\":\"road\",\"elementType\":\"all\",\"stylers\":[{\"saturation\":-100},{\"lightness\":45}]},{\"featureType\":\"road.highway\",\"elementType\":\"all\",\"stylers\":[{\"visibility\":\"simplified\"}]},{\"featureType\":\"road.arterial\",\"elementType\":\"labels.icon\",\"stylers\":[{\"visibility\":\"off\"}]},{\"featureType\":\"transit\",\"elementType\":\"all\",\"stylers\":[{\"visibility\":\"off\"}]},{\"featureType\":\"water\",\"elementType\":\"all\",\"stylers\":[{\"color\":\"#46bcec\"},{\"visibility\":\"on\"}]}]",
                "googlemap_default_zoom": "1",
                "googlemap_pin_cluster": "yes",
                "googlemap_zoom_cluster": "5",
                "map_icons_path": "http:\/\/houzez01.favethemes.com\/wp-content\/themes\/houzez\/images\/map\/",
                "infoboxClose": "http:\/\/houzez01.favethemes.com\/wp-content\/themes\/houzez\/images\/map\/close.png",
                "clusterIcon": "http:\/\/houzez01.favethemes.com\/wp-content\/themes\/houzez\/images\/map\/cluster-icon.png",
                "google_map_needed": "yes",
                "paged": "0",
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
                "header_map_selected_city": [],
                "thousands_separator": ",",
                "current_tempalte": "template\/submit_property.php",
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
        <script type='text/javascript' src='/wp-content/themes/houzez/js/houzez_ajax_calls2846.js?ver=1.5.5'></script>
        <script type='text/javascript' src='/wp-content/themes/houzez/js/custom2846.js?ver=1.5.5'></script>
        <script type='text/javascript' src='/wp-content/wp-includes/js/jquery/ui/sortable.mine899.js?ver=1.11.4'></script>
        <script type='text/javascript' src='/wp-content/themes/houzez/js/jquery.validate.mine57b.js?ver=1.14.0'></script>
        <script type='text/javascript'>
            /* <![CDATA[ */
            var houzezProperty = {
                "ajaxURL": "http:\/\/houzez01.favethemes.com\/wp-admin\/admin-ajax.php",
                "verify_nonce": "bbde4a9854",
                "verify_file_type": "Valid file formats",
                "msg_digits": "Please enter only digits",
                "max_prop_images": "10",
                "image_max_file_size": "1000kb",
                "plan_title_text": "Plan Title",
                "plan_size_text": "Plan Size",
                "plan_bedrooms_text": "Plan Bedrooms",
                "plan_bathrooms_text": "Plan Bathrooms",
                "plan_price_text": "Plan Price",
                "plan_price_postfix_text": "Price Postfix",
                "plan_image_text": "Plan Image",
                "plan_description_text": "Plan Description",
                "plan_upload_text": "Upload",
                "mu_title_text": "Title",
                "mu_type_text": "Property Type",
                "mu_beds_text": "Bedrooms",
                "mu_baths_text": "Bathrooms",
                "mu_size_text": "Property Size",
                "mu_size_postfix_text": "Size Postfix",
                "mu_price_text": "Property Price",
                "mu_price_postfix_text": "Price Postfix",
                "mu_availability_text": "Availability Date",
                "prop_title": "1",
                "prop_type": "",
                "prop_status": "",
                "prop_labels": "",
                "prop_price": "1",
                "prop_sec_price": "",
                "price_label": "",
                "prop_id": "",
                "bedrooms": "",
                "bathrooms": "",
                "area_size": "1",
                "land_area": "",
                "garages": "",
                "year_built": "",
                "property_map_address": "1",
                "houzez_logged_in": "no",
                "process_loader_refresh": "fa fa-spin fa-refresh",
                "process_loader_spinner": "fa fa-spin fa-spinner",
                "process_loader_circle": "fa fa-spin fa-circle-o-notch",
                "process_loader_cog": "fa fa-spin fa-cog",
                "success_icon": "fa fa-check",
                "login_loading": "Sending user info, please wait...",
                "processing_text": "Processing, Please wait...",
                "add_listing_msg": "Submitting, Please wait..."
            };
            /* ]]> */
        </script>
        <script type='text/javascript' src='/wp-content/themes/houzez/js/houzez_property2846.js?ver=1.5.5'></script>
        <script type='text/javascript' src='/wp-content/wp-includes/js/wp-embed.min66f2.js?ver=4.7.5'></script>
        <script type='text/javascript'>
            /* <![CDATA[ */
            var quicktagsL10n = {
                "closeAllOpenTags": "Close all open tags",
                "closeTags": "close tags",
                "enterURL": "Enter the URL",
                "enterImageURL": "Enter the URL of the image",
                "enterImageDescription": "Enter a description of the image",
                "textdirection": "text direction",
                "toggleTextdirection": "Toggle Editor Text Direction",
                "dfw": "Distraction-free writing mode",
                "strong": "Bold",
                "strongClose": "Close bold tag",
                "em": "Italic",
                "emClose": "Close italic tag",
                "link": "Insert link",
                "blockquote": "Blockquote",
                "blockquoteClose": "Close blockquote tag",
                "del": "Deleted text (strikethrough)",
                "delClose": "Close deleted text tag",
                "ins": "Inserted text",
                "insClose": "Close inserted text tag",
                "image": "Insert image",
                "ul": "Bulleted list",
                "ulClose": "Close bulleted list tag",
                "ol": "Numbered list",
                "olClose": "Close numbered list tag",
                "li": "List item",
                "liClose": "Close list item tag",
                "code": "Code",
                "codeClose": "Close code tag",
                "more": "Insert Read More tag"
            };
            /* ]]> */
        </script>

        <script type='text/javascript' src='/wp-content/wp-includes/js/quicktags.min66f2.js?ver=4.7.5'></script>
        <script type='text/javascript'>
            /* <![CDATA[ */
            var wpLinkL10n = {
                "title": "Insert\/edit link",
                "update": "Update",
                "save": "Add Link",
                "noTitle": "(no title)",
                "noMatchesFound": "No results found.",
                "linkSelected": "Link selected.",
                "linkInserted": "Link inserted."
            };
            /* ]]> */
        </script>
        <script type='text/javascript' src='/wp-content/wp-includes/js/wplink.min66f2.js?ver=4.7.5'></script>
        <script type="text/javascript">
            tinyMCEPreInit = {
                baseURL: "",
                suffix: ".min",
                mceInit: {},
                qtInit: {
                    'prop_des': {
                        id: "prop_des",
                        buttons: "strong,em,link,block,del,ins,img,ul,ol,li,code,more,close"
                    }
                },
                ref: {
                    plugins: "",
                    theme: "modern",
                    language: ""
                },
                load_ext: function(url, lang) {
                    var sl = tinymce.ScriptLoader;
                    sl.markDone(url + '/langs/' + lang + '.js');
                    sl.markDone(url + '/langs/' + lang + '_dlg.js');
                }
            };
        </script>
        <script type="text/javascript">
            var ajaxurl = "../wp-admin/admin-ajax.html";
            (function() {
                var init, id, $wrap;
                if (typeof tinymce !== 'undefined') {
                    for (id in tinyMCEPreInit.mceInit) {
                        init = tinyMCEPreInit.mceInit[id];
                        $wrap = tinymce.$('#wp-' + id + '-wrap');
                        if (($wrap.hasClass('tmce-active') || !tinyMCEPreInit.qtInit.hasOwnProperty(id)) && !init.wp_skip_init) {
                            tinymce.init(init);
                            if (!window.wpActiveEditor) {
                                window.wpActiveEditor = id;
                            }
                        }
                    }
                }
                if (typeof quicktags !== 'undefined') {
                    for (id in tinyMCEPreInit.qtInit) {
                        quicktags(tinyMCEPreInit.qtInit[id]);
                        if (!window.wpActiveEditor) {
                            window.wpActiveEditor = id;
                        }
                    }
                }
            }());
        </script>
        <div id="wp-link-backdrop" style="display: none"></div>
        <div id="wp-link-wrap" class="wp-core-ui" style="display: none" role="dialog" aria-labelledby="link-modal-title">
            <form id="wp-link" tabindex="-1">
                <input type="hidden" id="_ajax_linking_nonce" name="_ajax_linking_nonce" value="59c14601b4"/>
                <h1 id="link-modal-title">Insert/edit link</h1>
                <button type="button" id="wp-link-close"><span class="screen-reader-text">Close</span>
                </button>
                <div id="link-selector">
                    <div id="link-options">
                        <p class="howto" id="wplink-enter-url">Enter the destination URL</p>
                        <div>
                            <label>
                                <span>URL</span>
                                <input id="wp-link-url" type="text" aria-describedby="wplink-enter-url"/>
                            </label>
                        </div>
                        <div class="wp-link-text-field">
                            <label>
                                <span>Link Text</span>
                                <input id="wp-link-text" type="text"/>
                            </label>
                        </div>
                        <div class="link-target">
                            <label>
                                <span></span>
                                <input type="checkbox" id="wp-link-target"/> Open link in a new tab
                            </label>
                        </div>
                    </div>
                    <p class="howto" id="wplink-link-existing-content">Or link to existing content</p>
                    <div id="search-panel">
                        <div class="link-search-wrapper">
                            <label>
                                <span class="search-label">Search</span>
                                <input type="search" id="wp-link-search" class="link-search-field" autocomplete="off" aria-describedby="wplink-link-existing-content"/>
                                <span class="spinner"></span>
                            </label>
                        </div>
                        <div id="search-results" class="query-results" tabindex="0">
                            <ul></ul>
                            <div class="river-waiting"> <span class="spinner"></span> </div>
                        </div>
                        <div id="most-recent-results" class="query-results" tabindex="0">
                            <div class="query-notice" id="query-notice-message"> <em class="query-notice-default">No search term specified. Showing recent items.</em> <em class="query-notice-hint screen-reader-text">Search or use up and down arrow keys to select an item.</em> </div>
                            <ul></ul>
                            <div class="river-waiting"> <span class="spinner"></span> </div>
                        </div>
                    </div>
                </div>
                <div class="submitbox">
                    <div id="wp-link-cancel">
                        <button type="button" class="button">Cancel</button>
                    </div>
                    <div id="wp-link-update">
                        <input type="submit" value="Add Link" class="button button-primary" id="wp-link-submit" name="wp-link-submit">
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
