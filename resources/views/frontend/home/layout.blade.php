<!DOCTYPE html>
<html lang="en">

<head>
    {{-- head  --}}
    @include('frontend.home.components.head')
    @stack('styles')
</head>
<body id="nature-cycle-theme" class="template-index">
    <div class="main-body layoutProduct_scroll">
        @include('frontend.home.components.header')
        @yield('content')
        @include('frontend.home.components.footer')
    </div>
    
</body>
<!-- end footer  -->
@yield('js')
@include('frontend.home.components.script')

</html>
