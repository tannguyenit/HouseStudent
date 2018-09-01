MapCookie = function(options) {
    this.data = {}
    this.map = options.map
    this.init()
}

MapCookie.prototype = {
    init: function () {
        this.update()
    },
    update: function () {
        let map = this.map
        let bounds =  map.getBounds()

        if (bounds) {
            let ne = bounds.getNorthEast()
            let sw = bounds.getSouthWest()
            let center = map.getCenter()
            let zoom = map.getZoom()
            let date = new Date()
            let minutes = 262800 // 6 month
            let expiresTime = date.setTime(date.getTime() + (minutes * 60 * 1000))

            let range_location = {
                lat: `${sw.lat()},${ne.lat()}`,
                lng: `${sw.lng()},${ne.lng()}`
            }
            let dataCookie = {
                position: {lat:center.lat(), lng:center.lng()},
                zoom: zoom,
                range_latlng: range_location
            }
            $.cookie('house_map', JSON.stringify(dataCookie), { expires: expiresTime })
            this.data = dataCookie
        }
    },
    getCookie:function () {
        if ($.cookie('house_map')) {
            this.data = JSON.parse($.cookie('house_map'))
            return this.data
        }

        return false
    },
    remove: function() {
        if ($.cookie('house_map')) {
            $.removeCookie('house_map', { path: '/' });
        }
    },
    setPositionMap: function () {
        let map = this.map
        let cookie = this.data

        if (cookie) {
            map.setCenter(cookie.position)
            map.setZoom(cookie.zoom)
        } else {
            console.log('Cant not set map from cookie')
        }
    }
}