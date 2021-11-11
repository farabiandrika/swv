<footer class="footer-area">
    <div class="footer-top-area">
      <div class="container">
        <div class="row text-center">
          <div class="col-sm-12 col-lg-12">
            <!--== Start widget Item ==-->
            <div class="widget-item">
              <div class="about-widget">
                <div class="footer-logo-area">
                  <a href="index.html">
                    <img class="logo-main" src="/assets/images/{{ config('company.configs') !== null ? config('company.configs')->logo : '' }}"" alt="Logo" />
                  </a>
                </div>
                {{-- <p class="desc">Lorem ipsum dolor sit amet, consectet adipi elit, sed do eius tempor incididun ut labore gthydolore.</p> --}}
                <ul>
                  <li><i class="ion-ios7-location-outline"></i> {{ config('company.configs') != null ? config('company.configs')->address : '' }},</li>
                  <li><i class="ion-ios7-email-outline"></i> <a href="mailto://{{ config('company.configs') != null ? config('company.configs')->email : '' }}">{{ config('company.configs') != null ? config('company.configs')->email : '' }}</a></li>
                </ul>
              </div>
            </div>
            <!--== End widget Item ==-->
          </div>
        </div>
      </div>
      
    </div>
    <!--== Start Footer Bottom ==-->
    <div class="footer-bottom">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <p class="copyright">© 2021 Copyright <span>{{ config('company.configs') != null ? config('company.configs')->name : '' }}</span></p>
          </div>
        </div>
      </div>
    </div>
    <!--== End Footer Bottom ==-->
  </footer>