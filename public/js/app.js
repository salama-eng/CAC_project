$(document).ready(function() {
    $("#sidebarCollapse").on("click", function() {
      $("#sidebar").toggleClass("active");
      $(this).toggleClass("active");
    });
    $('.bttn').click(function() {
      $( ".navbar-collapse" ).toggle();
     
    });
    $('.dropdown').click(function(){
      $('#manage').toggle();
    });
    
  });
