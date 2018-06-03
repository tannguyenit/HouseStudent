var uiAutocompleteL10n = {
    "noResults": "No results found.",
    "oneResult": "1 result found. Use up and down arrow keys to navigate.",
    "manyResults": "%d results found. Use up and down arrow keys to navigate.",
    "itemSelected": "Item selected."
};
var prop_carousel_v2_uo8oC = {
    "slide_auto": "true",
    "auto_speed": "3000",
    "slide_dots": "true",
    "slide_infinite": "true",
    "slides_to_scroll": "1"
};
var prop_carousel_v2_cSQhv = {
    "slide_auto": "true",
    "auto_speed": "3000",
    "slide_dots": "true",
    "slide_infinite": "true",
    "slides_to_scroll": "1"
};
$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
})

function Pin(url) {
    this.url = url;
}

Pin.prototype = {
    init:function () {
        this.onChange();
    },
    onChange: function () {
        var _self = this;
        $('.channge-pin').on('click', function () {
            var _this = $(this);
            var id = _this.data('id');
            $.ajax({
                url: _self.url,
                type: "POST",
                dataType: 'JSON',
                async: false,
                data: {
                    id:id,
                },
                success: function(response)
                {
                    if (response.status) {
                        _this.closest('li').remove();
                    }
                    showNotification(response)
                },
                error: function (res) {
                    console.log(res);
                }
            });
        })
    },
}
