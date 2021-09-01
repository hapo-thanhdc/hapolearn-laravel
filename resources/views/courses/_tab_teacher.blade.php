<div class="row ml-0 mr-0 detail-teacher-container">
    <div class="col-lg-12 txt-main-teacher">
        <p>Main Teachers</p>
    </div>
    <div class="col-lg-12">
        @foreach ($teachers as $item)
        <div class="row row-infor-mentor">
            <div class="col-lg-2 pr-0 col-ava-mentor">
                <img src="{{ asset('image/owl_logo.png') }}" alt="anh">
            </div>
            <div class="col-lg-4 align-self-center infor-mentor">
                <div class="row name-mentor">{{$item->name}}</div>
                <div class="row exp-mentor">{{$item->email}}</div>
                <div class="row social-mentor">
                    <div class="col-lg-1 pl-0">
                        <a href="#" class="mr-1 icon-google"></a>
                    </div>
                    <div class="col-lg-1 pl-0">
                        <a href="#" class="mr-1 ml-1 icon-facebook"></a>
                    </div>
                    <div class="col-lg-1 pl-0">
                        <a href="#" class="ml-1 icon-slack"></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 description-mentor">
                <p>Vivamus volutpat eros pulvinar velit laoreet, sit amet egestas erat dignissim. Sed quis rutrum
                    tellus, sit amet viverra felis. Cras sagittis sem sit amet urna feugiat rutrum. Nam nulla ipsum,
                    venenatis malesuada felis quis, ultricies convallis neque. Pellentesque tristique </p>
            </div>
        </div>
        @endforeach
    </div>
</div>
