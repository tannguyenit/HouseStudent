jQuery(document).ready(function ($) {
    "use strict"

    if (typeof VARIABLE_JS !== "undefined") {

        var houzezMap
        var initMap = true
        var range_location = {}
        var infoWindow = new google.maps.InfoWindow
        var markers = []
        var markerCluster = null
        var current_marker = 0
        var has_compare = $('#compare-controller').length
        var validate = VARIABLE_JS.validate
        var ajaxurl = VARIABLE_JS.admin_url
        var like_url = VARIABLE_JS.like_url
        var login_sending = VARIABLE_JS.login_loading
        var userID = VARIABLE_JS.user_id
        var prop_lat = VARIABLE_JS.property_lat
        var prop_lng = VARIABLE_JS.property_lng
        var autosearch_text = VARIABLE_JS.autosearch_text
        var paypal_connecting = VARIABLE_JS.paypal_connecting
        var mollie_connecting = VARIABLE_JS.mollie_connecting
        var process_loader_refresh = VARIABLE_JS.process_loader_refresh
        var process_loader_spinner = VARIABLE_JS.process_loader_spinner
        var process_loader_circle = VARIABLE_JS.process_loader_circle
        var process_loader_cog = VARIABLE_JS.process_loader_cog
        var success_icon = VARIABLE_JS.success_icon
        var confirm_message = VARIABLE_JS.confirm
        var confirm_featured = VARIABLE_JS.confirm_featured
        var confirm_featured_remove = VARIABLE_JS.confirm_featured_remove
        var confirm_relist = VARIABLE_JS.confirm_relist
        var is_singular_property = VARIABLE_JS.is_singular_property
        var property_map = VARIABLE_JS.property_map
        var property_map_street = VARIABLE_JS.property_map_street
        var currency_symb = VARIABLE_JS.currency_symbol
        var advanced_search_price_range_min = parseInt(VARIABLE_JS.advanced_search_widget_min_price)
        var advanced_search_price_range_max = parseInt(VARIABLE_JS.advanced_search_widget_max_price)
        var advanced_search_price_range_min_rent = parseInt(VARIABLE_JS.advanced_search_min_price_range_for_rent)
        var advanced_search_price_range_max_rent = parseInt(VARIABLE_JS.advanced_search_max_price_range_for_rent)
        var advanced_search_widget_min_area = parseInt(VARIABLE_JS.advanced_search_widget_min_area)
        var advanced_search_widget_max_area = parseInt(VARIABLE_JS.advanced_search_widget_max_area)
        var advanced_search_price_slide = VARIABLE_JS.advanced_search_price_slide
        var fave_page_template = VARIABLE_JS.fave_page_template
        var fave_prop_featured = VARIABLE_JS.prop_featured
        var featured_listings_none = VARIABLE_JS.featured_listings_none
        var prop_sent_for_approval = VARIABLE_JS.prop_sent_for_approval
        var houzez_rtl = VARIABLE_JS.houzez_rtl
        var infoboxClose = VARIABLE_JS.infoboxClose
        var clusterIcon = VARIABLE_JS.clusterIcon
        var paged = VARIABLE_JS.paged
        var sort_by = VARIABLE_JS.sort_by
        var google_map_style = VARIABLE_JS.google_map_style
        var googlemap_default_zoom = VARIABLE_JS.googlemap_default_zoom
        var googlemap_pin_cluster = VARIABLE_JS.googlemap_pin_cluster
        var googlemap_zoom_cluster = VARIABLE_JS.googlemap_zoom_cluster
        var map_icons_path = VARIABLE_JS.map_icons_path
        var google_map_needed = VARIABLE_JS.google_map_needed
        var simple_logo = VARIABLE_JS.simple_logo
        var retina_logo = VARIABLE_JS.retina_logo
        var retina_logo_mobile = VARIABLE_JS.retina_logo_mobile
        var retina_logo_mobile_splash = VARIABLE_JS.retina_logo_mobile_splash
        var retina_logo_splash = VARIABLE_JS.retina_logo_splash
        var retina_logo_height = VARIABLE_JS.retina_logo_height
        var retina_logo_width = VARIABLE_JS.retina_logo_width
        var transparent_menu = VARIABLE_JS.transparent_menu
        var transportation = VARIABLE_JS.transportation
        var supermarket = VARIABLE_JS.supermarket
        var schools = VARIABLE_JS.schools
        var libraries = VARIABLE_JS.libraries
        var pharmacies = VARIABLE_JS.pharmacies
        var hospitals = VARIABLE_JS.hospitals
        var currency_position = VARIABLE_JS.currency_position
        var currency_updating_msg = VARIABLE_JS.currency_updating_msg
        var submission_currency = VARIABLE_JS.submission_currency
        var wire_transfer_text = VARIABLE_JS.wire_transfer_text
        var direct_pay_thanks = VARIABLE_JS.direct_pay_thanks
        var direct_payment_title = VARIABLE_JS.direct_payment_title
        var direct_payment_button = VARIABLE_JS.direct_payment_button
        var direct_payment_details = VARIABLE_JS.direct_payment_details
        var measurement_unit = VARIABLE_JS.measurement_unit
        var measurement_updating_msg = VARIABLE_JS.measurement_updating_msg
        var thousands_separator = VARIABLE_JS.thousands_separator
        var rent_status_for_price_range = VARIABLE_JS.for_rent_price_range
        var current_tempalte = VARIABLE_JS.current_tempalte
        var not_found = VARIABLE_JS.not_found
        var property_detail_top = VARIABLE_JS.property_detail_top
        var keyword_search_field = VARIABLE_JS.keyword_search_field
        var keyword_autocomplete = VARIABLE_JS.keyword_autocomplete
        var template_thankyou = VARIABLE_JS.template_thankyou
        var direct_pay_text = VARIABLE_JS.direct_pay_text
        var search_result_page = VARIABLE_JS.search_result_page
        var houzez_default_radius = VARIABLE_JS.houzez_default_radius
        var enable_radius_search = VARIABLE_JS.enable_radius_search
        var enable_radius_search_halfmap = VARIABLE_JS.enable_radius_search_halfmap
        var houzez_primary_color = VARIABLE_JS.houzez_primary_color
        var houzez_geocomplete_country = VARIABLE_JS.geocomplete_country
        var houzez_logged_in = VARIABLE_JS.houzez_logged_in
        var ipinfo_location = VARIABLE_JS.ipinfo_location
        var delete_property_loading = VARIABLE_JS.delete_property
        var delete_property_confirmation = VARIABLE_JS.delete_confirmation
        var compare_button_url = VARIABLE_JS.compare_button_url
        var compare_page_not_found = VARIABLE_JS.compare_page_not_found
        var postComponent = new Post()

        var houzezHeaderMapOptions = {
            maxZoom: 20,
            disableDefaultUI: true,
            // scrollwheel: true,
            zoomControl: false,
            scaleControl: true,
            scroll: {
                x: $(window).scrollLeft(),
                y: $(window).scrollTop()
            },
            zoom: parseInt(googlemap_default_zoom),
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            draggable: drgflag,
        }



        if (houzez_rtl == 'yes') {
            houzez_rtl = true
        } else {
            houzez_rtl = false
        }


        /*
         *  Retina logo
         * *************************************** */
        if (retina_logo !== '' && retina_logo_width !== '' && retina_logo_height !== '') {
            if (window.devicePixelRatio == 2) {
                if (transparent_menu == 'yes') {
                    $(".houzez-header-transparent .logo-desktop img").attr("src", retina_logo_splash)
                    $(".houzez-header-transparent .logo-desktop img").attr("width", retina_logo_width)
                    $(".houzez-header-transparent .logo-desktop img").attr("height", retina_logo_height)

                    $(".sticky_nav.header-section-4 .logo-desktop img").attr("src", retina_logo)
                    $(".sticky_nav.header-section-4 .logo-desktop img").attr("width", retina_logo_width)
                    $(".sticky_nav.header-section-4 .logo-desktop img").attr("height", retina_logo_height)
                } else {
                    $(".logo-desktop img").attr("src", retina_logo)
                    $(".logo-desktop img").attr("width", retina_logo_width)
                    $(".logo-desktop img").attr("height", retina_logo_height)
                }
            }
        }

        if (retina_logo_splash !== '' && retina_logo_width !== '' && retina_logo_height !== '') {
            if (window.devicePixelRatio == 2) {
                $(".splash-header .logo-desktop img").attr("src", retina_logo_splash)
                $(".splash-header .logo-desktop img").attr("width", retina_logo_width)
                $(".splash-header .logo-desktop img").attr("height", retina_logo_height)
            }
        }

        if (retina_logo_mobile !== '') {
            if (window.devicePixelRatio == 2) {
                $(".logo-mobile img").attr("src", retina_logo_mobile)
            }
        }

        if (retina_logo_mobile_splash !== '') {
            if (window.devicePixelRatio == 2) {
                $(".logo-mobile-splash img").attr("src", retina_logo_mobile_splash)
            }
        }


        if (google_map_needed == 'yes') {

            var placesIDs = new Array()
            var transportationsMarkers = new Array()
            var supermarketsMarkers = new Array()
            var schoolsMarkers = new Array()
            var librariesMarkers = new Array()
            var pharmaciesMarkers = new Array()
            var hospitalsMarkers = new Array()

            var drgflag = true
            var houzez_is_mobile = false
            if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
                drgflag = false
                houzez_is_mobile = true
            }

            var houzezMapoptions = {
                zoom: parseInt(googlemap_default_zoom),
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                panControl: false,
                draggable: drgflag,
                zoomControl: false,
                mapTypeControl: false,
                scaleControl: false,
                streetViewControl: false,
                overviewMapControl: false,
                zoomControlOptions: {
                    style: google.maps.ZoomControlStyle.SMALL,
                    position: google.maps.ControlPosition.RIGHT_TOP
                },
                streetViewControlOptions: {
                    position: google.maps.ControlPosition.RIGHT_TOP
                }
            }

            if ($('#properties_viewed')) {
                if ($.cookie('properties_viewed')) {
                    postComponent.callAjaxRecently()
                } else {
                    $('#properties_viewed').remove()
                }
            }

            var infobox = new InfoBox({
                disableAutoPan: true, //false
                maxWidth: 275,
                alignBottom: true,
                pixelOffset: new google.maps.Size(-122, -48),
                zIndex: null,
                closeBoxMargin: "0 0 -16px -16px",
                closeBoxURL: infoboxClose,
                infoBoxClearance: new google.maps.Size(1, 1),
                isHidden: false,
                pane: "floatPane",
                enableEventPropagation: false
            })
            var poiInfo = new InfoBox({
                disableAutoPan: false,
                maxWidth: 250,
                pixelOffset: new google.maps.Size(-72, -70),
                zIndex: null,
                boxStyle: {
                    'background': '#ffffff',
                    'opacity': 1,
                    'padding': '6px',
                    'box-shadow': '0 1px 2px 0 rgba(0, 0, 0, 0.12)',
                    'width': '145px',
                    'text-align': 'center',
                    'border-radius': '4px'
                },
                closeBoxMargin: "28px 26px 0px 0px",
                closeBoxURL: "",
                infoBoxClearance: new google.maps.Size(1, 1),
                pane: "floatPane",
                enableEventPropagation: false
            })

            var houzezGetPOIs = function (position, poiMap, poiType) {
                var service = new google.maps.places.PlacesService(poiMap)
                var bounds = poiMap.getBounds()
                var types = new Array()

                switch (poiType) {
                    case 'transportations':
                        types = ['bus_station', 'subway_station', 'train_station', 'airport']
                        break
                    case 'supermarkets':
                        types = ['grocery_or_supermarket', 'shopping_mall']
                        break
                    case 'schools':
                        types = ['school', 'university']
                        break
                    case 'libraries':
                        types = ['library']
                        break
                    case 'pharmacies':
                        types = ['pharmacy']
                        break
                    case 'hospitals':
                        types = ['hospital']
                        break
                }

                service.nearbySearch({
                    location: position,
                    bounds: bounds,
                    radius: 2000,
                    types: types
                }, function poiCallback(results, status) {
                    if (status === google.maps.places.PlacesServiceStatus.OK) {
                        for (var i = 0; i < results.length; i++) {
                            if (jQuery.inArray(results[i].place_id, placesIDs) == -1) {
                                houzezCreatePOI(results[i], poiMap, poiType)
                                placesIDs.push(results[i].place_id)
                            }
                        }
                    }
                })
            }

            var houzezCreatePOI = function (place, poiMap, type) {
                var marker

                switch (type) {
                    case 'transportations':
                        marker = new google.maps.Marker({
                            map: poiMap,
                            position: place.geometry.location,
                            icon: map_icons_path + 'transportation.png'
                        })
                        transportationsMarkers.push(marker)
                        break
                    case 'supermarkets':
                        marker = new google.maps.Marker({
                            map: poiMap,
                            position: place.geometry.location,
                            icon: map_icons_path + 'supermarket.png'
                        })
                        supermarketsMarkers.push(marker)
                        break
                    case 'schools':
                        marker = new google.maps.Marker({
                            map: poiMap,
                            position: place.geometry.location,
                            icon: map_icons_path + 'school.png'
                        })
                        schoolsMarkers.push(marker)
                        break
                    case 'libraries':
                        marker = new google.maps.Marker({
                            map: poiMap,
                            position: place.geometry.location,
                            icon: map_icons_path + 'libraries.png'
                        })
                        librariesMarkers.push(marker)
                        break
                    case 'pharmacies':
                        marker = new google.maps.Marker({
                            map: poiMap,
                            position: place.geometry.location,
                            icon: map_icons_path + 'pharmacy.png'
                        })
                        pharmaciesMarkers.push(marker)
                        break
                    case 'hospitals':
                        marker = new google.maps.Marker({
                            map: poiMap,
                            position: place.geometry.location,
                            icon: map_icons_path + 'hospital.png'
                        })
                        hospitalsMarkers.push(marker)
                        break
                }

                google.maps.event.addListener(marker, 'mouseover', function () {
                    poiInfo.setContent(place.name)
                    poiInfo.open(poiMap, this)
                })
                google.maps.event.addListener(marker, 'mouseout', function () {
                    poiInfo.open(null, null)
                })
            }

            var houzezTooglePOIs = function (poiMap, type) {
                for (var i = 0; i < type.length; i++) {
                    if (type[i].getMap() != null) {
                        type[i].setMap(null)
                    } else {
                        type[i].setMap(poiMap)
                    }
                }
            }

            var houzezPoiControls = function (controlDiv, poiMap, center) {
                controlDiv.style.clear = 'both'

                // Set CSS for transportations POI
                var transportationUI = document.createElement('div')
                transportationUI.id = 'transportation'
                transportationUI.class = 'transportation'
                transportationUI.title = transportation
                controlDiv.appendChild(transportationUI)
                var transportationIcon = document.createElement('div')
                transportationIcon.id = 'transportationIcon'
                transportationIcon.innerHTML = '<div class="icon"><img src="' + map_icons_path + 'transportation-panel-icon.png" alt=""></div><span>' + transportation + '</span>'
                transportationUI.appendChild(transportationIcon)


                // Set CSS for supermarkets POI
                var supermarketsUI = document.createElement('div')
                supermarketsUI.id = 'supermarkets'
                supermarketsUI.title = supermarket
                controlDiv.appendChild(supermarketsUI)
                var supermarketsIcon = document.createElement('div')
                supermarketsIcon.id = 'supermarketsIcon'
                supermarketsIcon.innerHTML = '<div class="icon"><img src="' + map_icons_path + 'supermarket-panel-icon.png" alt=""></div><span>' + supermarket + '</span>'
                supermarketsUI.appendChild(supermarketsIcon)

                // Set CSS for schools POI
                var schoolsUI = document.createElement('div')
                schoolsUI.id = 'schools'
                schoolsUI.title = schools
                controlDiv.appendChild(schoolsUI)
                var schoolsIcon = document.createElement('div')
                schoolsIcon.id = 'schoolsIcon'
                schoolsIcon.innerHTML = '<div class="icon"><img src="' + map_icons_path + 'school-panel-icon.png" alt=""></div><span>' + schools + '</span>'
                schoolsUI.appendChild(schoolsIcon)

                // Set CSS for libraries POI
                var librariesUI = document.createElement('div')
                librariesUI.id = 'libraries'
                librariesUI.title = libraries
                controlDiv.appendChild(librariesUI)
                var librariesIcon = document.createElement('div')
                librariesIcon.id = 'librariesIcon'
                librariesIcon.innerHTML = '<div class="icon"><img src="' + map_icons_path + 'libraries-panel-icon.png" alt=""></div><span>' + libraries + '</span>'
                librariesUI.appendChild(librariesIcon)

                // Set CSS for pharmacies POI
                var pharmaciesUI = document.createElement('div')
                pharmaciesUI.id = 'pharmacies'
                pharmaciesUI.title = pharmacies
                controlDiv.appendChild(pharmaciesUI)
                var pharmaciesIcon = document.createElement('div')
                pharmaciesIcon.id = 'pharmaciesIcon'
                pharmaciesIcon.innerHTML = '<div class="icon"><img src="' + map_icons_path + 'pharmacy-panel-icon.png" alt=""></div><span>' + pharmacies + '</span>'
                pharmaciesUI.appendChild(pharmaciesIcon)

                // Set CSS for hospitals POI
                var hospitalsUI = document.createElement('div')
                hospitalsUI.id = 'hospitals'
                hospitalsUI.title = hospitals
                controlDiv.appendChild(hospitalsUI)
                var hospitalsIcon = document.createElement('div')
                hospitalsIcon.id = 'hospitalsIcon'
                hospitalsIcon.innerHTML = '<div class="icon"><img src="' + map_icons_path + 'hospital-panel-icon.png" alt=""></div><span>' + hospitals + '</span>'
                hospitalsUI.appendChild(hospitalsIcon)

                transportationUI.addEventListener('click', function () {
                    var transportationUI_ = this
                    if ($(this).hasClass('active')) {
                        $(this).removeClass('active')

                        houzezTooglePOIs(poiMap, transportationsMarkers)
                    } else {
                        $(this).addClass('active')

                        houzezGetPOIs(center, poiMap, 'transportations')
                        houzezTooglePOIs(poiMap, transportationsMarkers)
                    }
                    google.maps.event.addListener(poiMap, 'bounds_changed', function () {
                        if ($(transportationUI_).hasClass('active')) {
                            var newCenter = poiMap.getCenter()
                            houzezGetPOIs(newCenter, poiMap, 'transportations')
                        }
                    })
                })
                supermarketsUI.addEventListener('click', function () {
                    var supermarketsUI_ = this
                    if ($(this).hasClass('active')) {
                        $(this).removeClass('active')

                        houzezTooglePOIs(poiMap, supermarketsMarkers)
                    } else {
                        $(this).addClass('active')

                        houzezGetPOIs(center, poiMap, 'supermarkets')
                        houzezTooglePOIs(poiMap, supermarketsMarkers)
                    }
                    google.maps.event.addListener(poiMap, 'bounds_changed', function () {
                        if ($(supermarketsUI_).hasClass('active')) {
                            var newCenter = poiMap.getCenter()
                            houzezGetPOIs(newCenter, poiMap, 'supermarkets')
                        }
                    })
                })
                schoolsUI.addEventListener('click', function () {
                    var schoolsUI_ = this
                    if ($(this).hasClass('active')) {
                        $(this).removeClass('active')

                        houzezTooglePOIs(poiMap, schoolsMarkers)
                    } else {
                        $(this).addClass('active')

                        houzezGetPOIs(center, poiMap, 'schools')
                        houzezTooglePOIs(poiMap, schoolsMarkers)
                    }
                    google.maps.event.addListener(poiMap, 'bounds_changed', function () {
                        if ($(schoolsUI_).hasClass('active')) {
                            var newCenter = poiMap.getCenter()
                            houzezGetPOIs(newCenter, poiMap, 'schools')
                        }
                    })
                })
                librariesUI.addEventListener('click', function () {
                    var librariesUI_ = this
                    if ($(this).hasClass('active')) {
                        $(this).removeClass('active')

                        houzezTooglePOIs(poiMap, librariesMarkers)
                    } else {
                        $(this).addClass('active')

                        houzezGetPOIs(center, poiMap, 'libraries')
                        houzezTooglePOIs(poiMap, librariesMarkers)
                    }
                    google.maps.event.addListener(poiMap, 'bounds_changed', function () {
                        if ($(librariesUI_).hasClass('active')) {
                            var newCenter = poiMap.getCenter()
                            houzezGetPOIs(newCenter, poiMap, 'libraries')
                        }
                    })
                })
                pharmaciesUI.addEventListener('click', function () {
                    var pharmaciesUI_ = this
                    if ($(this).hasClass('active')) {
                        $(this).removeClass('active')

                        houzezTooglePOIs(poiMap, pharmaciesMarkers)
                    } else {
                        $(this).addClass('active')

                        houzezGetPOIs(center, poiMap, 'pharmacies')
                        houzezTooglePOIs(poiMap, pharmaciesMarkers)
                    }
                    google.maps.event.addListener(poiMap, 'bounds_changed', function () {
                        if ($(pharmaciesUI_).hasClass('active')) {
                            var newCenter = poiMap.getCenter()
                            houzezGetPOIs(newCenter, poiMap, 'pharmacies')
                        }
                    })
                })
                hospitalsUI.addEventListener('click', function () {
                    var hospitalsUI_ = this
                    if ($(this).hasClass('active')) {
                        $(this).removeClass('active')

                        houzezTooglePOIs(poiMap, hospitalsMarkers)
                    } else {
                        $(this).addClass('active')

                        houzezGetPOIs(center, poiMap, 'hospitals')
                        houzezTooglePOIs(poiMap, hospitalsMarkers)
                    }
                    google.maps.event.addListener(poiMap, 'bounds_changed', function () {
                        if ($(hospitalsUI_).hasClass('active')) {
                            var newCenter = poiMap.getCenter()
                            houzezGetPOIs(newCenter, poiMap, 'hospitals')
                        }
                    })
                })
            }

            var houzezSetPOIControls = function (poiMap, center) {
                var poiControlDiv = document.createElement('div')
                var poiControl = new houzezPoiControls(poiControlDiv, poiMap, center)

                poiControlDiv.index = 1
                poiControlDiv.style['padding-left'] = '10px'
                poiMap.controls[google.maps.ControlPosition.LEFT_BOTTOM].push(poiControlDiv)
            }
        }


        /* ------------------------------------------------------------------------ */
        /*  COMPARE PANEL
        /* ------------------------------------------------------------------------ */
        if (has_compare == 1) {

            var compare_panel = function () {
                $('.panel-btn').on('click', function () {
                    if ($('.compare-panel').hasClass('panel-open')) {
                        $('.compare-panel').removeClass('panel-open')
                    } else {
                        $('.compare-panel').addClass('panel-open')
                    }
                })
            }

            var compare_panel_close = function () {
                if ($('.compare-panel').hasClass('panel-open')) {
                    $('.compare-panel').removeClass('panel-open')
                }
            }

            var compare_panel_open = function () {
                $('.compare-panel').addClass('panel-open')
            }


            var houzez_compare_listing = function () {
                $('.compare-property').click(function (e) {
                    e.preventDefault()
                    var $this = $(this)

                    var prop_id = $this.attr('data-propid')

                    var data_ap = {
                        action: 'houzez_compare_add_property',
                        prop_id: prop_id
                    }

                    $this.find('i.fa-plus').addClass('fa-spin')

                    $.post(ajaxurl, data_ap, function (response) {

                        var data_ub = {
                            action: 'houzez_compare_update_basket'
                        }

                        $this.find('i.fa-plus').removeClass('fa-spin')

                        $.post(ajaxurl, data_ub, function (response) {

                            $('div#compare-properties-basket').replaceWith(response)

                            compare_panel()
                            compare_panel_open()

                        })

                    })

                    return

                }) // end .compare-property
            }
            houzez_compare_listing()

            // Delete single item from basket
            $(document).on('click', '#compare-properties-basket .compare-property-remove', function (e) {
                e.preventDefault()

                var property_id = jQuery(this).parent().attr('property-id')

                $(this).parent().block({
                    message: '<i class="' + process_loader_spinner + '"></i>',
                    css: {
                        border: 'none',
                        backgroundColor: 'none',
                        fontSize: '16px',
                    },
                })

                var data_ap = {
                    action: 'houzez_compare_add_property',
                    prop_id: property_id
                }
                $.post(ajaxurl, data_ap, function (response) {

                    var data_ub = {
                        action: 'houzez_compare_update_basket'
                    }
                    $.post(ajaxurl, data_ub, function (response) {

                        $('div#compare-properties-basket').replaceWith(response)
                        compare_panel()

                    })

                })

                return
            }) // End Delete compare

            // Show / Hide category details
            jQuery(document).on('click', '.compare-properties-button', function () {

                if (compare_button_url != "") {
                    window.location.href = compare_button_url
                } else {
                    alert(compare_page_not_found)
                }
                return false
            })
        } // has compare

        /*
         *  Print Property
         * *************************************** */
        if ($('#houzez-print').length > 0) {
            $('#houzez-print').click(function (e) {
                e.preventDefault()
                var propID, printWindow

                propID = $(this).attr('data-propid')

                printWindow = window.open('', 'Print Me', 'width=700 ,height=842')
                $.ajax({
                    type: 'POST',
                    url: ajaxurl,
                    data: {
                        'action': 'houzez_create_print',
                        'propid': propID,
                    },
                    success: function (data) {
                        printWindow.document.write(data)
                        printWindow.document.close()
                        printWindow.focus()
                        /*setTimeout(function(){
                        printWindow.print()
                        }, 2000)
                        printWindow.close()*/
                    },
                    error: function (xhr, status, error) {
                        var err = eval("(" + xhr.responseText + ")")
                        console.log(err.Message)
                    }

                })
            })
        }

        /*
         *  Visual Composer Stretch row
         * *************************************** */
        if (houzez_rtl) {
            var visual_composer_stretch_row = function () {

                var $elements = $('[data-vc-full-width="true"]')
                $.each($elements, function (key, item) {
                    var $el = $(this)
                    $el.addClass('vc_hidden')

                    var $el_full = $el.next('.vc_row-full-width')
                    var el_margin_left = parseInt($el.css('margin-left'), 10)
                    var el_margin_right = parseInt($el.css('margin-right'), 10)
                    var offset = 0 - $el_full.offset().left - el_margin_left
                    var width = $(window).width()
                    $el.css({
                        'position': 'relative',
                        'left': offset,
                        'right': offset,
                        'box-sizing': 'border-box',
                        'width': $(window).width()
                    })
                    if (!$el.data('vcStretchContent')) {
                        var padding = (-1 * offset)
                        if (0 > padding) {
                            padding = 0
                        }
                        var paddingRight = width - padding - $el_full.width() + el_margin_left + el_margin_right
                        if (0 > paddingRight) {
                            paddingRight = 0
                        }
                        $el.css({
                            'padding-left': padding + 'px',
                            'padding-right': paddingRight + 'px'
                        })
                    }
                    $el.attr("data-vc-full-width-init", "true")
                    $el.removeClass('vc_hidden')
                })
            }
            visual_composer_stretch_row()

            $(window).resize(function () {
                visual_composer_stretch_row()
            })
        }

        /* ------------------------------------------------------------------------ */
        /*  Property page layout cookies
        /* ------------------------------------------------------------------------ */
        var view_btn = $('.view-btn ')
        if (view_btn.length > 0) {
            view_btn.click(function () {
                $.removeCookie('properties-layout')
                $.removeCookie('layout-btn')

                if ($(this).hasClass('btn-list')) {
                    $.cookie('properties-layout', 'list-view')
                    $.cookie('layout-btn', 'btn-list')

                } else if ($(this).hasClass('btn-grid')) {
                    $.cookie('properties-layout', 'grid-view')
                    $.cookie('layout-btn', 'btn-grid')

                } else if ($(this).hasClass('btn-grid-3-col')) {
                    $.cookie('properties-layout', 'grid-view-3-col')
                    $.cookie('layout-btn', 'btn-grid-3-col')

                } else {

                }
            })

            if ($.cookie('properties-layout') != 'undefined') {
                if ($.cookie('properties-layout') == 'list-view' && fave_page_template != 'template-search.php' && fave_page_template != 'user_dashboard_favorites.php') {
                    $('.property-listing').removeClass('grid-view grid-view-3-col')
                    $('.property-listing').addClass('list-view')

                } else if ($.cookie('properties-layout') == 'grid-view' && fave_page_template != 'template-search.php' && fave_page_template != 'user_dashboard_favorites.php') {
                    $('.property-listing').removeClass('list-view grid-view grid-view-3-col')
                    $('.property-listing').addClass('grid-view')

                } else if ($.cookie('properties-layout') == 'grid-view-3-col' && fave_page_template != 'template-search.php' && fave_page_template != 'user_dashboard_favorites.php') {
                    $('.property-listing').removeClass('list-view grid-view')
                    $('.property-listing').addClass('grid-view grid-view-3-col')
                }
            }

            if ($.cookie('layout-btn') != 'undefined') {
                if ($.cookie('layout-btn') == 'btn-list') {
                    $('.view-btn').removeClass('active')
                    $('.view-btn.btn-list').addClass('active')

                } else if ($.cookie('layout-btn') == 'btn-grid') {
                    $('.view-btn').removeClass('active')
                    $('.view-btn.btn-grid').addClass('active')

                } else if ($.cookie('layout-btn') == 'btn-grid-3-col') {
                    $('.view-btn').removeClass('active')
                    $('.view-btn.btn-grid-3-col').addClass('active')
                }
            }
        }


        /* ------------------------------------------------------------------------ */
        /*  ADD COMMA TO VALUE
        /* ------------------------------------------------------------------------ */
        var addCommas = function (nStr) {
            nStr += ''
            var x = nStr.split('.')
            var x1 = x[0]
            var x2 = x.length > 1 ? '.' + x[1] : ''
            var rgx = /(\d+)(\d{3})/
            while (rgx.test(x1)) {
                x1 = x1.replace(rgx, '$1' + thousands_separator + '$2')
            }
            return x1 + x2
        }

        /*--------------------------------------------------------------------------
         *  Property Module Ajax Pagination
         * -------------------------------------------------------------------------*/
        var properties_module_section = $('#properties_module_section_add')
        if (properties_module_section.length > 0) {

            var properties_module_container = $('#properties_module_container')
            var paginationLink = $('.property-item-module ul.pagination li a')
            var fave_loader = $('.fave-svg-loader')

            $("body").on('click', '.fave-load-more a', function (e) {
                e.preventDefault()
                var $link = $(this)
                var page_url = $link.attr("href")
                var fave_load_ajax_new_count = 0
                $link.prepend('<i class="fa-left ' + process_loader_spinner + '"></i>')

                $("<div>").load(page_url, function () {
                    var n = fave_load_ajax_new_count.toString()
                    var $wrap = $link.closest('#properties_module_section').find('#module_properties')
                    var $new = $(this).find('#properties_module_section .item-wrap').addClass('fave-post-new-' + n)

                    $new.hide().appendTo($wrap).fadeIn(400)

                    if ($(this).find('.fave-load-more').length) {
                        $link.closest('#properties_module_section').find('.fave-load-more').html($(this).find('.fave-load-more').html())
                    } else {
                        $link.closest('#properties_module_section').find('.fave-load-more').fadeOut('fast').remove()
                    }

                    if (page_url != window.location) {
                        window.history.pushState({
                            path: page_url
                        }, '', page_url)
                    }

                    fave_load_ajax_new_count++
                    houzez_compare_listing()

                    return false

                })

            })

        }


        /*--------------------------------------------------------------------------
         *  Change advanced search price
         * -------------------------------------------------------------------------*/
        var fave_property_status_changed = function (prop_status, $form) {

            if (prop_status == VARIABLE_JS.for_rent) {
                $form.find('.prices-for-all').addClass('hide')
                $form.find('.prices-for-all select').attr('disabled', 'disabled')
                $form.find('.prices-only-for-rent').removeClass('hide')
                $form.find('.prices-only-for-rent select').removeAttr('disabled', 'disabled')
                $form.find('.prices-only-for-rent select').selectpicker('refresh')
            } else {
                $form.find('.prices-only-for-rent').addClass('hide')
                $form.find('.prices-only-for-rent select').attr('disabled', 'disabled')
                $form.find('.prices-for-all').removeClass('hide')
                $form.find('.prices-for-all select').removeAttr('disabled', 'disabled')
            }
        }

        $('select[name="status"]').change(function (e) {
            var selected_status = $(this).val()
            var $form = $(this).parents('form')
            fave_property_status_changed(selected_status, $form)
        })
        /* On page load (as on search page) */
        var selected_status_header_search = $('select[name="status"]').val()
        if (selected_status_header_search == VARIABLE_JS.for_rent || selected_status_header_search == '') {
            var $form = $('.advance-search-header')
            fave_property_status_changed(selected_status_header_search, $form)
        }

        // Mobile Advanced Search
        $('.advanced-search-mobile #selected_status_mobile').change(function (e) {
            var selected_status = $(this).val()
            var $form = $(this).parents('form')
            fave_property_status_changed(selected_status, $form)
        })
        /* On page load (as on search page) */
        var selected_status_header_search = $('.advanced-search-mobile #selected_status_mobile').val()
        if (selected_status_header_search == VARIABLE_JS.for_rent || selected_status_header_search == '') {
            var $form = $('.advanced-search-mobile')
            fave_property_status_changed(selected_status_header_search, $form)
        }

        // For search module
        $('.advanced-search-module #selected_status_module').change(function (e) {
            var selected_status = $(this).val()
            var $form = $(this).parents('form')
            fave_property_status_changed(selected_status, $form)
        })
        var selected_status_module_search = $('.advanced-search-module #selected_status_module').val()
        if (selected_status_module_search == VARIABLE_JS.for_rent || selected_status_module_search == '') {
            var $form = $('.advanced-search-module')
            fave_property_status_changed(selected_status_module_search, $form)
        }

        /*--------------------------------------------------------------------------
         *  Save Search
         * -------------------------------------------------------------------------*/
        $("#save_search_click").click(function (e) {
            e.preventDefault()

            var $this = $(this)
            var $from = $('.save_search_form')

            if (parseInt(userID, 10) === 0) {
                $('#pop-login').modal('show')
            } else {
                $.ajax({
                    url: ajaxurl,
                    data: $from.serialize(),
                    method: $from.attr('method'),
                    dataType: 'JSON',

                    beforeSend: function () {
                        $this.children('i').remove()
                        $this.prepend('<i class="fa-left ' + process_loader_spinner + '"></i>')
                    },
                    success: function (response) {
                        if (response.success) {
                            $('#save_search_click').addClass('saved')
                        }
                    },
                    error: function (xhr, status, error) {
                        var err = eval("(" + xhr.responseText + ")")
                        console.log(err.Message)
                    },
                    complete: function () {
                        $this.children('i').removeClass(process_loader_spinner)
                    }
                })
            }

        })

        /*--------------------------------------------------------------------------
         * Delete Search
         * --------------------------------------------------------------------------*/
        $('.remove-search').click(function (e) {
            e.preventDefault()
            var $this = $(this)
            var prop_id = $this.data('propertyid')
            var removeBlock = $this.parents('.saved-search-block')

            if (confirm(confirm_message)) {
                $.ajax({
                    url: ajaxurl,
                    dataType: 'JSON',
                    method: 'POST',
                    data: {
                        'action': 'houzez_delete_search',
                        'property_id': prop_id
                    },
                    beforeSend: function () {
                        $this.children('i').remove()
                        $this.prepend('<i class="' + process_loader_spinner + '"></i>')
                    },
                    success: function (res) {
                        if (res.success) {
                            removeBlock.remove()
                        }
                    },
                    error: function (xhr, status, error) {
                        var err = eval("(" + xhr.responseText + ")")
                        console.log(err.Message)
                    }
                })
            }
        })

        /*--------------------------------------------------------------------------
         *  Property Agent Contact Form
         * -------------------------------------------------------------------------*/
        $('.agent_contact_form').click(function (e) {
            e.preventDefault()

            var $this = $(this)
            var $form = $this.parents('form')
            var $result = $form.find('.form_messages')

            $.ajax({
                url: ajaxurl,
                data: $form.serialize(),
                method: $form.attr('method'),
                dataType: "JSON",

                beforeSend: function () {
                    $this.children('i').remove()
                    $this.prepend('<i class="fa-left ' + process_loader_spinner + '"></i>')
                },
                success: function (response) {
                    if (response.success) {
                        $result.empty().append(response.msg)
                        $form.find('input').val('')
                        $form.find('textarea').val('')
                    } else {
                        $result.empty().append(response.msg)
                    }
                },
                error: function (xhr, status, error) {
                    var err = eval("(" + xhr.responseText + ")")
                    console.log(err.Message)
                },
                complete: function () {
                    $this.children('i').removeClass(process_loader_spinner)
                    $this.children('i').addClass(success_icon)
                }
            })

            // var name = $('#name').val()
        })

        /*--------------------------------------------------------------------------
         *   Contact agent form on agent detail page
         * -------------------------------------------------------------------------*/

        $('#agent_detail_contact_btn').click(function (e) {
            e.preventDefault()
            var current_element = $(this)
            var $this = $(this)
            var $form = $this.parents('form')

            jQuery.ajax({
                type: 'post',
                url: ajaxurl,
                data: $form.serialize(),
                method: $form.attr('method'),
                dataType: "JSON",

                beforeSend: function () {
                    current_element.children('i').remove()
                    current_element.prepend('<i class="fa-left ' + process_loader_spinner + '"></i>')
                },
                success: function (res) {
                    current_element.children('i').removeClass(process_loader_spinner)
                    if (res.success) {
                        $('#form_messages').empty().append(res.msg)
                        current_element.children('i').addClass(success_icon)
                    } else {
                        $('#form_messages').empty().append(res.msg)
                    }
                },
                error: function (xhr, status, error) {
                    var err = eval("(" + xhr.responseText + ")")
                    console.log(err.Message)
                }

            })
        })

        /*--------------------------------------------------------------------------
         *  Property Schedule Contact Form
         * -------------------------------------------------------------------------*/
        $('.schedule_contact_form').click(function (e) {
            e.preventDefault()

            var $this = $(this)
            var $form = $this.parents('form')
            var $result = $form.find('.form_messages')

            $.ajax({
                url: ajaxurl,
                data: $form.serialize(),
                method: $form.attr('method'),
                dataType: "JSON",

                beforeSend: function () {
                    $this.children('i').remove()
                    $this.prepend('<i class="fa-left ' + process_loader_spinner + '"></i>')
                },
                success: function (response) {
                    if (response.success) {
                        $result.empty().append(response.msg)
                        $form.find('input').val('')
                        $form.find('textarea').val('')
                    } else {
                        $result.empty().append(response.msg)
                    }
                },
                error: function (xhr, status, error) {
                    var err = eval("(" + xhr.responseText + ")")
                    console.log(err.Message)
                },
                complete: function () {
                    $this.children('i').removeClass(process_loader_spinner)
                    $this.children('i').addClass(success_icon)
                }
            })

            // var name = $('#name').val()
        })

        /*--------------------------------------------------------------------------
         *   Resend Property For approval - only for per listing
         * -------------------------------------------------------------------------*/
        $('.resend-for-approval-perlisting').click(function (e) {
            e.preventDefault()

            var prop_id = $(this).attr('data-propid')
            resend_for_approval_perlisting(prop_id, $(this))
            $(this).unbind("click")
        })

        var resend_for_approval_perlisting = function (prop_id, currentDiv) {

            $.ajax({
                type: 'POST',
                url: ajaxurl,
                dataType: 'JSON',
                data: {
                    'action': 'houzez_resend_for_approval_perlisting',
                    'propid': prop_id
                },
                success: function (res) {

                    if (res.success) {
                        currentDiv.parent().empty().append('<span class="label-success label">' + res.msg + '</span>')
                    } else {
                        currentDiv.parent().empty().append('<div class="alert alert-danger">' + res.msg + '</div>')
                    }

                },
                error: function (xhr, status, error) {
                    var err = eval("(" + xhr.responseText + ")")
                    console.log(err.Message)
                }

            }) //end ajax
        }

        /*--------------------------------------------------------------------------
         *   Add or remove favorites
         * -------------------------------------------------------------------------*/
        var houzez_init_add_favorite = function () {
            $(".add_fav, #properties_module_container .add_fav").on('click', function () {
                var curnt = $(this).children('i')
                var postId = $(this).attr('data-postid')
                var status = $(this).find('.fa').attr('data-status')
                add_to_favorite(postId, curnt, status)
            })
        }
        houzez_init_add_favorite()

        var houzez_init_remove_favorite = function () {
            $(".remove_fav, #properties_module_container .add_fav").on('click', function () {
                var curnt = $(this)
                var postId = $(this).attr('data-postid')
                var status = $(this).find('.fa').attr('data-status')
                add_to_favorite(postId, curnt, status)
                var itemWrap = curnt.parents('.item-wrap').remove()
            })
        }
        houzez_init_remove_favorite()

        var add_to_favorite = function (postId, curnt, status) {
            if (parseInt(userID, 10) === 0) {
                $('#pop-login').modal('show')
            } else {
                jQuery.ajax({
                    type: 'post',
                    url: like_url,
                    dataType: 'json',
                    data: {
                        'status': status,
                        'id': postId
                    },
                    beforeSend: function () {
                        curnt.addClass('faa-pulse animated')
                    },
                    success: function (data) {
                        if (data.status) {
                            if (data.active) {
                                curnt.removeClass('fa-heart').addClass('fa-heart-o')
                            } else {
                                curnt.removeClass('fa-heart-o').addClass('fa-heart')
                            }
                            curnt.parent().attr('data-original-title', data.total_like).tooltip('fixTitle').tooltip('show')
                        } else {
                            curnt.removeClass('fa-heart').addClass('fa-heart-o')
                        }
                        curnt.attr('data-status', data.type)
                        curnt.removeClass('faa-pulse animated')
                    },
                    error: function (xhr, status, error) {
                        var err = eval("(" + xhr.responseText + ")")
                        console.log(err.Message)
                    }
                })
            } // End else
        }

        /* ------------------------------------------------------------------------ */
        /*  Fave login and regsiter
        /* ------------------------------------------------------------------------ */
        $('.fave-login-button').click(function (e) {
            e.preventDefault()
            var _this = $(this)
            houzez_login(_this)
        })

        $('.fave-register-button').click(function (e) {
            e.preventDefault()
            var _this = $(this)
            houzez_register(_this)
        })
        /*
         * validate form
         */
        $("#formLogin").validate({
            rules: {
                email: {
                    required: true,
                },
                password: {
                    required: true,
                    minlength: 6
                }
            },
            messages: {
                email: {
                    required: validate.email.required,
                },
                password: {
                    required: validate.password.required,
                    minlength: validate.password.min,
                }
            }
        })

        var houzez_login = function (_this) {
            if ($("#formLogin").valid()) {
                var form = _this.parents('form')
                var url = form.attr('action')
                var $messages = _this.parents('.login-block').find('.houzez_messages')

                $.ajax({
                    type: 'post',
                    url: url,
                    dataType: 'json',
                    data: form.serialize(),
                    beforeSend: function () {
                        $messages.empty().append('<p class="success text-success"> ' + login_sending + '</p>')
                    },
                    success: function (response) {

                        if (response.success) {
                            $messages.empty().append('<p class="success text-success"><i class="fa fa-check"></i> ' + response.msg + '</p>')
                            window.location.reload()
                        } else {
                            $messages.empty().append('<p class="error text-danger"><i class="fa fa-close"></i> ' + response.msg + '</p>')
                        }
                    },
                    error: function (xhr, status, error) {
                        console.log(error)
                    }
                })
            }
        } // end houzez_login

        /* ------------------------------------------------------------------------ */
        /*  Register User
        /* ------------------------------------------------------------------------ */
        var houzez_register = function (currnt) {

            var $form = currnt.parents('form')
            var $messages = currnt.parents('.class-for-register-msg').find('.houzez_messages_register')

            $.ajax({
                type: 'post',
                url: ajaxurl,
                dataType: 'json',
                data: $form.serialize(),
                beforeSend: function () {
                    $messages.empty().append('<p class="success text-success"> ' + login_sending + '</p>')
                },
                success: function (response) {
                    if (response.success) {
                        $messages.empty().append('<p class="success text-success"><i class="fa fa-check"></i> ' + response.msg + '</p>')
                    } else {
                        $messages.empty().append('<p class="error text-danger"><i class="fa fa-close"></i> ' + response.msg + '</p>')
                    }
                },
                error: function (xhr, status, error) {
                    var err = eval("(" + xhr.responseText + ")")
                    console.log(err.Message)
                }
            })
        }

        /* ------------------------------------------------------------------------ */
        /*  Reset Password
        /* ------------------------------------------------------------------------ */
        $("#formFogotPassword").validate({
            rules: {
                email: {
                    required: true,
                    email: true
                },
            },
            messages: {
                email: {
                    required: validate.email.required,
                    email: validate.email.email,
                },
            }
        })

        $('#submit_forgetpass').click(function () {
            if ($("#formFogotPassword").valid()) {
                var _this = $(this)
                var form = _this.parents('form')
                var url = form.attr('action')

                $.ajax({
                    type: 'POST',
                    url: url,
                    dataType: 'JSON',
                    data: form.serialize(),
                    beforeSend: function () {
                        $('#result_msg_reset').empty().append('<p class="success text-success"> ' + login_sending + '</p>')
                    },
                    success: function (response) {
                        if (response.success) {
                            $('#result_msg_reset').empty().append('<p class="success text-success"><i class="fa fa-check"></i> ' + response.msg + '</p>')
                            setTimeout(function () {
                                $('.modal').modal('hide')
                            }, 2000)
                        } else {
                            $('#result_msg_reset').empty().append('<p class="error text-danger"><i class="fa fa-close"></i> ' + response.msg + '</p>')
                        }
                    },
                    error: function (xhr, status, error) {
                        $('#result_msg_reset').empty().append('<p class="error text-danger"><i class="fa fa-close"></i> ' + response.msg + '</p>')
                    }
                })
            }
        })


        if ($('#houzez_reset_password').length > 0) {
            $('#houzez_reset_password').click(function (e) {
                e.preventDefault()

                var $this = $(this)
                var rg_login = $('input[name="rp_login"]').val()
                var rp_key = $('input[name="rp_key"]').val()
                var pass1 = $('input[name="pass1"]').val()
                var pass2 = $('input[name="pass2"]').val()
                var security = $('input[name="fave_resetpassword_security"]').val()

                $.ajax({
                    type: 'post',
                    url: ajaxurl,
                    dataType: 'json',
                    data: {
                        'action': 'houzez_reset_password_2',
                        'rq_login': rg_login,
                        'password': pass1,
                        'confirm_pass': pass2,
                        'rp_key': rp_key,
                        'security': security
                    },
                    beforeSend: function () {
                        $this.children('i').remove()
                        $this.prepend('<i class="fa-left ' + process_loader_spinner + '"></i>')
                    },
                    success: function (data) {
                        if (data.success) {
                            jQuery('#password_reset_msgs').empty().append('<p class="success text-success"><i class="fa fa-check"></i> ' + data.msg + '</p>')
                            jQuery('#oldpass, #newpass, #confirmpass').val('')
                        } else {
                            jQuery('#password_reset_msgs').empty().append('<p class="error text-danger"><i class="fa fa-close"></i> ' + data.msg + '</p>')
                        }
                    },
                    error: function (errorThrown) {

                    },
                    complete: function () {
                        $this.children('i').removeClass(process_loader_spinner)
                    }

                })

            })
        }

        /* ------------------------------------------------------------------------ */
        /*  Paypal single listing payment
        /* ------------------------------------------------------------------------ */
        $('#houzez_complete_order').click(function (e) {
            e.preventDefault()
            var hform, payment_gateway, houzez_listing_price, property_id, is_prop_featured, is_prop_upgrade

            payment_gateway = $("input[name='houzez_payment_type']:checked").val()
            is_prop_featured = $("input[name='featured_pay']").val()
            is_prop_upgrade = $("input[name='is_upgrade']").val()

            property_id = $('#houzez_property_id').val()
            houzez_listing_price = $('#houzez_listing_price').val()

            if (payment_gateway == 'paypal') {
                fave_processing_modal(paypal_connecting)
                fave_paypal_payment(property_id, is_prop_featured, is_prop_upgrade)

            } else if (payment_gateway == 'stripe') {
                hform = $(this).parents('form')
                if (is_prop_featured === '1') {
                    hform.find('.houzez_stripe_simple_featured button').trigger("click")
                } else {
                    hform.find('.houzez_stripe_simple button').trigger("click")
                }
            } else if (payment_gateway == 'direct_pay') {
                fave_processing_modal(direct_pay_text)
                direct_bank_transfer(property_id, houzez_listing_price)
            }
            return

        })

        var fave_processing_modal = function (msg) {
            var process_modal = '<div class="modal fade" id="fave_modal" tabindex="-1" role="dialog" aria-labelledby="faveModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-body houzez_messages_modal">' + msg + '</div></div></div></div></div>'
            jQuery('body').append(process_modal)
            jQuery('#fave_modal').modal()
        }

        var fave_processing_modal_close = function () {
            jQuery('#fave_modal').modal('hide')
        }


        /* ------------------------------------------------------------------------ */
        /*  Paypal payment function
        /* ------------------------------------------------------------------------ */
        var fave_paypal_payment = function (property_id, is_prop_featured, is_prop_upgrade) {

            $.ajax({
                type: 'post',
                url: ajaxurl,
                data: {
                    'action': 'houzez_property_paypal_payment',
                    'prop_id': property_id,
                    'is_prop_featured': is_prop_featured,
                    'is_prop_upgrade': is_prop_upgrade,
                },
                success: function (response) {
                    window.location.href = response
                },
                error: function (xhr, status, error) {
                    var err = eval("(" + xhr.responseText + ")")
                    console.log(err.Message)
                }
            })
        }

        /* ------------------------------------------------------------------------ */
        /*  Select Membership payment
        /* ------------------------------------------------------------------------ */

        var houzez_membership_data = function (currnt) {
            var payment_gateway = $("input[name='houzez_payment_type']:checked").val()
            var houzez_package_price = $("input[name='houzez_package_price']").val()
            var houzez_package_id = $("input[name='houzez_package_id']").val()
            var houzez_package_name = $("#houzez_package_name").text()

            if (payment_gateway == 'paypal') {
                fave_processing_modal(paypal_connecting)
                if ($('#paypal_package_recurring').is(':checked')) {
                    houzez_recuring_paypal_package_payment(houzez_package_price, houzez_package_name, houzez_package_id)
                } else {
                    houzez_paypal_package_payment(houzez_package_price, houzez_package_name, houzez_package_id)
                }

            } else if (payment_gateway == 'mollie') {
                fave_processing_modal(mollie_connecting)
                houzez_mollie_package_payment(houzez_package_price, houzez_package_name, houzez_package_id)

            } else if (payment_gateway == 'stripe') {
                var hform = currnt.parents('form')
                hform.find('.houzez_stripe_membership button').trigger("click")

            } else if (payment_gateway == 'direct_pay') {
                fave_processing_modal(direct_pay_text)
                direct_bank_transfer_package(houzez_package_id, houzez_package_price, houzez_package_name)

            } else if (payment_gateway == '2checkout') {
                //return false

            } else {
                fave_processing_modal(direct_pay_text)
                houzez_free_membership_package(houzez_package_id)
            }

            return false
        }

        var houzez_register_user_with_membership = function (currnt) {

            var $form = currnt.parents('form')
            var $messages = currnt.parents('.class-for-register-msg').find('.houzez_messages_register')

            $.ajax({
                type: 'post',
                url: ajaxurl,
                dataType: 'json',
                data: $form.serialize(),
                beforeSend: function () {
                    $messages.empty().append('<p class="success text-success"> ' + login_sending + '</p>')
                },
                success: function (response) {
                    if (response.success) {
                        houzez_membership_data(currnt)
                    } else {
                        $messages.empty().append('<p class="error text-danger"><i class="fa fa-close"></i> ' + response.msg + '</p>')
                    }
                },
                error: function (xhr, status, error) {
                    var err = eval("(" + xhr.responseText + ")")
                    console.log(err.Message)
                }
            })
        }

        $('#houzez_complete_membership').click(function (e) {
            e.preventDefault()
            var currnt = $(this)
            if (houzez_logged_in == 'no') {
                houzez_register_user_with_membership(currnt)
                return
            }
            houzez_membership_data(currnt)
        })

        var houzez_paypal_package_payment = function (houzez_package_price, houzez_package_name, houzez_package_id) {

            $.ajax({
                type: 'POST',
                url: ajaxurl,
                data: {
                    'action': 'houzez_paypal_package_payment',
                    'houzez_package_price': houzez_package_price,
                    'houzez_package_name': houzez_package_name,
                    'houzez_package_id': houzez_package_id
                },
                success: function (data) {
                    window.location.href = data
                },
                error: function (xhr, status, error) {
                    var err = eval("(" + xhr.responseText + ")")
                    console.log(err.Message)
                }
            })
        }

        var houzez_recuring_paypal_package_payment = function (houzez_package_price, houzez_package_name, houzez_package_id) {

            jQuery.ajax({
                type: 'POST',
                url: ajaxurl,
                data: {
                    'action': 'houzez_recuring_paypal_package_payment',
                    'houzez_package_name': houzez_package_name,
                    'houzez_package_id': houzez_package_id,
                    'houzez_package_price': houzez_package_price
                },
                success: function (data) {
                    window.location.href = data
                },
                error: function (xhr, status, error) {
                    var err = eval("(" + xhr.responseText + ")")
                    console.log(err.Message)
                }
            })
        }

        var houzez_mollie_package_payment = function (houzez_package_price, houzez_package_name, houzez_package_id) {

            $.ajax({
                type: 'POST',
                url: ajaxurl,
                data: {
                    'action': 'houzez_mollie_package_payment',
                    'houzez_package_price': houzez_package_price,
                    'houzez_package_name': houzez_package_name,
                    'houzez_package_id': houzez_package_id
                },
                success: function (data) {
                    window.location.href = data
                },
                error: function (xhr, status, error) {
                    var err = eval("(" + xhr.responseText + ")")
                    console.log(err.Message)
                }
            })
        }

        var direct_bank_transfer_package = function (houzez_package_id, houzez_package_price, houzez_package_name) {

            jQuery.ajax({
                type: 'POST',
                url: ajaxurl,
                data: {
                    'action': 'houzez_direct_pay_package',
                    'selected_package': houzez_package_id,
                },
                success: function (data) {
                    window.location.href = data

                },
                error: function (errorThrown) {}
            })
        }

        /*--------------------------------------------------------------------------
         *   Houzez Free Membership Package
         * -------------------------------------------------------------------------*/
        var houzez_free_membership_package = function (houzez_package_id) {
            jQuery.ajax({
                type: 'POST',
                url: ajaxurl,
                data: {
                    'action': 'houzez_free_membership_package',
                    'selected_package': houzez_package_id,
                },
                success: function (data) {
                    window.location.href = data

                },
                error: function (errorThrown) {}
            })
        }

        /*--------------------------------------------------------------------------
         *   Resend Property For approval - only for membership
         * -------------------------------------------------------------------------*/
        $('.resend-for-approval').click(function (e) {
            e.preventDefault()

            if (confirm(confirm_relist)) {
                var prop_id = $(this).attr('data-propid')
                resend_for_approval(prop_id, $(this))
                $(this).unbind("click")
            }
        })

        var resend_for_approval = function (prop_id, currentDiv) {

            $.ajax({
                type: 'POST',
                url: ajaxurl,
                dataType: 'JSON',
                data: {
                    'action': 'houzez_resend_for_approval',
                    'propid': prop_id
                },
                success: function (res) {

                    if (res.success) {
                        currentDiv.parent().empty().append('<span class="label-success label">' + res.msg + '</span>')
                        var total_listings = parseInt(jQuery('.listings_remainings').text(), 10)
                        jQuery('.listings_remainings').text(total_listings - 1)
                    } else {
                        currentDiv.parent().empty().append('<div class="alert alert-danger">' + res.msg + '</div>')
                    }

                },
                error: function (xhr, status, error) {
                    var err = eval("(" + xhr.responseText + ")")
                    console.log(err.Message)
                }

            }) //end ajax
        }

        /*--------------------------------------------------------------------------
         *   Make Property Featured - only for membership
         * -------------------------------------------------------------------------*/
        $('.make-prop-featured').click(function (e) {
            e.preventDefault()

            if (confirm(confirm_featured)) {
                var prop_id = $(this).attr('data-propid')
                var prop_type = $(this).attr('data-proptype')
                make_prop_featured(prop_id, $(this), prop_type)
                $(this).unbind("click")
            }
        })

        var make_prop_featured = function (prop_id, currentDiv, prop_type) {

            $.ajax({
                type: 'POST',
                url: ajaxurl,
                dataType: 'JSON',
                data: {
                    'action': 'houzez_make_prop_featured',
                    'propid': prop_id,
                    'prop_type': prop_type
                },
                success: function (res) {

                    if (res.success) {
                        var prnt = currentDiv.parents('.item-wrap')
                        prnt.find('.item-thumb').append('<span class="label-featured label">' + fave_prop_featured + '</span>')
                        currentDiv.remove()
                        var total_featured_listings = parseInt(jQuery('.featured_listings_remaining').text(), 10)
                        jQuery('.featured_listings_remaining').text(total_featured_listings - 1)
                    } else {
                        currentDiv.parent().empty().append('<div class="alert alert-danger">' + featured_listings_none + '</div>')
                    }

                },
                error: function (xhr, status, error) {
                    var err = eval("(" + xhr.responseText + ")")
                    console.log(err.Message)
                }

            }) //end ajax
        }

        /*--------------------------------------------------------------------------
         *   Make Property Featured - only for membership
         * -------------------------------------------------------------------------*/
        $('.remove-prop-featured').click(function (e) {
            e.preventDefault()

            if (confirm(confirm_featured_remove)) {
                var prop_id = $(this).attr('data-propid')
                remove_prop_featured(prop_id, $(this))
                $(this).unbind("click")
            }
        })

        var remove_prop_featured = function (prop_id, currentDiv) {

            $.ajax({
                type: 'POST',
                url: ajaxurl,
                dataType: 'JSON',
                data: {
                    'action': 'houzez_remove_prop_featured',
                    'propid': prop_id
                },
                success: function (res) {
                    if (res.success) {
                        var prnt = currentDiv.parents('.item-wrap')
                        prnt.find('.label-featured').remove()
                        currentDiv.remove()
                        //currentDiv.parent().empty().append('<div class="alert alert-success">'+featured_listings_none+'</div>')
                    }
                },
                error: function (xhr, status, error) {
                    var err = eval("(" + xhr.responseText + ")")
                    console.log(err.Message)
                }

            }) //end ajax
        }

        /* ------------------------------------------------------------------------ */
        /*  Wire Transfer per listing payment
        /* ------------------------------------------------------------------------ */
        var direct_bank_transfer = function (prop_id, listing_price) {
            var is_featured = $('input[name="featured_pay"]').val()
            var is_upgrade = $('input[name="is_upgrade"]').val()

            jQuery.ajax({
                type: 'POST',
                url: ajaxurl,
                data: {
                    'action': 'houzez_direct_pay_per_listing',
                    'prop_id': prop_id,
                    'is_featured': is_featured,
                    'is_upgrade': is_upgrade
                },
                success: function (data) {
                    window.location.href = data
                },
                error: function (errorThrown) {}
            })

        }

        /*--------------------------------------------------------------------------
         *  Invoice Filter
         * -------------------------------------------------------------------------*/
        $('#invoice_status, #invoice_type').change(function () {
            houzez_invoices_filter()
        })

        $('#startDate, #endDate').focusout(function () {
            houzez_invoices_filter()
        })

        var houzez_invoices_filter = function () {
            var inv_status = $('#invoice_status').val(),
                inv_type = $('#invoice_type').val(),
                startDate = $('#startDate').val(),
                endDate = $('#endDate').val()

            $.ajax({
                url: ajaxurl,
                dataType: 'json',
                type: 'POST',
                data: {
                    'action': 'houzez_invoices_ajax_search',
                    'invoice_status': inv_status,
                    'invoice_type': inv_type,
                    'startDate': startDate,
                    'endDate': endDate
                },
                success: function (res) { //alert(res)
                    if (res.success) {
                        $('#invoices_content').empty().append(res.result)
                        $('#invoices_total_price').empty().append(res.total_price)
                    }
                },
                error: function (xhr, status, error) {
                    var err = eval("(" + xhr.responseText + ")")
                    console.log(err.Message)
                }
            })
        }

        /*--------------------------------------------------------------------------
         *  Houzez Add Marker
         * -------------------------------------------------------------------------*/
        var houzezAddMarkers = function (props, map) {
            $.each(props, function (i, prop) {
                var latlng = new google.maps.LatLng(prop.lat, prop.lng)
                var marker_url = prop.icon
                var marker_size = new google.maps.Size(44, 56)
                if (window.devicePixelRatio > 1.5) {
                    if (prop.retinaIcon) {
                        marker_url = prop.retinaIcon
                        marker_size = new google.maps.Size(44, 56)
                    }
                }

                var marker_icon = {
                    url: marker_url,
                    size: marker_size,
                    scaledSize: new google.maps.Size(44, 56),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(7, 27)
                }

                var marker = new google.maps.Marker({
                    position: latlng,
                    map: map,
                    icon: marker_icon,
                    draggable: false,
                    animation: google.maps.Animation.DROP,
                    // title: 'marker-'+prop.sanitizetitle
                })
                var prop_title = prop.data ? prop.data.post_title : prop.title

                var infoboxContent = document.createElement("div")
                infoboxContent.className = 'property-item item-grid map-info-box'
                infoboxContent.innerHTML = `
                    <div class="figure-block">
                        <figure class="item-thumb">
                            <div class="price hide-on-list">
                                <span class="item-price">${prop.price}</span>
                            </div>
                            <a href="${prop.url}" class="hover-effect" tabindex="0">${prop.thumbnail}</a>
                        </figure>
                        </div>
                            <div class="item-body">
                                <div class="body-left">
                                    <div class="info-row">
                                        <h2><a target="_blank" href="${prop.url}">${prop_title}</a></h2>
                                        <h4>${prop.address}</h4>
                                    </div>
                                    <div class="table-list full-width info-row">
                                        <div class="cell">
                                        <div class="info-row amenities">${prop.prop_meta}
                                        <p>${prop.type}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>`

                google.maps.event.addListener(marker, 'click', (function (marker, i) {
                    return function () {
                        var scale = Math.pow(2, map.getZoom())
                        var offsety = ((100 / scale) || 0)
                        var projection = map.getProjection()
                        var markerPosition = marker.getPosition()
                        var markerScreenPosition = projection.fromLatLngToPoint(markerPosition)
                        var pointHalfScreenAbove = new google.maps.Point(markerScreenPosition.x, markerScreenPosition.y - offsety)
                        var aboveMarkerLatLng = projection.fromPointToLatLng(pointHalfScreenAbove)
                        map.setCenter(aboveMarkerLatLng)
                        infobox.setContent(infoboxContent)
                        infobox.open(map, marker)

                    }
                })(marker, i))
                console.log('marker truoc khi add', markers)
                markers.push(marker)
                console.log(markers, 'sau khi add')
            })
        }

        /*--------------------------------------------------------------------------
         *  Header Map
         * -------------------------------------------------------------------------*/

        var houzez_map_zoomin = function (houzezMap) {
            google.maps.event.addDomListener(document.getElementById('listing-mapzoomin'), 'click', function () {
                var current = parseInt(houzezMap.getZoom(), 10)
                current++
                if (current > 20) {
                    current = 20
                }
                houzezMap.setZoom(current)
            })
        }

        var houzez_map_zoomout = function (houzezMap) {
            google.maps.event.addDomListener(document.getElementById('listing-mapzoomout'), 'click', function () {
                var current = parseInt(houzezMap.getZoom(), 10)
                current--
                if (current < 0) {
                    current = 0
                }
                houzezMap.setZoom(current)
            })
        }

        var houzez_change_map_type = function (houzezMap, map_type) {

            if (map_type === 'roadmap') {
                houzezMap.setMapTypeId(google.maps.MapTypeId.ROADMAP)
            } else if (map_type === 'satellite') {
                houzezMap.setMapTypeId(google.maps.MapTypeId.SATELLITE)
            } else if (map_type === 'hybrid') {
                houzezMap.setMapTypeId(google.maps.MapTypeId.HYBRID)
            } else if (map_type === 'terrain') {
                houzezMap.setMapTypeId(google.maps.MapTypeId.TERRAIN)
            }
            return false
        }

        var houzez_map_next = function (houzezMap) {
            current_marker++
            if (current_marker > markers.length) {
                current_marker = 1
            }
            while (markers[current_marker - 1].visible === false) {
                current_marker++
                if (current_marker > markers.length) {
                    current_marker = 1
                }
            }
            if (houzezMap.getZoom() < 15) {
                houzezMap.setZoom(15)
            }
            google.maps.event.trigger(markers[current_marker - 1], 'click')
        }

        var houzez_map_prev = function (houzezMap) {
            current_marker--
            if (current_marker < 1) {
                current_marker = markers.length
            }
            while (markers[current_marker - 1].visible === false) {
                current_marker--
                if (current_marker > markers.length) {
                    current_marker = 1
                }
            }
            if (houzezMap.getZoom() < 15) {
                houzezMap.setZoom(15)
            }
            google.maps.event.trigger(markers[current_marker - 1], 'click')
        }

        var houzez_map_search_field = function (houzezMap, mapInput) {

            var searchBox = new google.maps.places.SearchBox(mapInput)
            houzezMap.controls[google.maps.ControlPosition.TOP_LEFT].push(mapInput)

            // Bias the SearchBox results towards current map's viewport.
            houzezMap.addListener('bounds_changed', function () {
                searchBox.setBounds(houzezMap.getBounds())
            })

            var markers_location = []
            // Listen for the event fired when the user selects a prediction and retrieve
            // more details for that place.
            searchBox.addListener('places_changed', function () {
                var places = searchBox.getPlaces()

                if (places.length == 0) {
                    return
                }

                // Clear out the old markers.
                markers_location.forEach(function (marker) {
                    marker.setMap(null)
                })
                markers_location = []

                // For each place, get the icon, name and location.
                var bounds = new google.maps.LatLngBounds()
                places.forEach(function (place) {
                    var icon = {
                        url: place.icon,
                        size: new google.maps.Size(71, 71),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(17, 34),
                        scaledSize: new google.maps.Size(25, 25)
                    }

                    // Create a marker for each place.
                    markers_location.push(new google.maps.Marker({
                        map: houzezMap,
                        // icon: icon,
                        title: place.name,
                        position: place.geometry.location
                    }))

                    if (place.geometry.viewport) {
                        // Only geocodes have viewport.
                        bounds.union(place.geometry.viewport)
                    } else {
                        bounds.extend(place.geometry.location)
                    }
                })
                houzezMap.fitBounds(bounds)
            })
        }

        var houzez_map_parallax = function (houzezMap) {
            var offset = $(houzezMap.getDiv()).offset()
            houzezMap.panBy(((houzezHeaderMapOptions.scroll.x - offset.left) / 3), ((houzezHeaderMapOptions.scroll.y - offset.top) / 3))
            google.maps.event.addDomListener(window, 'scroll', function () {
                var scrollY = $(window).scrollTop(),
                    scrollX = $(window).scrollLeft(),
                    scroll = houzezMap.get('scroll')
                if (scroll) {
                    houzezMap.panBy(-((scroll.x - scrollX) / 3), -((scroll.y - scrollY) / 3))
                }
                houzezMap.set('scroll', {
                    x: scrollX,
                    y: scrollY
                })

            })
        }

        var reloadMarkers = function () {
            console.log('====reloadMarkers', markers)
            // Loop through markers and set map to null for each
            for (var i = 0; i < markers.length; i++) {
                markers[i].setMap(null)
                console.log(markers[i])
            }
            // Reset the markers array
            markers = []
        }

        var houzezLatLng = function (keyword) {

            var geocoder = new google.maps.Geocoder()
            geocoder.geocode({
                'address': keyword
            }, function (results, status) {
                if (status == 'OK') {
                    return results[0].geometry.location
                }
            })

        }

        var half_map_ajax_pagi = function () {
            $('.half_map_ajax_pagi a').click(function (e) {
                e.preventDefault()
                var current_page = $(this).data('houzepagi')
                var current_form = $('.advanced-search form')
                var form_widget = $(this).parents('.widget_houzez_advanced_search')
                houzez_search_on_change(current_form, form_widget, current_page)
            })
            return false
        }

        var houzez_header_listing_map = function (keyword, country, state, location, area, status, type, label, property_id, bedrooms, bathrooms, min_price, max_price, min_area, max_area, features, publish_date, search_lat, search_long, search_radius, search_location, use_radius) {
            var headerMapSecurity = $('#securityHouzezHeaderMap').val()
            var initial_city = VARIABLE_JS.header_map_selected_city
            if($('#houzez-listing-map').length) {
                houzezMap = new google.maps.Map(document.getElementById('houzez-listing-map'), houzezHeaderMapOptions)
                let option = {
                    map:houzezMap
                }
                houseMapComponent = new HouseMap(option)
            }
            houseMapComponent.action.getCurrentLocation()

            google.maps.event.trigger(houzezMap, 'resize')
            if (google_map_style !== '') {
                var styles = JSON.parse(google_map_style)
                houzezMap.setOptions({
                    styles: styles
                })
            }

            google.maps.event.addListener(houzezMap, 'bounds_changed', function() {
                houseMapComponent.cookie.update()
            })

            google.maps.event.addListener(houzezMap, 'dragend', function () {
                houseMapComponent.cookie.update()
            })

            let dataSend = {
                'action': 'houzez_header_map_listings',
                'initial_city': initial_city,
                'keyword': keyword,
                'country': country,
                'state': state,
                'location': location,
                'lat': '15.989239746610254,16.170679502513632',
                'lng': '108.07970273500973,108.33273160463864',
                'area': area,
                'status': status,
                'type': type,
                'label': label,
                'property_id': property_id,
                'bedrooms': bedrooms,
                'bathrooms': bathrooms,
                'min_price': min_price,
                'max_price': max_price,
                'min_area': min_area,
                'max_area': max_area,
                'features': features,
                'publish_date': publish_date,
                'use_radius': use_radius,
                'search_location': search_location,
                'search_radius': search_radius,
                'security': headerMapSecurity
            }
            if (houseMapComponent.cookie.data) {
                let data = houseMapComponent.cookie.data
                if (data.range_latlng) {
                    dataSend.lat = data.range_latlng.lat
                    dataSend.lng = data.range_latlng.lng
                }
                $('.hidden-input .lat-input').val(dataSend.lat)
                $('.hidden-input .lng-input').val(dataSend.lng)
            }

            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: ajaxurl,
                data: dataSend,
                beforeSend: function () {
                    houseMapComponent.event.showLoading()
                },
                success: function (data) {
                    houseMapComponent.event.hideLoadingWhenShowTitleMap()

                    // if (document.getElementById('listing-mapzoomin')) {
                    //     houzez_map_zoomin(houzezMap)
                    // }
                    houseMapComponent.action.buttonZoomIn()


                    // if (document.getElementById('listing-mapzoomout')) {
                    //     houzez_map_zoomout(houzezMap)
                    // }
                    houseMapComponent.action.buttonZoomOut()

                    // if (document.getElementById('google-map-search')) {
                    //     var mapInput = document.getElementById('google-map-search')
                    //     houzez_map_search_field(houzezMap, mapInput)
                    // }
                    houseMapComponent.action.inputSearch()

                    // $('.houzezMapType').click(function () {
                    //     var maptype = $(this).data('maptype')
                    //     houzez_change_map_type(houzezMap, maptype)
                    // })
                    houseMapComponent.action.changeTypeMap()




                    // remove_map_loader(houzezMap)

                    //enable/disable dragable on mobile
                    if (document.getElementById('houzez-gmap-full')) {
                        if (houzez_is_mobile) {
                            $("#houzez-gmap-full").toggle(
                                function () {
                                    google.maps.event.trigger(houzezMap, "resize")
                                    houzezMap.setOptions({
                                        draggable: true,
                                    })
                                },
                                function () {
                                    google.maps.event.trigger(houzezMap, "resize")
                                    houzezMap.setOptions({
                                        draggable: false,
                                    })
                                }
                            )
                        } else {
                            $("#houzez-gmap-full").toggle(
                                function () {
                                    google.maps.event.trigger(houzezMap, "resize")
                                    houzezMap.setOptions({
                                        scrollwheel: true,
                                    })
                                },
                                function () {
                                    google.maps.event.trigger(houzezMap, "resize")
                                    houzezMap.setOptions({
                                        scrollwheel: false,
                                    })
                                }
                            )
                        }
                    }

                    // Parallax
                    houzez_map_parallax(houzezMap)

                    if (data.getProperties === true) {
                        // reloadMarkers()
                        houseMapComponent.markers.removeAll()
                        houseMapComponent.markers.add(data.properties)
                        houseMapComponent.markers.addClusterer()
                        houseMapComponent.markers.fitBoundsFromMarkers()

                        $('#houzez-gmap-next').click(function () {
                            console.log('nextMarker')
                            houseMapComponent.action.nextMarker()
                        })

                        $('#houzez-gmap-prev').click(function () {
                            console.log('preMarker')
                            houseMapComponent.action.preMarker()
                        })

                        // houseMapComponent.action.nextMarker()
                        // houseMapComponent.action.preMarker()

                        // console.log('reload marker')
                        // houzezAddMarkers(data.properties, houzezMap)
                        // console.log('add marker')
                        // houzezMap.fitBounds(markers.reduce(function (bounds, marker) {
                        //     return bounds.extend(marker.getPosition())
                        // }, new google.maps.LatLngBounds()))

                        // const bounds  = new google.maps.LatLngBounds()
                        // const loc = new google.maps.LatLng("16.047079", "108.206230")
                        // bounds.extend(loc)
                        // houzezMap.fitBounds(bounds)       // auto-zoom
                        // houzezMap.panToBounds(bounds)     // auto-center
                        // var listener = google.maps.event.addListener(houzezMap, "idle", function () {
                        //     if (houzezMap.getZoom() > parseInt(googlemap_default_zoom)) houzezMap.setZoom(parseInt(googlemap_default_zoom))
                        //     google.maps.event.removeListener(listener)
                        // })
                        houseMapComponent.event.idleChange()

                        houseMapComponent.event.triggerResize()
                        // google.maps.event.trigger(houzezMap, 'resize')


                        // markerCluster = new MarkerClusterer(houzezMap, markers, {
                        //     maxZoom: 18,
                        //     gridSize: 60,
                        //     styles: [{
                        //         url: clusterIcon,
                        //         width: 48,
                        //         height: 48,
                        //         textColor: "#fff"
                        //     }]
                        // })
                    } else {
                        $('#houzez-listing-map').empty().html('<div class="map-notfound">'+not_found+'</div>')
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    console.log(xhr.status)
                    console.log(xhr.responseText)
                    console.log(thrownError)
                },
                complete: function () {
                    houseMapComponent.event.hideLoadingWhenShowTitleMap()
                }
            })
        }

        var houzez_search_on_change = function (current_form, form_widget, current_page, min_price_onchange_status, max_price_onchange_status, only_city, only_state, only_country) {
            var country, state, location, area, status, type, label, property_id, bedrooms, bathrooms, min_price, max_price, min_area, max_area, keyword, publish_date, search_lat, search_long, search_radius, search_location, use_radius, features

            if (min_price_onchange_status != null && max_price_onchange_status != null) {
                min_price = min_price_onchange_status
                max_price = max_price_onchange_status
            } else {
                if (form_widget.hasClass('widget') || advanced_search_price_slide != 0) {
                    min_price = current_form.find('input[name="min-price"]').val()
                    max_price = current_form.find('input[name="max-price"]').val()
                } else {
                    min_price = current_form.find('select[name="min-price"]:not(:disabled)').val()
                    max_price = current_form.find('select[name="max-price"]:not(:disabled)').val()
                }
            }

            state = current_form.find('select[name="state"]').val()
            location = current_form.find('select[name="location"]').val()
            if (location == '' || location == null || typeof location == 'undefined') {
                location = 'all'
            }

            if (only_city != 'yes') {
                area = current_form.find('select[name="area"]').val()
            }

            if (only_state == 'yes') {
                area = ''
                location = 'all'
            }

            if (only_country == 'yes') {
                state = ''
                area = ''
                location = 'all'
            }

            country = current_form.find('select[name="country"]').val()
            status = current_form.find('select[name="status"]').val()
            type = current_form.find('select[name="type"]').val()
            bedrooms = current_form.find('select[name="bedrooms"]').val()
            bathrooms = current_form.find('select[name="bathrooms"]').val()
            label = current_form.find('select[name="label"]').val()
            property_id = current_form.find('input[name="property_id"]').val()
            min_area = current_form.find('input[name="min-area"]').val()
            max_area = current_form.find('input[name="max-area"]').val()
            keyword = current_form.find('input[name="keyword"]').val()
            publish_date = current_form.find('input[name="publish_date"]').val()
            features = current_form.find('.features-list input[type=checkbox]:checked').map(function (_, el) {
                return $(el).val()
            }).toArray()

            //Radius Search
            search_lat = current_form.find('input[name="lat"]').val()
            search_long = current_form.find('input[name="lng"]').val()
            search_location = current_form.find('input[name="search_location"]').val()
            search_radius = current_form.find('select[name="radius"]').val()

            if ($(current_form.find('input[name="use_radius"]')).is(':checked')) {
                use_radius = 'on'
            } else {
                use_radius = 'off'
            }
            houzez_header_listing_map(keyword, country, state, location, area, status, type, label, property_id, bedrooms, bathrooms, min_price, max_price, min_area, max_area, features, publish_date, search_lat, search_long, search_radius, search_location, use_radius)
            return false
        }

        var populate_area_dropdown = function (current_form) {
            var city
            city = current_form.find('select[name="location"] option:selected').data('parentstate')
            //city  = current_form.find('select[name="location"]').val()

            if (city != '') {
                current_form.find('select[name="area"]').selectpicker('val', '')
                current_form.find('select[name="area"] option').each(function () {
                    var areaCity = $(this).data('parentcity')
                    if ($(this).val() != '') {
                        $(this).css('display', 'none')
                    }
                    if (areaCity == city) {
                        $(this).css('display', 'block')
                    }
                })
            } else {
                current_form.find('select[name="area"]').selectpicker('val', '')
                current_form.find('select[name="area"] option').each(function () {
                    $(this).css('display', 'block')
                })
            }
            current_form.find('select[name="area"]').selectpicker('refresh')
        }

        var populate_city_dropdown = function (current_form) {
            var state
            state = current_form.find('select[name="state"] option:selected').val()
            //state  = current_form.find('select[name="state"] option:selected').val()

            if (state != '') {
                current_form.find('select[name="location"], select[name="area"]').selectpicker('val', '')
                current_form.find('select[name="location"] option').each(function () {
                    var cityState = $(this).data('parentstate')

                    if ($(this).val() != '') {
                        $(this).css('display', 'none')
                    }
                    if (cityState == state) {
                        $(this).css('display', 'block')
                    }
                })
            } else {
                current_form.find('select[name="location"], select[name="area"]').selectpicker('val', '')
                current_form.find('select[name="location"] option').each(function () {
                    $(this).css('display', 'block')
                })
                current_form.find('select[name="area"] option').each(function () {
                    $(this).css('display', 'block')
                })
            }
            current_form.find('select[name="location"], select[name="area"]').selectpicker('refresh')
        }

        var populate_state_dropdown = function (current_form) {
            var country
            country = current_form.find('select[name="country"] option:selected').val()

            if (country != '') {
                current_form.find('select[name="location"], select[name="area"], select[name="state"]').selectpicker('val', '')
                current_form.find('select[name="state"] option').each(function () {
                    var stateCountry = $(this).data('parentcountry')

                    if (typeof stateCountry !== "undefined") {
                        stateCountry = stateCountry.toUpperCase()
                    }

                    if ($(this).val() != '') {
                        $(this).css('display', 'none')
                    }
                    if (stateCountry == country) {
                        $(this).css('display', 'block')
                    }
                })
            } else {
                current_form.find('select[name="location"], select[name="area"], select[name="state"]').selectpicker('val', '')
                current_form.find('select[name="state"] option').each(function () {
                    $(this).css('display', 'block')
                })
                current_form.find('select[name="area"] option').each(function () {
                    $(this).css('display', 'block')
                })
            }
            current_form.find('select[name="location"], select[name="area"], select[name="state"]').selectpicker('refresh')
        }

        if ($("#houzez-listing-map").length > 0 || $('#mapViewHalfListings').length > 0) {
            var current_page = 0
            $('select[name="area"], select[name="label"], select[name="bedrooms"], select[name="bathrooms"], select[name="min-price"], select[name="max-price"], input[name="min-price"], input[name="max-price"], input[name="min-area"], input[name="max-area"], select[name="type"], input[name="property_id"]').on('change', function () {
                var current_form = $(this).parents('form')
                var form_widget = $(this).parents('.widget_houzez_advanced_search')
                houzez_search_on_change(current_form, form_widget, current_page)
            })

            $('input[name="keyword"]').on('change', function () {
                var current_form = $(this).parents('form')
                var form_widget = $(this).parents('.widget_houzez_advanced_search')

                setTimeout(function () {
                    houzez_search_on_change(current_form, form_widget, current_page)
                }, 100)
            })

            $("input.search_location").geocomplete({
                details: "form",
                country: houzez_geocomplete_country,
                geocodeAfterResult: true
            }).bind("geocode:result", function (event, result) {
                var current_form = $(this).parents('form')
                var form_widget = $(this).parents('.widget_houzez_advanced_search')
                houzez_search_on_change(current_form, form_widget, current_page)
                console.log(result)
            })

            $('#half_map_update').on('click', function (e) {
                e.preventDefault()
                var current_form = $(this).parents('form')
                var form_widget = $(this).parents('.widget_houzez_advanced_search')
                houzez_search_on_change(current_form, form_widget, current_page)
            })

            $('select[name="radius"]').on('change', function () {
                var current_form = $(this).parents('form')
                var form_widget = $(this).parents('.widget_houzez_advanced_search')
                houzez_search_on_change(current_form, form_widget, current_page)
            })

            $('select[name="country"]').on('change', function () {
                var current_form = $(this).parents('form')
                var form_widget = $(this).parents('.widget_houzez_advanced_search')
                var only_country = 'yes'
                houzez_search_on_change(current_form, form_widget, current_page, '', '', '', '', only_country)
                populate_state_dropdown(current_form)
            })

            $('select[name="state"]').on('change', function () {
                var current_form = $(this).parents('form')
                var form_widget = $(this).parents('.widget_houzez_advanced_search')
                var only_state = 'yes'
                houzez_search_on_change(current_form, form_widget, current_page, '', '', '', only_state)
                populate_city_dropdown(current_form)
            })

            $('select[name="location"]').on('change', function () {
                var current_form = $(this).parents('form')
                var form_widget = $(this).parents('.widget_houzez_advanced_search')
                var only_city = 'yes'
                houzez_search_on_change(current_form, form_widget, current_page, '', '', only_city)
                populate_area_dropdown(current_form)
            })

            $('input[name="feature[]"]').on('change', function () {
                var current_form = $(this).parents('form')
                var form_widget = $(this).parents('.widget_houzez_advanced_search')
                houzez_search_on_change(current_form, form_widget, current_page)
            })

            $(".search-date").on("change", function (e) {
                var current_form = $(this).parents('form')
                var form_widget = $(this).parents('.widget_houzez_advanced_search')
                houzez_search_on_change(current_form, form_widget, current_page)
            })

            $('select[name="status"]').on('change', function () {
                var current_form = $(this).parents('form')
                var form_widget = $(this).parents('.widget_houzez_advanced_search')

                var search_status = $(this).val()
                if (search_status == rent_status_for_price_range) {
                    if (advanced_search_price_slide != 0) {
                        houzez_search_on_change(current_form, form_widget, current_page, advanced_search_price_range_min_rent, advanced_search_price_range_max_rent)
                    } else {
                        houzez_search_on_change(current_form, form_widget, current_page)
                    }
                } else {
                    if (advanced_search_price_slide != 0) {
                        houzez_search_on_change(current_form, form_widget, current_page, advanced_search_price_range_min, advanced_search_price_range_max)
                    } else {
                        houzez_search_on_change(current_form, form_widget, current_page)
                    }
                }

            })

            houzez_header_listing_map()
        } else {
            $('select[name="country"]').on('change', function () {
                var current_form = $(this).parents('form')
                populate_state_dropdown(current_form)
            })

            $('select[name="location"]').on('change', function () {
                var current_form = $(this).parents('form')
                populate_area_dropdown(current_form)
            })

            $('select[name="state"]').on('change', function () {
                var current_form = $(this).parents('form')
                populate_city_dropdown(current_form)
            })

            if ($("input.search_location").length > 0) {
                $("input.search_location").geocomplete({
                    details: "form",
                    country: houzez_geocomplete_country,
                    geocodeAfterResult: true
                })
            }
        }

        var remove_map_loader = function (map) {
            google.maps.event.addListener(map, 'tilesloaded', function () {
                jQuery('#houzez-map-loading').hide()
            })
        }


        /* ------------------------------------------------------------------------ */
        /*  RANGE SLIDER
        /* ------------------------------------------------------------------------ */
        var price_range_main_search = function (min_price, max_price) {
            $(".price-range-advanced").slider({
                range: true,
                min: min_price,
                max: max_price,
                values: [min_price, max_price],
                slide: function (event, ui) {
                    if (currency_position == 'after') {
                        var min_price_range = addCommas(ui.values[0]) + currency_symb
                        var max_price_range = addCommas(ui.values[1]) + currency_symb
                    } else {
                        var min_price_range = currency_symb + addCommas(ui.values[0])
                        var max_price_range = currency_symb + addCommas(ui.values[1])
                    }
                    $(".min-price-range-hidden").val(min_price_range)
                    $(".max-price-range-hidden").val(max_price_range)

                    $(".min-price-range").text(min_price_range)
                    $(".max-price-range").text(max_price_range)
                },
                stop: function (event, ui) {

                    if ($("#houzez-listing-map").length > 0 || $('#mapViewHalfListings').length > 0) {
                        var current_page = 0
                        var current_form = $(this).parents('form')
                        var form_widget = $(this).parents('form')
                        houzez_search_on_change(current_form, form_widget, current_page)
                    }
                }
            })

            if (currency_position == 'after') {
                var min_price_range = addCommas($(".price-range-advanced").slider("values", 0)) + currency_symb
                var max_price_range = addCommas($(".price-range-advanced").slider("values", 1)) + currency_symb
            } else {
                var min_price_range = currency_symb + addCommas($(".price-range-advanced").slider("values", 0))
                var max_price_range = currency_symb + addCommas($(".price-range-advanced").slider("values", 1))
            }
            $(".min-price-range-hidden").val(min_price_range)
            $(".max-price-range-hidden").val(max_price_range)

            $(".min-price-range").text(min_price_range)
            $(".max-price-range").text(max_price_range)
        }

        if ($(".price-range-advanced").length > 0) {
            price_range_main_search(advanced_search_price_range_min, advanced_search_price_range_max)
        }
        $('.houzez-adv-price-range select[name="status"]').on('change', function () {
            var search_status = $(this).val()
            if (search_status == rent_status_for_price_range) {
                price_range_main_search(advanced_search_price_range_min_rent, advanced_search_price_range_max_rent)
            } else {
                price_range_main_search(advanced_search_price_range_min, advanced_search_price_range_max)
            }
        })

        /* On page load (as on search page) */
        var selected_status_adv_search = $('.houzez-adv-price-range select[name="status"]').val()
        if (selected_status_adv_search == rent_status_for_price_range) {
            price_range_main_search(advanced_search_price_range_min_rent, advanced_search_price_range_max_rent)
        }

        var price_range_widget = function (min_price, max_price) {
            $("#slider-price").slider({
                range: true,
                min: min_price,
                max: max_price,
                values: [min_price, max_price],
                slide: function (event, ui) {
                    $("#min-price").val(currency_symb + addCommas(ui.values[0]))
                    $("#max-price").val(currency_symb + addCommas(ui.values[1]))
                },
                stop: function (event, ui) {

                    if ($("#houzez-listing-map").length > 0) {
                        var current_form = $(this).parents('form')
                        var form_widget = $(this).parents('.widget_houzez_advanced_search')
                        houzez_search_on_change(current_form, form_widget)
                    }
                }
            })
            $("#min-price").val(currency_symb + addCommas($("#slider-price").slider("values", 0)))
            $("#max-price").val(currency_symb + addCommas($("#slider-price").slider("values", 1)))
        }

        if ($("#slider-price").length > 0) {
            price_range_widget(advanced_search_price_range_min, advanced_search_price_range_max)
        }

        $('#widget_status').on('change', function () {
            var search_status = $(this).val()
            if (search_status == rent_status_for_price_range) {
                price_range_widget(advanced_search_price_range_min_rent, advanced_search_price_range_max_rent)
            } else {
                price_range_widget(advanced_search_price_range_min, advanced_search_price_range_max)
            }
        })

        /* On page load (as on search page) */
        var selected_status_widget_search = $('#widget_status').val()
        if (selected_status_widget_search == rent_status_for_price_range) {
            price_range_widget(advanced_search_price_range_min_rent, advanced_search_price_range_max_rent)
        }


        if ($("#slider-size").length > 0) {
            $("#slider-size").slider({
                range: true,
                min: advanced_search_widget_min_area,
                max: advanced_search_widget_max_area,
                values: [advanced_search_widget_min_area, advanced_search_widget_max_area],
                slide: function (event, ui) {
                    $("#min-size").val(ui.values[0] + ' ' + measurement_unit)
                    $("#max-size").val(ui.values[1] + ' ' + measurement_unit)
                },
                stop: function (event, ui) {

                    if ($("#houzez-listing-map").length > 0) {
                        var current_page = 0
                        var current_form = $(this).parents('form')
                        var form_widget = $(this).parents('.widget_houzez_advanced_search')
                        houzez_search_on_change(current_form, form_widget, current_page)
                    }
                }
            })
            $("#min-size").val($("#slider-size").slider("values", 0) + ' ' + measurement_unit)
            $("#max-size").val($("#slider-size").slider("values", 1) + ' ' + measurement_unit)
        }

        var radius_search_slider = function (default_radius) {
            $("#radius-range-slider").slider({
                value: default_radius,
                min: 0,
                max: 100,
                step: 1,
                slide: function (event, ui) {
                    $("#radius-range-text").html(ui.value)
                    $("#radius-range-value").val(ui.value)
                },
                stop: function (event, ui) {

                    if ($("#houzez-listing-map").length > 0 || $('#mapViewHalfListings').length > 0) {
                        var current_page = 0
                        var current_form = $(this).parents('form')
                        var form_widget = $(this).parents('form')
                        houzez_search_on_change(current_form, form_widget, current_page)
                    }
                }
            })

            $("#radius-range-text").html($('#radius-range-slider').slider('value'))
            $("#radius-range-value").val($('#radius-range-slider').slider('value'))
        }

        if ($("#radius-range-slider").length > 0) {
            radius_search_slider(houzez_default_radius)
        }

        var houzez_infobox_trigger = function () {
            $('.infobox_trigger').each(function (i) {
                $(this).on('mouseenter', function () {
                    if (houzezMap) {
                        google.maps.event.trigger(markers[i], 'click')
                        //markers[i].setAnimation(google.maps.Animation.BOUNCE)
                    }
                })
                $(this).on('mouseleave', function () {
                    infobox.open(null, null)
                    //markers[i].setAnimation(null)
                })
            })
            return false
        }


        /*--------------------------------------------------------------------------
         *  Currency Switcher
         * -------------------------------------------------------------------------*/
        var currencySwitcherList = $('#houzez-currency-switcher-list')
        if (currencySwitcherList.length > 0) {

            $('#houzez-currency-switcher-list > li').click(function (e) {
                e.stopPropagation()
                currencySwitcherList.slideUp(200)

                var selectedCurrencyCode = $(this).data('currency-code')

                if (selectedCurrencyCode) {

                    $('#houzez-selected-currency span').html(selectedCurrencyCode)
                    $('#houzez-switch-to-currency').val(selectedCurrencyCode)
                    var security = $('#currency_switch_security').val()
                    var houzez_switch_to_currency = $('#houzez-switch-to-currency').val()
                    fave_processing_modal('<i class="' + process_loader_spinner + '"></i> ' + currency_updating_msg)

                    $.ajax({
                        url: ajaxurl,
                        dataType: 'JSON',
                        method: 'POST',
                        data: {
                            'action': 'houzez_currency_converter',
                            'currency_converter': houzez_switch_to_currency,
                            'security': security
                        },
                        success: function (res) {
                            if (res.success) {
                                window.location.reload()
                            } else {
                                console.log(res)
                            }
                        },
                        error: function (xhr, status, error) {
                            var err = eval("(" + xhr.responseText + ")")
                            console.log(err.Message)
                        }
                    })

                }

            })

            $('#houzez-selected-currency').click(function (e) {
                currencySwitcherList.slideToggle(200)
                e.stopPropagation()
            })

            $('html').click(function () {
                currencySwitcherList.slideUp(100)
            })
        }


        /*--------------------------------------------------------------------------
         *  Area Switcher
         * -------------------------------------------------------------------------*/
        var areaSwitcherList = $('#houzez-area-switcher-list')
        if (areaSwitcherList.length > 0) {

            $('#houzez-area-switcher-list > li').click(function (e) {
                e.stopPropagation()
                areaSwitcherList.slideUp(200)

                var selectedAreaCode = $(this).data('area-code')
                var houzez_switch_area_text = $('#houzez_switch_area_text').val()

                if (selectedAreaCode) {

                    $('#houzez-selected-area span').html(houzez_switch_area_text)
                    $('#houzez-switch-to-area').val(selectedAreaCode)
                    var security = $('#area_switch_security').val()
                    var houzez_switch_to_area = $('#houzez-switch-to-area').val()
                    fave_processing_modal('<i class="' + process_loader_spinner + '"></i> ' + measurement_updating_msg)

                    $.ajax({
                        url: ajaxurl,
                        dataType: 'JSON',
                        method: 'POST',
                        data: {
                            'action': 'houzez_switch_area',
                            'switch_to_area': houzez_switch_to_area,
                            'security': security
                        },
                        success: function (res) {
                            if (res.success) {
                                window.location.reload()
                            } else {
                                console.log(res)
                            }
                        },
                        error: function (xhr, status, error) {
                            var err = eval("(" + xhr.responseText + ")")
                            console.log(err.Message)
                        }
                    })

                }

            })

            $('#houzez-selected-area').click(function (e) {
                areaSwitcherList.slideToggle(200)
                e.stopPropagation()
            })

            $('html').click(function () {
                areaSwitcherList.slideUp(100)
            })
        }

        /*--------------------------------------------------------------------------
         *  AutoComplete Search
         * -------------------------------------------------------------------------*/
        if (keyword_autocomplete != 0) {
            var houzezAutoComplete = function () {

                var ajaxCount = 0
                var auto_complete_container = $('.auto-complete')
                var lastLenght = 0

                $('input[name="keyword"]').keyup(function () {

                    var $this = $(this)
                    var $form = $this.parents('form')
                    var auto_complete_container = $form.find('.auto-complete')
                    var keyword = $(this).val()
                    keyword = $.trim(keyword)
                    var currentLenght = keyword.length

                    if (currentLenght >= 2 && currentLenght != lastLenght) {

                        lastLenght = currentLenght
                        auto_complete_container.fadeIn()

                        let dataSearch = {
                            'action': 'houzez_get_auto_complete_search',
                            'keyword': keyword,
                            'lat': '15.989239746610254,16.170679502513632',
                            'lng': '108.07970273500973,108.33273160463864',
                        }

                        if (houseMapComponent.cookie.data) {
                            let data = houseMapComponent.cookie.data
                            if (data.range_latlng) {
                                dataSearch.lat = data.range_latlng.lat
                                dataSearch.lng = data.range_latlng.lng
                            }
                        }
                        $.ajax({
                            type: 'POST',
                            url: ajaxurl,
                            data: dataSearch,
                            beforeSend: function () {
                                ajaxCount++
                                if (ajaxCount == 1) {
                                    auto_complete_container.html('<div class="result"><p><i class="fa fa-spinner fa-spin fa-fw"></i> ' + autosearch_text + '</p></div>')
                                }
                            },
                            success: function (data) {
                                ajaxCount--
                                if (ajaxCount == 0) {
                                    auto_complete_container.show()
                                    if (data != '') {
                                        auto_complete_container.empty().html(data).bind()
                                    }
                                }
                            },
                            error: function (errorThrown) {
                                ajaxCount--
                                if (ajaxCount == 0) {
                                    auto_complete_container.html('<div class="result"><p><i class="fa fa-spinner fa-spin fa-fw"></i> ' + autosearch_text + ' </p></div>')
                                }
                            }
                        })

                    } else {
                        if (currentLenght != lastLenght) {
                            auto_complete_container.fadeOut()
                        }
                    }

                })
                auto_complete_container.on('click', 'li', function () {
                    $('input[name="keyword"]').val($(this).data('text'))
                    auto_complete_container.fadeOut()
                }).bind()
            }
            houzezAutoComplete()
        }


        /*---------------------------------------------------------------------------
         *
         * Messaging system
         * -------------------------------------------------------------------------*/

        /*
         * Property Thread Form
         * -----------------------------*/
        $('.start_thread_form').click(function (e) {

            e.preventDefault()

            var $this = $(this)
            var $form = $this.parents('form')
            var $result = $form.find('.form_messages')

            $.ajax({
                url: ajaxurl,
                data: $form.serialize(),
                method: $form.attr('method'),
                dataType: "JSON",

                beforeSend: function () {
                    $this.children('i').remove()
                    $this.prepend('<i class="fa-left ' + process_loader_spinner + '"></i>')
                },
                success: function (response) {
                    if (response.success) {
                        $result.empty().append(response.msg)
                        $form.find('input').val('')
                        $form.find('textarea').val('')
                    } else {
                        $result.empty().append(response.msg)
                    }
                },
                error: function (xhr, status, error) {
                    var err = eval("(" + xhr.responseText + ")")
                    console.log(err.Message)
                },
                complete: function () {
                    $this.children('i').removeClass(process_loader_spinner)
                    $this.children('i').addClass(success_icon)
                }
            })

        })


        /*
         * Property Message Notifications
         * -----------------------------*/
        //  var houzez_message_notifications = function () {

        //     $.ajax({
        //         url: ajaxurl,
        //         data: {
        //             action : 'houzez_chcek_messages_notifications'
        //         },
        //         method: "POST",
        //         dataType: "JSON",

        //         beforeSend: function() {
        //             // code here...
        //         },
        //         success: function(response) {
        //             if(response.success) {
        //                 if (response.notification) {
        //                     $('.user-alert').show()
        //                     $('.msg-alert').show()
        //                 } else {
        //                     $('.user-alert').hide()
        //                     $('.msg-alert').hide()
        //                 }
        //             }
        //         }
        //     })

        // }

        // $(document).ready(function() {
        //     houzez_message_notifications()
        //     setInterval(function() { houzez_message_notifications() }, 180000)
        // })


        /*
         * Property Thread Message Form
         * -----------------------------*/
        $('.start_thread_message_form').click(function (e) {

            e.preventDefault()

            var $this = $(this)
            var $form = $this.parents('form')
            var $result = $form.find('.form_messages')

            $.ajax({
                url: ajaxurl,
                data: $form.serialize(),
                method: $form.attr('method'),
                dataType: "JSON",

                beforeSend: function () {
                    $this.children('i').remove()
                    $this.prepend('<i class="fa-left ' + process_loader_spinner + '"></i>')
                },
                success: function (response) {
                    window.location.replace(response.url)
                },
                complete: function () {
                    $this.children('i').removeClass(process_loader_spinner)
                    $this.children('i').addClass(success_icon)
                }
            })

        })

        var agency_listings_ajax_pagi = function () {
            $('body.single-houzez_agency ul.pagination li a').click(function (e) {
                e.preventDefault()
                var current_page = $(this).data('houzepagi')
                var agency_id_pagi = $('#agency_id_pagi').val()

                var ajax_container = $('#houzez_ajax_container')

                $.ajax({
                    url: ajaxurl,
                    method: 'POST',
                    data: {
                        'action': 'houzez_ajax_agency_filter',
                        'paged': current_page,
                        'agency_id': agency_id_pagi
                    },
                    beforeSend: function () {
                        ajax_container.empty().append('' +
                            '<div class="list-loading">' +
                            '<div class="list-loading-bar"></div>' +
                            '<div class="list-loading-bar"></div>' +
                            '<div class="list-loading-bar"></div>' +
                            '<div class="list-loading-bar"></div>' +
                            '</div>'
                        )
                    },
                    success: function (response) {
                        ajax_container.empty().html(response)
                        agency_listings_ajax_pagi()
                    },
                    complete: function () {},
                    error: function (xhr, status, error) {
                        var err = eval("(" + xhr.responseText + ")")
                        console.log(err.Message)
                    }
                })

            })
            return false
        }

        if ($('body.single-houzez_agency').length > 0) {
            agency_listings_ajax_pagi()
        }


        /*--------------------------------------------------------------------------
         *  Delete property
         * -------------------------------------------------------------------------*/
        $('a.delete-property').on('click', function () {
            var r = confirm(delete_property_confirmation)
            if (r == true) {

                var $this = $(this)
                var propID = $this.data('id')
                var propNonce = $this.data('nonce')

                fave_processing_modal(delete_property_loading)

                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: ajaxurl,
                    data: {
                        'action': 'houzez_delete_property',
                        'prop_id': propID,
                        'security': propNonce
                    },
                    success: function (data) {
                        if (data.success == true) {
                            window.location.reload()
                        } else {
                            jQuery('#fave_modal').modal('hide')
                            alert(data.reason)
                        }
                    },
                    error: function (errorThrown) {

                    }
                })

            }
        })

        /*--------------------------------------------------------------------------
         *  Single Property
         * -------------------------------------------------------------------------*/
        if (is_singular_property == "yes") {
            var houzezSlidesToShow = 0
            if (property_detail_top == 'v3') {
                houzezSlidesToShow = '8'
            } else {
                houzezSlidesToShow = '11'
            }

            var gallery_autoplay = VARIABLE_JS.gallery_autoplay

            if (gallery_autoplay === '1') {
                gallery_autoplay = true
            } else {
                gallery_autoplay = false
            }

            var detail_slider = $('.detail-slider')
            var detail_slider_nav = $('.detail-slider-nav')
            var slidesPerPage = 4 //globaly define number of elements per page
            var syncedSecondary = true
            var slider_speed = 1200

            var houzez_detail_slider_main_settings = function () {
                return {
                    stopOnHover: true,
                    items: 1,
                    rtl: houzez_rtl,
                    margin: 0,
                    nav: true,
                    dots: false,
                    loop: true,
                    navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
                    autoplay: gallery_autoplay,
                    smartSpeed: slider_speed,
                    autoplaySpeed: slider_speed,
                    responsiveRefreshRate: 200
                    //rewindNav: true
                }
            }
            var houzez_detail_slider_nav_settings = function () {
                return {
                    margin: 1,
                    //items: houzezSlidesToShow,
                    center: false,
                    nav: false,
                    rtl: houzez_rtl,
                    dots: false,
                    loop: false,
                    navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
                    autoplay: false,
                    smartSpeed: 800,
                    autoplaySpeed: 800,
                    responsiveRefreshRate: 10,
                    responsive: {

                        0: {
                            items: 5
                        },
                        767: {
                            items: 7
                        },
                        992: {
                            items: 9
                        },
                        1199: {
                            items: houzezSlidesToShow
                        }

                    }
                }
            }

            var property_detail_slideshow = function () {

                detail_slider.owlCarousel(houzez_detail_slider_main_settings()).on('changed.owl.carousel', syncPosition)

                detail_slider_nav.on('initialized.owl.carousel', function () {
                    detail_slider_nav.find(".owl-item").eq(0).addClass("current")
                }).owlCarousel(houzez_detail_slider_nav_settings()) /*.on('changed.owl.carousel', syncPosition2)*/

                function syncPosition(el) {
                    //if you set loop to false, you have to restore this next line
                    var current = el.item.index - 4

                    detail_slider_nav.find(".owl-item").removeClass("current").eq(current).addClass("current")
                    var onscreen = detail_slider_nav.find('.owl-item.active').length - 1
                    var start = detail_slider_nav.find('.owl-item.active').first().index()
                    var end = detail_slider_nav.find('.owl-item.active').last().index()

                    if (current > end) {
                        detail_slider_nav.data('owl.carousel').to(current, 100, true)
                    }
                    if (current < start) {
                        detail_slider_nav.data('owl.carousel').to(current - onscreen, 100, true)
                    }
                }

                function syncPosition2(el) {
                    if (syncedSecondary) {
                        var number = el.item.index
                        detail_slider.data('owl.carousel').to(number, 100, true)
                    }
                }

                detail_slider_nav.on("click", ".owl-item", function (e) {
                    e.preventDefault()
                    var number = $(this).index()
                    detail_slider.data('owl.carousel').to(number, slider_speed, true)
                })

            }
            property_detail_slideshow()
        }

        if (is_singular_property == 'yes') {

            $('#property-rating').rating({
                step: 0.5,
                showClear: false
                //starCaptions: {1: 'Very Poor', 2: 'Poor', 3: 'Ok', 4: 'Good', 5: 'Very Good'},
                //starCaptionClasses: {1: 'text-danger', 2: 'text-warning', 3: 'text-info', 4: 'text-primary', 5: 'text-success'}

            })

            //     rating-display-only
            $('.rating-display-only').rating({
                disabled: true,
                showClear: false
            })

            /*--------------------------------------------------------------------------
             *  Property Rating
             * -------------------------------------------------------------------------*/
            $('.property_rating').click(function (e) {

                e.preventDefault()

                var $this = $(this)
                var $form = $this.parents('form')
                var $result = $form.find('.form_messages')

                $.ajax({
                    url: ajaxurl,
                    data: $form.serialize(),
                    method: $form.attr('method'),
                    dataType: "JSON",

                    beforeSend: function () {
                        $this.children('i').remove()
                        $this.prepend('<i class="fa-left ' + process_loader_spinner + '"></i>')
                    },
                    success: function (response) {
                        window.location.reload()
                    },
                    complete: function () {
                        $this.children('i').removeClass(process_loader_spinner)
                        $this.children('i').addClass(success_icon)
                    }
                })

            })

            // tabs Height
            var tabsHeight = function () {
                var gallery_tab = $(".detail-media #gallery")
                var tab_content = $(".detail-media .tab-content")
                var map_tab = $("#singlePropertyMap,#street-map")

                var map_tab_height = map_tab.outerHeight()
                var gallery_tab_height = gallery_tab.outerHeight()
                var tab_content_height = tab_content.outerHeight()

                if (gallery_tab.is(':visible')) {
                    map_tab.css('min-height', gallery_tab_height)
                    //alert(gallery_tab_height)
                } else {
                    map_tab.css('min-height', map_tab_height)
                    //alert($(".detail-media #gallery").outerHeight())

                }
            }

            $(window).on('load', function () {
                tabsHeight()
            })
            $(window).on('resize', function () {
                //alert(jQuery("#gallery").height())
                tabsHeight()
            }) // End tabs height

            // Map and street view
            if (property_map != 0 && $('#singlePropertyMap').length > 0) {
                var map = null
                var panorama = null
                var fenway = new google.maps.LatLng(prop_lat, prop_lng)
                var mapOptions = {
                    center: fenway,
                    zoom: 15,
                    scrollwheel: false
                }
                var panoramaOptions = {
                    position: fenway,
                    pov: {
                        heading: 34,
                        pitch: 10
                    }
                }

                var initialize = function () {
                    if (document.getElementById('singlePropertyMap')) {
                        map = new google.maps.Map(document.getElementById('singlePropertyMap'), mapOptions)
                    }

                    if ($('#street-map').length > 0) {
                        panorama = new google.maps.StreetViewPanorama(document.getElementById('street-map'), panoramaOptions)
                    }

                    $.ajax({
                        type: 'POST',
                        dataType: 'json',
                        url: '/get-detail-property',
                        data: {
                            'id': $('#getPropertiesId').data('id'),
                        },
                        success: function (data) {
                            if (google_map_style !== '') {
                                var styles = JSON.parse(google_map_style)
                                map.setOptions({
                                    styles: styles
                                })
                            }

                            if (data.status === true) {
                                houzezAddMarkers(data.data, map)
                                postComponent.cookie.addOrUpdate(data.data[0].id)
                                houzezSetPOIControls(map, map.getCenter())
                            }
                        },
                        error: function (errorThrown) {

                        }
                    })

                }
                $('a[href="#gallery"]').on('shown.bs.tab', function () {
                    setTimeout(tabsHeight, 500)
                })
                $('a[href="#singlePropertyMap"]').on('shown.bs.tab', function () {
                    google.maps.event.trigger(map, "resize")
                    console.log(fenway)
                    map.setCenter(fenway)
                })
                $('a[href="#street-map"]').on('shown.bs.tab', function () {
                    fenway = panorama.getPosition()
                    panoramaOptions.position = fenway
                    panorama = new google.maps.StreetViewPanorama(document.getElementById('street-map'), panoramaOptions)
                })

                google.maps.event.addDomListener(window, 'load', initialize)


            } // End map and street


            //
            $(".houzez-gallery-prop-v2:first a[rel^='prettyPhoto']").prettyPhoto({
                animation_speed: 'normal',
                slideshow: 5000,
                autoplay_slideshow: false,
                allow_resize: true,
                keyboard_shortcuts: true,
                theme: 'pp_default' /* pp_default / light_rounded / dark_rounded / light_square / dark_square / facebook */
            })

        }


    } // typeof VARIABLE_JS

}) // end document ready