$(document).ready(function() {

  $('.navbar-header').click(function() {
    $( "#sidebar").hide();
   $('.navbar-header2').removeClass('d-none');
  });
  
  $('.navbar-header2').click(function(){
    $( "#sidebar").show();
    $('.navbar-header2').addClass('d-none');
  });


  $('.dropdown').click(function(){
    $('#manage').toggle();
  });
  $('.fa-bell').click(function(){
    $('.notification').toggle();
  });
  $('.fa-user').click(function(){
    $('.userinfo').toggle();
  });
});
