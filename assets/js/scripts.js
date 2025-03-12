;(function ($) {

    "use strict";


    document.addEventListener("DOMContentLoaded", function () {
        const body = document.querySelector("body");

        // Sticky Header
        window.addEventListener("scroll", () => {
            const fixedHeader = document.querySelector(".navbar-overlay");
            const navbarTop = document.querySelector(".navbar-top");
            if (navbarTop) {
            const navTop = navbarTop.offsetHeight;
            const scrolled = window.scrollY;
            const navbarTopRemove = () => {
                if (scrolled > navTop) {
                body.classList.add("navbar-top-toggle");
                } else if (scrolled < navTop) {
                body.classList.remove("navbar-top-toggle");
                } else {
                body.classList.remove("navbar-top-toggle");
                }
            };
            navbarTopRemove();
            }
            if (fixedHeader) {
            const headerTop = fixedHeader.offsetHeight;
            const scrolled = window.scrollY;
            const headerFixed = () => {
                if (scrolled > headerTop) {
                body.classList.add("navbar-sticky-init");
                } else if (scrolled < headerTop) {
                body.classList.remove("navbar-sticky-init");
                } else {
                body.classList.remove("navbar-sticky-init");
                }
            };
            setTimeout(headerFixed, 100);
            }
        });

        // Preloader
        const preloader = document.querySelector(".preloader");
        window.addEventListener("load", () => {
            if (preloader) {
                preloader.style.display = "none";
            }
        });

        
    });




    $(document).ready(function () {



    });

})(jQuery);