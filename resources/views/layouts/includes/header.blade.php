<!--start section header-->
<header id="header-section" class="houzez-header-main header-section-4 nav-left houzez-user-logout" data-sticky="0">
    <div class="container">
        <div class="header-left">
            <div class="logo logo-desktop">
                <a href="{{ action('HomeController@home') }}">
                    <img src="{{ config('constants.LOGO') }}" alt="logo">
                </a>
            </div>
            <nav class="navi main-nav">
                <ul id="main-nav" class="">
                    <li class="menu-item">
                        <a href="{{ action('HomeController@home') }}">{{ trans('index.home') }}</a>
                    </li>
                    <li class="menu-item">
                        <a href="#">{{ trans('index.type') }}</a>
                        <ul class="sub-menu">
                            @forelse ($types as $element)
                            <li class="menu-item">
                                <a href="{{ action('CategoryController@show', $element->slug) }}">{{ $element->title }}</a>
                            </li>
                            @empty
                            @endforelse
                        </ul>
                    </li>
                    <li class="menu-item">
                        <a href="{{ action('NewsController@index') }}">{{ trans('index.news') }}</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="header-right">
            @if (auth()->check())
            <ul class="account-action">
                <li class="">
                    <span class="user-name inline-block">
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
                                @include('layouts.includes.dropdown-admin')
                            @endif
                            @include('layouts.includes.dropdown-member')
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
