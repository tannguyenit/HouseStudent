function Validate(form) {
    this.form = form;
}
Validate.prototype = {
    init:function () {
        var _self = this;
        _self.postValidate(_self.form);
        _self.setingSortable();
        _self.feature();
        _self.removeFeature();
        _self.validateSelectBox();
    },
    postValidate: function (form) {
        form.validate({
            ignore: ":hidden:not(.form-step.active .selectpicker)",
            rules: {
                title: {
                    required: true
                },
                price: {
                    required: true,
                },
                description: {
                    required: true
                },
                type_id: {
                    required: true
                },
                status_id: {
                    required: true
                },
                file: {
                    required: true
                },
                name_boss: {
                    required: true
                },
                area: {
                    required: true,
                    number: true,
                    minlength:1,
                    maxlength:3
                },
                phone_boss: {
                    required: true,
                    number: true,
                    minlength:10,
                    maxlength:11
                },
                address: {
                    required: true
                },
                administrative_area_level_2: {
                    required: true
                },
                administrative_area_level_1: {
                    required: true
                },
                username: {
                    required: true,
                    checkusername:true
                },
                first_name: {
                    required: true
                },
                last_name: {
                    required: true
                },
                email: {
                    required: true,
                    email:true,
                    checkemail:true
                },
                password: {
                    required: true
                },
                phone: {
                    required: true,
                    number:true,
                    minlength:10,
                    maxlength:11
                },
            },
            messages: {
                title: "Vui long nhap noi dung",
                description: "Vui long nhap noi dung",
                price: "Vui long nhap gia",
                prop_beds: 'Vui long nhap so',
                prop_baths: 'Vui long nhap so',
                area: {
                    required: 'Vui long nhap tai day',
                    number:'Ban phai nhap so',
                    minlength:'it nhat 2 ky tu',
                    maxlength:'nhieu nhat 3 ky tu'
                },
                address: "Vui long nhap noi dung",
                administrative_area_level_2: "Vui long nhap noi dung",
                administrative_area_level_1: "Vui long nhap noi dung",
                type_id: "Vui long nhap noi dung",
                status_id: "Vui long nhap noi dung",
                phone_boss: {
                    required: 'Vui long nhap tai day',
                    number:'Ban phai nhap so',
                    minlength:'it nhat 10 ky tu',
                    maxlength:'nhieu nhat 11 ky tu'
                },
                name_boss: "Vui long nhap noi dung",
                file: "Vui long chon anh",
                username: {
                    required: 'Vui long nhap ten'
                },
                first_name: "Please enter a username",
                last_name: "Please enter a username",
                email: {
                    required: 'Vui long nhap email',
                    email: 'Email chua dung dinh dang',
                },
                password: "Please enter a username",
                phone: {
                    required: 'Vui long nhap tai day',
                    number:'Ban phai nhap so',
                    minlength:'it nhat 10 ky tu',
                    maxlength:'nhieu nhat 11 ky tu'
                },
            }
        });
    },
    setingSortable: function () {
        $( "#houzez_additional_details_main" ).sortable({
            revert: 100,
            placeholder: "detail-placeholder",
            handle: ".sort-additional-row",
            cursor: "move"
        });
    },
    feature: function() {
        var _self = this;
        $( '.add-additional-row' ).click(function( e ){
            e.preventDefault();
            var numVal = $(this).data("increment") + 1;
            $(this).data('increment', numVal);
            $(this).attr({
                "data-increment" : numVal
            });
            var add =   '<tr>'
            add +=  '<td class="action-field hidden-xs">'
            add +=  '<span class="sort-additional-row"><i class="fa fa-navicon"></i></span>'
            add +=  '</td>'
            add +=  '<td class="field-title">'
            add +=  '<input class="form-control" type="text" name="additional_features['+numVal+'][key]" id="fave_additional_feature_title_'+numVal+'" value="">'
            add +=  '</td>'
            add +=  '<td>'
            add +=  '<input class="form-control" type="text" name="additional_features['+numVal+'][value]" id="fave_additional_feature_value_'+numVal+'" value="">'
            add +=  '</td>'
            add +=  '<td class="action-field">'
            add +=  '<span data-remove="'+numVal+'" class="remove-additional-row"><i class="fa fa-remove"></i></span>'
            add +=  '</td>'
            add +=  '</tr>';
            $( '#houzez_additional_details_main').append(add);
            _self.removeFeature();
        });
    },
    removeFeature: function () {
        $( '.remove-additional-row').click(function( event ){
            event.preventDefault();
            var $this = $(this);
            $this.closest('tr').remove();
        });
    },
    validateSelectBox: function () {
        var _self = this;
        $('#type_id').on('hidden.bs.select', function (e) {
            var value = $(this).val();
            _self.showError('type_id', value);
        });
        $('#status_id').on('hidden.bs.select', function (e) {
            var value = $(this).val();
            _self.showError('status_id', value);
        });
    },
    showError: function (element,value) {
        if (value != '') {
            $('#' + element + '-error').fadeOut();
            $('button[data-id="' + element + '"]').css('border-color', '#00aeef');
        } else {
            $('#' + element + '-error').fadeIn();
            $('button[data-id="' + element + '"]').css('border-color', 'red');
        }
    }
}

