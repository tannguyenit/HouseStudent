@php
    $route_name = \Request::route()->getName();
    $active = 'admin.dashboard' == $route_name
        || 'admin.getEnv' == $route_name
        || 'admin.setting' == $route_name
        || 'admin.type' == $route_name
        || 'admin.indexPost' == $route_name
        || 'admin.showPost' == $route_name
        || 'admin.user.index' == $route_name
        || 'admin.user.show' == $route_name
        || 'admin.profile' == $route_name
        || 'admin.status' == $route_name ? true : false;
@endphp
<li class="{!!  $active ? 'active' : '' !!}">
    <a href="{{ action('Admin\DashboardController@dashboard') }}">
        <i class="fa fa-cubes"></i>{{ trans('admin.admin') }}
    </a>
    <ul class="sub-menu">
        <li class="{!!  $route_name == 'admin.dashboard' ? 'active' : '' !!}">
            <a href="{{ action('Admin\DashboardController@dashboard') }}">
                <i class="fa fa-tachometer"></i>{{ trans('admin.dashboard') }}
            </a>
        </li>
        <li class="{!!  $route_name == 'admin.setting' ? 'active' : '' !!}">
            <a href="{{ action('Admin\SettingController@index') }}">
                <i class="fa fa-cog"></i>{{ trans('admin.setting') }}
            </a>
        </li>
        <li class="{!!  $route_name == 'admin.indexPost' || $route_name == 'admin.showPost' ? 'active' : '' !!}">
            <a href="{{ action('Admin\PostController@index') }}">
                <i class="fa fa-file-text"></i>{{ trans('admin.post') }}
            </a>
        </li>
        <li class="{!!  $route_name == 'admin.user.index' || $route_name == 'admin.user.show' ? 'active' : '' !!}">
            <a href="{{ action('Admin\UserController@index') }}">
                <i class="fa fa-file-text"></i>{{ trans('admin.user') }}
            </a>
        </li>
        <li class="{!!  $route_name == 'admin.type' ? 'active' : '' !!}">
            <a href="{{ action('Admin\CategoryController@index') }}">
                <i class="fa fa-list"></i> {{ trans('admin.type') }}
            </a>
        </li>
        <li class="{!!  $route_name ==  'admin.status' ? 'active' : '' !!}">
            <a href="{{ action('Admin\StatusController@index') }}">
                <i class="fa fa-flag"></i>
                {{ trans('admin.status') }}
            </a>
        </li>
        <li class="{!!  $route_name == 'admin.getEnv' ? 'active' : '' !!}">
            <a href="{{ action('Admin\DashboardController@getEnv') }}">
                <i class="fa fa-cogs"></i>
                {{ trans('admin.env') }}
            </a>
        </li>
    </ul>
</li>
