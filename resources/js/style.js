$(document).ready(function() {
  $('.feed-slide').slick({
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
    if ($(item).hasClass('active')) {
        $(item).removeClass('active');
    } else {
        var socialLink = $(item).parents('.social-link');
        socialLink.find('li .item').removeClass('active');
        $(item).addClass('active');
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

  $('.navbar-nav>li>a').on('click', function(){
    $('.navbar-collapse').collapse('hide');

    if ($(window).width() < 417) {
      $('#header').removeClass('active');
    }
  });

})

$("#loginBtn").unbind('click').on('click', function(e) {
  e.preventDefault();
  let usernamelogin = $("#inputUserNameLogin").val();
  let passwordlogin = $("#inputPasswordLogin").val();
  $(".validate").html("");
  if (usernamelogin.length === 0){
    $("#usernameloginError").html(`<p>Username in valid</p>`);
  }else if(passwordlogin.length === 0) {
    $("#passwordloginError").html(`<p>Password in valid</p>`);
  } else {
    let data = {
      username: usernamelogin, 
      password: passwordlogin,
      "_token": $("#token").val(),
    };
      $.ajax({
        type: "POST",
        url: "/api/login",
        data: JSON.stringify(data),
        contentType: "application/json",
        success: function (res) {
          window.location.href = '/hapolearn';
          
        },
        error: function(res){
          let message = res.responseJSON.error_message;
          $("#usernameloginError").text(message); 
      }
  });
}
})

function openlogin() {
  $("#login-tab").click();
}

$("#registerBtn").unbind('click').on('click', function(e) {
  e.preventDefault();
  let username = $("#inputUserName").val();
  let email = $("#inputEmail").val();
  let password = $("#inputPassword").val();
  let repeat = $("#inputRepeatPassword").val();
  $(".validate").html("");
  if (username.length === 0){
    $("#usernameError").html(`<p>Username in valid</p>`);
  }else if(email.length === 0) {
    $("#emailError").html(`<p>Email in valid</p>`);
  }else if(password.length === 0) {
    $("#passwordError").html(`<p>Password in valid</p>`);
  }else if(repeat.length === 0) {
    $("#repeatError").html(`<p>RepeatPassword in valid</p>`);
  }else if(password !== repeat){
    $("#repeatError").html(`<p>Password do not match</p>`);
  }else{
    let data = {
      username, 
      password,
      email,
      repeat,
      "_token": $("#token").val(),
    }
    $.ajax({
      type: "POST",
      url: "/api/register",
      data: JSON.stringify(data),
      contentType: "application/json",
      success: function (res) {
        if(res.error) {
          $("#repeatError").text(res.error);
        }
        if(res.success) {
          openlogin();
        }
      },
    });
  } 
})
