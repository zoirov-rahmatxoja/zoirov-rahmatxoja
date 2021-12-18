<div class="sub-header">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-xs-12">
            <ul class="left-info">
              <li><a href="#"><i class="fa fa-clock-o"></i>Mon-Fri 09:00-17:00</a></li>
              <li><a href="#"><i class="fa fa-phone"></i>090-080-0760</a></li>
            </ul>
          </div>
          <!-- <div class="col-md-4">
            <ul class="right-icons">
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
              <li><a href="#"><i class="fa fa-behance"></i></a></li>
            </ul>
          </div> -->
        </div>
      </div>
    </div>
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" ><h2>@lang('main.Finance business')</h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="{{ route('home') }}">@lang('main.home')
                  <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{  route('about') }}">@lang('main.about_us')</a>
              </li>  
              <li class="nav-item">
                <a class="nav-link" href="{{  route('services') }}">@lang('main.services')</a>
              </li>                          
              <li class="nav-item">
                <a class="nav-link" href="{{  route('contact') }}">@lang('main.contact')</a>
              </li>
              <!-- <li class="nav-item">
                <a class="nav-link" href="one-page.html">@lang('main.page')</a>
              </li> -->





              <li class="nav-item">
                <a class="nav-link">{{ LaravelLocalization::getCurrentLocaleName() }}</a>
                            <ul class="dropdown-item2 dsnone">
                                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode)
                                    <li style="hanging-punctuation: 1" >
                                        <a hreflang="{{ $localeCode['link'] }}"
                                           href="{{ LaravelLocalization::getLocalizedURL($localeCode['link'], null, [], true) }}">{{ $localeCode['native'] }}</a>
                                    </li>
                                @endforeach
                            </ul>
                            <script>
                              $('.drpd').click(function(){
                                if($('.dropdown-item2').hasClass('dsnone')){
                                  $('.dropdown-item2').removeClass('dsnone');
                                }else{
                                  $('.dropdown-item2').addClass('dsnone');
                                }
                                
                              });
                            </script>
                            <style>
                              .dsnone{
                                display: none!important;
                              }
                            </style> </a>
              </li>


              

<!-- 
              <li class="dropdown2">
                            <a class="drpd">{{ LaravelLocalization::getCurrentLocaleName() }}</a>
                            <ul class="dropdown-item2 dsnone">
                                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode)
                                    <li style="hanging-punctuation: 1" >
                                        <a hreflang="{{ $localeCode['link'] }}"
                                           href="{{ LaravelLocalization::getLocalizedURL($localeCode['link'], null, [], true) }}">{{ $localeCode['native'] }}</a>
                                    </li>
                                @endforeach
                            </ul>
                            <script>
                              $('.drpd').click(function(){
                                if($('.dropdown-item2').hasClass('dsnone')){
                                  $('.dropdown-item2').removeClass('dsnone');
                                }else{
                                  $('.dropdown-item2').addClass('dsnone');
                                }
                                
                              });
                            </script>
                            <style>
                              .dsnone{
                                display: none!important;
                              }
                            </style> -->

            </ul>
          </div>
        </div>
      </nav>
    </header>
