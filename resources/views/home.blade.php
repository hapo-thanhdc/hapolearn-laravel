@extends('layouts.app')

@section('content')

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
                @foreach($mainCourses as $maincourse)
                    <div class="col-xl-4 col-lg-4 col-md-4">
                        <div class="item">
                            <div class="image-wrapper bg-html">
                                <div class="image">
                                    <img src="{{ $maincourse->icon }}" alt="html-image">
                                </div>
                            </div>
                            <div class="content">
                                <div class="content-text">
                                    <p class="heading">{{ $maincourse->name }}</p>
                                    <p class="description">{{ $maincourse->description }}</p>
                                </div>
                                <a href="{{ route('courses.detail', $maincourse->id) }}" class="btn btn-default">Take This Course</a>
                            </div>
                        </div>
                    </div>
                @endforeach
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
                @foreach($otherCourses as $otherCourse)
                    <div class="col-xl-4 col-lg-4 col-md-4">
                    <div class="item">
                        <div class="image-wrapper bg-css">
                            <div class="image">
                                <img src="{{ $otherCourse->icon }}" alt="css-image">
                            </div>
                        </div>
                        <div class="content">
                            <div class="content-text">
                                <p class="heading">{{ $otherCourse->name }}</p>
                                <p class="description">{{ $otherCourse->description }}</p>
                            </div>
                            <a href="{{ route('courses.detail', $otherCourse->id) }}" class="btn btn-default">Take This Course</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="view-all-courses">
                <a class="all-course" href="/allcourses">View All Our Courses <img src="{{ asset('image/view_all_courses.png') }}" alt="view-courses-image"></a>
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
                @foreach($reviews as $review)
                    <div>
                        <div class="comment-wrapper">
                            <div class="comment-content">
                                <div class="line"></div>
                                <div class="text">
                                    <p>{{ $review->comment }}</p>
                                </div>
                            </div>
                            <div class="triangle"></div>
                        </div>
                        <div class="customer-wrapper">
                            <div class="image">
                                <img src="{{ $review->avatar }}" alt="user">
                            </div>
                            <div class="detail">
                                <p class="name fw-bold">{{ $review->user_name }}</p>
                                <p class="position">{{ $review->course_name }}</p>
                                <div class="rate">
                                    <span class="star">{{ getRate($review->rate) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
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
                <span class="counter">{{$courseNumber}}</span>
            </div>
            <div class="col-xl-4 col-md-4">
                <p>Lessons</p>
                <span class="counter">{{$lessonsNUmber}}</span>
            </div>
            <div class="col-xl-4 col-md-4">
                <p>Learners</p>
                <span class="counter">{{$learner}}</span>
            </div>
        </div>
    </div>
</section>

@endsection
