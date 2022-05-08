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

  $(".navbar-toggle").click(function () {
    $('.navbar-collapse').slideToggle("fast");
  });
  $(document).on("click", function (event) {
    var $trigger = $(".navbar-toggle");
    if ($trigger !== event.target && !$trigger.has(event.target).length) {
      $(".navbar-collapse").slideUp("fast");
    }
  });
  $('.navbar-header2').click(function () {
    $("#sidebar").show();
    $('.navbar-header2').addClass('d-none');
    $('.holder').addClass('aside');

  });


  $('.dropdown').click(function () {
    $('#manage').toggle();
  });


  $("#bell").click(function () {
    $('.notification').slideToggle("fast");
  });
  $(document).on("click", function (event) {
    var $trigger = $("#bell");
    if ($trigger !== event.target && !$trigger.has(event.target).length) {
      $(".notification").slideUp("fast");
    }
  });

  $("#user").click(function () {
    $('.userinfo').slideToggle("fast");
  });
  $(document).on("click", function (event) {
    var $trigger = $("#user");
    if ($trigger !== event.target && !$trigger.has(event.target).length) {
      $(".userinfo").slideUp("fast");
    }
  });


  $('.dropdown2').click(function () {
    $('#manage2').toggle();
  });
  $('.dropdown3').click(function () {
    $('#manage3').toggle();
  });
  $('.dropdown4').click(function () {
    $('#manage4').toggle();
  });
  $('.img-responsive img').click(function () {

    var img = $(this).attr('src');
    $('.main-img').attr('src', img);
    $('.img-responsive img').attr('style', 'border:none');
    $(this).attr('style', 'border:1px solid #e3911e');
  });

  $('.auction-form input').on('click', function (e) {
    event.preventDefault();
    var model = $('#mod').find(":selected").text();
    var cate = $('#cate').find(":selected").text();
    var type = $('#type').find(":selected").text();
    var price = $('#price').find(":selected").text();


    $(".offers-page .card").hide().filter(function () {

      if (price == 'اقل من 2000$' && jQuery(".price", this).text() < 2000 && $(this).text().indexOf(model) > -1 && $(this).text().indexOf(cate) > -1 && $(this).text().indexOf(type) > -1) {
        { $(this).toggle($(this).text().indexOf(model) > -1 && $(this).text().indexOf(cate) > -1 && $(this).text().indexOf(type) > -1 && jQuery(".price", this).text() < 2000) }
      }
      else if (price == '$2000 - $4000' && jQuery(".price", this).text() >= 2000 && jQuery(".price", this).text() < 4000 && $(this).text().indexOf(model) > -1 && $(this).text().indexOf(cate) > -1 && $(this).text().indexOf(type) > -1) {
        { $(this).toggle($(this).text().indexOf(model) > -1 && $(this).text().indexOf(cate) > -1 && $(this).text().indexOf(type) > -1 && jQuery(".price", this).text() >= 2000 && jQuery(".price", this).text() < 4000) }
      }
      else if (price == '$4000 - $7000' && jQuery(".price", this).text() >= 4000 && jQuery(".price", this).text() < 7000 && $(this).text().indexOf(model) > -1 && $(this).text().indexOf(cate) > -1 && $(this).text().indexOf(type) > -1) {
        { $(this).toggle($(this).text().indexOf(model) > -1 && $(this).text().indexOf(cate) > -1 && $(this).text().indexOf(type) > -1 && jQuery(".price", this).text() >= 4000 && jQuery(".price", this).text() < 7000) }
      }
      else if (price == 'اكثر من 7000$' && $(this).text().indexOf(model) > -1 && $(this).text().indexOf(cate) > -1 && $(this).text().indexOf(type) > -1 && jQuery(".price", this).text() >= 7000) {
        { $(this).toggle($(this).text().indexOf(model) > -1 && $(this).text().indexOf(cate) > -1 && $(this).text().indexOf(type) > -1 && jQuery(".price", this).text() >= 7000) }
      }
    });
  });
$('.btn-close').on('click',()=>{
  location.reload();
})
$('.modal-footer button').on('click',()=>{
  location.reload();
})
$('.modal-footer input').on('click',()=>{
  location.reload();
})
});

