<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="xmlrpc.php">
    <title>House for Student</title>
    <link rel="shortcut icon" href="/wp-content/uploads/2016/03/favicon.png">
    @section('css')
        {{ Html::style('wp-content/themes/houzez/css/bootstrap.min.css') }}
        {{ Html::style('wp-content/themes/houzez/css/font-awesome.min.css') }}
        {{ Html::style('wp-content/themes/houzez/css/toastr.min.css') }}
        {{ Html::style('wp-content/themes/houzez/css/all.min.css') }}
        {{ Html::style('wp-content/themes/houzez/css/main.css') }}
        {{ Html::style('wp-content/themes/houzez/css/style.css') }}
        {{ Html::style('wp-content/themes/houzez/css/custom.index.css') }}
        {{ Html::style('wp-content/themes/houzez/css/custom.admin.css') }}
        {{ Html::style('wp-content/themes/houzez/css/jquery.fileuploader.css') }}
        {{ Html::style('wp-content/themes/houzez/css/jquery.fileuploader-theme-thumbnails.css') }}
    @show
    @section('headerscript')
        {{ Html::script('wp-content/themes/houzez/js/jquery.min.js') }}
        {{ Html::script('wp-content/wp-includes/js/jquery/jquery-migrate.min.js') }}
    @show
</head>
<body class="home page-template page-template-template page-template-template-homepage
    page-template-templatetemplate-homepage-php page page-id-194
    transparent-no js-comp-ver-5.1.1 vc_responsive">
    @section('include')
        @include('layouts.includes.modal')
        @include('layouts.includes.header')
        @include('layouts.includes.header-mobile')
    @show
    <div id="section-body" class="landing-page">
        @include('layouts.admin.leftbar')
        <div class="user-dashboard-right dashboard-with-panel">
            @yield('content')
        </div>
    </div>
    <div class="modal fade" id="edit_modal">
        <div class="modal-dialog">
            {{ Form::open(['method' => 'POST','class' => 'form-horizontal', 'id' => 'update_edit_modal']) }}
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title text-center no-float">{{ trans('form.update-infomation') }}</h4>
                    </div>
                    <div class="modal-body">
                        {!! Form::label('title_text', trans('form.infomation')) !!}
                        {!! Form::text('title', '', ['class' => 'form-control', 'id' => 'title_text']) !!}
                        {!! Form::hidden('id', '', ['class' => 'form-control', 'id' => '_id']) !!}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('form.close') }}</button>
                        <button type="submit" class="btn btn-primary">{{ trans('form.accept') }}</button>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
    <div class="modal fade" id="confirm_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title text-center no-float">{{ trans('form.confirm') }}</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('form.close') }}</button>
                    <button type="button" class="btn btn-primary accept_confirm">{{ trans('form.accept') }}</button>
                </div>
            </div>
        </div>
    </div>
    @section('footerscript')
        {{ Html::script('wp-content/themes/houzez/js/bootstrap.min.js') }}
        {{ Html::script('wp-content/themes/houzez/js/toastr.min.js') }}
        {{ Html::script('wp-content/themes/houzez/js/sweetalert.min.js') }}
        {{ Html::script('wp-content/themes/houzez/js/custom.toastr.js') }}
        {{ Html::script('wp-content/themes/houzez/admin/js/custom.min.js') }}
        {{ Html::script('wp-content/themes/houzez/js/jquery.validate.min.js') }}
        {{ Html::script('wp-content/themes/houzez/js/plugins2846.js?ver=1.5.5') }}
        {{ Html::script('wp-content/wp-includes/js/jquery/ui/core.mine899.js?ver=1.11.4') }}
        {{ Html::script('wp-content/wp-includes/js/jquery/ui/widget.mine899.js?ver=1.11.4') }}
        {{ Html::script('wp-content/wp-includes/js/jquery/ui/position.mine899.js?ver=1.11.4') }}
        {{ Html::script('wp-content/wp-includes/js/jquery/ui/menu.mine899.js?ver=1.11.4') }}
        {{ Html::script('wp-content/wp-includes/js/wp-a11y.min66f2.js?ver=4.7.5') }}
        {{ Html::script('wp-content/wp-includes/js/jquery/ui/autocomplete.mine899.js?ver=1.11.4') }}
        {{ Html::script('wp-content/wp-includes/js/jquery/ui/mouse.mine899.js?ver=1.11.4') }}
        {{ Html::script('wp-content/wp-includes/js/jquery/jquery.ui.touch-punchc682.js?ver=0.2.2') }}
        {{ Html::script('wp-content/themes/houzez/js/custom2846.js?ver=1.5.5') }}
        {{ Html::script('wp-content/wp-includes/js/wp-embed.min66f2.js?ver=4.7.5') }}
        <script type="text/javascript">
            var VALIDATE_JS = {
                "variable" : '{!! json_encode(trans('validate')) !!}'
            }
            $(document).ready(function() {
                var type = '';
                var msg =  '';
                var title =  'Message';
                @if(Session::has('info'))
                    type = "'info";
                    msg= "{{ Session::get('info') }}";
                    toastr[type](msg, title);
                @elseif(Session::has('success'))
                    type = "success";
                    msg= "{{ Session::get('success') }}";
                    toastr[type](msg, title);
                @elseif(Session::has('warning'))
                    type = "warning";
                    msg= "{{ Session::get('warning') }}";
                    toastr[type](msg, title);
                @elseif(Session::has('error'))
                    type = "error";
                    msg= "{{ Session::get('error') }}";
                    toastr[type](msg, title);
                @endif
            });
        </script>
        @php($auth = auth()->user())
        @if ($auth->active != config('setting.active'))
        <script type="text/javascript">
            if ($.cookie('check-active') != '1' && $.cookie('check-active') != 'undefined') {
                swal({
                    title: '{{ trans('validate.warning') }}',
                    text: '{{ trans('validate.account_not_active') }}',
                    icon: "warning",
                    buttons: ["{{ trans('validate.cancel') }}", "{{ trans('validate.ok_gotit') }}"],
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.cookie("check-active", '1')
                    }
                });
            }
        </script>
        @endif
    @show
</body>
</html>
