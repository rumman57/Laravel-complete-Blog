@extends('master')
@section('title','Blog')
@section('header_scripts')


@endsection
@section('content')
  <div class="container">
      <div class="row">
      	 <div class="col-md-4 col-md-offset-3">
      	<form class="form-wrapper" method="POST" action="{{route('blog.search')}}">
           {{ csrf_field() }}
		      <input type="text" id="search"  placeholder="Search for..." required>
		    <input type="submit" value="go" id="submit">
		</form>
      	 </div>
      </div>
      <div class="row">
        <div class="featured-content">
          <div class="col-md-9" id="search_result">
          @foreach($posts as $post)
            <div class="block">
              @if(isset($post->image))
                <img src="{{URL::asset('img/'.$post->image)}}" alt="" class="img-spacing thumbnail" height="210" width="270">
              @endif
              <h2 style="color: black;margin-bottom: 5px;"><a style="color: black;text-decoration: none;" href="{{route('blog.single',$post->slug)}}">{{$post->title}}</a></h2>
               <p style="color:black"><span class="fa fa-calendar"> <b>Date:</b> {{date('M j,Y',strtotime($post->created_at))}}</span>  <span style="margin-left: 100px;" class="fa fa-cloud-download"> <b>Author:</b> Rumman</span></p>
               <div>
               {!!substr(html_entity_decode($post->body),0,500)!!}{{strlen(strip_tags($post->body))>500 ? "......":""}}
                <a href="{{route('blog.single',$post->slug)}}" class="btn">more</a>
                
              </div>
            </div> 
             @if(!$loop->last)
                <br><hr><br>
             @endif
           @endforeach
           
           <div class="text-center" style="text-align: center;">

              @if ($posts->hasPages())
    <ul class="pagination" style="display: inline-flex;">
        {{-- Previous Page Link --}}
        @if ($posts->onFirstPage())
            <li class="disabled"><span>&laquo;</span></li>
        @else
            <li><a href="{{ $posts->previousPageUrl() }}" rel="prev">&laquo;</a></li>
        @endif

        @if($posts->currentPage() > 3)
            <li class="hidden-xs"><a href="{{ $posts->url(1) }}">1</a></li>
        @endif
        @if($posts->currentPage() > 4)
            <li class="disabled hidden-xs"><span>...</span></li>
        @endif
        @foreach(range(1, $posts->lastPage()) as $i)
            @if($i >= $posts->currentPage() - 2 && $i <= $posts->currentPage() + 2)
                @if ($i == $posts->currentPage())
                    <li class="active"><span>{{ $i }}</span></li>
                @else
                    <li><a href="{{ $posts->url($i) }}">{{ $i }}</a></li>
                @endif
            @endif
        @endforeach
        @if($posts->currentPage() < $posts->lastPage() - 3)
            <li class="disabled hidden-xs"><span>...</span></li>
        @endif
        @if($posts->currentPage() < $posts->lastPage() - 2)
            <li class="hidden-xs"><a href="{{ $posts->url($posts->lastPage()) }}">{{ $posts->lastPage() }}</a></li>
        @endif

        {{-- Next Page Link --}}
        @if ($posts->hasMorePages())
            <li><a href="{{ $posts->nextPageUrl() }}" rel="next">&raquo;</a></li>
        @else
            <li class="disabled"><span>&raquo;</span></li>
        @endif
      </ul>
     @endif
           </div> <!-- Text Center -->
        </div>  <!-- Col-md-9 -->

           <div class="col-md-3">
            <div class="block cat">
              <h1>Category</h1>
              <ul>
               @foreach($categories as $category)
              	 <li><a href="{{route('blog.category',strtolower($category->name))}}">{{$category->name}} ({{ $category->posts->count() }})</a></li>
                @endforeach
              </ul>
            </div>            
          </div><!-- Col-md-3-->
        </div><!-- Featured Content-->
       </div><!-- Row-->
  </div> <!-- Container-->
@endsection
@section('footer_js')
<script type="text/javascript" src="{{ URL::asset('js/ajax_main.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery-3.1.1.min.js') }}"></script>    
@endsection
