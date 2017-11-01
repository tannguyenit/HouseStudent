<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Set up a new password for House Student</title>
    <style type="text/css" rel="stylesheet" media="all">
    .email-wrapper,body{background-color:#F2F4F6}.button,body{-webkit-text-size-adjust:none}:not(br):not(tr):not(html){font-family:Arial,'Helvetica Neue',Helvetica,sans-serif;box-sizing:border-box}body{width:100%!important;height:100%;margin:0;line-height:1.4;color:#74787E}.email-content,.email-wrapper{width:100%;-premailer-width:100%;margin:0;padding:0}blockquote,ol,p,ul{line-height:1.4;text-align:left}.body-action,.discount_body,.discount_heading,.email-footer,.email-masthead,.related_heading{text-align:center}a{color:#3869D4}a img{border:none}.body-sub,.email-body,.related_heading{border-top:1px solid #EDEFF2}.email-wrapper{-premailer-cellpadding:0;-premailer-cellspacing:0}.email-body,.email-body_inner{-premailer-cellpadding:0;-premailer-cellspacing:0;background-color:#FFF}.email-content{-premailer-cellpadding:0;-premailer-cellspacing:0}.email-masthead{padding:25px 0}.email-masthead_logo{width:94px}.email-masthead_name{font-size:16px;font-weight:700;color:#bbbfc3;text-decoration:none;text-shadow:0 1px 0 #fff}.email-body{width:100%;margin:0;padding:0;-premailer-width:100%;border-bottom:1px solid #EDEFF2}.email-body_inner,.email-footer{width:570px;margin:0 auto;-premailer-width:570px;padding:0}.email-footer{-premailer-cellpadding:0;-premailer-cellspacing:0}.body-action,.discount,.related{width:100%;-premailer-width:100%;-premailer-cellpadding:0;-premailer-cellspacing:0}.email-footer p{color:#AEAEAE}.purchase_item,.related_item{color:#74787E;font-size:15px;line-height:18px}.body-action{margin:30px auto;padding:0}.body-sub{margin-top:25px;padding-top:25px}.content-cell{padding:35px}.preheader{display:none!important}.attributes{margin:0 0 21px}.attributes_content{background-color:#EDEFF2;padding:16px}.attributes_item{padding:0}.related{margin:0;padding:25px 0 0}.related_item{padding:10px 0}.related_item-title{display:block;margin:.5em 0 0}.related_item-thumb{display:block;padding-bottom:10px}.related_heading{padding:25px 0 10px}.discount{margin:0;padding:24px;background-color:#EDEFF2;border:2px dashed #9BA2AB}.social,.social td{width:auto}.discount_body{font-size:15px}.align-right,.purchase_total{text-align:right}.social td{padding:0}.purchase,.purchase_content{width:100%;-premailer-width:100%;-premailer-cellpadding:0;-premailer-cellspacing:0}.social_icon{height:20px;margin:0 8px 10px;padding:0}.purchase{margin:0;padding:35px 0}.purchase_content{margin:0;padding:25px 0 0}.purchase_item{padding:10px 0}.purchase_heading{padding-bottom:8px;border-bottom:1px solid #EDEFF2}.purchase_heading p{margin:0;color:#9BA2AB;font-size:12px}.purchase_footer{padding-top:15px;border-top:1px solid #EDEFF2}.purchase_total{margin:0;font-weight:700;color:#2F3133}.purchase_total--label{padding:0 15px 0 0}.align-left{text-align:left}.align-center{text-align:center}@media only screen and (max-width:600px){.email-body_inner,.email-footer{width:100%!important}}@media only screen and (max-width:500px){.button{width:100%!important}}.button{background-color:#3869D4;border-top:10px solid #3869D4;border-right:18px solid #3869D4;border-bottom:10px solid #3869D4;border-left:18px solid #3869D4;display:inline-block;color:#FFF;text-decoration:none;border-radius:3px;box-shadow:0 2px 3px rgba(0,0,0,.16)}h1,h2,h3{color:#2F3133;font-weight:700;margin-top:0;text-align:left}.button--green{background-color:#22BC66;border-top:10px solid #22BC66;border-right:18px solid #22BC66;border-bottom:10px solid #22BC66;border-left:18px solid #22BC66}.button--red{background-color:#FF6136;border-top:10px solid #FF6136;border-right:18px solid #FF6136;border-bottom:10px solid #FF6136;border-left:18px solid #FF6136}h1{font-size:19px}h2{font-size:16px}h3{font-size:14px}p{margin-top:0;color:#74787E;font-size:16px;line-height:1.5em;text-align:left}p.sub{font-size:12px}p.center{text-align:center}
    .email-wrapper{border:1px solid #ccc}
</style>
</head>
<body>
    <table class="email-wrapper" width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center">
                <table class="email-content" width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                        <td class="email-masthead">
                            <a href="{{ action('HomeController@home') }}" class="email-masthead_name">
                                House Student
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td class="email-body" width="100%" cellpadding="0" cellspacing="0">
                            <table class="email-body_inner" align="center" width="570" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td class="content-cell">
                                        <h1>Hi {{ $full_name }} </h1>
                                        <p>You recently requested to reset your password for your {{ $full_name }} account. Use the button below to reset it. <strong>This password reset is only valid for the next 24 hours.</strong></p>
                                        <table class="body-action" align="center" width="100%" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td align="center">
                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td align="center">
                                                                <table border="0" cellspacing="0" cellpadding="0">
                                                                    <tr>
                                                                        <td>
                                                                            <a href="{{ action('Auth\ResetPasswordController@getPassword', $id) }}?email={{ $email }}&active={{ $active }}" class="button button--green" target="_blank">Reset your password</a>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                        @php($browser = getBrowser())
                                        <p>For security, this request was received from a <strong>{{ $browser->platform }}</strong> device using <strong>{{ $browser->name }}</strong>. If you did not request a password reset, please ignore this email or <a href="{{ action('PageController@contact') }}">contact support</a> if you have questions.</p>
                                        <p>
                                            Thanks,<br>The House Student Team
                                        </p>
                                        <table class="body-sub">
                                            <tr>
                                                <td>
                                                    <p class="sub">If you’re having trouble with the button above, copy and paste the URL below into your web browser.</p>
                                                    <p class="sub">{{ action('Auth\ResetPasswordController@getPassword', $id) }}?email={{ $email }}&active={{ $active }}</p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table class="email-footer" align="center" width="570" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td class="content-cell" align="center">
                                        <p class="sub align-center">&copy; 2017 House Student. All rights reserved.</p>
                                        <p class="sub align-center">
                                            <br>Da Nang, Viet Nam
                                            <br>Phone : 01263751380
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
