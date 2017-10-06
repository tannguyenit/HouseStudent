@php
$route_name = \Request::route()->getName();
@endphp
<li class="{!!  $route_name == 'profile' ? 'active' : '' !!}">
    <a href="{{ action('UserController@index', auth()->user()->username) }}">
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
