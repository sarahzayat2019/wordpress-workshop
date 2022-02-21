(function ($) {
    "use strict";
    if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
        var msViewportStyle = document.createElement("style");
        msViewportStyle.appendChild(
            document.createTextNode(
                "@-ms-viewport{width:auto!important}"
            )
        );
        document.querySelector("head").appendChild(msViewportStyle);

    }
    $(document).ready(function () {
        $('.owl-carousel').owlCarousel({
            loop:true,
            margin:0,
            nav:true,
            items:1,
        })
    });

})(jQuery);
