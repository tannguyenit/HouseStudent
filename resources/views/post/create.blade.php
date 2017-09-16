@extends('layouts.layout')
@section('css')
    @parent
    {{ Html::style('wp-content/themes/houzez/css/jquery.fileuploader.css') }}
    {{ Html::style('wp-content/themes/houzez/css/jquery.fileuploader-theme-thumbnails.css') }}
@endsection
@section('headerscript')
    @parent
    {{ Html::script('wp-content/wp-includes/js/plupload/plupload.full.mincc91.js') }}
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
@endsection
@section('create')
        <div id="section-body" class="landing-page">
        <div class="user-dashboard-right houzez-m-step-form ">
            <div class="board-header board-header-4">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <div class="board-header-left">
                                <h3 class="board-title">{{ trans('post.create') }}</h3>
                            </div>
                            <div class="board-header-right">
                                <div class="steps-progress-main">
                                    <div class="steps-progress">
                                        <span class="width-40"></span>
                                    </div>
                                    {{ trans('post.step') }} (<span class="steps-counter">1</span>/<span class="steps-total">1</span>)
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
                            <span>{{ trans('post.infomation') }}</span>
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
                            <span>{{ trans('post.done') }}</span>
                        </li>
                    </ol>
                    <div class="row dashboard-inner-main">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            {{ Form::open(['action' => 'PostController@store','method' => 'POST','class' => 'add-frontend-property', 'id' => 'submit_property_form', 'name' => 'new_post', 'enctype'=>'multipart/form-data', 'autocomplete' => 'off']) }}
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
                                        <h3>{{ trans('post.title-and-price') }}</h3>
                                        <div class="add-expand"></div>
                                    </div>
                                    <div class="add-tab-content">
                                        <div class="add-tab-row push-padding-bottom">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        {!! Form::label('prop_title', trans('post.title') . ' *') !!}
                                                        {!! Form::text('prop_title', '', ['class' => 'form-control', 'id' => 'prop_title', 'placeholder' => trans('validate.placeholder.title')]) !!}
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        {!! Form::label('prop_des', trans('post.description')) !!}
                                                        <div id="wp-prop_des-wrap" class="wp-core-ui wp-editor-wrap html-active">
                                                            <link rel='stylesheet' id='dashicons-css' href='/wp-content/wp-includes/css/dashicons.min66f2.css?ver=4.7.5' type='text/css' media='all' />
                                                            <link rel='stylesheet' id='editor-buttons-css' href='/wp-content/wp-includes/css/editor.min66f2.css?ver=4.7.5' type='text/css' media='all' />
                                                            <div id="wp-prop_des-editor-container" class="wp-editor-container">
                                                                <div id="qt_prop_des_toolbar" class="quicktags-toolbar"></div>
                                                                {!! Form::textarea('prop_des', '', ['class' => 'text-editor-area', 'id' => 'prop_des', 'rows' => 10, 'cols' => 30]) !!}
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
                                                            @forelse ($types as $element)
                                                                <option value="{{ $element->id }}">{{ $element->title }}</option>
                                                            @empty
                                                            @endforelse
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="prop_status">Status</label>
                                                        <select name="prop_status" id="prop_status" class="selectpicker" data-live-search="false" data-live-search-style="begins">
                                                            <option selected="selected" value="">None</option>
                                                            @forelse ($statuses as $element)
                                                                <option value="{{ $element->id }}">{{ $element->title }}</option>
                                                            @empty
                                                            @endforelse
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        {!! Form::label('prop_price', trans('post.price')) !!}
                                                        {!! Form::text('prop_price', '', ['class' => 'form-control', 'id' => 'prop_price', 'placeholder' => trans('validate.placeholder.price')]) !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="add-tab-row push-padding-bottom">
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
                                        </div> --}}
                                    </div>
                                </div>
                                <div class="account-block form-step">
                                    <div class="add-title-tab">
                                        <h3>{{ trans('post.image') }}</h3>
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
                                                <input multiple id="post_file_topic" required="required" class="hidden" data-fileuploader-limit="8" name="file" type="file">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="account-block form-step">
                                    <div class="add-title-tab">
                                        <h3>{{ trans('post.details') }}</h3>
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
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footerscript')
@parent
    <script type='text/javascript'>
        var houzezProperty = {
            "ajaxURL": "{{ action('AjaxController@uploadFileUploader') }}",
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
            "prop_type": "1",
            "file": "1",
            "prop_des": "1",
            "prop_status": "1",
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
            "houzez_logged_in": "yes",
            "process_loader_refresh": "fa fa-spin fa-refresh",
            "process_loader_spinner": "fa fa-spin fa-spinner",
            "process_loader_circle": "fa fa-spin fa-circle-o-notch",
            "process_loader_cog": "fa fa-spin fa-cog",
            "success_icon": "fa fa-check",
            "login_loading": "Sending user info, please wait...",
            "processing_text": "Processing, Please wait...",
            "add_listing_msg": "Submitting, Please wait..."
        };
    </script>
    <script type='text/javascript' src='/wp-content/themes/houzez/js/houzez_property2846.js?ver=1.5.5'></script>
    <script type='text/javascript' src='/wp-content/wp-includes/js/wp-embed.min66f2.js?ver=4.7.5'></script>
<script type="text/javascript">

    var url = '{{ action('AjaxController@uploadFileUploader') }}';
    var urlRemove = '{{ action('AjaxController@removeFileUploader') }}';
    $('#post_file_topic').fileuploader({
      extensions: ['jpg', 'jpeg', 'png', 'gif', 'ppm', 'pgm'],
      changeInput: 'false',
      theme: 'thumbnails',
      enableApi: true,
      fileMaxSize : 5,
      addMore: true,
      thumbnails: {
        box: '<div class="fileuploader-items">\
              <ul class="fileuploader-items-list">\
              <li class="fileuploader-thumbnails-input"><div class="fileuploader-thumbnails-input-inner">+</div></li>\
              </ul>\
              </div>',
        item: '<li class="fileuploader-item">\
              <div class="fileuploader-item-inner">\
              <div class="thumbnail-holder" >${image}</div>\
              <div class="actions-holder" title="${name}">\
              <a class="fileuploader-action fileuploader-action-remove" title="${captions.remove}"><i class="remove"></i></a>\
              </div>\
              <div class="progress-holder">${progressBar}</div>\
              </div>\
              </li>',
        item2: '<li class="fileuploader-item">\
              <div class="fileuploader-item-inner">\
              <div class="thumbnail-holder">${image}</div>\
              <div class="actions-holder" title="${name}">\
              <a class="fileuploader-action fileuploader-action-remove" title="${captions.remove}"><i class="remove"></i></a>\
              </div>\
              </div>\
              </li>',
        startImageRenderer: false,
        canvasImage: false,
        _selectors: {
          list: '.fileuploader-items-list',
          item: '.fileuploader-item',
          start: '.fileuploader-action-start',
          retry: '.fileuploader-action-retry',
          remove: '.fileuploader-action-remove'
        },
        onItemShow: function(item, listEl) {
          var plusInput = listEl.find('.fileuploader-thumbnails-input');

          plusInput.insertAfter(item.html);

          if(item.format == 'image') {
            item.html.find('.fileuploader-item-icon').hide();
          }
        }
      },
      afterRender: function(listEl, parentEl, newInputEl, inputEl) {
        var plusInput = listEl.find('.fileuploader-thumbnails-input'),
        api = $.fileuploader.getInstance(inputEl.get(0));

        plusInput.on('click', function() {
          api.open();
        });
      },
      upload: {
        url: url,
        data: null,
        type: 'POST',
        enctype: 'multipart/form-data',
        start: true,
        synchron: true,
        beforeSend: null,
        onSuccess: function(data, item) {
          setTimeout(function() {
            item.html.find('.progress-holder').hide();
            item.renderImage();
          }, 400);
        },
        onError: function(item) {
          item.html.find('.progress-holder').hide();
          item.html.find('.fileuploader-item-icon i').text('Failed!');
        },
        onProgress: function(data, item) {
          var progressBar = item.html.find('.progress-holder');

          if (progressBar.length > 0) {
            progressBar.show();
            progressBar.find('.fileuploader-progressbar .bar').width(data.percentage + "%");
          }
        }
      },
      dragDrop: {
        container: '.fileuploader-thumbnails-input'
      },
      onRemove: function(item) {
        $.post(urlRemove, {
          file_name: item.name,
          file_id: '',
        });
      },
      captions: {
        close: 'close',
        download: 'download',
        remove: 'remove',
        errors: {
          filesLimit:  'File nang',
          filesType: 'kieu',
          fileSize:'size',
          filesSizeAll: 'max size',
          fileName:'name file',
          folderUpload: 'upload',
        }
      }
    });
</script>
@endsection
