@extends('layouts.layout')
    @section('include')
        @parent
        @include('layouts.includes.advanced-search')
        @include('layouts.includes.map')
    @endsection
@section('content')
    <div class="row row-fluid">
        <div class="col-sm-12">
            <div class="vc_column-inner ">
                <div class="wpb_wrapper">
                    <div id="carousel-module-grid" class="houzez-module carousel-module">
                        <div class="module-title-nav clearfix">
                            <div>
                                <h2>{{ trans('post.news') }}</h2>
                            </div>
                            <div class="module-nav">
                                <button class="btn btn-carousel btn-sm btn-prev-uo8oC">{{ trans('post.prev') }}</button>
                                <button class="btn btn-carousel btn-sm btn-next-uo8oC">{{ trans('post.next') }}</button>
                            </div>
                        </div>
                        <div class="row grid-row">
                            <div id="properties-carousel-v2-uo8oC" data-token="uo8oC" class="carousel slide-animated slide-animated owl-carousel owl-theme">
                                @forelse ($newsPost as $element)
                                <div class="item">
                                    <div class="item-wrap">
                                        <div class="property-item item-grid">
                                            <div class="figure-block">
                                                <figure class="item-thumb">
                                                    <div class="label-wrap label-right hide-on-list">
                                                        <span class="label label-default label-color-288">{{ $element->type->title }}</span>
                                                    </div>
                                                    <div class="price hide-on-list">
                                                        <span class="item-price">{{ $element->price . config('setting.price.vi') }} </span>
                                                    </div>
                                                    <a class="hover-effect" href="{{ action('PostController@show', $element->slug) }}">
                                                        <img width="385" height="258" src="{{ $element->firstImages->image or config('path.no-image') }}" class="attachment-houzez-property-thumb-image size-houzez-property-thumb-image wp-post-image"/>
                                                    </a>
                                                    <ul class="actions">
                                                        <li>
                                                            <span class="add_fav" data-placement="top" data-toggle="tooltip" data-original-title="{{ $element->total_like . trans('post.like') }}" data-postid="{{ $element->id }}">
                                                                @forelse ($element->likes as $value)
                                                                    @php
                                                                        if (auth()->check() && $value->user_id == auth()->user()->id) {
                                                                            $like = '<i class="fa fa-heart" data-status="'.config('setting.no-active').'"></i>';
                                                                        } else {
                                                                            $like = '<i class="fa fa-heart-o" data-status="'.config('setting.active').'"></i>';
                                                                        }
                                                                    @endphp
                                                                @empty
                                                                    @php
                                                                        $like = '<i class="fa fa-heart-o" data-status="'.config('setting.active').'"></i>';
                                                                    @endphp
                                                                @endforelse
                                                                {!! $like !!}
                                                            </span>
                                                        </li>
                                                        <li>
                                                            <span data-toggle="tooltip" data-placement="top" title="{{ $element->total_comment . trans('post.comment') }}">
                                                                <i class="fa fa-comment"></i>
                                                            </span>
                                                        </li>
                                                        <li>
                                                            <span id="compare-link-361" class="compare-property" data-toggle="tooltip" data-placement="top" title="{{ count($element->images) . trans('post.photo') }}">
                                                                <i class="fa fa-camera"></i>
                                                            </span>
                                                        </li>
                                                    </ul>
                                                </figure>
                                            </div>
                                            <div class="item-body">
                                                <div class="body-left">
                                                    <div class="info-row">
                                                        <h3 class="property-title">
                                                            <a href="{{ action('PostController@show', $element->slug) }}">{{ $element->title }}</a>
                                                        </h3>
                                                        <address class="property-address">{{ $element->address }}</address>
                                                        <span id="getGoogleMaps" data-lat="" data-lng=""></span>
                                                    </div>
                                                    <div class="table-list full-width info-row">
                                                        <div class="cell">
                                                            <div class="info-row amenities">
                                                                <p>
                                                                    <span>{{ trans('post.area') . trans('post.colon') }}  {{ $element->area }}</span>
                                                                </p>
                                                                <p></p>
                                                            </div>
                                                        </div>
                                                        <div class="cell">
                                                            <div class="phone">
                                                                <a href="{{ action('PostController@show', $element->slug) }}" class="btn btn-primary col-xs-12">
                                                                    {{ trans('post.detail') }} <i class="fa fa-angle-right fa-right"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item-foot date hide-on-list">
                                            <div class="item-foot-left col-xs-12 col-sm-6 no-padding">
                                                <p class="prop-user-agent">
                                                    <i class="fa fa-user"></i>
                                                    <a href="{{ action('UserController@member', $element->user->username) }}">{{ $element->user->username }}</a>
                                                </p>
                                            </div>
                                            <div class="item-foot-right col-xs-12 col-sm-6 no-padding">
                                                <p class="prop-date text-right">
                                                    <i class="fa fa-calendar"></i>
                                                    {{ $element->created_at }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row row-fluid">
        <div class="col-sm-12">
            <div class="vc_column-inner ">
                <div class="wpb_wrapper">
                    <div id="carousel-module-grid" class="houzez-module carousel-module">
                        <div class="module-title-nav clearfix">
                            <div>
                                <h2>{{ trans('post.most-view') }}</h2>
                            </div>
                            <div class="module-nav">
                                <button class="btn btn-carousel btn-sm btn-prev-cSQhv">{{ trans('post.prev') }}</button>
                                <button class="btn btn-carousel btn-sm btn-next-cSQhv">{{ trans('post.next') }}</button>
                            </div>
                        </div>
                        <div class="row grid-row">
                            <div id="properties-carousel-v2-cSQhv" data-token="cSQhv" class="carousel slide-animated slide-animated owl-carousel owl-theme">
                                @forelse ($topView as $element)
                                <div class="item">
                                    <div class="item-wrap">
                                        <div class="property-item item-grid">
                                            <div class="figure-block">
                                                <figure class="item-thumb">
                                                    <div class="label-wrap label-right hide-on-list">
                                                        <span class="label label-default label-color-288">{{ $element->type->title }}</span>
                                                    </div>
                                                    <div class="price hide-on-list">
                                                        <span class="item-price">{{ $element->price . config('setting.price.vi') }} </span>
                                                    </div>
                                                    <a class="hover-effect" href="{{ action('PostController@show', $element->slug) }}">
                                                        <img width="385" height="258" src="{{ $element->firstImages->image or config('path.no-image') }}" class="attachment-houzez-property-thumb-image size-houzez-property-thumb-image wp-post-image" alt="" sizes="(max-width: 385px) 100vw, 385px"/>
                                                    </a>
                                                    <ul class="actions">
                                                        <li>
                                                            <span class="add_fav" data-placement="top" data-toggle="tooltip" data-original-title="{{ $element->total_like . trans('post.like') }}" data-postid="{{ $element->id }}">
                                                                @forelse ($element->likes as $value)
                                                                    @php
                                                                        if (auth()->check() && $value->user_id == auth()->user()->id) {
                                                                            $like = '<i class="fa fa-heart" data-status="'.config('setting.no-active').'"></i>';
                                                                        } else {
                                                                            $like = '<i class="fa fa-heart-o" data-status="'.config('setting.active').'"></i>';
                                                                        }
                                                                    @endphp
                                                                @empty
                                                                    @php
                                                                        $like = '<i class="fa fa-heart-o" data-status="'.config('setting.active').'"></i>';
                                                                    @endphp
                                                                @endforelse
                                                                {!! $like !!}
                                                            </span>
                                                        </li>
                                                        <li>
                                                            <span data-toggle="tooltip" data-placement="top" title="{{ $element->total_comment . trans('post.comment') }}">
                                                                <i class="fa fa-comment"></i>
                                                            </span>
                                                        </li>
                                                        <li>
                                                            <span data-toggle="tooltip" data-placement="top" title="{{ $element->total_view . trans('post.view') }}">
                                                                <i class="fa fa-eye"></i>
                                                            </span>
                                                        </li>
                                                    </ul>
                                                </figure>
                                            </div>
                                            <div class="item-body">
                                                <div class="body-left">
                                                    <div class="info-row">
                                                        <h3 class="property-title">
                                                            <a href="{{ action('PostController@show', $element->slug) }}">{{ $element->title }}</a>
                                                        </h3>
                                                        <address class="property-address">{{ $element->address }}</address>
                                                    </div>
                                                    <div class="table-list full-width info-row">
                                                        <div class="cell">
                                                            <div class="info-row amenities">
                                                                <p>
                                                                    <span>{{ trans('post.area') . trans('post.colon') }}  {{ $element->area }}</span>
                                                                </p>
                                                                <p></p>
                                                            </div>
                                                        </div>
                                                        <div class="cell">
                                                            <div class="phone">
                                                                <a href="{{ action('PostController@show', $element->slug) }}" class="btn btn-primary col-xs-12">
                                                                    {{ trans('post.detail') }} <i class="fa fa-angle-right fa-right"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item-foot date hide-on-list">
                                            <div class="item-foot-left">
                                                <p class="prop-user-agent">
                                                    <i class="fa fa-user"></i>
                                                    <a href="{{ action('UserController@member', $element->user->username) }}">{{ $element->user->username }}</a>
                                                </p>
                                            </div>
                                            <div class="item-foot-right">
                                                <p class="prop-date">
                                                    <i class="fa fa-calendar"></i>{{ $element->created_at }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div data-vc-full-width="true" data-vc-full-width-init="false" data-vc-parallax="1.5" data-vc-parallax-image="http://houzez01.favethemes.com/wp-content/uploads/2016/03/bg-6-1.jpg" class=" hidden-xs row row-fluid vc_custom_1494355113610 row-has-fill row-o-content-middle row-flex vc_general vc_parallax vc_parallax-content-moving">
        <div class="col-sm-12">
            <div class="vc_column-inner ">
                <div class="wpb_wrapper">
                    <div class="vc_empty_space">
                        <span class="vc_empty_space_inner"></span>
                    </div>
                    <div class="wpb_text_column wpb_content_element  wpb_animate_when_almost_visible wpb_bottom-to-top bottom-to-top">
                        <div class="wpb_wrapper">
                            <h1 class="text-center">
                                <span class="color-white">{{ trans('index.general-features') }}</span>
                            </h1>
                            <p class="text-center">
                                <span class="color-white">{{ trans('index.general-features-content') }}</span>
                            </p>
                        </div>
                    </div>
                    <div class="vc_empty_space">
                        <span class="vc_empty_space_inner"></span>
                    </div>
                    <div class="row vc_inner row-fluid">
                        <div class="col-sm-4">
                            <div class="vc_column-inner ">
                                <div class="wpb_wrapper">
                                    <div class="wpb_text_column wpb_content_element  wpb_animate_when_almost_visible wpb_bottom-to-top bottom-to-top">
                                        <div class="wpb_wrapper">
                                            <h3 class="text-center">
                                                <img class="aligncenter size-medium wp-image-1022" src="wp-content/uploads/2016/02/monitor.png" alt="monitor" width="60" height="60"/>
                                            </h3>
                                            <h3 class="text-center">
                                                <span class="color-white">{{ trans('index.column-one') }}</span>
                                            </h3>
                                            <h4 class="content-column">
                                                <span class="color-white">{{ trans('index.column-one-content') }}</span>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="vc_empty_space">
                                        <span class="vc_empty_space_inner"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="vc_column-inner ">
                                <div class="wpb_wrapper">
                                    <div class="wpb_text_column wpb_content_element wpb_animate_when_almost_visible wpb_bottom-to-top bottom-to-top">
                                        <div class="wpb_wrapper">
                                            <h3 class="text-center">
                                                <img class="aligncenter size-medium wp-image-918" src="wp-content/uploads/2016/03/layers-1.png" alt="layers" width="60" height="60"/>
                                            </h3>
                                            <h3 class="text-center">
                                                <span class="color-white">{{ trans('index.column-two') }}</span>
                                            </h3>
                                            <h4 class="content-column">
                                                <span class="color-white">{{ trans('index.column-two-content') }}</span>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="vc_empty_space">
                                        <span class="vc_empty_space_inner"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="vc_column-inner ">
                                <div class="wpb_wrapper">
                                    <div class="wpb_text_column wpb_content_element  wpb_animate_when_almost_visible wpb_bottom-to-top bottom-to-top">
                                        <div class="wpb_wrapper">
                                            <h3 class="text-center">
                                                <img class="aligncenter size-medium wp-image-1023" src="wp-content/uploads/2016/02/list.png" alt="list" width="60" height="60"/>
                                            </h3>
                                            <h3 class="text-center">
                                                <span class="color-white">{{ trans('index.column-three') }}</span>
                                            </h3>
                                            <h4 class="content-column">
                                                <span class="color-white">{{ trans('index.column-three-content') }}</span>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="vc_empty_space">
                                        <span class="vc_empty_space_inner"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="vc_row-full-width vc_clearfix"></div>
    <div data-vc-full-width="true" data-vc-full-width-init="false" class="row row-fluid vc_custom_1459833943673 row-has-fill">
        <div class="col-sm-12">
            <div class="vc_column-inner ">
                <div class="wpb_wrapper">
                    <div class="houzez-module module-title section-title-module text-center ">
                        <h2>{{ trans('post.find-city-title') }}</h2>
                        <h3 class="sub-heading">{{ trans('post.find-city-content') }}</h3>
                    </div>
                    <div id="location-module" class="houzez-module location-module  grid grid_v1">
                        <div class="row">
                            @forelse ($country as $key => $value)
                            @if ($key%2 == 0)
                                @php
                                    if (!isset($tmp)) {
                                        $tmp = 0;
                                    }
                                    if ($tmp %2 ==0) {
                                        $class = 'col-sm-4';
                                    } else {
                                        $class = 'col-sm-8';
                                    }
                                @endphp
                            @else
                                @php
                                    if ($tmp %2 == 0) {
                                        $class = 'col-sm-8';
                                    } else {
                                        $class = 'col-sm-4';
                                    }
                                    $tmp++;
                                @endphp
                            @endif
                            <div class="{{ $class }}">
                                <div class="location-block">
                                    <a href="{{ action('PostController@townShip', str_slug($value->township)) }}">
                                        <div class="location-fig-caption">
                                            <h3 class="heading">{{ $value->township }}</h3>
                                            <p class="sub-heading"> {{ $value->total }} {{ trans('post.properties') }} </p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            @empty
                            @endforelse
                        </div>
                    </div>
                    <div class="vc_empty_space">
                        <span class="vc_empty_space_inner"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="vc_row-full-width vc_clearfix"></div>
    <div data-vc-full-width="true" data-vc-full-width-init="false" class="row row-fluid">
        <div class="col-sm-12">
            <div class="vc_column-inner ">
                <div class="wpb_wrapper">
                    <div class="houzez-module module-title section-title-module text-center ">
                        <h2>{{ trans('index.our-team-title') }}</h2>
                        <h3 class="sub-heading">{{ trans('index.our-team-content') }}</h3> </div>
                        <div id="agents-module" class="houzez-module agents-module">
                            <div class="agents-blocks-main">
                                <div class="row no-margin">
                                    <div class="col-md-3 col-sm-6">
                                        <div class="agents-block">
                                            <figure class="auther-thumb">
                                                <a href="agent/samuel-palmer/index.html" class="view">
                                                    <img src="wp-content/uploads/2016/02/agent-3-150x150.jpg" class="img-circle" width="150" height="150" alt="Samuel Palmer">
                                                </a>
                                            </figure>
                                            <div class="web-logo text-center"> </div>
                                            <div class="block-body">
                                                <p class="auther-info">
                                                    <span class="blue">Samuel Palmer</span>
                                                    <span>
                                                        Founder &amp; CEO, Realty Properties Inc.
                                                    </span>
                                                </p>
                                                <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. luctus ligula ac faucibus faucibus. Cras in nisi in turpis eleifend vehicula at at massa. Vivamus aliquet porttitor odio.</p>
                                                <a href="agent/samuel-palmer/index.html" class="view">View Profile</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="agents-block">
                                            <figure class="auther-thumb">
                                                <a href="agent/vincent-fuller/index.html" class="view">
                                                    <img src="wp-content/uploads/2016/02/agent-4-150x150.jpg" class="img-circle" width="150" height="150" alt="Vincent Fuller">
                                                </a>
                                            </figure>
                                            <div class="web-logo text-center"> </div>
                                            <div class="block-body">
                                                <p class="auther-info">
                                                    <span class="blue">Vincent Fuller</span>
                                                    <span>Company Agent </span>
                                                </p>
                                                <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. luctus ligula ac faucibus faucibus. Cras in nisi in turpis eleifend vehicula at at massa. Vivamus aliquet porttitor odio.</p>
                                                <a href="agent/vincent-fuller/index.html" class="view">View Profile</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="agents-block">
                                            <figure class="auther-thumb">
                                                <a href="agent/brittany-watkins/index.html" class="view">
                                                    <img src="wp-content/uploads/2016/02/agent-2-150x150.jpg" class="img-circle" width="150" height="150" alt="Brittany Watkins">
                                                </a>
                                            </figure>
                                            <div class="web-logo text-center"> </div>
                                            <div class="block-body">
                                                <p class="auther-info">
                                                    <span class="blue">Brittany Watkins</span>
                                                    <span>Company Agent , Smart Houses Inc.</span>
                                                </p>
                                                <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. luctus ligula ac faucibus faucibus. Cras in nisi in turpis eleifend vehicula at at massa. Vivamus aliquet porttitor odio.</p>
                                                <a href="agent/brittany-watkins/index.html" class="view">View Profile</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="agents-block">
                                            <figure class="auther-thumb">
                                                <a href="agent/michelle-ramirez/index.html" class="view">
                                                    <img src="wp-content/uploads/2016/02/agent-1-150x150.jpg" class="img-circle" width="150" height="150" alt="Michelle Ramirez">
                                                </a>
                                            </figure>
                                            <div class="web-logo text-center"> </div>
                                            <div class="block-body">
                                                <p class="auther-info">
                                                    <span class="blue">Michelle Ramirez</span>
                                                    <span>Company Agent , Realtory Inc. </span>
                                                </p>
                                                <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. luctus ligula ac faucibus faucibus. Cras in nisi in turpis eleifend vehicula at at massa. Vivamus aliquet porttito.</p>
                                                <a href="agent/michelle-ramirez/index.html" class="view">View Profile</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="vc_empty_space">
                            <span class="vc_empty_space_inner"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="vc_row-full-width vc_clearfix"></div>
    </div>
@endsection
