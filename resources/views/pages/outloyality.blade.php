@extends('master')
@section('title','Our-Loyality')
@section('content')

        <div class="container">
          <div class="featured-item">
             <div class="col-md-10" style="text-align: justify;">
               {!! html_entity_decode($ourloylity->our_loyality)!!}
             </div>
          </div>
          <div class="ruler"></div>
        </div>

@endsection