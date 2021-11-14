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
              <li><a href="{{ url('/product') }}">Product</a></li>
              <li class="breadcrumb-sep">/</li>
              <li>Product Details</li>
            </ul>
          </nav>
          <h4 class="title">Product Details</h4>
        </div>
      </div>
    </div>
  </div>
</div>
<!--== End Page Header Area Wrapper ==-->

<!--== Start Product Single Area Wrapper ==-->
<section class="product-area product-single-area mb-5">
  <div class="container pt-60 pb-0">
    <div class="row">
      <div class="col-12">
        <div class="product-single-item" data-margin-bottom="63">
          <div class="row">
            <div class="col-lg-6">
              <!--== Start Product Thumbnail Area ==-->
              <div class="product-thumb">
                <div class="swiper-container single-product-thumb-slider">
                  <div class="swiper-wrapper">
                    @foreach ($product->images as $image)
                    <div class="swiper-slide">
                      <div class="zoom zoom-hover">
                        <a class="lightbox-image" data-fancybox="gallery" href="{{ asset('images/'.$image->name) }}">
                          <img src="{{ asset('images/'.$image->name) }}">
                        </a>
                      </div>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>
              <!--== End Product Thumbnail Area ==-->

              <!--== Start Product Nav Area ==-->
              <div class="swiper-container single-product-nav-slider product-nav">
                <div class="swiper-wrapper">
                  @foreach ($product->images as $image)
                  <div class="swiper-slide">
                    <img src="{{ asset('images/'.$image->name) }}">
                  </div>
                  @endforeach
                </div>

                <!--== Add Swiper navigation Buttons ==-->
                <div class="swiper-button-prev"><i class="ei ei-icon_arrow_carrot-left"></i></div>
                <div class="swiper-button-next"><i class="ei ei-icon_arrow_carrot-right"></i></div>
              </div>
              <!--== End Product Nav Area ==-->
            </div>
            <div class="col-lg-6">
              <!--== Start Product Info Area ==-->
              <div class="product-single-info">
                <h4 class="title">{{ $product->name }}</h4>
                <div class="prices">
                  <span class="price">Rp. {{ number_format($product->price,0,',','.') }}</span>
                </div>
                <div class="rating-box-wrap">
                  {{-- <div class="rating-box">
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>
                  </div>
                  <div class="review-status">
                    <a href="javascript:void(0)">( 1 Customer Review )</a>
                  </div> --}}
                </div>
                <p>{{ $product->description }}</p>
                <form action="{{ route('cart.store') }}" method="POST">
                  @csrf
                  <input type="hidden" name="id" value="{{ $product->id }}">
                <div class="product-select-action">
                  <div class="select-item">
                    <label for="productSizeSelect">Size</label>
                    <input class="form-select" disabled value="{{ $product->size }}" id="productSizeSelect" aria-label="Size select example"/>
                  </div>
                  <div class="select-item">
                    <label for="productKeterangan">Keterangan</label>
                    <input class="form-select" name="keterangan" required id="productKeterangan"/>
                  </div>
                </div>
                <div class="product-action-simple">
                  <div class="product-quick-action">
                    <div class="product-quick-qty">
                      <div class="pro-qty">
                        <input type="text" name="quantity" required class="disabled" data-limit="{{ $product->stock }}" id="quantity" title="Quantity" value="1">
                      </div>
                    </div>
                    @if (!(Auth::check() && auth()->user()->role_id != 3))
                      <button type="submit" class="btn-product-add">Add to cart</button>
                    @endif
                  </div>
                </form>
                  <div class="social-sharing">
                    <span>Share:</span>
                    <div class="social-icons">
                      <a href="#/"><i class="fa fa-facebook"></i></a>
                      <a href="#/"><i class="fa fa-twitter"></i></a>
                      <a href="#/"><i class="fa fa-pinterest"></i></a>
                      <a href="#/"><i class="fa fa-google-plus"></i></a>
                    </div>
                  </div>
                </div>
              </div>
              <!--== End Product Info Area ==-->
            </div>
          </div>
        </div>
      </div>
    </div>
    {{-- <div class="row">
      <div class="col-12">
        <div class="product-review-tabs-content">
          <ul class="nav product-tab-nav" id="ReviewTab" role="tablist">
            <li role="presentation">
              <a class="active" id="description-tab" data-bs-toggle="pill" href="#description" role="tab" aria-controls="description" aria-selected="true">Description</a>
            </li>
          </ul>
          <div class="tab-content product-tab-content" id="ReviewTabContent">
            <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
              <div class="product-description">
                <p>{{ $product->description }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> --}}
  </div>
</section>
<!--== End Product Single Area Wrapper ==-->
@endsection

@section('js')
<script>
</script>
@endsection