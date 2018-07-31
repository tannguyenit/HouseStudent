jQuery(function($) {
    "use strict";
    var geo_input = $("#geocomplete");
    var lat = $('#latitude').val();
    var lng = $('#longitude').val();
    function getLocationByGoogleMap() {
        geo_input.geocomplete({
            map: ".map_canvas",
            details: "form",
            location: [lat, lng],
            types: ["geocode", "establishment"],
            country: '',
            markerOptions: {
                draggable: true
            }
        });
        geo_input.bind("geocode:dragged", function(event, latLng) {
            $("input[name=lat]").val(latLng.lat());
            $("input[name=lng]").val(latLng.lng());
            $("#reset").show();
            var map = $("#geocomplete").geocomplete("map");
            map.panTo(latLng);
            var geocoder = new google.maps.Geocoder();
            geocoder.geocode({
                'latLng': latLng
            }, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[0]) {
                        var _length = results[0].address_components.length;
                        var road = results[0].address_components[1].long_name;
                        var town = results[0].address_components[_length-4].long_name;
                        var county = results[0].address_components[_length-3].long_name;
                        var country = results[0].address_components[_length-2].short_name;
                        var formatted_address = results[0].formatted_address;
                        $("input[name=address]").val(formatted_address);
                        $("#countyState").val(county);
                        $("#country").val(town);
                        $("#city").val(country);
                        $("#country_short").val(country);
                    }
                }
            });
        });
        geo_input.on('focus', function() {
            var map = $("#geocomplete").geocomplete("map");
            google.maps.event.trigger(map, 'resize')
        });
        $("#reset").on("click", function() {
            $("#geocomplete").geocomplete("resetMarker");
            $("#reset").hide();
            return false;
        });
        $("#find").on("click", function(e) {
            e.preventDefault();
            $("#geocomplete").trigger("geocode");
        });
    }
    getLocationByGoogleMap();
});
