@forelse ($newsPost as $element)
    <div class="item">
        <div class="item-wrap">
            <div class="property-item item-grid">
                <div class="figure-block">
                    <figure class="item-thumb">
                        <div class="label-wrap label-right hide-on-list">
                            <span class="label label-default label-color-288">{{ $element->category->title }}</span>
                        </div>
                        <div class="price hide-on-list">
                            <span class="item-price">{{ $element->price . config('setting.price.vi') }} </span>
                        </div>
                        <a class="hover-effect" href="{{ action('PostController@show', $element->slug) }}">
                            <img width="385" height="258" src="{{ $element->firstImages->image or config('path.no-image') }}" class="attachment-houzez-property-thumb-image size-houzez-property-thumb-image wp-post-image"/>
                        </a>
                        <ul class="actions">
                            <li>
                                <span class="add_fav" data-placement="top" data-toggle="tooltip" data-original-title="{{ $element->total_like . trans('post.like') }}" data-postid="{{ $element->id }}">
                                    @forelse ($element->likes as $value)
                                        @php
                                            if (auth()->check() && $value->user_id == auth()->user()->id) {
                                                $like = '<i class="fa fa-heart" data-status="'.config('setting.no-active').'"></i>';
                                            } else {
                                                $like = '<i class="fa fa-heart-o" data-status="'.config('setting.active').'"></i>';
                                            }
                                        @endphp
                                    @empty
                                        @php
                                            $like = '<i class="fa fa-heart-o" data-status="'.config('setting.active').'"></i>';
                                        @endphp
                                    @endforelse
                                    {!! $like !!}
                                </span>
                            </li>
                            <li>
                                <span data-toggle="tooltip" data-placement="top" title="{{ $element->total_comment . trans('post.comment') }}">
                                    <i class="fa fa-comment"></i>
                                </span>
                            </li>
                            <li>
                                <span id="compare-link-361" class="compare-property" data-toggle="tooltip" data-placement="top" title="{{ count($element->images) . trans('post.photo') }}">
                                    <i class="fa fa-camera"></i>
                                </span>
                            </li>
                        </ul>
                    </figure>
                </div>
                <div class="item-body">
                    <div class="body-left">
                        <div class="info-row">
                            <h3 class="property-title">
                                <a href="{{ action('PostController@show', $element->slug) }}">{{ $element->title }}</a>
                            </h3>
                            <address class="property-address">{{ $element->address }}</address>
                            <span id="getGoogleMaps" data-lat="" data-lng=""></span>
                        </div>
                        <div class="table-list full-width info-row">
                            <div class="cell">
                                <div class="info-row amenities">
                                    <p>
                                        <span>{{ trans('post.area') . trans('post.colon') }}  {{ $element->area }}</span>
                                    </p>
                                    <p></p>
                                </div>
                            </div>
                            <div class="cell">
                                <div class="phone">
                                    <a href="{{ action('PostController@show', $element->slug) }}" class="btn btn-primary col-xs-12">
                                        {{ trans('post.detail') }} <i class="fa fa-angle-right fa-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item-foot date hide-on-list">
                <div class="item-foot-left col-xs-12 col-sm-6 no-padding">
                    <p class="prop-user-agent">
                        <i class="fa fa-user"></i>
                        <a href="{{ action('UserController@member', $element->user->username) }}">{{ $element->user->username }}</a>
                    </p>
                </div>
                <div class="item-foot-right col-xs-12 col-sm-6 no-padding">
                    <p class="prop-date text-right">
                        <i class="fa fa-calendar"></i>
                        {{ $element->created_at }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@empty
@endforelse
