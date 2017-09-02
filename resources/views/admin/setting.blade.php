@extends('layouts.admin.layout')
@section('content')

    <div class="board-header board-header-4">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <div class="board-header-left">
                        <h3 class="board-title">My Profile</h3>
                    </div>
                    <div class="board-header-right">
                        <ol class="breadcrumb">
                            <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a itemprop="url" href="http://houzez01.favethemes.com/"><span itemprop="title">Home</span></a> </li>
                            <li class="active">My Profile</li>
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
                        <div id="profile_message" class="houzez_messages message"></div>
                        <form action="">
                            <div class="account-block account-profile-block">
                                <div class="row">
                                    <div class="col-md-3 col-sm-12 col-xs-12">
                                        <div class="my-avatar">
                                            <div id="houzez_profile_photo">
                                                <div class="houzez-thumb">
                                                    <img class="img-circle" id="profile-image" src="https://lh3.googleusercontent.com/-EAmSu9d7yPM/AAAAAAAAAAI/AAAAAAAADyE/4iUaHf0LtKs/photo.jpg" alt="user image">
                                                </div>
                                            </div>
                                            <div class="profile-img-controls">
                                                <div id="houzez_upload_errors"></div>
                                                <div id="plupload-container"></div>
                                            </div>
                                            <div id="profile_upload_containder">
                                                <a id="select_user_profile_photo" class="btn btn-primary btn-block" href="javascript:;">Update Profile Picture</a>
                                                <p class="profile-img-info">*minimum 270px x 270px</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-9 col-sm-12 col-xs-12">
                                        <h4>Information</h4>
                                        <div class="row">
                                            <div class="col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="username">Username</label>
                                                    <input disabled type="text" name="prof_username" id="prof_username" class="form-control" value="vantancnttk13">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="useremail">Email</label>
                                                    <input type="text" name="prof_useremail" id="prof_useremail" class="form-control" value="vantancnttk13@gmail.com">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="firstname">First Name</label>
                                                    <input type="text" name="firstname" id="firstname" class="form-control" value="Nguyễn">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="lastname">Last Name</label>
                                                    <input type="text" name="lastname" id="lastname" class="form-control" value="Văn">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="title">Title / Position</label>
                                                    <input type="text" id="title" name="title" value="" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="license">License</label>
                                                    <input type="text" id="license" name="license" value="" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="tax_number">Tax Number</label>
                                                    <input type="text" id="tax_number" name="tax_number" value="" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="userphone">Phone</label>
                                                    <input type="text" id="userphone" class="form-control" value="" name="userphone">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="fax_number">Fax Number</label>
                                                    <input type="text" id="fax_number" class="form-control" value="" name="fax_number">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="usermobile">Mobile</label>
                                                    <input type="text" id="usermobile" class="form-control" value="" name="usermobile">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="userlangs">Language</label>
                                                    <input type="text" id="userlangs" placeholder="English, Spanish, French" class="form-control" value="" name="userlangs">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="user_company">Company Name</label>
                                                    <input type="text" id="user_company" placeholder="" class="form-control" value="" name="user_company">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    <label for="about">Address</label>
                                                    <textarea id="user_address" class="form-control" rows="2"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    <label for="about">About me</label>
                                                    <textarea id="about" class="form-control" rows="7"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-xs-12 text-right">
                                                <input type="hidden" id="houzez-security-profile" name="houzez-security-profile" value="6af9ce83b6" />
                                                <input type="hidden" name="_wp_http_referer" value="/my-profile/" /> <a href="http://houzez01.favethemes.com/author/vantancnttk13/" target="_blank" class="btn btn-primary btn-trans">View Public Profile</a>
                                                <button class="btn btn-primary" id="houzez_update_profile">Update Profile</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="account-block account-block-social account-profile-block">
                                <div class="row">
                                    <div class="col-md-3 col-sm-12 col-xs-12">
                                        <h4>Social Media</h4>
                                    </div>
                                    <div class="col-md-9 col-sm-12 col-xs-12">
                                        <div class="row">
                                            <div class="col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="userskype">Skype</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-skype"></i>
                                                        </span>
                                                        <input type="text" id="userskype" class="form-control" value="" name="userskype">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="website">Website URL</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-globe"></i>
                                                        </span>
                                                        <input type="text" id="website" class="form-control" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="facebook">Facebook URL</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-facebook-square"></i>
                                                        </span>
                                                        <input type="text" id="facebook" name="facebook" value="" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="twitter">Twitter URL</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-twitter-square"></i>
                                                        </span>
                                                        <input type="text" id="twitter" class="form-control" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="linkedin">Linkedin URL</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-linkedin-square"></i>
                                                        </span>
                                                        <input type="text" id="linkedin" class="form-control" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="instagram">Instagram URL</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-instagram"></i>
                                                        </span>
                                                        <input type="text" id="instagram" class="form-control" value="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary pull-right" id="houzez_update_profile2">Update Profile</button>
                                    </div>
                                </div>
                            </div>
                            <div class="account-block account-profile-block">
                                <div class="row">
                                    <div class="col-md-3 col-sm-12 col-xs-12">
                                        <h4>Change password</h4>
                                    </div>
                                    <div class="col-md-9 col-sm-12 col-xs-12">
                                        <div class="row">
                                            <div class="col-sm-4 col-xs-12">
                                                <div class="form-group">
                                                    <label for="oldpass">Old Password</label>
                                                    <input id="oldpass" value="" class="form-control" name="oldpass" type="password">
                                                </div>
                                            </div>
                                            <div class="col-sm-4 col-xs-12">
                                                <div class="form-group">
                                                    <label for="newpass">New Password </label>
                                                    <input id="newpass" value="" class="form-control" name="newpass" type="password">
                                                </div>
                                            </div>
                                            <div class="col-sm-4 col-xs-12">
                                                <div class="form-group">
                                                    <label for="confirmpass">Confirm New Password</label>
                                                    <input id="confirmpass" value="" class="form-control" name="confirmpass" type="password">
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" id="houzez-security-pass" name="houzez-security-pass" value="b1eed7fb59" />
                                        <input type="hidden" name="_wp_http_referer" value="/my-profile/" />
                                        <button class="btn btn-primary pull-right" id="houzez_change_pass">Update Password</button>
                                        <div id="password_reset_msgs" class="houzez_messages message"></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
