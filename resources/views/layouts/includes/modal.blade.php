<!-- start modal -->
<div class="modal fade" id="pop-login" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <ul class="login-tabs">
                    <li class="active">Login</li>
                    <li>Register</li>
                </ul>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-close"></i>
                </button>
            </div>
            <div class="modal-body login-block class-for-register-msg">
                <div class="tab-content">
                    <div class="tab-pane fade in active">
                        <div id="houzez_messages" class="houzez_messages message"></div>
                        <form>
                            <div class="form-group field-group">
                                <div class="input-user input-icon">
                                    <input id="login_username" name="username" placeholder="Username" type="text"/>
                                </div>
                                <div class="input-pass input-icon">
                                    <input id="password" name="password" placeholder="Password" type="password"/>
                                </div>
                            </div>
                            <div class="forget-block clearfix">
                                <div class="form-group pull-left">
                                    <div class="checkbox">
                                        <label><input name="remember" id="remember" type="checkbox"> Remember me </label>
                                    </div>
                                </div>
                                <div class="form-group pull-right">
                                    <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#pop-reset-pass">Lost your password?</a>
                                </div>
                            </div>
                            <input type="hidden" id="houzez_login_security" name="houzez_login_security" value="756c34805b"/>
                            <input type="hidden" name="_wp_http_referer" value="/"/>
                            <input type="hidden" name="action" id="login_action" value="houzez_login">
                            <button type="submit" class="fave-login-button btn btn-primary btn-block">Login</button>
                        </form>
                        <hr>
                        <button class="facebook-login btn btn-social btn-bg-facebook btn-block"><i class="fa fa-facebook"></i> login with facebook</button>
                        <button class="yahoo-login btn btn-social btn-bg-yahoo btn-block"><i class="fa fa-yahoo"></i> login with yahoo</button>
                        <button class="google-login btn btn-social btn-bg-google-plus btn-block"><i class="fa fa-google-plus"></i> login with google</button>
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
                    <li class="active">Reset Password</li>
                </ul>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-close"></i>
                </button>
            </div>
            <div class="modal-body login-block">
                <p>Please enter your username or email address. You will receive a link to create a new password via email.</p>
                <div id="houzez_msg_reset" class="message"></div>
                <form>
                    <div class="form-group">
                        <div class="input-user input-icon">
                            <input name="user_login_forgot" id="user_login_forgot" placeholder="Enter your username or email" class="form-control">
                        </div>
                    </div>
                    <input type="hidden" id="fave_resetpassword_security" name="fave_resetpassword_security" value="df6cd1c8dd"/>
                    <input type="hidden" name="_wp_http_referer" value="/"/>
                    <button type="button" id="houzez_forgetpass" class="btn btn-primary btn-block">Get new password</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->
