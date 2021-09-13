<div class="row ml-0 mr-0 detail-lessons-container">
    <form class="row form-search-detail" action="{{route('filterdetail', $course->id)}}" method="get">
        <div class="col-lg-8 detail-lessons">
            <input type="text" class="form-control search-lessons" name="key_detail_course" placeholder="Search"
                aria-label="Search" @if (isset($keyword)) value={{ $keyword }} @endif>
        </div>
        <div class="col-lg-2 btn-search-lessons">
            <input type="submit" value="Search" class="btn-search">
        </div>
    </form>
    <div class="col-lg-4 pr-0 align-self-center btn-join-container">
        @if(!Auth::check())
            <a href="#" class="btn-join-course" id="btn-login-join-course">Login and Joined the course</a>
        @elseif(Auth::check() && $isJoined == true)
            <a href="#" class="btn-join-course" id="btn-joined-course">Joined the course</a>
        @else
            <a href="/insert/{{ $course->id }}" class="btn-join-course" id="btn-join-course"> Join the course</a>
        @endif
    </div>
</div>
<div class="row m-0 show-lessons-container">
    <div class="col-lg-12">
        @foreach ($lessons as $key => $lesson)
        <div class="row">
            <div class="col-lg-8 pr-0">
                <p class="txt-title-lessons">{{$key + 1}}. {{$lesson->name}}</p>
            </div>
            <div class="col-lg-4 pl-0 btn-more-lessons">
                @if (Auth::check() && $isJoined == true)
                <a href={{route('lessons.detail',$lesson->id)}}>Learn</a>
                @endif
            </div>
        </div>
        @endforeach
    </div>
</div>
<div class="pagination-container">
    {{ $lessons->appends($_GET)->links('pagination::bootstrap-4') }}
</div>
