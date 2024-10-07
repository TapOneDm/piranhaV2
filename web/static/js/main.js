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
            this.toggleHeaderPosition();
            this.initCollapse();
            this.loadMoreGallery();
            this.toggleExpandedMobile();
        }

        initCollapse() {
            $('.collapse-item .collapse-content').hide();

            $('.collapse-caption').click(function() {
                $(this).toggleClass('opened');
                $(this).parent().find('.collapse-content').slideToggle();
            });
        }

        initMasonry() {
            $('.review-items').masonry({
                itemSelector: ".review-item"
            })
        }

        toggleHeaderPosition() {
            let prevScrollpos = window.scrollY;

            /* Get the header element and it's position */
            let headerDiv = document.querySelector(".header");
            let indicator = document.querySelector('.indicator');
            let firstPageDiv = document.querySelector('.page');
            let headerBottom = headerDiv.offsetTop + headerDiv.offsetHeight;
            
            window.onscroll = function() {
                let percentScroll = (scrollY / (this.documentHeight - this.viewportHeight)) * 100;
                indicator.style.width = percentScroll + '%';
                let currentScrollPos = window.scrollY;
            
                /* if we're scrolling up, or we haven't passed the header,  show the header at the top */
                if (prevScrollpos > currentScrollPos  || currentScrollPos < headerBottom){  
                    headerDiv.style.top = "0";
                    firstPageDiv.style.paddingTop = "5.2rem";
                } else{
                    /* otherwise we're scrolling down & have passed the header so hide it */
                    headerDiv.style.top = `-${(headerDiv.offsetHeight - 6)}px`;
                    firstPageDiv.style.paddingTop = "5.2rem";
                } 
            
                prevScrollpos = currentScrollPos;
            }
        }

        loadMoreGallery() {
            $('.gallery-load-more').on('click', function() {
                $(this).html('<span class="loader"></span>');
                let $galleryItems = $('.gallery-items');

                $.ajax({
                    url: 'site/gallery-list',
                    method: 'post',
                    success: (response) => {
                        $galleryItems.html(response.html);
                        $(document).scrollTop($(this).offset().top);
                        
                        $(this).addClass('hidden');
                        return;
                    },
                    error: (error) => {
                        $('.modal-ajax-error').fadeIn();
                        $(this).addClass('hidden');
                        return;
                    },
                });

                return;
            });
        }

        initSliders() {
            $('.address-items').slick({
                touchThreshold:100,
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
                touchThreshold:100,
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
                touchThreshold:100,
                slidesToShow: 5,
                slidesToScroll: 1,
                autoplay: false,
                dots: true,
            });

            $('.coach-items').slick({
                touchThreshold:100,
                slidesToShow: 4,
                slidesToScroll: 1,
                autoplay: false,
                infinite: false,
                dots: true,
                responsive: [
                    {
                        breakpoint: 1240,
                        settings: {
                          slidesToShow: 3,
                          slidesToScroll: 1,
                        }
                      },
                    {
                      breakpoint: 998,
                      settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                      }
                    },
                    {
                      breakpoint: 576,
                      settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                      }
                    }
                ],
            });
        }

        openModal() {
            let self = this;
            $('[data-modal-open]').each((i, el) => {
                $(el).on('click', function() {
                    self.unsubscribeSignFormChange();
                    self.subscribeSignFormChange();

                    if ($(el).data('check')) {
                        let val = $(el).data('check')
                        $(`#sign-form input[value=${val}]`).prop("checked", true);
                        self.resetFormTrainTypeVal();
                        $(`.sign-description .${val}`).addClass('active');
                    }

                    $('#sign-train_type label').first().css('display', 'grid');

                    if ($('.modal-adult').css('display') === 'block') {
                        $('#sign-train_type label').first().css('display', 'none');
                    }

                    if ($(this).data('benefit')) {
                        self.setCookie('benefit', 'true', 1);
                    }

                    if (!$(this).hasClass('adult-sign')) {
                        $('.modal').fadeOut();
                    }

                    $(`.${$(el).attr('data-modal')}`).fadeIn()
                    $("body").addClass("disable-scroll");
                })
            })
        }

        subscribeSignFormChange() {
            let self = this;
            self.resetFormTrainTypeVal();
            $("#sign-form :input").change(function() {
                let val = $('input[name="Sign[train_type]"]:checked').val();
                self.resetFormTrainTypeVal();
                $(`.sign-description .${val}`).addClass('active');
            });
        }

        unsubscribeSignFormChange() {
            $('#sign-form :input').off('change');
        }

        resetFormTrainTypeVal() {
            $('.sign-description ul').each((i, el) => {
                $(el).removeClass('active');
            })  
        }

        closeModal() {
            let self = this;
            $('[data-modal-close]').on('click', function() {
                if ($(this).data('benefit')) {
                    self.setCookie('benefit', 'true', 1);
                }

                if ($(this).data('sign')) {
                    $('form').trigger("reset");
                }

                $('.send-success, .send-error').css('display', 'none');
                
                $(`.${$(this).attr('data-modal-close')}`).fadeOut();
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

        toggleExpandedMobile() {
            if (this.mobileAndTabletCheck()) {
                $('.expanded-item').each((i, el) => {
                    $(el)
                    .on('touchstart', function () {
                        $(this).data('moved', '0');
                    })
                    .on('touchmove', function () {
                        $(this).data('moved', '1');
                    })
                    .on('touchend', function () {
                        if($(this).data('moved') == 0){
                            $(this).toggleClass('touched');
                        }
                    });
                })
            }
        }

        mobileAndTabletCheck() {
            let check = false;
            (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino|android|ipad|playbook|silk/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) check = true;})(navigator.userAgent||navigator.vendor||window.opera);
            return check;
        };
    }
    
    return Piranha;        
})();

let piranha = new Piranha();


$(window).on('load', function(){
    let $overlay = $('#overlay');

    $overlay.addClass('hidden');
    setTimeout(() => $overlay.remove(), 300);

    let benefitCookie = piranha.getCookie('benefit');
    if (!benefitCookie) {
        setTimeout(() => {
            $('.modal-benefit').fadeIn();
            $("body").addClass("disable-scroll");
        }, 90000)
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