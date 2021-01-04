import 'bootstrap';
import './sass/main.scss';

import Parallax from 'parallax-js';
import anime from 'animejs/lib/anime.es.js';
import LiquidButton from './js/modules/liquid-button.js';

var slick = require('slick-carousel');
var waypoint = require('waypoints/lib/noframework.waypoints.min');
var url = require('url');
var ourMilestones = require('./js/modules/our-milestones');
var bodymovin = require('./js/modules/lottie');



$(window).on('beforeunload', function () {
    $(window).scrollTop(0);
});


if (document.querySelector('.we-and-our-friends')) {
    var persons = require('./js/modules/persons');
}



if (document.querySelector('.wat-preloader')) {
    var animation = bodymovin.loadAnimation({
        container: document.getElementById('wat-canvas-wrapper'),
        renderer: 'canvas',
        loop: true,
        autoplay: true,
        path: wp_localize.url_template + '/assets/json/data.json',
    });
}

if (document.getElementById('canvaslogo')) {
    var animation = bodymovin.loadAnimation({
        container: document.getElementById('canvaslogo'),
        renderer: 'canvas',
        loop: true,
        autoplay: true,
        path: wp_localize.url_template + '/assets/json/data.json',
    });
}

$(document).ready(function () {
    $('.wat-preloader').fadeOut();
});

// ----------------------------------------------------------------
// GLOBALS
// ----------------------------------------------------------------
var windowWidth = window.innerWidth;
var windowHeight = window.innerHeight;



var updateWindowSize = function () {
    let step = 10;

    if (
        windowWidth + step < window.innerWidth ||
        windowWidth - step > window.innerWidth
    ) {
        windowWidth = window.innerWidth;

        //redrawLiquidButton();
    }
    if (
        windowHeight + step < window.innerHeight ||
        windowHeight - step > window.innerHeight
    ) {
        windowHeight = window.innerHeight;
    }
};

var navbarShow = function () {
    if ($(this).scrollTop() >= 80) {
        $('.navbar').addClass('sticky');
    } else {
        $('.navbar').removeClass('sticky');
    }
};

// ----------------------------------------------------------------
// PARALLAX
// ----------------------------------------------------------------

// page ALL, global background
var bgParalax = document.getElementById('bg-paralax');
var parallaxInstance = new Parallax(bgParalax);

// page HOME
if (document.getElementById('page-home')) {
    var processHeadParalax = document.querySelector('#process-head');
    var parallaxInstance2 = new Parallax(processHeadParalax);
}

// page KONTAKT
if (document.getElementById('page-contact')) {
    var processHeadParalaxContact = document.querySelector(
        '#process-head-contact'
    );
    var parallaxInstance3 = new Parallax(processHeadParalaxContact);
}

// page TEAM
if (document.getElementById('page-team')) {
    var titansParalax = document.querySelector('.titans-paralax');
    var parallaxInstanceTitans = new Parallax(titansParalax);

    var arbuzzParalax = document.querySelector('.arbuzz-paralax');
    var parallaxInstanceArbuzz = new Parallax(arbuzzParalax);

    var fuckupParalax = document.querySelector('.fuckup-paralax');
    var parallaxInstanceFuckup = new Parallax(fuckupParalax);

    var kkoParalax = document.querySelector('.kko-paralax');
    var parallaxInstancekko = new Parallax(kkoParalax);
}

// page 404
if (document.getElementById('page-404')) {
    var processHeadParalaxContact = document.querySelector(
        '#process-head-contact2'
    );
    var parallaxInstance5 = new Parallax(processHeadParalaxContact);
}

// ----------------------------------------------------------------
// login box
// ----------------------------------------------------------------

function showHideClientPanel() {
    $('.login-box').toggleClass('login-box-not-visible');

    if ($('.login-box').hasClass('login-box-not-visible')) {
        $('.login-box').attr('data-aos', 'flip-up');
    } else {
        $('.login-box').attr('data-aos', '');
    }
}

$('li.nav-item.login-item a').click(showHideClientPanel);
$('.close-btn').click(showHideClientPanel);

// ----------------------------------------------------------------
// hamburger
// ----------------------------------------------------------------

$('.hamburger').click(function () {
    var hamburgertxt = $('span.hamburger-txt');

    hamburgertxt.toggleClass('expanded');

    if (hamburgertxt.hasClass('expanded')) {
        hamburgertxt.html(wp_localize.text_close);
    } else {
        hamburgertxt.html(wp_localize.text_menu);
    }

    $(this).toggleClass('is-active');
});

// ----------------------------------------------------------------
// Second carousel
// ----------------------------------------------------------------

if (document.getElementById('case-studies')) {
    $(document).ready(function () {
        showActiveMarque('part-0-more-tags');
    });

    $('.hashtags li').click(function () {
        var dataRel = $(this).find('a').attr('data-rel');

        $('.hashtags li a').each(function () {
            $(this).removeClass('hashtag-active');
        });
        $(this).find('a').addClass('hashtag-active');

        // $(".more-tags").each(function() {
        //     $(this).addClass("d-none");
        //     $(this).addClass("not-clickable");
        // });
        let tag_name = dataRel + '-more-tags';
        showActiveMarque(tag_name);

        // filter items by category
        let category_name = $(this).find('a').attr('data-category-slug');
        showPortfolioItems(category_name);
    });
}

function showPortfolioItems(category_name) {
    $('.portfolio-item').each(function () {
        let class_name = 'category_' + category_name;

        if ($(this).hasClass(class_name)) {
            $(this).fadeIn();
        } else {
            $(this).fadeOut();
        }
    });
}

function showActiveMarque(tags_name) {
    $('.more-tags').each(function () {
        if ($(this).hasClass(tags_name)) {
            $(this).removeClass('d-none');
            //$(this).removeClass('not-visible');
            $(this).removeClass('not-clickable');
        } else {
            $(this).addClass('d-none');
            //$(this).addClass('not-visible');
            $(this).addClass('not-clickable');
        }
    });
}

if (document.getElementById('case-studies')) {
    $(document).ready(function () {
        $('.part-0-more-tags').slick({
            autoplay: true,
            autoplaySpeed: 0,
            speed: 3000,
            cssEase: 'linear',
            infinite: true,
            variableWidth: true,
            arrows: false,
        });

        $('.part-1-more-tags').slick({
            autoplay: true,
            autoplaySpeed: 0,
            speed: 3000,
            cssEase: 'linear',
            infinite: true,
            variableWidth: true,
            arrows: false,
        });

        $('.part-2-more-tags').slick({
            autoplay: true,
            autoplaySpeed: 0,
            speed: 3000,
            cssEase: 'linear',
            infinite: true,
            variableWidth: true,
            arrows: false,
        });

        $('.part-3-more-tags').slick({
            autoplay: true,
            autoplaySpeed: 0,
            speed: 3000,
            cssEase: 'linear',
            infinite: true,
            variableWidth: true,
            arrows: false,
        });

        $('.part-4-more-tags').slick({
            autoplay: true,
            autoplaySpeed: 0,
            speed: 3000,
            cssEase: 'linear',
            infinite: true,
            variableWidth: true,
            arrows: false,
        });
    });
}

if (document.getElementById('page-home')) {
    $(document).ready(function () {
        $('.testimonials-row-1').slick({
            infinite: true,
            slidesToShow: 2,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: -1,
            speed: 15000,
            pauseOnFocus: false,
            pauseOnHover: false,
            arrows: false,
            cssEase: 'linear',
            variableWidth: true,
        });

        $('.testi').slick({
            infinite: true,
            slidesToShow: 2,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: -1,
            speed: 12000,
            pauseOnFocus: false,
            pauseOnHover: false,
            arrows: false,
            cssEase: 'linear',
            rtl: true,
            variableWidth: true,
        });

        $('.last-testmin').slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: -1,
            speed: 25000,
            pauseOnFocus: false,
            pauseOnHover: false,
            arrows: false,
            cssEase: 'linear',
            variableWidth: true,
        });
    });
}

if (document.getElementById('page-team')) {
    $('.we-and-our-friends-slick').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        dots: false,
        arrows: false,
        infinite: true,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    infinite: true,
                    //  dots: true
                },
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                },
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                },
            },
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ],
    });
}

const firstPath =
    'm 127.0179977,67.0580063c7.5720139,12.6210022-4.1609955,27.6149979-15,34 c-19.1539993,11.1360016-8.2919998,28.0219955-27,34.9999924c-24.5,9.0570068-51-9.8289871-51-36.9999924 c0-17.2229996-15.3099995-22.8860016-25.9999981-41.0000038c-22.5690002-37.8619995,7.2439995-69.5899963,30.9999981-54 c30.5859985,20.0449982,43.4309998-14.9280005,66,36C115.2630005,63.2219963,119.2929916,54.1419983,127.0179977,67.0580063z';

const secPath =
    'm 116,68c6.5303955,10.8848495-1.1668015,23.1199875-10.5147934,28.6266632 C93.4416504,108.8388214,98.6345215,122.4819031,82.5,128.5c-24.1993408-0.8120499-40.1914177-10.5031815-46.75-33 c-4.5864697-15.7322006-10.7390289-20.3360138-19.9585075-35.9582405C-6.0096569,21.2552166,20.2618847,3.05457,40.75,16.5 C66.742363,36.4155388,79.9837341,0.0955238,99.4481354,44.017849C102.4610977,63.2668648,109.3376465,56.8607254,116,68z';

anime({
    targets: '.st0',
    d: [{
            value: secPath,
        },
        //   { value: firstPath },
    ],
    translateX: {
        value: [0, 0],
        duration: 600,
        delay: 0,
        easing: 'easeOutCubic',
    },
    easing: 'easeOutQuad',
    duration: 2000,
    loop: true,
});

$('.cookie-accept-btn').click(function () {
    setCookie('cookie-consent', 'accepted', 360);
    $('.cookie-consent').hide();
});

function setCookie(name, value, exdays) {
    var date = new Date();
    date.setTime(date.getTime() + exdays * 24 * 60 * 60 * 1000);
    var expires = 'expires=' + date.toUTCString();
    document.cookie = name + '=' + value + '; ' + expires + '; path=/';
}

function getCookie(name) {
    var cname = name,
        cArg = document.cookie.split(';');
    for (let i = 0; i < cArg.length; i++) {
        var cA = cArg[i];
        while (cA.charAt(0) === ' ') cA = cA.substring(1);
        if (cA.indexOf(name) === 0) {
            return cA.substring(name.length, cA.length);
        }
    }
    return false;
}



$('#sound-switcher').change(function () {
    if ($(this).prop('checked')) {
        $('.home-video video').prop('muted', false);
    } else {
        $('.home-video video').prop('muted', true);
    }
});

if (document.getElementById('page-startups') && window.innerWidth > 1199) {
    let waypoint = new Waypoint({
        element: document.getElementById('video-play'),
        handler: function (direction) {
            let element_video = $('.startups-video video');
            if (undefined !== element_video) {
                // https://developers.google.com/web/updates/2017/06/play-request-was-interrupted
                $('.startups-video video').prop('muted', false);
                $('.startups-video video').trigger('play');
            }
        },
    });

    let waypoint2 = new Waypoint({
        element: document.getElementById('video-stop'),
        handler: function (direction) {
            $('.startups-video video').prop('muted', false);
            $('.startups-video video').trigger('pause');
        },
    });

    let waypoint3 = new Waypoint({
        element: document.getElementById('video-init-stop'),
        handler: function (direction) {
            $('.startups-video video').prop('muted', false);
            $('.startups-video video').trigger('pause');
        },
        offset: '-50%',
    });
}

$('.startups-video video').click(function () {
    $(this).prop('muted', false);
    $(this).prop('controls', true);
    $(this).trigger('play');
    $(this).addClass('mobile-during-play');
});

//  startups page
$('.offer-for-startups .elem').hover(elemIn, elemOut);

function elemIn() {
    $('.offer-for-startups .elem').each(function () {
        $(this).removeClass('elem-active');
    });

    $(this).addClass('elem-active');

    if ($(this).hasClass('elem-1')) {
        $('.items--content div').each(function () {
            $(this).addClass('d-none');
        });

        $('.elem-1--content').removeClass('d-none');
    } else if ($(this).hasClass('elem-2')) {
        $('.items--content div').each(function () {
            $(this).addClass('d-none');
        });

        $('.elem-2--content').removeClass('d-none');
    } else if ($(this).hasClass('elem-3')) {
        $('.items--content div').each(function () {
            $(this).addClass('d-none');
        });

        $('.elem-3--content').removeClass('d-none');
    }
    if ($(this).hasClass('elem-4')) {
        $('.items--content div').each(function () {
            $(this).addClass('d-none');
        });

        $('.elem-4--content').removeClass('d-none');
    }
}

function elemOut() {
    return null;
}

let cookieInfo = function () {
    if (false === getCookie('cookie-consent')) {
        $('.cookie-consent').removeClass('d-none');
    }
};

let mailFormAction = function () {
    // cf7 form submit + check acceptance
    $('.form-mail .form-send-btn').click(function () {
        let acceptance_checkbox = $('.form-mail .form-acceptance');
        let acceptance_label = $('.form-mail .wpcf7-list-item-label');
        let submit_status = $('.form-mail .wpcf7-submit');

        if (true === submit_status.is(':disabled')) {
            acceptance_label.addClass('color-red font-weight-bold');
            acceptance_label
                .fadeOut()
                .fadeIn()
                .fadeOut()
                .fadeIn()
                .fadeOut()
                .fadeIn(function () {
                    acceptance_label.removeClass('color-red font-weight-bold');
                });
        }

        $('.form-mail .wpcf7-submit').click();
    });

    // rodo checkbox
    $('label.rodo').click(function () {
        let input = jQuery(this).find('input');

        if (input.prop('checked') == true) {
            input.prop('checked', '');
        } else {
            input.prop('checked', 'true');
        }
    });
};

let briefValidate = function () {
    // init .
    let form_valid = false;
    // ---
    $('.step-number').removeClass('color-red');
    $('.step-heading h4').removeClass('color-red');
    $('.small-info').removeClass('color-red');
    $('.rodo p').removeClass('color-red');
    $('.error_email').addClass('d-none');

    var row_1_valid = false;
    $('.val-1 .checkbox').each(function () {
        let checkbox_selected = $(this).hasClass('selected');
        if (checkbox_selected) {
            row_1_valid = true;
        }
    });
    if (false === row_1_valid) {
        $('.val-1 .step-number').addClass('color-red');
        $('.val-1 .step-heading h4').addClass('color-red');
        $('.val-1 .small-info').addClass('color-red');
    }

    var row_2_valid = false;
    $('.val-2 .checkbox').each(function () {
        let checkbox_selected = $(this).hasClass('selected');
        if (checkbox_selected) {
            row_2_valid = true;
        }
    });
    if (false === row_2_valid) {
        $('.val-2 .step-number').addClass('color-red');
        $('.val-2 .step-heading h4').addClass('color-red');
        $('.val-2 .small-info').addClass('color-red');
    }

    var row_3_valid = false;
    var budget_value = document.querySelector('#budget-value').innerHTML;
    if (0 <= budget_value) {
        row_3_valid = true;
    }
    if (false === row_3_valid) {
        $('.val-3 .step-number').addClass('color-red');
        $('.val-3 .step-heading h4').addClass('color-red');
        $('.val-3 .small-info').addClass('color-red');
    }

    var row_4_valid = false;
    var time_value = document.querySelector('#time-value').innerHTML;
    if (0 <= time_value) {
        row_4_valid = true;
    }
    if (false === row_4_valid) {
        $('.val-4 .step-number').addClass('color-red');
        $('.val-4 .step-heading h4').addClass('color-red');
        $('.val-4 .small-info').addClass('color-red');
    }

    var mail_valid = false;
    var mail_value = document.querySelector('#input-mail').value;
    if (4 < mail_value.length) {
        mail_valid = true;
    }
    if (false === mail_valid) {
        $('.error_email').removeClass('d-none');
    }

    var rodo_valid = $('label.rodo').find('input').prop('checked');
    if (false === rodo_valid) {
        $('.rodo p').addClass('color-red');
    }

    return (
        row_1_valid &&
        row_2_valid &&
        row_3_valid &&
        row_4_valid &&
        mail_valid &&
        rodo_valid
    );
};

let briefSent = function () {
    $.ajax({
        url: wp_localize.site_url + '/wp-admin/admin-ajax.php',
        type: 'POST',
        data: {
            action: 'mail_before_submit',
            form_data: $('form').serializeArray(),
        },
        dataType: 'html',
        beforeSend: function () {
            $('.error-info').addClass('d-none');
            $('.info-mail-send').addClass('d-none');
            $('.info-mail-error').addClass('d-none');
        },
        success: function (response) {
            console.log('response: ' + response);
            if (1 === parseInt(response)) {
                $('.info-mail-send').removeClass('d-none');

                window.setTimeout(function () {
                    window.location.href = wp_localize.url_main;
                }, 5000);
            } else {
                $('.info-mail-error').removeClass('d-none');
            }
        },
    });
};

let briefFormAction = function () {
    if (document.getElementById('page-brief')) {
        // init: send brief
        $('.form-send-btn').click(function () {
            let result = briefValidate();

            if (false === result) {
                $('.error-info').removeClass('d-none');
            } else {
                $('.error-info').addClass('d-none');

                briefSent();
            }
        });

        // init: budget selector
        var BudgetValues = [
            '3000 - 5000',
            '5000 - 10000',
            '10000 - 20000',
            '20000 - 100000',
        ];
        var input = document.getElementById('input-budget');
        var output = document.querySelector('#range-output');
        var budget_value = document.querySelector('#budget-value');
        input.oninput = function () {
            output.innerHTML = '---';
            budget_value.innerHTML = -1;
        };
        $(input).on('click touchend', function () {
            let buget_value = BudgetValues[this.value];
            $('#range-output').html(buget_value);
            $('#budget-value').text(this.value);
            $('#value-budget').val(this.value);
        });
        input.oninput(); // init .

        // init: time selector
        var TimeValues = [
            wp_localize.brief_1m,
            wp_localize.brief_2m6m,
            wp_localize.brief_6m12m,
            wp_localize.brief_12m,
        ];
        var inputTime = document.getElementById('input-time');
        var outputTime = document.querySelector('#range-output-time');
        var time_value = document.querySelector('#time-value');

        inputTime.oninput = function () {
            outputTime.innerHTML = '---';
            time_value.innerHTML = -1;
        };
        $(inputTime).on('click touchend', function () {
            let time_value = TimeValues[this.value];
            $('#range-output-time').html(time_value);
            $('#time-value').text(this.value);
            $('#value-time').val(this.value);
        });
        inputTime.oninput(); // init .

        // init: validiation
        $('div.checkbox').click(function () {
            $(this).toggleClass('selected');

            let input = $(this).find('input');
            let quote = $(this).find('span.info img');

            if (input.prop('checked') == true) {
                input.prop('checked', '');
                quote.attr('src', './img/quote-gray.png');
            } else {
                input.prop('checked', 'true');
                quote.attr('src', './img/quote-white.png');
            }
        });
    }
};

// ----------------------------------------------------------------
// LIQUID BUTTONS
// ----------------------------------------------------------------
//var LiquidButtons_what_we_do = [];

const initLiquidButtons = function () {
    let buttons_home_list = document.querySelectorAll(
        '.liquid-button__blog-item'
    );
    let buttons_home_others = document.querySelectorAll('.liquid-button');

    for (let btn_element of buttons_home_list) {
        let button_liquid = new LiquidButton(btn_element);
        //button_liquid.parent = btn_element.parentElement;       // save parent element for resize .
        //LiquidButtons_what_we_do.push( button_liquid );
    }

    for (let btn_element of buttons_home_others) {
        new LiquidButton(btn_element);
    }
};

const redrawLiquidButton = function (button_width) {
    // buttons home
    for (var index in LiquidButtons_what_we_do) {
        let btn = LiquidButtons_what_we_do[index];

        if (undefined !== button_width) {
            btn.width = button_width;
        } else {
            let parent_width = $(btn.parent.parentElement).width();
            btn.margin = 30;
            btn.width = parent_width - btn.margin * 2;
            if (400 > btn.width) {
                btn.width = 400;
            }
            if (200 < btn.width) {
                btn.margin = 0;
                btn.width = 280;
            }
        }

        btn.initOrigins(); // redraw button .
    }
};

// ----------------------------------------------------------------
// EVENTS
// ----------------------------------------------------------------
$(document).ready(function () {
    cookieInfo();
    mailFormAction();
    briefFormAction();
    initLiquidButtons();

    // navbar init
    window.scrollBy(0, 1);
    window.scrollBy(0, -1);

    window.onresize = updateWindowSize;
    window.onscroll = navbarShow;
});