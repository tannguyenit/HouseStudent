MapAction = function (options) {
    this.config(options)
    this.init()
}

MapAction.prototype = {
    config: function (options) {
        this.cookie = options.cookie
        this.map = options.map
        this.ipinfo_location = 1
        this.img = options.img
        this.primary_color = '#00aeef'
        this.options = options
        this.element = {
            getLocation: document.getElementById('houzez-gmap-location'),
            mapZoomIn: document.getElementById('listing-mapzoomin'),
            mapZoomOut: document.getElementById('listing-mapzoomout'),
            inputSearch: document.getElementById('google-map-search'),
        }
    },
    init: function () {
        this.buttonGetLocation()
    },
    buttonGetLocation: function () {
        const _self = this
        if (this.element.getLocation) {
            google.maps.event.addDomListener(this.element.getLocation, 'click', function () {
                _self.cookie.remove()
                _self.getCurrentLocation()
            });
        }
    },
    getCurrentLocation: function () {
        const _self = this
        const map = _self.map
        const clusterIcon = _self.img.clusterIcon
        const getCookie = _self.cookie.getCookie()
        if (getCookie) {
            _self.cookie.setPositionMap()
            return
        }

        // get my location usesing HTML5 geolocation
        var googleGeoProtocol = true
        var isChrome = !!window.chrome && !!window.chrome.webstore

        if (isChrome) {
            if (document.location.protocol === 'http:' && this.ipinfo_location != 0) {
                googleGeoProtocol = false
            }
        }

        if (googleGeoProtocol) {
            console.log('=navigator.geolocation', navigator.geolocation)
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (position) {
                    let position = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    }

                    console.log('get position')
                    console.log(this.map.getBounds())


                    var geocoder = new google.maps.Geocoder

                    geocoder.geocode({
                        'location': pos
                    }, function (results, status) {
                        if (status === 'OK') {
                            if (results[1]) {
                                console.log(results[1])
                                // map.setZoom(11)
                                var marker = new google.maps.Marker({
                                    position: pos,
                                    map: map
                                })
                                /*infowindow.setContent(results[1].formatted_address)
                                infowindow.open(map, marker)*/
                            } else {
                                window.alert('No results found')
                            }
                        } else {
                            window.alert('Geocoder failed due to: ' + status)
                        }
                    })

                    // alert('icon : ' + clusterIcon)

                    var circle = new google.maps.Circle({
                        radius: 10 * 200,
                        center: position,
                        map: map,
                        icon: clusterIcon,
                        fillColor: this.primary_color,
                        fillOpacity: 0.1,
                        strokeColor: this.primary_color,
                        strokeOpacity: 0.3
                    })

                    // circle.bindTo('center', marker, 'position')
                    map.fitBounds(circle.getBounds())
                    map.setCenter(position)
                    _self.cookie.update()

                }, function () {
                    this.handleLocationError(true, map, map.getCenter())
                })
            }

            // noinspection JSAnnotator

        } else {
            this.getJsonIpInfo()
        }
    },
    handleLocationError: function (browserHasGeolocation, infoWindow, position) {
        let map = this.map
        infoWindow = new google.maps.InfoWindow
        infoWindow.setPosition(position)
        infoWindow.setContent(browserHasGeolocation ?
            'Error: The Geolocation service failed.' :
            'Error: Your browser doesn\'t support geolocation.')
        infoWindow.open(map)
    },
    getJsonIpInfo: function () {
        const clusterIcon = this.img.clusterIcon
        const map = this.map
        const _self = this
        $.getJSON('https://ipinfo.io/json', function (data) {
            let localtion = data.loc
            localtion = localtion.split(",")

            localtion = {
                lat: localtion[0] * 1,
                lng: localtion[1] * 1
            }
            const circle = new google.maps.Circle({
                radius: 10 * 100,
                center: localtion,
                map: map,
                icon: clusterIcon,
                fillColor: '#00aeef',
                fillOpacity: 0.2,
                strokeColor: '#FFF',
                strokeOpacity: 0.6
            })

            map.fitBounds(circle.getBounds())
            _self.cookie.update()

            let marker = new google.maps.Marker({
                position: localtion,
                animation: google.maps.Animation.DROP,
                map: map
            })
            map.setCenter(localtion)
            map.setZoom(15)
        })
    },
    buttonZoomIn: function () {
        const map = this.map
        const _self = this
        if (_self.element.mapZoomIn) {
            google.maps.event.addDomListener(_self.element.mapZoomIn, 'click', function () {
                var current = parseInt(map.getZoom(), 10)
                current++
                if (current > 20) {
                    current = 20
                }
                map.setZoom(current)
            })
        }
    },
    buttonZoomOut: function () {
        const _self = this
        const map = _self.map
        if (_self.element.mapZoomOut) {
            google.maps.event.addDomListener(_self.element.mapZoomOut, 'click', function () {
                let current = parseInt(map.getZoom(), 10)
                current--
                if (current < 0) {
                    current = 0
                }
                map.setZoom(current)
            })
        }
    },
    inputSearch: function () {
        const _self = this
        const map = _self.map
        const inputSearch = _self.element.inputSearch
        if (inputSearch) {
            let searchBox = new google.maps.places.SearchBox(inputSearch)
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(inputSearch)

            // Bias the SearchBox results towards current map's viewport.
            map.addListener('bounds_changed', function () {
                searchBox.setBounds(map.getBounds())
            })

            let markers_location = []
            // Listen for the event fired when the user selects a prediction and retrieve
            // more details for that place.
            searchBox.addListener('places_changed', function () {
                let places = searchBox.getPlaces()

                if (places.length == 0) {
                    return
                }

                // Clear out the old markers.
                markers_location.forEach(function (marker) {
                    marker.setMap(null)
                })
                markers_location = []

                // For each place, get the icon, name and location.
                let bounds = new google.maps.LatLngBounds()
                places.forEach(function (place) {
                    let icon = {
                        url: place.icon,
                        size: new google.maps.Size(71, 71),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(17, 34),
                        scaledSize: new google.maps.Size(25, 25)
                    }

                    // Create a marker for each place.
                    markers_location.push(new google.maps.Marker({
                        map: map,
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
                map.fitBounds(bounds)
            })
        }
    },
    changeTypeMap: function () {
        const map = this.map
        $('.houzezMapType').click(function () {
            let maptype = $(this).data('maptype')
            if (maptype === 'roadmap') {
                map.setMapTypeId(google.maps.MapTypeId.ROADMAP)
            } else if (maptype === 'satellite') {
                map.setMapTypeId(google.maps.MapTypeId.SATELLITE)
            } else if (maptype === 'hybrid') {
                map.setMapTypeId(google.maps.MapTypeId.HYBRID)
            } else if (maptype === 'terrain') {
                map.setMapTypeId(google.maps.MapTypeId.TERRAIN)
            }
            return false
        })
    },
    nextMarker : function () {
        const _self = this
        const map = _self.map
        const markers = _self.options.markers.data
        let currentMarker = _self.options.markers.currentMarker

        if (markers.length === 0) {
            return
        }
        currentMarker++
        if (currentMarker > markers.length) {
            currentMarker = 1
        }
        while (markers[currentMarker - 1].visible === false) {
            currentMarker++
            if (currentMarker > markers.length) {
                currentMarker = 1
            }
        }
        if (map.getZoom() < 15) {
            map.setZoom(15)
        }
        google.maps.event.trigger(markers[currentMarker - 1], 'click')
        _self.options.markers.currentMarker = currentMarker
    },
    preMarker : function () {
        const _self = this
        const map = _self.map
        const markers = _self.options.markers.data
        let currentMarker = _self.options.markers.currentMarker

        if (markers.length === 0) {
            return
        }
        currentMarker--
        if (currentMarker < 1) {
            currentMarker = markers.length
        }
        
        while (markers[currentMarker - 1].visible === false) {
            currentMarker--
            if (currentMarker > markers.length) {
                currentMarker = 1
            }
        }

        if (map.getZoom() < 15) {
            map.setZoom(15)
        }
        google.maps.event.trigger(markers[currentMarker - 1], 'click')
        _self.options.markers.currentMarker = currentMarker
    }
}