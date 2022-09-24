// sticky top need padding cause of fixed nav
var body = document.querySelector('body');
var navbar_height = document.querySelector('.navbar').offsetHeight;
var wpadminbar = document.querySelector('#wpadminbar');
var wpadminbar_height = wpadminbar ? wpadminbar.offsetHeight : 0;

var observer = new MutationObserver(function (mutations) {
    mutations.forEach(function (mutation) {
        if (mutation.type === "childList") {

            let gIframe = document.querySelector('.goog-te-banner-frame');
            let gIframeHeight = gIframe ? gIframe.offsetHeight : 0;

            if (wpadminbar) {
                wpadminbar.style.top = gIframeHeight + "px";
                wpadminbar.style.zIndex = "1051";
            };

            var fullHeight1 = document.querySelectorAll('[hein="fullHeight1"]');
            [].forEach.call(fullHeight1, function (fh) {
                fh.style.height = "calc( 100vh - " + navbar_height + wpadminbar_height + gIframeHeight + "px - 5px)";
                fh.style.overflowY = "auto";
            });

            var stickyT = document.querySelectorAll('.sticky-top');
            [].forEach.call(stickyT, function (el) {
                el.style.top = wpadminbar_height + gIframeHeight + 'px';
            });


            var els = document.querySelectorAll('.offsetNav');
            [].forEach.call(els, function (el) {
                el.style.top = navbar_height + wpadminbar_height + gIframeHeight + 'px';
            });


            body.style.top = '0px';
            if (gIframe) {
                gIframe.style.height = '0px';
                gIframe.style.display = 'none';
            }

        }
    });
});

observer.observe(body, {
    attributes: true, //configure it to listen to attribute changes
    childList: true,
});