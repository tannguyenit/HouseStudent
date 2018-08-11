@extends('layouts.layout')
@section('css')
    @parent
    <link rel="stylesheet" href="{{ elixir('css/file-upload.css') }}">
@endsection
@section('headerscript')
    @parent
    <script src="{{ elixir('js/plupload.full.min.js') }}"></script>
    <script>
        jQuery(function($) {
            "use strict";
            var geo_input = $("#geocomplete");

            function getLocationByGoogleMap() {
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
                                var _length = results[0].address_components.length;
                                var road = results[0].address_components[1].long_name;
                                var town = results[0].address_components[_length-4].long_name;
                                var county = results[0].address_components[_length-3].long_name;
                                var country = results[0].address_components[_length-2].short_name;
                                var formatted_address = results[0].formatted_address;
                                $("input[name=address]").val(formatted_address);
                                $("#countyState").val(county);
                                $("#country").val(road);
                                $("#country_short").val(country);
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
            getLocationByGoogleMap();
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
                        @if (!auth()->user())
                            <li class="pay-step-block active">
                                <span>{{ trans('post.account') }}</span>
                            </li>
                        @else
                            <li class="pay-step-block active">
                                <span>{{ trans('post.infomation') }}</span>
                            </li>
                        @endif
                        <li class="pay-step-block ">
                            <span>
                                {{ trans('post.add-image') }}
                            </span>
                        </li>
                        <li class="pay-step-block ">
                            <span>{{ trans('post.home-information') }}</span>
                        </li>
                        <li class="pay-step-block ">
                            <span>{{ trans('post.add-address') }}</span>
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
                                <strong>{{ trans('validate.errors') }}</strong> {{ trans('validate.required') }}.
                            </div>
                            <div class="validate-errors-gal alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-hide="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <strong>{{ trans('validate.errors') }}</strong> {{ trans('validate.add-image') }}
                            </div>
                            <div class="submit-form-wrap">
                                @if (!auth()->user())
                                    {!! Form::hidden('check_login', '1') !!}
                                    <div class="account-block class-for-register-msg form-step">
                                        <div class="add-title-tab">
                                            <h3>{{ trans('post.not-account') }}</h3>
                                            <div class="add-expand"></div>
                                        </div>
                                        <div class="add-tab-content">
                                            <div class="add-tab-row push-padding-bottom">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <p>{{ trans('post.register-account') }}</p>
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
                                                                            {!! Form::label('user_name', trans('form.username')) !!} <span class="error">(*)</span>
                                                                            {!! Form::text('username', '', ['class' => 'form-control', 'id' => 'user_name', 'placeholder' => trans('validate.placeholder.username')]) !!}
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            {!! Form::label('first_name', trans('form.first_name')) !!} <span class="error">(*)</span>
                                                                            {!! Form::text('first_name', '', ['class' => 'form-control', 'id' => 'first_name', 'placeholder' => trans('validate.placeholder.first_name')]) !!}
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            {!! Form::label('last_name', trans('form.last_name')) !!} <span class="error">(*)</span>
                                                                            {!! Form::text('last_name', '', ['class' => 'form-control', 'id' => 'last_name', 'placeholder' => trans('validate.placeholder.last_name')]) !!}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            {!! Form::label('email', trans('form.email')) !!} <span class="error">(*)</span>
                                                                            {!! Form::email('email', '', ['class' => 'form-control', 'id' => 'email', 'placeholder' => trans('validate.placeholder.email')]) !!}
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            {!! Form::label('password', trans('form.password')) !!} <span class="error">(*)</span>
                                                                            {!! Form::password('password', ['class' => 'form-control', 'id' => 'password', 'placeholder' => trans('validate.placeholder.password')]) !!}
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            {!! Form::label('phone', trans('form.phone')) !!} <span class="error">(*)</span>
                                                                            {!! Form::number('phone', '', ['class' => 'form-control', 'id' => 'phone', 'placeholder' => trans('validate.placeholder.phone')]) !!}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    {!! Form::hidden('check_login', '0') !!}
                                @endif
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
                                                        {!! Form::label('title', trans('post.title')) !!} <span class="error">(*)</span>
                                                        {!! Form::text('title', '', ['class' => 'form-control', 'id' => 'title', 'placeholder' => trans('validate.placeholder.title')]) !!}
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        {!! Form::label('description', trans('post.description')) !!} <span class="error">(*)</span>
                                                        {!! Form::textarea('description', '', ['class' => 'text-editor-area form-control', 'id' => 'description', 'rows' => 10, 'cols' => 30]) !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="add-tab-row push-padding-bottom">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        {!! Form::label('category_id', trans('post.type')) !!} <span class="error">(*)</span>
                                                        <select name="category_id" id="category_id" class="selectpicker" data-live-search="false" data-live-search-style="begins">
                                                            <option selected="selected" value="">{{ trans('post.none') }}</option>
                                                            @forelse ($types as $element)
                                                                <option value="{{ $element->id }}">{{ $element->title }}</option>
                                                            @empty
                                                            @endforelse
                                                        </select>
                                                        <label id="category_id-error" class="error" for="category_id"></label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        {!! Form::label('status_id', trans('post.status')) !!} <span class="error">(*)</span>
                                                        <select name="status_id" id="status_id" class="selectpicker" data-live-search="false" data-live-search-style="begins">
                                                            <option selected="selected" value="">{{ trans('post.none') }}</option>
                                                            @forelse ($statuses as $element)
                                                                <option value="{{ $element->id }}">{{ $element->title }}</option>
                                                            @empty
                                                            @endforelse
                                                        </select>
                                                        <label id="status_id-error" class="error" for="status_id"></label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        {!! Form::label('price', trans('post.price')) !!} <span class="error">(*)</span>
                                                        {!! Form::text('price', '', ['class' => 'form-control','pattern' =>'^\$\d{1,3}(,\d{3})*(\.\d+)?$', 'id' => 'price', 'placeholder' => trans('validate.placeholder.price')]) !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
                                                        {!! Form::label('name_boss', trans('post.name-boss')) !!} <span class="error">(*)</span>
                                                        {!! Form::text('name_boss', '', ['id' => 'name_boss', 'class' => 'form-control', 'placeholder' => trans('validate.placeholder.name-boss')]) !!}
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        {!! Form::label('phone_boss', trans('post.phone-boss')) !!} <span class="error">(*)</span>
                                                        {!! Form::number('phone_boss', '', ['id' => 'phone_boss', 'class' => 'form-control', 'placeholder' => trans('validate.placeholder.phone-boss')]) !!}
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        {!! Form::label('area', trans('post.area')) !!} <span class="error">(*)</span>
                                                        {!! Form::text('area', '', ['id' => 'area', 'class' => 'form-control', 'placeholder' => trans('validate.placeholder.area')]) !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="add-tab-row">
                                            <h4>{{ trans('post.features') }}</h4>
                                            <table class="additional-block">
                                                <thead>
                                                <tr>
                                                    <td> </td>
                                                    <td><label>{{ trans('post.title') }}</label></td>
                                                    <td><label>{{ trans('post.value') }}</label></td>
                                                    <td> </td>
                                                </tr>
                                                </thead>
                                                <tbody id="houzez_additional_details_main">
                                                <tr>
                                                    <td class="action-field">
                                                        <span class="sort-additional-row"><i class="fa fa-navicon"></i></span>
                                                    </td>
                                                    <td class="field-title">
                                                        {!! Form::text('additional_features[0][key]', '', ['class' => 'form-control', 'id' => 'fave_additional_feature_title_0', 'placeholder' => trans('validate.placeholder.electricity')]) !!}
                                                    </td>
                                                    <td>
                                                        {!! Form::text('additional_features[0][value]', '', ['class' => 'form-control', 'id' => 'fave_additional_feature_value_0', 'placeholder' => trans('validate.placeholder.value')]) !!}
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
                                                        <button data-increment="0" class="add-additional-row">
                                                            <i class="fa fa-plus"></i>{{ trans('post.add-new') }}
                                                        </button>
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
                                        <h3>{{ trans('post.location') }}</h3>
                                        <div class="add-expand"></div>
                                    </div>
                                    <div class="add-tab-content">
                                        <div class="add-tab-row  push-padding-bottom">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        {!! Form::label('geocomplete', trans('post.street')) !!} <span class="error">(*)</span>
                                                        {!! Form::text('address', '', ['class' => 'form-control', 'id' => 'geocomplete', 'placeholder' => trans('validate.placeholder.street')]) !!}
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 submit_country_field">
                                                    <div class="form-group">
                                                        {!! Form::label('country', trans('post.address')) !!} <span class="error">(*)</span>
                                                        {!! Form::text('route', '', ['class' => 'form-control', 'id' => 'country', 'placeholder' => trans('validate.placeholder.address')]) !!}
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        {!! Form::label('countyState', trans('post.county')) !!} <span class="error">(*)</span>
                                                        {!! Form::text('administrative_area_level_2', '', ['class' => 'form-control', 'id' => 'countyState', 'placeholder' => trans('validate.placeholder.county')]) !!}
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        {!! Form::label('city', trans('post.city')) !!} <span class="error">(*)</span>
                                                        {!! Form::text('administrative_area_level_1', '', ['class' => 'form-control', 'id' => 'city', 'placeholder' => trans('validate.placeholder.city')]) !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="add-tab-row">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="map_canvas" id="map"></div>
                                                    <button id="find" class="btn btn-primary btn-block">{{ trans('post.pin') }}</button>
                                                    <a id="reset" href="#" class="hidden">{{ trans('post.reset-maker') }}</a>
                                                </div>
                                                <div class="col-sm-6 hidden">
                                                    {!! Form::hidden('lat', '', ['id' => 'latitude']) !!}
                                                    {!! Form::hidden('lng', '', ['id' => 'longitude']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="account-block form-step">
                                    <div class="add-title-tab">
                                        <h3>{{ trans('post.note') }}</h3>
                                        <div class="add-expand"></div>
                                    </div>
                                    <div class="add-tab-content">
                                        <div class="add-tab-row push-padding-bottom">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        {!! Form::textarea('note', '', ['class' => 'form-control', 'rows' => 6, 'placeholder' => trans('validate.placeholder.note') ]) !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="steps-nav">
                                    <div class="btn-left btn-back action">
                                        <button type="button" class="btn">
                                            <i class="fa fa-angle-left"></i>
                                        </button>
                                        <span>{{ trans('form.prev') }}</span>
                                    </div>
                                    <div class="btn-right btn-next action">
                                        <span>{{ trans('form.next') }}</span>
                                        <button type="button" class="btn">
                                            <i class="fa fa-angle-right"></i>
                                        </button>
                                    </div>
                                    <div class="btn-right action btn-submit btn-step-submit">
                                        <span>{{ trans('form.submit') }}</span>
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
    </div>
    @endsection
    @section('footerscript')
        @parent
        <script type='text/javascript'>
            var houseStudent = {
                "ajaxURL": "{{ action('AjaxController@uploadFileUploader') }}",
                "url_check_email": "{{ action('UserController@checkEmail') }}",
                "url_check_username": "{{ action('UserController@checkusername') }}",
                "msg_digits": '{{ trans('validate.msg.digits') }}',
                "login_loading": "Sending user info, please wait...",
                "checkusername": "User name đã tồn tại. Vui lòng nhập lại",
                "checkemail": "Email đã tồn tại. Vui lòng nhập lại",
                "processing_text": "Processing, Please wait...",
                "add_listing_msg": "Submitting, Please wait..."
            };
        </script>
        <script src="{{ elixir('js/create-post.min.js') }}"></script>
        <script type="text/javascript">
            var upload = new Upload('{{ action('AjaxController@uploadFileUploader') }}','{{ action('AjaxController@removeFileUploader') }}')
            upload.init();
        </script>
@endsection
