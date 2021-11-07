<!DOCTYPE html>
<html lang="en">
    @include('customer.layouts.head')
<body>

    <!--wrapper start-->
    <div class="wrapper">
    
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
    
      <!--== Start Header Wrapper ==-->
      @include('customer.layouts.header')
      <!--== End Header Wrapper ==-->
      
      <main class="main-content">
        @yield('content')
      </main>
    
      <!--== Start Footer Area Wrapper ==-->
      @include('customer.layouts.footer')
      <!--== End Footer Area Wrapper ==-->
    
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
                  <img src="{{ asset('customer/assets/img/shop/quick-view1.jpg') }}" alt="Alan-Shop">
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
    
      <!--== Start Side Menu ==-->
      @include('customer.layouts.sidebar')
      <!--== End Side Menu ==-->
    </div>
    
    @include('customer.layouts.js')
    </body>
</html>