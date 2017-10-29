@extends('layouts.layout')
@section('create')
<div class="header-media-wrap">
    <div class="header-media">
        <div class="banner-parallax">
            <div class="banner-bg-wrap">
                <div class="banner-inner"></div>
            </div>
        </div>
        <div class="banner-caption">
            <h1>{{ trans('index.rule') }}</h1>
            <h2>{{ trans('index.rule-content') }}</h2>
        </div>
    </div>
</div>
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
                <li class="active">{{ trans('index.rule') }}</li>
            </ol>
            <div class="page-title-left">
                <h1 class="title-head">
                    {{ trans('index.rule') }}
                </h1>
            </div>
        </div>
    </div>
</div>
<section class="section-detail-content houzez-page-template">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 container-contentbar">
            <div class="page-main">
                <div class="white-block ">
                    <article class="post-692 page type-page status-publish hentry">
                        Noi dung viet o day
                    </article>
                </div>
            </div>
        </div>
        @include('page.rightbar')
    </div>
</section>
@endsection
