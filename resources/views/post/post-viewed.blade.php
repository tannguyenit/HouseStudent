<div class="widget-top">
    <h3 class="widget-title">{{ trans('post.recently') }}</h3>
</div>
<div class="widget-body">
    @foreach ($arrViewed as $element)
        @if ($element->id != $currentPost)
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
        @endif
    @endforeach
</div>
