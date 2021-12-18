
@extends('layouts.app')
@section('main')
<!-- <script src="https://api-maps.yandex.ru/2.1/?apikey=563b2f5b-d161-4fd9-a856-d9492d0ba468&lang=ru_RU" type="text/javascript"></script> -->
@endsection
<div class="side-content-wrap">
    <div class="sidebar-left open rtl-ps-none" data-perfect-scrollbar="" data-suppress-scroll-x="true">
        <ul class="navigation-left">
            <li class="nav-item"><a class="nav-item-hold" href="{{ route('admin') }}"><i class="nav-icon fas fa-home"></i><span class="nav-text">Админ панель</span></a>
                <div class="triangle"></div>
            </li>

            <li class="nav-item"><a class="nav-item-hold" href="{{ route('start.index')}} "><i class="fas fa-hourglass-start"></i><span class="nav-text">Start</span></a>
                <div class="triangle"></div>
            </li>


            <li class="nav-item"><a class="nav-item-hold" href="{{ route('services.index')}} "><i class="fab fa-servicestack"></i><span class="nav-text">Services</span></a>
                <div class="triangle"></div>
            </li>


            <li class="nav-item"><a class="nav-item-hold" href="{{ route('growth.index')}} "><i class="fas fa-layer-group"></i><span class="nav-text">Growth</span></a>
                <div class="triangle"></div>
            </li>


            
            <li class="nav-item"><a class="nav-item-hold" href="{{ route('number.index')}} "><i class="fas fa-list-ol"></i><span class="nav-text">Number</span></a>
                <div class="triangle"></div>
            </li>

             
            <li class="nav-item"><a class="nav-item-hold" href="{{ route('company.index')}} "><i class="fas fa-building"></i></i><span class="nav-text">company </span></a>
                <div class="triangle"></div>
            </li>


               
            <li class="nav-item"><a class="nav-item-hold" href="{{ route('about.index')}} "><i class="fas fa-address-card"></i><span class="nav-text">about </span></a>
                <div class="triangle"></div>
            </li>

                 
            <li class="nav-item"><a class="nav-item-hold" href="{{ route('aboutus.index')}} "><i class="fas fa-address-book"></i><span class="nav-text">aboutUs </span></a>
                <div class="triangle"></div>
            </li>



                   
            <li class="nav-item"><a class="nav-item-hold" href="{{ route('aboutcompany.index')}} "><i class="fas fa-building"></i><span class="nav-text">aboutcompany </span></a>
                <div class="triangle"></div>
            </li>


            <li class="nav-item"><a class="nav-item-hold" href="{{ route('member.index')}} "><i class="fas fa-users"></i><span class="nav-text">member </span></a>
                <div class="triangle"></div>
            </li>




            
            <li class="nav-item"><a class="nav-item-hold" href="{{ route('market.index')}} "><i class="fas fa-users"></i><span class="nav-text">market </span></a>
                <div class="triangle"></div>
            </li>


           
            <li class="nav-item"><a class="nav-item-hold" href="{{ route('ourservices.index')}} "><i class="fas fa-users"></i><span class="nav-text">ourservices </span></a>
                <div class="triangle"></div>
            </li>


                
            <li class="nav-item"><a class="nav-item-hold" href="{{ route('contact.index')}} "><i class="fas fa-users"></i><span class="nav-text">contact </span></a>
                <div class="triangle"></div>
            </li>


                 
            <li class="nav-item"><a class="nav-item-hold" href="{{ route('location.index')}} "><i class="fas fa-users"></i><span class="nav-text">location </span></a>
                <div class="triangle"></div>
            </li>

            <li class="nav-item"><a class="nav-item-hold" href="{{ route('showroom.index')}} "><i class="fas fa-users"></i><span class="nav-text">showroom </span></a>
                <div class="triangle"></div>
            </li>


            <li class="nav-item"><a class="nav-item-hold" href="{{ route('analiz.index')}} "><i class="fas fa-users"></i><span class="nav-text">analiz </span></a>
                <div class="triangle"></div>
            </li>


          
            <li class="nav-item" data-item="settings"><a class="nav-item-hold" href="#"><i class="nav-icon fas fa-cog"></i><span class="nav-text">Остальные</span></a>
                <div class="triangle"></div>
            </li>
        </ul>
    </div>
    <div class="sidebar-left-secondary rtl-ps-none" data-perfect-scrollbar="" data-suppress-scroll-x="true">
        <ul class="childNav" data-parent="settings">
            <li class="nav-item"><a href=""><i class="nav-icon fas fa-image"></i><span class="item-name">Услуги</span></a></li>
            <li class="nav-item"><a href=""><i class="nav-icon fas fa-store"></i><span class="item-name">Отзывы</span></a></li>
            <li class="nav-item"><a href=""><i class="nav-icon fas fa-wrench"></i><span class="item-name">Настройка сайта</span></a></li>
        </ul>
    </div>
    <div class="sidebar-overlay"></div>
</div>
