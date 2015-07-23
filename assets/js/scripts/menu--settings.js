//Menu
var nav = responsiveNav(".menu ul", {
  animate: true, // Boolean: Use CSS3 transitions, true or false
  transition: 300, // Integer: Speed of the transition, in milliseconds
  label: "&#xe609", // String: Label for the navigation toggle
  insert: "before", // String: Insert the toggle before or after the navigation
  closeOnNavClick: false, // Boolean: Close the navigation when one of the links are clicked
  openPos: "relative", // String: Position of the opened nav, relative or static
  navClass: "nav-collapse", // String: Default CSS class. If changed, you need to edit the CSS too!
  navActiveClass: "js-nav-active", // String: Class that is added to  element when nav is active
  jsClass: "js", // String: 'JS enabled' class which is added to  element
});

//Headroom settings
var myElement = document.querySelector("header");
var headroom  = new Headroom(myElement, {
  offset : 40,
  tolerance : 3,
});
headroom.init();
