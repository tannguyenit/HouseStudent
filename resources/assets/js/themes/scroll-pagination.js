$('ul.pagination').hide();
$(function() {
    $('#category_pagination').jscroll({
        autoTrigger: true,
        loadingHtml: '<div class="text-center"><div class="lds-ripple"><div></div><div></div></div></div>',
        padding: 0,
        nextSelector: '.pagination li.active + li a',
        contentSelector: 'div#category_pagination',
        callback: function(options) {
            $('ul.pagination').remove();
        }
    });
});
$(function() {
    $('.infinite-scroll').jscroll({
        autoTrigger: true,
        loadingHtml: '<div class="text-center"><div class="lds-ripple"><div></div><div></div></div></div>',
        padding: 0,
        nextSelector: '.pagination li.active + li a',
        contentSelector: 'div.infinite-scroll',
        callback: function() {
            $('ul.pagination').remove();
        }
    });
});
