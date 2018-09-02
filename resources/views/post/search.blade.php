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
                    <li >
                        <a itemprop="url" href="{{ action('HomeController@home') }}">
                            <span itemprop="{{ trans('index.home') }}">{{ trans('index.home') }}</span>
                        </a>
                    </li>
                    <li class="active">{{ trans('form.advanced-search') }}</li>
                </ol>
                <div class="page-title-left">
                    <h1 class="title-head">
                     {{ trans('form.result-search', ['attribute' => $searchs->total()]) }}
                 </h1>
             </div>
             <div class="page-title-right">
                <div class="view hidden-xs">
                    <div class="table-cell">
                        <span class="view-btn btn-list active">
                            <i class="fa fa-th-list"></i>
                        </span>
                        <span class="view-btn btn-grid">
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
                <!--start list tabs-->
                <div class="table-list full-width">
                    <div class="sort-tab table-cell text-right v-align-top">
                        <p> {{ trans('index.sort-by') }}:
                            <select id="sort_properties" class="selectpicker bs-select-hidden" title="" data-live-search-style="begins" data-live-search="false">
                                <option value="">{{ trans('index.default') }}</option>
                                <option {{ Request::get('sortby') == 'a_price' ? 'selected' : '' }} value="a_price">{{ trans('index.a-price') }}</option>
                                <option {{ Request::get('sortby') == 'd_price' ? 'selected' : '' }} value="d_price">{{ trans('index.d-price') }}</option>
                                <option {{ Request::get('sortby') == 'a_date' ? 'selected' : '' }} value="a_date">{{ trans('index.a-date') }}</option>
                                <option {{ Request::get('sortby') == 'd_date' ? 'selected' : '' }} value="d_date">{{ trans('index.d-date') }}</option>
                            </select>
                        </p>
                    </div>
                </div>
                <!--end list tabs-->
                <div class="list-search">
                    <div class="form-control" readonly="" >
                        <p>{{ trans('form.from') . ' : ' . (isset($dataSearch['min-price']) ? $dataSearch['min-price'] : $prices->min) . ' ' . trans('form.to') . ' ' . (isset($dataSearch['max-price']) ? $dataSearch['max-price'] : $prices->max) }}</p>
                        @if (isset($dataSearch['keyword'])))
                            <p>{{ trans('form.keyword') }}: {{ $dataSearch['keyword'] }}</p>
                        @endif
                        @if (isset($dataSearch['location']))
                            <p>{{ trans('form.township') }}: {{ $dataSearch['location'] }}</p>
                        @endif
                        @if (isset($dataSearch['area']))
                            <p>{{ trans('form.country') }}: {{ $dataSearch['area'] }}</p>
                        @endif
                        @if (isset($dataSearch['status']))
                            <p>{{ trans('form.status') }}:
                                @forelse ($statuses as $element)
                                @if ($dataSearch['status'] == $element->id)
                                {{ $element->title }}
                                @endif
                                @empty
                                @endforelse
                            </p>
                        @endif
                        @if (isset($dataSearch['type']))
                            <p>{{ trans('form.type') }}:
                               @forelse ($types as $element)
                               @if ($dataSearch['type'] == $element->id)
                               {{ $element->title }}
                               @endif
                               @empty
                               @endforelse
                           </p>
                        @endif
                    </div>
                </div>
                <!--start property items-->
                <div class="property-listing list-view">
                    <div class="row infinite-scroll">
                        @forelse ($searchs as $element)
                        <div class="item-wrap infobox_trigger item-gorgeous-villa-for-sale">
                            <div class="property-item table-list">
                                <div class="table-cell">
                                    <div class="figure-block">
                                        <figure class="item-thumb">
                                            <div class="label-wrap label-right hide-on-list">
                                                <span class="label-status label-status-7 label label-default label label-success">{{ $element->status->title }}</span>
                                                <span class="label-color-288 label label-default">{{ $element->category->title }}</span>
                                            </div>
                                            <div class="price hide-on-list">
                                                <span class="item-price">{{ $element->price . config('setting.price.vi') }}</span>
                                            </div>
                                            <a class="hover-effect" href="{{ action('PostController@show', $element->slug) }}">
                                                <img width="385" height="258" src="{{ $element->firstImages->image or config('path.no-image') }}" class="attachment-houzez-property-thumb-image size-houzez-property-thumb-image wp-post-image" alt=""/>
                                            </a>
                                            <ul class="actions">
                                                <li>
                                                    <span class="add_fav" data-placement="top" data-toggle="tooltip" data-original-title="Favorite" data-propid="425">
                                                        <i class="fa fa-heart-o"></i>
                                                    </span>
                                                </li>
                                                <li>
                                                    <span data-toggle="tooltip" data-placement="top" title="" data-original-title="(7) Photos">
                                                        <i class="fa fa-camera"></i>
                                                    </span>
                                                </li>
                                                <li>
                                                    <span id="compare-link-425" class="compare-property" data-propid="425" data-toggle="tooltip" data-placement="top" title="" data-original-title="Compare">
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
                                                <span class="label-color-288 label label-default">{{ $element->category->title }}</span>
                                                <span class="label-featured label label-success">{{ $element->status->title }}</span>
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
                                                <a href="{{ action('PostController@show', $element->slug) }}">{{ $element->title }}</a>
                                            </p>
                                            <p><i class="fa fa-calendar"></i>{{ $element->created_at }}</p>
                                        </div>
                                    </div>
                                    <div class="body-right table-cell hidden-gird-cell">
                                        <div class="info-row price">
                                            <span class="item-price">{{ $element->price . config('setting.price.vi') }}</span>
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
                                                    <span>{{ trans('post.area') . trans('post.colon') }}  {{ $element->area }}</span>
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
                                <div class="item-foot-left">
                                    <p class="prop-user-agent">
                                        <i class="fa fa-user"></i>
                                        <a href="{{ action('PostController@show', $element->slug) }}">{{ $element->title }}</a>
                                    </p>
                                </div>
                                <div class="item-foot-right">
                                    <p class="prop-date">
                                        <i class="fa fa-calendar"></i>
                                        {{ $element->created_at }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @empty
                        @endforelse
                        <!--start Pagination-->
                        {{ $searchs->appends(request()->query())->links() }}
                        <!--start Pagination-->
                    </div>
                </div>
                <hr>
            </div>
        </div>
        <!-- end container-content -->
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 col-md-offset-0 col-sm-offset-3 container-sidebar houzez_sticky" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
            <div class="theiaStickySidebar">
                <aside id="sidebar" class="sidebar-white">
                    <div id="houzez_advanced_search-9" class="widget widget_houzez_advanced_search">
                        <div class="widget-top">
                            <h3 class="widget-title">{{ trans('form.find') }}</h3>
                        </div>
                        <div class="widget-range">
                            <div class="widget-body">
                                {{ Form::open(['action' => 'PostController@search','method' => 'GET','autocomplete' => 'off']) }}
                                    <div class="range-block rang-form-block">
                                        <div class="row">
                                            <div class="col-sm-12 col-xs-12 keyword_search">
                                                <div class="form-group">
                                                    {!! Form::text('keyword', '', ['class' => 'form-control houzez_geocomplete', 'placeholder' => trans('validate.placeholder.keyword')]) !!}
                                                    <div id="auto_complete_ajax" class="auto-complete"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    <select name="location" class="selectpicker bs-select-hidden" data-live-search="true">
                                                        <option value="">{{ trans('form.all-township') }}</option>
                                                        @forelse ($township as $element)
                                                            <option data-parentstate="{{ $element->country }}" value="{{ $element->township }}">{{ $element->township }}</option>
                                                        @empty
                                                        @endforelse
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    <select name="area" class="selectpicker bs-select-hidden" data-live-search="true">
                                                        <option value="">{{ trans('form.all-countries') }}</option>
                                                        @forelse ($countries as $element)
                                                            <option data-parentcity="{{ $element->country }}" value="{{ $element->country }}">{{ $element->country }}</option>
                                                        @empty
                                                        @endforelse
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    <select name="type" class="selectpicker bs-select-hidden" data-live-search="false">
                                                        <option value="">{{ trans('form.all-type') }}</option>
                                                        @forelse ($types as $element)
                                                            <option value="{{ $element->id }}">{{ $element->title }}</option>
                                                        @empty
                                                        @endforelse
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    <select class="selectpicker bs-select-hidden" id="widget_status" name="status" data-live-search="false">
                                                        <option value="">{{ trans('form.all-status') }}</option>
                                                        @forelse ($statuses as $element)
                                                            <option value="{{ $element->id }}">{{ $element->title }}</option>
                                                        @empty
                                                        @endforelse
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="range-block">
                                        <h4>{{ trans('form.price-range') }}:</h4>
                                        <div id="slider-price" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                                            <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                                            <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                            <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                        </div>
                                        <div class="clearfix range-text">
                                            {!! Form::text('min-price', '', ['class' => 'pull-left range-input text-left', 'id' => 'min-price', 'readonly' => 'readonly']) !!}
                                            {!! Form::text('max-price', '', ['class' => 'pull-right range-input text-right', 'id' => 'max-price', 'readonly' => 'readonly']) !!}
                                        </div>
                                    </div>
                                    <div class="hidden-input">
                                        {!! Form::hidden('lat', '', ['class' => 'lat-input', 'readonly' => 'readonly']) !!}
                                        {!! Form::hidden('lng', '', ['class' => 'lng-input', 'readonly' => 'readonly']) !!}
                                    </div>
                                    <div class="range-block rang-form-block">
                                        <div class="row">
                                            <div class="col-sm-12 col-xs-12">
                                                <button type="submit" class="btn btn-secondary btn-block">
                                                    <i class="fa fa-search fa-left"></i>
                                                    {{ trans('form.search') }}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
@endsection
