<!DOCTYPE html>
<html lang="en">
    <title>
        {{ config('company.configs') !== null ? config('company.configs')->name : '' }}
    </title>
    @include('customer.layouts.head')
<body>

<!--wrapper start-->
<div class="wrapper product-information-wrapper">

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
  
  <main class="main-content">
    <!--== Start Product Area Wrapper ==-->
    <section class="product-area product-information-area">
      <div class="container">
        <div class="product-information">
          <div class="row">
            <div class="col-lg-7">
              <div class="edit-checkout-head">
                <div class="header-logo-area">
                  <a href="{{ url('/') }}">
                    <img class="logo-main" src="/assets/images/{{ config('company.configs') !== null ? config('company.configs')->logo : '' }}" alt="Logo">
                  </a>
                </div>
                <div class="breadcrumb-area">
                  <ul>
                    <li>Payment</li>
                  </ul>
                </div>
              </div>
              <div class="edit-checkout-information">
                <h4 class="title">Contact information</h4>
                <div class="logged-in-information">
                  {{-- <div class="thumb" data-bg-img="assets/img/photos/gravatar2.png"></div> --}}
                  <p>
                    <span class="name">{{ auth()->user()->name }}</span>
                    <span>({{ auth()->user()->email }})</span>
                    <span>{{ auth()->user()->phone }}</span>
                  </p>
                </div>
                <div class="edit-checkout-form">
                  <h4 class="title">Transfer To</h4>
                  <div class="row row-gutter-12">
                    <div class="col-lg-12">
                      <div class="form-floating">
                        <input type="text" class="form-control" disabled id="floatingInput3Grid" placeholder="address" value="{{ config('company.configs') !== null ? config('company.configs')->bank_account : '' }}">
                        <label for="floatingInput3Grid">Bank</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="edit-checkout-form">
                <form id="checkout" method="POST" action="{{ url('/process-checkout') }}">
                  @csrf
                  <h4 class="title">Shipping address</h4>
                  <div class="row row-gutter-12">
                    <div class="col-lg-12">
                      <div class="form-floating">
                        <input type="text" class="form-control" name="address" id="floatingInput3Grid" required placeholder="address" value="{{ auth()->user()->address }}">
                        <label for="floatingInput3Grid">Address</label>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-floating">
                        <select class="form-select form-control" required name="ekspedisi" id="floatingInput6rid" aria-label="Floating label select example">
                          <option value="" selected>Pilih ekspedisi</option>
                          <option value="JNE">JNE</option>
                          <option value="J&T">J&T</option>
                          <option value="POS">POS Indonesia</option>
                        </select>
                        <div class="field-caret"></div>
                        <label for="floatingInput6rid">Ekspedisi</label>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="btn-box">
                        <button class="btn-shipping" type="submit">Check Out</button>
                      </div>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-5">
              <div class="shipping-cart-subtotal-wrapper">
                <div class="shipping-cart-subtotal">
                    @php $subTotal = 0 @endphp
                    @foreach (auth()->user()->carts as $cart)
                    @php $subTotal += $cart->quantity * $cart->catalogue->price @endphp
                    <div class="shipping-cart-item">
                      <div class="thumb">
                        <img src="{{ asset('images/'.$cart->catalogue->images->random()->name) }}" alt="">
                        <span class="quantity">{{ $cart->quantity }}</span>
                      </div>
                      <div class="content">
                        <h4 class="title">{{ $cart->catalogue->name }}</h4>
                        <span class="info">{{ $cart->keterangan }}</span>
                        <span class="info">(@Rp. {{ number_format($cart->catalogue->price,0,',','.') }})</span>
                        <span class="price">Rp. {{ number_format($cart->quantity * $cart->catalogue->price,0,',','.') }}</span>
                      </div>
                    </div>
                    @endforeach
                  <div class="shipping-subtotal">
                    <p><span>Subtotal</span><span><strong>Rp. {{ number_format($subTotal,0,',','.') }}</strong></span></p>
                  </div>
                  <div class="shipping-total">
                    <p class="total">Total</p>
                    <p class="price">Rp. {{ number_format($subTotal,0,',','.') }}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--== End Product Area Wrapper ==-->
    <div class="edit-checkout-footer">
      <p>All rights reserved {{ config('company.configs') !== null ? config('company.configs')->name : '' }}</p>
    </div>
  </main>

  <!--== Scroll Top Button ==-->
  <div id="scroll-to-top" class="scroll-to-top"><span class="fa fa-angle-double-up"></span></div>

  <!--== Start Quick View Menu ==-->
  <aside class="product-quick-view-modal">
    <div class="product-quick-view-inner">
      <div class="product-quick-view-content">
        <button type="button" class="btn-close">
          <span class="close-icon"><i class="fa fa-close"></i></span>
        </button>
        <div class="row">
          <div class="col-lg-6 col-md-6 col-12">
            <div class="thumb">
              <img src="assets/img/shop/quick-view1.jpg" alt="Alan-Shop">
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-12">
            <div class="content">
              <h4 class="title">Meta Slevless Dress</h4>
              <div class="prices">
                <del class="price-old">$85.00</del>
                <span class="price">$70.00</span>
              </div>
              <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia,</p>
              <div class="quick-view-select">
                <div class="quick-view-select-item">
                  <label for="forSizes" class="form-label">Size:</label>
                  <select class="form-select" id="forSizes" required>
                    <option selected value="">s</option>
                    <option>m</option>
                    <option>l</option>
                    <option>xl</option>
                  </select>
                </div>
                <div class="quick-view-select-item">
                  <label for="forColors" class="form-label">Color:</label>
                  <select class="form-select" id="forColors" required>
                    <option selected value="">red</option>
                    <option>green</option>
                    <option>blue</option>
                    <option>yellow</option>
                    <option>white</option>
                  </select>
                </div>
              </div>
              <div class="action-top">
                <div class="pro-qty">
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

</div>

@include('customer.layouts.js')
</body>

</html>