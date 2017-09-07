<button class="scrolltop-btn back-top">
    <i class="fa fa-angle-up"></i>
</button>
<!--start footer section-->
<footer id="footer-section">
    <div class="footer footer-v2">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div id="houzez_about_widget-3" class="footer-widget widget-about">
                        <div class="widget-top">
                            <h3 class="widget-title">{{ trans('index.about-site') }}</h3>
                        </div>
                        <div class="widget-body">
                            <p>{{ trans('index.about-site-content') }}</p>
                            <p class="read">
                                <a href="about-houzez/index.html">
                                    {{ trans('index.read-more') }} <i class="fa fa-caret-right"></i>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div id="houzez_contact-7" class="footer-widget widget-contact">
                        <div class="widget-top">
                            <h3 class="widget-title">{{ trans('index.contact') }}</h3>
                        </div>
                        <div class="widget-body">
                            <div class="contact_text"></div>
                            <ul class="list-unstyled">
                                <li>
                                    <i class="fa fa-location-arrow"></i> {{ $setting->address or '' }}
                                </li>
                                <li>
                                    <i class="fa fa-phone"></i>{{ $setting->phone or '' }}
                                </li>
                                <li>
                                    <i class="fa fa-envelope-o"></i>
                                    <a href="mailto:{{ $setting->email or '' }}">{{ $setting->email or '' }}</a>
                                </li>
                            </ul>
                            <p class="read">
                                <a href="contact/index.html">
                                    {{ trans('index.contact') }} <i class="fa fa-caret-right"></i>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div id="mc4wp_form_widget-2" class="footer-widget widget_mc4wp_form_widget">
                        <div class="widget-top">
                            <h3 class="widget-title">{{ trans('index.subscribe') }}</h3>
                        </div>
                        <form id="mc4wp-form-1" class="mc4wp-form mc4wp-form-1251" method="post" data-id="1251" data-name="Footer Form">
                            <div class="mc4wp-form-fields">
                                <div class="table-list">
                                    <div class="form-group table-cell">
                                        <div class="input-email input-icon">
                                            <input class="form-control" type="email" name="EMAIL" placeholder="Enter your email">
                                        </div>
                                    </div>
                                    <div class="table-cell">
                                        <button type="submit" class="btn btn-primary">{{ trans('post.send') }}</button>
                                    </div>
                                </div>
                                <ul class="social">
                                    @if (isset($setting->facebook))
                                        <li>
                                            <a href="{{ $setting->facebook }}" target="_blank" class="btn-facebook"><i class="fa fa-facebook-square"></i></a>
                                        </li>
                                    @endif
                                    @if (isset($setting->twitter))
                                        <li>
                                            <a href="{{ $setting->twitter }}" target="_blank" class="btn-twitter"><i class="fa fa-twitter-square"></i></a>
                                        </li>
                                    @endif
                                    @if (isset($setting->google))
                                        <li>
                                            <a href="{{ $setting->google }}" target="_blank" class="btn-google-plus"><i class="fa fa-google-plus-square"></i></a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <div class="footer-col">
                        @if (isset($setting->copyright))
                            <p>{{ $setting->copyright }}</p>
                        @endif
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 pull-right">
                    <div class="footer-col foot-social">
                        <p> {{ trans('index.follow') }}
                            @if (isset($setting->facebook))
                                <a target="_blank" href="{{ $setting->facebook }}">
                                    <i class="fa fa-facebook-square"></i>
                                </a>
                            @endif
                            @if (isset($setting->twitter))
                                <a target="_blank" href="{{ $setting->twitter }}">
                                    <i class="fa fa-twitter-square"></i>
                                </a>
                            @endif
                            @if (isset($setting->google))
                                <a target="_blank" href="{{ $setting->google }}">
                                    <i class="fa fa-google-plus-square"></i>
                                </a>
                            @endif
                            <a href="" title=""></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End footer bottom -->
</footer>
<!--end footer section-->
