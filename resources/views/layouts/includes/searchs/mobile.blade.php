{{ Form::open(['action' => 'PostController@search','method' => 'GET','autocomplete' => 'off']) }}
    <div class="single-search-wrap">
        <div class="single-search-inner advance-btn">
            <button class="table-cell text-left" type="button">
                <i class="fa fa-gear"></i>
            </button>
        </div>
        <div class="single-search-inner single-search">
            {!! Form::text('keyword', '', ['class' => 'form-control', 'placeholder' => trans('validate.placeholder.keyword')]) !!}
            <div id="auto_complete_ajax" class="auto-complete"></div>
        </div>
        <div class="single-search-inner single-seach-btn">
            <button class="table-cell text-right" type="submit">
                <i class="fa fa-search"></i>
            </button>
        </div>
    </div>
    <div class="advance-fields">
        <div class="row">
            <div class="col-sm-3 col-xs-6">
                <div class="form-group">
                    <select name="location" class="selectpicker" data-live-search="false" data-live-search-style="begins">
                        <option value="">{{ trans('form.all-township') }}</option>
                        @forelse ($township as $element)
                            <option data-parentstate="{{ $element->country }}" value="{{ $element->township }}">{{ $element->township }}</option>
                        @empty
                        @endforelse
                    </select>
                </div>
            </div>
            <div class="col-sm-3 col-xs-6">
                <div class="form-group">
                    <select name="area" class="selectpicker" data-live-search="false" data-live-search-style="begins">
                        <option value="">{{ trans('form.all-countries') }}</option>
                        @forelse ($countries as $element)
                            <option data-parentcity="{{ $element->township }}" value="{{ $element->country }}">{{ $element->country }}</option>
                        @empty
                        @endforelse
                    </select>
                </div>
            </div>
            <div class="col-sm-3 col-xs-6">
                <div class="form-group">
                    <select class="selectpicker" id="selected_status_mobile" name="status" data-live-search="false" data-live-search-style="begins">
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
            {{-- <div class="col-sm-3 col-xs-6">
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
            </div> --}}
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
            <div class="col-sm-12 col-xs-12">
                <div class="range-advanced-main">
                    <div class="range-text">
                        {!! Form::hidden('min-price', '', ['class' => 'min-price-range-hidden range-input']) !!}
                        {!! Form::hidden('max-price', '', ['class' => 'max-price-range-hidden range-input']) !!}
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
            <div class="col-sm-12 col-xs-12">
                <button type="submit" class="btn btn-secondary btn-block houzez-theme-button">
                    <i class="fa fa-search pull-left"></i> {{ trans('form.search') }}
                </button>
            </div>
        </div>
    </div>
{!! Form::close() !!}
