/* Imaani Homes v2 — vanilla JS, no dependencies. */
(function () {
  'use strict';

  /* Mobile nav */
  var header = document.getElementById('site-header');
  var toggle = document.querySelector('[data-nav-toggle]');
  if (header && toggle) {
    toggle.addEventListener('click', function () {
      var open = header.classList.toggle('nav-open');
      toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
    });
  }

  /* Hero rotator — restrained: 5s, fade only, pauses on hover/focus, respects reduced motion */
  var rotator = document.querySelector('[data-rotator]');
  if (rotator) {
    var items = rotator.querySelectorAll('[data-rotator-item]');
    var dotsWrap = rotator.querySelector('[data-rotator-dots]');
    var reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (items.length > 1 && !reduced) {
      var idx = 0, timer = null, dots = [];
      items.forEach(function (_, i) {
        var b = document.createElement('b');
        if (i === 0) b.className = 'is-on';
        dotsWrap && dotsWrap.appendChild(b);
        dots.push(b);
      });
      var show = function (n) {
        items[idx].classList.remove('is-active');
        dots[idx] && dots[idx].classList.remove('is-on');
        idx = n % items.length;
        items[idx].classList.add('is-active');
        dots[idx] && dots[idx].classList.add('is-on');
      };
      var start = function () { timer = setInterval(function () { show(idx + 1); }, 5000); };
      var stop = function () { clearInterval(timer); };
      rotator.addEventListener('focusin', stop);
      rotator.addEventListener('focusout', start);
      start();
    }
  }

  /* Cookie banner — light, branded; integrates with WP Consent API if present */
  var banner = document.querySelector('[data-cookie-banner]');
  if (banner) {
    var KEY = 'imaani_cookie_consent';
    var saved = null;
    try { saved = window.localStorage.getItem(KEY); } catch (e) {}
    var setConsent = function (value) {
      try { window.localStorage.setItem(KEY, value); } catch (e) {}
      if (typeof window.wp_set_consent === 'function') {
        ['statistics', 'marketing', 'preferences'].forEach(function (cat) {
          window.wp_set_consent(cat, value === 'allow' ? 'allow' : 'deny');
        });
      }
      banner.hidden = true;
    };
    if (!saved) banner.hidden = false;
    var accept = banner.querySelector('[data-cookie-accept]');
    var decline = banner.querySelector('[data-cookie-decline]');
    accept && accept.addEventListener('click', function () { setConsent('allow'); });
    decline && decline.addEventListener('click', function () { setConsent('deny'); });
  }

  /* Sidebar ad image rotator — crossfade, configurable interval, pauses on hover/focus, respects reduced motion */
  var adSets = document.querySelectorAll('.ad-card__slides[data-interval]');
  if (adSets.length && !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
    adSets.forEach(function (set) {
      var slides = set.querySelectorAll('.ad-card__slide');
      if (slides.length < 2) return;
      var interval = parseInt(set.getAttribute('data-interval'), 10);
      if (!interval || interval < 2000) interval = 5000;
      set.style.setProperty('--acg-zoom-dur', interval + 'ms');
      var i = 0, t = null;
      var advance = function () {
        slides[i].classList.remove('is-active');
        i = (i + 1) % slides.length;
        slides[i].classList.add('is-active');
      };
      var start = function () { t = setInterval(advance, interval); };
      var stop = function () { clearInterval(t); };
      var card = set.closest('.ad-card');
      if (card) {
        card.addEventListener('mouseenter', stop);
        card.addEventListener('mouseleave', start);
        card.addEventListener('focusin', stop);
        card.addEventListener('focusout', start);
      }
      start();
    });
  }
})();
