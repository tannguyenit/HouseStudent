var LoadMoreHomePage = function() {}

LoadMoreHomePage.prototype = {
    init: function () {
        this.limit = 9;
        this.properties = $('#properties_module_container')
        this.urlLoadMore = ''
        this.setLimitLoadMore()
        this.load()
        this.clickLoadMore()
        this.resizeScreen()
    },
    load: function() {
        let self = this
        let properties = self.properties
        let urlLoadMore = self.urlLoadMore
        let limit = self.limit

        if (!properties.attr('data-nextpageurl') == '') {
            urlLoadMore = properties.attr('data-nextpageurl')
        } else {
            urlLoadMore = properties.data('url-load-more')
        }

        $.ajax({
            url: `${urlLoadMore}&limit=${limit}`,
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
    },
    clickLoadMore: function () {
        let self = this
        $('#fave-pagination-loadmore').on('click', ' .pagination a', function (e) {
            self.load();
            e.preventDefault();
        });
    },
    setLimitLoadMore: function () {
        let self = this
        if ((screen.width>=1024) && (screen.height>=768)) {
            self.limit = 9    
        } else if ((screen.width < 768) && (screen.height >= 425)) {
            self.limit = 6
        } else {
            self.limit = 4
        }
    },
    resizeScreen: function () {
        let self = this
        $(window).resize(function() {
            self.setLimitLoadMore()
        });
    }
}

let loadMoreHomePage = new LoadMoreHomePage()
window.onload = loadMoreHomePage.init()
