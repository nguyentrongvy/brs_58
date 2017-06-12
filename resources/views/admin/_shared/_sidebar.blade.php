<div class="page-sidebar navbar-collapse collapse" id="">
    <ul class="page-sidebar-menu page-header-fixed" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
        <li class="sidebar-toggler-wrapper">
            <div class="sidebar-toggler">
            </div>
        </li>
        <li class="start  active nav-item ">
            <a class=" nav-link nav-toggle " href="" title="Dashboard"><i class="fa fa-home"></i> <span class="title">{{ trans('lang.admin-home.dashboard') }}</span><span class="selected"></span></a>
        </li>
        <li class=" menu-item-has-children  nav-item ">
            <a class=" nav-link nav-toggle " href="" title="Settings">
                <i class="fa fa-cogs"></i>
                <span class="title">{{ trans('lang.admin-home.settings') }}</span>
                <span class="selected"></span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item ">
                    <a class=" nav-link nav-toggle " href="{{ route('get.category.admin') }}" title="Menus">
                        <i class="fa fa-bars"></i>
                        <span class="title">{{ trans('lang.admin-home.menu') }}</span>
                        <span class="selected"></span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</div>
