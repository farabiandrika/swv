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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
    <script src="{{ asset('admins/assets/plugins/sweetalert/sweetalert.min.js') }}"></script>
    @include('sweetalert::alert')
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


        $(document).on('click', '.deleteCart', function(e) {
            e.preventDefault()
            let id = $(this).data("id")
            console.log(id)
        
        swal({
                title: "Are you sure?",
                text: "You will not be able to recover this cart!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel plx!",
                closeOnConfirm: false,
                closeOnCancel: false
            }, function(isConfirm){
                if (isConfirm) {
                    $.ajax({
                            url: "{{ url('/api/cart') }}" + "/" + id,
                            type: 'DELETE',
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            error: function(xhr, status, error) {
                                for (variable in xhr.responseJSON.data) {
                                    toastr.error(xhr.responseJSON.data[variable])
                                }
                            },                          
                            success: function (response){
                                console.log(response)
                            }
                        });
                        location.reload();
                    swal.close()
                } else {
                    swal.close()
                }
            });
        })
    </script>
    @yield('js')