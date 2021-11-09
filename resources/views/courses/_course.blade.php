<div class="col-md-6 row-courses">
    <div class="card">
        <div class="card-header col-md-12 card-allc-header">
            <div class="row-title row">
                <div class="col-2 img-course col-sm-2">
                    <img src="{{$course->icon}}" alt="ava-course">
                </div>
                <div class="col-10 title-course col-sm-10">
                    <p class="title">{{$course->name}}</p>
                    <p class="description">{{$course->description}}</p>
                </div>
            </div>
            <div class="btn-more-rating row justify-content-between">
                <div class="col-12 btn-more-container">
                    <a class="btn-more" href="courses/detail/{{$course->id}}" class="btn btn-primary">More</a>
                </div>
            </div>
        </div>
        <div class="card-body row index-course">
            <div class="index-col col-4 col-md-4">
                <p class="index-title">Learners</p>
                <p class="main-index" id="learner-index">
                    {{ $course->number_user_student }}
                </p>
            </div>
            <div class="index-col col-4 col-md-4">
                <p class="index-title">Lessons</p>
                <p class="main-index" id="lesson-index">
                    {{ $course->number_lesson }}
                </p>
            </div>
            <div class="index-col col-4 col-md-4">
                <p class="index-title">Times</p>
                <p class="main-index" id="quizze-index">{{$course->course_time}}h</p>
            </div>
        </div>
    </div>
</div>
