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

    <!-- Header -->
    

    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="main-banner header-text" id="top">
        <div class="Modern-Slider">
          <!-- Item -->
          @foreach($start as $str)
          <div class="item item-1">
        
            <div class="img-fill" style=" background: url({{ asset('storage/' . $str->{'image'}) }})" >
              
                <div class="text-content">
                  <h6>{!!$str->{'title_1_'.$locale}!!}</h6>
                  <h4>{!!$str->{'title_2_'.$locale}!!}</h4>
                  <p>{!!$str->{ 'text_' . $locale }!!} </p>
                  <a class="filled-button">@lang('main.contact')</a>
                </div>
             
            </div>
          </div>
           @endforeach
          <!-- // Item -->
          <!-- Item -->
          
          <!-- // Item -->
          
          <!-- // Item -->
        </div>
    </div>
    <!-- Banner Ends Here -->

    <div class="request-form">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <h4>@lang('main.Request a call back right now?')</h4>
            
          </div>
          <div class="col-md-4">
            <a " class="border-button">@lang('main.contact')</a>
          </div>
        </div>
      </div>
    </div>

    <div class="services">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>@lang('main.Financial Services')</h2>
            
            </div>
          </div>
          @foreach($services as $ser)
          <div class="col-md-4">
            <div class="service-item">
              <img src="{{ asset('storage/' . $ser->image ) }}"style=" widht: 100px; height: 300px;" alt="">
              <div class="down-content">
                <h4>{!!$ser->{'title_'.$locale}!!}</h4>
                <p>{!!$ser->{ 'text_' . $locale }!!}</p>
                <a href="" class="filled-button">@lang('main.Read more')</a>
              </div>
            </div>
          </div>
          @endforeach
          
          
        </div>
      </div>
    </div>

    <div class="fun-facts">
      <div class="container">
        <div class="row">
          <div class="col-md-6">


            @foreach($growth as $growth)
            <div class="left-content">

              <span>{!!$growth->{'title_1_'.$locale}!!}</span>
              <h2>{!!$growth->{'title_2_'.$locale}!!}</h2>
              <p>{!!$growth->{'text_'.$locale}!!}</p>
              
              <a href="" class="filled-button">@lang('main.Read more')</a>
            </div>
@endforeach



          </div>
          <div class="col-md-6 align-self-center">
            <div class="row">
            @foreach($number as $number )
              <div class="col-md-6">
         
                <div class="count-area-content">
                  <div class="count-digit">{{ $number->number  }}</div>
                  <div class="count-title">{{ $number->{ 'title_'. $locale} }}</div>
                </div>
             
              </div>
                 @endforeach
             
              
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="more-info">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="more-info-content">
              <div class="row">
                <div class="col-md-6">
                  @foreach($company as $com)
                  <div class="left-image">
                    <img src="{{ asset('storage/' . $com->image ) }}" alt="">
                  </div>
                  @endforeach
                </div>
                <div class="col-md-6 align-self-center">
                  @foreach($company as $com)
                  <div class="right-content">
                    <span>{{ $com->{ 'title_1_'. $locale} }}</span>
                    <h2>{!!$com->{'title_2_'.$locale}!!}</h2>
                    <p>{!!$com->{'text_'.$locale}!!}</p>
                    <a href="#" class="filled-button">@lang('main.Read more')</a>
                  </div>
                  @endforeach

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="testimonials">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>@lang('main.What they say about us')</h2>
              <span></span>
            </div>
          </div>
          <div class="col-md-12">
            <div class="owl-testimonials owl-carousel">
              @foreach($about as $abt)
              <div class="testimonial-item">
                <div class="inner-content">
                  <h4>{{ $abt->name }}</h4>
                  <span>{{ $abt->profession }}</span>
                  <p>{!!$abt->{'text_'.$locale}!!}</p>
                </div>
                <img src="{{ asset('storage/' . $abt->image ) }}" alt="">
              </div>
              @endforeach
             
            
              
              
              
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="callback-form">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>@lang('main.Request a call back right now?')</h2>
              <span></span>
            </div>
          </div>
       
          <div class="col-md-12 ">
           <div class="contact-form col-12" >
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
                <img src="assets/images/client-01.png" title="1" alt="1">
              </div>
              
              <div class="partner-item">
                <img src="assets/images/client-01.png" title="2" alt="2">
              </div>
              
              <div class="partner-item">
                <img src="assets/images/client-01.png" title="3" alt="3">
              </div>
              
              <div class="partner-item">
                <img src="assets/images/client-01.png" title="4" alt="4">
              </div>
              
              <div class="partner-item">
                <img src="assets/images/client-01.png" title="5" alt="5">
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
          
            
          
          </div>
        </div>
      </div>
    </div>

    
    @endsection
  

    <div class="simple-translate-panel " style="width: px;height: 0px;top: 0px;left: 0px;font-size: 13px;background-color: rgb(247 247 247);">
<div class="simple-translate-result-wrapper" style="overflow: hidden;">
<div class="simple-translate-move" draggable="true">&nbsp;</div>

<div class="simple-translate-result-contents">
<p class="simple-translate-result" dir="auto" style="color: rgb(0, 0, 0);">&nbsp;</p>

<p class="simple-translate-candidate" dir="auto" style="color: rgb(115, 115, 115);">&nbsp;</p>
</div>
</div>
</div>
