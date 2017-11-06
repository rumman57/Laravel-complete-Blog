@extends('master')
@section('title','HomePage')
@section('slider_section')
 @include('includes/_slider')
@endsection
@section('content')
 <div class="container">
      <div class="featured-block">
        <!-- Example row of columns -->
        <div class="row">
        @foreach($feBlocks as $feBlock)
          <div class="col-md-3">
            <div class="block">
            <div class="thumbnail">
              <img src="{{URL::asset('img/'.$feBlock->image)}}" alt="" class="img-responsive">
              <div class="caption">
                <h1>{{$feBlock->title}}</h1>
                <p>{{$feBlock->featured_desc}}</p>
                <a class="btn" href="{{ $feBlock->button_link}}">more</a>
              </div>
              </div>
            </div>
            </div>
          @endforeach
          </div>  
        </div> 
        <div class="ruler"></div>  
        </div>
        <div class="container">
          <div class="featured-item">
            <div class="col-md-6">
            <div class="block">
              <div class="block-title">
             
                <h1>{{$ftItem->ftItLeftTitle}}</h1>
                <h2>{{$ftItem->ftItLeftDesc}}</h2>
                
              </div>
              <ul>
              @foreach($ftItemLefts as $ftItemLeft)
                <li class="col-md-6"> 
                  <div class="user-info">
                    <i class="{{$ftItemLeft->icon}} icon"></i>
                    <h1>{{$ftItemLeft->title}} </h1>    
                    <p>{{$ftItemLeft->desc}}</p>
                 </div>
               </li>
               @endforeach
              </ul>
            </div>
            </div>
            <div class="col-md-6">
              <div class="block">
                <div class="block-title">
               
                      <h1>{{$ftItem->ftItRightTitle}}</h1>
                      <h2>{{$ftItem->ftItRightDesc}}</h2>
               
                </div>
                  <div class="panel-group" id="accordion">
                  @foreach($ftItemRights as $ftItemRight)
                    <div class="panel panel-default">
                      <div class="panel-heading accordion-caret">
                        <h4 class="panel-title">
                          <a class="accordion-toggle {{ $loop->first ? '' : 'collapsed' }}" data-toggle="collapse" data-parent="#accordion" href="#{{$ftItemRight->accordian_link}}">
                            {{$ftItemRight->title}}
                          </a>
                        </h4>
                      </div>
                      <div id="{{$ftItemRight->accordian_link}}" class="panel-collapse collapse {{ $loop->first ? 'in' : '' }}">
                        <div class="panel-body">{{$ftItemRight->desc}}</div>
                      </div>
                    </div>
                    @endforeach
                </div>
              </div>
            </div>
          </div>
          <div class="ruler"></div>
        </div>
     
@endsection