MapImg = function (options) {
    this.options = options
    this.baseUrl = window.location.origin
    this.init()
}
MapImg.prototype = {
    init: function () {
        const baseUrl = this.baseUrl
        this.clusterIcon = baseUrl +'/img/cluster-icon.png'
        this.infoboxClose = baseUrl +'/img/close.png'
    }
}