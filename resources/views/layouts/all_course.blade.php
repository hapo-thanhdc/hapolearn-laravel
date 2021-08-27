<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body>
@include('layouts.header')
<section class="container-fluid p-0 all-courses">
    <form class="form-inline" action="{{route('search')}}" method="GET">
        <div class="filter-and-search container-fluid">
            <div class="filter-container">
                <img class="filter-icon" src="{{asset('image/filter.png')}}" alt="filter" data-toggle="collapse"
                     href="#multiCollapseExample1" role="button" aria-expanded="false"
                     aria-controls="multiCollapseExample1">
            </div>
            <div class="search-container">
                <div class="group-form">
                    <input type="text" class="form-control mr-sm-2 form-search" name="key" placeholder="Search"
                           aria-label="Search">
                    <i class="fas fa-search search-icon"></i>
                </div>

                <button class="btn btn-outline-success my-2 my-sm-0 btn-search" type="submit">Tìm kiếm</button>

            </div>
        </div>
        <div class="collapse container-fluid container-filter" id="multiCollapseExample1">
            <div class="container-fluid container-main-filter">
                <div class="row p-0 row-filter-1">
                    <div class="col-lg-1 col-txt-filter">
                        <p class="txt-filter">Lọc theo</p>
                    </div>

                    <div class="col-lg-2 btn-latest-oldest">
                        <input type="radio" class="btn-check" value="moinhat" name="sort" id="success-outlined"
                               autocomplete="off">
                        <label class="btn btn-latest" for="success-outlined">Mới nhất</label>

                        <input type="radio" class="btn-check" value="cunhat" name="sort" id="danger-outlined"
                               autocomplete="off">
                        <label class="btn btn-oldest" for="danger-outlined">Cũ nhất</label>
                    </div>

                    <div class="col-lg-2 select-filter select-teacher ">
                        <select name="teacher" id="" onsubmit="return false" class="js-states form-control">
                            <option value="">Teacher</option>
                            @foreach ($teachers as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-lg-2 select-filter">
                        <select name="learner" id="" class="js-states form-control">
                            <option value="">Số người học</option>
                            <option value="tang">Tăng dần</option>
                            <option value="giam">Giảm dần</option>
                        </select>
                    </div>

                    <div class="col-lg-2 select-filter">
                        <select name="times" id="" class="js-states form-control">
                            <option value="">Thời gian học</option>
                            <option value="tang">Tăng dần</option>
                            <option value="giam">Giảm dần</option>
                        </select>
                    </div>

                    <div class="col-lg-2 select-filter">
                        <select name="lessons" id="" class="js-states form-control">
                            <option value="">Số bài học</option>
                            <option value="tang">Tăng dần</option>
                            <option value="giam">Giảm dần</option>
                        </select>
                    </div>
                </div>

                <div class="row p-0 row-filter-2">
                    <div class="col-lg-1"></div>
                    <div class="col-lg-2 select-filter">
                        <select name="tags" id="" class="js-states form-control">
                            <option value="">Tags</option>
                            @foreach ($tags as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-lg-2 select-filter">
                        <select name="Review" id="" class="js-states form-control">
                            <option value="">Review</option>
                            <option value="tang">Tăng dần</option>
                            <option value="giam">Giảm dần</option>
                        </select>
                    </div>
                    <div class="col-lg-2">
                        <input class="btn btn-reset-filter" type="button" value="Reset">
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="row row-all-courses">
        @if (count($courses)>0)
            @foreach ($courses as $course)
                <div class="col-sm-6 row-courses">
                    <div class="card">
                        <div class="card-header card-allc-header">
                            <div class="row-title">
                                <div class="img-course">
                                    <img src="{{$course->icon}}" alt="ava-course">
                                </div>
                                <div class="title-course">
                                    <p class="title">{{$course->name}}</p>
                                    <p class="description">{{$course->description}}</p>
                                </div>
                            </div>
                            <div class="btn-more-container">
                                <a class="btn-more" href="#" class="btn btn-primary">More</a>
                            </div>

                        </div>
                        <div class="card-body index-course">
                            <div class="index-col">
                                <p class="index-title">Learners</p>
                                <p class="main-index" id="learner-index">
                                    {{$course->learners }}
                                </p>
                            </div>
                            <div class="index-col">
                                <p class="index-title">Lessons</p>
                                <p class="main-index" id="lesson-index">
                                    {{ $course->number_lesson }}
                                </p>
                            </div>
                            <div class="index-col">
                                <p class="index-title">Times</p>
                                <p class="main-index" id="quizze-index">{{$course->times}}h</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <h3>Not found the course</h3>
        @endif
    </div>
    <div class="pagination-courses">
        {{$courses->links('pagination::bootstrap-4')}}
    </div>
</section>
@include('layouts.footer')
</body>

