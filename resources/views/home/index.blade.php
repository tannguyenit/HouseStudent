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
                                @include('home.news-post')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="vc_row wpb_row vc_row-fluid">
        <div class="wpb_column vc_column_container vc_col-sm-12">
            <div class="vc_column-inner ">
                <div class="wpb_wrapper">
                    <div class="houzez-module module-title section-title-module text-center ">
                        <h2>Discover Our Best Deals in South Florida</h2>
                        <h3 class="sub-heading"></h3>
                    </div>
                    <div id="properties_module_section" class="houzez-module property-item-module">
                        <div>
                            <!-- Start container-content -->
                            <div id="properties_module_container" data-nextpageurl="" data-url-load-more="{{ action('AjaxController@loadMoreHomePage') }}?page=1" class="property-listing grid-view grid-view-3-col"></div>
                            <!-- End container-content -->
                        </div>
                        <div class="clearfix"></div>
                        <div id="fave-pagination-loadmore" class="pagination-wrap fave-load-more">
                            <div class="pagination">
                                <a href="javascript:void(0)">
                                    {{ trans('index.load-more') }}
                                </a>
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
                                @include('home.top-views')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div data-vc-full-width="true" data-vc-full-width-init="false" data-vc-parallax="1.5" class="hidden-xs row row-fluid vc_custom_1494355113610">
        <div class="col-sm-12">
            <div class="vc_column-inner ">
                <div class="wpb_wrapper">
                    @include('home.features')
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
                            @include('home.location')
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
    <div data-vc-full-width="true" data-vc-full-width-init="false" class="row row-fluid hidden">
        <div class="col-sm-12">
            <div class="vc_column-inner ">
                <div class="wpb_wrapper">
                    <div class="houzez-module module-title section-title-module text-center ">
                        <h2>{{ trans('index.our-team-title') }}</h2>
                        <h3 class="sub-heading">{{ trans('index.our-team-content') }}</h3>
                    </div>
                    <div id="agents-module" class="houzez-module agents-module">
                        @include('home.core-member')
                    </div>
                    <div class="vc_empty_space">
                        <span class="vc_empty_space_inner"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="vc_row-full-width vc_clearfix"></div>
@endsection
