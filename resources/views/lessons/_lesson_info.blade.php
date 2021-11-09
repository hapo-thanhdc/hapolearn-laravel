<div class="container-fluid descriptions-container">
  <div class="row">
    <div class="col-lg-12 title-container">
      <p class="title">Descriptions lesson</p>
    </div>
    <div class="col-lg-12 content-container">
      <p class="content float-left">{{$lessons->description}}</p>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12 title-container">
      <p class="title">Requirements</p>
    </div>
    <div class="col-lg-12 content-container">
      <p class="content float-left">{{$lessons->requirement}}</p>
    </div>
  </div>
  <div class=" align-items-center d-flex" >
      <p class="title" style="font-family:UTM, font-weight: bold;font-size: 20px;line-height: 25px;color:#505353;">Tags:</p>
    @foreach ($tags as $tag)
      <p class="content tags" style="margin-left:34px; font-size: 14px;background: #F2F2F2;">#{{ $tag->name }} </p>
    @endforeach
  </div>
</div>
