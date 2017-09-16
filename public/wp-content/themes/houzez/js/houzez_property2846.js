/**
 * Created by waqasriaz on 06/10/15.
 */
jQuery(document).ready( function($) {
    "use strict";

    if ( typeof houzezProperty !== "undefined" ) {

        var dtGlobals = {}; // Global storage
        dtGlobals.isMobile	= (/(Android|BlackBerry|iPhone|iPad|Palm|Symbian|Opera Mini|IEMobile|webOS)/.test(navigator.userAgent));
        dtGlobals.isAndroid	= (/(Android)/.test(navigator.userAgent));
        dtGlobals.isiOS		= (/(iPhone|iPod|iPad)/.test(navigator.userAgent));
        dtGlobals.isiPhone	= (/(iPhone|iPod)/.test(navigator.userAgent));
        dtGlobals.isiPad	= (/(iPad|iPod)/.test(navigator.userAgent));

        var ajax_url = houzezProperty.ajaxURL;
        var houzez_logged_in = houzezProperty.houzez_logged_in;
        var login_sending = houzezProperty.login_loading;
        var process_loader_refresh = houzezProperty.process_loader_refresh;
        var process_loader_spinner = houzezProperty.process_loader_spinner;
        var process_loader_circle = houzezProperty.process_loader_circle;
        var process_loader_cog = houzezProperty.process_loader_cog;
        var success_icon = houzezProperty.success_icon;
        var verify_nonce = houzezProperty.verify_nonce;
        var verify_file_type = houzezProperty.verify_file_type;
        var msg_digits = houzezProperty.msg_digits;
        var max_prop_images = houzezProperty.max_prop_images;
        var image_max_file_size = houzezProperty.image_max_file_size;
        var add_listing_msg = houzezProperty.add_listing_msg;
        var processing_text = houzezProperty.processing_text;

        var plan_title_text = houzezProperty.plan_title_text;
        var plan_size_text = houzezProperty.plan_size_text;
        var plan_bedrooms_text = houzezProperty.plan_bedrooms_text;
        var plan_bathrooms_text = houzezProperty.plan_bathrooms_text;
        var plan_price_text = houzezProperty.plan_price_text;
        var plan_price_postfix_text = houzezProperty.plan_price_postfix_text;
        var plan_image_text = houzezProperty.plan_image_text;
        var plan_description_text = houzezProperty.plan_description_text;
        var plan_upload_text = houzezProperty.plan_upload_text;

        var mu_title_text = houzezProperty.mu_title_text;
        var mu_type_text = houzezProperty.mu_type_text;
        var mu_beds_text = houzezProperty.mu_beds_text;
        var mu_baths_text = houzezProperty.mu_baths_text;
        var mu_size_text = houzezProperty.mu_size_text;
        var mu_size_postfix_text = houzezProperty.mu_size_postfix_text;
        var mu_price_text = houzezProperty.mu_price_text;
        var mu_price_postfix_text = houzezProperty.mu_price_postfix_text;
        var mu_availability_text = houzezProperty.mu_availability_text;

        // For validation
        var prop_title = houzezProperty.prop_title;
        var prop_price = houzezProperty.prop_price;
        var prop_sec_price = houzezProperty.prop_sec_price;
        var prop_type = houzezProperty.prop_type;
        var prop_status = houzezProperty.prop_status;
        var file = houzezProperty.file;
        //var prop_description = houzezProperty.description;
        var price_label = houzezProperty.price_label;
        var prop_id = houzezProperty.prop_id;
        var bedrooms = houzezProperty.bedrooms;
        var bathrooms = houzezProperty.bathrooms;
        var area_size = houzezProperty.area_size;
        var land_area = houzezProperty.land_area;
        var garages = houzezProperty.garages;
        var year_built = houzezProperty.year_built;
        var property_map_address = houzezProperty.property_map_address;
        var neighborhood = houzezProperty.neighborhood;
        var city = houzezProperty.city;
        var state = houzezProperty.state;
        var country = houzezProperty.country;

        if( $('#invoice-print-button').length > 0 ) {

            $('#invoice-print-button').click(function (e) {
                e.preventDefault();
                var invoiceID, printWindow;
                invoiceID = $(this).attr('data-id');

                printWindow = window.open('', 'Print Me', 'width=700 ,height=842');
                $.ajax({
                    type: 'POST',
                    url: ajax_url,
                    data: {
                        'action': 'houzez_create_invoice_print',
                        'invoice_id': invoiceID,
                    },
                    success: function (data) {
                        printWindow.document.write(data);
                        printWindow.document.close();
                        printWindow.focus();
                    },
                    error: function (xhr, status, error) {
                        var err = eval("(" + xhr.responseText + ")");
                        console.log(err.Message);
                    }

                });
            });
        }

        //Login user before while submission

        var houzez_login_user_before_submit = function(currnt) {
            var $form = currnt.parents('form');
            var $messages = $('.houzez_messages_register');

            var sp_username = $('#sp_username').val();
            var sp_password = $('#sp_password').val();
            var security = $('#houzez_register_security2').val();

            $.ajax({
                type: 'post',
                url: ajaxurl,
                dataType: 'json',
                data: {
                    'action': 'houzez_login',
                    'username': sp_username,
                    'password': sp_password,
                    'houzez_register_security2': security,
                    'is_submit_listing': 'yes',
                },
                beforeSend: function () {
                    $messages.empty().append('<p class="success text-success"> '+ login_sending +'</p>');
                },
                success: function( response ) {
                    if( response.success ) {
                        $messages.empty().append('<p class="success text-success"> '+ response.msg +'</p>');
                        $('#submit_property_form').submit();
                        houzez_processing_modal( add_listing_msg );
                    } else {
                        $messages.empty().append('<p class="error text-danger"><i class="fa fa-close"></i> '+ response.msg +'</p>');
                    }
                },
                error: function(xhr, status, error) {
                    var err = eval("(" + xhr.responseText + ")");
                    console.log(err.Message);
                }
            });

        }

        //Register/Login user before submit property
        var houzez_register_login_user_before_submit = function ( currnt ) {

            var $form = currnt.parents('form');
            var $messages = $('.houzez_messages_register');

            var username = $('#username').val();
            var useremail = $('#user_email').val();
            var user_role = $('#user_role').val();
            var register_security = $('#houzez_register_security2').val();

            $.ajax({
                type: 'post',
                url: ajaxurl,
                dataType: 'json',
                data: {
                    'action': 'houzez_register_user_with_membership',
                    'username': username,
                    'useremail': useremail,
                    'first_name': '',
                    'last_name': '',
                    'user_role': user_role,
                    'houzez_register_security2': register_security,
                    'is_submit_listing': 'yes',
                },
                beforeSend: function () {
                    $messages.empty().append('<p class="success text-success"> '+ login_sending +'</p>');
                },
                success: function( response ) {
                    if( response.success ) {
                        $messages.empty().append('<p class="success text-success"> '+ response.msg +'</p>');
                        $('#submit_property_form').submit();
                        houzez_processing_modal( add_listing_msg );
                    } else {
                        $messages.empty().append('<p class="error text-danger"><i class="fa fa-close"></i> '+ response.msg +'</p>');
                    }
                },
                error: function(xhr, status, error) {
                    var err = eval("(" + xhr.responseText + ")");
                    console.log(err.Message);
                }
            });
        }

        if( houzez_logged_in == 'no' ) {
            var add_new_property = $('#add_new_property');
            if (add_new_property.length > 0) {

                add_new_property.on('click', function (e) {
                    e.preventDefault();
                    var currnt = $(this);
                    var login_while_submission = $('#login_while_submission').val();
                    if( login_while_submission == 1 ) {
                        houzez_login_user_before_submit(currnt);
                    } else {
                        houzez_register_login_user_before_submit(currnt);
                    }
                    return;
                });
            }
        }

        //Duplicate listings
        $( '.clone-property' ).on( 'click', function( e ) {
            e.preventDefault();
            var $this = $( this );
            var propid = $this.data( 'property' );
            $.ajax({
                url: ajax_url,
                data: {
                    action: 'houzez_property_clone',
                    propID: propid
                },
                method: 'POST',
                dataType: "JSON",

                beforeSend: function( ) {
                    houzez_processing_modal(processing_text);
                },
                success: function( response ) {
                    window.location.reload();
                },
                complete: function(){
                }
            });

        });

        $('select[name="country_short"]').on('change', function() {
            var country  = $('select[name="country_short"] option:selected').val();
            var clearVal = $('select[name="administrative_area_level_1"], select[name="locality"], select[name="neighborhood"]');

            if( country != '' ) {
                clearVal.selectpicker('val', '');
                $('select[name="administrative_area_level_1"] option').each(function () {
                    var stateCountry = $(this).data('parentcountry');

                    if (typeof stateCountry  !== "undefined") {
                        stateCountry = stateCountry.toUpperCase();
                    }

                    if( $(this).val() != '' ) {
                        $(this).css('display', 'none');
                    }
                    if (stateCountry == country) {
                        $(this).css('display', 'block');
                    }
                });
            } else {
                clearVal.selectpicker('val', '');
                $('select[name="administrative_area_level_1"] option').each(function () {
                    $(this).css('display', 'block');
                });
                $('select[name="neighborhood"] option').each(function () {
                    $(this).css('display', 'block');
                });
            }
            clearVal.selectpicker('refresh');
            return false;
        });

        $('select[name="administrative_area_level_1"]').on('change', function() {

            var state  = $('select[name="administrative_area_level_1"] option:selected').val();
            var clearVal = $('select[name="locality"], select[name="neighborhood"]');

            if( state != '' ) {
                clearVal.selectpicker('val', '');
                $('select[name="locality"] option').each(function () {
                    var cityState = $(this).data('parentstate');

                    if( $(this).val() != '' ) {
                        $(this).css('display', 'none');
                    }
                    if (cityState == state) {
                        $(this).css('display', 'block');
                    }
                });
            } else {
                clearVal.selectpicker('val', '');
                $('select[name="locality"] option').each(function () {
                    $(this).css('display', 'block');
                });
                $('select[name="neighborhood"] option').each(function () {
                    $(this).css('display', 'block');
                });
            }
            clearVal.selectpicker('refresh');
            return false;
        });

        $('select[name="locality"]').on('change', function() {
            var city  = $('select[name="locality"] option:selected').val();

            if( city != '' ) {
                $('select[name="neighborhood"]').selectpicker('val', '');
                $('select[name="neighborhood"] option').each(function () {
                    var areaCity = $(this).data('parentcity');
                    if( $(this).val() != '' ) {
                        $(this).css('display', 'none');
                    }
                    if (areaCity == city) {
                        $(this).css('display', 'block');
                    }
                });
            } else {
                $('select[name="neighborhood"]').selectpicker('val', '');
                $('select[name="neighborhood"] option').each(function () {
                    $(this).css('display', 'block');
                });
            }
            $('select[name="neighborhood"]').selectpicker('refresh');
            return false;
        });



        var houzez_validation = function( field_required ) {
            if( field_required != 0 ) {
                return true;
            }
            return false;
        };

        var houzez_processing_modal = function ( msg ) {
            var process_modal ='<div class="modal fade" id="fave_modal" tabindex="-1" role="dialog" aria-labelledby="faveModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-body houzez_messages_modal">'+msg+'</div></div></div></div></div>';
            jQuery('body').append(process_modal);
            jQuery('#fave_modal').modal();
        };

        var houzez_processing_modal_close = function ( ) {
            jQuery('#fave_modal').modal('hide');
        };


        //Save property as draft
        $( "#save_as_draft" ).click(function() {
            var $form = $('#submit_property_form');
            var save_as_draft = $('#save_as_draft');
            var description = tinyMCE.get('prop_des').getContent();

            $.ajax({
                type: 'post',
                url: ajax_url,
                dataType: 'json',
                data: $form.serialize() + "&action=save_as_draft&description="+description,
                beforeSend: function () {
                    save_as_draft.children('i').remove();
                    save_as_draft.prepend('<i class="fa-left '+process_loader_spinner+'"></i>');
                },
                success: function( response ) {
                    if( response.success ) {
                        save_as_draft.children('i').removeClass(process_loader_spinner);
                        save_as_draft.children('i').addClass(success_icon);
                        $('input[name=draft_prop_id]').remove();
                        $('#submit_property_form').prepend('<input type="hidden" name="draft_prop_id" value="'+response.property_id+'">');
                    }
                },
                error: function(xhr, status, error) {
                    var err = eval("(" + xhr.responseText + ")");
                    console.log(err.Message);
                }
            })
        });

        /* ------------------------------------------------------------------------ */
        /*  START CREATE LISTING FORM STEPS AND VALIDATION
         /* ------------------------------------------------------------------------ */
        $("[data-hide]").on("click", function(){
            $(this).closest("." + $(this).attr("data-hide")).hide();
        });

        var current = 1;

        var form        = $("#submit_property_form");
        var formStep    = $(".form-step");
        var formStepGal = $(".form-step-gal");
        var formStepLocation = $(".form-step-location");
        var btnnext     = $(".btn-next");
        var btnback     = $(".btn-back");
        var btnsubmit_block   = $(".btn-step-submit");
        var btnsubmit   = btnsubmit_block.find("button[type='submit']");

        var errorBlock      = $(".validate-errors");
        var errorBlockGal   = $(".validate-errors-gal");
        var galThumbs       = $(".gallery-thumb");

        $('.steps-total').html(formStep.length);
        // Init buttons and UI
        //formStep.not(':eq(0)').hide();
        formStep.eq(0).addClass('active');

        // Change progress bar action
        var setProgress = function(currstep){
            var percent = parseFloat(100 / formStep.length) * currstep;
            percent = percent.toFixed();
            $(".steps-progress span").css("width",percent+"%");//.html(percent+"%");
        };

        // Hide buttons according to the current step
        var hideButtons = function(current) {
            var limit = parseInt(formStep.length);

            $(".action").hide();

            if (current < limit) btnnext.show();
            if (current > 1) btnback.show();
            if (current == limit) {
                btnnext.hide();
                btnsubmit_block.show();
            }
        };

        hideButtons(current);
        setProgress(current);

        // Next button click action
        btnnext.click(function(){

            $(".dashboard-content-area").animate({ scrollTop: 0 }, "slow");

            if(dtGlobals.isiOS) {
                property_gallery_images();
            }

            if ($('#post_file_topic').closest('.form-step').hasClass('active')) {
                if ($('input[name="file"]').val() == '') {
                    errorBlockGal.show();
                    return;
                } else {
                    errorBlockGal.hide();
                }
            }

            if(current < formStep.length){
                // Check validation
                if($(formStepGal).is(':visible')){

                    if(!$(galThumbs).length > 0){
                        errorBlockGal.show();
                        return
                    }else{
                        errorBlockGal.hide();
                    }
                }
                if(form.valid()){
                    formStep.removeClass('active').css({display:'none'});
                    formStep.eq(current++).addClass('active').css({display:'block'});
                    setProgress(current);
                    errorBlock.hide();
                }else{
                    errorBlock.show();
                }
            }
            hideButtons(current);
            $('.steps-counter').html(current);
        });

        // Back button click action
        btnback.click(function(){
            errorBlock.hide();
            $(".dashboard-content-area").animate({ scrollTop: 0 }, "slow");
            if(current > 1){
                current = current - 2;
                if(current < formStep.length){
                    formStep.removeClass('active').css({display:'none'});
                    formStep.eq(current++).addClass('active').css({display:'block'});
                    setProgress(current);
                }
            }
            hideButtons(current);
            $('.steps-counter').html(current);
        });

        // Submit button click
        btnsubmit.click(function(){
            // Check validation
            if($(formStepGal).is(':visible')){
                if(!$(galThumbs).length > 0){
                    errorBlockGal.show();
                    return
                }else{
                    errorBlockGal.hide();
                }
            }
            if(form.valid()){
                errorBlock.hide();
                if( houzez_logged_in == 'yes' ) {
                    houzez_processing_modal(add_listing_msg);
                }
            }else{
                errorBlock.show();
                $(".dashboard-content-area").animate({ scrollTop: 0 }, "slow");
            }
        });

        if(form.length > 0){
            form.validate({ // initialize plugin
                //ignore:[],
                ignore: ":hidden:not(.form-step.active .selectpicker)",
                errorPlacement: function (error, element) {
                    return false;
                },
                rules: {
                    prop_title: {
                        required: houzez_validation(prop_title)
                    },
                    prop_price: {
                        required: houzez_validation(prop_price),
                        digits: true
                    },
                    prop_des: {
                        required: houzez_validation(prop_sec_price),
                        digits: true
                    },
                    prop_type: {
                        required: houzez_validation(prop_type)
                    },
                    prop_status: {
                        required: houzez_validation(prop_status)
                    },
                    file: {
                        required: houzez_validation(file)
                    },
                    prop_label: {
                        required: houzez_validation(price_label)
                    },
                    property_id: {
                        required: houzez_validation(prop_id)
                    },
                    prop_size: {
                        required: houzez_validation(area_size),
                        number: true
                    },
                    prop_land_area: {
                        required: houzez_validation(land_area)
                    },
                    prop_beds: {
                        required: houzez_validation(bedrooms)
                    },
                    prop_baths: {
                        required: houzez_validation(bathrooms)
                    },
                    prop_garage: {
                        required: houzez_validation(garages)
                    },
                    prop_year_built: {
                        required: houzez_validation(year_built)
                    },
                    property_map_address: {
                        required: houzez_validation(property_map_address)
                    },
                    /*neighborhood: {
                        required: houzez_validation(neighborhood)
                    },
                    locality: {
                        required: houzez_validation(city)
                    },
                    administrative_area_level_1: {
                        required: houzez_validation(state)
                    }*/
                },
                messages: {
                    prop_title: "",
                    prop_des: "",
                    prop_price: "",
                    prop_beds: msg_digits,
                    prop_baths: msg_digits,
                    prop_size: msg_digits,
                    property_map_address: "",
                    prop_type: "",
                    prop_status: "",
                    prop_labels: "",
                    file: "Vui long chon anh",
                    prop_land_area: "",
                    property_id: "",
                    prop_garage: "",
                    prop_year_built: "",
                    /*neighborhood: "",
                    locality: "",
                    administrative_area_level_1: ""*/
                    /*username: {
                     required: "Please enter a username",
                     minlength: "Your username must consist of at least 2 characters"
                     },*/
                    /*password: {
                     required: "Please provide a password",
                     minlength: "Your password must be at least 5 characters long"
                     },
                     confirm_password: {
                     required: "Please provide a password",
                     minlength: "Your password must be at least 5 characters long",
                     equalTo: "Please enter the same password as above"
                     },*/
                }
            });
            // The default value for $('#frm_editCategory').validate().settings.ignore
            // is ':hidden'.  Log this to the console to verify:
            //console.log(form.validate().settings.ignore);

            // Set validator to NOT ignore hidden selects
            //form.validate().settings.ignore =':not(.form-step.active select:hidden)';
        }

        /* ------------------------------------------------------------------------ */
        /*	Property additional Features
         /* ------------------------------------------------------------------------ */
        $( "#houzez_additional_details_main" ).sortable({
            revert: 100,
            placeholder: "detail-placeholder",
            handle: ".sort-additional-row",
            cursor: "move"
        });

        $( '.add-additional-row' ).click(function( e ){
            e.preventDefault();

            var numVal = $(this).data("increment") + 1;
            $(this).data('increment', numVal);
            $(this).attr({
                "data-increment" : numVal
            });

            var newAdditionalDetail = '<tr>'+
                '<td class="action-field">'+
                '<span class="sort-additional-row"><i class="fa fa-navicon"></i></span>'+
                '</td>'+
                '<td class="field-title">'+
                '<input class="form-control" type="text" name="additional_features['+numVal+'][fave_additional_feature_title]" id="fave_additional_feature_title_'+numVal+'" value="">'+
                '</td>'+
                '<td>'+
                '<input class="form-control" type="text" name="additional_features['+numVal+'][fave_additional_feature_value]" id="fave_additional_feature_value_'+numVal+'" value="">'+
                '</td>'+
                '<td class="action-field">'+
                '<span data-remove="'+numVal+'" class="remove-additional-row"><i class="fa fa-remove"></i></span>'+
                '</td>'+
                '</tr>';

            $( '#houzez_additional_details_main').append( newAdditionalDetail );
            removeAdditionalDetails();
        });

        var removeAdditionalDetails = function (){

            $( '.remove-additional-row').click(function( event ){
                event.preventDefault();
                var $this = $( this );
                $this.closest( 'tr' ).remove();
            });
        }
        removeAdditionalDetails();

        /* ------------------------------------------------------------------------ */
        /*	Floor Plans
         /* ------------------------------------------------------------------------ */
        $( "#houzez_floor_plans_main" ).sortable({
            revert: 100,
            placeholder: "detail-placeholder",
            handle: ".sort-floorplan-row",
            cursor: "move"
        });

        $( '#add-floorplan-row' ).click(function( e ){
            e.preventDefault();

            var numVal = $(this).data("increment") + 1;
            $(this).data('increment', numVal);
            $(this).attr({
                "data-increment" : numVal
            });

            var newFloorPlan = '' +
                '<tr>'+
                '<td class="row-sort">'+
                '<span class="sort sort-floorplan-row"><i class="fa fa-navicon"></i></span>'+
                '</td>'+
                '<td class="sort-middle">'+
                '<div class="sort-inner-block">'+
                '<div class="row">'+
                '<div class="col-sm-12 col-xs-12">'+
                '<div class="form-group">'+
                '<label for="floor_plans['+numVal+'][fave_plan_title]">'+plan_title_text+'</label>'+
                '<input name="floor_plans['+numVal+'][fave_plan_title]" type="text" id="fave_plan_title_'+numVal+'" class="form-control">'+
                '</div>'+
                '</div>'+
                '<div class="col-sm-6 col-xs-12">'+
                '<div class="form-group">'+
                '<label for="floor_plans['+numVal+'][fave_plan_rooms]">'+plan_bedrooms_text+'</label>'+
                '<input name="floor_plans['+numVal+'][fave_plan_rooms]" type="text" id="fave_plan_rooms_'+numVal+'" class="form-control">'+
                '</div>'+
                '</div>'+
                '<div class="col-sm-6 col-xs-12">'+
                '<div class="form-group">'+
                '<label for="floor_plans['+numVal+'][fave_plan_bathrooms]">'+plan_bathrooms_text+'</label>'+
                '<input name="floor_plans['+numVal+'][fave_plan_bathrooms]" type="text" id="fave_plan_bathrooms_'+numVal+'" class="form-control">'+
                '</div>'+
                '</div>'+
                '<div class="col-sm-6 col-xs-12">'+
                '<div class="form-group">'+
                '<label for="floor_plans['+numVal+'][fave_plan_price]">'+plan_price_text+'</label>'+
                '<input name="floor_plans['+numVal+'][fave_plan_price]" type="text" id="fave_plan_price_'+numVal+'" class="form-control">'+
                '</div>'+
                '</div>'+
                '<div class="col-sm-6 col-xs-12">'+
                '<div class="form-group">'+
                '<label for="floor_plans['+numVal+'][fave_plan_price_postfix]">'+plan_price_postfix_text+'</label>'+
                '<input name="floor_plans['+numVal+'][fave_plan_price_postfix]" type="text" id="fave_plan_price_postfix_'+numVal+'" class="form-control">'+
                '</div>'+
                '</div>'+
                '<div class="col-sm-6 col-xs-12">'+
                '<div class="form-group">'+
                '<label for="floor_plans['+numVal+'][fave_plan_size]">'+plan_size_text+'</label>'+
                '<input name="floor_plans['+numVal+'][fave_plan_size]" type="text" id="fave_plan_size_'+numVal+'" class="form-control">'+
                '</div>'+
                '</div>'+
                '<div class="col-sm-6 col-xs-12">'+
                '<div class="form-group">'+
                '<label for="floor_plans['+numVal+'][fave_plan_image]">'+plan_image_text+'</label>'+
                '<div class="file-upload-block">'+
                '<input name="floor_plans['+numVal+'][fave_plan_image]" type="text" id="fave_plan_image_'+numVal+'" class="fave_plan_image form-control">'+
                '<button id="'+numVal+'" class="floorPlansImg btn btn-primary">'+plan_upload_text+'</button>'+
                '</div>'+
                '<div id="plupload-container"></div>'+
                '<div id="errors-log"></div>'+
                '<div id="progress-'+numVal+'"></div>'+
                '</div>'+
                '</div>'+
                '<div class="col-sm-12 col-xs-12">'+
                '<div class="form-group">'+
                '<label for="floor_plans['+numVal+'][fave_plan_description]">'+plan_description_text+'</label>'+
                '<textarea name="floor_plans['+numVal+'][fave_plan_description]" rows="4" id="fave_plan_description_'+numVal+'" class="form-control"></textarea>'+
                '</div>'+
                '</div>'+
                '</div>'+
                '</div>'+
                '</td>'+
                '<td class="row-remove">'+
                '<span data-remove="'+numVal+'" class="remove-floorplan-row remove"><i class="fa fa-remove"></i></span>'+
                '</td>'+
                '</tr>';

            $( '#houzez_floor_plans_main').append( newFloorPlan );
            removeFloorPlans();
            floorPlanImage();
        });

        var removeFloorPlans = function (){

            $( '.remove-floorplan-row').click(function( event ){
                event.preventDefault();
                var $this = $( this );
                $this.closest( 'tr' ).remove();
            });
        }
        removeFloorPlans();


        /* ------------------------------------------------------------------------ */
        /*	Multi Units
         /* ------------------------------------------------------------------------ */
        $( "#multi_units_main" ).sortable({
            revert: 100,
            placeholder: "detail-placeholder",
            handle: ".sort-subproperty-row",
            cursor: "move"
        });

        $( '#add-subproperty-row' ).click(function( e ){
            e.preventDefault();

            var numVal = $(this).data("increment") + 1;
            $(this).data('increment', numVal);
            $(this).attr({
                "data-increment" : numVal
            });

            var newSubProperty = '' +
                '<tr>'+
                '<td class="row-sort">'+
                '<span class="sort-subproperty-row sort"><i class="fa fa-navicon"></i></span>'+
                '</td>'+
                '<td class="sort-middle">'+
                '<div class="sort-inner-block">'+
                '<div class="row">'+
                '<div class="col-sm-12 col-xs-12">'+
                '<div class="form-group">'+
                '<label for="fave_multi_units['+numVal+'][fave_mu_title]">'+mu_title_text+'</label>'+
                '<input name="fave_multi_units['+numVal+'][fave_mu_title]" type="text" class="form-control">'+
                '</div>'+
                '</div>'+
                '<div class="col-sm-6 col-xs-12">'+
                '<div class="form-group">'+
                '<label for="fave_multi_units['+numVal+'][fave_mu_beds]">'+mu_beds_text+'</label>'+
                '<input name="fave_multi_units['+numVal+'][fave_mu_beds]" type="text" class="form-control">'+
                '</div>'+
                '</div>'+
                '<div class="col-sm-6 col-xs-12">'+
                '<div class="form-group">'+
                '<label for="fave_multi_units['+numVal+'][fave_mu_baths]">'+mu_baths_text+'</label>'+
                '<input name="fave_multi_units['+numVal+'][fave_mu_baths]" type="text" class="form-control">'+
                '</div>'+
                '</div>'+
                '<div class="col-sm-6 col-xs-12">'+
                '<div class="form-group">'+
                '<label for="fave_multi_units['+numVal+'][fave_mu_size]">'+mu_size_text+'</label>'+
                '<input name="fave_multi_units['+numVal+'][fave_mu_size]" type="text" class="form-control">'+
                '</div>'+
                '</div>'+
                '<div class="col-sm-6 col-xs-12">'+
                '<div class="form-group">'+
                '<label for="fave_multi_units['+numVal+'][fave_mu_size_postfix]">'+mu_size_postfix_text+'</label>'+
                '<input name="fave_multi_units['+numVal+'][fave_mu_size_postfix]" type="text" class="form-control">'+
                '</div>'+
                '</div>'+
                '<div class="col-sm-6 col-xs-12">'+
                '<div class="form-group">'+
                '<label for="fave_multi_units['+numVal+'][fave_mu_price]">'+mu_price_text+'</label>'+
                '<input name="fave_multi_units['+numVal+'][fave_mu_price]" type="text" class="form-control">'+
                '</div>'+
                '</div>'+
                '<div class="col-sm-6 col-xs-12">'+
                '<div class="form-group">'+
                '<label for="fave_multi_units['+numVal+'][fave_mu_price_postfix]">'+mu_price_postfix_text+'</label>'+
                '<input name="fave_multi_units['+numVal+'][fave_mu_price_postfix]" type="text" class="form-control">'+
                '</div>'+
                '</div>'+
                '<div class="col-sm-6 col-xs-12">'+
                '<div class="form-group">'+
                '<label for="fave_multi_units['+numVal+'][fave_mu_type]">'+mu_type_text+'</label>'+
                '<input name="fave_multi_units['+numVal+'][fave_mu_type]" type="text" class="form-control">'+
                '</div>'+
                '</div>'+
                '<div class="col-sm-6 col-xs-12">'+
                '<label for="fave_multi_units['+numVal+'][fave_mu_availability_date]">'+mu_availability_text+'</label>'+
                '<input name="fave_multi_units['+numVal+'][fave_mu_availability_date]" type="text" class="form-control">'+
                '</div>'+
                '</div>'+
                '</div>'+
                '</td>'+
                '<td class="row-remove">'+
                '<span data-remove="'+numVal+'" class="remove-subproperty-row remove"><i class="fa fa-remove"></i></span>'+
                '</td>'+
                '</tr>';

            $( '#multi_units_main').append( newSubProperty );
            removeSubProperty();
        });

        var removeSubProperty = function (){

            $( '.remove-subproperty-row').click(function( event ){
                event.preventDefault();
                var $this = $( this );
                $this.closest( 'tr' ).remove();
            });
        }
        removeSubProperty();

        /* ------------------------------------------------------------------------ */
        /*	Property attachment delete
         /* ------------------------------------------------------------------------ */
        var propertyAttachmentEvents = function() {

            //Remove Image
            $('.attachment-delete').click(function(){
                var $this = $(this);
                var thumbnail = $this.closest('.attach-thumb');
                var loader = $this.siblings('.icon-loader');
                var prop_id = $this.data('attach-id');
                var thumb_id = $this.data('attachment-id');

                loader.show();

                var ajax_request = $.ajax({
                    type: 'post',
                    url: ajax_url,
                    dataType: 'json',
                    data: {
                        'action': 'houzez_remove_property_thumbnail',
                        'prop_id': prop_id,
                        'thumb_id': thumb_id,
                        'removeNonce': verify_nonce
                    }
                });

                ajax_request.done(function( response ) {
                    if ( response.remove_attachment ) {
                        thumbnail.remove();
                    } else {

                    }
                });

                ajax_request.fail(function( jqXHR, textStatus ) {
                    alert( "Request failed: " + textStatus );
                });

            });

        }
        propertyAttachmentEvents();

        /* ------------------------------------------------------------------------ */
        /*	Property Thumbnails actions ( make features & delete )
         /* ------------------------------------------------------------------------ */
        var propertyThumbnailEvents = function() {

            // Set Featured Image
            $('.icon-featured').click(function(){

                var $this = jQuery(this);
                var thumb_id = $this.data('attachment-id');
                var icon = $this.find( 'i');

                $('.gallery-thumb .featured_image_id').remove();
                $('.gallery-thumb .icon-featured i').removeClass('fa-star').addClass('fa-star-o');

                $this.closest('.gallery-thumb').append('<input type="hidden" class="featured_image_id" name="featured_image_id" value="'+thumb_id+'">');
                icon.removeClass('fa-star-o').addClass('fa-star');
            });

            //Remove Image
            $('.icon-delete').click(function(){
                var $this = $(this);
                var thumbnail = $this.closest('.property-thumb');
                var loader = $this.siblings('.icon-loader');
                var prop_id = $this.data('property-id');
                var thumb_id = $this.data('attachment-id');

                loader.show();

                var ajax_request = $.ajax({
                    type: 'post',
                    url: ajax_url,
                    dataType: 'json',
                    data: {
                        'action': 'houzez_remove_property_thumbnail',
                        'prop_id': prop_id,
                        'thumb_id': thumb_id,
                        'removeNonce': verify_nonce
                    }
                });

                ajax_request.done(function( response ) {
                    if ( response.remove_attachment ) {
                        thumbnail.remove();
                    } else {

                    }
                });

                ajax_request.fail(function( jqXHR, textStatus ) {
                    alert( "Request failed: " + textStatus );
                });

            });

        }

        propertyThumbnailEvents();

    }
});
