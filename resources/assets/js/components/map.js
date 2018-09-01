var HouseMaps = function () {}

HouseMaps.prototype = {
    config: function () {
        this.houzezHeaderMapOptions = {
            maxZoom: 20,
            disableDefaultUI: true,
            scrollwheel: false,
            scroll: {
                x: $(window).scrollLeft(),
                y: $(window).scrollTop()
            },
            zoom: parseInt(googlemap_default_zoom),
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            draggable: drgflag,
        }
        this.map = {}
        this.element = {
            map: $('#houzez-listing-map')
        }
    },
    init: function() {
        let _self = this
        _self.map = new google.maps.Map(_self.element.map, houzezHeaderMapOptions);
    }
}
