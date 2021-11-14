@extends('customer.layouts.layout')

@section('title')
{{ config('company.configs') !== null ? config('company.configs')->name : '' }}
@endsection

@section('content')
<!--== Start Page Header Area Wrapper ==-->
<div class="page-header-area">
    <div class="container">
      <div class="row">
        <div class="col-12 text-center">
          <div class="page-header-content">
            <nav class="breadcrumb-area">
              <ul class="breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-sep">/</li>
                <li>Products</li>
              </ul>
            </nav>
            <h4 class="title">Products</h4>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--== End Page Header Area Wrapper ==-->

  <!--== Start Product Area Wrapper ==-->
  <section class="product-area product-inner-area">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="product-body-wrap">
            <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade show active" id="nav-grid" role="tabpanel" aria-labelledby="nav-grid-tab">
                <div class="row">
                    @foreach ($products as $product)    
                    <div class="col-sm-6 col-lg-4 col-xl-3">
                      <!--== Start Shop Item ==-->
                      <div class="product-item">
                        <div class="inner-content">
                          <div class="product-thumb">
                            <a href="{{ url('detail/'.$product->slug) }}">
                              <img class="w-100" src="{{ asset('images/'.$product->images->random()->name) }}">
                            </a>
                            {{-- <span class="sale-title sticker">Sale</span>
                            <span class="percent-count sticker">-15%</span> --}}
                          </div>
                          <div class="product-desc">
                            <div class="product-info">
                              <h4 class="title"><a href="{{ url('/') }}"> {{ $product->name }}</a></h4>
                              <div class="prices">
                                <span class="price">Rp. {{ number_format($product->price,0,',','.') }}</span>
                                <span style="font-size: 10px; color:red;">({{ $product->stock }} pcs Left)</span>
                                {{-- <span class="price-old">$130.00</span> --}}
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!--== End Shop Item ==-->
                    </div>
                    @endforeach
                </div>
                <!--== Start Pagination Wrap ==-->
                <div class="row">
                  <div class="col-12">
                    <div class="pagination-content-wrap border-top">
                      <nav class="pagination-nav">
                        <ul class="pagination justify-content-center">
                            @if ($prevPage >= 1)
                            <li><a href="{{ url('/product?page='.$prevPage) }}">Prev</a></li>
                            @endif
                            @for ($i = 1; $i <= $totalPage; $i++) 
                            <li><a class="{{ $currentPage == $i ? "disabled active" : "" }}" href="{{ url('/product?page='.$i) }}">{{ $i }}</a></li>
                            @endfor 
                            @if ($currentPage < $totalPage)
                            <li><a class="next" href="{{ url('/product?page='.$nextPage) }}">Next</a></li>
                            @endif
                        </ul>
                      </nav>
                    </div>
                  </div>
                </div>
                <!--== End Pagination Wrap ==-->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--== End Product Area Wrapper ==-->
@endsection

@section('js')
{{ $currentPage }}
@endsection