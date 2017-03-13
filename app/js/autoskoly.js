/**
 * Created by MinhMan.Tran on 1/12/2017.
 */
function setCookie(cname, cvalue, exdays, path) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=" + path;
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function checkCookie() {
    var user = getCookie("username");
    if (user != "") {
        alert("Welcome again " + user);
    } else {
        user = prompt("Please enter your name:", "");
        if (user != "" && user != null) {
            setCookie("username", user, 365);
        }
    }
}

(function($){
    $(window).on('load scroll', function(){
        var top = $(window).scrollTop();
        if(top > 50){
            $('body').addClass('not-top');
        } else {
            $('body').removeClass('not-top');
        }
    });

    $('nav.nav-single a').each(function(i, e){
        var href = $(this).attr('href');
        if(href.indexOf('/page/') >= 0){
            if(href.indexOf('?s') >= 0){} else {
                $(this).attr('href', href += '?s=&a=true');
            }
        }
    });

    var target = $('.search-results .searchsubmit-wrapper');
    if(target.length > 0){
        if($(window).width() < 768) {
            $('html, body').animate({
                'scrollTop': target.offset().top
            }, 1000);
            target.find('.searchsubmit2').html('Hľadaj Znovu');
        }
    }
})(jQuery);