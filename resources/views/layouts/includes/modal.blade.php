<!-- start modal -->
<div class="modal fade" id="pop-login" tabindex="-1" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <ul class="login-tabs">
                    <li class="active">{{ trans('index.login') }}</li>
                    {{-- <li>{{ trans('index.register') }}</li> --}}
                </ul>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-close"></i>
                </button>
            </div>
            <div class="modal-body login-block class-for-register-msg">
                <div class="tab-content">
                    <div class="tab-pane fade in active">
                        <div id="houzez_messages" class="houzez_messages message"></div>
                        @if (app('request')->input('admintrator') == 'true')
                        {{ Form::open(['action' => 'Auth\LoginController@postLogin','method' => 'POST','class' => 'form-horizontal ' . $checkAdmin,  'id' => 'formLogin']) }}
                        <div class="form-group field-group">
                            <div class="input-user input-icon">
                                {!! Form::text('email', '', ['placeholder' => trans('form.placeholder.email'), 'class' => 'form-control',]) !!}
                            </div>
                            <div class="input-pass input-icon">
                                {!! Form::password('password', '', ['placeholder' => trans('form.placeholder.password'), 'class' => 'form-control',]) !!}
                            </div>
                        </div>
                        <div class="forget-block clearfix">
                            <div class="form-group pull-left">
                                <div class="checkbox">
                                    <label><input name="remember" id="remember" type="checkbox">{{ trans('form.remember') }}</label>
                                </div>
                            </div>
                            <div class="form-group pull-right">
                                <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#pop-reset-pass">{{ trans('form.forgot-password') }}</a>
                            </div>
                        </div>
                        <button type="submit" class="fave-login-button btn btn-primary btn-block">{{ trans('form.login') }}</button>
                        {!! Form::close() !!}
                        @else
                        {{ trans('index.please-login') }}
                        @endif
                        <hr>
                        <a href="{{ url('/auth/facebook') }}" title="{{ trans('index.login-with-facebook') }}" class="margin-2">
                            <button class="btn btn-social btn-bg-facebook btn-block">
                                <i class="fa fa-facebook"></i> {{ trans('index.login-with-facebook') }}
                            </button>
                        </a>
                        <a href="{{ url('/auth/google') }}" title="{{ trans('index.login-with-google') }}">
                            <button class="btn btn-social btn-bg-google-plus btn-block">
                                <i class="fa fa-google-plus"></i> {{ trans('index.login-with-google') }}
                            </button>
                        </a>
                    </div>
                    <div class="tab-pane fade"> User registration is disabled in this demo. </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="pop-reset-pass" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <ul class="login-tabs">
                    <li class="active">{{ trans('form.reset-pass') }}</li>
                </ul>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-close"></i>
                </button>
            </div>
            <div class="modal-body login-block">
                <p>{{ trans('form.send-mail') }}</p>
                <div id="result_msg_reset" class="message"></div>
                {{ Form::open(['action' => 'Auth\ForgotPasswordController@sendMail','method' => 'POST','class' => 'form-horizontal', 'id'=>'formFogotPassword']) }}
                    <div class="form-group">
                        <div class="input-user input-icon">
                            {!! Form::email('email', '', ['id' => 'user_login_forgot', 'placeholder' => trans('form.placeholder.email-forgot'), 'class' => 'form-control', 'required' =>'required']) !!}
                        </div>
                    </div>
                    <button type="button" id="submit_forgetpass" class="btn btn-primary btn-block">{{ trans('form.get-new-pass') }}</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
<!-- end modal -->
