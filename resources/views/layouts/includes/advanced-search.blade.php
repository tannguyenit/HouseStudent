<!--start advanced search section-->
<div class="advanced-search advance-search-header houzez-adv-price-range " data-sticky='1'>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <form method="get" autocomplete="off" action="{{ action('PostController@search') }}">
                    <div class="form-group search-long">
                        <div class="search">
                            <div class="input-search input-icon">
                                <input class="form-control" type="text" value="" name="keyword" placeholder="Enter keyword...">
                                <div id="auto_complete_ajax" class="auto-complete"></div>
                            </div>
                            <select name="location" class="selectpicker" data-live-search="false" data-live-search-style="begins">
                                <option value="">All Cities</option>
                                @forelse ($countries as $element)
                                    <option data-parentstate="{{ $element->country }}" value="{{ $element->township }}">{{ $element->township }}</option>
                                @empty
                                @endforelse
                            </select>
                            <select name="area" class="selectpicker" data-live-search="false" data-live-search-style="begins">
                                <option value="">All Areas</option>
                                @forelse ($countries as $element)
                                    <option data-parentcity="{{ $element->township }}" value="{{ $element->country }}">{{ $element->country }}</option>
                                @empty
                                @endforelse
                            </select>
                            <div class="advance-btn-holder">
                                <button class="advance-btn btn" type="button"><i class="fa fa-gear"></i> Advanced</button>
                            </div>
                        </div>
                        <div class="search-btn">
                            <button class="btn btn-secondary">Go</button>
                        </div>
                    </div>
                    <div class="advance-fields">
                        <div class="row">
                            <div class="col-sm-3 col-xs-6">
                                <div class="form-group">
                                    <select class="selectpicker" id="selected_status" name="status" data-live-search="false" data-live-search-style="begins">
                                        <option value="">All Status</option>
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
                                        <option value="">All Types</option>
                                        @forelse ($types as $element)
                                            <option value="{{ $element->id }}">{{ $element->title }}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-6">
                                <div class="range-advanced-main">
                                    <div class="range-text">
                                        <input type="hidden" name="min-price" class="min-price-range-hidden range-input" readonly>
                                        <input type="hidden" name="max-price" class="max-price-range-hidden range-input" readonly>
                                        <p>
                                            <span class="range-title">Price Range:</span>
                                            From <span class="min-price-range"></span>
                                            to <span class="max-price-range"></span>
                                        </p>
                                    </div>
                                    <div class="range-wrap">
                                        <div class="price-range-advanced"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="advanced-search-mobile houzez-adv-price-range" data-sticky='0'>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <form autocomplete="off" method="get" action="{{ action('PostController@search') }}">
                    <div class="single-search-wrap">
                        <div class="single-search-inner advance-btn">
                            <button class="table-cell text-left" type="button"><i class="fa fa-gear"></i>
                            </button>
                        </div>
                        <div class="single-search-inner single-search">
                            <input type="text" class="form-control" value="" name="keyword" placeholder="Enter keyword...">
                            <div id="auto_complete_ajax" class="auto-complete"></div>
                        </div>
                        <div class="single-search-inner single-seach-btn">
                            <button class="table-cell text-right" type="submit"><i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                    <div class="advance-fields">
                        <div class="row">
                            <div class="col-sm-3 col-xs-6">
                                <div class="form-group">
                                    <select name="location" class="selectpicker" data-live-search="false" data-live-search-style="begins">
                                        <option value="">All Cities</option>
                                        @forelse ($countries as $element)
                                            <option data-parentstate="{{ $element->country }}" value="{{ $element->township }}">{{ $element->township }}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3 col-xs-6">
                                <div class="form-group">
                                    <select name="area" class="selectpicker" data-live-search="false" data-live-search-style="begins">
                                        <option value="">All Areas</option>
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
                                        <option value="">All Status</option>
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
                                        <option value="">All Types</option>
                                        @forelse ($types as $element)
                                            <option value="{{ $element->id }}">{{ $element->title }}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-xs-12">
                                <div class="range-advanced-main">
                                    <div class="range-text">
                                        <input type="hidden" name="min-price" class="min-price-range-hidden range-input">
                                        <input type="hidden" name="max-price" class="max-price-range-hidden range-input">
                                        <p>
                                            <span class="range-title">Price Range:</span>
                                            From <span class="min-price-range"></span>
                                            to <span class="max-price-range"></span>
                                        </p>
                                    </div>
                                    <div class="range-wrap">
                                        <div class="price-range-advanced"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-xs-12">
                                <button type="submit" class="btn btn-secondary btn-block houzez-theme-button">
                                    <i class="fa fa-search pull-left"></i> Search
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--end advanced search section-->
