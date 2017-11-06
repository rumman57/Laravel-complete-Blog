@extends('master')
@section('title','About')
@section('content')

        <div class="container">
          <div class="featured-item">
             <div class="col-md-10" style="text-align: justify;">
               {!! html_entity_decode($aboutpage->about)!!}
             </div>
          </div>
          <div class="ruler"></div>
        </div>

@endsection