@extends('layouts.layout')
    @section('include')
        @parent
        @include('layouts.includes.advanced-search')
    @endsection
@section('content')
    <div class="page-title breadcrumb-top">
        <div class="row">
            <div class="col-sm-12">
                <ol class="breadcrumb">
                    <li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
                        <a itemprop="url" href="http://houzez01.favethemes.com/">
                            <span itemprop="title">Home</span>
                        </a>
                    </li>
                    <li class="active">Advanced Search</li>
                </ol>
                <div class="page-title-left">
                    <h1 class="title-head">Advanced Search</h1>
                </div>
                <div class="page-title-right">
                    <div class="view hidden-xs">
                        <div class="table-cell"> <span class="view-btn btn-list active"><i class="fa fa-th-list"></i></span> <span class="view-btn btn-grid "><i class="fa fa-th-large"></i></span> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="row" style="transform: none;">
    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 list-grid-area container-contentbar">
        <div id="content-area">
            <!--start list tabs-->
            <div class="table-list full-width">
                <div class="tabs table-cell v-align-top">
                    <p>Save this Search?</p>
                </div>
                <div class="sort-tab table-cell text-right v-align-top">
                    <p> Sort by:
                        <select id="sort_properties" class="selectpicker bs-select-hidden" title="" data-live-search-style="begins" data-live-search="false">
                            <option value="">Default Order</option>
                            <option value="a_price">Price (Low to High)</option>
                            <option value="d_price">Price (High to Low)</option>
                            <option value="featured">Featured</option>
                            <option value="a_date">Date Old to New</option>
                            <option selected="" value="d_date">Date New to Old</option>
                        </select>
                    </p>
                </div>
            </div>
            <!--end list tabs-->
            <div class="list-search">
                <form method="post" action="" class="save_search_form">
                    <div class="input-level-down input-icon">
                        <input placeholder="Search Listing" class="form-control" readonly="" value="From $1,000 to $2,554,716, Area 2980 sqft to 13000 sqft">
                        <input type="hidden" name="search_args" value="YTo3OntzOjk6InBvc3RfdHlwZSI7czo4OiJwcm9wZXJ0eSI7czoxNDoicG9zdHNfcGVyX3BhZ2UiO3M6MToiOSI7czo1OiJwYWdlZCI7aTowO3M6MTE6InBvc3Rfc3RhdHVzIjtzOjc6InB1Ymxpc2giO3M6MTA6Im1ldGFfcXVlcnkiO2E6Mzp7czo4OiJyZWxhdGlvbiI7czozOiJBTkQiO2k6MDtzOjA6IiI7aToxO2E6Mjp7czo4OiJyZWxhdGlvbiI7czozOiJBTkQiO2k6MDthOjI6e2k6MDthOjQ6e3M6Mzoia2V5IjtzOjE5OiJmYXZlX3Byb3BlcnR5X3ByaWNlIjtzOjU6InZhbHVlIjthOjI6e2k6MDtkOjEwMDA7aToxO2Q6MjU1NDcxNjt9czo0OiJ0eXBlIjtzOjc6Ik5VTUVSSUMiO3M6NzoiY29tcGFyZSI7czo3OiJCRVRXRUVOIjt9aToxO2E6NDp7czozOiJrZXkiO3M6MTg6ImZhdmVfcHJvcGVydHlfc2l6ZSI7czo1OiJ2YWx1ZSI7YToyOntpOjA7aToyOTgwO2k6MTtpOjEzMDAwO31zOjQ6InR5cGUiO3M6NzoiTlVNRVJJQyI7czo3OiJjb21wYXJlIjtzOjc6IkJFVFdFRU4iO319fX1zOjc6Im9yZGVyYnkiO3M6NDoiZGF0ZSI7czo1OiJvcmRlciI7czo0OiJERVNDIjt9">
                        <input type="hidden" name="search_URI" value="/advanced-search/?keyword=&amp;location=&amp;area=&amp;bedrooms=&amp;bathrooms=&amp;type=&amp;status=&amp;min-price=%241%2C000&amp;max-price=%242%2C554%2C716&amp;min-area=2980+sqft&amp;max-area=13000+sqft">
                        <input type="hidden" name="action" value="houzez_save_search">
                        <input type="hidden" name="houzez_save_search_ajax" value="c352247c9b">
                    </div>
                    <span id="save_search_click" class="save-btn">Save</span>
                </form>
            </div>
            <!--start property items-->
            <div class="property-listing list-view">
                <div class="row">
                    <div id="ID-425" class="item-wrap infobox_trigger item-gorgeous-villa-for-sale">
                        <div class="property-item table-list">
                            <div class="table-cell">
                                <div class="figure-block">
                                    <figure class="item-thumb">
                                        <div class="label-wrap label-right hide-on-list"> <span class="label-status label-status-7 label label-default">For Sale</span> </div>
                                        <div class="price hide-on-list"><span class="item-price">$880,000.00</span><span class="item-sub-price">$6,700.00/sq ft</span>
                                        </div>
                                        <a class="hover-effect" href="http://houzez01.favethemes.com/property/gorgeous-villa-for-sale/"> <img width="385" height="258" src="http://houzez01.favethemes.com/wp-content/uploads/2016/03/los-angeles-09-385x258.jpg" class="attachment-houzez-property-thumb-image size-houzez-property-thumb-image wp-post-image" alt="" srcset="http://houzez01.favethemes.com/wp-content/uploads/2016/03/los-angeles-09-385x258.jpg 385w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/los-angeles-09-300x202.jpg 300w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/los-angeles-09-768x516.jpg 768w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/los-angeles-09-1024x688.jpg 1024w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/los-angeles-09-150x101.jpg 150w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/los-angeles-09-350x235.jpg 350w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/los-angeles-09.jpg 1170w" sizes="(max-width: 385px) 100vw, 385px"> </a>
                                        <ul class="actions">
                                            <li> <span class="add_fav" data-placement="top" data-toggle="tooltip" data-original-title="Favorite" data-propid="425"><i class="fa fa-heart-o"></i></span> </li>
                                            <li> <span data-toggle="tooltip" data-placement="top" title="" data-original-title="(7) Photos">
                                                <i class="fa fa-camera"></i>
                                            </span> </li>
                                            <li> <span id="compare-link-425" class="compare-property" data-propid="425" data-toggle="tooltip" data-placement="top" title="" data-original-title="Compare">
                                                <i class="fa fa-plus"></i>
                                            </span> </li>
                                        </ul>
                                    </figure>
                                </div>
                            </div>
                            <div class="item-body table-cell">
                                <div class="body-left table-cell">
                                    <div class="info-row">
                                        <div class="label-wrap hide-on-grid"> <span class="label-status label-status-7 label label-default">For Sale</span> </div>
                                        <h2 class="property-title"><a href="http://houzez01.favethemes.com/property/gorgeous-villa-for-sale/">Gorgeous villa for sale</a></h2><address class="property-address">E 89th St</address> </div>
                                    <div class="info-row amenities hide-on-grid">
                                        <p><span>Beds: 4</span><span>Baths: 2</span><span>Sq Ft: 5280</span>
                                        </p>
                                        <p>Villa</p>
                                    </div>
                                    <div class="info-row date hide-on-grid">
                                        <p class="prop-user-agent"><i class="fa fa-user"></i> <a href="http://houzez01.favethemes.com/agencies/luxury-house-real-estate/">Luxury House Real Estate</a> </p>
                                        <p><i class="fa fa-calendar"></i>2 years ago</p>
                                    </div>
                                </div>
                                <div class="body-right table-cell hidden-gird-cell">
                                    <div class="info-row price"><span class="item-price">$880,000.00</span><span class="item-sub-price">$6,700.00/sq ft</span>
                                    </div>
                                    <div class="info-row phone text-right"> <a href="http://houzez01.favethemes.com/property/gorgeous-villa-for-sale/" class="btn btn-primary">Details <i class="fa fa-angle-right fa-right"></i></a> </div>
                                </div>
                                <div class="table-list full-width hide-on-list">
                                    <div class="cell">
                                        <div class="info-row amenities">
                                            <p><span>Beds: 4</span><span>Baths: 2</span><span>Sq Ft: 5280</span>
                                            </p>
                                            <p>Villa</p>
                                        </div>
                                    </div>
                                    <div class="cell">
                                        <div class="phone"> <a href="http://houzez01.favethemes.com/property/gorgeous-villa-for-sale/" class="btn btn-primary"> Details <i class="fa fa-angle-right fa-right"></i></a> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item-foot date hide-on-list">
                            <div class="item-foot-left">
                                <p class="prop-user-agent"><i class="fa fa-user"></i> <a href="http://houzez01.favethemes.com/agencies/luxury-house-real-estate/">Luxury House Real Estate</a> </p>
                            </div>
                            <div class="item-foot-right">
                                <p class="prop-date"><i class="fa fa-calendar"></i>2 years ago</p>
                            </div>
                        </div>
                    </div>
                    <div id="ID-419" class="item-wrap infobox_trigger item-awesome-family-home">
                        <div class="property-item table-list">
                            <div class="table-cell">
                                <div class="figure-block">
                                    <figure class="item-thumb">
                                        <div class="label-wrap label-right hide-on-list"> <span class="label-status label-status-7 label label-default">For Sale</span> </div>
                                        <div class="price hide-on-list"><span class="item-price">$570,000.00</span><span class="item-sub-price">$2,700.00/sq ft</span>
                                        </div>
                                        <a class="hover-effect" href="http://houzez01.favethemes.com/property/luxury-family-home-3/"> <img width="385" height="258" src="http://houzez01.favethemes.com/wp-content/uploads/2016/03/los-angeles-07-385x258.jpg" class="attachment-houzez-property-thumb-image size-houzez-property-thumb-image wp-post-image" alt="" srcset="http://houzez01.favethemes.com/wp-content/uploads/2016/03/los-angeles-07-385x258.jpg 385w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/los-angeles-07-300x202.jpg 300w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/los-angeles-07-768x516.jpg 768w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/los-angeles-07-1024x688.jpg 1024w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/los-angeles-07-150x101.jpg 150w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/los-angeles-07-350x235.jpg 350w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/los-angeles-07.jpg 1170w" sizes="(max-width: 385px) 100vw, 385px"> </a>
                                        <ul class="actions">
                                            <li> <span class="add_fav" data-placement="top" data-toggle="tooltip" data-original-title="Favorite" data-propid="419"><i class="fa fa-heart-o"></i></span> </li>
                                            <li> <span data-toggle="tooltip" data-placement="top" title="" data-original-title="(7) Photos">
            <i class="fa fa-camera"></i>
        </span> </li>
                                            <li> <span id="compare-link-419" class="compare-property" data-propid="419" data-toggle="tooltip" data-placement="top" title="" data-original-title="Compare">
            <i class="fa fa-plus"></i>
        </span> </li>
                                        </ul>
                                    </figure>
                                </div>
                            </div>
                            <div class="item-body table-cell">
                                <div class="body-left table-cell">
                                    <div class="info-row">
                                        <div class="label-wrap hide-on-grid"> <span class="label-status label-status-7 label label-default">For Sale</span> </div>
                                        <h2 class="property-title"><a href="http://houzez01.favethemes.com/property/luxury-family-home-3/">Awesome family home</a></h2><address class="property-address">Miramonte Blvd</address> </div>
                                    <div class="info-row amenities hide-on-grid">
                                        <p><span>Beds: 4</span><span>Baths: 2</span><span>Sq Ft: 3400</span>
                                        </p>
                                        <p>Loft</p>
                                    </div>
                                    <div class="info-row date hide-on-grid">
                                        <p class="prop-user-agent"><i class="fa fa-user"></i> <a href="http://houzez01.favethemes.com/agencies/eco-house-real-estate/">Eco House Real Estate</a> </p>
                                        <p><i class="fa fa-calendar"></i>2 years ago</p>
                                    </div>
                                </div>
                                <div class="body-right table-cell hidden-gird-cell">
                                    <div class="info-row price"><span class="item-price">$570,000.00</span><span class="item-sub-price">$2,700.00/sq ft</span>
                                    </div>
                                    <div class="info-row phone text-right"> <a href="http://houzez01.favethemes.com/property/luxury-family-home-3/" class="btn btn-primary">Details <i class="fa fa-angle-right fa-right"></i></a> </div>
                                </div>
                                <div class="table-list full-width hide-on-list">
                                    <div class="cell">
                                        <div class="info-row amenities">
                                            <p><span>Beds: 4</span><span>Baths: 2</span><span>Sq Ft: 3400</span>
                                            </p>
                                            <p>Loft</p>
                                        </div>
                                    </div>
                                    <div class="cell">
                                        <div class="phone"> <a href="http://houzez01.favethemes.com/property/luxury-family-home-3/" class="btn btn-primary"> Details <i class="fa fa-angle-right fa-right"></i></a> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item-foot date hide-on-list">
                            <div class="item-foot-left">
                                <p class="prop-user-agent"><i class="fa fa-user"></i> <a href="http://houzez01.favethemes.com/agencies/eco-house-real-estate/">Eco House Real Estate</a> </p>
                            </div>
                            <div class="item-foot-right">
                                <p class="prop-date"><i class="fa fa-calendar"></i>2 years ago</p>
                            </div>
                        </div>
                    </div>
                    <div id="ID-412" class="item-wrap infobox_trigger item-luxury-villa-with-pool">
                        <div class="property-item table-list">
                            <div class="table-cell">
                                <div class="figure-block">
                                    <figure class="item-thumb"> <span class="label-featured label label-success">Featured</span>
                                        <div class="label-wrap label-right hide-on-list"> <span class="label-status label-status-7 label label-default">For Sale</span><span class="label label-default label-color-289">Hot Offer</span> </div>
                                        <div class="price hide-on-list"><span class="item-price">$990,000.00</span><span class="item-sub-price">$5,400.00/sq ft</span>
                                        </div>
                                        <a class="hover-effect" href="http://houzez01.favethemes.com/property/luxury-villa-with-pool/"> <img width="385" height="258" src="http://houzez01.favethemes.com/wp-content/uploads/2016/03/los-angeles-05-385x258.jpg" class="attachment-houzez-property-thumb-image size-houzez-property-thumb-image wp-post-image" alt="" srcset="http://houzez01.favethemes.com/wp-content/uploads/2016/03/los-angeles-05-385x258.jpg 385w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/los-angeles-05-300x202.jpg 300w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/los-angeles-05-768x516.jpg 768w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/los-angeles-05-1024x688.jpg 1024w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/los-angeles-05-150x101.jpg 150w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/los-angeles-05-350x235.jpg 350w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/los-angeles-05.jpg 1170w" sizes="(max-width: 385px) 100vw, 385px"> </a>
                                        <ul class="actions">
                                            <li> <span class="add_fav" data-placement="top" data-toggle="tooltip" data-original-title="Favorite" data-propid="412"><i class="fa fa-heart-o"></i></span> </li>
                                            <li> <span data-toggle="tooltip" data-placement="top" title="" data-original-title="(7) Photos">
            <i class="fa fa-camera"></i>
        </span> </li>
                                            <li> <span id="compare-link-412" class="compare-property" data-propid="412" data-toggle="tooltip" data-placement="top" title="" data-original-title="Compare">
            <i class="fa fa-plus"></i>
        </span> </li>
                                        </ul>
                                    </figure>
                                </div>
                            </div>
                            <div class="item-body table-cell">
                                <div class="body-left table-cell">
                                    <div class="info-row">
                                        <div class="label-wrap hide-on-grid"> <span class="label-status label-status-7 label label-default">For Sale</span><span class="label label-default label-color-289">Hot Offer</span> </div>
                                        <h2 class="property-title"><a href="http://houzez01.favethemes.com/property/luxury-villa-with-pool/">Luxury villa with pool</a></h2><address class="property-address">E 83rd St</address> </div>
                                    <div class="info-row amenities hide-on-grid">
                                        <p><span>Beds: 4</span><span>Bath: 1</span><span>Sq Ft: 3410</span>
                                        </p>
                                        <p>Villa</p>
                                    </div>
                                    <div class="info-row date hide-on-grid">
                                        <p class="prop-user-agent"><i class="fa fa-user"></i> <a href="http://houzez01.favethemes.com/agencies/eco-house-real-estate/">Eco House Real Estate</a> </p>
                                        <p><i class="fa fa-calendar"></i>2 years ago</p>
                                    </div>
                                </div>
                                <div class="body-right table-cell hidden-gird-cell">
                                    <div class="info-row price"><span class="item-price">$990,000.00</span><span class="item-sub-price">$5,400.00/sq ft</span>
                                    </div>
                                    <div class="info-row phone text-right"> <a href="http://houzez01.favethemes.com/property/luxury-villa-with-pool/" class="btn btn-primary">Details <i class="fa fa-angle-right fa-right"></i></a> </div>
                                </div>
                                <div class="table-list full-width hide-on-list">
                                    <div class="cell">
                                        <div class="info-row amenities">
                                            <p><span>Beds: 4</span><span>Bath: 1</span><span>Sq Ft: 3410</span>
                                            </p>
                                            <p>Villa</p>
                                        </div>
                                    </div>
                                    <div class="cell">
                                        <div class="phone"> <a href="http://houzez01.favethemes.com/property/luxury-villa-with-pool/" class="btn btn-primary"> Details <i class="fa fa-angle-right fa-right"></i></a> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item-foot date hide-on-list">
                            <div class="item-foot-left">
                                <p class="prop-user-agent"><i class="fa fa-user"></i> <a href="http://houzez01.favethemes.com/agencies/eco-house-real-estate/">Eco House Real Estate</a> </p>
                            </div>
                            <div class="item-foot-right">
                                <p class="prop-date"><i class="fa fa-calendar"></i>2 years ago</p>
                            </div>
                        </div>
                    </div>
                    <div id="ID-395" class="item-wrap infobox_trigger item-penthouse-apartment">
                        <div class="property-item table-list">
                            <div class="table-cell">
                                <div class="figure-block">
                                    <figure class="item-thumb"> <span class="label-featured label label-success">Featured</span>
                                        <div class="label-wrap label-right hide-on-list"> <span class="label-status label-status-8 label label-default">For Rent</span><span class="label label-default label-color-289">Hot Offer</span> </div>
                                        <div class="price hide-on-list"><span class="item-price">$9,000.00/mo</span>
                                        </div>
                                        <a class="hover-effect" href="http://houzez01.favethemes.com/property/penthouse-apartment-2/"> <img width="385" height="258" src="http://houzez01.favethemes.com/wp-content/uploads/2016/03/los-angeles-01-385x258.jpg" class="attachment-houzez-property-thumb-image size-houzez-property-thumb-image wp-post-image" alt="" srcset="http://houzez01.favethemes.com/wp-content/uploads/2016/03/los-angeles-01-385x258.jpg 385w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/los-angeles-01-300x202.jpg 300w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/los-angeles-01-768x516.jpg 768w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/los-angeles-01-1024x688.jpg 1024w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/los-angeles-01-150x101.jpg 150w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/los-angeles-01-350x235.jpg 350w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/los-angeles-01.jpg 1170w" sizes="(max-width: 385px) 100vw, 385px"> </a>
                                        <ul class="actions">
                                            <li> <span class="add_fav" data-placement="top" data-toggle="tooltip" data-original-title="Favorite" data-propid="395"><i class="fa fa-heart-o"></i></span> </li>
                                            <li> <span data-toggle="tooltip" data-placement="top" title="" data-original-title="(7) Photos">
            <i class="fa fa-camera"></i>
        </span> </li>
                                            <li> <span id="compare-link-395" class="compare-property" data-propid="395" data-toggle="tooltip" data-placement="top" title="" data-original-title="Compare">
            <i class="fa fa-plus"></i>
        </span> </li>
                                        </ul>
                                    </figure>
                                </div>
                            </div>
                            <div class="item-body table-cell">
                                <div class="body-left table-cell">
                                    <div class="info-row">
                                        <div class="label-wrap hide-on-grid"> <span class="label-status label-status-8 label label-default">For Rent</span><span class="label label-default label-color-289">Hot Offer</span> </div>
                                        <h2 class="property-title"><a href="http://houzez01.favethemes.com/property/penthouse-apartment-2/">Penthouse apartment</a></h2><address class="property-address">W 76th St</address> </div>
                                    <div class="info-row amenities hide-on-grid">
                                        <p><span>Beds: 4</span><span>Baths: 3</span><span>Sq Ft: 3100</span>
                                        </p>
                                        <p>Apartment</p>
                                    </div>
                                    <div class="info-row date hide-on-grid">
                                        <p class="prop-user-agent"><i class="fa fa-user"></i> <a href="http://houzez01.favethemes.com/agencies/country-house-real-estate/">Country House Real Estate</a> </p>
                                        <p><i class="fa fa-calendar"></i>2 years ago</p>
                                    </div>
                                </div>
                                <div class="body-right table-cell hidden-gird-cell">
                                    <div class="info-row price"><span class="item-price">$9,000.00/mo</span>
                                    </div>
                                    <div class="info-row phone text-right"> <a href="http://houzez01.favethemes.com/property/penthouse-apartment-2/" class="btn btn-primary">Details <i class="fa fa-angle-right fa-right"></i></a> </div>
                                </div>
                                <div class="table-list full-width hide-on-list">
                                    <div class="cell">
                                        <div class="info-row amenities">
                                            <p><span>Beds: 4</span><span>Baths: 3</span><span>Sq Ft: 3100</span>
                                            </p>
                                            <p>Apartment</p>
                                        </div>
                                    </div>
                                    <div class="cell">
                                        <div class="phone"> <a href="http://houzez01.favethemes.com/property/penthouse-apartment-2/" class="btn btn-primary"> Details <i class="fa fa-angle-right fa-right"></i></a> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item-foot date hide-on-list">
                            <div class="item-foot-left">
                                <p class="prop-user-agent"><i class="fa fa-user"></i> <a href="http://houzez01.favethemes.com/agencies/country-house-real-estate/">Country House Real Estate</a> </p>
                            </div>
                            <div class="item-foot-right">
                                <p class="prop-date"><i class="fa fa-calendar"></i>2 years ago</p>
                            </div>
                        </div>
                    </div>
                    <div id="ID-383" class="item-wrap infobox_trigger item-family-home">
                        <div class="property-item table-list">
                            <div class="table-cell">
                                <div class="figure-block">
                                    <figure class="item-thumb">
                                        <div class="label-wrap label-right hide-on-list"> <span class="label-status label-status-8 label label-default">For Rent</span> </div>
                                        <div class="price hide-on-list"><span class="item-price">$11,500.00/mo</span>
                                        </div>
                                        <a class="hover-effect" href="http://houzez01.favethemes.com/property/family-home/"> <img width="385" height="258" src="http://houzez01.favethemes.com/wp-content/uploads/2016/03/chicago-14-385x258.jpg" class="attachment-houzez-property-thumb-image size-houzez-property-thumb-image wp-post-image" alt="" srcset="http://houzez01.favethemes.com/wp-content/uploads/2016/03/chicago-14-385x258.jpg 385w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/chicago-14-300x202.jpg 300w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/chicago-14-768x516.jpg 768w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/chicago-14-1024x688.jpg 1024w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/chicago-14-150x101.jpg 150w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/chicago-14-350x235.jpg 350w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/chicago-14.jpg 1170w" sizes="(max-width: 385px) 100vw, 385px"> </a>
                                        <ul class="actions">
                                            <li> <span class="add_fav" data-placement="top" data-toggle="tooltip" data-original-title="Favorite" data-propid="383"><i class="fa fa-heart-o"></i></span> </li>
                                            <li> <span data-toggle="tooltip" data-placement="top" title="" data-original-title="(7) Photos">
            <i class="fa fa-camera"></i>
        </span> </li>
                                            <li> <span id="compare-link-383" class="compare-property" data-propid="383" data-toggle="tooltip" data-placement="top" title="" data-original-title="Compare">
            <i class="fa fa-plus"></i>
        </span> </li>
                                        </ul>
                                    </figure>
                                </div>
                            </div>
                            <div class="item-body table-cell">
                                <div class="body-left table-cell">
                                    <div class="info-row">
                                        <div class="label-wrap hide-on-grid"> <span class="label-status label-status-8 label label-default">For Rent</span> </div>
                                        <h2 class="property-title"><a href="http://houzez01.favethemes.com/property/family-home/">Family home</a></h2><address class="property-address">S Crandon Ave</address> </div>
                                    <div class="info-row amenities hide-on-grid">
                                        <p><span>Beds: 4</span><span>Baths: 2</span><span>Sq Ft: 4300</span>
                                        </p>
                                        <p>Single Family Home</p>
                                    </div>
                                    <div class="info-row date hide-on-grid">
                                        <p class="prop-user-agent"><i class="fa fa-user"></i> <a href="http://houzez01.favethemes.com/agencies/modern-house-real-estate-2/">Modern House Real Estate</a> </p>
                                        <p><i class="fa fa-calendar"></i>2 years ago</p>
                                    </div>
                                </div>
                                <div class="body-right table-cell hidden-gird-cell">
                                    <div class="info-row price"><span class="item-price">$11,500.00/mo</span>
                                    </div>
                                    <div class="info-row phone text-right"> <a href="http://houzez01.favethemes.com/property/family-home/" class="btn btn-primary">Details <i class="fa fa-angle-right fa-right"></i></a> </div>
                                </div>
                                <div class="table-list full-width hide-on-list">
                                    <div class="cell">
                                        <div class="info-row amenities">
                                            <p><span>Beds: 4</span><span>Baths: 2</span><span>Sq Ft: 4300</span>
                                            </p>
                                            <p>Single Family Home</p>
                                        </div>
                                    </div>
                                    <div class="cell">
                                        <div class="phone"> <a href="http://houzez01.favethemes.com/property/family-home/" class="btn btn-primary"> Details <i class="fa fa-angle-right fa-right"></i></a> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item-foot date hide-on-list">
                            <div class="item-foot-left">
                                <p class="prop-user-agent"><i class="fa fa-user"></i> <a href="http://houzez01.favethemes.com/agencies/modern-house-real-estate-2/">Modern House Real Estate</a> </p>
                            </div>
                            <div class="item-foot-right">
                                <p class="prop-date"><i class="fa fa-calendar"></i>2 years ago</p>
                            </div>
                        </div>
                    </div>
                    <div id="ID-376" class="item-wrap infobox_trigger item-gorgeous-apartment-bay-front">
                        <div class="property-item table-list">
                            <div class="table-cell">
                                <div class="figure-block">
                                    <figure class="item-thumb">
                                        <div class="label-wrap label-right hide-on-list"> <span class="label-status label-status-8 label label-default">For Rent</span> </div>
                                        <div class="price hide-on-list"><span class="item-price">$12,000.00/mo</span>
                                        </div>
                                        <a class="hover-effect" href="http://houzez01.favethemes.com/property/gorgeous-apartment-bay-front/"> <img width="385" height="258" src="http://houzez01.favethemes.com/wp-content/uploads/2016/03/chicago-12-385x258.jpg" class="attachment-houzez-property-thumb-image size-houzez-property-thumb-image wp-post-image" alt="" srcset="http://houzez01.favethemes.com/wp-content/uploads/2016/03/chicago-12-385x258.jpg 385w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/chicago-12-300x202.jpg 300w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/chicago-12-768x516.jpg 768w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/chicago-12-1024x688.jpg 1024w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/chicago-12-150x101.jpg 150w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/chicago-12-350x235.jpg 350w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/chicago-12.jpg 1170w" sizes="(max-width: 385px) 100vw, 385px"> </a>
                                        <ul class="actions">
                                            <li> <span class="add_fav" data-placement="top" data-toggle="tooltip" data-original-title="Favorite" data-propid="376"><i class="fa fa-heart-o"></i></span> </li>
                                            <li> <span data-toggle="tooltip" data-placement="top" title="" data-original-title="(7) Photos">
            <i class="fa fa-camera"></i>
        </span> </li>
                                            <li> <span id="compare-link-376" class="compare-property" data-propid="376" data-toggle="tooltip" data-placement="top" title="" data-original-title="Compare">
            <i class="fa fa-plus"></i>
        </span> </li>
                                        </ul>
                                    </figure>
                                </div>
                            </div>
                            <div class="item-body table-cell">
                                <div class="body-left table-cell">
                                    <div class="info-row">
                                        <div class="label-wrap hide-on-grid"> <span class="label-status label-status-8 label label-default">For Rent</span> </div>
                                        <h2 class="property-title"><a href="http://houzez01.favethemes.com/property/gorgeous-apartment-bay-front/">Gorgeous apartment bay front</a></h2><address class="property-address">E 76th St</address> </div>
                                    <div class="info-row amenities hide-on-grid">
                                        <p><span>Beds: 2</span><span>Bath: 1</span><span>Sq Ft: 3780</span>
                                        </p>
                                        <p>Apartment</p>
                                    </div>
                                    <div class="info-row date hide-on-grid">
                                        <p class="prop-user-agent"><i class="fa fa-user"></i> <a href="http://houzez01.favethemes.com/agent/brittany-watkins/">Brittany Watkins</a> </p>
                                        <p><i class="fa fa-calendar"></i>2 years ago</p>
                                    </div>
                                </div>
                                <div class="body-right table-cell hidden-gird-cell">
                                    <div class="info-row price"><span class="item-price">$12,000.00/mo</span>
                                    </div>
                                    <div class="info-row phone text-right"> <a href="http://houzez01.favethemes.com/property/gorgeous-apartment-bay-front/" class="btn btn-primary">Details <i class="fa fa-angle-right fa-right"></i></a> </div>
                                </div>
                                <div class="table-list full-width hide-on-list">
                                    <div class="cell">
                                        <div class="info-row amenities">
                                            <p><span>Beds: 2</span><span>Bath: 1</span><span>Sq Ft: 3780</span>
                                            </p>
                                            <p>Apartment</p>
                                        </div>
                                    </div>
                                    <div class="cell">
                                        <div class="phone"> <a href="http://houzez01.favethemes.com/property/gorgeous-apartment-bay-front/" class="btn btn-primary"> Details <i class="fa fa-angle-right fa-right"></i></a> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item-foot date hide-on-list">
                            <div class="item-foot-left">
                                <p class="prop-user-agent"><i class="fa fa-user"></i> <a href="http://houzez01.favethemes.com/agent/brittany-watkins/">Brittany Watkins</a> </p>
                            </div>
                            <div class="item-foot-right">
                                <p class="prop-date"><i class="fa fa-calendar"></i>2 years ago</p>
                            </div>
                        </div>
                    </div>
                    <div id="ID-368" class="item-wrap infobox_trigger item-gorgeous-villa">
                        <div class="property-item table-list">
                            <div class="table-cell">
                                <div class="figure-block">
                                    <figure class="item-thumb">
                                        <div class="label-wrap label-right hide-on-list"> <span class="label-status label-status-8 label label-default">For Rent</span> </div>
                                        <div class="price hide-on-list"><span class="item-price">$25,000.00/mo</span>
                                        </div>
                                        <a class="hover-effect" href="http://houzez01.favethemes.com/property/gorgeous-villa/"> <img width="385" height="258" src="http://houzez01.favethemes.com/wp-content/uploads/2016/03/chicago-10-385x258.jpg" class="attachment-houzez-property-thumb-image size-houzez-property-thumb-image wp-post-image" alt="" srcset="http://houzez01.favethemes.com/wp-content/uploads/2016/03/chicago-10-385x258.jpg 385w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/chicago-10-300x202.jpg 300w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/chicago-10-768x516.jpg 768w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/chicago-10-1024x688.jpg 1024w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/chicago-10-150x101.jpg 150w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/chicago-10-350x235.jpg 350w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/chicago-10.jpg 1170w" sizes="(max-width: 385px) 100vw, 385px"> </a>
                                        <ul class="actions">
                                            <li> <span class="add_fav" data-placement="top" data-toggle="tooltip" data-original-title="Favorite" data-propid="368"><i class="fa fa-heart-o"></i></span> </li>
                                            <li> <span data-toggle="tooltip" data-placement="top" title="" data-original-title="(7) Photos">
            <i class="fa fa-camera"></i>
        </span> </li>
                                            <li> <span id="compare-link-368" class="compare-property" data-propid="368" data-toggle="tooltip" data-placement="top" title="" data-original-title="Compare">
            <i class="fa fa-plus"></i>
        </span> </li>
                                        </ul>
                                    </figure>
                                </div>
                            </div>
                            <div class="item-body table-cell">
                                <div class="body-left table-cell">
                                    <div class="info-row">
                                        <div class="label-wrap hide-on-grid"> <span class="label-status label-status-8 label label-default">For Rent</span> </div>
                                        <h2 class="property-title"><a href="http://houzez01.favethemes.com/property/gorgeous-villa/">Gorgeous villa</a></h2><address class="property-address">S Princeton Ave</address> </div>
                                    <div class="info-row amenities hide-on-grid">
                                        <p><span>Beds: 6</span><span>Baths: 3</span><span>Sq Ft: 4300</span>
                                        </p>
                                        <p>Villa</p>
                                    </div>
                                    <div class="info-row date hide-on-grid">
                                        <p class="prop-user-agent"><i class="fa fa-user"></i> <a href="http://houzez01.favethemes.com/agent/brittany-watkins/">Brittany Watkins</a> </p>
                                        <p><i class="fa fa-calendar"></i>2 years ago</p>
                                    </div>
                                </div>
                                <div class="body-right table-cell hidden-gird-cell">
                                    <div class="info-row price"><span class="item-price">$25,000.00/mo</span>
                                    </div>
                                    <div class="info-row phone text-right"> <a href="http://houzez01.favethemes.com/property/gorgeous-villa/" class="btn btn-primary">Details <i class="fa fa-angle-right fa-right"></i></a> </div>
                                </div>
                                <div class="table-list full-width hide-on-list">
                                    <div class="cell">
                                        <div class="info-row amenities">
                                            <p><span>Beds: 6</span><span>Baths: 3</span><span>Sq Ft: 4300</span>
                                            </p>
                                            <p>Villa</p>
                                        </div>
                                    </div>
                                    <div class="cell">
                                        <div class="phone"> <a href="http://houzez01.favethemes.com/property/gorgeous-villa/" class="btn btn-primary"> Details <i class="fa fa-angle-right fa-right"></i></a> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item-foot date hide-on-list">
                            <div class="item-foot-left">
                                <p class="prop-user-agent"><i class="fa fa-user"></i> <a href="http://houzez01.favethemes.com/agent/brittany-watkins/">Brittany Watkins</a> </p>
                            </div>
                            <div class="item-foot-right">
                                <p class="prop-date"><i class="fa fa-calendar"></i>2 years ago</p>
                            </div>
                        </div>
                    </div>
                    <div id="ID-350" class="item-wrap infobox_trigger item-luxury-family-home">
                        <div class="property-item table-list">
                            <div class="table-cell">
                                <div class="figure-block">
                                    <figure class="item-thumb">
                                        <div class="label-wrap label-right hide-on-list"> <span class="label-status label-status-7 label label-default">For Sale</span> </div>
                                        <div class="price hide-on-list"><span class="item-price">$870,000.00</span><span class="item-sub-price">$8,500.00/sq ft</span>
                                        </div>
                                        <a class="hover-effect" href="http://houzez01.favethemes.com/property/luxury-family-home/"> <img width="385" height="258" src="http://houzez01.favethemes.com/wp-content/uploads/2016/03/chicago-02-385x258.jpg" class="attachment-houzez-property-thumb-image size-houzez-property-thumb-image wp-post-image" alt="" srcset="http://houzez01.favethemes.com/wp-content/uploads/2016/03/chicago-02-385x258.jpg 385w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/chicago-02-300x202.jpg 300w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/chicago-02-768x516.jpg 768w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/chicago-02-1024x688.jpg 1024w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/chicago-02-150x101.jpg 150w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/chicago-02-350x235.jpg 350w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/chicago-02.jpg 1170w" sizes="(max-width: 385px) 100vw, 385px"> </a>
                                        <ul class="actions">
                                            <li> <span class="add_fav" data-placement="top" data-toggle="tooltip" data-original-title="Favorite" data-propid="350"><i class="fa fa-heart-o"></i></span> </li>
                                            <li> <span data-toggle="tooltip" data-placement="top" title="" data-original-title="(7) Photos">
            <i class="fa fa-camera"></i>
        </span> </li>
                                            <li> <span id="compare-link-350" class="compare-property" data-propid="350" data-toggle="tooltip" data-placement="top" title="" data-original-title="Compare">
            <i class="fa fa-plus"></i>
        </span> </li>
                                        </ul>
                                    </figure>
                                </div>
                            </div>
                            <div class="item-body table-cell">
                                <div class="body-left table-cell">
                                    <div class="info-row">
                                        <div class="label-wrap hide-on-grid"> <span class="label-status label-status-7 label label-default">For Sale</span> </div>
                                        <h2 class="property-title"><a href="http://houzez01.favethemes.com/property/luxury-family-home/">Luxury family home</a></h2><address class="property-address">S California Ave</address> </div>
                                    <div class="info-row amenities hide-on-grid">
                                        <p><span>Beds: 5</span><span>Baths: 3</span><span>Sq Ft: 3170</span>
                                        </p>
                                        <p>Single Family Home</p>
                                    </div>
                                    <div class="info-row date hide-on-grid">
                                        <p class="prop-user-agent"><i class="fa fa-user"></i> <a href="http://houzez01.favethemes.com/agent/brittany-watkins/">Brittany Watkins</a> </p>
                                        <p><i class="fa fa-calendar"></i>2 years ago</p>
                                    </div>
                                </div>
                                <div class="body-right table-cell hidden-gird-cell">
                                    <div class="info-row price"><span class="item-price">$870,000.00</span><span class="item-sub-price">$8,500.00/sq ft</span>
                                    </div>
                                    <div class="info-row phone text-right"> <a href="http://houzez01.favethemes.com/property/luxury-family-home/" class="btn btn-primary">Details <i class="fa fa-angle-right fa-right"></i></a> </div>
                                </div>
                                <div class="table-list full-width hide-on-list">
                                    <div class="cell">
                                        <div class="info-row amenities">
                                            <p><span>Beds: 5</span><span>Baths: 3</span><span>Sq Ft: 3170</span>
                                            </p>
                                            <p>Single Family Home</p>
                                        </div>
                                    </div>
                                    <div class="cell">
                                        <div class="phone"> <a href="http://houzez01.favethemes.com/property/luxury-family-home/" class="btn btn-primary"> Details <i class="fa fa-angle-right fa-right"></i></a> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item-foot date hide-on-list">
                            <div class="item-foot-left">
                                <p class="prop-user-agent"><i class="fa fa-user"></i> <a href="http://houzez01.favethemes.com/agent/brittany-watkins/">Brittany Watkins</a> </p>
                            </div>
                            <div class="item-foot-right">
                                <p class="prop-date"><i class="fa fa-calendar"></i>2 years ago</p>
                            </div>
                        </div>
                    </div>
                    <div id="ID-300" class="item-wrap infobox_trigger item-design-place-apartment">
                        <div class="property-item table-list">
                            <div class="table-cell">
                                <div class="figure-block">
                                    <figure class="item-thumb"> <span class="label-featured label label-success">Featured</span>
                                        <div class="label-wrap label-right hide-on-list"> <span class="label-status label-status-7 label label-default">For Sale</span> </div>
                                        <div class="price hide-on-list"><span class="item-price">$967,000.00</span><span class="item-sub-price">$9,800.00/sq ft</span>
                                        </div>
                                        <a class="hover-effect" href="http://houzez01.favethemes.com/property/design-place-apartment/"> <img width="385" height="258" src="http://houzez01.favethemes.com/wp-content/uploads/2016/03/new-york-10-385x258.jpg" class="attachment-houzez-property-thumb-image size-houzez-property-thumb-image wp-post-image" alt="" srcset="http://houzez01.favethemes.com/wp-content/uploads/2016/03/new-york-10-385x258.jpg 385w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/new-york-10-300x202.jpg 300w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/new-york-10-768x516.jpg 768w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/new-york-10-1024x688.jpg 1024w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/new-york-10-150x101.jpg 150w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/new-york-10-350x235.jpg 350w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/new-york-10.jpg 1170w" sizes="(max-width: 385px) 100vw, 385px"> </a>
                                        <ul class="actions">
                                            <li> <span class="add_fav" data-placement="top" data-toggle="tooltip" data-original-title="Favorite" data-propid="300"><i class="fa fa-heart-o"></i></span> </li>
                                            <li> <span data-toggle="tooltip" data-placement="top" title="" data-original-title="(7) Photos">
            <i class="fa fa-camera"></i>
        </span> </li>
                                            <li> <span id="compare-link-300" class="compare-property" data-propid="300" data-toggle="tooltip" data-placement="top" title="" data-original-title="Compare">
            <i class="fa fa-plus"></i>
        </span> </li>
                                        </ul>
                                    </figure>
                                </div>
                            </div>
                            <div class="item-body table-cell">
                                <div class="body-left table-cell">
                                    <div class="info-row">
                                        <div class="label-wrap hide-on-grid"> <span class="label-status label-status-7 label label-default">For Sale</span> </div>
                                        <h2 class="property-title"><a href="http://houzez01.favethemes.com/property/design-place-apartment/">Design place apartment</a></h2><address class="property-address">Sackett St, Brooklyn, NY 07304, USA</address> </div>
                                    <div class="info-row amenities hide-on-grid">
                                        <p><span>Beds: 5</span><span>Baths: 3</span><span>Sq Ft: 3890</span>
                                        </p>
                                        <p>Apartment</p>
                                    </div>
                                    <div class="info-row date hide-on-grid">
                                        <p class="prop-user-agent"><i class="fa fa-user"></i> <a href="http://houzez01.favethemes.com/agent/samuel-palmer/">Samuel Palmer</a> </p>
                                        <p><i class="fa fa-calendar"></i>2 years ago</p>
                                    </div>
                                </div>
                                <div class="body-right table-cell hidden-gird-cell">
                                    <div class="info-row price"><span class="item-price">$967,000.00</span><span class="item-sub-price">$9,800.00/sq ft</span>
                                    </div>
                                    <div class="info-row phone text-right"> <a href="http://houzez01.favethemes.com/property/design-place-apartment/" class="btn btn-primary">Details <i class="fa fa-angle-right fa-right"></i></a> </div>
                                </div>
                                <div class="table-list full-width hide-on-list">
                                    <div class="cell">
                                        <div class="info-row amenities">
                                            <p><span>Beds: 5</span><span>Baths: 3</span><span>Sq Ft: 3890</span>
                                            </p>
                                            <p>Apartment</p>
                                        </div>
                                    </div>
                                    <div class="cell">
                                        <div class="phone"> <a href="http://houzez01.favethemes.com/property/design-place-apartment/" class="btn btn-primary"> Details <i class="fa fa-angle-right fa-right"></i></a> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item-foot date hide-on-list">
                            <div class="item-foot-left">
                                <p class="prop-user-agent"><i class="fa fa-user"></i> <a href="http://houzez01.favethemes.com/agent/samuel-palmer/">Samuel Palmer</a> </p>
                            </div>
                            <div class="item-foot-right">
                                <p class="prop-date"><i class="fa fa-calendar"></i>2 years ago</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end property items-->
            <hr>
            <!--start Pagination-->
            <div class="pagination-main ">
                <ul class="pagination">
                    <li class="disabled"><a aria-label="Previous"><span aria-hidden="true"><i class="fa fa-angle-left"></i></span></a>
                    </li>
                    <li class="active"><a data-houzepagi="1" href="http://houzez01.favethemes.com/advanced-search/?keyword&amp;location&amp;area&amp;bedrooms&amp;bathrooms&amp;type&amp;status&amp;min-price=%241%2C000&amp;max-price=%242%2C554%2C716&amp;min-area=2980+sqft&amp;max-area=13000+sqft">1 <span class="sr-only"></span></a>
                    </li>
                    <li><a data-houzepagi="2" href="http://houzez01.favethemes.com/advanced-search/page/2/?keyword&amp;location&amp;area&amp;bedrooms&amp;bathrooms&amp;type&amp;status&amp;min-price=%241%2C000&amp;max-price=%242%2C554%2C716&amp;min-area=2980+sqft&amp;max-area=13000+sqft">2</a>
                    </li>
                    <li><a data-houzepagi="2" rel="Next" href="http://houzez01.favethemes.com/advanced-search/page/2/?keyword&amp;location&amp;area&amp;bedrooms&amp;bathrooms&amp;type&amp;status&amp;min-price=%241%2C000&amp;max-price=%242%2C554%2C716&amp;min-area=2980+sqft&amp;max-area=13000+sqft"><span aria-hidden="true"><i class="fa fa-angle-right"></i></span></a>
                    </li>
                </ul>
            </div>
            <!--start Pagination-->
        </div>
    </div>
    <!-- end container-content -->
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 col-md-offset-0 col-sm-offset-3 container-sidebar houzez_sticky" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
        <div class="theiaStickySidebar">
            <aside id="sidebar" class="sidebar-white">
                <div id="houzez_advanced_search-9" class="widget widget_houzez_advanced_search">
                    <div class="widget-top">
                        <h3 class="widget-title">Find Your Home</h3>
                    </div>
                    <div class="widget-range">
                        <div class="widget-body">
                            <form autocomplete="off" method="get" action="{{ action('PostController@search') }}">
                                <div class="range-block rang-form-block">
                                    <div class="row">
                                        <div class="col-sm-12 col-xs-12 keyword_search">
                                            <div class="form-group">
                                                <input type="text" class="houzez_geocomplete form-control" value="" name="keyword" placeholder="Enter keyword...">
                                                <div id="auto_complete_ajax" class="auto-complete"></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <select name="location" class="selectpicker bs-select-hidden" data-live-search="true">
                                                    <option value="">All Cities</option>
                                                    @forelse ($countries as $element)
                                                        <option data-parentstate="{{ $element->country }}" value="{{ $element->township }}">{{ $element->township }}</option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <select name="area" class="selectpicker bs-select-hidden" data-live-search="true">
                                                    <option value="">All Areas</option>
                                                    @forelse ($countries as $element)
                                                        <option data-parentcity="{{ $element->township }}" value="{{ $element->country }}">{{ $element->country }}</option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <select name="type" class="selectpicker bs-select-hidden" data-live-search="false">
                                                    <option value="">All Types</option>
                                                    @forelse ($types as $element)
                                                    <option value="{{ $element->id }}">{{ $element->title }}</option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <select class="selectpicker bs-select-hidden" id="widget_status" name="status" data-live-search="false">
                                                    <option value="">All Status</option>
                                                    @forelse ($statuses as $element)
                                                        <option value="{{ $element->id }}">{{ $element->title }}</option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="range-block">
                                    <h4>Price Range:</h4>
                                    <div id="slider-price" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                                        <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                                        <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                        <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                    </div>
                                    <div class="clearfix range-text">
                                        <input type="text" name="min-price" class="pull-left range-input text-left" id="min-price" readonly="">
                                        <input type="text" name="max-price" class="pull-right range-input text-right" id="max-price" readonly="">
                                    </div>
                                </div>
                                <div class="range-block rang-form-block">
                                    <div class="row">
                                        <div class="col-sm-12 col-xs-12">
                                            <button type="submit" class="btn btn-secondary btn-block"><i class="fa fa-search fa-left"></i>Search</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</div>
@endsection
