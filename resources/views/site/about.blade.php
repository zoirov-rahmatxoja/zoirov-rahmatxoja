@extends('layouts.app')

    @section('content')
    <!-- Page Content -->

    @foreach($aboutus as $abt)
    <div class="page-heading header-text"style=" background: url({{ asset('storage/' . $abt->{'image'}) }})">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1>@lang('main.about_us')</h1>
            <span>{!!$abt->{'text_'.$locale}!!}</span>
          </div>
        </div>
      </div>
    </div>
    
    @endforeach



    <div class="more-info about-info">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="more-info-content">



            @foreach ($aboutcompany as $abcom)
              <div class="row">
                <div class="col-md-6 align-self-center">
                  <div class="right-content">
                    <span>{{ $abcom->{ 'title_1_'. $locale} }}</span>
                    <h2>{!!$abcom->{'title_2_'.$locale}!!}</h2>
                    <p>{!!$abcom->{'text_'.$locale}!!}</p>
                    <a href="" class="filled-button">@lang('main.Read more')</a>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="left-image">
                    <img src="{{ asset('storage/' . $abcom->image ) }}" alt="">
                  </div>
                </div>
              </div>
            @endforeach
            




            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="team">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>@lang('main.Our team members')</h2>
            
            </div>
          </div>
          @foreach($member as $mem)

          <div class="col-md-4">
            <div class="team-item">
              <img src="{{ asset('storage/' . $mem->image ) }}" alt="">
              <div class="down-content">
                <h4>{{ $mem->name }}</h4>
                <span>{{ $mem->profession }}</span>
                <p>{!!$mem->{'text_'.$locale}!!}</p>
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