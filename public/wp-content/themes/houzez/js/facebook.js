$('.share_links').on('click', function () {
    window.open(this.href, 'mywin','left=50,top=50,width=600,height=350,toolbar=0');
    return false;
})
window.fbAsyncInit = function() {
  FB.init({
    appId            : '300152920454465',
    autoLogAppEvents : true,
    xfbml            : true,
    version          : 'v2.11'
  });
};
(function(d, s, id){
 var js, fjs = d.getElementsByTagName(s)[0];
 if (d.getElementById(id)) {return;}
 js = d.createElement(s); js.id = id;
 js.src = "https://connect.facebook.net/en_US/sdk.js";
 fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
