let Piranha = (function () {
    'use strict';

    class Piranha {
        documentHeight = document.documentElement.scrollHeight;
        viewportHeight = document.documentElement.clientHeight;
        
        constructor() {
            this.toggleHeaderColor();
            this.mobileMenuOpen();
            this.mobileMenuClose();
            this.initLazyLoadImages();
            this.dynamicAppear();
            this.smoothScroll();
            this.openModal();
            this.closeModal();
            this.initSliders();
            // this.initMasonry();
            this.toggleHeaderPosition();
        }

        initMasonry() {
            $('.review-items').masonry({
                itemSelector: ".review-item"
            })
        }

        toggleHeaderPosition() {
            var prevScrollpos = window.scrollY;

            /* Get the header element and it's position */
            var headerDiv = document.querySelector(".header");
            let indicator = document.querySelector('.indicator');

            let headerBottom = headerDiv.offsetTop + headerDiv.offsetHeight;
            
            window.onscroll = function() {
                let percentScroll = (scrollY / (this.documentHeight - this.viewportHeight)) * 100;
                indicator.style.width = percentScroll + '%';
                let currentScrollPos = window.scrollY;
            
                /* if we're scrolling up, or we haven't passed the header,  show the header at the top */
                if (prevScrollpos > currentScrollPos  || currentScrollPos < headerBottom){  
                    headerDiv.style.top = "0";
                } else{
                    /* otherwise we're scrolling down & have passed the header so hide it */
                    headerDiv.style.top = "-7.2rem";
                } 
            
                prevScrollpos = currentScrollPos;
            }
        }

        initSliders() {
            $('.address-items').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                autoplay: true,
                dots: true,
                autoplaySpeed: 2000,
                responsive: [
                    {
                      breakpoint: 1140,
                      settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                      }
                    },
                    {
                      breakpoint: 767,
                      settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                      }
                    }
                ],
            });

            $('.price-items').slick({
                slidesToShow: 3,
                infinite: false,
                slidesToScroll: 1,
                autoplay: false,
                dots: true,
                autoplaySpeed: 2000,
                responsive: [
                    {
                      breakpoint: 1240,
                      settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                      }
                    },
                    {
                      breakpoint: 998,
                      settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                      }
                    }
                ],
            });

            $('.review-items').slick({
                slidesToShow: 5,
                slidesToScroll: 1,
                autoplay: false,
                dots: true,
            });
        }

        openModal() {
            let self = this;
            $('[data-modal-open]').each((i, el) => {
                $(el).on('click', function() {
                    if ($(el).data('check')) {
                        let val = $(el).data('check')
                        $(`#sign-form input[value=${val}]`).prop("checked", true);
                    }

                    if ($(this).data('benefit')) {
                        self.setCookie('benefit', 'true', 1);
                    }

                    $('.modal').fadeOut();

                    $(`.${$(el).attr('data-modal')}`).fadeIn()
                    $("body").addClass("disable-scroll");
                })
            })
        }

        closeModal() {
            let self = this;
            $('[data-modal-close]').on('click', function() {
                if ($(this).data('benefit')) {
                    self.setCookie('benefit', 'true', 1);
                }

                $('.send-success, .send-error').css('display', 'none');
                $('.modal').fadeOut();
                $("body").removeClass("disable-scroll");
            })
        }

        smoothScroll(){
            $('a, button').each((i, el) => {
                $(el).on('click', function(e) {
                    if ($(this).data('anchor')) {
                        e.preventDefault()
                        const selector = `#${$(this).data('anchor')}`;
                        let scrollToElement = $(selector)[0];
    
                        if (scrollToElement) {
                            scrollToElement.scrollIntoView({
                                behavior: 'smooth'
                            });
                        }
                    }
                })
            })
        }

        dynamicAppear() {
            function checkVisible(element) {
                const rect = element.getBoundingClientRect();
                var viewHeight = Math.max(document.documentElement.clientHeight, window.innerHeight);
                return !(rect.bottom < 0 || rect.top - viewHeight >= 0);
            }

            const indexPages = document.querySelectorAll('.page')
            $(window).on('scroll', function() {
                indexPages.forEach((page, i) => {
                    if (checkVisible(page) ) {
                        page.classList.add('page-visible')
                        this.documentHeight = document.documentElement.scrollHeight;
                        this.viewportHeight = document.documentElement.clientHeight;
                    }
                })
            })
        }

        toggleHeaderColor() {
            const header = document.querySelector('.header');
            if (header) {
                window.addEventListener('scroll', () => {
                    header.classList.toggle('active', window.scrollY > 0);
                })
            }
        }

        // indicateScroll() {
        //     let indicator = $('.indicator');

        //     if (indicator[0]) {
        //         window.onscroll = function () {
        //             let percentScroll = (scrollY / (this.documentHeight - this.viewportHeight)) * 100;
        //             indicator[0].style.width = percentScroll + '%';
        //         }
        //     }
        // }

        mobileMenuOpen() {
            $('.mobile-menu-button').on('click', function(e) {
                $("body").addClass("disable-scroll");
                $('.header .menu').addClass('active')
                $('.bg').addClass('active')
            })
        }

        mobileMenuClose() {
            $(document).on('click', function(e) {
                if ($(e.target).hasClass('bg') || $(e.target).hasClass('mobile-close')) {
                    $('.header .menu').removeClass('active')
                    $('.bg').removeClass('active')
                    $("body").removeClass("disable-scroll");
                }
            })
        }

        initLazyLoadImages() {
            const items = document.querySelectorAll('img[data-lazysrc], source[data-lazysrcset]');
            if (!items?.length) {
                return;
            }

            let fallbackItem = (item) => {
                if (item.dataset?.lazysrc !== undefined) {
                    item.src = item.dataset.lazysrc;
                    item.removeAttribute('data-lazysrc');
                }

                if (item.dataset?.lazysrcset !== undefined) {
                    item.srcset = item.dataset.lazysrcset;
                    item.removeAttribute('data-lazysrcset');
                }
            }

            if ('IntersectionObserver' in window) {
                let intersectionObserver = new IntersectionObserver((entries, imgObserver) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            const item = entry.target;

                            if (['IMG', 'SOURCE'].includes(item.tagName)) {
                                fallbackItem(item);
                            }

                            imgObserver.unobserve(item);
                        }
                    });
                }, {
                    threshold: 0.1,
                    rootMargin: '30%'
                });

                items.forEach((item)=>intersectionObserver.observe(item));

            } else {
                items.forEach((item)=>fallbackItem(item));
            }
        }

        setCookie(name, value, days) {
            var expires = "";
            if (days) {
                var date = new Date();
                date.setTime(date.getTime() + (days*24*60*60*1000));
                expires = "; expires=" + date.toUTCString();
            }
            document.cookie = name + "=" + (value || "")  + expires + "; path=/";
        }
        
        getCookie(name) {
            var nameEQ = name + "=";
            var ca = document.cookie.split(';');
            for(var i=0;i < ca.length;i++) {
                var c = ca[i];
                while (c.charAt(0)==' ') c = c.substring(1,c.length);
                if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
            }
            return null;
        }
        
        eraseCookie(name) {   
            document.cookie = name +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
        }
    }
    
    return Piranha;        
})();
    
let piranha = new Piranha();


$(window).on('load', function(){
    $('#overlay').addClass('hidden');
    $('.page.intro').addClass('page-visible')

    let benefitCookie = piranha.getCookie('benefit');
    if (!benefitCookie) {
        setTimeout(() => {
            $('.modal-benefit').fadeIn();
            $("body").addClass("disable-scroll");
        }, 3000)
    }
});

$(document).on("pjax:start", function() {
    $('.send-success, .send-error').css('display', 'none');
    $('button[type="submit"]').attr('disabled', true)
})

$(document).on("beforeValidate", "form", function() {
    $(this).find(':submit').attr('disabled', true);
}).on("afterValidate", "form", function(e, msg, errorAttributes) {
    if (errorAttributes.length > 0) {
        $(this).find(':submit').attr('disabled', false);
    }
});

$(document).on("pjax:complete", function() {
    $('button[type="submit"]').removeAttr('disabled');
})

$(document).on("pjax:success", function() {
    $('.modal').fadeOut();
    $('.modal-ajax-success').fadeIn()
})

$(document).on("pjax:error", function() {
    $('.modal').fadeOut();
    $('.modal-ajax-error').fadeIn();
})