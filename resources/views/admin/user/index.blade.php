@extends('layouts.admin.layout')
@section('css')
    @parent
    {{ Html::style('wp-content/themes/houzez/css/toggle.min.css') }}
@endsection
@section('footerscript')
    @parent
    {{ Html::script('wp-content/themes/houzez/admin/js/sort-table.js') }}
    {{ Html::script('wp-content/themes/houzez/admin/js/main.js') }}
    {{ Html::script('wp-content/themes/houzez/admin/js/user.js') }}
    <script type="text/javascript">
        var main = new Main('{{ trans('validate.sending') }}', '{{ trans('validate.done') }}', '{{ trans('validate.accept') }}'),
            user = new User('{{ action('Admin\AjaxController@changeActiveUser') }}');
            main.onClick();
            user.init();
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
                            <th>{{ trans('form.username') }}</th>
                            <th>{{ trans('form.address') }}</th>
                            <th>{{ trans('form.post') }}</th>
                            <th>{{ trans('form.phone') }}</th>
                            <th>{{ trans('form.status') }}</th>
                            <th>{{ trans('form.time-created') }}</th>
                            <th>{{ trans('form.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $key => $element)
                        <tr id="{{ $element->id }}">
                            <td>{{ $key + 1 }}</td>
                            <td class="title_content limit-150">
                                <a href='{{ action('Admin\UserController@show', $element->username) }}' title="{{ $element->username }}"><p>{{ $element->username }}</p></a>
                            </td>
                            <td class="limit-100">
                                <p>{{ $element->address }}</p>
                            </td>
                            <td>
                                <p>{{ count($element->posts) }} {{ trans('form.post-unit') }}</p>
                            </td>
                            <td>
                                <p>{{ $element->phone }}</p>
                            </td>
                            <td class="tg-list-item">
                                {!! Form::checkbox('user', $element->active, $element->active != config('setting.no-active') ? 'checked="checked"' : '', ['class' => 'tgl tgl-ios change-active', 'id' => 'user'. $element->id]) !!}
                                {!! Form::label('user' . $element->id, ' ', ['class' => 'tgl-btn']) !!}
                            </td>
                            <td class="limit-100">
                                <p>{{ $element->created_at }}</p>
                            </td>
                            <td class="getData" data-id={{ $element->id }}>
                                <a href='{{ action('Admin\UserController@show', $element->username) }}'><i class="fa fa-pencil-square-o btn-edit"></i></a>
                                <a data-toggle="modal" href='#confirm_modal' data-action="{{ action('Admin\AjaxController@deleteUser') }}"><i class="fa fa-trash-o btn-delete"></i></a>
                            </td>
                        </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
                <div class="text-center">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
