<!-- start header mobile -->
<div class="header-mobile houzez-header-mobile " data-sticky="0">
    <div class="container">
        <!--start mobile nav-->
        <div class="mobile-nav"> <span class="nav-trigger"><i class="fa fa-navicon"></i></span>
            <div class="nav-dropdown main-nav-dropdown"></div>
        </div>
        <!--end mobile nav-->
        <div class="header-logo logo-mobile">
            <a href="{{ action('HomeController@home') }}"> <img src="/wp-content/uploads/2016/03/logo.png" alt="Mobile logo"> </a>
        </div>
        <div class="header-user">
            <ul class="account-action">
                <li>
                    @if (auth()->check())
                    <span class="user-icon"><img src="{{ auth()->user()->avatar }}" width="36" height="36" class="img-circle" alt="{{ auth()->user()->fulllname }}"></span>
                    <div class="account-dropdown">
                        <ul>
                            @if (auth()->user()->role == config('setting.role.admin'))
                                @include('layouts.includes.dropdown-admin')
                            @endif
                            @include('layouts.includes.dropdown-member')
                        </ul>
                    </div>
                    @else
                    <span class="user-icon"><i class="fa fa-user"></i></span>
                    <div class="account-dropdown">
                        <ul>
                            <li>
                                <a href="add-new-property/index.html">
                                    <i class="fa fa-plus-circle"></i>{{ trans('post.create') }}
                                </a>
                            </li>
                            <li>
                                <a href="#" data-toggle="modal" data-target="#pop-login">
                                    <i class="fa fa-user"></i>{{ trans('index.signin') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                    @endif
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- end header mobile -->
