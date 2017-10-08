@php
    $route_name = \Request::route()->getName();
@endphp
<li class="{!!  $route_name == 'profile' ? 'active' : '' !!}">
    <a href="{{ action('UserController@index', auth()->user()->username) }}">
        <i class="fa fa-user"></i>{{ trans('user.my-profile') }}
    </a>
</li>
<li class="{!!  $route_name == 'myProperties' || $route_name == 'property.edit' ? 'active' : '' !!}">
    <a href="{{ action('PostController@myProperties') }}">
        <i class="fa fa-building"></i>{{ trans('user.my-properties') }}
    </a>
</li>
<li class="{!!  $route_name == 'property.create' ? 'active' : '' !!}">
    <a href="{{ action('PostController@create') }}">
        <i class="fa fa-plus-circle"></i>{{ trans('post.create') }}
    </a>
</li>
<li>
    <a href="{{ action('Auth\LoginController@logout') }}">
        <i class="fa fa-unlock"></i>{{ trans('user.logout') }}
    </a>
</li>
