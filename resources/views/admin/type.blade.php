@extends('layouts.admin.layout')
@section('footerscript')
@parent
<script type="text/javascript">
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    })
    $('.btn-edit').click(function () {
        var value = $(this).parents('.getData').data('title');
        var id = $(this).parents('.getData').data('id');
        var action = $(this).parent().data('action');
        $('#title_text').val(value);
        $('#_id').val(id);
        $('#update_edit_modal').attr('action', action)
    })
    $("#update_edit_modal, #create_type").validate({
        rules: {
            title: "required",
        },
        messages: {
            title: "",
        }
    });
    $('#update_edit_modal').submit(function (event) {
        event.preventDefault();
        if ($("#update_edit_modal").valid()) {
            var url = $('#update_edit_modal').attr('action');
            var id = $('#_id').val();
            var value =  $('#title_text').val();
            $.ajax({
                url: url,
                type: "POST",
                dataType: 'JSON',
                data: $('#update_edit_modal').serialize(),
                success: function(res)
                {
                    if (res.status) {
                        $('#' + id).find('.title_content').text(value);
                        $('#' + id).find('.getData').data('title', value);
                        $('.modal').modal('hide');
                        $('#title_text').val('');
                    }
                },
                error: function (res) {
                    console.log(res);
                }
            });
        }
    });
    $('.btn-delete').click(function () {
        var id = $(this).parents('.getData').data('id');
        var action = $(this).parent().data('action');
        deleteConfirm(id, action)
    })
    function deleteConfirm(id, action) {
        $('.accept_confirm').click(function () {
            $.ajax({
                url: action,
                type: "POST",
                dataType: 'JSON',
                data: {id:id},
                success: function(res)
                {
console.log(res)
                    if (res.status) {
                        $('#' + id).remove();
                        $('.modal').modal('hide');
                    }
                },
                error: function (res) {
                    console.log(res);
                }
            });
        })
    }
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
                                        <th>STT</th>
                                        <th>Name</th>
                                        <th>Total post</th>
                                        <th>Time</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($types as $key => $element)
                                    <tr id="{{ $element->id }}">
                                        <td>{{ $key + 1 }}</td>
                                        <td class="title_content">{{ $element->title }}</td>
                                        <td>{{ count($element->posts) }}</td>
                                        <td>{{ $element->created_at }}</td>
                                        <td class="getData" data-title="{!! $element->title !!}" data-id={{ $element->id }} >
                                            <a data-toggle="modal" href='.edit_modal' data-action="{{ action('Admin\AjaxController@updateType') }}"><i class="fa fa-pencil-square-o btn-edit"></i></a>
                                            <a data-toggle="modal" href='#confirm_modal' data-action="{{ action('Admin\AjaxController@deleteType') }}"><i class="fa fa-trash-o btn-delete"></i></a>
                                        </td>
                                    </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane account-profile-block" id="tab">
                        {{ Form::open(['method' => 'POST','class' => 'form-horizontal', 'id'=>'create_type']) }}
                            <div class="form-group">
                                <legend>Form title</legend>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label for="" class="col-xs-12 col-sm-2">123</label>
                                    <input type="text" name="title" value="" placeholder="" class="col-xs-12 col-sm-10 form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-10 col-sm-offset-2">
                                    <button type="submit" class="btn btn-primary">Submit</button>
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
