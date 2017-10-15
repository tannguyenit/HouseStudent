<ul>
    @forelse ($data as $element)
        <li class="media" data-text="Villa with pool">
            <div class="media-left">
                <a href="{{ action('PostController@show', $element->slug) }}" class="media-object">
                    <img src="{{ $element->firstImages->image or config('path.no-image') }}" width="40" height="40">
                </a>
            </div>
            <div class="media-body">
                <a href="{{ action('PostController@show', $element->slug) }}">
                    <h4 class="media-heading">{{ $element->title }}</h4>
                    <ul class="amenities">
                        <li>{{ trans('post.area') }} : {{ $element->area }}</li>
                        <li><i>{{ $element->address }}</i></li>
                    </ul>
                </a>
            </div>
        </li>
    @empty
        <div class="result">
            <p> {{ trans('post.not-found') }} </p>
        </div>
    @endforelse
</ul>
@if (count($data))
    <div class="search-footer">
        <span class="search-count"> {{ count($data) }} {{ trans('post.find') }} </span>
        <a target="_blank" href="{{ action('PostController@search') }}?keyword={{ $keyword }}" class="search-result-view"> {{ trans('post.view-all') }} </a>
    </div>
@endif
