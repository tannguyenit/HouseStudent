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
            @if (Session::has('arrRecently'))
            <div id="houzez_properties_viewed-5" class="widget widget_houzez_properties_viewed">
                <div class="widget-top">
                    <h3 class="widget-title">{{ trans('post.recently') }}</h3>
                </div>
                <div class="widget-body">
                    @php($arrRecently = array_unique(Session::get('arrRecently')))
                    @foreach ($arrRecently as $element)
                    <div class="media">
                        <div class="media-left">
                            <figure class="item-thumb">
                                <a class="hover-effect" href="{{ action('PostController@show', $element->slug) }}">
                                    <img width="150" height="110" src="{{ $element->firstImages->image or config('path.no-image') }}" class="attachment-houzez-widget-prop size-houzez-widget-prop wp-post-image" alt="" sizes="(max-width: 150px) 100vw, 150px" />
                                </a>
                            </figure>
                        </div>
                        <div class="media-body">
                            <h3 class="media-heading">
                                <a href="{{ action('PostController@show', $element->slug) }}">{{ $element->title }}</a>
                            </h3>
                            <h4> ${{ $element->price }} {{ config('setting.price.vi') }}</h4>
                            <div class="amenities">
                                <p>{{ trans('post.area') }} {{ $element->area }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </aside>
    </div>
</div>
