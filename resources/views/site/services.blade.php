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

    
 

    <!-- Page Content -->



    @foreach($ourservices as $ser)
    <div class="page-heading header-text"style=" background: url({{ asset('storage/' . $ser->{'image'}) }})">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1>@lang('main.services')</h1>
            <span>{!!$ser->{'text_'.$locale}!!}</span>
          </div>
        </div>
      </div>
    </div>
    @endforeach




    <div class="single-services">
      <div class="container">
        <div class="row" id="tabs">
          <div class="col-md-4">
            <ul>
          @foreach($analiz as $anali)
              <li><a href='#tabs-{{ $anali->id}}'>{!! $anali->title_ru !!} <i class="fa fa-angle-right"></i></a></li>
          @endforeach

            </ul>
          </div>
          <div class="col-md-8">
            <section class='tabs-content'>
          @foreach($analiz as $anali)
              <article id='tabs-{{ $anali->id}}'>
                <img src="assets/images/single_service_01.jpg" alt="">
                <h4>{!! $anali->title_ru !!}</h4>
                <p>{!! $anali->title_ru !!}</p>
              </article>
              @endforeach
            </section>
          </div>
        </div>
      </div>
</di>

    <div class="callback-form callback-services">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>@lang('main.Request a call back right now?')</h2>
             
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

    <div class="partners">
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

 