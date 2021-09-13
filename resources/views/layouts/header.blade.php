<header id="header" class="header">
    <div class="container container-custom">
        <div class="header-content">
            <nav class="navbar navbar-expand-sm navbar-light navbar-style menu-navbar">
                <button class="navbar-toggler button-navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon" id="showheader"></span>
                    <span class="my-1 mx-1 close fa fa-times"  id="hideheader"></span>
                </button>
                <a class="navbar-brand align-items-end navbar-brand-img logo" href="/">
                    <img src="{{ asset('image/hapo_learn_logo.png') }}" alt="hapolearn">
                </a>
                <div class="collapse navbar-collapse justify-content-end header-navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav main-menu">
                        <li class="nav-item menu-item {{Request::is('/') ? 'active': ''}}">
                            <a class="nav-link" href="/">HOME</a>
                        </li>
                            <li class="nav-item menu-item {{Request::is('allcourses') ? 'active': ''}}">
                                <a class="nav-link" href="/allcourses">ALL/COURSES</a>
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
                        @if (Auth::check())
                            <li class="nav-item menu-item">
                                <form class="d-inline" method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="nav-link">LOG OUT</button>
                                </form>
                            </li>
                            <li class="nav-item menu-item">
                                <a class="nav-link" href="/profile">PROFILE</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>

@include('layouts.modal')
