@extends('customer.layouts.layout')

@section('title')
{{ config('company.configs') !== null ? config('company.configs')->name : '' }}
@endsection

@section('content')
<!--== Start Hero Area Wrapper ==-->
<section class="home-slider-area">
    <div class="swiper-container swiper-slide-gap home-slider-container default-slider-container">
      <div class="swiper-wrapper home-slider-wrapper slider-default">
        <div class="swiper-slide">
          <div class="slider-content-area" data-bg-img="{{ asset('customer/assets/img/slider/slider-01.jpg') }}">
            <div class="slider-content">
              <h5 class="sub-title">BEST PRICE : $866</h5>
              <h2 class="title">NEW ARRIVAL</h2>
              <h4>70% OFF THIS WINTER</h4>
              <p>There are many variations of passages of Lorem Ipsum availables, but the majority have suffered alteration in some form.</p>
              <a class="btn-slider" href="shop.html">Shop Now</a>
            </div>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="slider-content-area" data-bg-img="{{ asset('customer/assets/img/slider/slider-02.jpg') }}">
            <div class="slider-content">
              <h5 class="sub-title">BEST PRICE : $866</h5>
              <h2 class="title">NEW ARRIVAL</h2>
              <h4>70% OFF THIS WINTER</h4>
              <p>There are many variations of passages of Lorem Ipsum availables, but the majority have suffered alteration in some form.</p>
              <a class="btn-slider" href="shop.html">Shop Now</a>
            </div>
          </div>
        </div>
      </div>

      <!--== Add Swiper Arrows ==-->
      <div class="swiper-button-next"><i class="ion-ios7-arrow-right"></i></div>
      <div class="swiper-button-prev"><i class="ion-ios7-arrow-left"></i></div>
    </div>
  </section>
  <!--== End Hero Area Wrapper ==-->

  <!--== Start Feature Area Wrapper ==-->
  <section class="feature-area">
    <div class="container pb-1">
      <div class="row">
        <div class="col-md-6 col-lg-4">
          <!--== Start Feature Item ==-->
          <div class="feature-icon-box">
            <div class="inner-content">
              <div class="icon-box">
                <i class="icon ei ei-icon_pin_alt"></i>
              </div>
              <div class="content">
                <h5 class="title">Free shipping Pekanbaru, Riau</h5>
                <p>Freeship over oder 100K</p>
              </div>
            </div>
          </div>
          <!--== End Feature Item ==-->
        </div>
        <div class="col-md-6 col-lg-4">
          <!--== Start Feature Item ==-->
          <div class="feature-icon-box">
            <div class="inner-content">
              <div class="icon-box">
                <i class="icon ei ei-icon_headphones"></i>
              </div>
              <div class="content">
                <h5 class="title">Support 24/7</h5>
                <p>Contact us 24 hours a day</p>
              </div>
            </div>
          </div>
          <!--== End Feature Item ==-->
        </div>
        <div class="col-md-6 col-lg-4">
          <!--== Start Feature Item ==-->
          <div class="feature-icon-box">
            <div class="inner-content mb-0">
              <div class="icon-box">
                <i class="icon ei ei-icon_creditcard"></i>
              </div>
              <div class="content">
                <h5 class="title">100% Trusted</h5>
                <p>Our store is trusted quality & services.</p>
              </div>
            </div>
          </div>
          <!--== End Feature Item ==-->
        </div>
      </div>
    </div>
  </section>
  <!--== End Feature Area Wrapper ==-->

  <!--== Start Product Area Wrapper ==-->
  <section class="product-area">
    <div class="container product-pb" data-padding-bottom="28">
      <div class="row">
        <div class="col-12">
          <div class="product-category-tab-wrap">
            <ul class="nav nav-tabs product-category-nav justify-content-center" id="myTab" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button" role="tab" aria-controls="all" aria-selected="true"><h3>Our Product</h3></button>
              </li>
            </ul>
            <div class="tab-content product-category-content" id="myTabContent">
              <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                <div class="row">
                  <div class="col-12">
                    <div class="swiper-container swiper-slide-gap product-slider-container">
                      <div class="swiper-wrapper">
                        @foreach ($products as $key => $product)
                          @if ($key % 2 == 0)
                          <div class="swiper-slide">
                          @endif
                          <!--== Start Shop Item ==-->
                          <div class="product-item" style="width:200px;">
                            <div class="inner-content">
                              <div class="product-thumb">
                                <a href="{{ url('detail/'.$product->slug) }}">
                                  <img class="w-100" src="{{ asset('images/'.$product->images->random()->name) }}">
                                </a>
                                {{-- <span class="sale-title sticker">Sale</span>
                                <span class="percent-count sticker">-18%</span> --}}
                                <div class="product-action">
                                  <div class="addto-wrap">
                                    {{-- <a class="add-cart" href="cart.html">
                                      <i class="zmdi zmdi-shopping-cart-plus icon"></i>
                                    </a> --}}
                                    {{-- <a class="add-wishlist" href="wishlist.html">
                                      <i class="zmdi zmdi-favorite-outline zmdi-hc-fw icon"></i>
                                    </a> --}}
                                    <a class="add-quick-view" data-id="{{ $product->id }}" href="javascript:void(0);">
                                      <i class="zmdi zmdi-search icon"></i>
                                    </a>
                                  </div>
                                </div>
                              </div>
                              <div class="product-desc">
                                <div class="product-info">
                                  <h4 class="title"><a href="{{ url('detail/'.$product->slug) }}">{{ $product->name }}</a></h4>
                                  <div class="prices">
                                    <span class="price">Rp. {{ number_format($product->price,0,',','.') }}</span>
                                    {{-- <span class="price-old">$85.00</span> --}}
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!--== End Shop Item ==-->
                        </div>
                          @if ($key % 2 == 0)
                        </div>
                          @endif
                        @endforeach
                      </div>

                      <!--== Add Swiper navigation Buttons ==-->
                      <div class="swiper-button-prev"><i class="ei ei-icon_arrow_carrot-left"></i></div>
                      <div class="swiper-button-next"><i class="ei ei-icon_arrow_carrot-right"></i></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--== End Product Area Wrapper ==-->


  @foreach ($products as $key => $product)
  <!--== Start Quick View Menu ==-->
  <aside class="product-quick-view-modal" data-stock={{ $product->stock }} id="qv-{{ $product->id }}">
    <div class="product-quick-view-inner">
      <div class="product-quick-view-content">
        <button type="button" class="btn-close">
          <span class="close-icon"><i class="fa fa-close"></i></span>
        </button>
        <div class="row">
          <div class="col-lg-6 col-md-6 col-12">
            <div class="thumb">
              <img src="{{ asset('images/'.$product->images->random()->name) }}">
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-12">
            <div class="content">
              <h4 class="title">{{ $product->name }}</h4>
              <div class="prices">
                {{-- <del class="price-old">$85.00</del> --}}
                <span class="price">Rp. {{ number_format($product->price,0,',','.') }}</span>
              </div>
              <p>{{ $product->description }}</p>
              <div class="quick-view-select">
                <div class="quick-view-select-item">
                  <label for="forSizes" class="form-label">Size:</label>
                  <input type="text" disabled value="{{ $product->size }}" id="" class="form-control">
                </div>
                <div class="quick-view-select-item">
                  <label for="forKeterangan" class="form-label">Keterangan:</label>
                  <input type="text" name="keterangan" id="keterangan" class="form-control">
                </div>
              </div>
              <div class="action-top">
                <div class="pro-qty" id="proqty-qv-{{ $product->id }}" data-limit="{{ $product->stock }}">
                  <input type="text" id="quantity4" title="Quantity" value="1" />
                </div>
                <button class="btn btn-black">Add to cart</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="canvas-overlay"></div>
  </aside>
  <!--== End Quick View Menu ==-->
  @endforeach
@endsection