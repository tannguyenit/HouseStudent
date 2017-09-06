@php
    $route_name = \Request::route()->getName();
@endphp
<div class="user-dashboard-left">
    <div class="dashboard-bar fave-screen-fix">
        <ul class="board-panel-menu">
            @php
                $active = 'admin.dashboard' == $route_name ? true : false;
            @endphp
            <li class="{!!  $active ? 'active' : '' !!}">
                <a href="{{ action('Admin\DashboardController@dashboard') }}">
                    <i class="fa fa-tachometer"></i> {{ trans('admin.dashboard') }}
                </a>
            </li>
            @php
                $active = 'admin.setting' == $route_name? true : false;
            @endphp
            <li class="{!!  $active ? 'active' : '' !!}">
                <a href="{{ action('Admin\SettingController@index') }}">
                    <i class="fa fa-cogs"></i>{{ trans('admin.setting') }}
                </a>
            </li>
            @php
                $active = 'admin.type' == $route_name? true : false;
            @endphp
            <li class="{!!  $active ? 'active' : '' !!}">
                <a href="{{ action('Admin\TypeController@index') }}">
                    <i class="fa fa-list"></i> {{ trans('admin.type') }}
                </a>
            </li>
            @php
                $active = 'admin.status' == $route_name? true : false;
            @endphp
            <li class="{!!  $active ? 'active' : '' !!}">
                <a href="{{ action('Admin\StatusController@index') }}">
                    <i class="fa fa-bell"></i>
                    {{ trans('admin.status') }}
                </a>
            </li>
            <li>
                <a href="{{ action('Auth\LoginController@logout') }}">
                    <i class="fa fa-unlock"></i> {{ trans('index.logout') }}
                </a>
            </li>
        </ul>
    </div>
</div>
