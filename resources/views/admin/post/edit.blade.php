@extends('layouts.admin.layout')
@section('headerscript')
    @parent
    {{ Html::script('http://maps.googleapis.com/maps/api/js?libraries=places&amp;language=en_US&amp;key=AIzaSyCBnyL9MhOZlec1Mz1_qImukxi-VFqQKJw&amp;ver=1.0') }}
@endsection
@section('footerscript')
    @parent
    {{ Html::script('wp-content/wp-includes/js/plupload/plupload.full.mincc91.js') }}
    {{ Html::script('wp-content/themes/houzez/admin/js/setting.js') }}
    {{ Html::script('wp-content/themes/houzez/js/tannguyen/format-price.js') }}
    {{ Html::script('wp-content/themes/houzez/js/jquery.uploadFile.js') }}
    {{ Html::script('wp-content/themes/houzez/js/tannguyen/validate.js') }}
    {{ Html::script('wp-content/themes/houzez/js/tannguyen/edit-post-google-map.js') }}
    <script type="text/javascript">
            var upload = new Upload('{{ action('AjaxController@uploadFileUploader') }}','{{ action('AjaxController@removeFileUploader') }}')
            upload.editFileUploader();
            $(document).ready(function () {
                var form = $("#submit_property_form");
                var validate = new Validate(form);
                validate.init();
            })
    </script>
@endsection
@section('content')
<div class="board-header board-header-4">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <div class="board-header-left">
                    <h3 class="board-title">{{ trans('admin.edit') }}</h3>
                </div>
                <div class="board-header-right">
                    <ol class="breadcrumb">
                        <li>
                            <a itemprop="url" href="{{ action('Admin\DashboardController@dashboard') }}">
                                <span itemprop="title">{{ trans('admin.dashboard') }}</span>
                            </a>
                        </li>
                        <li class="active">{{ trans('admin.edit') }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="dashboard-content-area dashboard-fix">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="profile-content-area">
                    {{ Form::open(['action' => ['Admin\PostController@update', $post->id],'method' => 'POST', 'enctype'=>'multipart/form-data', 'novalidate'=> "novalidate", 'autocomplete' => 'off', 'id' => 'submit_property_form']) }}
                    <div class="account-block account-profile-block no-padding">
                        <div class="submit-form-wrap">
                            <div class="account-block form-step active">
                                <div class="add-title-tab">
                                    <h3>{{ trans('admin.edit-info') }}</h3>
                                    <div class="add-expand"></div>
                                </div>
                                <div class="add-tab-content">
                                    <div class="add-tab-row push-padding-bottom">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    {!! Form::label('title', trans('post.title') . ' *') !!}
                                                    {!! Form::text('title', $post->title, ['class' => 'form-control', 'id' => 'title', 'placeholder' => trans('validate.placeholder.title')]) !!}
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    {!! Form::label('description', trans('post.description')) !!}
                                                    {!! Form::textarea('description', $post->description, ['class' => 'text-editor-area form-control', 'id' => 'description', 'rows' => 10, 'cols' => 30]) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="add-tab-row push-padding-bottom">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    {!! Form::label('type_id', trans('post.type')) !!}
                                                    <select name="type_id" id="type_id" class="selectpicker" data-live-search="false" data-live-search-style="begins">
                                                        @forelse ($types as $element)
                                                        <option value="{{ $element->id }}" {{ $post->type_id == $element->id ? 'selected="selected"' : '' }}>{{ $element->title }}</option>
                                                        @empty
                                                        @endforelse
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    {!! Form::label('status_id', trans('post.status')) !!}
                                                    <select name="status_id" id="status_id" class="selectpicker" data-live-search="false" data-live-search-style="begins">
                                                        @forelse ($statuses as $element)
                                                        <option value="{{ $element->id }}" {{ $post->status_id == $element->id ? 'selected="selected"' : '' }}>{{ $element->title }}</option>
                                                        @empty
                                                        @endforelse
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    {!! Form::label('price', trans('post.price')) !!}
                                                    {!! Form::text('price', $post->price, ['class' => 'form-control','pattern' =>'^\$\d{1,3}(\.\d{3})*(\,\d+)?$', 'id' => 'price', 'placeholder' => trans('validate.placeholder.price')]) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="add-tab-row push-padding-bottom">
                                        <div class="property-media" data-id="{{ $post->id }}">
                                            <div class="media-gallery">
                                                <div class="row">
                                                    <div id="houzez_property_gallery_container"> </div>
                                                </div>
                                            </div>
                                            @php
                                                $arrFile = [];
                                                foreach ($post->images as $value) {
                                                    $path = public_path() . $value->image;
                                                    if (file_exists($path)) {
                                                        $mimeType  = mime_content_type($path);
                                                        $arrFile[] = [
                                                            'name' => $value->image,
                                                            'type' => $mimeType,
                                                            'file' =>  $value->image,
                                                        ];
                                                    }
                                                }
                                                $file = json_encode($arrFile, true);
                                            @endphp
                                            <input data-fileuploader-limit="13" data-fileuploader-maxSize="3" data-fileuploader-files="{{ $file }}" multiple id="edit_images" required="required" class="hidden" data-fileuploader-limit="8" name="file" type="file">
                                        </div>
                                    </div>
                                    <div class="add-tab-row push-padding-bottom">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    {!! Form::label('name_boss', trans('post.name-boss')) !!}
                                                    {!! Form::text('name_boss', $post->name_boss, ['id' => 'name_boss', 'class' => 'form-control', 'placeholder' => trans('validate.placeholder.name-boss')]) !!}
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    {!! Form::label('phone_boss', trans('post.phone-boss')) !!}
                                                    {!! Form::number('phone_boss', $post->phone_boss, ['id' => 'phone_boss', 'class' => 'form-control', 'placeholder' => trans('validate.placeholder.phone-boss')]) !!}
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    {!! Form::label('area', trans('post.area')) !!}
                                                    {!! Form::text('area', $post->area, ['id' => 'area', 'class' => 'form-control', 'placeholder' => trans('validate.placeholder.area')]) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="add-tab-row push-padding-bottom">
                                        <h4>{{ trans('post.features') }}</h4>
                                        <table class="additional-block">
                                            <thead>
                                                <tr>
                                                    <td class="hidden-xs"> </td>
                                                    <td><label>{{ trans('post.title') }}</label></td>
                                                    <td><label>{{ trans('post.value') }}</label></td>
                                                    <td> </td>
                                                </tr>
                                            </thead>
                                            <tbody id="houzez_additional_details_main">
                                                @forelse ($post->features as$key => $feature)
                                                <tr>
                                                    <td class="action-field hidden-xs">
                                                        <span class="sort-additional-row"><i class="fa fa-navicon"></i></span>
                                                    </td>
                                                    <td class="field-title">
                                                        {!! Form::text('additional_features['. $key . '][key]', $feature->title, ['class' => 'form-control', 'id' => 'fave_additional_feature_title_0', 'placeholder' => trans('validate.placeholder.electricity')]) !!}
                                                    </td>
                                                    <td>
                                                        {!! Form::text('additional_features['. $key . '][value]', $feature->value, ['class' => 'form-control', 'id' => 'fave_additional_feature_value_0', 'placeholder' => trans('validate.placeholder.value')]) !!}
                                                    </td>
                                                    <td class="action-field">
                                                        <span data-remove="0" class="remove-additional-row"><i class="fa fa-remove"></i></span>
                                                    </td>
                                                </tr>
                                                @empty
                                                @endforelse
                                                <tr>
                                                    <td class="action-field hidden-xs">
                                                        <span class="sort-additional-row"><i class="fa fa-navicon"></i></span>
                                                    </td>
                                                    <td class="field-title">
                                                        {!! Form::text('additional_features['. (count($post->features) + 1) . '][key]', '', ['class' => 'form-control', 'id' => 'fave_additional_feature_title_0', 'placeholder' => trans('validate.placeholder.electricity')]) !!}
                                                    </td>
                                                    <td>
                                                        {!! Form::text('additional_features['. (count($post->features) + 1) . '][value]', '', ['class' => 'form-control', 'id' => 'fave_additional_feature_value_0', 'placeholder' => trans('validate.placeholder.value')]) !!}
                                                    </td>
                                                    <td class="action-field">
                                                        <span data-remove="0" class="remove-additional-row"><i class="fa fa-remove"></i></span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td class="hidden-xs"></td>
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
                                    <div class="add-tab-row push-padding-bottom">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    {!! Form::label('geocomplete', trans('post.street') . ' *:') !!}
                                                    {!! Form::text('address', $post->address, ['class' => 'form-control', 'id' => 'geocomplete', 'placeholder' => trans('validate.placeholder.address')]) !!}
                                                </div>
                                            </div>
                                            <div class="col-sm-6 submit_country_field">
                                                <div class="form-group">
                                                    {!! Form::label('country', trans('post.address') . ' *:') !!}
                                                    {!! Form::text('route', $post->township, ['class' => 'form-control', 'id' => 'country', 'placeholder' => trans('validate.placeholder.address')]) !!}
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    {!! Form::label('countyState', trans('post.county') . ' *:') !!}
                                                    {!! Form::text('administrative_area_level_2', $post->township, ['class' => 'form-control', 'id' => 'countyState', 'placeholder' => trans('validate.placeholder.county')]) !!}
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    {!! Form::label('city', trans('post.city') . ' *:') !!}
                                                    {!! Form::text('administrative_area_level_1', $post->country, ['class' => 'form-control', 'id' => 'city', 'placeholder' => trans('validate.placeholder.city')]) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="add-tab-row push-padding-bottom">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="map_canvas" id="map"></div>
                                                <button id="find" class="btn btn-primary btn-block">{{ trans('post.pin') }}</button>
                                                <a id="reset" href="#" class="hidden">{{ trans('post.reset-maker') }}</a>
                                            </div>
                                            <div class="col-sm-6 hidden">
                                                {!! Form::hidden('lat', $post->lat, ['id' => 'latitude']) !!}
                                                {!! Form::hidden('lng', $post->lng, ['id' => 'longitude']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="add-tab-row push-padding-bottom">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    {!! Form::textarea('note', $post->note, ['class' => 'form-control', 'rows' => 6, 'placeholder' => trans('validate.placeholder.note') ]) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="add-tab-row push-padding-bottom">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                {!! Form::submit(trans('form.submit'), ['class' => 'btn btn-primary text-center col-sm-offset-5']) !!}
                                            </div>
                                        </div>
                                    </div>
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
