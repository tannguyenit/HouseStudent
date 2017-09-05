@extends('layouts.admin.layout')
@section('footerscript')
    @parent
    {{ Html::script('wp-content/themes/houzez/admin/js/setting.js') }}
@endsection
@section('content')
    <div class="board-header board-header-4">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <div class="board-header-left">
                        <h3 class="board-title">{{ trans('admin.setting') }}</h3>
                    </div>
                    <div class="board-header-right">
                        <ol class="breadcrumb">
                            <li>
                                <a itemprop="url" href="{{ action('Admin\DashboardController@dashboard') }}">
                                    <span itemprop="title">{{ trans('admin.dashboard') }}</span>
                                </a>
                            </li>
                            <li class="active">{{ trans('admin.setting') }}</li>
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
                        {{ Form::open(['action' => ['Admin\SettingController@update', $setting->id],'method' => 'POST', 'enctype'=>'multipart/form-data']) }}
                            <div class="account-block account-profile-block">
                                <div class="row">
                                    <div class="col-md-3 col-sm-12 col-xs-12">
                                        <div class="my-avatar">
                                            <div id="houzez_profile_photo">
                                                <div class="houzez-thumb">
                                                    <img class="img-circle" id="previewHolder" width="200" height="200" src="{{ $setting->logo }}" alt="{{ $setting->logo }}">
                                                </div>
                                            </div>
                                            <div id="profile_upload_containder">
                                               <label for="update_logo" class="btn btn-primary btn-block">{{ trans('form.update-logo') }}</label>
                                               <input type="file" accept="image/*" id="update_logo" name="logo" class="hidden">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-9 col-sm-12 col-xs-12">
                                        <div class="row">
                                            <div class="col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="setting_email">{{ trans('admin.footer.email') }}</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-envelope"></i>
                                                        </span>
                                                        {!! Form::email('email', $setting->email, ['id' => 'setting_email', 'class' => 'form-control']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="setting_copyright">{{ trans('admin.footer.copyright') }}</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-copyright"></i>
                                                        </span>
                                                        {!! Form::text('copyright', $setting->copyright, ['id' => 'setting_copyright', 'class' => 'form-control']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="setting_address">{{ trans('admin.footer.address') }}</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-map"></i>
                                                        </span>
                                                        {!! Form::text('address', $setting->address, ['id' => 'setting_address', 'class' => 'form-control']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="setting_phone">{{ trans('admin.footer.phone') }}</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-phone"></i>
                                                        </span>
                                                        {!! Form::text('phone', $setting->phone, ['id' => 'setting_phone', 'class' => 'form-control']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="setting_mobile">{{ trans('admin.footer.mobile') }}</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-mobile"></i>
                                                        </span>
                                                        {!! Form::text('mobile', $setting->mobile, ['id' => 'setting_mobile', 'class' => 'form-control']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="setting_facebook">{{ trans('admin.footer.facebook') }}</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-facebook"></i>
                                                        </span>
                                                        {!! Form::text('facebook', $setting->facebook, ['id' => 'setting_facebook', 'class' => 'form-control']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="setting_google">{{ trans('admin.footer.google') }}</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-google"></i>
                                                        </span>
                                                        {!! Form::text('google', $setting->google, ['id' => 'setting_google', 'class' => 'form-control']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="setting_twitter">{{ trans('admin.footer.twitter') }}</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-twitter"></i>
                                                        </span>
                                                        {!! Form::text('twitter', $setting->twitter, ['id' => 'setting_twitter', 'class' => 'form-control']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="setting_maintenance">{{ trans('admin.footer.maintenance') }}</label>
                                                    <div class="form-group">
                                                        <select class="form-control" name="maintenance" id="setting_maintenance">
                                                            <option value="1">1</option>
                                                            <option value="0">0</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary pull-right">{{ trans('admin.update') }}</button>
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
