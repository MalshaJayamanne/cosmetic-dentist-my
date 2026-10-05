const IS_MOBILE_DEVICE = window.matchMedia(
  "only screen and (max-width: 767px)",
).matches;

const IS_TAB_DEVICE = window.matchMedia(
  "only screen and (min-width: 768px) and (max-width: 1024px)",
).matches;

const IS_DESKTOP_DEVICE = !IS_MOBILE_DEVICE && !IS_TAB_DEVICE;

const IS_HANDHELD_DEVICE = IS_MOBILE_DEVICE || IS_TAB_DEVICE;


document.addEventListener("DOMContentLoaded", function () {

  /*
   * =========================================================
   * MOBILE MENU
   * =========================================================
   */

  if (IS_HANDHELD_DEVICE) {

    new Mmenu(
      "#navbarCollapse",
      {
        offCanvas: {
          position: "right-front",
        },

        navbars: [
          {
            position: "top",
            content: ["<img src='" + SITE_LOGO + "' />"],
          },

          {
            position: "bottom",
            content: THEME_PARAMS.SOCIAL_MEDIA,
          },
        ],
      },

      {
        offCanvas: {
          page: {
            selector: "#page",
          },
        },
      },
    );

  }


  /*
   * =========================================================
   * STICKY MENU
   * =========================================================
   */

  if (
    IS_DESKTOP_DEVICE &&
    THEME_PARAMS.STICKY_HEADER
  ) {

    window.addEventListener("scroll", function () {
      stickyMenu();
    });

    stickyMenu();
  }


  function stickyMenu() {

    let scroll = window.scrollY;

    const header = document.querySelector(
      "header.main-header"
    );

    if (!header) {
      return;
    }

    if (scroll > 0) {

      if (!header.classList.contains("sticky")) {
        header.classList.add("sticky");
      }

    } else {

      header.classList.remove("sticky");

    }

  }


  /*
   * =========================================================
   * FANCYBOX
   * =========================================================
   */

  if (
    typeof Fancybox !== "undefined" &&
    document.querySelector("[data-fancybox]")
  ) {

    Fancybox.bind("[data-fancybox]");

  }


  /*
   * =========================================================
   * HOME SERVICES
   * =========================================================
   */

  if (document.getElementById("homeServices")) {

    const homeServicesSwiper = new ThemeSwiper(
      "#homeServices",
      {
        loop: true,

        autoplay: {
          delay: 5000,
          disableOnInteraction: true,
          pauseOnMouseEnter: true,
        },

        slidesPerView: {
          0: {
            slidesPerView: 1,
          },

          768: {
            slidesPerView: 1,
          },

          1025: {
            slidesPerView: 1,
          },
        },

        pagination: {
          el: "#homeServicesPagination",
          clickable: true,
        },

        spaceBetween: 25,
        speed: 400,
      }
    );


    const homeServicesImageSwiper = new ThemeSwiper(
      "#homeServicesImageSwiper",
      {
        loop: true,

        autoplay: false,

        slidesPerView: {
          0: {
            slidesPerView: 1,
          },

          768: {
            slidesPerView: 1,
          },

          1025: {
            slidesPerView: 1,
          },
        },

        allowTouchMove: false,

        speed: 400,
      }
    );


    homeServicesSwiper.controller.control =
      homeServicesImageSwiper;

    homeServicesImageSwiper.controller.control =
      homeServicesSwiper;

  }


  /*
   * =========================================================
   * HOME INSURANCES
   * =========================================================
   */

  if (document.getElementById("homeInsurances")) {

    new ThemeSwiper(
      "#homeInsurances",
      {
        loop: true,

        autoplay: {
          delay: 5000,
          disableOnInteraction: true,
        },

        slidesPerView: {
          0: {
            slidesPerView: 1,
          },

          768: {
            slidesPerView: 3,
          },

          1025: {
            slidesPerView: 5,
          },
        },

        spaceBetween: 50,
        speed: 400,
      }
    );

  }


  /*
   * =========================================================
   * HOME REVIEWS
   * =========================================================
   */

  if (document.getElementById("homeReviews")) {

    new ThemeSwiper(
      "#homeReviews",
      {
        loop: true,

        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },

        slidesPerView: {
          0: {
            slidesPerView: 1,
          },

          768: {
            slidesPerView: 1,
          },

          1025: {
            slidesPerView: 1,
          },
        },

        pagination: {
          el: "#homeReviews + .swiper-pagination",
          clickable: true,
        },

        spaceBetween: 25,
        speed: 400,
      }
    );

  }

/*
 * =========================================================
 * HOME SERVICES CARDS SWIPER
 * =========================================================
 */

if (document.querySelector(".services-swiper")) {

    new Swiper(".services-swiper", {

        slidesPerView: 1,

        spaceBetween: 16,

        speed: 500,

        loop: true,

        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
            pauseOnMouseEnter: true,
        },

        allowTouchMove: true,

        watchOverflow: false,

        navigation: {
            nextEl: ".services-next",
            prevEl: ".services-prev",
        },

        breakpoints: {

            768: {
                slidesPerView: 2,
            },

            1025: {
                slidesPerView: 3,
            },

        },

    });

}


  /*
   * =========================================================
   * EXPERTS / DOCTORS SWIPER
   * =========================================================
   */

  const doctorsSwiperElement =
    document.getElementById("doctors-main-swiper");

  const expertTabs =
    document.querySelectorAll(".expert-tab");


  if (
    doctorsSwiperElement &&
    expertTabs.length > 0 &&
    typeof Swiper !== "undefined"
  ) {

    /*
     * ---------------------------------------------------------
     * Initialize doctor card swiper
     * ---------------------------------------------------------
     */

    const doctorsMain = new Swiper(
      "#doctors-main-swiper",
      {
        slidesPerView: 1,

        spaceBetween: 0,

        speed: 600,

        autoHeight: true,

        allowTouchMove: true,

        watchOverflow: true,
      }
    );


    /*
     * ---------------------------------------------------------
     * Update active doctor tab
     * ---------------------------------------------------------
     */

    function updateExpertTab(activeIndex) {

      expertTabs.forEach(function (tab, index) {

        const isActive =
          index === activeIndex;

        tab.classList.toggle(
          "active",
          isActive
        );

        tab.setAttribute(
          "aria-selected",
          isActive ? "true" : "false"
        );

      });

    }


    /*
     * ---------------------------------------------------------
     * Set first doctor active
     * ---------------------------------------------------------
     */

    updateExpertTab(0);


    /*
     * ---------------------------------------------------------
     * Click doctor tab
     * ---------------------------------------------------------
     */

    expertTabs.forEach(function (tab, index) {

      tab.addEventListener(
        "click",
        function () {

          if (
            doctorsMain.activeIndex !== index
          ) {

            doctorsMain.slideTo(index);

          }

        }
      );

    });


    /*
     * ---------------------------------------------------------
     * Update tab when doctor card is swiped
     * ---------------------------------------------------------
     */

    doctorsMain.on(
      "slideChange",
      function () {

        updateExpertTab(
          doctorsMain.activeIndex
        );

      }
    );

  }


  /*
   * =========================================================
   * APPOINTMENT BUTTON
   * =========================================================
   */

  if (
    document.querySelectorAll(
      ".appointment-btn"
    ).length > 0
  ) {

    document
      .querySelectorAll(".appointment-btn")
      .forEach((btn) => {

        btn.addEventListener(
          "click",
          function (e) {

            if (
              document.getElementById(
                "appointmentModal"
              )
            ) {

              const modal =
                new bootstrap.Modal(
                  document.getElementById(
                    "appointmentModal"
                  )
                );

              modal.show();

            }

          }
        );

      });

  }

});


/*
 * =========================================================
 * GRAVITY FORMS
 * =========================================================
 */

document.addEventListener(
  "gform/post_init",
  (event) => {

    const gForms =
      document.querySelectorAll(
        ".gform_wrapper"
      );

    gForms.forEach((form) => {

      form.style.transition =
        "opacity 0.5s, transform 0.5s";

      form.style.opacity = "1";

    });

  }
);


/*
 * =========================================================
 * THEME SWIPER CLASS
 * =========================================================
 */

class ThemeSwiper {

  constructor(
    selector,
    options = {},
    navigationSelector
  ) {

    this.selector = selector;

    this.options = options;

    this.navigationSelector =
      navigationSelector ||
      `${this.selector} + .swiper-nav`;

    this.swiper = null;

    return this.init();

  }


  init() {

    const slideCount =
      document.querySelectorAll(
        `${this.selector} .swiper-slide`
      ).length;


    const enableSwiper =
      this.shouldEnableSwiper(
        slideCount
      );


    if (!enableSwiper) {

      this.hideNavigation();

    }


    const { slidesPerView } =
      this.options;


    /*
     * ---------------------------------------------------------
     * Default options
     * ---------------------------------------------------------
     */

    const defaultOptions = {

      loop: enableSwiper,

      allowTouchMove: enableSwiper,

      autoplay: enableSwiper
        ? {
            delay: 5000,
            disableOnInteraction: false,
          }
        : false,

      speed: 500,

      preventClicksPropagation: false,

      spaceBetween: 30,

      navigation: {

        nextEl:
          `${this.selector}Next`,

        prevEl:
          `${this.selector}Prev`,

      },

      breakpoints:
        Object.keys(
          slidesPerView
        ).reduce(
          (acc, breakpoint) => {

            acc[breakpoint] =
              slidesPerView[
                breakpoint
              ];

            return acc;

          },
          {}
        ),

    };


    /*
     * ---------------------------------------------------------
     * Merge options
     * ---------------------------------------------------------
     */

    const swiperOptions = {
      ...defaultOptions,
      ...this.options,
    };


    /*
     * ---------------------------------------------------------
     * Initialize Swiper
     * ---------------------------------------------------------
     */

    this.swiper =
      new Swiper(
        this.selector,
        swiperOptions
      );


    return this.swiper;

  }


  shouldEnableSwiper(slideCount) {

    const { slidesPerView } =
      this.options;


    if (
      IS_MOBILE_DEVICE &&
      slideCount >
        (
          slidesPerView[0]
            ?.slidesPerView || 1
        )
    ) {

      return true;

    }


    if (
      IS_TAB_DEVICE &&
      slideCount >
        (
          slidesPerView[768]
            ?.slidesPerView || 2
        )
    ) {

      return true;

    }


    if (
      IS_DESKTOP_DEVICE &&
      slideCount >
        (
          slidesPerView[1025]
            ?.slidesPerView || 3
        )
    ) {

      return true;

    }


    return false;

  }


  hideNavigation() {

    const navElement =
      document.querySelector(
        this.navigationSelector
      );


    if (navElement) {

      navElement.style.display =
        "none";


      const parent =
        document.querySelector(
          this.selector
        ).parentNode;


      if (
        parent.classList.contains(
          "swiper-with-nav"
        )
      ) {

        parent.style.paddingLeft =
          "0px";

        parent.style.paddingRight =
          "0px";

      }

    }

  }

}