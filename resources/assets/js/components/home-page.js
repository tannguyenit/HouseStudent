let properties = $('#properties_module_container')
let urlLoadMore = ''

function loadMoreHomePage() {
    if (!properties.attr('data-nextpageurl') == '') {
        urlLoadMore = properties.attr('data-nextpageurl')
    } else {
        urlLoadMore = properties.data('url-load-more')
    }
    $.ajax({
        url: urlLoadMore,
        async: false,
        type: "GET",
        dataType: 'JSON',
        success: function(response)
        {
            if (response.status) {
                properties.append(response.data.html)
                properties.attr('data-nextpageurl', response.data.nextPageUrl)
                if (!response.data.hasMorePages) {
                    $('#fave-pagination-loadmore').remove()
                }
            }
        },
        error: function (res) {
            console.log('loadMoreHomePage', res);
        }
    });
}
window.onload = loadMoreHomePage

$(document).ready(function() {
    $('#fave-pagination-loadmore').on('click', ' .pagination a', function (e) {
        loadMoreHomePage();
        e.preventDefault();
    });
});
