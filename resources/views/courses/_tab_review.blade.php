<div class="container">
    <div>
        <p style="padding-left: 11px; font-family: UTM; font-weight: bold; font-size: 25px; line-height: 31px; color: #505353">{{$course->number_review}} Reviews</p>
    </div>
    <div class="row">
        <div class="col-lg-12 col-xs-12 col-md-6">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-lg-3 col-xs-12 col-md-6 text-center">
                        <h1 class="rating-num">
                            {{$course->total_rate}}</h1>
                        <div class="rating-review">
                            <span class="star" style="margin-left: 1rem">{{ getRate($course->total_rate) }}</span>
                        </div>
                        <div class="rating-total">
                            <span>{{$course->number_review}} Ratings</span>
                        </div>
                    </div>
                    <div class="col-lg-9 col-xs-12 col-md-6" style="left: 60px">
                        <div class="row rating-desc">
                            <div class="col-lg-1 col-xs-3 col-md-3 text-right">
                                <span class="glyphicon glyphicon-star">5stars</span>
                            </div>
                            <div class="col-lg-10 col-xs-8 col-md-9">
                                <div class="progress progress-striped">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20"
                                         aria-valuemin="0" aria-valuemax="100" style="width: {{$course->number_review > 0 ? $course->number_rate_five / $course->number_review * 100 :0}}%">
                                        <span class="sr-only"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-1 col-xs-3 col-md-3 text-left" style="padding-left: 0px">
                                <span class="glyphicon glyphicon-star" style="font-size: 14px">{{$course->number_rate_five}}</span>
                            </div>
                            <!-- end 5 -->
                            <div class="col-lg-1 col-xs-3 col-md-3 text-right">
                                <span class="glyphicon glyphicon-star"></span>4stars
                            </div>
                            <div class="col-lg-10 col-xs-8 col-md-9">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20"
                                         aria-valuemin="0" aria-valuemax="100" style="width: {{$course->number_review > 0 ?  $course->number_rate_four / $course->number_review *100 :0}}%">
                                        <span class="sr-only">60%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-1 col-xs-3 col-md-3 text-left" style="padding-left: 0px">
                                <span class="glyphicon glyphicon-star" style="font-size: 14px">{{$course->number_rate_four}}</span>
                            </div>
                            <!-- end 4 -->
                            <div class="col-lg-1 col-xs-3 col-md-3 text-right">
                                <span class="glyphicon glyphicon-star"></span>3stars
                            </div>
                            <div class="col-lg-10 col-xs-8 col-md-9">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20"
                                         aria-valuemin="0" aria-valuemax="100" style="width: {{$course->number_review > 0 ? $course->number_rate_three / $course->number_review *100 :0}}%">
                                        <span class="sr-only">40%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-1 col-xs-3 col-md-3 text-left " style="padding-left: 0px">
                                <span class="glyphicon glyphicon-star" style="font-size: 14px">{{$course->number_rate_three}}</span>
                            </div>
                            <!-- end 3 -->
                            <div class="col-lg-1 col-xs-3 col-md-3 text-right">
                                <span class="glyphicon glyphicon-star"></span>2stars
                            </div>
                            <div class="col-lg-10 col-xs-8 col-md-9">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="20"
                                         aria-valuemin="0" aria-valuemax="100" style="width: {{$course->number_review > 0 ? $course->number_rate_two/ $course->number_review *100 :0}}%">
                                        <span class="sr-only">20%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-1 col-xs-3 col-md-3 text-left" style="padding-left: 0px">
                                <span class="glyphicon glyphicon-star" style="font-size: 14px">{{$course->number_rate_two}}</span>
                            </div>
                            <!-- end 2 -->
                            <div class="col-lg-1 col-xs-3 col-md-3 text-right">
                                <span class="glyphicon glyphicon-star"></span>1stars
                            </div>
                            <div class="col-lg-10 col-xs-8 col-md-9">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80"
                                         aria-valuemin="0" aria-valuemax="100" style="width: {{$course->numbe_review > 0 ? $course->number_rate_one / $course->number_review *100 :0}}%">
                                        <span class="sr-only">15%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-1 col-xs-3 col-md-3 text-left" style="padding-left: 0px">
                                <span class="glyphicon glyphicon-star" style="font-size: 14px">{{$course->number_rate_one}}</span>
                            </div>
                            <!-- end 1 -->
                        </div>
                        <!-- end row -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="m-3">
    <div class="review-content">
        <ul id="commentArea">
            @foreach($reviews as $review)
                <li>
                    <div class="user-info" style="display: flex; align-items: center">
                        <div class="avatar" style="width: 40px; height: 40px; border-radius: 100%; overflow: hidden; text-align: center; background-image: url('{{ $userInfoMap[$review->user_id]->avatar }}'); background-position: center; background-size: cover">
                    </div>
                        <p class="review-name-user" style="margin-left: 1rem; margin-bottom: 0">{{ $userInfoMap[$review->user_id]->name }} <span class="star" style="margin-left: 1rem">{{ getRate($review->rate) }}</span></p>
                    </div>
                    <p class="review-comment">{{ $review->comment }}</p>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="add-review my-3">Leave a review</div>
    <form method="POST" action="{{ route('review.course.store') }}" id="reviewForm">
        @csrf
        <div class="message-add-review my-3">Message</div>
        <input type="hidden" name="course_id" value="{{ $course->id }}">
        <textarea name="content" id="content" cols="30" rows="5" class="form-control mb-3"></textarea>
        @if ($errors->has('content'))
            <error class="text-danger">
                {{ $errors->first('content') }}
            </error>
        @endif
        <div class="vote-star-review d-flex align-items-center">
            <div class="add-review"> Vote: </div>
            <div class="rating pt-2 px-3">
                <input class="rate" type="radio" name="rate" id="star-five"
                       value="{{ config('constants.variable.rate.five_star') }}"><label for="star-five">5
                    stars</label>
                <input class="rate" type="radio" name="rate" id="star-four"
                       value="{{ config('constants.variable.rate.four_star') }}"><label for="star-four">4
                    stars</label>
                <input class="rate" type="radio" name="rate" id="star-three"
                       value="{{ config('constants.variable.rate.three_star') }}"><label for="star-three">3
                    stars</label>
                <input class="rate" type="radio" name="rate" id="star-two"
                       value="{{ config('constants.variable.rate.two_star') }}"><label for="star-two">2
                    stars</label>
                <input class="rate" type="radio" name="rate" id="star-one"
                       value="{{ config('constants.variable.rate.one_star') }}"><label for="star-one">1
                    stars</label>
            </div>
            <div class="message-add-review">star</div>
        </div>
        @if ($errors->has('rate'))
            <error class="text-danger">
                {{ $errors->first('rate') }}
            </error>
        @endif
        <div class="d-flex justify-content-end mt-n3">
            @if (Auth::check())
                <button type="submit" class="btn btn-learn px-4 my-4">Send</button>
            @else
                <a data-target="#myModal" data-toggle="modal" id="btn-send"
                   class="btn btn-learn px-4 my-4">Send</a>
                <input type="text" hidden name="id" value="{{ $course->id }}">
            @endif
        </div>
    </form>
</div>
