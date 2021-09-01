{{--<div class="m-3">--}}
{{--    <div class="add-review my-3">Leave a review</div>--}}
{{--    <form method="POST" action="{{ route('review.course.store') }}">--}}
{{--        @csrf--}}
{{--        <div class="message-add-review my-3">Message</div>--}}
{{--        <input type="hidden" name="rating_value" class="rating_value">--}}
{{--        <input type="hidden" name="course_id" value="{{ $courseDetail->id }}">--}}
{{--        <textarea name="content" id="content" cols="30" rows="5" class="form-control mb-3"></textarea>--}}
{{--        @if ($errors->has('content'))--}}
{{--            <error class="text-danger">--}}
{{--                {{ $errors->first('content') }}--}}
{{--            </error>--}}
{{--        @endif--}}
{{--        <div class="vote-star-review d-flex align-items-center">--}}
{{--            <div class="add-review">{{ vote }} : </div>--}}
{{--            <div class="rating pt-2 px-3">--}}
{{--                <input class="rate" type="radio" name="rate" id="star-five"--}}
{{--                       value="{{ config('variable.rate.five_star') }}"><label for="star-five">5--}}
{{--                    stars</label>--}}
{{--                <input class="rate" type="radio" name="rate" id="star-four"--}}
{{--                       value="{{ config('variable.rate.four_star') }}"><label for="star-four">4--}}
{{--                    stars</label>--}}
{{--                <input class="rate" type="radio" name="rate" id="star-three"--}}
{{--                       value="{{ config('variable.rate.three_star') }}"><label for="star-three">3--}}
{{--                    stars</label>--}}
{{--                <input class="rate" type="radio" name="rate" id="star-two"--}}
{{--                       value="{{ config('variable.rate.two_star') }}"><label for="star-two">2--}}
{{--                    stars</label>--}}
{{--                <input class="rate" type="radio" name="rate" id="star-one"--}}
{{--                       value="{{ config('variable.rate.one_star') }}"><label for="star-one">1--}}
{{--                    stars</label>--}}
{{--            </div>--}}
{{--            <div class="message-add-review">({{ stars }})</div>--}}
{{--        </div>--}}
{{--        @if ($errors->has('rate'))--}}
{{--            <error class="text-danger">--}}
{{--                {{ $errors->first('rate') }}--}}
{{--            </error>--}}
{{--        @endif--}}
{{--        <div class="d-flex justify-content-end mt-n3">--}}
{{--            @if (Auth::check())--}}
{{--                <button type="submit" class="btn btn-learn px-4 my-4">Send</button>--}}
{{--            @else--}}
{{--                <a data-target="#myModal" data-toggle="modal" id="btn-send"--}}
{{--                   class="btn btn-learn px-4 my-4">Send</a>--}}
{{--                <input type="text" hidden name="id" value="{{ $courseDetail->id }}">--}}
{{--            @endif--}}
{{--        </div>--}}
{{--    </form>--}}
{{--</div>--}}
