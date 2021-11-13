@extends('admin.layouts.main')

@section('dashboard-nav', 'active open')

@section('title', 'Dashboard')

@section('content')
<div class="row clearfix">
    <div class="col-lg-3 col-md-6">
        <div class="card text-center">
            <div class="body">
                <p class="m-b-20"><i class="zmdi zmdi-balance zmdi-hc-3x col-amber"></i></p>
                <span>Total Product</span>
                <h3 class="m-b-10"><span class="number count-to" data-from="0" data-to="{{ $total_products }}" data-speed="2000" data-fresh-interval="700">2078</span></h3>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card text-center">
            <div class="body">
                <p class="m-b-20"><i class="zmdi zmdi-assignment zmdi-hc-3x col-blue"></i></p>
                <span>Total Orders</span>
                <h3 class="m-b-10 number count-to" data-from="0" data-to="{{ $total_orders }}" data-speed="2000" data-fresh-interval="700">865</h3>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card text-center">
            <div class="body">
                <p class="m-b-20"><i class="zmdi zmdi-shopping-basket zmdi-hc-3x"></i></p>
                <span>Total Sales</span>
                <h3 class="m-b-10 number count-to" data-from="0" data-to="{{ $total_sales }}" data-speed="2000" data-fresh-interval="700">3502</h3>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card text-center">
            <div class="body">
                <p class="m-b-20"><i class="zmdi zmdi-account-box zmdi-hc-3x col-green"></i></p>
                <span>Total Employees</span>
                <h3 class="m-b-10 number count-to" data-from="0" data-to="{{ $total_customers }}" data-speed="2000" data-fresh-interval="700">78</h3>
            </div>
        </div>
    </div>
</div>    
@endsection