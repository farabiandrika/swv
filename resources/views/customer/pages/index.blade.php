@extends('customer.layouts.layout')

@section('title')
    Smile With Vegas
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
                <h5 class="title">Free shipping worldwide</h5>
                <p>Freeship over oder $100</p>
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
                <h5 class="title">100% secure payment</h5>
                <p>Your payment are safe with us.</p>
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
                <button class="nav-link active" id="best-seller-tab" data-bs-toggle="tab" data-bs-target="#bestSeller" type="button" role="tab" aria-controls="bestSeller" aria-selected="true">Best Seller</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="most-view-tab" data-bs-toggle="tab" data-bs-target="#mostView" type="button" role="tab" aria-controls="mostView" aria-selected="false">Most view</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="new-arrivals-tab" data-bs-toggle="tab" data-bs-target="#newArrivals" type="button" role="tab" aria-controls="newArrivals" aria-selected="false">New Arrivals</button>
              </li>
            </ul>
            <div class="tab-content product-category-content" id="myTabContent">
              <div class="tab-pane fade show active" id="bestSeller" role="tabpanel" aria-labelledby="best-seller-tab">
                <div class="row">
                  <div class="col-12">
                    <div class="swiper-container swiper-slide-gap product-slider-container">
                      <div class="swiper-wrapper">
                        <div class="swiper-slide">
                          <!--== Start Shop Item ==-->
                          <div class="product-item">
                            <div class="inner-content">
                              <div class="product-thumb">
                                <a href="single-product-simple.html">
                                  <img class="w-100" src="{{ asset('customer/assets/img/shop/1.jpg') }}" alt="Image-HasTech">
                                </a>
                                <span class="sale-title sticker">Sale</span>
                                <span class="percent-count sticker">-18%</span>
                                <div class="product-action">
                                  <div class="addto-wrap">
                                    <a class="add-cart" href="cart.html">
                                      <i class="zmdi zmdi-shopping-cart-plus icon"></i>
                                    </a>
                                    <a class="add-wishlist" href="wishlist.html">
                                      <i class="zmdi zmdi-favorite-outline zmdi-hc-fw icon"></i>
                                    </a>
                                    <a class="add-quick-view" href="javascript:void(0);">
                                      <i class="zmdi zmdi-search icon"></i>
                                    </a>
                                  </div>
                                </div>
                              </div>
                              <div class="product-desc">
                                <div class="product-info">
                                  <h4 class="title"><a href="single-product-simple.html">Meta Slevless Dress</a></h4>
                                  <div class="star-content">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                  </div>
                                  <div class="prices">
                                    <span class="price">$40.00</span>
                                    <span class="price-old">$85.00</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!--== End Shop Item ==-->

                          <!--== Start Shop Item ==-->
                          <div class="product-item">
                            <div class="inner-content">
                              <div class="product-thumb">
                                <a href="single-product-simple.html">
                                  <img class="w-100" src="{{ asset('customer/assets/img/shop/2.jpg') }}" alt="Image-HasTech">
                                </a>
                                <span class="sale-title sticker">Sale</span>
                                <span class="percent-count sticker">-15%</span>
                                <div class="product-action">
                                  <div class="addto-wrap">
                                    <a class="add-cart" href="cart.html">
                                      <i class="zmdi zmdi-shopping-cart-plus icon"></i>
                                    </a>
                                    <a class="add-wishlist" href="wishlist.html">
                                      <i class="zmdi zmdi-favorite-outline zmdi-hc-fw icon"></i>
                                    </a>
                                    <a class="add-quick-view" href="javascript:void(0);">
                                      <i class="zmdi zmdi-search icon"></i>
                                    </a>
                                  </div>
                                </div>
                              </div>
                              <div class="product-desc">
                                <div class="product-info">
                                  <h4 class="title"><a href="single-product-simple.html"> Ruffled neck blouse</a></h4>
                                  <div class="star-content">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-o"></i>
                                  </div>
                                  <div class="prices">
                                    <span class="price">$110.00</span>
                                    <span class="price-old">$130.00</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!--== End Shop Item ==-->
                        </div>
                        <div class="swiper-slide">
                          <!--== Start Shop Item ==-->
                          <div class="product-item">
                            <div class="inner-content">
                              <div class="product-thumb">
                                <a href="single-product-simple.html">
                                  <img class="w-100" src="{{ asset('customer/assets/img/shop/3.jpg') }}" alt="Image-HasTech">
                                </a>
                                <span class="sale-title sticker">Sale</span>
                                <span class="percent-count sticker">-27%</span>
                                <div class="product-action">
                                  <div class="addto-wrap">
                                    <a class="add-cart" href="cart.html">
                                      <i class="zmdi zmdi-shopping-cart-plus icon"></i>
                                    </a>
                                    <a class="add-wishlist" href="wishlist.html">
                                      <i class="zmdi zmdi-favorite-outline zmdi-hc-fw icon"></i>
                                    </a>
                                    <a class="add-quick-view" href="javascript:void(0);">
                                      <i class="zmdi zmdi-search icon"></i>
                                    </a>
                                  </div>
                                </div>
                              </div>
                              <div class="product-desc">
                                <div class="product-info">
                                  <h4 class="title"><a href="single-product-simple.html">Style Modern Dress</a></h4>
                                  <div class="star-content">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                  </div>
                                  <div class="prices">
                                    <span class="price">$55.00</span>
                                    <span class="price-old">$75.00</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!--== End Shop Item ==-->

                          <!--== Start Shop Item ==-->
                          <div class="product-item">
                            <div class="inner-content">
                              <div class="product-thumb">
                                <a href="single-product-simple.html">
                                  <img class="w-100" src="{{ asset('customer/assets/img/shop/4.jpg') }}" alt="Image-HasTech">
                                </a>
                                <div class="product-action">
                                  <div class="addto-wrap">
                                    <a class="add-cart" href="cart.html">
                                      <i class="zmdi zmdi-shopping-cart-plus icon"></i>
                                    </a>
                                    <a class="add-wishlist" href="wishlist.html">
                                      <i class="zmdi zmdi-favorite-outline zmdi-hc-fw icon"></i>
                                    </a>
                                    <a class="add-quick-view" href="javascript:void(0);">
                                      <i class="zmdi zmdi-search icon"></i>
                                    </a>
                                  </div>
                                </div>
                              </div>
                              <div class="product-desc">
                                <div class="product-info">
                                  <h4 class="title"><a href="single-product-simple.html">Black Dress Shirt</a></h4>
                                  <div class="star-content">
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                  </div>
                                  <div class="prices">
                                    <span class="price">$79.00</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!--== End Shop Item ==-->
                        </div>
                        <div class="swiper-slide">
                          <!--== Start Shop Item ==-->
                          <div class="product-item">
                            <div class="inner-content">
                              <div class="product-thumb">
                                <a href="single-product-simple.html">
                                  <img class="w-100" src="{{ asset('customer/assets/img/shop/5.jpg') }}" alt="Image-HasTech">
                                </a>
                                <div class="product-action">
                                  <div class="addto-wrap">
                                    <a class="add-cart" href="cart.html">
                                      <i class="zmdi zmdi-shopping-cart-plus icon"></i>
                                    </a>
                                    <a class="add-wishlist" href="wishlist.html">
                                      <i class="zmdi zmdi-favorite-outline zmdi-hc-fw icon"></i>
                                    </a>
                                    <a class="add-quick-view" href="javascript:void(0);">
                                      <i class="zmdi zmdi-search icon"></i>
                                    </a>
                                  </div>
                                </div>
                              </div>
                              <div class="product-desc">
                                <div class="product-info">
                                  <h4 class="title"><a href="single-product-simple.html">Flower Print dress</a></h4>
                                  <div class="star-content">
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                  </div>
                                  <div class="prices">
                                    <span class="price">$50.00</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!--== End Shop Item ==-->

                          <!--== Start Shop Item ==-->
                          <div class="product-item">
                            <div class="inner-content">
                              <div class="product-thumb">
                                <a href="single-product-simple.html">
                                  <img class="w-100" src="{{ asset('customer/assets/img/shop/6.jpg') }}" alt="Image-HasTech">
                                </a>
                                <div class="product-action">
                                  <div class="addto-wrap">
                                    <a class="add-cart" href="cart.html">
                                      <i class="zmdi zmdi-shopping-cart-plus icon"></i>
                                    </a>
                                    <a class="add-wishlist" href="wishlist.html">
                                      <i class="zmdi zmdi-favorite-outline zmdi-hc-fw icon"></i>
                                    </a>
                                    <a class="add-quick-view" href="javascript:void(0);">
                                      <i class="zmdi zmdi-search icon"></i>
                                    </a>
                                  </div>
                                </div>
                              </div>
                              <div class="product-desc">
                                <div class="product-info">
                                  <h4 class="title"><a href="single-product-simple.html">Fit Wool Suit</a></h4>
                                  <div class="star-content">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                  </div>
                                  <div class="prices">
                                    <span class="price">$80.00</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!--== End Shop Item ==-->
                        </div>
                        <div class="swiper-slide">
                          <!--== Start Shop Item ==-->
                          <div class="product-item">
                            <div class="inner-content">
                              <div class="product-thumb">
                                <a href="single-product-simple.html">
                                  <img class="w-100" src="{{ asset('customer/assets/img/shop/7.jpg') }}" alt="Image-HasTech">
                                </a>
                                <div class="product-action">
                                  <div class="addto-wrap">
                                    <a class="add-cart" href="cart.html">
                                      <i class="zmdi zmdi-shopping-cart-plus icon"></i>
                                    </a>
                                    <a class="add-wishlist" href="wishlist.html">
                                      <i class="zmdi zmdi-favorite-outline zmdi-hc-fw icon"></i>
                                    </a>
                                    <a class="add-quick-view" href="javascript:void(0);">
                                      <i class="zmdi zmdi-search icon"></i>
                                    </a>
                                  </div>
                                </div>
                              </div>
                              <div class="product-desc">
                                <div class="product-info">
                                  <h4 class="title"><a href="single-product-simple.html">Literature Classical</a></h4>
                                  <div class="star-content">
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                  </div>
                                  <div class="prices">
                                    <span class="price">$79.00</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!--== End Shop Item ==-->

                          <!--== Start Shop Item ==-->
                          <div class="product-item">
                            <div class="inner-content">
                              <div class="product-thumb">
                                <a href="single-product-simple.html">
                                  <img class="w-100" src="{{ asset('customer/assets/img/shop/8.jpg') }}" alt="Image-HasTech">
                                </a>
                                <div class="product-action">
                                  <div class="addto-wrap">
                                    <a class="add-cart" href="cart.html">
                                      <i class="zmdi zmdi-shopping-cart-plus icon"></i>
                                    </a>
                                    <a class="add-wishlist" href="wishlist.html">
                                      <i class="zmdi zmdi-favorite-outline zmdi-hc-fw icon"></i>
                                    </a>
                                    <a class="add-quick-view" href="javascript:void(0);">
                                      <i class="zmdi zmdi-search icon"></i>
                                    </a>
                                  </div>
                                </div>
                              </div>
                              <div class="product-desc">
                                <div class="product-info">
                                  <h4 class="title"><a href="single-product-simple.html">Matchbox’ Fit Jeans</a></h4>
                                  <div class="star-content">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                  </div>
                                  <div class="prices">
                                    <span class="price">$19.00</span>
                                    <span class="price-old">$29.00</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!--== End Shop Item ==-->
                        </div>
                        <div class="swiper-slide">
                          <!--== Start Shop Item ==-->
                          <div class="product-item">
                            <div class="inner-content">
                              <div class="product-thumb">
                                <a href="single-product-simple.html">
                                  <img class="w-100" src="{{ asset('customer/assets/img/shop/9.jpg') }}" alt="Image-HasTech">
                                </a>
                                <div class="product-action">
                                  <div class="addto-wrap">
                                    <a class="add-cart" href="cart.html">
                                      <i class="zmdi zmdi-shopping-cart-plus icon"></i>
                                    </a>
                                    <a class="add-wishlist" href="wishlist.html">
                                      <i class="zmdi zmdi-favorite-outline zmdi-hc-fw icon"></i>
                                    </a>
                                    <a class="add-quick-view" href="javascript:void(0);">
                                      <i class="zmdi zmdi-search icon"></i>
                                    </a>
                                  </div>
                                </div>
                              </div>
                              <div class="product-desc">
                                <div class="product-info">
                                  <h4 class="title"><a href="single-product-simple.html">Long Cartigen</a></h4>
                                  <div class="star-content">
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                  </div>
                                  <div class="prices">
                                    <span class="price">$29.00</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!--== End Shop Item ==-->

                          <!--== Start Shop Item ==-->
                          <div class="product-item">
                            <div class="inner-content">
                              <div class="product-thumb">
                                <a href="single-product-simple.html">
                                  <img class="w-100" src="{{ asset('customer/assets/img/shop/11.jpg') }}" alt="Image-HasTech">
                                </a>
                                <span class="sale-title sticker">Sale</span>
                                <span class="percent-count sticker">-10%</span>
                                <div class="product-action">
                                  <div class="addto-wrap">
                                    <a class="add-cart" href="cart.html">
                                      <i class="zmdi zmdi-shopping-cart-plus icon"></i>
                                    </a>
                                    <a class="add-wishlist" href="wishlist.html">
                                      <i class="zmdi zmdi-favorite-outline zmdi-hc-fw icon"></i>
                                    </a>
                                    <a class="add-quick-view" href="javascript:void(0);">
                                      <i class="zmdi zmdi-search icon"></i>
                                    </a>
                                  </div>
                                </div>
                              </div>
                              <div class="product-desc">
                                <div class="product-info">
                                  <h4 class="title"><a href="single-product-simple.html">Magento Cheked Shirt</a></h4>
                                  <div class="star-content">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                  </div>
                                  <div class="prices">
                                    <span class="price">$19.00</span>
                                    <span class="price-old">$21.00</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!--== End Shop Item ==-->
                        </div>
                        <div class="swiper-slide">
                          <!--== Start Shop Item ==-->
                          <div class="product-item">
                            <div class="inner-content">
                              <div class="product-thumb">
                                <a href="single-product-simple.html">
                                  <img class="w-100" src="{{ asset('customer/assets/img/shop/13.jpg') }}" alt="Image-HasTech">
                                </a>
                                <span class="sale-title bg-theme-color sticker">Soldout</span>
                                <div class="product-action">
                                  <div class="addto-wrap">
                                    <a class="add-cart" href="cart.html">
                                      <i class="zmdi zmdi-shopping-cart-plus icon"></i>
                                    </a>
                                    <a class="add-wishlist" href="wishlist.html">
                                      <i class="zmdi zmdi-favorite-outline zmdi-hc-fw icon"></i>
                                    </a>
                                    <a class="add-quick-view" href="javascript:void(0);">
                                      <i class="zmdi zmdi-search icon"></i>
                                    </a>
                                  </div>
                                </div>
                              </div>
                              <div class="product-desc">
                                <div class="product-info">
                                  <h4 class="title"><a href="single-product-simple.html">Grag T- Shirt</a></h4>
                                  <div class="star-content">
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                  </div>
                                  <div class="prices">
                                    <span class="price">$19.00</span>
                                    <span class="price-old">$29.00</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!--== End Shop Item ==-->

                          <!--== Start Shop Item ==-->
                          <div class="product-item">
                            <div class="inner-content">
                              <div class="product-thumb">
                                <a href="single-product-simple.html">
                                  <img class="w-100" src="{{ asset('customer/assets/img/shop/15.jpg') }}" alt="Image-HasTech">
                                </a>
                                <div class="product-action">
                                  <div class="addto-wrap">
                                    <a class="add-cart" href="cart.html">
                                      <i class="zmdi zmdi-shopping-cart-plus icon"></i>
                                    </a>
                                    <a class="add-wishlist" href="wishlist.html">
                                      <i class="zmdi zmdi-favorite-outline zmdi-hc-fw icon"></i>
                                    </a>
                                    <a class="add-quick-view" href="javascript:void(0);">
                                      <i class="zmdi zmdi-search icon"></i>
                                    </a>
                                  </div>
                                </div>
                              </div>
                              <div class="product-desc">
                                <div class="product-info">
                                  <h4 class="title"><a href="single-product-simple.html">Black Dress Shirt</a></h4>
                                  <div class="star-content">
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                  </div>
                                  <div class="prices">
                                    <span class="price">$29.00</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!--== End Shop Item ==-->
                        </div>
                        <div class="swiper-slide">
                          <!--== Start Shop Item ==-->
                          <div class="product-item">
                            <div class="inner-content">
                              <div class="product-thumb">
                                <a href="single-product-simple.html">
                                  <img class="w-100" src="{{ asset('customer/assets/img/shop/10.jpg') }}" alt="Image-HasTech">
                                </a>
                                <div class="product-action">
                                  <div class="addto-wrap">
                                    <a class="add-cart" href="cart.html">
                                      <i class="zmdi zmdi-shopping-cart-plus icon"></i>
                                    </a>
                                    <a class="add-wishlist" href="wishlist.html">
                                      <i class="zmdi zmdi-favorite-outline zmdi-hc-fw icon"></i>
                                    </a>
                                    <a class="add-quick-view" href="javascript:void(0);">
                                      <i class="zmdi zmdi-search icon"></i>
                                    </a>
                                  </div>
                                </div>
                              </div>
                              <div class="product-desc">
                                <div class="product-info">
                                  <h4 class="title"><a href="single-product-simple.html">Primo Court Mid Suede</a></h4>
                                  <div class="star-content">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                  </div>
                                  <div class="prices">
                                    <span class="price">$39.00</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!--== End Shop Item ==-->

                          <!--== Start Shop Item ==-->
                          <div class="product-item">
                            <div class="inner-content">
                              <div class="product-thumb">
                                <a href="single-product-simple.html">
                                  <img class="w-100" src="{{ asset('customer/assets/img/shop/12.jpg') }}" alt="Image-HasTech">
                                </a>
                                <div class="product-action">
                                  <div class="addto-wrap">
                                    <a class="add-cart" href="cart.html">
                                      <i class="zmdi zmdi-shopping-cart-plus icon"></i>
                                    </a>
                                    <a class="add-wishlist" href="wishlist.html">
                                      <i class="zmdi zmdi-favorite-outline zmdi-hc-fw icon"></i>
                                    </a>
                                    <a class="add-quick-view" href="javascript:void(0);">
                                      <i class="zmdi zmdi-search icon"></i>
                                    </a>
                                  </div>
                                </div>
                              </div>
                              <div class="product-desc">
                                <div class="product-info">
                                  <h4 class="title"><a href="single-product-simple.html">Off-White Shirt</a></h4>
                                  <div class="star-content">
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                  </div>
                                  <div class="prices">
                                    <span class="price">$80.00</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!--== End Shop Item ==-->
                        </div>
                        <div class="swiper-slide">
                          <!--== Start Shop Item ==-->
                          <div class="product-item">
                            <div class="inner-content">
                              <div class="product-thumb">
                                <a href="single-product-simple.html">
                                  <img class="w-100" src="{{ asset('customer/assets/img/shop/14.jpg') }}" alt="Image-HasTech">
                                </a>
                                <div class="product-action">
                                  <div class="addto-wrap">
                                    <a class="add-cart" href="cart.html">
                                      <i class="zmdi zmdi-shopping-cart-plus icon"></i>
                                    </a>
                                    <a class="add-wishlist" href="wishlist.html">
                                      <i class="zmdi zmdi-favorite-outline zmdi-hc-fw icon"></i>
                                    </a>
                                    <a class="add-quick-view" href="javascript:void(0);">
                                      <i class="zmdi zmdi-search icon"></i>
                                    </a>
                                  </div>
                                </div>
                              </div>
                              <div class="product-desc">
                                <div class="product-info">
                                  <h4 class="title"><a href="single-product-simple.html">Grameen Check Shirt</a></h4>
                                  <div class="star-content">
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                  </div>
                                  <div class="prices">
                                    <span class="price">$50.00</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!--== End Shop Item ==-->

                          <!--== Start Shop Item ==-->
                          <div class="product-item">
                            <div class="inner-content">
                              <div class="product-thumb">
                                <a href="single-product-simple.html">
                                  <img class="w-100" src="{{ asset('customer/assets/img/shop/16.jpg') }}" alt="Image-HasTech">
                                </a>
                                <div class="product-action">
                                  <div class="addto-wrap">
                                    <a class="add-cart" href="cart.html">
                                      <i class="zmdi zmdi-shopping-cart-plus icon"></i>
                                    </a>
                                    <a class="add-wishlist" href="wishlist.html">
                                      <i class="zmdi zmdi-favorite-outline zmdi-hc-fw icon"></i>
                                    </a>
                                    <a class="add-quick-view" href="javascript:void(0);">
                                      <i class="zmdi zmdi-search icon"></i>
                                    </a>
                                  </div>
                                </div>
                              </div>
                              <div class="product-desc">
                                <div class="product-info">
                                  <h4 class="title"><a href="single-product-simple.html">Pure Check Shirt</a></h4>
                                  <div class="star-content">
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                  </div>
                                  <div class="prices">
                                    <span class="price">$29.00</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!--== End Shop Item ==-->
                        </div>
                      </div>

                      <!--== Add Swiper navigation Buttons ==-->
                      <div class="swiper-button-prev"><i class="ei ei-icon_arrow_carrot-left"></i></div>
                      <div class="swiper-button-next"><i class="ei ei-icon_arrow_carrot-right"></i></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="mostView" role="tabpanel" aria-labelledby="most-view-tab">
                <div class="row">
                  <div class="col-sm-6 col-lg-4 col-xl-3">
                    <!--== Start Shop Item ==-->
                    <div class="product-item">
                      <div class="inner-content">
                        <div class="product-thumb">
                          <a href="single-product-simple.html">
                            <img class="w-100" src="{{ asset('customer/assets/img/shop/1.jpg') }}" alt="Image-HasTech">
                          </a>
                          <span class="sale-title sticker">Sale</span>
                          <span class="percent-count sticker">-18%</span>
                          <div class="product-action">
                            <div class="addto-wrap">
                              <a class="add-cart" href="cart.html">
                                <i class="zmdi zmdi-shopping-cart-plus icon"></i>
                              </a>
                              <a class="add-wishlist" href="wishlist.html">
                                <i class="zmdi zmdi-favorite-outline zmdi-hc-fw icon"></i>
                              </a>
                              <a class="add-quick-view" href="javascript:void(0);">
                                <i class="zmdi zmdi-search icon"></i>
                              </a>
                            </div>
                          </div>
                        </div>
                        <div class="product-desc">
                          <div class="product-info">
                            <h4 class="title"><a href="single-product-simple.html">Meta Slevless Dress</a></h4>
                            <div class="star-content">
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star-o"></i>
                            </div>
                            <div class="prices">
                              <span class="price">$40.00</span>
                              <span class="price-old">$85.00</span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--== End Shop Item ==-->

                    <!--== Start Shop Item ==-->
                    <div class="product-item">
                      <div class="inner-content">
                        <div class="product-thumb">
                          <a href="single-product-simple.html">
                            <img class="w-100" src="{{ asset('customer/assets/img/shop/19.jpg') }}" alt="Image-HasTech">
                          </a>
                          <span class="sale-title sticker">Sale</span>
                          <span class="percent-count sticker">-35%</span>
                          <div class="product-action">
                            <div class="addto-wrap">
                              <a class="add-cart" href="cart.html">
                                <i class="zmdi zmdi-shopping-cart-plus icon"></i>
                              </a>
                              <a class="add-wishlist" href="wishlist.html">
                                <i class="zmdi zmdi-favorite-outline zmdi-hc-fw icon"></i>
                              </a>
                              <a class="add-quick-view" href="javascript:void(0);">
                                <i class="zmdi zmdi-search icon"></i>
                              </a>
                            </div>
                          </div>
                        </div>
                        <div class="product-desc">
                          <div class="product-info">
                            <h4 class="title"><a href="single-product-simple.html">Randomised Words</a></h4>
                            <div class="star-content">
                              <i class="fa fa-star-o"></i>
                              <i class="fa fa-star-o"></i>
                              <i class="fa fa-star-o"></i>
                              <i class="fa fa-star-o"></i>
                              <i class="fa fa-star-o"></i>
                            </div>
                            <div class="prices">
                              <span class="price">$39.00</span>
                              <span class="price-old">$60.00</span>
                            </div>
                            <div class="ht-countdown ht-countdown-style3" data-date="4/24/2022"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--== End Shop Item ==-->
                  </div>
                  <div class="col-sm-6 col-lg-4 col-xl-3">
                    <!--== Start Shop Item ==-->
                    <div class="product-item">
                      <div class="inner-content">
                        <div class="product-thumb">
                          <a href="single-product-simple.html">
                            <img class="w-100" src="{{ asset('customer/assets/img/shop/3.jpg') }}" alt="Image-HasTech">
                          </a>
                          <span class="sale-title sticker">Sale</span>
                          <span class="percent-count sticker">-27%</span>
                          <div class="product-action">
                            <div class="addto-wrap">
                              <a class="add-cart" href="cart.html">
                                <i class="zmdi zmdi-shopping-cart-plus icon"></i>
                              </a>
                              <a class="add-wishlist" href="wishlist.html">
                                <i class="zmdi zmdi-favorite-outline zmdi-hc-fw icon"></i>
                              </a>
                              <a class="add-quick-view" href="javascript:void(0);">
                                <i class="zmdi zmdi-search icon"></i>
                              </a>
                            </div>
                          </div>
                        </div>
                        <div class="product-desc">
                          <div class="product-info">
                            <h4 class="title"><a href="single-product-simple.html">Style Modern Dress</a></h4>
                            <div class="star-content">
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                            </div>
                            <div class="prices">
                              <span class="price">$55.00</span>
                              <span class="price-old">$75.00</span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--== End Shop Item ==-->

                    <!--== Start Shop Item ==-->
                    <div class="product-item">
                      <div class="inner-content">
                        <div class="product-thumb">
                          <a href="single-product-simple.html">
                            <img class="w-100" src="{{ asset('customer/assets/img/shop/4.jpg') }}" alt="Image-HasTech">
                          </a>
                          <div class="product-action">
                            <div class="addto-wrap">
                              <a class="add-cart" href="cart.html">
                                <i class="zmdi zmdi-shopping-cart-plus icon"></i>
                              </a>
                              <a class="add-wishlist" href="wishlist.html">
                                <i class="zmdi zmdi-favorite-outline zmdi-hc-fw icon"></i>
                              </a>
                              <a class="add-quick-view" href="javascript:void(0);">
                                <i class="zmdi zmdi-search icon"></i>
                              </a>
                            </div>
                          </div>
                        </div>
                        <div class="product-desc">
                          <div class="product-info">
                            <h4 class="title"><a href="single-product-simple.html">Black Dress Shirt</a></h4>
                            <div class="star-content">
                              <i class="fa fa-star-o"></i>
                              <i class="fa fa-star-o"></i>
                              <i class="fa fa-star-o"></i>
                              <i class="fa fa-star-o"></i>
                              <i class="fa fa-star-o"></i>
                            </div>
                            <div class="prices">
                              <span class="price">$79.00</span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--== End Shop Item ==-->
                  </div>
                  <div class="col-sm-6 col-lg-4 col-xl-3 d-none d-lg-block">
                    <!--== Start Shop Item ==-->
                    <div class="product-item">
                      <div class="inner-content">
                        <div class="product-thumb">
                          <a href="single-product-simple.html">
                            <img class="w-100" src="{{ asset('customer/assets/img/shop/5.jpg') }}" alt="Image-HasTech">
                          </a>
                          <div class="product-action">
                            <div class="addto-wrap">
                              <a class="add-cart" href="cart.html">
                                <i class="zmdi zmdi-shopping-cart-plus icon"></i>
                              </a>
                              <a class="add-wishlist" href="wishlist.html">
                                <i class="zmdi zmdi-favorite-outline zmdi-hc-fw icon"></i>
                              </a>
                              <a class="add-quick-view" href="javascript:void(0);">
                                <i class="zmdi zmdi-search icon"></i>
                              </a>
                            </div>
                          </div>
                        </div>
                        <div class="product-desc">
                          <div class="product-info">
                            <h4 class="title"><a href="single-product-simple.html">Flower Print dress</a></h4>
                            <div class="star-content">
                              <i class="fa fa-star-o"></i>
                              <i class="fa fa-star-o"></i>
                              <i class="fa fa-star-o"></i>
                              <i class="fa fa-star-o"></i>
                              <i class="fa fa-star-o"></i>
                            </div>
                            <div class="prices">
                              <span class="price">$50.00</span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--== End Shop Item ==-->

                    <!--== Start Shop Item ==-->
                    <div class="product-item">
                      <div class="inner-content">
                        <div class="product-thumb">
                          <a href="single-product-simple.html">
                            <img class="w-100" src="{{ asset('customer/assets/img/shop/6.jpg') }}" alt="Image-HasTech">
                          </a>
                          <div class="product-action">
                            <div class="addto-wrap">
                              <a class="add-cart" href="cart.html">
                                <i class="zmdi zmdi-shopping-cart-plus icon"></i>
                              </a>
                              <a class="add-wishlist" href="wishlist.html">
                                <i class="zmdi zmdi-favorite-outline zmdi-hc-fw icon"></i>
                              </a>
                              <a class="add-quick-view" href="javascript:void(0);">
                                <i class="zmdi zmdi-search icon"></i>
                              </a>
                            </div>
                          </div>
                        </div>
                        <div class="product-desc">
                          <div class="product-info">
                            <h4 class="title"><a href="single-product-simple.html">Fit Wool Suit</a></h4>
                            <div class="star-content">
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                            </div>
                            <div class="prices">
                              <span class="price">$80.00</span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--== End Shop Item ==-->
                  </div>
                  <div class="col-sm-6 col-lg-4 col-xl-3 d-none d-xl-block">
                    <!--== Start Shop Item ==-->
                    <div class="product-item">
                      <div class="inner-content">
                        <div class="product-thumb">
                          <a href="single-product-simple.html">
                            <img class="w-100" src="{{ asset('customer/assets/img/shop/7.jpg') }}" alt="Image-HasTech">
                          </a>
                          <div class="product-action">
                            <div class="addto-wrap">
                              <a class="add-cart" href="cart.html">
                                <i class="zmdi zmdi-shopping-cart-plus icon"></i>
                              </a>
                              <a class="add-wishlist" href="wishlist.html">
                                <i class="zmdi zmdi-favorite-outline zmdi-hc-fw icon"></i>
                              </a>
                              <a class="add-quick-view" href="javascript:void(0);">
                                <i class="zmdi zmdi-search icon"></i>
                              </a>
                            </div>
                          </div>
                        </div>
                        <div class="product-desc">
                          <div class="product-info">
                            <h4 class="title"><a href="single-product-simple.html">Literature Classical</a></h4>
                            <div class="star-content">
                              <i class="fa fa-star-o"></i>
                              <i class="fa fa-star-o"></i>
                              <i class="fa fa-star-o"></i>
                              <i class="fa fa-star-o"></i>
                              <i class="fa fa-star-o"></i>
                            </div>
                            <div class="prices">
                              <span class="price">$79.00</span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--== End Shop Item ==-->

                    <!--== Start Shop Item ==-->
                    <div class="product-item">
                      <div class="inner-content">
                        <div class="product-thumb">
                          <a href="single-product-simple.html">
                            <img class="w-100" src="{{ asset('customer/assets/img/shop/8.jpg') }}" alt="Image-HasTech">
                          </a>
                          <div class="product-action">
                            <div class="addto-wrap">
                              <a class="add-cart" href="cart.html">
                                <i class="zmdi zmdi-shopping-cart-plus icon"></i>
                              </a>
                              <a class="add-wishlist" href="wishlist.html">
                                <i class="zmdi zmdi-favorite-outline zmdi-hc-fw icon"></i>
                              </a>
                              <a class="add-quick-view" href="javascript:void(0);">
                                <i class="zmdi zmdi-search icon"></i>
                              </a>
                            </div>
                          </div>
                        </div>
                        <div class="product-desc">
                          <div class="product-info">
                            <h4 class="title"><a href="single-product-simple.html">Matchbox’ Fit Jeans</a></h4>
                            <div class="star-content">
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                            </div>
                            <div class="prices">
                              <span class="price">$19.00</span>
                              <span class="price-old">$29.00</span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--== End Shop Item ==-->
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="newArrivals" role="tabpanel" aria-labelledby="new-arrivals-tab">
                <div class="row">
                  <div class="col-sm-6 col-lg-4 col-xl-3">
                    <!--== Start Shop Item ==-->
                    <div class="product-item">
                      <div class="inner-content">
                        <div class="product-thumb">
                          <a href="single-product-simple.html">
                            <img class="w-100" src="{{ asset('customer/assets/img/shop/1.jpg') }}" alt="Image-HasTech">
                          </a>
                          <span class="sale-title sticker">Sale</span>
                          <span class="percent-count sticker">-18%</span>
                          <div class="product-action">
                            <div class="addto-wrap">
                              <a class="add-cart" href="cart.html">
                                <i class="zmdi zmdi-shopping-cart-plus icon"></i>
                              </a>
                              <a class="add-wishlist" href="wishlist.html">
                                <i class="zmdi zmdi-favorite-outline zmdi-hc-fw icon"></i>
                              </a>
                              <a class="add-quick-view" href="javascript:void(0);">
                                <i class="zmdi zmdi-search icon"></i>
                              </a>
                            </div>
                          </div>
                        </div>
                        <div class="product-desc">
                          <div class="product-info">
                            <h4 class="title"><a href="single-product-simple.html">Meta Slevless Dress</a></h4>
                            <div class="star-content">
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star-o"></i>
                            </div>
                            <div class="prices">
                              <span class="price">$40.00</span>
                              <span class="price-old">$85.00</span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--== End Shop Item ==-->

                    <!--== Start Shop Item ==-->
                    <div class="product-item">
                      <div class="inner-content">
                        <div class="product-thumb">
                          <a href="single-product-simple.html">
                            <img class="w-100" src="{{ asset('customer/assets/img/shop/19.jpg') }}" alt="Image-HasTech">
                          </a>
                          <span class="sale-title sticker">Sale</span>
                          <span class="percent-count sticker">-35%</span>
                          <div class="product-action">
                            <div class="addto-wrap">
                              <a class="add-cart" href="cart.html">
                                <i class="zmdi zmdi-shopping-cart-plus icon"></i>
                              </a>
                              <a class="add-wishlist" href="wishlist.html">
                                <i class="zmdi zmdi-favorite-outline zmdi-hc-fw icon"></i>
                              </a>
                              <a class="add-quick-view" href="javascript:void(0);">
                                <i class="zmdi zmdi-search icon"></i>
                              </a>
                            </div>
                          </div>
                        </div>
                        <div class="product-desc">
                          <div class="product-info">
                            <h4 class="title"><a href="single-product-simple.html">Randomised Words</a></h4>
                            <div class="star-content">
                              <i class="fa fa-star-o"></i>
                              <i class="fa fa-star-o"></i>
                              <i class="fa fa-star-o"></i>
                              <i class="fa fa-star-o"></i>
                              <i class="fa fa-star-o"></i>
                            </div>
                            <div class="prices">
                              <span class="price">$39.00</span>
                              <span class="price-old">$60.00</span>
                            </div>
                            <div class="ht-countdown ht-countdown-style3" data-date="4/24/2022"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--== End Shop Item ==-->
                  </div>
                  <div class="col-sm-6 col-lg-4 col-xl-3">
                    <!--== Start Shop Item ==-->
                    <div class="product-item">
                      <div class="inner-content">
                        <div class="product-thumb">
                          <a href="single-product-simple.html">
                            <img class="w-100" src="{{ asset('customer/assets/img/shop/3.jpg') }}" alt="Image-HasTech">
                          </a>
                          <span class="sale-title sticker">Sale</span>
                          <span class="percent-count sticker">-27%</span>
                          <div class="product-action">
                            <div class="addto-wrap">
                              <a class="add-cart" href="cart.html">
                                <i class="zmdi zmdi-shopping-cart-plus icon"></i>
                              </a>
                              <a class="add-wishlist" href="wishlist.html">
                                <i class="zmdi zmdi-favorite-outline zmdi-hc-fw icon"></i>
                              </a>
                              <a class="add-quick-view" href="javascript:void(0);">
                                <i class="zmdi zmdi-search icon"></i>
                              </a>
                            </div>
                          </div>
                        </div>
                        <div class="product-desc">
                          <div class="product-info">
                            <h4 class="title"><a href="single-product-simple.html">Style Modern Dress</a></h4>
                            <div class="star-content">
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                            </div>
                            <div class="prices">
                              <span class="price">$55.00</span>
                              <span class="price-old">$75.00</span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--== End Shop Item ==-->

                    <!--== Start Shop Item ==-->
                    <div class="product-item">
                      <div class="inner-content">
                        <div class="product-thumb">
                          <a href="single-product-simple.html">
                            <img class="w-100" src="{{ asset('customer/assets/img/shop/4.jpg') }}" alt="Image-HasTech">
                          </a>
                          <div class="product-action">
                            <div class="addto-wrap">
                              <a class="add-cart" href="cart.html">
                                <i class="zmdi zmdi-shopping-cart-plus icon"></i>
                              </a>
                              <a class="add-wishlist" href="wishlist.html">
                                <i class="zmdi zmdi-favorite-outline zmdi-hc-fw icon"></i>
                              </a>
                              <a class="add-quick-view" href="javascript:void(0);">
                                <i class="zmdi zmdi-search icon"></i>
                              </a>
                            </div>
                          </div>
                        </div>
                        <div class="product-desc">
                          <div class="product-info">
                            <h4 class="title"><a href="single-product-simple.html">Black Dress Shirt</a></h4>
                            <div class="star-content">
                              <i class="fa fa-star-o"></i>
                              <i class="fa fa-star-o"></i>
                              <i class="fa fa-star-o"></i>
                              <i class="fa fa-star-o"></i>
                              <i class="fa fa-star-o"></i>
                            </div>
                            <div class="prices">
                              <span class="price">$79.00</span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--== End Shop Item ==-->
                  </div>
                  <div class="col-sm-6 col-lg-4 col-xl-3 d-none d-lg-block">
                    <!--== Start Shop Item ==-->
                    <div class="product-item">
                      <div class="inner-content">
                        <div class="product-thumb">
                          <a href="single-product-simple.html">
                            <img class="w-100" src="{{ asset('customer/assets/img/shop/5.jpg') }}" alt="Image-HasTech">
                          </a>
                          <div class="product-action">
                            <div class="addto-wrap">
                              <a class="add-cart" href="cart.html">
                                <i class="zmdi zmdi-shopping-cart-plus icon"></i>
                              </a>
                              <a class="add-wishlist" href="wishlist.html">
                                <i class="zmdi zmdi-favorite-outline zmdi-hc-fw icon"></i>
                              </a>
                              <a class="add-quick-view" href="javascript:void(0);">
                                <i class="zmdi zmdi-search icon"></i>
                              </a>
                            </div>
                          </div>
                        </div>
                        <div class="product-desc">
                          <div class="product-info">
                            <h4 class="title"><a href="single-product-simple.html">Flower Print dress</a></h4>
                            <div class="star-content">
                              <i class="fa fa-star-o"></i>
                              <i class="fa fa-star-o"></i>
                              <i class="fa fa-star-o"></i>
                              <i class="fa fa-star-o"></i>
                              <i class="fa fa-star-o"></i>
                            </div>
                            <div class="prices">
                              <span class="price">$50.00</span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--== End Shop Item ==-->

                    <!--== Start Shop Item ==-->
                    <div class="product-item">
                      <div class="inner-content">
                        <div class="product-thumb">
                          <a href="single-product-simple.html">
                            <img class="w-100" src="{{ asset('customer/assets/img/shop/6.jpg') }}" alt="Image-HasTech">
                          </a>
                          <div class="product-action">
                            <div class="addto-wrap">
                              <a class="add-cart" href="cart.html">
                                <i class="zmdi zmdi-shopping-cart-plus icon"></i>
                              </a>
                              <a class="add-wishlist" href="wishlist.html">
                                <i class="zmdi zmdi-favorite-outline zmdi-hc-fw icon"></i>
                              </a>
                              <a class="add-quick-view" href="javascript:void(0);">
                                <i class="zmdi zmdi-search icon"></i>
                              </a>
                            </div>
                          </div>
                        </div>
                        <div class="product-desc">
                          <div class="product-info">
                            <h4 class="title"><a href="single-product-simple.html">Fit Wool Suit</a></h4>
                            <div class="star-content">
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                            </div>
                            <div class="prices">
                              <span class="price">$80.00</span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--== End Shop Item ==-->
                  </div>
                  <div class="col-sm-6 col-lg-4 col-xl-3 d-none d-xl-block">
                    <!--== Start Shop Item ==-->
                    <div class="product-item">
                      <div class="inner-content">
                        <div class="product-thumb">
                          <a href="single-product-simple.html">
                            <img class="w-100" src="{{ asset('customer/assets/img/shop/7.jpg') }}" alt="Image-HasTech">
                          </a>
                          <div class="product-action">
                            <div class="addto-wrap">
                              <a class="add-cart" href="cart.html">
                                <i class="zmdi zmdi-shopping-cart-plus icon"></i>
                              </a>
                              <a class="add-wishlist" href="wishlist.html">
                                <i class="zmdi zmdi-favorite-outline zmdi-hc-fw icon"></i>
                              </a>
                              <a class="add-quick-view" href="javascript:void(0);">
                                <i class="zmdi zmdi-search icon"></i>
                              </a>
                            </div>
                          </div>
                        </div>
                        <div class="product-desc">
                          <div class="product-info">
                            <h4 class="title"><a href="single-product-simple.html">Literature Classical</a></h4>
                            <div class="star-content">
                              <i class="fa fa-star-o"></i>
                              <i class="fa fa-star-o"></i>
                              <i class="fa fa-star-o"></i>
                              <i class="fa fa-star-o"></i>
                              <i class="fa fa-star-o"></i>
                            </div>
                            <div class="prices">
                              <span class="price">$79.00</span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--== End Shop Item ==-->

                    <!--== Start Shop Item ==-->
                    <div class="product-item">
                      <div class="inner-content">
                        <div class="product-thumb">
                          <a href="single-product-simple.html">
                            <img class="w-100" src="{{ asset('customer/assets/img/shop/8.jpg') }}" alt="Image-HasTech">
                          </a>
                          <div class="product-action">
                            <div class="addto-wrap">
                              <a class="add-cart" href="cart.html">
                                <i class="zmdi zmdi-shopping-cart-plus icon"></i>
                              </a>
                              <a class="add-wishlist" href="wishlist.html">
                                <i class="zmdi zmdi-favorite-outline zmdi-hc-fw icon"></i>
                              </a>
                              <a class="add-quick-view" href="javascript:void(0);">
                                <i class="zmdi zmdi-search icon"></i>
                              </a>
                            </div>
                          </div>
                        </div>
                        <div class="product-desc">
                          <div class="product-info">
                            <h4 class="title"><a href="single-product-simple.html">Matchbox’ Fit Jeans</a></h4>
                            <div class="star-content">
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                            </div>
                            <div class="prices">
                              <span class="price">$19.00</span>
                              <span class="price-old">$29.00</span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--== End Shop Item ==-->
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
@endsection