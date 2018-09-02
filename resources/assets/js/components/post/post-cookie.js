PostCookie = function () {}

PostCookie.prototype = {
    addOrUpdate: function (data) {
        let date = new Date()
        let minutes = 262800 // 6 month
        let expiresTime = date.setTime(date.getTime() + (minutes * 60 * 1000))
        let dataCookie = this.getData()
        let newCookie = []

        if (dataCookie == undefined) {
            newCookie = [data]
        } else {
            let dataIds = dataCookie.ids
            dataIds.indexOf(data) === -1 ? dataIds.push(data) : console.log("This item already exists");

            if (dataIds.length >= 5) {
                dataIds.shift()
            }
            newCookie = dataIds
        }
        $.cookie('properties_viewed', JSON.stringify({ids:newCookie,currentPost: data}), { expires: expiresTime })
    },
    getData: function () {
        if ($.cookie('properties_viewed')) {
            return JSON.parse($.cookie('properties_viewed'))
        }

        return undefined
    },
}
