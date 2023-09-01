import {
    domReady
} from '@roots/sage/client';

import 'jquery';
import './gallery-lightbox';
import './woocommerce';
import './post/table-content';
import './common';
import './tooltip';
import './slide';
import './showhide';


/**
 * app.main
 */

const main = async (err) => {
    if (err) {
        // handle hmr errors
        console.error(err);
    }

    $(() => {

        setTimeout(() => {
            loadingPageStarter();
        }, 500);
    });
};

function checkScroll() {
    if (typeof $.progressBar !== "undefined") {
        $.progressBar();
        $.anchorScrollCheck();
    }
    if (typeof $.hideHeaderInFooter !== "undefined") {
        $.hideHeaderInFooter();
    }
}

function loadingPageStarter() {
    $('body').removeClass('wating-loading');
    $.checkAlinksWithImage();
    checkScroll();
}

window.addEventListener('scroll', checkScroll);
$(window).on('load', loadingPageStarter);



/**
 * Initialize
 *
 * @see https://webpack.js.org/api/hot-module-replacement
 */
domReady(main);
import.meta.webpackHot?.accept(main);




