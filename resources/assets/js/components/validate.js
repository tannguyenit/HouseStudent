var validate = VARIABLE_JS.validate
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
                    minlength:6,
                    maxlength:10,
                },
                description: {
                    required: true
                },
                category_id: {
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
                route: {
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
                    required: true,
                    minlength: 6,
                    maxlength: 20
                },
                phone: {
                    required: true,
                    number:true,
                    minlength:10,
                    maxlength:11
                },
            },
            messages: {
                title: validate.title_required,
                description: validate.description_required,
                price: {
                    required: validate.price.required,
                    minlength: validate.price.minlength,
                    maxlength: validate.price.maxlength,
                },
                prop_beds: validate.number,
                prop_baths: validate.number,
                area: {
                    required: validate.area.required,
                    number: validate.area.number,
                    minlength: validate.area.minlength,
                    maxlength: validate.area.maxlength
                },
                address: validate.address_required,
                route: validate.route_required,
                administrative_area_level_2: validate.content_required,
                administrative_area_level_1: validate.content_required,
                category_id: validate.type_required,
                status_id: validate.status_required,
                phone_boss: {
                    required: validate.phone_boss.required,
                    number: validate.phone_boss.number,
                    minlength: validate.phone_boss.minlength,
                    maxlength: validate.phone_boss.maxlength
                },
                name_boss: validate.name_boss_required,
                file: validate.choose_image,
                username: {
                    required: validate.username.required
                },
                first_name: validate.first_name.required,
                last_name: validate.last_name.required,
                email: {
                    required: validate.email.required,
                    email: validate.email.email,
                },
                password: {
                    required: validate.password.required,
                    minlength: validate.password.minlength,
                    maxlength: validate.password.maxlength
                },
                phone: {
                    required: validate.phone.required,
                    number: validate.phone.number,
                    minlength: validate.phone.minlength,
                    maxlength: validate.phone.maxlength
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
    $('#category_id').on('hidden.bs.select', function (e) {
        var value = $(this).val();
        _self.showError('category_id', value);
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

