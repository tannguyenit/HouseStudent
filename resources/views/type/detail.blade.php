@extends('layouts.layout')
@section('include')
    @parent
    @include('layouts.includes.advanced-search')
@endsection
@section('content')
<div class="container">
    <div class="page-title breadcrumb-top">
        <div class="row">
            <div class="col-sm-12">
                <ol class="breadcrumb">
                    <li>
                        <a itemprop="url" href="{{ action('HomeController@home') }}">
                            <span itemprop="{{ trans('index.home') }}">{{ trans('index.home') }}</span>
                        </a>
                    </li>
                    <li class="active">{{ $detailsTypes->title }}</li>
                </ol>
                <div class="page-title-left">
                    <h1 class="title-head">{{ $detailsTypes->title }}</h1>
                </div>
                <div class="page-title-right">
                    <div class="view">
                        <div class="table-cell hidden-xs">
                            <span class="view-btn btn-list active">
                                <i class="fa fa-th-list"></i>
                            </span>
                            <span class="view-btn btn-grid ">
                                <i class="fa fa-th-large"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 list-grid-area container-contentbar">
            <div id="content-area">
                <div class="list-tabs table-list full-width">
                    <div class="tabs table-cell">
                        <ul>
                            <li>
                                <a href="javascript:void(0)" class="active hidden-md hidden-sm hidden-xs">{{ trans('index.all') }}</a>
                            </li>
                        </ul>
                    </div>
                    <div class="sort-tab table-cell text-right"> {{ trans('index.sort-by') }}:
                        <select id="sort_properties" class="selectpicker bs-select-hidden" title="" data-live-search-style="begins" data-live-search="false">
                            <option value="">{{ trans('index.default') }}</option>
                            <option {{ Request::get('sortby') == 'a_price' ? 'selected' : '' }} value="a_price">{{ trans('index.a-price') }}</option>
                            <option {{ Request::get('sortby') == 'd_price' ? 'selected' : '' }} value="d_price">{{ trans('index.d-price') }}</option>
                            <option {{ Request::get('sortby') == 'a_date' ? 'selected' : '' }} value="a_date">{{ trans('index.a-date') }}</option>
                            <option {{ Request::get('sortby') == 'd_date' ? 'selected' : '' }} value="d_date">{{ trans('index.d-date') }}</option>
                        </select>
                    </div>
                </div>
                <div class="property-listing list-view">
                    <div class="row" id="category_pagination">
                        @forelse ($posts as $element)
                            <div class="item-wrap infobox_trigger item-modern-apartment-on-the-bay">
                                <div class="property-item table-list">
                                    <div class="table-cell">
                                        <div class="figure-block">
                                            <figure class="item-thumb">
                                                <span class="label-featured label label-success hide-on-list">{{ $detailsTypes->title }}</span>
                                                <div class="price hide-on-list">
                                                    <span class="item-price">$ {{ $element->price . config('setting.price.vi') }}</span>
                                                </div>
                                                <a class="hover-effect" href="{{ action('PostController@show', $element->slug) }}">
                                                    <img width="385" height="258" src="{{ $element->firstImages->image or config('path.no-image') }}" class="attachment-houzez-property-thumb-image size-houzez-property-thumb-image wp-post-image"/>
                                                </a>
                                                <ul class="actions">
                                                    <li>
                                                        <span class="add_fav" data-placement="top" data-toggle="tooltip" data-original-title="{{ trans('post.like') }}" data-postid="{{ $element->id }}">
                                                            <i class="fa fa-heart-o"></i>
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <span data-toggle="tooltip" data-placement="top" title="{{ count($element->images) }} {{ trans('post.photo') }}">
                                                            <i class="fa fa-camera"></i>
                                                        </span>
                                                    </li>
                                                </ul>
                                            </figure>
                                        </div>
                                    </div>
                                    <div class="item-body table-cell">
                                        <div class="body-left table-cell">
                                            <div class="info-row">
                                                <div class="label-wrap hide-on-grid">
                                                    <span class="label-status-8 label label-featured">{{ $detailsTypes->title }}</span>
                                                </div>
                                                <h2 class="property-title">
                                                    <a href="{{ action('PostController@show', $element->slug) }}">{{ $element->title }}</a>
                                                </h2>
                                                <address class="property-address">{{ $element->address }}</address>
                                            </div>
                                            <div class="info-row amenities hide-on-grid">
                                                <p>
                                                    <span>{{ trans('post.address') }} : {{ $element->address }}</span><br>
                                                    <span>{{ trans('post.area') }} : {{ $element->area }}</span><br>
                                                    @if (count($element->features))
                                                        @forelse ($element->features as $feature)
                                                        <span>{{ $feature->title }}</span> : <span>{{ $feature->value }}</span>
                                                        @empty
                                                        @endforelse
                                                    @endif
                                                </p>
                                            </div>
                                            <div class="info-row date hide-on-grid">
                                                <p class="prop-user-agent">
                                                    <i class="fa fa-user"></i>
                                                    <a href="">{{ $element->user->full_name }}</a>
                                                </p>
                                                <p><i class="fa fa-calendar"></i>{{ $element->created_at }}</p>
                                            </div>
                                        </div>
                                        <div class="body-right table-cell hidden-gird-cell">
                                            <div class="info-row price">
                                                <span class="item-price">$ {{ $element->price . config('setting.price.vi') }}</span>
                                            </div>
                                            <div class="info-row phone text-right">
                                                <a href="{{ action('PostController@show', $element->slug) }}" class="btn btn-primary col-xs-12">
                                                    {{ trans('post.detail') }} <i class="fa fa-angle-right fa-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="table-list full-width hide-on-list">
                                            <div class="cell">
                                                <div class="info-row amenities">
                                                    <p>
                                                        <span>{{ trans('post.address') }} : {{ $element->address }}</span><br>
                                                        <span>{{ trans('post.area') }} : {{ $element->area }}</span><br>
                                                        @if (count($element->features))
                                                            @forelse ($element->features as $feature)
                                                            <span>{{ $feature->title }}</span> : <span>{{ $feature->value }}</span>
                                                            @empty
                                                            @endforelse
                                                        @endif
                                                    </p>
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
                                <div class="item-foot date hide-on-list">
                                    <div class="item-foot-left col-xs-12 col-sm-6 no-padding">
                                        <p class="prop-user-agent">
                                            <i class="fa fa-user"></i>
                                            <a href="">{{ $element->user->full_name }}</a>
                                        </p>
                                    </div>
                                    <div class="item-foot-right col-xs-12 col-sm-6 no-padding">
                                        <p class="prop-date text-right">
                                            <i class="fa fa-calendar"></i>{{ $element->created_at }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @empty
                        @endforelse
                    </div>
                    {{ $posts->appends(['sortby' => Request::get('sortby')])->links() }}
                </div>
                <hr>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 col-md-offset-0 col-sm-offset-3 container-sidebar houzez_sticky">
            <aside id="sidebar" class="sidebar-white">
                <div class="widget widget-categories">
                    <div class="widget-top">
                        <h3 class="widget-title">{{ trans('index.type') }}</h3>
                    </div>
                    <div class="widget-body">
                        <ul class="children">
                            @forelse ($types as $element)
                                <li>
                                    <a href="{{ action('TypeController@show', $element->slug) }}">{{ $element->title }}</a>
                                    <span class="cat-count">({{ count($element->posts) }})</span>
                                </li>
                            @empty
                            @endforelse
                        </ul>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</div>
@endsection
