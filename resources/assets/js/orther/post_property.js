/**
 * Created by waqasriaz on 06/10/15.
 */
 jQuery(document).ready( function($) {
    "use strict";

    if ( typeof houseStudent !== "undefined" ) {

        var dtGlobals = {}; // Global storage
        dtGlobals.isMobile	= (/(Android|BlackBerry|iPhone|iPad|Palm|Symbian|Opera Mini|IEMobile|webOS)/.test(navigator.userAgent));
        dtGlobals.isAndroid	= (/(Android)/.test(navigator.userAgent));
        dtGlobals.isiOS		= (/(iPhone|iPod|iPad)/.test(navigator.userAgent));
        dtGlobals.isiPhone	= (/(iPhone|iPod)/.test(navigator.userAgent));
        dtGlobals.isiPad	= (/(iPad|iPod)/.test(navigator.userAgent));

        var ajax_url = houseStudent.ajaxURL;
        var url_check_email = houseStudent.url_check_email;
        var url_check_username = houseStudent.url_check_username;
        var houzez_logged_in = houseStudent.houzez_logged_in;
        var login_sending = houseStudent.login_loading;
        var msg_check_username = houseStudent.checkusername;
        var msg_check_email = houseStudent.checkemail;
        var process_loader_spinner = 'fa fa-spin fa-spinner';
        var msg_digits = houseStudent.msg_digits;
        var add_listing_msg = houseStudent.add_listing_msg;
        var processing_text = houseStudent.processing_text;
        // For validation
        var city = houseStudent.city;
        var state = houseStudent.state;
        var country = houseStudent.country;

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
        //Duplicate listings
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
                    var active = $('.pay-step-bar li.active');
                    active.removeClass('active');
                    active.next().addClass('active');
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
                    var active = $('.pay-step-bar li.active');
                    active.removeClass('active');
                    active.prev().addClass('active');
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
        /* ------------------------------------------------------------------------ */
        /*  Validate form property
        /* ------------------------------------------------------------------------ */
        if(form.length > 0){
            jQuery.validator.addMethod("checkemail", function(value, element) {
                var result = false;
                $.ajax({
                    url: url_check_email,
                    async: false,
                    type: "POST",
                    dataType: 'JSON',
                    data: {
                        email: value,
                        new: true,
                        id: null
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

            }, msg_check_email);
            jQuery.validator.addMethod("checkusername", function(value, element) {
                var result = false;
                $.ajax({
                    url: url_check_username,
                    async: false,
                    type: "POST",
                    dataType: 'JSON',
                    data: {
                        username: value,
                        new: true,
                        id: null
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
            }, msg_check_username);
            var validate = new Validate(form);
            validate.init();
        }
    }
});
