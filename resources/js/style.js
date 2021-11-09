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

  $('#btn-login-join-course').click(function () {
    $('#loginModal').modal('show');
  })

  // $('#datepicker').datepicker({
  //   dateFormat: 'dd-mm-yy',
  //   showButtonPanel: true,
  //   changeMonth: true,
  //   changeYear: true,
  //   showOtherMonths: true,
  //   selectOtherMonths: true
  // });

  $("#icon-upload-ava").click(function () {
    $("#input-upload-ava").trigger('click');
  });

  $("#reviewForm").on('submit', function(e) {
    e.preventDefault();
    const formData = $("#reviewForm").serializeArray();
    const endpoint = $("#reviewForm").attr('action');
    const dataObj = {};
    formData.forEach(data => {
      dataObj[data['name']] = data['value'];
    });
    dataObj['rate'] = $('input[name="rate"]:checked').val();

    console.log(dataObj);
    $.ajax({
      type: "POST",
      url: endpoint,
      data: dataObj,
      success: function(res) {
        let html = `<li>
              <p>`+userName+` <span>`+getRate(dataObj['rate'])+`</span></p>
              
              <p>`+dataObj['content']+`</p>
            </li>`;

        $('#commentArea').append(html);

        $('#content').val('');
        $('input[name="rate"]:checked').prop('checked', false);
      }
    })
  });


})

function getRate(number) {
  let html = '';
  if (number < 5) {
    for (let i = 0; i < number; i++) {
      html += '<i class="fa fa-star"></i>';
    }
    for (let i = 0; i < 5 - number; i++) {
      html += '<i class="fa fa-star-o"></i>';
    }
  } else if (number == "") {
    for (let i = 0; i < 5; i++) {
      html += '<i class="fa fa-star-o"></i>';
    }
  }else {
    for (let i = 0; i < 5; i++) {
      html += '<i class="fa fa-star"></i>';
    }
  }


  return html;
}

const { countBy } = require("lodash");

$(function () {
  var $i = 0;
  $(".btn-preview").each(function (index) {
    $tag = $($(".btn-preview")[index])
        .text()
        .trim().length;
    if ($tag == 0) {
      $(this).text("Preview");
    }
  });

  $(".btn-preview").on("click", function () {
    $.ajaxSetup({
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
      }
    });

    var documentID = $(this).data("id");
    $.ajax({
      url: "/learning",
      method: "POST",
      data: {
        documentID: documentID
      },
      dataType: "json",
      success: function (result) {
        result.number.forEach(number => {
          $(".btn-preview").each(function (index) {
            var data_id = $(this).attr("data-id");
            if (number.document_id == data_id) {
              $(this).text("Learned");
            }
          });
        });
        console.log(result.number);
        var width = result.percentage;
        $("#progress").css({ "width": width + "%" });
        $('#show-percentage').text(width + "%")
      }
    });
  });
});




