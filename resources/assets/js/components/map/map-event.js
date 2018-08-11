MapEvent = function (options) {
    this.options = options
    this.element = {
        loading : $('#houzez-map-loading')
    }
}

MapEvent.prototype = {
    init: function () {

    },
    showLoading: function () {
        this.element.loading.show()
    },
    hideLoadingWhenShowTitleMap: function () {
        this.element.loading.hide()
    },
    triggerResize:function () {
        const map = this.options.map
        return google.maps.event.trigger(map, 'resize')
    },
    idleChange:function () {
        const map = this.options.map
        let mapDefaultZoom = this.options.constant.googlemap_default_zoom
        mapDefaultZoom = parseInt(mapDefaultZoom)
        let listener = google.maps.event.addListener(map, "idle", function () {
            if (map.getZoom() > mapDefaultZoom) {
                map.setZoom(mapDefaultZoom)
            }
            google.maps.event.removeListener(listener)
        })
    },
    markerClick: function () {
        const _self = this
        const markers = _self.options.markers.data
        const map = _self.options.map
        $.each(markers, function (index, marker) {
            let infobox = new InfoBox({
                disableAutoPan: true, //false
                maxWidth: 275,
                alignBottom: true,
                pixelOffset: new google.maps.Size(-122, -48),
                zIndex: null,
                closeBoxMargin: "0 0 -16px -16px",
                closeBoxURL: _self.options.img.infoboxClose,
                infoBoxClearance: new google.maps.Size(1, 1),
                isHidden: false,
                pane: "floatPane",
                enableEventPropagation: false
            })
            google.maps.event.addListener(marker, 'click', (function (marker, i) {
                return function () {
                    let scale = Math.pow(2, map.getZoom())
                    let offsety = ((100 / scale) || 0)
                    let projection = map.getProjection()
                    let markerPosition = marker.getPosition()
                    let markerScreenPosition = projection.fromLatLngToPoint(markerPosition)
                    let pointHalfScreenAbove = new google.maps.Point(markerScreenPosition.x, markerScreenPosition.y - offsety)
                    let aboveMarkerLatLng = projection.fromPointToLatLng(pointHalfScreenAbove)
                    map.setCenter(aboveMarkerLatLng)
                    infobox.setContent(infoboxContent)
                    infobox.open(map, marker)

                }
            })(marker, index))
        })


    }
}
