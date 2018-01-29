@forelse ($country as $key => $value)
    @if ($key%2 == 0)
        @php
            if (!isset($tmp)) {
                $tmp = 0;
            }
            if ($tmp %2 ==0) {
                $class = 'col-sm-4';
            } else {
                $class = 'col-sm-8';
            }
        @endphp
    @else
        @php
            if ($tmp %2 == 0) {
                $class = 'col-sm-8';
            } else {
                $class = 'col-sm-4';
            }
            $tmp++;
        @endphp
    @endif
    <div class="{{ $class }}">
        <div class="location-block">
            <a href="{{ action('PostController@townShip', str_slug($value->township)) }}">
                <div class="location-fig-caption">
                    <h3 class="heading">{{ $value->township }}</h3>
                    <p class="sub-heading"> {{ $value->total }} {{ trans('post.properties') }} </p>
                </div>
            </a>
        </div>
    </div>
@empty
@endforelse
