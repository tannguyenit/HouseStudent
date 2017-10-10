@php
    $route_name = \Request::route()->getName();
@endphp
<div class="user-dashboard-left">
    <div class="dashboard-bar fave-screen-fix">
        <ul class="board-panel-menu">
            @if (auth()->user()->role == config('setting.role.admin'))
                @include('layouts.includes.dropdown-admin')
            @endif
            @include('layouts.includes.dropdown-member')
        </ul>
    </div>
</div>
