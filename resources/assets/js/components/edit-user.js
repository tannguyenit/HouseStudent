var validate = JSON.parse(VALIDATE_JS.variable);
function User(urlCheckMail, urlCheckUser) {
    this.urlCheckMail = urlCheckMail;
    this.urlCheckUser = urlCheckUser;
}
User.prototype =  {
    init: function () {
        var _self = this;
        _self.checkEmail(_self.urlCheckMail);
        _self.checkusername(_self.urlCheckUser);
        _self.datepicker();
        _self.checkDate();
        _self.validate();
    },
    checkEmail: function (_url) {
        jQuery.validator.addMethod("checkemail", function(value, element) {
            var result = false;
            var _id = $('#get-user__id').val();
            $.ajax({
                url: _url,
                async: false,
                type: "POST",
                dataType: 'JSON',
                data: {
                    email: value,
                    new: null,
                    id: _id
                },
                success: function(data)
                {
                    if (data.result) {
                        result = false;
                    } else {
                        result = true;
                    }
                },
                error: function (res) {
                    console.log(res);
                }
            });
            return result;
        }, validate.email.exists);
    },
    checkusername: function (_url) {
        jQuery.validator.addMethod("checkusername", function(value, element) {
            var result = false;
            var _id = $('#get-user__id').val();
            $.ajax({
                url: _url,
                async: false,
                type: "POST",
                dataType: 'JSON',
                data: {
                    username: value,
                    new: null,
                    id: _id
                },
                success: function(data)
                {
                    if (data.result) {
                        result = false;
                    } else {
                        result = true;
                    }
                },
                error: function (res) {
                    console.log(res);
                }
            });

            return result;
        }, validate.username.exists);
    },
    datepicker: function () {
        $(function() {
            $("#birthday").datepicker({
                autoSize: true,
                maxDate: new Date(),
                dateFormat: 'dd/mm/yy'
            });
        });
    },
    checkDate: function () {
        jQuery.validator.addMethod("Mytypedate", function(value, element) {
            return value.match(/^(0[1-9]|1\d|2\d|3[01])\/(0[1-9]|1[0-2])\/(19|20)\d{2}$/);
        }, validate.date.format);
    },
    validate: function () {
        $("#manager_user").validate({
            rules: {
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
                birthday: {
                    required: true,
                    Mytypedate: true
                },
                email: {
                    required: true,
                    email:true,
                    checkemail:true
                },
                phone: {
                    required: true,
                    number:true,
                    minlength:10,
                    maxlength:11
                },
            },
            messages: {
                username: {
                    required: validate.username.required,
                },
                first_name: validate.first_name.required,
                last_name: validate.last_name.required,
                email: {
                    required: validate.email.required,
                    email: validate.email.email,
                },
                phone: {
                    required: validate.phone.required,
                    number: validate.phone.number,
                    minlength: validate.phone.minlength,
                    maxlength: validate.phone.maxlength
                },
            }
        })
    }
}
