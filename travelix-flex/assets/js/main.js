(function () {
  "use strict";

  var body = document.body;
  var nav = document.getElementById("primaryNav");
  var menuToggle = document.querySelector("[data-menu-toggle]");

  function closeMenu() {
    if (!nav || !menuToggle) return;
    nav.classList.remove("is-open");
    menuToggle.setAttribute("aria-expanded", "false");
    body.classList.remove("menu-is-open");
  }

  if (nav && menuToggle) {
    menuToggle.addEventListener("click", function () {
      var willOpen = !nav.classList.contains("is-open");
      nav.classList.toggle("is-open", willOpen);
      menuToggle.setAttribute("aria-expanded", String(willOpen));
      body.classList.toggle("menu-is-open", willOpen);
    });
    nav.addEventListener("click", function (event) {
      if (event.target.closest("a") && window.innerWidth <= 960) closeMenu();
    });
  }

  var searchOverlay = document.querySelector("[data-search-overlay]");
  var searchOpen = document.querySelector("[data-search-open]");
  var searchClose = document.querySelector("[data-search-close]");
  var lastFocused = null;

  function openSearch() {
    if (!searchOverlay) return;
    lastFocused = document.activeElement;
    searchOverlay.hidden = false;
    body.classList.add("search-is-open");
    var field = searchOverlay.querySelector("input[type='search']");
    if (field) window.setTimeout(function () { field.focus(); }, 30);
  }

  function closeSearch() {
    if (!searchOverlay) return;
    searchOverlay.hidden = true;
    body.classList.remove("search-is-open");
    if (lastFocused && typeof lastFocused.focus === "function") lastFocused.focus();
  }

  if (searchOpen) searchOpen.addEventListener("click", openSearch);
  if (searchClose) searchClose.addEventListener("click", closeSearch);
  if (searchOverlay) searchOverlay.addEventListener("click", function (event) { if (event.target === searchOverlay) closeSearch(); });

  document.addEventListener("keydown", function (event) {
    if (event.key === "Escape") { closeMenu(); closeSearch(); }
  });

  var reducedMotion = window.matchMedia && window.matchMedia("(prefers-reduced-motion: reduce)").matches;
  var revealItems = document.querySelectorAll(".reveal");
  if (!reducedMotion && "IntersectionObserver" in window) {
    var observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add("is-visible");
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.1, rootMargin: "0px 0px -30px" });
    revealItems.forEach(function (item) { observer.observe(item); });
  } else {
    revealItems.forEach(function (item) { item.classList.add("is-visible"); });
  }

  document.querySelectorAll("[data-testimonial-slider]").forEach(function (slider) {
    var slides = Array.prototype.slice.call(slider.querySelectorAll("[data-testimonial]"));
    var dotsWrap = slider.querySelector("[data-testimonial-dots]");
    var previous = slider.querySelector("[data-testimonial-prev]");
    var next = slider.querySelector("[data-testimonial-next]");
    var index = 0;
    if (slides.length < 2) {
      var controls = slider.querySelector(".testimonial-slider__controls");
      if (controls) controls.hidden = true;
      return;
    }

    function show(newIndex) {
      index = (newIndex + slides.length) % slides.length;
      slides.forEach(function (slide, slideIndex) { slide.classList.toggle("is-active", slideIndex === index); });
      if (dotsWrap) Array.prototype.forEach.call(dotsWrap.children, function (dot, dotIndex) { dot.classList.toggle("is-active", dotIndex === index); });
    }

    slides.forEach(function (_, slideIndex) {
      var dot = document.createElement("button");
      dot.type = "button";
      dot.setAttribute("aria-label", "نمایش نظر " + (slideIndex + 1));
      dot.addEventListener("click", function () { show(slideIndex); });
      dotsWrap.appendChild(dot);
    });
    if (previous) previous.addEventListener("click", function () { show(index - 1); });
    if (next) next.addEventListener("click", function () { show(index + 1); });
    show(0);
  });
})();
