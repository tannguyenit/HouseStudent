@extends('layouts.admin.layout')
@section('content')
<div class="board-header board-header-4">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <div class="board-header-left">
                    <h3 class="board-title">{{ trans('admin.dashboard') }}</h3>
                </div>
                <div class="board-header-right">
                    <ol class="breadcrumb">
                        <li class="active">{{ trans('admin.dashboard') }}</li>
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
            <div class="panel-heading">{{ trans('admin.statistic') }}</div>
            <!-- Table -->
            <table class="table table-statistic">
                <tr>
                    <td class="registered col-xs-2">{{ trans('admin.register') }}</td>
                    <td class="col-xs-2">
                        <div class="widget-sales">
                            <div class="no-of-sales">{{ $users->day }}</div>
                            <div class="sales">
                                <a href="#" class="text-primary">{{ trans('admin.today') }}</a>
                            </div>
                        </div>
                    </td>
                    <td class="col-xs-2">
                        <div class="widget-sales">
                            <div class="no-of-sales">{{ $users->month }}</div>
                            <div class="sales">
                                <a href="#" class="text-primary">{{ trans('admin.month') }}</a>
                            </div>
                        </div>
                    </td>
                    <td class="col-xs-2">
                        <div class="widget-sales">
                            <div class="no-of-sales">{{ $users->year }}</div>
                            <div class="sales">
                                <a href="#" class="text-primary">{{ trans('admin.year') }}</a>
                            </div>
                        </div>
                    </td>
                    <td class="col-xs-2">
                        <div class="widget-sales">
                            <div class="no-of-sales">{{ $users->total }}</div>
                            <div class="sales">
                                <a href="#" class="text-success">{{ trans('admin.total') }}</a>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="registered col-xs-2">{{ trans('admin.type') }}</td>
                    <td class="col-xs-2">
                        <div class="widget-sales">
                            <div class="no-of-sales">{{ $type->day }}</div>
                            <div class="sales">
                                <a href="#" class="text-primary">{{ trans('admin.today') }}</a>
                            </div>
                        </div>
                    </td>
                    <td class="col-xs-2">
                        <div class="widget-sales">
                            <div class="no-of-sales">{{ $type->month }}</div>
                            <div class="sales">
                                <a href="#" class="text-primary">{{ trans('admin.month') }}</a>
                            </div>
                        </div>
                    </td>
                    <td class="col-xs-2">
                        <div class="widget-sales">
                            <div class="no-of-sales">{{ $type->year }}</div>
                            <div class="sales">
                                <a href="#" class="text-primary">{{ trans('admin.year') }}</a>
                            </div>
                        </div>
                    </td>
                    <td class="col-xs-2">
                        <div class="widget-sales">
                            <div class="no-of-sales">{{ $type->total }}</div>
                            <div class="sales">
                                <a href="#" class="text-success">{{ trans('admin.total') }}</a>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="registered col-xs-2">{{ trans('admin.status') }}</td>
                    <td class="col-xs-2">
                        <div class="widget-sales">
                            <div class="no-of-sales">{{ $status->day }}</div>
                            <div class="sales">
                                <a href="#" class="text-primary">{{ trans('admin.today') }}</a>
                            </div>
                        </div>
                    </td>
                    <td class="col-xs-2">
                        <div class="widget-sales">
                            <div class="no-of-sales">{{ $status->month }}</div>
                            <div class="sales">
                                <a href="#" class="text-primary">{{ trans('admin.month') }}</a>
                            </div>
                        </div>
                    </td>
                    <td class="col-xs-2">
                        <div class="widget-sales">
                            <div class="no-of-sales">{{ $status->year }}</div>
                            <div class="sales">
                                <a href="#" class="text-primary">{{ trans('admin.year') }}</a>
                            </div>
                        </div>
                    </td>
                    <td class="col-xs-2">
                        <div class="widget-sales">
                            <div class="no-of-sales">{{ $status->total }}</div>
                            <div class="sales">
                                <a href="#" class="text-success">{{ trans('admin.total') }}</a>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="registered col-xs-2">{{ trans('admin.post') }}</td>
                    <td class="col-xs-2">
                        <div class="widget-sales">
                            <div class="no-of-sales">{{ $posts->day }}</div>
                            <div class="sales">
                                <a href="#" class="text-primary">{{ trans('admin.today') }}</a>
                            </div>
                        </div>
                    </td>
                    <td class="col-xs-2">
                        <div class="widget-sales">
                            <div class="no-of-sales">{{ $posts->month }}</div>
                            <div class="sales">
                                <a href="#" class="text-primary">{{ trans('admin.month') }}</a>
                            </div>
                        </div>
                    </td>
                    <td class="col-xs-2">
                        <div class="widget-sales">
                            <div class="no-of-sales">{{ $posts->year }}</div>
                            <div class="sales">
                                <a href="#" class="text-primary">{{ trans('admin.year') }}</a>
                            </div>
                        </div>
                    </td>
                    <td class="col-xs-2">
                        <div class="widget-sales">
                            <div class="no-of-sales">{{ $posts->total }}</div>
                            <div class="sales">
                                <a href="#" class="text-success">{{ trans('admin.total') }}</a>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection
