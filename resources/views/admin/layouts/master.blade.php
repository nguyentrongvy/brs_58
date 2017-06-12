<!DOCTYPE html>
<html lang="en">
<!--<![endif]-->
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="Admin dashboard - Tedozi CMS" name="description"/>
    <meta content="duyphan.developer@gmail.com" name="author"/>
    <title>{{ trans('lang.admin-home.admin-dashboard') }}</title>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    {{ Html::style('/pageAdmin/fonts/open-sans/font.css')  }}
    {{ Html::style('/pageAdmin/core/third_party/font-awesome/css/font-awesome.min.css')}}
    {{ Html::style('/pageAdmin/core/third_party/simple-line-icons/simple-line-icons.min.css') }}
    {{ Html::style('/pageAdmin/core/third_party/bootstrap/css/bootstrap.min.css') }}
    {{ Html::style('/pageAdmin/core/third_party/uniform/css/uniform.default.css') }}
    {{ Html::style('/pageAdmin/core/third_party/bootstrap-switch/css/bootstrap-switch.min.css') }}
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS -->
    {{ Html::style('/pageAdmin/core/third_party/bootstrap-modal/css/bootstrap-modal-bs3patch.css') }}
    {{ Html::style('/pageAdmin/core/third_party/bootstrap-modal/css/bootstrap-modal.css') }}
    {{ Html::style('/pageAdmin/core/third_party/notific8/jquery.notific8.min.css') }}
    <!-- END PAGE LEVEL PLUGINS -->

    {{ Html::style('https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css') }}
    <!-- BEGIN THEME GLOBAL STYLES -->
    {{ Html::style('/pageAdmin/theme/assets/global/css/components.min.css') }}
    {{ Html::style('/pageAdmin/theme/assets/global/css/plugins.min.css') }}
    <!-- END THEME GLOBAL STYLES -->

    <!-- BEGIN THEME LAYOUT STYLES -->
    {{ Html::style('/pageAdmin/theme/assets/layouts/layout/css/layout.min.css') }}
    {{ Html::style('/pageAdmin/theme/assets/layouts/layout/css/themes/darkblue.min.css') }}
    {{ Html::style('/pageAdmin/css/style.css') }}
    <!-- END THEME LAYOUT STYLES -->

    {{ Html::style('/images/logo/favicon.png') }}
    <!-- BEGIN CORE PLUGINS -->
    {{ Html::script('/pageAdmin/dist/core.min.js') }}
    @yield('css')
    <!-- END CORE PLUGINS -->
</head>

<body class="page-header-fixed page-container-bg-solid page-content-white on-loading {{ $bodyClass or '' }}">

<!-- Loading state -->
<div class="page-spinner-bar">
    <div class="bounce1"></div>
    <div class="bounce2"></div>
    <div class="bounce3"></div>
</div>
<!-- Loading state -->

<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
    @include('admin/_shared/_header')
</div>
<!-- END HEADER -->

<!-- BEGIN HEADER & CONTENT DIVIDER -->
<div class="clearfix"></div>
<!-- END HEADER & CONTENT DIVIDER -->

<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar-wrapper">
        @include('admin/_shared/_sidebar')
    </div>
    <!-- END SIDEBAR -->

    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN ACTUAL CONTENT -->
            @include('admin/_shared/_breadcrumb-and-page-title')

            <div class="fade-in-up">
                @yield('content')
            </div>
            <!-- END ACTUAL CONTENT -->
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
</div>
<!-- END CONTAINER -->

<!-- BEGIN FOOTER -->
<div class="page-footer">
    @include('admin/_shared/_footer')
</div>
<!-- END FOOTER -->

<!-- BEGIN THEME GLOBAL SCRIPTS -->
{{ Html::script('/pageAdmin/theme/assets/global/scripts/app.js') }}
<!-- END THEME GLOBAL SCRIPTS -->

<!-- BEGIN THEME LAYOUT SCRIPTS -->
{{ Html::script('/pageAdmin/dist/app.min.js') }}
{{ Html::script('/admin/js/dataTables.min.js') }}
<!-- JS INIT -->
@yield('js-init')

@yield('js')
<!-- JS INIT -->
</body>
</html>
