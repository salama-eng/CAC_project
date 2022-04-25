$(document).ready(function() {
  window.addEventListener('scroll',()=>{
    
  //   var scroll_postion = window.scrollY;
  
  //   if(scroll_postion >200){
  //     $('nav').addClass('bg-dark-nav');
  //   }
  // else{
  // $('nav').attr('style','background-color:#191919');
  
  // }
  });
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
    $('.img-responsive img').click(function(){
  
      var img= $(this).attr('src');
      $('.main-img').attr('src',img);
      $('.img-responsive img').attr('style','border:none');
      $(this).attr('style','border:1px solid #e3911e');
    });
  });
  