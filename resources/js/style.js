$(function () {
  $('.feed-slide').not('.slick-initialized').slick({
    infinite: true,
    slidesToShow: 2,
    slidesToScroll: 2,
    autoplay: true,
    prevArrow:"<div class='arrow-left'><i class='fas fa-angle-left'></i></div>",
    nextArrow:"<div class='arrow-right'><i class='fas fa-angle-right'></i></div>",
    responsive: [
      {
        breakpoint: 769,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          }
      }
    ]
  });

  $('.social-link .icon').click(function() {
    var item = $(this).parent();
    if (item.hasClass('active')) {
        item.removeClass('active');
    } else {
        var socialLink = item.parents('.social-link');
        socialLink.find('li .item').removeClass('active');
        item.addClass('active');
    }
  })

  $('.messenger-icon').click(function() {
    $(this).parents('.messenger-wrapper').find('.messenger-body').toggleClass('active');
  })
  $('.messenger-close').click(function() {
    $(this).parents('.messenger-body').removeClass('active');
  })

  $('.nav-item').click(function() {
    var menu = $(this).parent();
    menu.find("li").removeClass('active');
    $(this).addClass('active');
    $("#hideheader").hide();
    $("#showheader").show();
  })

  $('#hideheader').click(function() {
    $('#showheader').show();
    $(this).hide();

    if ($(window).width() < 417) {
      $('#header').removeClass('active');
    }
  })

  $('#showheader').click(function () {
    $('#hideheader').show();
    $(this).hide();

    if ($(window).width() < 417) {
      $('#header').addClass('active');
    }

  })

  $('.navbar-nav > li > a').on('click', function () {
    $('.navbar-collapse').collapse('hide');

    if ($(window).width() < 417) {
      $('#header').removeClass('active');
    }
  });

  const validation_text = $('.validate').children('p');
  for (const validation of validation_text) {
    if ($(validation).text().length !== 0) {
      $('#loginBtn').click();
      break;
    }
  }

  $("#btn-reset-filter").on('click', function () {
    $("#filter-search").val("");
    $(".inp-filter").val("");
    $(".btn-latest").prop("checked", false);
    $(".btn-oldest").prop("checked", false);
  });

  $('.js-states').select2({
    placeholder: 'Select an option',
    theme: 'bootstrap4',
  });
})
