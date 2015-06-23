$(document).ready(function(){
    
    $(".cmn-toggle-switch__htx").click(function(){
        $(".nav").slideToggle();
    });
    
    $(window).resize(function() {
        if($(window).width() > '480') {
            $(".nav").removeAttr('style');
        }
    });
    
    
    (function() {

      "use strict";

      var toggles = document.querySelectorAll(".cmn-toggle-switch");

      for (var i = toggles.length - 1; i >= 0; i--) {
        var toggle = toggles[i];
        toggleHandler(toggle);
      };

      function toggleHandler(toggle) {
        toggle.addEventListener( "click", function(e) {
          e.preventDefault();
          (this.classList.contains("active") === true) ? this.classList.remove("active") : this.classList.add("active");
        });
      }

    })();
});