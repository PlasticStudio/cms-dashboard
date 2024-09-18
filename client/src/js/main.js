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
      data() {
        return {
          expandedPanel: '',
        };
      },
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
        toggleExpandablePanel(panel) {
          if (this.expandedPanel === panel) {
            this.expandedPanel = '';
          } else {
            this.expandedPanel = panel;
          }
        },
        expandablePanelIsOpen(panelName) {
          return this.expandedPanel === panelName;
        }
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
  