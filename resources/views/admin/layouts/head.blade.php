<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="description" content="Sistem penentuan jadwal project menggunakan CPM Method">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<title>@yield('title')</title>
<link rel="icon" href="favicon.ico" type="image/x-icon"> <!-- Favicon-->
<link rel="stylesheet" href="{{ asset('admins/assets/plugins/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('admins/assets/plugins/sweetalert/sweetalert.css') }}"/>
<link rel="stylesheet" href="{{ asset('admins/assets/plugins/morrisjs/morris.css') }}" />
{{-- <link rel="stylesheet" href="{{ asset('admins/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css') }}"/> --}}
<!-- Custom Css -->
<link rel="stylesheet" href="{{ asset('admins/assets/css/main.css') }}">
<link rel="stylesheet" href="{{ asset('admins/assets/css/color_skins.css') }}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">

@yield('css')