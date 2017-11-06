  <div class="footer-wrapper">
        <div class="site-content">
      <div class="container">
        <div class="row">
        
          <div class="block col-md-8 col-sm-6 fotlin">
            <ul>
              <li><a href="{{route('pages.about')}}">About</a></li>
              <li><a href="{{route('pages.termscondition')}}">Terms & Condition</a></li>
              <li><a href="{{route('pages.privacypolicy')}}">Pirvacy Policy</a></li>
              <li><a href="{{route('pages.ourloyality')}}">Our Loyality</a></li>
              <li><a href="{{route('pages.contact')}}">Contact</a></li>
            </ul>
          </div>
          <div class="block col-md-4 col-sm-6 soc">
            <ul>
             @foreach($sociallinks as $sociallink)
              <li><a href="{{$sociallink->link}}" target="_blank"><i class="{{$sociallink->icon}}"></i></a></li>     
              @endforeach
            </ul>
          </div>
        </div>
         <div class="row">
           <div class="col-md-12 text-center ft-bottom">
            
                <p>{{$options->copyright}}. Visit: <a href="http://www.rh-rumman.me" target="_blank"> www.rh-rumman.me</a></p>
              
              </div>
           </div>
         </div>
        </div>
        
      </div>
      
      </div>

      @include('../partials/_js_footer')

  </body>
</html>
