@extends('layouts.layout')
@section('footerscript')
@parent
{{ Html::script('/wp-content/themes/houzez/js/tannguyen/contact.js') }}
@endsection
@section('create')
<div class="header-media-wrap contact">
    <div class="header-media">
        <div class="banner-parallax">
            <div class="banner-bg-wrap">
                <div class="banner-inner"></div>
            </div>
        </div>
        <div class="banner-caption">
            <h1>{{ trans('index.contact') }}</h1>
            <h2>{{ trans('index.contact-content') }}</h2>
        </div>
    </div>
</div>
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
                    <li class="active">{{ trans('index.contact') }}</li>
                </ol>
                @if(Session::has('success'))
                <hr>
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
                @endif
                @if(Session::has('error'))
                <hr>
                <div class="alert alert-warning">
                    {{ Session::get('error') }}
                </div>
                @endif
                <div class="page-title-left">
                    <h1 class="title-head">
                        {{ trans('index.contact') }}
                    </h1>
                </div>
            </div>
        </div>
    </div>
    <section class="section-detail-content houzez-page-template">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="page-main">
                    <div class="white-block col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <article id="post-1100" class="post-1100 page type-page status-publish hentry">
                            <div class="entry-content">
                                <div class="row row-fluid ">
                                    <div class="col-sm-12">
                                        <div class="vc_column-inner ">
                                            <div class="wpb_wrapper">
                                                <div class="wpb_text_column wpb_content_element ">
                                                    <div class="wpb_wrapper">
                                                        <p>
                                                            <strong>{{ trans('index.contact-with-me') }}</strong>
                                                            {{ trans('index.contact-infomation') }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div role="form" class="wpcf7" id="wpcf7-f5-p1100-o1" lang="en-US" dir="ltr">
                                                    <div class="screen-reader-response"></div>
                                                    {{ Form::open(['action' => 'PageController@sendContact','method' => 'POST','class' => 'wpcf7-form', 'id' => 'contact']) }}
                                                    <div class="form-group">
                                                        {!! Form::label('name', trans('form.your-name')) !!}<br>
                                                        <span class="wpcf7-form-control-wrap">
                                                            {!! Form::text('name', null, ['size' => 40, 'class' => 'wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control']) !!}
                                                        </span>
                                                        <p></p>
                                                    </div>
                                                    <div class="form-group">
                                                        {!! Form::label('email', trans('form.email')) !!}<br>
                                                        <span class="wpcf7-form-control-wrap">
                                                            {!! Form::email('email', null, ['size' => 40, 'class' => 'wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control']) !!}
                                                        </span>
                                                        <p></p>
                                                    </div>
                                                    <div class="form-group">
                                                        {!! Form::label('phone', trans('form.phone')) !!}<br>
                                                        <span class="wpcf7-form-control-wrap">
                                                            {!! Form::number('phone', null, ['size' => 40, 'class' => 'wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control']) !!}
                                                        </span>
                                                        <p></p>
                                                    </div>
                                                    <div class="form-group">
                                                        {!! Form::label('subject', trans('form.subject')) !!}<br>
                                                        <span class="wpcf7-form-control-wrap">
                                                            {!! Form::text('subject', null, ['size' => 40, 'class' => 'wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control']) !!}
                                                        </span>
                                                        <p></p>
                                                    </div>
                                                    <div class="form-group">
                                                        {!! Form::label('messages', trans('form.messages')) !!}<br>
                                                        <span class="wpcf7-form-control-wrap your-message">
                                                            {!! Form::textarea('messages', null, ['rows' => 10, 'cols' => 40, 'class' => 'wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required form-control']) !!}
                                                        </span>
                                                    </div>
                                                    <div class="form-group">
                                                    <input type="submit" value="{{ trans('form.submit') }}" class="wpcf7-form-control wpcf7-submit btn btn-primary btn-lg">
                                                        <span class="ajax-loader"></span>
                                                    </div>
                                                    <div class="wpcf7-response-output wpcf7-display-none"></div>
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                    @include('page.rightbar')
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
