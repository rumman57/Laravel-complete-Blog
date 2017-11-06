@extends('master')
<?php $posttitle = htmlspecialchars($post->slug); ?>
@section('title',"$posttitle")
@section('content')
  <div class="container">
      
      <div class="row">
        <div class="featured-content">
          <div class="col-md-11">
            <div class="block">
              @if(isset($post->image))
                <img src="{{URL::asset('img/'.$post->image)}}" alt="" class="img-spacing thumbnail" height="210" width="270">
              @endif
              <h1>{{$post->title}}</h1>
               <p style="color:black"><span class="fa fa-calendar"> <b>Date:</b> {{date('M j,Y',strtotime($post->created_at))}}</span>  <span style="margin-left: 100px;" class="fa fa-cloud-download"> <b>Author:</b> Rumman</span></p>
               <div>
                {!!html_entity_decode($post->body)!!}
               
              </div>
              <div>
                <p style="color:black"><span class="fa fa-calendar"> <b>Category:</b> {{$post->category->name or "Undefined"}}</span>  <span style="margin-left: 100px;" class="fa fa-cloud-download"> <b>Tags:</b> 
                  @foreach($post->tags as $tag)
                     <span class="label label-success">{{$tag->name}}</span>
                  @endforeach
              </span></p>
              </div>
            </div> 
            
          </div>      
        </div>
       </div>
  </div> 
@endsection
