MapMarker = function(options) {
    this.map = options.map
    this.options = options
    this.data = []
    this.currentMarker = 0
    this.MarkerClusterer = null
    this.initInfoBox()
}
MapMarker.prototype = {
    initInfoBox: function () {
        this.infobox = new InfoBox({
            disableAutoPan: true, //false
            maxWidth: 275,
            alignBottom: true,
            pixelOffset: new google.maps.Size(-122, -48),
            zIndex: null,
            closeBoxMargin: "0 0 -16px -16px",
            closeBoxURL: this.options.img.infoboxClose,
            infoBoxClearance: new google.maps.Size(1, 1),
            isHidden: false,
            pane: "floatPane",
            enableEventPropagation: false
        })
    },
    add:function (props) {
        const _self = this
        let map = _self.map
        $.each(props, function (index, prop) {
            let latlng = new google.maps.LatLng(prop.lat, prop.lng)
            let marker_url = prop.icon
            let marker_size = new google.maps.Size(44, 56)
            if (window.devicePixelRatio > 1.5) {
                if (prop.retinaIcon) {
                    marker_url = prop.retinaIcon
                    marker_size = new google.maps.Size(44, 56)
                }
            }

            let icon = {
                url: marker_url,
                size: marker_size,
                scaledSize: new google.maps.Size(44, 56),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(7, 27)
            }

            let marker = new google.maps.Marker({
                position: latlng,
                map: map,
                icon: icon,
                draggable: false,
                animation: google.maps.Animation.DROP,
                // title: 'marker-'+prop.sanitizetitle
            })
            let prop_title = prop.data ? prop.data.post_title : prop.title

            let infoboxContent = document.createElement("div")
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
                    let scale = Math.pow(2, map.getZoom())
                    let offsety = ((100 / scale) || 0)
                    let projection = map.getProjection()
                    let markerPosition = marker.getPosition()
                    if (projection) {
                        let markerScreenPosition = projection.fromLatLngToPoint(markerPosition)
                        let pointHalfScreenAbove = new google.maps.Point(markerScreenPosition.x, markerScreenPosition.y - offsety)
                        let aboveMarkerLatLng = projection.fromPointToLatLng(pointHalfScreenAbove)
                        _self.infobox.setContent(infoboxContent)
                        _self.infobox.open(map, marker)
                        map.setCenter(aboveMarkerLatLng)
                    }
                }
            })(marker, index))
            _self.data.push(marker)
        })

        return _self.data
    },
    removeAll: function() {
        const _self = this
        let markers = _self.data
        for (let i = 0; i < markers.length; i++) {
            markers[i].setMap(null)
        }
        return _self.data = []
    },
    fitBoundsFromMarkers: function () {
        let markers = this.data
        this.map.fitBounds(markers.reduce(function (bounds, marker) {
            return bounds.extend(marker.getPosition())
        }, new google.maps.LatLngBounds()))
    },
    addClusterer: function () {
        let map = this.map
        let clusterIcon = this.options.img.clusterIcon
        let markers = this.data

        this.MarkerClusterer = new MarkerClusterer(map, markers, {
            maxZoom: 18,
            gridSize: 60,
            styles: [{
                url: clusterIcon,
                width: 48,
                height: 48,
                textColor: "#fff"
            }]
        })
    }
}
