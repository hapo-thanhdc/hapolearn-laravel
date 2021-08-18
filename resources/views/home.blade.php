@extends('layouts.app')

@section('content')

    <body>
    <header id="header" class="header">
        <div class="container container-custom">
            <div class="header-content">
                <nav class="navbar navbar-expand-sm navbar-light navbar-style menu-navbar">
                    <button class="navbar-toggler button-navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon" id="showheader"></span>
                        <span class="my-1 mx-1 close fa fa-times"  id="hideheader"></span>
                    </button>
                    <a class="navbar-brand align-items-end navbar-brand-img logo" href="#">
                        <img src="{{ asset('image/hapo_learn_logo.png') }}" alt="hapolearn">
                    </a>
                    <div class="collapse navbar-collapse justify-content-end header-navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav main-menu">
                            <li class="nav-item menu-item active">
                                <a class="nav-link" href="#">HOME</a>
                            </li>
                            <li class="nav-item menu-item ">
                                <a class="nav-link" href="#">ALL/COURSES</a>
                            </li>
                            <li class="nav-item menu-item-mobile ">
                                <a class="nav-link" href="#">LIST LESSON</a>
                            </li>
                            <li class="nav-item menu-item-mobile ">
                                <a class="nav-link" href="#">LESSONDETAIL</a>
                            </li>
                            @if (!Auth::check())
                                <li class="nav-item menu-item">
                                    <a class="nav-link" id="loginBtn" href="#" data-toggle="modal" data-target="#loginModal">LOGIN/REGISTER</a>
                                </li>
                            @endif
                            <li class="nav-item menu-item">
                                <a class="nav-link" href="#">PROFILE</a>
                            </li>
                            @if (Auth::check())
                                <li class="nav-item menu-item">
                                    <form class="d-inline" method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="nav-link">LOG OUT</button>
                                    </form>
                                </li>
                            @endif
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>

    <section class="section-banner">
        <div class="banner-wrapper">
            <img src="{{ asset('image/hapo_learn_banner_logo.png') }}" alt="banner_logo">
            <div class="banner-content">
                <div class ="container container-custom mobile-container">
                    <div class="banner-heading">
                        <p class= heading>Learn Anytime, Anywhere</p>
                        <p class="fw-bold content">at HapoLearn <img src="{{ asset('image/owl_logo.png') }}" alt="banner" >!</p>
                    </div>
                    <div class="banner-description">
                        <p>
                            Interactive lessons, "on-the-go"
                            <br>
                            "practice, peer support."
                        </p>
                    </div>
                    <div class="banner-button">
                        <button class="btn btn-default fw-bold">Start Learning Now!</button>
                    </div>
                </div>
            </div>
            <div class="background"></div>
        </div>
    </section>

    <section>
        <div class="list-course feature-course ">
            <div class="container container-custom">
                <div class="row course">
                    <div class="col-xl-4 col-lg-4 col-md-4">
                        <div class="item">
                            <div class="image-wrapper bg-html">
                                <div class="image">
                                    <img src="{{ asset('image/html_img.png') }}" alt="html-image">
                                </div>
                            </div>
                            <div class="content">
                                <div class="content-text">
                                    <p class="heading">HTML/CSS/js Tutorial</p>
                                    <p class="description">I knew hardly anything about HTML, JS, and CSS before entering New Media. I had coded quite a bit, but never touched anything in regards to web development.</p>
                                </div>
                                <a href="#" class="btn btn-default">Take This Course</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4">
                        <div class="item">
                            <div class="image-wrapper bg-laravel">
                                <div class="image">
                                    <img src="{{ asset('image/laravel_img.png') }}" alt="laravel-image">
                                </div>
                            </div>
                            <div class="content">
                                <div class="content-text">
                                    <p class="heading">LARAVEL Tutorial</p>
                                    <p class="description">I knew hardly anything about HTML, JS, and CSS before entering New Media. I had coded quite a bit, but never touched anything in regards to web development.</p>
                                </div>
                                <a href="#" class="btn btn-default">Take This Course</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4">
                        <div class="item">
                            <div class="image-wrapper bg-php">
                                <div class="image">
                                    <img src="{{ asset('image/php_img.png') }}" alt="php-image">
                                </div>
                            </div>
                            <div class="content">
                                <div class="content-text">
                                    <p class="heading">PHP Tutorial</p>
                                    <p class="description">I knew hardly anything about HTML, JS, and CSS before entering New Media. I had coded quite a bit, but never touched anything in regards to web development.</p>
                                </div>
                                <a href="#" class="btn btn-default">Take This Course</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="section-heading">
            <p class="fw-bold heading">Other Course</p>
        </div>
        <div class="list-course">
            <div class="container container-custom">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-4">
                        <div class="item">
                            <div class="image-wrapper bg-css">
                                <div class="image">
                                    <img src="{{ asset('image/css_img.png') }}" alt="css-image">
                                </div>
                            </div>
                            <div class="content">
                                <div class="content-text">
                                    <p class="heading">CSS Tutorial</p>
                                    <p class="description">I knew hardly anything about HTML, JS, and CSS before entering New Media,...</p>
                                </div>
                                <a href="#" class="btn btn-default">Take This Course</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4">
                        <div class="item">
                            <div class="image-wrapper bg-ruby">
                                <div class="image">
                                    <img src="{{asset('image/ruby_img.png') }}" alt="ruby-image">
                                </div>
                            </div>
                            <div class="content">
                                <div class="content-text">
                                    <p class="heading">Ruby on rails Tutorial</p>
                                    <p class="description">I knew hardly anything about HTML, JS, and CSS before entering New Media,...</p>
                                </div>
                                <a href="#" class="btn btn-default">Take This Course</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4">
                        <div class="item">
                            <div class="image-wrapper bg-java">
                                <div class="image">
                                    <img src="{{ asset('image/java_img.png') }}" alt="java-image">
                                </div>
                            </div>
                            <div class="content">
                                <div class="content-text">
                                    <p class="heading">Java Tutorial Tutorial</p>
                                    <p class="description">I knew hardly anything about HTML, JS, and CSS before entering New Media,...</p>
                                </div>
                                <a href="#" class="btn btn-default">Take This Course</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="view-all-courses">
                    <a class="all-course" href="#">View All Our Courses <img src="{{ asset('image/view_all_courses.png') }}" alt="view-courses-image"></a>
                </div>
            </div>
        </div>
    </section>

    <section class="why-hapolearn">
        <div class="image-laptop">
            <img src="{{ asset('image/laptop.png') }}" alt="laptop-background">
        </div>
        <div class="container container-custom">
            <div class="why-hapolearn-wrapper">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-5 col-md-6 col-mobile">
                        <div class="reason-content">
                            <p class="heading">Why HapoLearn?</p>
                            <ul class="reason-list">
                                <li>
                                    <a><i class="fas fa-check-circle"></i> Interactive lessons, "on-the-go" practice, peer support.</a>
                                </li>
                                <li>
                                    <a><i class="fas fa-check-circle"></i> Interactive lessons, "on-the-go" practice, peer support.</a>
                                </li>
                                <li>
                                    <a><i class="fas fa-check-circle"></i> Interactive lessons, "on-the-go" practice, peer support.</a>
                                </li>
                                <li>
                                    <a><i class="fas fa-check-circle"></i> Interactive lessons, "on-the-go" practice, peer support.</a>
                                </li>
                                <li>
                                    <a><i class="fas fa-check-circle"></i> Interactive lessons, "on-the-go" practice, peer support.</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-7 col-md-6 un-position">
                        <div class="image-laptop-tabet">
                            <img src="{{ asset('image/laptop_tabet.png') }}" alt="laptop-tablent">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="feedback">
        <div class="container container-custom">
            <div class="section-heading">
                <p class="fw-bold heading">Feedback</p>
                <p class="description">What other students turned professionals have to say about us after learning with us and reaching their goals</p>
            </div>
            <div class="section-content">
                <div class="feed-slide">
                    <div>
                        <div class="comment-wrapper">
                            <div class="comment-content">
                                <div class="line"></div>
                                <div class="text">
                                    <p>“A wonderful course on how to start. Eddie beautifully conveys all essentials of a becoming a good Angular developer. Very glad to have taken this course. Thank you Eddie Bryan.”</p>
                                </div>
                            </div>
                            <div class="triangle"></div>
                        </div>
                        <div class="customer-wrapper">
                            <div class="image">
                                <img src="{{ asset('image/avatar_user.png') }}" alt="user">
                            </div>
                            <div class="detail">
                                <p class="name fw-bold">Hoang Anh Nguyen</p>
                                <p class="position">PHP</p>
                                <div class="rate">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="comment-wrapper">
                            <div class="comment-content">
                                <div class="line"></div>
                                <div class="text">
                                    <p>“A wonderful course on how to start. Eddie beautifully conveys all essentials of a becoming a good Angular developer. Very glad to have taken this course. Thank you Eddie Bryan.”</p>
                                </div>
                            </div>
                            <div class="triangle"></div>
                        </div>
                        <div class="customer-wrapper">
                            <div class="image">
                                <img src="{{ asset('image/avatar_user.png') }}" alt="user">
                            </div>
                            <div class="detail">
                                <p class="name fw-bold">Tuan Tran Hoang</p>
                                <p class="position">Python</p>
                                <div class="rate">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="comment-wrapper">
                            <div class="comment-content">
                                <div class="line"></div>
                                <div class="text">
                                    <p>“A wonderful course on how to start. Eddie beautifully conveys all essentials of a becoming a good Angular developer. Very glad to have taken this course. Thank you Eddie Bryan.”</p>
                                </div>
                            </div>
                            <div class="triangle"></div>
                        </div>
                        <div class="customer-wrapper">
                            <div class="image">
                                <img src="{{ asset('image/avatar_user.png') }}" alt="user-avtar">
                            </div>
                            <div class="detail">
                                <p class="name fw-bold">Hoang Anh Nguyen</p>
                                <p class="position">PHP</p>
                                <div class="rate">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="community">
        <div class="container container-custom">
            <div class="content-community">
                <p>Become a member of our growing community!</p>
            </div>
            <div class="banner-button">
                <button class="btn btn-default fw-blod">Star Learning Now!</button>
            </div>
        </div>
    </section>

    <section class="statistic">
        <div class="container container-custom">
            <div class="statistic-heading">
                <p class="fw-bold heading">Statistic</p>
            </div>
            <div class="row content">
                <div class="col-xl-4 col-md-4 ">
                    <p>Courses</p>
                    <span class="counter">1,568</span>
                </div>
                <div class="col-xl-4 col-md-4">
                    <p>Lessons</p>
                    <span class="counter">2,689</span>
                </div>
                <div class="col-xl-4 col-md-4">
                    <p>Learners</p>
                    <span class="counter">16,882</span>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="footer-content">
            <div class="container container-custom">
                <div class="row row-footer">
                    <div class="col-lg-2 col-md-2 contact-home-mobile">
                        <div class="contact">
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Features</a></li>
                                <li><a href="#">Courses</a></li>
                                <li><a href="#">Blog</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 faq-mobile">
                        <div class="contact">
                            <ul>
                                <li><a href="#">Contact</a></li>
                                <li><a href="#">Terms of Use</a></li>
                                <li><a href="#">FAQ</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 text-footer">
                        <img class="logo-footer" src="{{ asset('image/hapo_learn_white1.png') }}" alt="logo_hapolearn">
                        <p class="logo-text">Interactive lessons, "on-the-go" <br/> practice, peer support.</p>
                    </div>
                    <div class="col-lg-2 col-md-2 contact-home">
                        <div class="contact">
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Features</a></li>
                                <li><a href="#">Courses</a></li>
                                <li><a href="#">Blog</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 faq">
                        <div class="contact">
                            <ul>
                                <li><a href="#">Contact</a></li>
                                <li><a href="#">Terms of Use</a></li>
                                <li><a href="#">FAQ</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 social">
                        <div class="section">
                            <ul class="social-link">
                                <li>
                                    <div class="item">
                                        <div class="icon">
                                            <img class="facebook" src="{{ asset('image/facebook.png') }}" alt="facebook">
                                        </div>
                                        <div class="link">
                                            <a href="https://www.facebook.com/">https://www.facebook.com/</a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="item">
                                        <div class="icon">
                                            <img class="contact-icon" src="{{asset('image/contact.png') }}" alt="contact">
                                        </div>
                                        <div class="link">
                                            <a href="tel:+84-85-645-9898">+84-85-645-9898</a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="item">
                                        <div class="icon">
                                            <img class="email" src="{{ asset('image/email.png') }}" alt="email">
                                        </div>
                                        <div class="link">
                                            <a href="mailto:info@haposoft.com">info@haposoft.com</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-end">
            <p>© 2020 HapoLearn, Inc. All rights reserved.</p>
        </div>
    </footer>

    <div class="messenger-wrapper">
        <div class="messenger-body">
            <div class="messenger-close">
                <a href="javascript:void(0)">
                    <i class="fas fa-times"></i>
                </a>
            </div>
            <div class="messenger-content">
                <div class="messenger-detail">
                    <div class="avatar">
                        <img src="{{ asset('image/icon_mess.png') }}" alt="mess_icon">
                    </div>
                    <div class="message-wrapper">
                        <p class="name">HapoLearn</p>
                        <div class="message">
                            <p>HapoLearn xin chào bạn.
                                Bạn có cần chúng tôi hỗ trợ gì không? </p>
                        </div>
                    </div>
                </div>
                <div class="messenger-login">
                    <button class="btn btn-default"><img src="{{ asset('image/mess_icon_white.png') }}" alt="icon_mess"> Đăng nhập vào Messenger</button>
                    <p>Chat với HapoLearn trong Messenger</p>
                </div>
            </div>
        </div>
        <div class="messenger-icon">
            <img src="{{ asset('image/messenger.png') }}" alt="icon">
        </div>
    </div>

    <div class="modal fade" id="loginModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal-button"  data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times"></i>
                </div>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="login-tab" data-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="true">LOGIN</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false">REGISTER</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                        <form class="login-form" method="POST" action="{{route('login')}}">
                            @csrf
                            <div class="form-group">
                                <label for="inputUserNameLogin" class="form-group-title">Username:</label>
                                <input type="email" class="form-control" id="inputUserNameLogin" name="username" value="{{ old('username') }}">
                            </div>
                            @error('username')
                            <div class="validate validatelogin">
                                <p class="errorLogin text-danger">{{ $message }}</p>
                            </div>
                            @enderror
                            <div class="form-group">
                                <label for="inputPasswordLoign" class="form-group-title">Password:</label>
                                <input type="password" class="form-control" id="inputPasswordLogin" name="password">
                            </div>
                            @error('password')
                            <div class="validate validatelogin">
                                <p class="errorLogin text-danger">{{ $message }}</p>
                            </div>
                            @enderror
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="check" name="isRemember" >
                                <label class="form-check-label" for="check">Remember me</label>
                                <a href="#" class="forgot-pw-link">Forgot password</a>
                            </div>
                            <div class="button-login">
                                <button type="submit" class="btn btn-primary login-button" id="login-btn">Login</button>
                            </div>
                            <div class="social-title">
                                <div class="line">
                                    <span class="social-network-login-title">Login with</span>
                                </div>
                            </div>
                            <div class="login-google">
                                <a href="#" class="login-with-google"><i class="fab fa-google-plus-g"></i>&nbsp; Google</a>
                            </div>
                            <div class="login-facebook">
                                <a href="#" class="login-with-facebook"><i class="fab fa-facebook-f"></i>&nbsp; Facebook</a>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                        <form class="register-form" method="POST" action="{{route('register')}}">
                            @csrf
                            <div class="form-group">
                                <label for="inputUserName" class="form-group-title">Username:</label>
                                <input type="text" class="form-control" id="inputUserName" name="name">
                            </div>
                            @error('name')
                            <div class="validate validateregister">
                                <p class="errorLogin text-danger">{{ $message }}</p>
                            </div>
                            @enderror
                            <div class="form-group">
                                <label for="inputEmail" class="form-group-title">Email:</label>
                                <input type="email" class="form-control" id="inputEmail" name='email'>
                            </div>
                            @error('email')
                            <div class="validate validateregister">
                                <p class="errorLogin text-danger">{{ $message }}</p>
                            </div>
                            @enderror
                            <div class="form-group">
                                <label for="inputPassword" class="form-group-title">Password:</label>
                                <input type="password" class="form-control" id="inputPassword" name="password_register">
                            </div>
                            @error('password_register')
                            <div class="validate validateregister">
                                <p class="errorLogin text-danger">{{ $message }}</p>
                            </div>
                            @enderror
                            <div class="form-group">
                                <label for="inputRepeatPassword" class="form-group-title">Repeat Password:</label>
                                <input type="password" class="form-control" id="inputRepeatPassword" name="password_confirmation">
                            </div>
                            @error('password_confirmation')
                            <div class="validate validateregister">
                                <p class="errorLogin text-danger">{{ $message }}</p>
                            </div>
                            @enderror
                            <div class="button-register">
                                <button type="submit" class="btn btn-primary register-button" id="register-btn">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </body>
