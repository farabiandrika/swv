<!--=======================Javascript============================-->
    
    <!--=== jQuery Modernizr Min Js ===-->
    <script src="{{ asset('customer/assets/js/modernizr.js') }}"></script>
    <!--=== jQuery Min Js ===-->
    <script src="{{ asset('customer/assets/js/jquery-main.js') }}"></script>
    <!--=== jQuery Migration Min Js ===-->
    <script src="{{ asset('customer/assets/js/jquery-migrate.js') }}"></script>
    <!--=== jQuery Popper Min Js ===-->
    <script src="{{ asset('customer/assets/js/popper.min.js') }}"></script>
    <!--=== jQuery Bootstrap Min Js ===-->
    <script src="{{ asset('customer/assets/js/bootstrap.min.js') }}"></script>
    <!--=== jQuery Headroom Min Js ===-->
    <script src="{{ asset('customer/assets/js/headroom.min.js') }}"></script>
    <!--=== jQuery Swiper Min Js ===-->
    <script src="{{ asset('customer/assets/js/swiper.min.js') }}"></script>
    <!--=== jQuery Fancybox Min Js ===-->
    <script src="{{ asset('customer/assets/js/fancybox.min.js') }}"></script>
    <!--=== jQuery Slick Nav Js ===-->
    <script src="{{ asset('customer/assets/js/slicknav.js') }}"></script>
    <!--=== jQuery Countdown Js ===-->
    <script src="{{ asset('customer/assets/js/countdown.js') }}"></script>
    
    <!--=== jQuery Custom Js ===-->
    <script src="{{ asset('customer/assets/js/custom.js') }}"></script>

    <script>
        $(document).ready(function() {
            // $('.date').datepicker({});
            $('.disabled').keypress(function(e) {
                return false
            });

            $('.noSpace').keydown(function(event) {
                if (event.keyCode == '32') {
                    event.preventDefault();
                }
            });

            $('.number').keypress(function (e){
                var charCode = (e.which) ? e.which : e.keyCode;
                if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                    return false;
                }
            });
        })
    </script>
    @yield('js')