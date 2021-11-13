<script src="{{ asset('admins/assets/bundles/libscripts.bundle.js') }}"></script> <!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) -->
<script src="{{ asset('admins/assets/bundles/vendorscripts.bundle.js') }}"></script> <!-- slimscroll, waves Scripts Plugin Js -->

{{-- <script src="{{ asset('admins/assets/bundles/knob.bundle.js') }}"></script> <!-- Jquery Knob--> --}}
{{-- <script src="{{ asset('admins/assets/bundles/jvectormap.bundle.js') }}"></script> <!-- JVectorMap Plugin Js --> --}}
<script src="{{ asset('admins/assets/bundles/morrisscripts.bundle.js') }}"></script> <!-- Morris Plugin Js --> 
<script src="{{ asset('admins/assets/bundles/sparkline.bundle.js') }}"></script> <!-- sparkline Plugin Js --> 
{{-- <script src="{{ asset('admins/assets/bundles/doughnut.bundle.js') }}"></script> --}}

<script src="{{ asset('admins/assets/bundles/mainscripts.bundle.js') }}"></script>
<script src="{{ asset('admins/assets/js/pages/index.js') }}"></script>
<script src="{{ asset('admins/assets/plugins/sweetalert/sweetalert.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
<!-- Jquery DataTable Plugin Js --> 
<script src="{{ asset('admins/assets/bundles/datatablescripts.bundle.js') }}"></script>
<script src="{{ asset('admins/assets/plugins/jquery-datatable/buttons/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('admins/assets/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admins/assets/plugins/jquery-datatable/buttons/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('admins/assets/plugins/jquery-datatable/buttons/buttons.html5.min.js') }}"></script>
<script src="{{ asset('admins/assets/plugins/jquery-datatable/buttons/buttons.print.min.js') }}"></script>
<script src="{{ asset('admins/assets/js/pages/tables/jquery-datatable.js') }}"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.min.css" integrity="sha512-+0Vhbu8sRUlg+R/NKgTv7ahM+szPDF10G6J5PcHb1tOrAaquZIUiKUV3TH16mi6fuH4NjvHqlok6ppBhR6Nxuw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
        $('.add').click(function () {
            $(this).prev().val(+$(this).prev().val() + 1);
        });
        $('.sub').click(function () {
            if ($(this).next().val() > 1) {
                if ($(this).next().val() > 1) $(this).next().val(+$(this).next().val() - 1);
            }
        });
        $(".number").keypress(function (e){
            var charCode = (e.which) ? e.which : e.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
        });

    })
    function nospaces(t){
        if(t.value.match(/\s/g)){
            t.value=t.value.replace(/\s/g,'');
        }
    }
    $('.disabled').keypress(function(e) {
    e.preventDefault();
});
</script>

@yield('js')