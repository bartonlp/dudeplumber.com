(function($) {
    "use strict";
    function newsticker(){ 
        var ticker =$( ".bs-latest-news" );
        var mainDiv =$('.bs-latest-news-slider');
        var tickerSlide = mainDiv.marquee({
            speed: 50,
            direction:'left', 
            delayBeforeStart: 0,
            duplicated: true,
            pauseOnHover: false,
            startVisible: true
        });
        ticker.on( "click", ".bs-latest-play span", function() {
            $(this).find( "i" ).toggleClass( "fa-pause fa-play" )
            tickerSlide.marquee( "toggle" );
        })
    }
    newsticker();
})(jQuery);