<!DOCTYPE html>
<html lang="en">
@include('site.classes.head')
<body>
    
@include('site.classes.header')
@yield('content')
    @include('site.classes.script')

    @include('site.classes.footer')

    @include('sweetalert::alert')

</body>