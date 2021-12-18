@extends('layouts.app')
 
@section('content')

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

    

    @foreach($contact as $con)
    <!-- Page Content -->
    <div class="page-heading header-text" style=" background: url({{ asset('storage/' . $con->{'image'}) }})" >
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1>@lang('main.contact')</h1>
            <span>{!!$con->{'text_'.$locale}!!}</span>
          </div>
        </div>
      </div>
    </div>
    @endforeach

    <div class="contact-information">
      <div class="container">
        <div class="row">
          @foreach($location as $loc)
          <div class="col-md-4">
            <div class="contact-item">
              <i class="fa fa-phone"></i>
              <h4>{{ $loc->{'title_' .$locale}  }}</h4>
              <p>{!!$loc->{'text_' .$locale}!!}</p>
              <a href="#">090-080-0760</a>
            </div>
          </div>
          @endforeach


          <div class="col-md-4">
            <div class="contact-item">
              <i class="fa fa-envelope"></i>
              <h4>Email</h4>
              <p>Vivamus ut tellus mi. Nulla nec cursus elit, id vulputate nec cursus augue.</p>
              <a href="#">info@company.com</a>
            </div>
          </div>
          <div class="col-md-4">
            <div class="contact-item">
              <i class="fa fa-map-marker"></i>
              <h4>Location</h4>
              <p>1020 New Mountain Street<br>Forest Park, FP 11220</p>
              <a href="#">View on Google Maps</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="callback-form contact-us">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>@lang('main.send')</h2>
             
            </div>
          </div>
          <div class="col-md-12">
            <div class="contact-form">
            <form id="contact" action="{{ route('contact.send') }}" method="POST"  enctype="multipart/form-data">
                  
                  @csrf
                  <div class="col-12  d-flex flex-wrap justify-content-between">
                    <section class="cta-form cta-light col-12">
                        <form  id="cta-signup-form" class="cta-signup-form" action="{{ route('contact.send') }}" method="POST">
                           @csrf
                              <h2 class="text-center"></h2>
  <div class="father-inputs d-flex">
                    <div class="col-lg-4 col-sm-12"> 
                    <input class="form-control" style="width: 100%;" type="text" autocomplete="off" name="name"class="form-control input-lg" id="name" placeholder="Name*" required>
                  </div>
                  
                  
                  <div class="col-lg-4"><i class="fas fa-phone-square-alt"></i>
                    <input  style="border:1px solid rgba(235, 165, 165, 0.681); width: 100%;" class="form-control input-lg" id="phone" autocomplete="off" data-inputmask="'mask': '+\\9\\9\\8 (99) 999-99-99'"  type="phone" name="phone" required placeholder="Phone Number *">      
                  </div>
  
                            <div class="col-lg-4"> 
                    <input  style="border:1px solid rgba(235, 165, 165, 0.681); width: 100%;" type="text" autocomplete="off" name="subject"class="form-control input-lg" id="subject" placeholder="Your direction*" required>
                  </div>
  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <textarea  style="border:1px solid rgba(235, 165, 165, 0.681)" name="message" type="text" class="form-control" id="message" placeholder="YOUR MESSAGE..." required=""></textarea>
                    </fieldset>
                    </div>
  
                  <div class="form-btn">
                      <button value="Отправить" type="submit" class="button">Отправить</button>
                  </div>
                            </form>
                    </section>
                </div>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="map" id="map" style="position:relative;overflow:hidden; width: 100%; height: 400px"></div>
        <script>

            var placemarks = [
                    @foreach($shoowroom as $show)
                {
                    latitude: {{$show->map_lat}},
                    longitude: {{$show->map_lng}},
                    hintContent: '{{$show->address_ru }}',
                    balloonContent: '{{$show->phone }}',
                },
                     @endforeach
            ];

            ymaps.ready(init);
            function init(){
                var Map = new ymaps.Map("map", {
                        center: [41.316096, 69.263496],
                    zoom: 10,
                    controls: ['zoomControl', 'geolocationControl', 'routeEditor', 'fullscreenControl']
                });
                placemarks.forEach(function (obj) {
                    var placemark = new ymaps.Placemark([obj.latitude, obj.longitude], {
                            hintContent: obj.hintContent,
                            balloonContent: obj.balloonContent,
                        },
                        {
                            preset: 'islands#redIcon',
                        });
                    Map.geoObjects.add(placemark);
                });

            }
        </script>

    <div class="partners contact-partners">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="owl-partners owl-carousel">
              <div class="partner-item">
                <img src="assets/images/client-01.png" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    
    
    <div class="sub-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <p>Copyright &copy; 2020 Financial Business Co., Ltd.
            
            - Design: <a rel="nofollow noopener" href="https://templatemo.com" target="_blank">TemplateMo</a></p>
          </div>
        </div>
      </div>
    </div>

    @endsection