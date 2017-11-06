       <?php
        $ch= $posts->count();
        ?>
        @if(!empty($ch))
        @foreach($posts as $post)
            <div class="block">
              @if(isset($post->image))
                <img src="{{URL::asset('img/'.$post->image)}}" alt="" class="img-spacing thumbnail" height="210" width="270">
              @endif
              <h2 style="color: black;margin-bottom: 5px;"><a style="color: black;text-decoration: none;" href="{{route('blog.single',$post->slug)}}">{{$post->title}}</a></h2>
               <p style="color:black"><span class="fa fa-calendar"> <b>Date:</b> {{date('M j,Y',strtotime($post->created_at))}}</span>  <span style="margin-left: 100px;" class="fa fa-cloud-download"> <b>Author:</b> Rumman</span>
               <div>
               {!!substr(html_entity_decode($post->body),0,500)!!}{{strlen(strip_tags($post->body))>500 ? "......":""}}
                <a href="{{route('blog.single',$post->slug)}}" class="btn">more</a>
                </p>
              </div> 
             @if(!$loop->last)
                <br><br>
             @endif
           @endforeach
        @else
         <h3>"Ooops!!!! No Results Found"</h3>
        @endif
      
      
      <!-- For Pagiante Start-->
    <div class="text-center">

  @php
      $total_records= $posts1->count();
      $record_per_page=1;
      $total_pages = ceil($total_records/$record_per_page);
      echo paginate_function($record_per_page, $page,$total_records, $total_pages);
  @endphp

    </div>
    <!-- For Pagiante End-->

     <!-- For Pagiante Start-->
<!--<div class="text-center pagination1">
 @php
/*
  $total_records= $posts1->count();
  $record_per_page=2;
  $total_pages = ceil($total_records/$record_per_page);
  for($i=1;$i<= $total_pages;$i++){*/
  @endphp  
       <div class="links">
          <span class="paginate" id="<?php /* echo*/ $i;?>"><a href="#" style="none"> <b><?php /*echo $i;*/?></b> </a></span>
        </div>
          
 @php /*}*/ @endphp
 </div> -->
<!-- For Pagiante End-->
           
 <!-- Paginate Function Start -->

@php

function paginate_function($item_per_page, $current_page, $total_records, $total_pages)
{
    $pagination = '';
    if($total_pages > 0 && $total_pages != 1 && $current_page <= $total_pages){ //verify total pages and current page number
        $pagination .= '<ul class="pagination ac">';
        
        $right_links    = $current_page + 3; 
        $previous       = $current_page - 3; //previous link 
        $next           = $current_page + 1; //next link
        $first_link     = true; //boolean var to decide our first link
        
        if($current_page > 1){
      $previous_link = ($previous==0)? 1: $previous;
            $pagination .= '<li class="first"><a href="#" data-page="1" title="First">&laquo;</a></li>'; //first link
            //$pagination .= '<li><a href="#" data-page="'.$previous_link.'" title="Previous">&lt;</a></li>'; //previous link
                for($i = ($current_page-2); $i < $current_page; $i++){ //Create left-hand side links
                    if($i > 0){
                        $pagination .= '<li><a href="#" data-page="'.$i.'" title="Page'.$i.'">'.$i.'</a></li>';
                    }
                }   
            $first_link = false; //set first link to false
        }
        
        if($first_link){ //if current active page is first link
            $pagination .= '<li class="first active">'.$current_page.'</li>';
        }elseif($current_page == $total_pages){ //if it's the last active link
            $pagination .= '<li class="last active">'.$current_page.'</li>';
        }else{ //regular current link
            $pagination .= '<li class="active">'.$current_page.'</li>';
        }
                
        for($i = $current_page+1; $i < $right_links ; $i++){ //create right-hand side links
            if($i<=$total_pages){
                $pagination .= '<li><a href="#" data-page="'.$i.'" title="Page '.$i.'">'.$i.'</a></li>';
            }
        }
        if($current_page < $total_pages){ 
        $next_link = ($i > $total_pages) ? $total_pages : $i;
               /* $pagination .= '<li><a href="#" data-page="'.$next_link.'" title="Next">&gt;</a></li>'; //next link*/
                $pagination .= '<li class="last"><a href="#" data-page="'.$total_pages.'" title="Last">&raquo;</a></li>'; //last link
        }
        
        $pagination .= '</ul>'; 
    }
    return $pagination; //return pagination links
}

@endphp
 <!-- Paginate Function End -->
