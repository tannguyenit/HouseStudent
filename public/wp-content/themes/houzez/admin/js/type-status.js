function ActionModal(sending, done, callback) {
    this.sending = sending;
    this.done = done;
    this.callback = callback;
}
ActionModal.prototype = {
    init:function () {
        var _self = this;
        _self.onClick();
        _self.validate();
        _self.formSubmit();
    },
    onClick: function () {
        var _this = this;
        $('.btn-edit').click(function () {
            var value = $(this).parents('.getData').data('title');
            var id = $(this).parents('.getData').data('id');
            var action = $(this).parent().data('action');
            _this.eventEdit(value, id, action);
        });
    },
    validate: function () {
        $("#update_edit_modal, #create_type").validate({
            rules: {
                title: "required",
            },
            messages: {
                title: "",
            }
        })
    },
    formSubmit: function () {
        var _self = this;
        $('#update_edit_modal').submit(function (event) {
            event.preventDefault();
            if ($("#update_edit_modal").valid()) {
                var url = $('#update_edit_modal').attr('action');
                var id = $('#_id').val();
                var value =  $('#title_text').val();
                var _this =  $('#update_edit_modal button[type="submit"]');
                $.ajax({
                    url: url,
                    type: "POST",
                    dataType: 'JSON',
                    data: $('#update_edit_modal').serialize(),
                    beforeSend: function() {
                        _this.prop('disabled', true);
                        _this.html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i> ' + _self.sending);
                    },
                    success: function(res)
                    {
                        if (res.status) {
                            $('#' + id).find('.title_content').text(value);
                            $('#' + id).find('.getData').data('title', value);
                            $('.modal').modal('hide');
                            $('#title_text').val('');
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
            }
        });
    },
    eventEdit: function (value, id, action) {
        $('#title_text').val(value);
        $('#_id').val(id);
        $('#update_edit_modal').attr('action', action)
    }
}
