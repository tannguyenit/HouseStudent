@extends('layouts.layout')
@section('include')
    @parent
    @include('layouts.includes.advanced-search')
@endsection
@section('content')
<div class="page-title breadcrumb-top">
    <div class="row">
        <div class="col-sm-12">
            <ol class="breadcrumb">
                <li>
                    <a itemprop="url" href="{{ action('HomeController@home') }}">
                        <span itemprop="{{ trans('index.home') }}">{{ trans('index.home') }}</span>
                    </a>
                </li>
                <li class="active">{{ $detailUser->full_name }}</li>
            </ol>
            <div class="page-title-left">
                <h1 class="title-head">{{ $detailUser->full_name }}</h1>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="profile-detail-block company-detail">
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="profile-image">
                        <img width="200" height="250" src="{{ $detailUser->avatar }}" class="attachment-houzez-image350_350 size-houzez-image350_350 wp-post-image" alt="{{ $detailUser->full_name }}" title="{{ $detailUser->full_name }}" sizes="(max-width: 350px) 100vw, 350px">
                    </div>
                </div>
                <div class="col-md-5 col-sm-5 col-xs-12">
                    <div class="profile-description">
                        <h3>{{ $detailUser->full_name }}</h3>
                        <h4 class="position">{{ $detailUser->address }}</h4>
                        <ul class="profile-contact">
                            <li>
                                <span>{{ trans('form.phone') }}:</span>
                                @if ($detailUser->role == config('setting.role.admin'))
                                <a href="javascript:void(0)">{{ $detailUser->phone }}</a>
                                @else
                                <a href="tel:{{ $detailUser->phone }}">{{ $detailUser->phone }}</a>
                                @endif
                            </li>
                            <li class="email">
                                <span>{{ trans('form.email') }}:</span>
                                @if ($detailUser->role == config('setting.role.admin'))
                                <a href="javascript:void(0)">{{ $detailUser->email }}</a>
                                @else
                                <a href="mailto:{{ $detailUser->email }}">{{ $detailUser->email }}</a>
                                @endif
                            </li>
                        </ul>
                        <ul class="profile-rating">
                            <li> <span>{{ trans('form.list') }}:</span> {{ count($listings) }} </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div id="content-area">
            <div class="profile-tab-area">
                <ul class="profile-tabs">
                    <li class="active">{{ trans('form.overview') }}</li>
                    <li>{{ trans('form.list') }}</li>
                </ul>
                <div class="tab-content">
                    <div class="profile-tab-pane tab-pane fade active in">
                        <div class="profile-tab-content profile-overview">
                            {!! $detailUser->bio !!}
                        </div>
                    </div>
                    <div class="profile-tab-pane tab-pane fade">
                        <div class="profile-tab-content profile-properties">
                            <div class="property-filter-wrap">
                                <h4 class="filter-title"> {{ trans('form.list') }} </h4>
                            </div>
                            <div id="houzez_ajax_container">
                                <div class="grid-view grid-view-3-col">
                                    <div class="row">
                                        @forelse ($listings as $element)
                                        <div class="item-wrap infobox_trigger item-ample-apartment">
                                            <div class="property-item table-list">
                                                <div class="table-cell">
                                                    <div class="figure-block">
                                                        <figure class="item-thumb">
                                                            <div class="label-wrap label-right hide-on-list">
                                                                <span class="label-status label-status-8 label label-default">{{ $element->category->title }}</span>
                                                            </div>
                                                            <div class="price hide-on-list">
                                                                <span class="item-price">$ {{ $element->price }}</span>
                                                            </div>
                                                            <a class="hover-effect" href="{{ action('PostController@show', $element->slug) }}">
                                                                <img width="385" height="258" src="{{ $element->firstImages->image or config('path.no-image') }}" class="attachment-houzez-property-thumb-image size-houzez-property-thumb-image wp-post-image" alt="" sizes="(max-width: 385px) 100vw, 385px">
                                                            </a>
                                                            <ul class="actions">
                                                                <li>
                                                                    <span class="add_fav" data-placement="top" data-toggle="tooltip" data-original-title="Favorite" data-propid="448">
                                                                        <i class="fa fa-heart-o"></i>
                                                                    </span>
                                                                </li>
                                                                <li>
                                                                    <span data-toggle="tooltip" data-placement="top" title="" data-original-title="(7) Photos">
                                                                        <i class="fa fa-camera"></i>
                                                                    </span>
                                                                </li>
                                                                <li>
                                                                    <span id="compare-link-448" class="compare-property" data-propid="448" data-toggle="tooltip" data-placement="top" title="" data-original-title="Compare">
                                                                        <i class="fa fa-plus"></i>
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
                                                                <span class="label-status label-status-8 label label-default">{{ $element->category->title }}</span>
                                                            </div>
                                                            <h2 class="property-title">
                                                                <a href="{{ action('PostController@show', $element->slug) }}">{{ $element->title }}</a>
                                                            </h2>
                                                            <address class="property-address">{{ $element->address }}</address>
                                                        </div>
                                                        <div class="info-row amenities hide-on-grid">
                                                            <p>
                                                                <span>{{ trans('post.area') . trans('post.colon') }}  {{ $element->area }}</span>
                                                            </p>
                                                        </div>
                                                        <div class="info-row date hide-on-grid">
                                                            <p class="prop-user-agent">
                                                                <i class="fa fa-user"></i>
                                                                <a href="{{ action('UserController@member', $detailUser->username) }}">{{ $detailUser->full_name }}</a>
                                                            </p>
                                                            <p><i class="fa fa-calendar"></i>{{ $detailUser->created_at }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="body-right table-cell hidden-gird-cell">
                                                        <div class="info-row price">
                                                            <span class="item-price">$ {{ $element->price }}</span>
                                                        </div>
                                                        <div class="info-row phone text-right">
                                                            <a href="{{ action('PostController@show', $element->slug) }}" class="btn btn-primary">
                                                                Details <i class="fa fa-angle-right fa-right"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="table-list full-width hide-on-list">
                                                        <div class="cell">
                                                            <div class="info-row amenities">
                                                                <p><span>{{ trans('post.area') . trans('post.colon') }}  {{ $element->area }}</span></p>
                                                            </div>
                                                        </div>
                                                        <div class="cell">
                                                            <div class="phone">
                                                                <a href="{{ action('PostController@show', $element->slug) }}" class="btn btn-primary">
                                                                    Details <i class="fa fa-angle-right fa-right"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item-foot date hide-on-list">
                                                <div class="item-foot-left">
                                                    <p class="prop-user-agent">
                                                        <i class="fa fa-user"></i>
                                                        <a href="{{ action('UserController@member', $detailUser->username) }}">{{ $detailUser->full_name }}</a>
                                                    </p>
                                                </div>
                                                <div class="item-foot-right">
                                                    <p class="prop-date"><i class="fa fa-calendar"></i>{{ $detailUser->created_at }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        @empty
                                        @endforelse
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                   {{--  <div class="profile-tab-pane tab-pane fade ">
                        <div class="profile-tab-content profile-map">
                            <div id="houzez-simple-map" data-latitude="25.789416" data-longitude="-80.138416" data-zoom="15">
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
