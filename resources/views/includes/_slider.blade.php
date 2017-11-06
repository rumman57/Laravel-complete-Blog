 <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="banner">
      <div id="carousel-example-generic" class="carousel slide">
  
  <!-- Wrapper for slides -->
        <div class="carousel-inner">
        @foreach($sliders as $slider)
          <div class="item {{ $loop->first ? 'active' : '' }}">
            <img  style="height: 335px;width: 100%;" src="{{URL::asset('img/'.$slider->image)}}" alt="">
            <div class="carousel-caption">
              <h1>{{$slider->title}}</h1>
              <h2>{{$slider->description}}</h2>
              <a href="{{$slider->button_link}}" class="btn">Button</a>
            </div>
          </div>
          @endforeach 
         <!-- <div class="item">
            <img src="img/banner-image.jpg" alt="">
            <div class="carousel-caption">
              <h1>Morbi semuis</h1>
              <h2>Praesent dapibus, neque id cursus faucibus tortas augue eu vulputate</h2>
              <a href="#" class="btn">facilis</a>
            </div>
          </div>-->
        </div>

  <!-- Controls -->
      <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
        <i class="fa fa-arrow-circle-left"></i>
      </a>
      <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
        <i class="fa fa-arrow-circle-right"></i>
      </a>
    </div>
    </div>