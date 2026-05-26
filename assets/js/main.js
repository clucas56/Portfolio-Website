(function () {
  "use strict";

  const select = (el, all = false) => {
    el = el.trim();
    return all ? [...document.querySelectorAll(el)] : document.querySelector(el);
  };

  const on = (type, el, listener, all = false) => {
    const selectEl = select(el, all);
    if (!selectEl) return;
    if (all) selectEl.forEach(e => e.addEventListener(type, listener));
    else selectEl.addEventListener(type, listener);
  };

  const onscroll = (el, listener) => el.addEventListener('scroll', listener);

  /* Navbar active state on scroll */
  const navbarlinks = select('.scrollto', true);
  const navbarlinksActive = () => {
    const position = window.scrollY + 200;
    navbarlinks.forEach(link => {
      if (!link.hash) return;
      const section = select(link.hash);
      if (!section) return;
      if (position >= section.offsetTop && position <= section.offsetTop + section.offsetHeight) {
        link.classList.add('active');
      } else {
        link.classList.remove('active');
      }
    });
  };
  window.addEventListener('load', navbarlinksActive);
  onscroll(document, navbarlinksActive);

  /* Smooth scroll */
  const scrollto = (el) => {
    const elementPos = select(el).offsetTop;
    window.scrollTo({ top: elementPos, behavior: 'smooth' });
  };

  /* Back to top */
  const backtotop = select('.back-to-top');
  if (backtotop) {
    const toggleBacktotop = () => {
      if (window.scrollY > 100) backtotop.classList.add('active');
      else backtotop.classList.remove('active');
    };
    window.addEventListener('load', toggleBacktotop);
    onscroll(document, toggleBacktotop);
  }

  /* Mobile nav toggle */
  on('click', '.mobile-nav-toggle', function () {
    select('body').classList.toggle('mobile-nav-active');
    this.classList.toggle('bi-list');
    this.classList.toggle('bi-x');
  });

  /* Scroll on .scrollto links */
  on('click', '.scrollto', function (e) {
    if (select(this.hash)) {
      e.preventDefault();
      const body = select('body');
      if (body.classList.contains('mobile-nav-active')) {
        body.classList.remove('mobile-nav-active');
        const toggle = select('.mobile-nav-toggle');
        if (toggle) { toggle.classList.toggle('bi-list'); toggle.classList.toggle('bi-x'); }
      }
      scrollto(this.hash);
    }
  }, true);

  /* Hash scroll on load */
  window.addEventListener('load', () => {
    if (window.location.hash && select(window.location.hash)) {
      scrollto(window.location.hash);
    }
  });

  /* Typed.js */
  const typed = select('.typed');
  if (typed) {
    const strings = typed.getAttribute('data-typed-items').split(',');
    new Typed('.typed', {
      strings,
      loop: true,
      typeSpeed: 80,
      backSpeed: 40,
      backDelay: 2000
    });
  }

  /* AOS */
  window.addEventListener('load', () => {
    AOS.init({ duration: 900, easing: 'ease-in-out', once: true, mirror: false });
  });

})();
