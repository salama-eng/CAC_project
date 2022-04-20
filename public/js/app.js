$(document).ready(function() {

  $('.navbar-header').click(function() {
    $( "#sidebar").hide();
   $('.navbar-header2').removeClass('d-none');
   $('.holder').removeClass('aside');
  });
  $('.navbar-toggle').click(function(){
$('.navbar-collapse').toggle();
  });
  $('.navbar-header2').click(function(){
    $( "#sidebar").show();
    $('.navbar-header2').addClass('d-none');
   $('.holder').addClass('aside');

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
  $('.dropdown2').click(function(){
    $('#manage2').toggle();
  });
});
