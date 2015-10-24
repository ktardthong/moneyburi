var gender_flg='';
var user_status='';

$('#gender_female').click(function() {
    gender_flg = 'female';
});

$('#gender_male').click(function() {
    gender_flg = 'male';
});

$('#status_single').click(function() {
    user_status = 0;
});

$('#status_married').click(function() {
    user_status = 1;
});

$('#creditCard_true').click(function() {
    $('#addCreditCard').show('slow');
});

$('#creditCard_false').click(function() {
    $('#addCreditCard').hide('slow');
});

$('#addCreditCard').hide();


function monthDiff(future)
{
    var start = new Date(future),
        end   = new Date(),
        diff = new Date(start -end);
    month  = diff/1000/60/60/24/31;
    return Math.round(month);
}


function dayDiff(future)
{
    var start = new Date(future),
        end   = new Date(),
        diff = new Date(start -end);
    day  = diff/1000/60/60/24;
    return Math.round(day);
}




// Smooth scroll for in page links - http://wibblystuff.blogspot.in/2014/04/in-page-smooth-scroll-using-css3.html
// Improvements from - http://codepen.io/kayhadrin/pen/KbalA

$(function() {
    var $window = $(window), $document = $(document),
        transitionSupported = typeof document.body.style.transitionProperty === "string", // detect CSS transition support
        scrollTime = 1; // scroll time in seconds

    $(document).on("click", "a[href*=#]:not([href=#])", function(e) {
        var target, avail, scroll, deltaScroll;

        if (location.pathname.replace(/^\//, "") == this.pathname.replace(/^\//, "") && location.hostname == this.hostname) {
            target = $(this.hash);
            target = target.length ? target : $("[id=" + this.hash.slice(1) + "]");

            if (target.length) {
                avail = $document.height() - $window.height();

                if (avail > 0) {
                    scroll = target.offset().top;

                    if (scroll > avail) {
                        scroll = avail;
                    }
                } else {
                    scroll = 0;
                }

                deltaScroll = $window.scrollTop() - scroll;

                // if we don't have to scroll because we're already at the right scrolling level,
                if (!deltaScroll) {
                    return; // do nothing
                }

                e.preventDefault();

                if (transitionSupported) {
                    $("html").css({
                        "margin-top": deltaScroll + "px",
                        "transition": scrollTime + "s ease-in-out"
                    }).data("transitioning", scroll);
                } else {
                    $("html, body").stop(true, true) // stop potential other jQuery animation (assuming we're the only one doing it)
                        .animate({
                            scrollTop: scroll + "px"
                        }, scrollTime * 1000);

                    return;
                }
            }
        }
    });

    if (transitionSupported) {
        $("html").on("transitionend webkitTransitionEnd msTransitionEnd oTransitionEnd", function(e) {
            var $this = $(this),
                scroll = $this.data("transitioning");

            if (e.target === e.currentTarget && scroll) {
                $this.removeAttr("style").removeData("transitioning");

                $("html, body").scrollTop(scroll);
            }
        });
    }
});