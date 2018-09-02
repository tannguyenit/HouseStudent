Post = function () {
    this.config()
}

Post.prototype = {
    config: function () {
        this.cookie = new PostCookie(this)
    },
    init: function () {

    },
    callAjaxRecently: function () {
        const _self = this
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: '/get-property-viewed',
            data: _self.cookie.getData(),
            beforeSend: function () {
                // houseMapComponent.event.showLoading()
                console.log('start loading')
            },
            success: function (response) {
                $('#properties_viewed').append(response.data)
            },
            error: function (xhr) {

            },
            complete:function () {
                console.log('end loading')
            }
        })
    }
}
