@extends('master')
@section('title','Contact')
@section('content')
 <div class="container">
    <div class="featured-block">
       <div class="row">
         <div class="col-md-8 col-md-offset-1 conform">
          <div>
             <h2>Contact Me:</h2>
          </div>
           @include('myadmin.lib.message')
           <form method="post" accept="{{route('pages.contact')}}">
            {{csrf_field()}}
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name">
              </div>
              <div class="form-group">
                <label for="email">Email address:</label>
                <input type="email" class="form-control" name="email" required="1">
              </div>
              <div class="form-group">
                <label for="subject">Subject:</label>
                <input type="text" class="form-control" name="subject" >
              </div>
              <div class="form-group">
                <label for="body">Message:</label>
                <textarea name="message" class="form-control" cols="45" rows="10"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Send</button>
          </form>
         </div>
        </div>  
      </div> 
      <div class="ruler"></div>  
  </div>
      
     
@endsection