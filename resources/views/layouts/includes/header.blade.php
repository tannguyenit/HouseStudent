<!--start section header-->
<header id="header-section" class="houzez-header-main header-section-4 nav-left houzez-user-logout" data-sticky="0">
    <div class="container">
        <div class="header-left">
            <div class="logo logo-desktop">
                <a href="{{ action('HomeController@home') }}">
                    <img src="/wp-content/uploads/2016/03/logo.png" alt="logo">
                </a>
            </div>
            <nav class="navi main-nav">
                <ul id="main-nav" class="">
                    <li id="menu-item-955" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-ancestor menu-item-has-children menu-item-955">
                        <a href="{{ action('HomeController@home') }}">{{ trans('index.home') }}</a>
                    </li>
                    @forelse ($types as $element)
                        <li  class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-352">
                            <a href="{{ action('TypeController@show', $element->slug) }}">{{ $element->title }}</a>
                        </li>
                    @empty
                    @endforelse
                </ul>
            </nav>
        </div>
        <div class="header-right">
            @if (auth()->check())
            <ul class="account-action">
                <li class="">
                    <span class="user-name">
                        <span>{{ auth()->user()->fullname }}</span>
                        <i class="fa fa-angle-down"></i>
                    </span>
                    <span class="user-image">
                        <span class="user-alert hidden"></span>
                        <img src="{{ auth()->user()->avatar }}" width="36" height="36" class="img-circle" alt="profile image">
                    </span>
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
                                <a href="http://houzez01.favethemes.com/my-profile/"><i class="fa fa-user"></i>My profile</a>
                            </li>
                            <li>
                                <a href="http://houzez01.favethemes.com/my-properties/"><i class="fa fa-building"></i>My Properties</a>
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
                                <a href="{{ action('PostController@create') }}">
                                    <i class="fa fa-plus-circle"></i>{{ trans('post.create') }}
                                </a>
                            </li>
                            <li>
                                <a href="http://houzez01.favethemes.com/favorite-properties/"><i class="fa fa-heart"></i>Favourite properties</a>
                            </li>
                            <li>
                                <a href="http://houzez01.favethemes.com/saved-search/"><i class="fa fa-search-plus"></i>Saved Searches</a>
                            </li>
                            <li>
                                <a href="http://houzez01.favethemes.com/invoices/"><i class="fa fa-file"></i>Invoices</a>
                            </li>
                            <li>
                                <a href="http://houzez01.favethemes.com/messages/">
                                    <i class="fa fa-comments-o"></i>Messages<span class="msg-alert hidden"></span>
                                </a>
                            </li>
                            <li>
                                <a href="http://houzez01.favethemes.com/membership-info/"> <i class="fa fa-address-card-o"></i>Membership</a>
                            </li>
                            <li>
                                <a href="{{ action('Auth\LoginController@logout') }}"> <i class="fa fa-unlock"></i>Log out</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
            @else
            <div class="user">
                <a href="#" data-toggle="modal" data-target="#pop-login">
                    <i class="fa fa-user hidden-md hidden-lg"></i>
                    <span class="hidden-sm hidden-xs">{{ trans('index.signin') }}</span>
                </a>
                <a href="{{ action('PostController@create') }}" class="btn btn-default hidden-xs hidden-sm">{{ trans('post.create') }}</a>
            </div>
            @endif
        </div>
    </div>
</header>
<!--end section header-->
