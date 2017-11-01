@extends('layouts.admin.layout')
@section('content')
<div class="board-header board-header-4">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <div class="board-header-left">
                    <h3 class="board-title">{{ trans('user.my-properties') }}</h3>
                </div>
                <div class="board-header-right">
                    <ol class="breadcrumb">
                        <li class="active">{{ trans('user.my-properties') }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="dashboard-content-area dashboard-fix">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                @php($auth = auth()->user())
                @if ($auth->active != config('setting.active'))
                <div class="alert alert-warning fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>{{ trans('validate.warning') }}!</strong> {{ trans('validate.account_not_active') }}
                </div>
                @endif
                <div class="my-profile-search">
                    <div class="profile-top-left">
                        {!! Form::open(['method' => 'GET']) !!}
                        <div class="single-input-search">
                            {!! Form::text('keyword', Request::get('keyword'), ['class' => 'form-control', 'placeholder' => trans('validate.placeholder.listing')]) !!}
                            <button type="submit"></button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                    <div class="profile-top-right">
                        <div class="sort-tab  text-right"> {{ trans('index.sort-by') }}:
                            <select id="sort_properties" class="selectpicker bs-select-hidden" title="" data-live-search-style="begins" data-live-search="false">
                                <option value="">{{ trans('index.default') }}</option>
                                <option {{ Request::get('sortby') == 'a_price' ? 'selected' : '' }} value="a_price">{{ trans('index.a-price') }}</option>
                                <option {{ Request::get('sortby') == 'd_price' ? 'selected' : '' }} value="d_price">{{ trans('index.d-price') }}</option>
                                <option {{ Request::get('sortby') == 'a_date' ? 'selected' : '' }} value="a_date">{{ trans('index.a-date') }}</option>
                                <option {{ Request::get('sortby') == 'd_date' ? 'selected' : '' }} value="d_date">{{ trans('index.d-date') }}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="my-property-listing">
                    <div class="row grid-row">
                        @forelse ($myProperties as $element)
                        <div class="item-wrap">
                            <div class="media my-property">
                                <div class="media-left">
                                    <div class="figure-block">
                                        <figure class="item-thumb">
                                            <a href="{{ action('PostController@show', $element->slug) }}" target="_blank">
                                                <img width="150" height="110" src="{{ isset($element->firstImages) ? $element->firstImages->image : config('path.no-image') }}" class="attachment-houzez-widget-prop size-houzez-widget-prop wp-post-image" alt="{{ isset($element->firstImages) ? $element->firstImages->image : trans('post.no-image') }}" sizes="(max-width: 150px) 100vw, 150px">
                                            </a>
                                        </figure>
                                    </div>
                                </div>
                                <div class="media-body media-middle">
                                    <div class="my-description">
                                        <h4 class="my-heading">
                                            <a href="{{ action('PostController@show', $element->slug) }}" target="_blank">{{ $element->title }}</a>
                                            @if ($element->active == config('setting.active'))
                                            <span class="label-status-8 label label-featured">{{ trans('post.active') }}</span>
                                            @else
                                            <span class="label label-default label-color-289">{{ trans('post.no-active') }}</span>
                                            @endif
                                        </h4>
                                        <address class="address">{{ $element->address }}</address>
                                        <div class="status">
                                            <p>
                                                <span>
                                                    <strong>{{ trans('post.type') }}: </strong>{{ $element->type->title }}
                                                </span>
                                                <span>
                                                    <strong>{{ trans('post.price') }}: </strong> ${{ $element->price }}
                                                </span>
                                                <span>
                                                    <strong>{{ trans('post.area') }}: </strong> {{ $element->area }}
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="my-actions">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                {{ trans('form.action') }} <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu actions-dropdown">
                                                <li>
                                                    <a href="{{ action('PostController@edit', $element->id) }}">
                                                        <i class="fa fa-edit"></i> {{ trans('form.edit') }}
                                                    </a>
                                                </li>
                                                <li class="getData" data-id={{ $element->id }}>
                                                    <a data-toggle="modal" href='#confirm_modal' data-action="{{ action('AjaxController@deletePost') }}">
                                                        <i class="fa fa-close btn-delete"></i> {{ trans('form.delete') }}
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        @endforelse
                    </div>
                    <hr>
                    <div class="text-center">
                        {{ $myProperties->appends(['sortby' => Request::get('sortby')])->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
