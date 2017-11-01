(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10&appId=300152920454465";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
$('.share_links').on('click', function () {
    window.open(this.href, 'mywin','left=50,top=50,width=600,height=350,toolbar=0');
    return false;
})
$(document).ready(function() {
    var t = {
        delay: 125,
        overlay: $(".fb-overlay"),
        widget: $(".fb-widget"),
        button: $(".fb-button")
    };
    setTimeout(function() {
        $("div.fb-livechat").fadeIn()
    }, 8 * t.delay), $(".ctrlq").on("click", function(e) {
        e.preventDefault(), t.overlay.is(":visible") ? (t.overlay.fadeOut(t.delay), t.widget.stop().animate({
            bottom: 0,
            opacity: 0
        }, 2 * t.delay, function() {
            $(this).hide("slow"), t.button.show()
        })) : t.button.fadeOut("medium", function() {
            t.widget.stop().show().animate({
                bottom: "30px",
                opacity: 1
            }, 2 * t.delay), t.overlay.fadeIn(t.delay)
        })
    })
});
