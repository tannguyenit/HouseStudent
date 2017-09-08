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
                            <li>
                                <a href="{{ action('Admin\DashboardController@dashboard') }}">
                                    <i class="fa fa-cogs"></i>Admin
                                </a>
                            </li>
                            @endif
                            <li>
                                <a href="http://houzez01.favethemes.com/my-profile/">
                                    <i class="fa fa-user"></i>My profile
                                </a>
                            </li>
                            <li>
                                <a href="http://houzez01.favethemes.com/my-properties/">
                                    <i class="fa fa-building"></i>My Properties
                                </a>
                                <ul class="sub-menu">
                                    <li class="active">
                                        <a href="http://houzez01.favethemes.com/my-properties/?prop_status=all">All</a>
                                    </li>
                                    <li>
                                        <a href="http://houzez01.favethemes.com/my-properties/?prop_status=approved">Published</a>
                                    </li>
                                    <li>
                                        <a href="http://houzez01.favethemes.com/my-properties/?prop_status=pending">Pending</a>
                                    </li>
                                    <li>
                                        <a href="http://houzez01.favethemes.com/my-properties/?prop_status=expired">Expired</a>
                                    </li>
                                    <li>
                                        <a href="http://houzez01.favethemes.com/my-properties/?prop_status=draft">Draft</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="http://houzez01.favethemes.com/add-new-property/">
                                    <i class="fa fa-plus-circle"></i>Add new property
                                </a>
                            </li>
                            <li>
                                <a href="http://houzez01.favethemes.com/favorite-properties/">
                                    <i class="fa fa-heart"></i>Favourite properties
                                </a>
                            </li>
                            <li>
                                <a href="http://houzez01.favethemes.com/saved-search/">
                                    <i class="fa fa-search-plus"></i>Saved Searches
                                </a>
                            </li>
                            <li>
                                <a href="http://houzez01.favethemes.com/invoices/">
                                    <i class="fa fa-file"></i>Invoices
                                </a>
                            </li>
                            <li>
                                <a href="http://houzez01.favethemes.com/messages/">
                                    <i class="fa fa-comments-o"></i>Messages
                                    <span class="msg-alert hidden"></span>
                                </a>
                            </li>
                            <li>
                                <a href="http://houzez01.favethemes.com/membership-info/">
                                    <i class="fa fa-address-card-o"></i>Membership
                                </a>
                            </li>
                            <li>
                                <a href="{{ action('Auth\LoginController@logout') }}">
                                    <i class="fa fa-unlock"></i>Log out
                                </a>
                            </li>
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
