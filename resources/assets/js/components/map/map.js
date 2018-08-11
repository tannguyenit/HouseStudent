HouseMap = function(options) {
    this.map = options.map
    this.img = new MapImg(this)
    this.cookie = new MapCookie(this)
    this.action = new MapAction(this)
    this.markers = new MapMarker(this)
    this.event = new MapEvent(this)
    this.constant = new MapConstant()
}
HouseMap.prototype = {
    
}