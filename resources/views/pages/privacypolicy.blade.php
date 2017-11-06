@extends('master')
@section('title','Privacy-Policy')
@section('content')

        <div class="container">
          <div class="featured-item">
             <div class="col-md-10" style="text-align: justify;">
               {!! html_entity_decode($privcypo->privacy_policy)!!}
             </div>
          </div>
          <div class="ruler"></div>
        </div>

@endsection