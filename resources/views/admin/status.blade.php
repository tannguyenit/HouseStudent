@extends('layouts.admin.layout')
@section('footerscript')
    @parent
    {{ Html::script('wp-content/themes/houzez/admin/js/type-status.js') }}
    {{ Html::script('wp-content/themes/houzez/admin/js/main.js') }}
    <script type="text/javascript">
        var main = new Main('{{ trans('validate.sending') }}', '{{ trans('validate.done') }}', '{{ trans('validate.accept') }}'),
            action = new ActionModal('{{ trans('validate.sending') }}', '{{ trans('validate.done') }}', '{{ trans('validate.accept') }}');
            action.init();
            main.onClick();
    </script>
@endsection
@section('content')
<div class="board-header board-header-4">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <div class="board-header-left">
                    <h3 class="board-title">{{ trans('admin.status') }}</h3>
                </div>
                <div class="board-header-right">
                    <ol class="breadcrumb">
                        <li>
                            <a itemprop="url" href="{{ action('Admin\DashboardController@dashboard') }}">
                                <span itemprop="title">{{ trans('admin.dashboard') }}</span>
                            </a>
                        </li>
                        <li class="active">{{ trans('admin.status') }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="dashboard-content-area dashboard-fix">
    <div class="container">
        <div class="row">
            <div role="tabpanel">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#list" aria-controls="list" role="tab" data-toggle="tab">{{ trans('admin.list') }}</a>
                    </li>
                    <li role="presentation">
                        <a href="#tab" aria-controls="tab" role="tab" data-toggle="tab">{{ trans('admin.create') }}</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active account-profile-block" id="list">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>{{ trans('form.stt') }}</th>
                                        <th>{{ trans('form.title') }}</th>
                                        <th>{{ trans('form.total_post') }}</th>
                                        <th>{{ trans('form.time') }}</th>
                                        <th>{{ trans('form.action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($status as $key => $element)
                                    <tr id="{{ $element->id }}">
                                        <td>{{ $key + 1 }}</td>
                                        <td class="title_content">{{ $element->title }}</td>
                                        <td>{{ count($element->posts) }}</td>
                                        <td>{{ $element->created_at }}</td>
                                        <td class="getData" data-title="{!! $element->title !!}" data-id={{ $element->id }} >
                                            <a data-toggle="modal" href='#edit_modal' data-action="{{ action('Admin\AjaxController@updateStatus') }}">
                                                <i class="fa fa-pencil-square-o btn-edit"></i>
                                            </a>
                                            <a data-toggle="modal" href='#confirm_modal' data-action="{{ action('Admin\AjaxController@deleteStatus') }}">
                                                <i class="fa fa-trash-o btn-delete"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane account-profile-block" id="tab">
                        {{ Form::open(['method' => 'POST','class' => 'form-inline', 'id'=>'create_type']) }}
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label for="" class="col-xs-12 col-sm-2">{{ trans('form.title') }}</label>
                                    <input type="text" name="title" value="" placeholder="" class="col-xs-12 col-sm-10 form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-10 col-sm-offset-2">
                                    <button type="submit" class="btn btn-primary">{{ trans('form.submit') }}</button>
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
