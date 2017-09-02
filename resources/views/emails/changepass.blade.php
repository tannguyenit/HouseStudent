@extends('layouts.layout')
@section('footerscript')
@parent
<script type="text/javascript">
    $("#frmChangePassword").validate({
        rules: {
            new_password: {
                required: true,
                minlength: 6,
                maxlength: 20
            },
            re_new_password: {
                required: true,
                minlength: 6,
                maxlength: 20,
                equalTo : "#new_password"
            },
        },
        messages: {
            new_password: {
                required: "{{ trans('form.pass.required') }}",
                minlength: "{{ trans('form.pass.min') }}",
                maxlength: "{{ trans('form.pass.max') }}",
            },
            re_new_password: {
                required: "{{ trans('form.pass.required') }}",
                minlength: "{{ trans('form.pass.min') }}",
                maxlength: "{{ trans('form.pass.max') }}",
                equalTo: "{{ trans('form.pass.equal') }}",
            },
        }
    });
</script>
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <main class="site-main" role="main">
            <div class="error-404-page text-center">
                <h1>{{ trans('form.reset-pass') }}</h1>
                {{ Form::open(['method' => 'POST','class' => 'form-horizontal', 'id' => 'frmChangePassword']) }}
                <div class="account-block account-profile-block">
                    <div class="row">
                        <div class="col-md-2 col-sm-12 col-xs-12">
                            <h4>{{ trans('form.get-new-pass') }}</h4>
                        </div>
                        <div class="col-md-10 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label class="control-label col-sm-3" for="new_password">{{ trans('form.new-pass') }} :</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" id="new_password" name="new_password" placeholder="{{ trans('form.new-pass') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3" for="re_new_password">{{ trans('form.comfirm-new-pass') }}:</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" name="re_new_password" id="re_new_password" placeholder="{{ trans('form.comfirm-new-pass') }}">
                                </div>
                            </div>
                            <input type="hidden" name="email" value="{{ !empty($_GET['email']) ? $_GET['email'] : ''}}">
                            <input type="hidden" name="active" value="{{ !empty($_GET['active']) ? $_GET['active'] : ''}}">
                            <button class="btn btn-primary pull-right" id="houzez_change_pass">{{ trans('form.update-pass') }}</button>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </main>
    </div>
</div>
@endsection
