import "core-js/stable";
import Vue from "vue";
import { mapGetters } from "vuex";
import { mapFields } from "vuex-map-fields";
import store from "./store/index";


/**
 * TODO:
 * Add vuex to package.json
 */

/**
 * Set up config
 * **/
function init() {
    // hydrateApp();
    new Vue({
      el: "#dashboard-app",
      store,
      components: {},
      computed: {
        // ...mapFields([]),
        // ...mapGetters([]),
      },
    //   data() {
    //     return {
    //       tabMenuWidth:  0
    //     };
    //   },
      mounted() {
        console.log("Dashboard app mounted...");
        // var totalWidth = 0;
        // $('.c-tab-menu__options').children().each(function() {
        //     var childWidth = this.scrollWidth; // Get the scroll width of each child
        //     totalWidth += childWidth; // Add the width of the child to the total width
        // });
        
        // this.tabMenuWidth = totalWidth;
        // console.log("Total width of children: " + this.tabMenuWidth);
        
        // this.handleResize();
        // window.addEventListener("resize", this.handleResize);
      },
      destroyed() {
        window.removeEventListener("resize", this.handleResize);
      },
      watch: {
        // openTab: {
        //   handler(tab) {
        //     var event = new CustomEvent("tab-change", {
        //       tab: tab,
        //     });
        //     document.dispatchEvent(event);
        //   },
        //   immediate: true,
        // },
      },
      methods: {
    //     changeTab(tabId) {
    //       this.openTab = tabId;
    //       this.openAccordion = 1;
    //       // update the url to include the tab id
    //       const urlParams = new URLSearchParams(window.location.search);
    //       urlParams.set("tab", tabId);
    //       window.history.replaceState(
    //         {},
    //         document.title,
    //         `${window.location.pathname}?${urlParams.toString()}`
    //       );
    //       // call the handleUpdateDropdownLabel method
    //       this.handleUpdateDropdownLabel();
    //     },
    //     changeAccordion(accordionId) {
    //       if (this.openAccordion === accordionId) {
    //         this.openAccordion = 0;
    //       } else {
    //         this.openAccordion = accordionId;
    //       }
    //     },
    //     readUpdate(updateId) {
    //       this.openTab = 4;
    //       this.openUpdate = updateId;
    //       // update the url to include the tab id
    //       const urlParams = new URLSearchParams(window.location.search);
    //       urlParams.set("tab", 4);
    //       urlParams.set("update", updateId);
    //       window.history.replaceState(
    //         {},
    //         document.title,
    //         `${window.location.pathname}?${urlParams.toString()}`
    //       );
    //       // scroll to element who's data-update matches the updateId
    //       const update = document.querySelector(`[data-update="${updateId}"]`);
    //       if (update) {
    //         update.scrollIntoView();
    //       }
    //     },
    //     buildBackLink() {
    //       // if we came from project holder page, use history link so get pagination ref if applicable
    //       if (document.referrer.includes('/projects//?tab=2')) {
    //         window.history.back();
    //       } else {
    //         // else, go to projects page, dashboard tab view
    //         window.location.replace('/projects/?tab=2');
    //       }
    //     },
        
    //   checkIfIsDropdown() {
    //     // check if the dropdown is open
    //     var tabMenu = $(".c-tab-menu__wrapper");
    //     var breakpoint = tabMenu.data("breakpoint");
    //     if (breakpoint === undefined) {
    //       breakpoint = 768;
    //     }
    //     var currentWidth = $(".c-tab-menu__wrapper").width();
    //     // var tabMenuWidth = $(".c-tab-menu__wrapper").width();
    //     if (currentWidth < this.tabMenuWidth) {
    //       return true;
    //     } else {
    //       return false;
    //     }
    //   },
    //   handleResize() {
    //     console.log("Load or resize event detected...");
    //     this.handleUpdateDropdownLabel();
    //     var tabMenu = $(".c-tab-menu__wrapper");
    //     var isDropdown = this.checkIfIsDropdown();
    //     if (isDropdown) {
    //       console.log("Replacing tabs with dropdown...");
    //       tabMenu.removeClass("c-tab-menu__wrapper--tabs");
    //       tabMenu.addClass("c-tab-menu__wrapper--dropdown");
    //       $(".c-tab-menu__options").hide();
    //       $(".c-tab-menu__dropdown-trigger").show();
    //     } else {
    //       console.log("Replacing dropdown with tabs...");
    //       tabMenu.removeClass("c-tab-menu__wrapper--dropdown");
    //       tabMenu.addClass("c-tab-menu__wrapper--tabs");
    //       $(".c-tab-menu__options").show();
    //       $(".c-tab-menu__dropdown-trigger").hide();
    //     }
    //   },
    //   handleDropdownClick() {
    //     $(".c-tab-menu__options").slideToggle();
    //   },
    //   handleUpdateDropdownLabel() {
    //     var openTab = this.openTab;
    //     var tabText = $(`[data-tab="${openTab}"]`).text();
    //     $(".c-tab-menu__dropdown-trigger").html(tabText);
    //     var isDropdown = this.checkIfIsDropdown();
    //     if (isDropdown) {
    //       $(".c-tab-menu__options").hide();
    //     }
    //   },
      },
    });
  }
  
  /**
   * jQuery like $(document).ready() method that you can call from anywhere
   * **/
  function docReady(fn) {
    // see if DOM is already available
    if (
      document.readyState === "complete" ||
      document.readyState === "interactive"
    ) {
      // call on next available tick
      setTimeout(fn, 1);
    } else {
      document.addEventListener("DOMContentLoaded", fn);
    }
  }
  
  /**
   * Document ready let's do our stuff
   * **/
  docReady(function () {
    // DOM is loaded and ready for manipulation here
    init();
  });
  