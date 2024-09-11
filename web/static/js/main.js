let Piranha = (function () {
    'use strict';

    class Piranha {


        constructor() {
            this.toggleHeader();
            this.indicateScroll();
        }

        toggleHeader() {
            const header = document.querySelector('.header');
            if (header) {
                window.addEventListener('scroll', () => {
                    header.classList.toggle('active', window.scrollY > 0);
                })
            }
        }

        indicateScroll() {
            let documentHeight = document.documentElement.scrollHeight;
            let viewportHeight = document.documentElement.clientHeight;
            let indicator = $('.indicator');

            window.onscroll = function () {
                let percentScroll = (scrollY / (documentHeight - viewportHeight)) * 100;
                indicator[0].style.width = percentScroll + '%';
            }
        }
    }
    
    return Piranha;        
})();
    
new Piranha();