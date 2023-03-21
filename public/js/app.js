"use strict";
(self["webpackChunkinternship_laravel"] = self["webpackChunkinternship_laravel"] || []).push([["/js/app"],{

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _bootstrap__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./bootstrap */ "./resources/js/bootstrap.js");
/* harmony import */ var slick_carousel_slick_slick_min__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! slick-carousel/slick/slick.min */ "./node_modules/slick-carousel/slick/slick.min.js");
/* harmony import */ var slick_carousel_slick_slick_min__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(slick_carousel_slick_slick_min__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var jquery_dist_jquery_min__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! jquery/dist/jquery.min */ "./node_modules/jquery/dist/jquery.min.js");
/* harmony import */ var jquery_dist_jquery_min__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(jquery_dist_jquery_min__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _script__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./script */ "./resources/js/script.js");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_4__);





jquery__WEBPACK_IMPORTED_MODULE_4___default()(function () {
  jquery__WEBPACK_IMPORTED_MODULE_4___default()('[data-slick-carousel]').slick({
    dots: true
  });
  jquery__WEBPACK_IMPORTED_MODULE_4___default()('[data-accordion]').each(function () {
    var $accordion = jquery__WEBPACK_IMPORTED_MODULE_4___default()(this);
    var isOpen = $accordion.data('active') !== undefined;
    var $accordionToggle = $accordion.find('[data-accordion-toggle]');
    var $accordionNoActiveItem = $accordion.find('[data-accordion-not-active]');
    var $accordionActiveItem = $accordion.find('[data-accordion-active]');
    var $accordionContent = $accordion.find('[data-accordion-details]');
    $accordionToggle.on('click', function () {
      if (isOpen) {
        $accordionNoActiveItem.show();
        $accordionActiveItem.hide();
        $accordionContent.slideUp();
      } else {
        $accordionNoActiveItem.hide();
        $accordionActiveItem.show();
        $accordionContent.slideDown();
      }
      isOpen = !isOpen;
    });
  });
});

/***/ }),

/***/ "./resources/js/bootstrap.js":
/*!***********************************!*\
  !*** ./resources/js/bootstrap.js ***!
  \***********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var bootstrap__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! bootstrap */ "./node_modules/bootstrap/dist/js/bootstrap.esm.js");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! axios */ "./node_modules/axios/lib/axios.js");


/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */


window.axios = axios__WEBPACK_IMPORTED_MODULE_1__["default"];
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// import Pusher from 'pusher-js';
// window.Pusher = Pusher;

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: import.meta.env.VITE_PUSHER_APP_KEY,
//     wsHost: import.meta.env.VITE_PUSHER_HOST ?? `ws-${import.meta.env.VITE_PUSHER_APP_CLUSTER}.pusher.com`,
//     wsPort: import.meta.env.VITE_PUSHER_PORT ?? 80,
//     wssPort: import.meta.env.VITE_PUSHER_PORT ?? 443,
//     forceTLS: (import.meta.env.VITE_PUSHER_SCHEME ?? 'https') === 'https',
//     enabledTransports: ['ws', 'wss'],
// });

/***/ }),

/***/ "./resources/js/script.js":
/*!********************************!*\
  !*** ./resources/js/script.js ***!
  \********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_0__);

jquery__WEBPACK_IMPORTED_MODULE_0___default()(function () {
  jquery__WEBPACK_IMPORTED_MODULE_0___default()('[data-slick-carousel-detail]').each(function () {
    var $carousel = jquery__WEBPACK_IMPORTED_MODULE_0___default()(this);
    $carousel.find('[data-slick-carousel-detail-items]').slick({
      dots: true,
      arrows: false,
      appendDots: $carousel.find('[data-slick-carousel-detail-pager]'),
      rows: 0,
      customPaging: function customPaging(slick, index) {
        var imageSrc = slick.$slides[index].src;
        return "\n<div class=\"relative\">\n  <svg xmlns=\"http://www.w3.org/2000/svg\" class=\"active-arrow absolute -top-6 left-2/4 -ml-3 text-orange h-6 w-6\" fill=\"none\" viewBox=\"0 0 24 24\" stroke=\"currentColor\">\n    <path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M5 15l7-7 7 7\" />\n  </svg>\n  <span class=\"inline-block border rounded cursor-pointer\"><img class=\"h-20 w-40 object-cover\" src=\"".concat(imageSrc, "\" alt=\"\" title=\"\"></span>\n</div>");
      }
    });
  });
});

/***/ })

},
/******/ __webpack_require__ => { // webpackRuntimeModules
/******/ var __webpack_exec__ = (moduleId) => (__webpack_require__(__webpack_require__.s = moduleId))
/******/ __webpack_require__.O(0, ["/js/vendor"], () => (__webpack_exec__("./resources/js/app.js")));
/******/ var __webpack_exports__ = __webpack_require__.O();
/******/ }
]);