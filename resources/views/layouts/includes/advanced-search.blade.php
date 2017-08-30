<!--start advanced search section-->
<div class="advanced-search advance-search-header houzez-adv-price-range " data-sticky='1'>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <form method="get" autocomplete="off" action="/houzez01.favethemes.com/advanced-search/">
                    <div class="form-group search-long">
                        <div class="search">
                            <div class="input-search input-icon">
                                <input class="form-control" type="text" value="" name="keyword" placeholder="Enter keyword...">
                                <div id="auto_complete_ajax" class="auto-complete"></div>
                            </div>
                            <select name="location" class="selectpicker" data-live-search="false" data-live-search-style="begins">
                                <option value="">All Cities</option>
                                <option data-parentstate="illinois" value="chicago"> Chicago</option>
                                <option data-parentstate="california" value="los-angeles"> Los Angeles</option>
                                <option data-parentstate="florida" value="miami"> Miami</option>
                                <option data-parentstate="new-york" value="new-york"> New York</option>
                            </select>
                            <select name="area" class="selectpicker" data-live-search="false" data-live-search-style="begins">
                                <option value="">All Areas</option>
                                <option data-parentcity="los-angeles" value="westwood"> Westwood</option>
                                <option data-parentcity="miami" value="wynwood"> Wynwood</option>
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
                                        <option value="for-rent"> For Rent</option>
                                        <option value="for-sale"> For Sale</option>
                                        <option value="foreclosures"> Foreclosures</option>
                                        <option value="new-costruction"> New Costruction</option>
                                        <option value="new-listing"> New Listing</option>
                                        <option value="open-house"> Open House</option>
                                        <option value="reduced-price"> Reduced Price</option>
                                        <option value="resale"> Resale</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3 col-xs-6">
                                <div class="form-group">
                                    <select class="selectpicker" name="type" data-live-search="false" data-live-search-style="begins">
                                        <option value="">All Types</option>
                                        <option value="apartment"> Apartment</option>
                                        <option value="condo"> Condo</option>
                                        <option value="farm"> Farm</option>
                                        <option value="loft"> Loft</option>
                                        <option value="lot"> Lot</option>
                                        <option value="multi-family-home"> Multi Family Home</option>
                                        <option value="single-family-home"> Single Family Home</option>
                                        <option value="townhouse"> Townhouse</option>
                                        <option value="villa"> Villa</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3 col-xs-6">
                                <div class="form-group">
                                    <select name="bedrooms" class="selectpicker" data-live-search="false" data-live-search-style="begins" title="">
                                        <option value="">Beds</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="any">Any</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3 col-xs-6">
                                <div class="form-group">
                                    <select name="bathrooms" class="selectpicker" data-live-search="false" data-live-search-style="begins" title="">
                                        <option value="">Baths</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="any">Any</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3 col-xs-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="" name="min-area" placeholder="Min Area (sqft)">
                                </div>
                            </div>
                            <div class="col-sm-3 col-xs-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="" name="max-area" placeholder="Max Area (sqft)">
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-6">
                                <div class="range-advanced-main">
                                    <div class="range-text">
                                        <input type="hidden" name="min-price" class="min-price-range-hidden range-input" readonly>
                                        <input type="hidden" name="max-price" class="max-price-range-hidden range-input" readonly>
                                        <p><span class="range-title">Price Range:</span> From <span class="min-price-range"></span> to <span class="max-price-range"></span>
                                        </p>
                                    </div>
                                    <div class="range-wrap">
                                        <div class="price-range-advanced"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-xs-12 features-list">
                                <label class="advance-trigger text-uppercase title"><i class="fa fa-plus-square"></i> Other Features </label>
                                <div class="clearfix"></div>
                                <div class="field-expand">
                                    <label class="checkbox-inline"><input name="feature[]" id="feature-air-conditioning" type="checkbox" value="air-conditioning">Air Conditioning</label>
                                    <label class="checkbox-inline"><input name="feature[]" id="feature-barbeque" type="checkbox" value="barbeque">Barbeque</label>
                                    <label class="checkbox-inline"><input name="feature[]" id="feature-dryer" type="checkbox" value="dryer">Dryer</label>
                                    <label class="checkbox-inline"><input name="feature[]" id="feature-gym" type="checkbox" value="gym">Gym</label>
                                    <label class="checkbox-inline"><input name="feature[]" id="feature-laundry" type="checkbox" value="laundry">Laundry</label>
                                    <label class="checkbox-inline"><input name="feature[]" id="feature-lawn" type="checkbox" value="lawn">Lawn</label>
                                    <label class="checkbox-inline"><input name="feature[]" id="feature-microwave" type="checkbox" value="microwave">Microwave</label>
                                    <label class="checkbox-inline"><input name="feature[]" id="feature-outdoor-shower" type="checkbox" value="outdoor-shower">Outdoor Shower</label>
                                    <label class="checkbox-inline"><input name="feature[]" id="feature-refrigerator" type="checkbox" value="refrigerator">Refrigerator</label>
                                    <label class="checkbox-inline"><input name="feature[]" id="feature-sauna" type="checkbox" value="sauna">Sauna</label>
                                    <label class="checkbox-inline"><input name="feature[]" id="feature-swimming-pool" type="checkbox" value="swimming-pool">Swimming Pool</label>
                                    <label class="checkbox-inline"><input name="feature[]" id="feature-tv-cable" type="checkbox" value="tv-cable">TV Cable</label>
                                    <label class="checkbox-inline"><input name="feature[]" id="feature-washer" type="checkbox" value="washer">Washer</label>
                                    <label class="checkbox-inline"><input name="feature[]" id="feature-wifi" type="checkbox" value="wifi">WiFi</label>
                                    <label class="checkbox-inline"><input name="feature[]" id="feature-window-coverings" type="checkbox" value="window-coverings">Window Coverings</label>
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
                <form autocomplete="off" method="get" action="http://houzez01.favethemes.com/advanced-search/">
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
                                        <option data-parentstate="illinois" value="chicago"> Chicago</option>
                                        <option data-parentstate="california" value="los-angeles"> Los Angeles</option>
                                        <option data-parentstate="florida" value="miami"> Miami</option>
                                        <option data-parentstate="new-york" value="new-york"> New York</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3 col-xs-6">
                                <div class="form-group">
                                    <select name="area" class="selectpicker" data-live-search="false" data-live-search-style="begins">
                                        <option value="">All Areas</option>
                                        <option data-parentcity="los-angeles" value="westwood"> Westwood</option>
                                        <option data-parentcity="miami" value="wynwood"> Wynwood</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3 col-xs-6">
                                <div class="form-group">
                                    <select class="selectpicker" id="selected_status_mobile" name="status" data-live-search="false" data-live-search-style="begins">
                                        <option value="">All Status</option>
                                        <option value="for-rent"> For Rent</option>
                                        <option value="for-sale"> For Sale</option>
                                        <option value="foreclosures"> Foreclosures</option>
                                        <option value="new-costruction"> New Costruction</option>
                                        <option value="new-listing"> New Listing</option>
                                        <option value="open-house"> Open House</option>
                                        <option value="reduced-price"> Reduced Price</option>
                                        <option value="resale"> Resale</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3 col-xs-6">
                                <div class="form-group">
                                    <select class="selectpicker" name="type" data-live-search="false" data-live-search-style="begins">
                                        <option value="">All Types</option>
                                        <option value="apartment"> Apartment</option>
                                        <option value="condo"> Condo</option>
                                        <option value="farm"> Farm</option>
                                        <option value="loft"> Loft</option>
                                        <option value="lot"> Lot</option>
                                        <option value="multi-family-home"> Multi Family Home</option>
                                        <option value="single-family-home"> Single Family Home</option>
                                        <option value="townhouse"> Townhouse</option>
                                        <option value="villa"> Villa</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3 col-xs-6">
                                <div class="form-group">
                                    <select name="bedrooms" class="selectpicker" data-live-search="false" data-live-search-style="begins" title="">
                                        <option value="">Beds</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="any">Any</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3 col-xs-6">
                                <div class="form-group">
                                    <select name="bathrooms" class="selectpicker" data-live-search="false" data-live-search-style="begins" title="">
                                        <option value="">Baths</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="any">Any</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3 col-xs-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="" name="min-area" placeholder="Min Area (sqft)">
                                </div>
                            </div>
                            <div class="col-sm-3 col-xs-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="" name="max-area" placeholder="Max Area (sqft)">
                                </div>
                            </div>
                            <div class="col-sm-12 col-xs-12">
                                <div class="range-advanced-main">
                                    <div class="range-text">
                                        <input type="hidden" name="min-price" class="min-price-range-hidden range-input">
                                        <input type="hidden" name="max-price" class="max-price-range-hidden range-input">
                                        <p><span class="range-title">Price Range:</span> From <span class="min-price-range"></span> to <span class="max-price-range"></span>
                                        </p>
                                    </div>
                                    <div class="range-wrap">
                                        <div class="price-range-advanced"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-xs-12">
                                <label class="advance-trigger"><i class="fa fa-plus-square"></i> Other Features </label>
                            </div>
                            <div class="col-sm-12 col-xs-12">
                                <div class="features-list field-expand">
                                    <div class="clearfix"></div>
                                    <label class="checkbox-inline"><input name="feature[]" id="feature-air-conditioning" type="checkbox" value="air-conditioning">Air Conditioning</label>
                                    <label class="checkbox-inline"><input name="feature[]" id="feature-barbeque" type="checkbox" value="barbeque">Barbeque</label>
                                    <label class="checkbox-inline"><input name="feature[]" id="feature-dryer" type="checkbox" value="dryer">Dryer</label>
                                    <label class="checkbox-inline"><input name="feature[]" id="feature-gym" type="checkbox" value="gym">Gym</label>
                                    <label class="checkbox-inline"><input name="feature[]" id="feature-laundry" type="checkbox" value="laundry">Laundry</label>
                                    <label class="checkbox-inline"><input name="feature[]" id="feature-lawn" type="checkbox" value="lawn">Lawn</label>
                                    <label class="checkbox-inline"><input name="feature[]" id="feature-microwave" type="checkbox" value="microwave">Microwave</label>
                                    <label class="checkbox-inline"><input name="feature[]" id="feature-outdoor-shower" type="checkbox" value="outdoor-shower">Outdoor Shower</label>
                                    <label class="checkbox-inline"><input name="feature[]" id="feature-refrigerator" type="checkbox" value="refrigerator">Refrigerator</label>
                                    <label class="checkbox-inline"><input name="feature[]" id="feature-sauna" type="checkbox" value="sauna">Sauna</label>
                                    <label class="checkbox-inline"><input name="feature[]" id="feature-swimming-pool" type="checkbox" value="swimming-pool">Swimming Pool</label>
                                    <label class="checkbox-inline"><input name="feature[]" id="feature-tv-cable" type="checkbox" value="tv-cable">TV Cable</label>
                                    <label class="checkbox-inline"><input name="feature[]" id="feature-washer" type="checkbox" value="washer">Washer</label>
                                    <label class="checkbox-inline"><input name="feature[]" id="feature-wifi" type="checkbox" value="wifi">WiFi</label>
                                    <label class="checkbox-inline"><input name="feature[]" id="feature-window-coverings" type="checkbox" value="window-coverings">Window Coverings</label>
                                </div>
                            </div>
                            <div class="col-sm-12 col-xs-12">
                                <button type="submit" class="btn btn-secondary btn-block houzez-theme-button"><i class="fa fa-search pull-left"></i> Search</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--end advanced search section-->