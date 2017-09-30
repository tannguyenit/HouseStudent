function Post(){}
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
                url: '/change-status-post',
                type: "POST",
                dataType: 'JSON',
                async: false,
                data: {
                    status:value,
                    id:id,
                },
                success: function(data)
                {
                    if (data.status) {
                        _this.val(data.result);
                        toastr.success(data.msg, data.title)
                    } else {
                        toastr.warning(data.msg, data.title)
                    }
                },
                error: function (res) {
                    console.log(res);
                }
            });
        })
    },
}
