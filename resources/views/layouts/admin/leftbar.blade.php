@php
    $route_name = \Request::route()->getName();
@endphp
<div class="user-dashboard-left">
    <div class="dashboard-bar fave-screen-fix">
        <ul class="board-panel-menu">
            @include('layouts.includes.dropdown-admin')
            <li>
                <a href="{{ action('Auth\LoginController@logout') }}">
                    <i class="fa fa-unlock"></i> {{ trans('index.logout') }}
                </a>
            </li>
        </ul>
    </div>
</div>
