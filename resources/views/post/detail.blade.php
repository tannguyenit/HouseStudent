@extends('layouts.layout')
@section('content')
<!--start detail top-->
<section class="detail-top detail-top-grid no-margin">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="header-detail">
                    <div class="header-left">
                        <ol class="breadcrumb">
                            <li>
                                <a itemprop="url" href="{{ action('HomeController@home') }}">
                                    <span itemprop="{{ trans('index.home') }}">{{ trans('index.home') }}</span>
                                </a>
                            </li>
                            <li>
                                <a itemprop="url" href="{{ action('TypeController@show', $detailsPost->type->slug) }}">
                                    <span itemprop="title">{{ $detailsPost->type->title }}</span>
                                </a>
                            </li>
                            <li class="active">{{ $detailsPost->title }}</li>
                        </ol>
                        <div class="table-list">
                            <div class="table-cell">
                                <h1>{{ $detailsPost->title }}</h1>
                            </div>
                            <div class="table-cell hidden-sm hidden-xs">
                                <span class="label-wrap">
                                    <span class="label-featured label label-success">{{ $detailsPost->type->title }}</span>
                                </span>
                            </div>
                        </div>
                        <address class="property-address">
                            {{ $detailsPost->address }}
                            <a target="_blank" href="http://maps.google.com/?q={{ $detailsPost->address }}"> {{ trans('post.open-map') }} <i class="fa fa-paper-plane"></i> </a>
                        </address>
                        <span id="getGoogleMaps" data-lat="{{ $detailsPost->lat }}" data-lng="{{ $detailsPost->lng }}"></span>
                        <span id="getPropertiesId" data-id="{{ $detailsPost->id }}"></span>
                    </div>
                    <div class="header-right">
                        <ul class="actions">
                            <li class="share-btn">
                                <div class="share_tooltip tooltip_left fade">
                                    <a class="share_links" href="http://www.facebook.com/sharer.php?u={{ Request::url() }}" ><i class="fa fa-facebook"></i></a>
                                    <a class="share_links" href="https://twitter.com/intent/tweet?text={{ $detailsPost->title }}url={{ Request::url() }}" ><i class="fa fa-twitter"></i></a>
                                    <a class="share_links" href="http://plus.google.com/share?url={{ Request::url() }}" ><i class="fa fa-google-plus"></i></a>
                                </div>
                                <span title="" data-placement="bottom" data-toggle="tooltip" data-original-title="{{ trans('post.share') }}">
                                    <i class="fa fa-share-alt"></i>
                                </span>
                            </li>
                            <li class="fvrt-btn">
                                <span class="add_fav" data-placement="bottom"  data-toggle="tooltip" data-original-title="{{ $detailsPost->total_like . trans('post.like') }}" data-postid="{{ $detailsPost->id }}">
                                    @forelse ($detailsPost->likes as $element)
                                        @if (auth()->check() && $element->user_id == auth()->user()->id)
                                            @php($like = '<i class="fa fa-heart" data-status="'.config('setting.no-active').'"></i>')
                                        @else
                                            @php($like = '<i class="fa fa-heart-o" data-status="'.config('setting.active').'"></i>')
                                        @endif
                                    @empty
                                        @php($like = '<i class="fa fa-heart-o" data-status="'.config('setting.active').'"></i>')
                                    @endforelse
                                    {!! $like !!}
                                </span>
                            </li>
                        </ul>
                        <span class="item-price">${{ $detailsPost->price }} {{ config('setting.price.vi') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--end detail top-->
<!--start detail content-->
<section class="section-detail-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 container-contentbar">
                <div class="detail-bar">
                    <div class="detail-media detail-content-slideshow">
                        <div class="tab-content">
                            <div id="gallery" class="tab-pane fade in active">
                                <span class="label-wrap visible-sm visible-xs">
                                    <span class="label label-primary label-status-7">{{ $detailsPost->type->title }}</span>
                                </span>
                                <div class="detail-slider-wrap">
                                    <div class="detail-slider owl-carousel owl-theme">
                                        @forelse ($detailsPost->images as $image)
                                        <div class="item" style="background-image: url('{{ $image->image }}')">
                                            <a class="popup-trigger banner-link" href="#"></a>
                                        </div>
                                        @empty
                                        <div class="item" style="background-image: url('{{ config('path.no-image') }}')">
                                            <a class="popup-trigger banner-link" href="#"></a>
                                        </div>
                                        @endforelse
                                    </div>
                                    <div class="detail-slider-nav-wrap">
                                        <div class="detail-slider-nav owl-carousel owl-theme">
                                            @forelse ($detailsPost->images as $image)
                                            <div class="item">
                                                <img src="{{ $image->image }}" alt="{{ $detailsPost->title }}" class="height-70"/>
                                            </div>
                                            @empty
                                            <div class="item">
                                                <img src="{{ config('path.no-image') }}" alt="{{ $detailsPost->title }}" class="height-70"/>
                                            </div>
                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="singlePropertyMap" class="tab-pane fade ">
                                <div class="mapPlaceholder">
                                    <div class="loader-ripple">
                                        <div></div>
                                        <div></div>
                                    </div>
                                </div>
                            </div>
                            <div id="street-map" class="tab-pane fade "></div>
                        </div>
                        <div class="media-tabs">
                            <ul class="media-tabs-list">
                                <li class="popup-trigger" data-placement="bottom" data-toggle="tooltip" data-original-title="{{ trans('post.view-photo') }}">
                                    <a href="#gallery" data-toggle="tab">
                                        <i class="fa fa-camera"></i>
                                    </a>
                                </li>
                                <li data-placement="bottom" data-toggle="tooltip" data-original-title="{{ trans('post.view-map') }}">
                                    <a href="#singlePropertyMap" data-toggle="tab">
                                        <i class="fa fa-map"></i>
                                    </a>
                                </li>
                            </ul>
                            <ul class="actions">
                                <li class="share-btn">
                                    <div class="share_tooltip tooltip_left fade">
                                        <a class="share_links" href="http://www.facebook.com/sharer.php?u={{ Request::url() }}" ><i class="fa fa-facebook"></i></a>
                                        <a class="share_links" href="https://twitter.com/intent/tweet?text={{ $detailsPost->title }}url={{ Request::url() }}" ><i class="fa fa-twitter"></i></a>
                                        <a class="share_links" href="http://plus.google.com/share?url={{ Request::url() }}" ><i class="fa fa-google-plus"></i></a>
                                    </div>
                                    <span title="" data-placement="right" data-toggle="tooltip" data-original-title="{{ trans('post.share') }}"><i class="fa fa-share-alt"></i></span>
                                </li>
                                <li class="fvrt-btn">
                                    <span class="add_fav" data-placement="bottom"  data-toggle="tooltip" data-original-title="{{ $detailsPost->total_like . trans('post.like') }}" data-postid="{{ $detailsPost->id }}">
                                        @forelse ($detailsPost->likes as $element)
                                            @if (auth()->check() && $element->user_id == auth()->user()->id)
                                                @php($like = '<i class="fa fa-heart" data-status="'.config('setting.no-active').'"></i>')
                                            @else
                                                @php($like = '<i class="fa fa-heart-o" data-status="'.config('setting.active').'"></i>')
                                            @endif
                                        @empty
                                            @php($like = '<i class="fa fa-heart-o" data-status="'.config('setting.active').'"></i>')
                                        @endforelse
                                        {!! $like !!}
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div id="description" class="property-description detail-block target-block">
                        <div class="detail-title">
                            <h2 class="title-left">{{ trans('post.description') }}</h2>
                        </div>
                        <p>{{ $detailsPost->description }}</p>
                    </div>
                    <div id="detail" class="detail-list detail-block target-block">
                        <div class="detail-title">
                            <h2 class="title-left">{{ trans('post.detail') }}</h2>
                            <div class="title-right">
                                <p><i class="fa fa-clock-o"></i> {{ $detailsPost->created_at }}</p>
                            </div>
                        </div>
                        <div class="alert alert-info table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td><strong>{{ trans('post.name-boss') }}:<br></strong> {{ $detailsPost->name_boss }}</td>
                                        <td><strong>{{ trans('post.phone-boss') }}:<br></strong> <a href="tel:{{ $detailsPost->phone_boss }}" "email me">{{ $detailsPost->phone_boss }}</a></td>
                                        <td><strong>{{ trans('post.area') }}:<br></strong> {{ $detailsPost->area }} {{ config('setting.unit.vi') }}</td>
                                        <td><strong>{{ trans('post.price') }}:<br></strong> $ {{ $detailsPost->price }} {{ config('setting.price,vi') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            @if ($detailsPost->features && count($detailsPost->features))
                            <ul class="list-three-col">
                                @forelse ($detailsPost->features as $feature)
                                <li><strong>{{ $feature->title }} : </strong> {{ $feature->value }}</li>
                                @empty
                                @endforelse
                            </ul>
                            @endif
                        </div>
                    </div>
                    <div id="agent_bottom" class="detail-contact detail-block target-block">
                        <div class="detail-title">
                            <h2 class="title-left">{{ trans('index.contact-info') }}</h2>
                        </div>
                        <div class="media agent-media">
                            <div class="media-left">
                                <a href="../../agent/brittany-watkins/index.html">
                                    <img src="{{ $detailsPost->user->avatar }}" alt="{{ $detailsPost->user->fullname }}" title="{{ $detailsPost->user->fullname }}" width="80" height="80">
                                </a>
                            </div>
                            <div class="media-body">
                                <dl>
                                    <dd>
                                        <i class="fa fa-user"></i> {{ $detailsPost->user->fullname }}
                                    </dd>
                                    <dd>
                                        <span><i class="fa fa-mobile"></i>{{ $detailsPost->user->phone or "xxxx xxxx xxx" }}</span>
                                    </dd>
                                    <dd>
                                        <span><i class="fa fa-calendar"></i>{{ $detailsPost->user->created_at }}</span>
                                    </dd>
                                    @if ($detailsPost->user->facebook_link)
                                    <dd>
                                        <span>
                                            <a class="btn-facebook" target="_blank" href="{{ $detailsPost->user->facebook_link }}">
                                                <i class="fa fa-facebook-square"></i>
                                                <span>{{ trans('post.facebook') }}</span>
                                            </a>
                                        </span>
                                    </dd>
                                    @endif
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class=" detail-block">
                        <div class="fb-like" data-href="{{ Request::url() }}" data-layout="button_count" data-action="like" data-size="large" data-show-faces="true" data-share="true"></div>
                        <div class="fb-comments" data-href="{{ Request::url() }}" data-width="100%" data-numposts="5"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 col-md-offset-0 col-sm-offset-3 container-sidebar houzez_sticky">
                <aside id="sidebar" class="sidebar-white">
                    @if (isset($similarPost->posts))
                    <div id="houzez_featured_properties-12" class="widget widget_houzez_featured_properties">
                        <div class="widget-top">
                            <h3 class="widget-title">{{ trans('post.similar-post') }}</h3>
                        </div>
                        <div class="widget-body">
                            <div class="property-widget-slider slide-animated owl-carousel owl-theme">
                                @php($arrayPost = $similarPost->posts)
                                @foreach ($arrayPost as $element)
                                <div class="item">
                                    <div class="figure-block">
                                        <figure class="item-thumb">
                                            <span class="label-featured label label-success">{{ $similarPost->title }}</span>
                                            <a href="{{ action('PostController@show', $element->slug) }}" class="hover-effect">
                                                <img width="385" height="258" src="{{ $element->firstImages->image or config('path.no-image') }}" class="attachment-houzez-property-thumb-image size-houzez-property-thumb-image wp-post-image" alt=""/>
                                            </a>
                                            <figcaption class="thumb-caption">
                                                <div class="cap-price pull-left"> ${{ $element->price }} {{ config('setting.price.vi') }}</div>
                                                <ul class="list-unstyled actions pull-right">
                                                    <li>
                                                        <span class="add_fav" data-placement="top" data-toggle="tooltip" data-original-title="{{ $element->total_like . trans('post.like') }}" data-postid="{{ $element->id }}">
                                                            @forelse ($detailsPost->likes as $element)
                                                                @if (auth()->check() && $element->user_id == auth()->user()->id)
                                                                    @php($like = '<i class="fa fa-heart" data-status="'.config('setting.no-active').'"></i>')
                                                                @else
                                                                    @php($like = '<i class="fa fa-heart-o" data-status="'.config('setting.active').'"></i>')
                                                                @endif
                                                            @empty
                                                                @php($like = '<i class="fa fa-heart-o" data-status="'.config('setting.active').'"></i>')
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
                                                        <span class="compare-property" data-toggle="tooltip" data-placement="top" title="{{ count($element->images) . trans('post.photo') }}">
                                                            <i class="fa fa-camera"></i>
                                                        </span>
                                                    </li>
                                                </ul>
                                            </figcaption>
                                        </figure>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif
                    @if (Session::has('arrRecently'))
                    <div id="houzez_properties_viewed-5" class="widget widget_houzez_properties_viewed">
                        <div class="widget-top">
                            <h3 class="widget-title">{{ trans('post.recently') }}</h3>
                        </div>
                        <div class="widget-body">
                            @php($arrRecently = array_unique(Session::get('arrRecently')))
                            @foreach ($arrRecently as $element)
                            @if ($element->id != $detailsPost->id)
                            <div class="media">
                                <div class="media-left">
                                    <figure class="item-thumb">
                                        <a class="hover-effect" href="{{ action('PostController@show', $element->slug) }}">
                                            <img width="150" height="110" src="{{ $element->firstImages->image or config('path.no-image') }}" class="attachment-houzez-widget-prop size-houzez-widget-prop wp-post-image" alt="" sizes="(max-width: 150px) 100vw, 150px" />
                                        </a>
                                    </figure>
                                </div>
                                <div class="media-body">
                                    <h3 class="media-heading">
                                        <a href="{{ action('PostController@show', $element->slug) }}">{{ $element->title }}</a>
                                    </h3>
                                    <h4> ${{ $element->price }} {{ config('setting.price.vi') }}</h4>
                                    <div class="amenities">
                                        <p>{{ trans('post.area') }} {{ $element->area }}</p>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                    @endif
                </aside>
            </div>
        </div>
    </div>
</section>
<!--end detail content-->
@endsection
