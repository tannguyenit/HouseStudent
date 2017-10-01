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
            post = new Post();
            main.onClick();
            post.init();
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
                            <th>{{ trans('form.status') }}</th>
                            <th>{{ trans('form.time-update') }}</th>
                            <th>{{ trans('form.time-created') }}</th>
                            <th>{{ trans('form.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($posts as $key => $element)
                        <tr id="{{ $element->id }}">
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
                                {!! Form::checkbox('status', $element->status, $element->status == config('setting.active') ? 'checked="checked"' : '', ['class' => 'tgl tgl-ios change-status', 'id' => 'status'. $element->id]) !!}
                                {!! Form::label('status' . $element->id, ' ', ['class' => 'tgl-btn']) !!}
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
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
