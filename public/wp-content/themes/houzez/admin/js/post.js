function Post(url) {
    this.url = url;
}
function Pin(url) {
    this.url = url;
}
Post.prototype = {
    init:function () {
        var _self = this;
        _self.onChange();
    },
    onChange: function () {
        var _self = this;
        $('.change-status').on('change', function () {
            var _this = $(this);
            var value = _this.val();
            var id = _this.closest('tr').attr('id');
            $.ajax({
                url: _self.url,
                type: "POST",
                dataType: 'JSON',
                async: false,
                data: {
                    status:value,
                    id:id,
                },
                success: function(response)
                {
                    if (response.status) {
                        _this.val(response.data.result);
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

Pin.prototype = {
    init:function () {
        var _self = this;
        _self.onChange();
    },
    onChange: function () {
        var _self = this;
        $('.channge-pin').on('change', function () {
            var _this = $(this);
            var value = _this.val();
            var id = _this.closest('select').attr('id');
            $.ajax({
                url: _self.url,
                type: "POST",
                dataType: 'JSON',
                async: false,
                data: {
                    status:value,
                    id:id,
                },
                success: function(response)
                {
                    if (response.status) {
                        _this.closest('tr').removeClass();
                        if(response.data.result == 2){
                            _this.closest('tr').addClass("bg-danger");
                        }else if(response.data.result == 1){
                            _this.closest('tr').addClass("bg-warning");
                        }
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
