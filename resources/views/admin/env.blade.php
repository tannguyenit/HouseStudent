@extends('layouts.admin.layout')
@section('content')
<div class="board-header board-header-4">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <div class="board-header-left">
                    <h3 class="board-title">{{ trans('admin.env') }}</h3>
                </div>
                <div class="board-header-right">
                    <ol class="breadcrumb">
                        <li class="active">{{ trans('admin.env') }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="dashboard-content-area dashboard-fix">
    <div class="container">
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">{{ trans('admin.env') }}</div>
            <!-- Table -->
            {{ Form::open(['action' => 'Admin\DashboardController@saveEnv','method' => 'POST','class' => 'form-horizontal', 'enctype'=>'multipart/form-data']) }}
                <textarea name="env" rows="30" class="col-xs-12 no-resize">{{ $env }}</textarea>
                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
