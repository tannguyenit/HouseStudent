function Main(sending, done, callback) {
    this.sending = sending;
    this.done = done;
    this.callback = callback;
}
Main.prototype = {
    init:function () {
        var _self = this;
        _self.onClick();
    },
    onClick: function () {
        var _self = this;
        $('.btn-delete').click(function () {
            var _this = $(this);
            var id = _this.parents('.getData').data('id');
            var action = _this.parent().data('action');
            _self.eventDelete(id, action)
        })
    },
    eventDelete: function (id, action) {
        var _self = this;
        $('.accept_confirm').click(function () {
            var _this = $(this);
            $.ajax({
                url: action,
                type: "POST",
                dataType: 'JSON',
                data: {id:id},
                beforeSend: function() {
                    _this.prop('disabled', true);
                    _this.html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i> ' + _self.sending);
                },
                success: function(res)
                {
                    if (res.status) {
                        $('#' + id).remove();
                        $('.modal').modal('hide');
                        toastr.success(res.msg, res.title)
                    } else {
                        toastr.warning(res.msg, res.title)
                    }
                },
                error: function (res) {
                    console.log(res);
                },
                complete: function() {
                    _this.prop('disabled', false);
                    _this.html('<i class="fa fa-check" aria-hidden="true"></i> ' + _self.done);
                    _this.html(_self.callback);
                },
            });
        })
    }
}
