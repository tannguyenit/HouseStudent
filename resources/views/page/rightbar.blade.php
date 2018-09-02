<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 container-sidebar houzez_sticky">
    <div class="theiaStickySidebar">
        <aside id="sidebar" class="sidebar-white">
            <div id="nav_menu-2" class="widget widget_nav_menu widget-pages">
                <div class="widget-top">
                    <h3 class="widget-title">{{ trans('index.page-menu') }}</h3>
                </div>
                <div class="menu-pages-menu-container">
                    <ul id="menu-pages-menu" class="menu">
                        <li class="menu-item">
                            <a href="{{ action('PageController@rule') }}">{{ trans('index.rule') }}</a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ action('PageController@about') }}">{{ trans('index.about-site') }}</a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ action('PageController@faq') }}">{{ trans('index.faq') }}</a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ action('PageController@contact') }}">{{ trans('index.contact') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div id="properties_viewed" class="widget widget_houzez_properties_viewed">
            </div>
        </aside>
    </div>
</div>
