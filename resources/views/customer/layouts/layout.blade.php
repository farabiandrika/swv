<!DOCTYPE html>
<html lang="en">
    @include('customer.layouts.head')
<body>

    <!--wrapper start-->
    <div class="wrapper">
    
      <!--== Start Preloader Content ==-->
      <div class="preloader-wrap">
        <div class="preloader">
          <span class="dot"></span>
          <div class="dots">
            <span></span>
            <span></span>
            <span></span>
          </div>
        </div>
      </div>
      <!--== End Preloader Content ==-->
    
      <!--== Start Header Wrapper ==-->
      @include('customer.layouts.header')
      <!--== End Header Wrapper ==-->
      
      <main class="main-content">
        @yield('content')
      </main>
    
      <!--== Start Footer Area Wrapper ==-->
      @include('customer.layouts.footer')
      <!--== End Footer Area Wrapper ==-->
    
      <!--== Scroll Top Button ==-->
      <div id="scroll-to-top" class="scroll-to-top"><span class="fa fa-angle-double-up"></span></div>
    
      <!--== Start Side Menu ==-->
      @include('customer.layouts.sidebar')
      <!--== End Side Menu ==-->
    </div>
    
    @include('customer.layouts.js')
    </body>
</html>