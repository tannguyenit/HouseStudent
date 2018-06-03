@extends('layouts.admin.layout')
@section('css')
    @parent
    {{ Html::style('wp-content/themes/houzez/css/toggle.min.css') }}
@endsection
@section('footerscript')
    @parent
    {{ Html::script('wp-content/themes/houzez/admin/js/sort-table.js') }}
    {{ Html::script('wp-content/themes/houzez/admin/js/main.js') }}
    {{ Html::script('wp-content/themes/houzez/admin/js/post.js') }}
    <script type="text/javascript">
        var main = new Main('{{ trans('validate.sending') }}', '{{ trans('validate.done') }}', '{{ trans('validate.accept') }}'),
            post = new Post('{{ action('Admin\AjaxController@changeStatusPost') }}'),
            pin = new Pin('{{ action('Admin\AjaxController@changeStatusPin') }}');
            main.onClick();
            post.init();
            pin.init();
        $(document).ready(function () {
            SortTable.table('.post-table');
        })
    </script>
@endsection
@section('content')
<div class="board-header board-header-4">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <div class="board-header-left">
                    <h3 class="board-title">{{ trans('admin.type') }}</h3>
                </div>
                <div class="board-header-right">
                    <ol class="breadcrumb">
                        <li>
                            <a itemprop="url" href="{{ action('Admin\DashboardController@dashboard') }}">
                                <span itemprop="title">{{ trans('admin.dashboard') }}</span>
                            </a>
                        </li>
                        <li class="active">{{ trans('admin.type') }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="dashboard-content-area dashboard-fix">
    <div class="container">
        <div class="my-profile-search">
                <div class="profile-top-left">
                    {!! Form::open(['method' => 'GET']) !!}
                    <div class="single-input-search">
                        {!! Form::text('keyword', Request::get('keyword'), ['class' => 'form-control', 'placeholder' => trans('validate.placeholder.list-search')]) !!}
                        <button type="submit"></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                <div class="profile-top-right">
                    <div class="sort-tab  text-right"> {{ trans('index.sort-by') }}:
                        <select id="sort_properties" class="selectpicker bs-select-hidden" title="" data-live-search-style="begins" data-live-search="false">
                            <option value="">{{ trans('index.default') }}</option>
                            <option {{ Request::get('sortby') == 'a_pin' ? 'selected' : '' }} value="a_pin">{{ trans('index.a-pin') }}</option>
                            <option {{ Request::get('sortby') == 'd_pin' ? 'selected' : '' }} value="d_pin">{{ trans('index.d-pin') }}</option>
                            <option {{ Request::get('sortby') == 'a_price' ? 'selected' : '' }} value="a_price">{{ trans('index.a-price') }}</option>
                            <option {{ Request::get('sortby') == 'd_price' ? 'selected' : '' }} value="d_price">{{ trans('index.d-price') }}</option>
                            <option {{ Request::get('sortby') == 'a_date' ? 'selected' : '' }} value="a_date">{{ trans('index.a-date') }}</option>
                            <option {{ Request::get('sortby') == 'd_date' ? 'selected' : '' }} value="d_date">{{ trans('index.d-date') }}</option>
                        </select>
                    </div>
                </div>
            </div>
        <div class="bg-white">
            <div class="table-responsive">
                <table class="table table-hover table-bordered post-table">
                    <thead>
                        <tr>
                            <th>{{ trans('form.stt') }}</th>
                            <th>{{ trans('form.title') }}</th>
                            <th>{{ trans('form.username') }}</th>
                            <th>{{ trans('form.address') }}</th>
                            <th>{{ trans('form.type') }}</th>
                            <th>{{ trans('form.price') }}</th>
                            <th>{{ trans('form.approve') }}</th>
                            <th>{{ trans('form.pin') }}</th>
                            <th>{{ trans('form.time-update') }}</th>
                            <th>{{ trans('form.time-created') }}</th>
                            <th>{{ trans('form.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($posts as $key => $element)
                        <tr id="{{ $element->id }}"
                            @if ($element->pin == config('setting.pin.active'))
                                 class="bg-danger"
                            @elseif($element->pin == config('setting.pin.waitting'))
                                class="bg-warning"
                            @else
                            @endif
                        >
                            <td>{{ $key + 1 }}</td>
                            <td class="title_content limit-150">
                                <a href='{{ action('Admin\PostController@show', $element->id) }}' title="{{ $element->title }}"><p>{{ $element->title }}</p></a>
                            </td>
                            <td class="title_content limit-100">
                                <p>{{ $element->user->username }}</p>
                            </td>
                            <td class="limit-100">
                                <p>{{ $element->address }}</p>
                            </td>
                            <td>
                                <p>{{ $element->type->title }}</p>
                            </td>
                            <td>
                                <p>{{ $element->price }} {{ config('setting.price.vi') }}</p>
                            </td>
                            <td class="tg-list-item">
                                {!! Form::checkbox('active', $element->active, $element->active == config('setting.active') ? 'checked="checked"' : '', ['class' => 'tgl tgl-ios change-status', 'id' => 'active'. $element->id]) !!}
                                {!! Form::label('active'.$element->id, ' ', ['class' => 'tgl-btn']) !!}
                            </td>
                            <td class="tg-list-item">
                                <select name="pin" class="custom-select custom-select-sm channge-pin" id="{{ $element->id }}">
                                    <option value="{{ config('setting.pin.not-active') }}" {!! $element->pin == config('setting.pin.not-active') ? 'selected' : null !!}>No</option>
                                    <option value="{{ config('setting.pin.waitting') }}" {!! $element->pin == config('setting.pin.waitting') ? 'selected' : null !!}>Wait</option>
                                    <option value="{{ config('setting.pin.active') }}" {!! $element->pin == config('setting.pin.active') ? 'selected' : null !!}>Pin</option>
                                </select>
                            </td>
                            <td class="limit-100">
                                <p>{{ $element->updated_at }}</p>
                            </td>
                            <td class="limit-100">
                                <p>{{ $element->created_at }}</p>
                            </td>
                            <td class="getData" data-id={{ $element->id }}>
                                <a href='{{ action('Admin\PostController@show', $element->id) }}'><i class="fa fa-pencil-square-o btn-edit"></i></a>
                                <a data-toggle="modal" href='#confirm_modal' data-action="{{ action('Admin\AjaxController@deletePost') }}"><i class="fa fa-trash-o btn-delete"></i></a>
                            </td>
                        </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
                <div class="text-center">
                    {{ $posts->appends(['sortby' => Request::get('sortby')])->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
