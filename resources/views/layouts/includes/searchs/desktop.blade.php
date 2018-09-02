{{ Form::open(['action' => 'PostController@search','method' => 'GET','autocomplete' => 'off']) }}
    <div class="form-group search-long">
        <div class="search">
            <div class="input-search input-icon">
                {!! Form::text('keyword', '', ['class' => 'form-control', 'placeholder' => trans('validate.placeholder.keyword')]) !!}
                <div id="auto_complete_ajax" class="auto-complete"></div>
            </div>
            <select name="location" class="selectpicker" data-live-search="true" data-live-search-style="begins">
                <option data-parentstate="" value="">{{ trans('form.all-township') }}</option>
                @forelse ($township as $element)
                    <option data-parentstate="{{ $element->country }}" value="{{ $element->township }}">{{ $element->township }}</option>
                @empty
                @endforelse
            </select>
            <select name="area" class="selectpicker" data-live-search="true" data-live-search-style="begins">
                <option value="">{{ trans('form.all-countries') }}</option>
                @forelse ($countries as $element)
                    <option data-parentcity="{{ $element->country }}" value="{{ $element->country }}">{{ $element->country }}</option>
                @empty
                @endforelse
            </select>
            <div class="advance-btn-holder">
                <button class="advance-btn btn" type="button">
                    <i class="fa fa-gear"></i> {{ trans('form.advanced') }}
                </button>
            </div>
        </div>
        <div class="search-btn">
            <button class="btn btn-secondary">{{ trans('form.go') }}</button>
        </div>
    </div>
    <div class="advance-fields">
        <div class="row">
            <div class="col-sm-3 col-xs-6">
                <div class="form-group">
                    <select class="selectpicker" id="selected_status" name="status" data-live-search="false" data-live-search-style="begins">
                        <option value="">{{ trans('form.all-status') }}</option>
                        @forelse ($statuses as $element)
                            <option value="{{ $element->id }}">{{ $element->title }}</option>
                        @empty
                        @endforelse
                    </select>
                </div>
            </div>
            <div class="col-sm-3 col-xs-6">
                <div class="form-group">
                    <select class="selectpicker" name="type" data-live-search="false" data-live-search-style="begins">
                        <option value="">{{ trans('form.all-type') }}</option>
                        @forelse ($types as $element)
                            <option value="{{ $element->id }}">{{ $element->title }}</option>
                        @empty
                        @endforelse
                    </select>
                </div>
            </div>
            <div class="col-sm-3 col-xs-6">
                <div class="form-group">
                    <select class="selectpicker" name="bedrooms" data-live-search="false" data-live-search-style="begins">
                        <option value="">{{ trans('form.bedrooms') }}</option>
                        @for ($i = 0; $i < 10; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                </div>
            </div>
            <div class="col-sm-3 col-xs-6">
                <div class="form-group">
                    <select class="selectpicker" name="bathrooms" data-live-search="false" data-live-search-style="begins">
                        <option value="">{{ trans('form.bathrooms') }}</option>
                        @for ($i = 0; $i < 10; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                </div>
            </div>
            <div class="col-sm-3 col-xs-6">
                <div class="form-group">
                    <input type="number" class="form-control" min="0" max="100" value="" name="min-area" placeholder="{{ trans('form.placeholder.min-area') }}">
                </div>
            </div>
            <div class="col-sm-3 col-xs-6">
                <div class="form-group">
                    <input type="number" class="form-control" min="0" max="500" value="" name="max-area" placeholder="{{ trans('form.placeholder.max-area') }}">
                </div>
            </div>
            <div class="col-sm-6 col-xs-6">
                <div class="range-advanced-main">
                    <div class="range-text">
                        {!! Form::hidden('min-price', '', ['class' => 'min-price-range-hidden range-input', 'readonly' => 'readonly']) !!}
                        {!! Form::hidden('max-price', '', ['class' => 'max-price-range-hidden range-input', 'readonly' => 'readonly']) !!}
                        <p>
                            <span class="range-title">{{ trans('form.price-range') }}:</span>
                            {{ trans('form.from') }} <span class="min-price-range"></span>
                            {{ trans('form.to') }} <span class="max-price-range"></span>
                        </p>
                    </div>
                    <div class="range-wrap">
                        <div class="price-range-advanced"></div>
                    </div>
                </div>
            </div>
            <div class="hidden-input">
                {!! Form::hidden('lat', '', ['class' => 'lat-input', 'readonly' => 'readonly']) !!}
                {!! Form::hidden('lng', '', ['class' => 'lng-input', 'readonly' => 'readonly']) !!}
            </div>
            {{-- @include('layouts.includes.searchs.other-features') --}}
        </div>
    </div>
{!! Form::close() !!}
