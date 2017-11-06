@extends('master')
@section('title','Terms&Condition')
@section('content')

        <div class="container">
          <div class="featured-item">
             <div class="col-md-10" style="text-align: justify;">
               {!! html_entity_decode($termconditon->terms_conditoin)!!}
             </div>
          </div>
          <div class="ruler"></div>
        </div>

@endsection