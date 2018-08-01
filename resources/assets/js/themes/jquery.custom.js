$('ul.pagination').hide();
$(function() {
    $('#category_pagination').jscroll({
        autoTrigger: true,
        loadingHtml: '<i class="fa fa-circle-o-notch fa-spin"></i>',
        padding: 0,
        nextSelector: '.pagination li.active + li a',
        contentSelector: 'div#category_pagination',
        callback: function(options) {
            $('ul.pagination').remove();
        }
    });
});
