@extends('layouts.admin.layout')
@section('footerscript')
    @parent
    {{ Html::script('wp-content/themes/houzez/admin/js/setting.js') }}
    {{ Html::script('wp-content/themes/houzez/js/tannguyen/edit-user.js') }}
    {{ Html::script('wp-content/themes/houzez/js/tannguyen/jquery-ui.js') }}
    <script type="text/javascript">
        var user = new User('{{ action('UserController@checkEmail') }}', '{{ action('UserController@checkusername') }}');
        user.init();
    </script>
@endsection
@section('content')
<div class="board-header board-header-4">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <div class="board-header-left">
                    <h3 class="board-title">{{ trans('admin.user') }}</h3>
                </div>
                <div class="board-header-right">
                    <ol class="breadcrumb">
                        <li class="active">{{ trans('admin.user') }}</li>
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
                    {{ Form::open(['action' => ['UserController@update', $detailUser->id], 'method' => 'PUT', 'enctype'=>'multipart/form-data', 'id' => 'manager_user']) }}
                    <div class="account-block account-profile-block">
                        <div class="row">
                            <div class="col-md-3 col-sm-12 col-xs-12">
                                <div class="my-avatar">
                                    <div id="houzez_profile_photo">
                                        <div class="houzez-thumb">
                                            <img class="img-circle" id="previewHolder" width="200" height="200" src="{{ $detailUser->avatar }}" alt="{{ $detailUser->avatar }}">
                                        </div>
                                    </div>
                                    <div id="profile_upload_containder">
                                        <label for="update_logo" class="btn btn-primary btn-block">{{ trans('form.update-logo') }}</label>
                                        <input type="file" accept="image/*" id="update_logo" name="avatar" class="hidden">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9 col-sm-12 col-xs-12">
                                <div class="row">
                                    <div class="col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            {!! Form::label('username', trans('admin.attribute.username')) !!}
                                            {!! Form::text('username', $detailUser->username, ['id' => 'username', 'class' => 'form-control', 'disabled' => 'disabled']) !!}
                                            {!! Form::hidden('id', $detailUser->id, ['id' => 'get-user__id']) !!}
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            {!! Form::label('email', trans('admin.attribute.email')) !!}
                                            {!! Form::email('email', $detailUser->email, ['id' => 'email', 'class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            {!! Form::label('first_name', trans('admin.attribute.first_name')) !!}
                                            {!! Form::text('first_name', $detailUser->first_name, ['id' => 'first_name', 'class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            {!! Form::label('last_name', trans('admin.attribute.last_name')) !!}
                                            {!! Form::text('last_name', $detailUser->last_name, ['id' => 'last_name', 'class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            {!! Form::label('birthday', trans('admin.attribute.birthday')) !!}
                                            {!! Form::text('birthday', $detailUser->birthday, ['id' => 'birthday', 'class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            {!! Form::label('gender', trans('admin.attribute.gender')) !!}
                                            <select name="gender" id='gender' class='form-control'>
                                                <option value="{{ config('setting.gender.male') }}" {{ $detailUser->gender == config('setting.gender.male') ? 'selected="selected"' : '' }}>{{ trans('user.male') }}</option>
                                                <option value="{{ config('setting.gender.female') }}" {{ $detailUser->gender == config('setting.gender.female') ? 'selected="selected"' : '' }}>{{ trans('user.female') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            {!! Form::label('address', trans('admin.attribute.address')) !!}
                                            {!! Form::text('address', $detailUser->address, ['id' => 'address', 'class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            {!! Form::label('phone', trans('admin.attribute.phone')) !!}
                                            {!! Form::number('phone', $detailUser->phone, ['id' => 'phone', 'class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            {!! Form::label('bio', trans('admin.attribute.bio')) !!}
                                            {!! Form::textarea('bio', $detailUser->bio, ['class' => 'form-control','id' => 'bio', 'rows' => 6]) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-xs-12 text-right">
                                    <a href="{{ action('UserController@member', $detailUser->username) }}" target="_blank" class="btn btn-primary btn-trans">{{ trans('admin.view-user') }}</a>
                                    <button type="submit" class="btn btn-primary">
                                        {{ trans('admin.update') }}
                                    </button>
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
@endsection
