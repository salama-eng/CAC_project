$(document).ready(function () {
 
  window.addEventListener('scroll', () => {

  
    var scroll_postion = window.scrollY;
    if (scroll_postion > 300) {
      $('.smooth-up').show();

      $(".smooth-up").on("click", function () {
        $(document).scrollTop(0);
      });
    }
    else {
      $('.smooth-up').hide();
    }
  });

  $('.navbar-header').click(function () {
    $("#sidebar").hide();
    $('.navbar-header2').removeClass('d-none');
    $('.holder').removeClass('aside');
  });
  $('.navbar-toggle').click(function () {
    $('.navbar-collapse').toggle();
  });

  $('.navbar-header2').click(function () {
    $("#sidebar").show();
    $('.navbar-header2').addClass('d-none');
    $('.holder').addClass('aside');

  });


  $('.dropdown').click(function () {
    $('#manage').toggle();
  });
  $('.fa-bell').click(function () {
    $('.notification').toggle();
  });
  $('.fa-user').click(function () {
    $('.userinfo').toggle();
  });
  $('.dropdown2').click(function () {
    $('#manage2').toggle();
  });
  $('.img-responsive img').click(function () {

    var img = $(this).attr('src');
    $('.main-img').attr('src', img);
    $('.img-responsive img').attr('style', 'border:none');
    $(this).attr('style', 'border:1px solid #e3911e');
  });
  $('.btn-yellow').click(function () {
    alert('hi');
  });

 



  $('.auction-form input').on('click', function () {
    event.preventDefault();
    var model = $('#mod').find(":selected").text();
    var cate = $('#cate').find(":selected").text();
    var type = $('#type').find(":selected").text();
    var price = $('#price').find(":selected").text();


    function hasStr(main_string, sup_string) {
      if (main_string.includes(sup_string)) {
        return true;
      }
    }

     $('.offers-page .card').hide();
    // if ($('.offers-page .card:contains("'+model+'"):contains("'+cate+'"):contains("'+type+'")')) {
    //   $('.offers-page .card:contains("'+model+'"):contains("'+cate+'"):contains("'+type+'")').show();

    // }
   
    $(".offers-page .card").filter(function () {
      if(price == 'اقل من 2000$'){
        $('.offers-page .card:contains("'+model+'")');
      }
        $(this).toggle($(this).text().indexOf(model) > -1 && $(this).text().indexOf(cate) > -1 && $(this).text().indexOf(type) > -1 );
    });
  });
});
