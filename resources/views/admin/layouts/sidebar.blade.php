<aside id="minileftbar" class="minileftbar">
    <ul class="menu_list">
        <li>
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="{{ url('/') }}"><img src="/assets/images/{{ config('company.configs') !== null ? config('company.configs')->logo : '' }}" alt="Logo"></a>
        </li>
        <li><a href="javascript:void(0);" class="menu-sm"><i class="zmdi zmdi-swap"></i></a></li>        
        
        <li><a href="javascript:void(0);" class="fullscreen" data-provide="fullscreen"><i class="zmdi zmdi-fullscreen"></i></a></li>
        <li class="power">
            <a href="javascript:void(0);" class="js-right-sidebar"><i class="zmdi zmdi-settings zmdi-hc-spin"></i></a>            
            <a href="{{ url('/logout') }}" class="mega-menu"><i class="zmdi zmdi-power"></i></a>
        </li>
    </ul>    
</aside>


<aside class="right_menu">
    <div class="menu-app">
        <div class="slim_scroll">
            <div class="card">
                <div class="header">
                    <h2><strong>App</strong> Menu</h2>
                </div>
                <div class="body">
                    <ul class="list-unstyled menu">
                        <li><a href="events.html"><i class="zmdi zmdi-calendar-note"></i><span>Calendar</span></a></li>
                        <li><a href="file-dashboard.html"><i class="zmdi zmdi-file-text"></i><span>File Manager</span></a></li>
                        <li><a href="blog-dashboard.html"><i class="zmdi zmdi-blogger"></i><span>Blog</span></a></li>
                        <li><a href="javascript:void(0)"><i class="zmdi zmdi-arrows"></i><span>Notes</span></a></li>
                        <li><a href="javascript:void(0)"><i class="zmdi zmdi-view-column"></i><span>Taskboard</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div id="rightsidebar" class="right-sidebar">
        <div class="tab-content slim_scroll">
            <div class="tab-pane slideRight active" id="setting">
                <div class="card">
                    <div class="header">
                        <h2><strong>Colors</strong> Skins</h2>
                    </div>
                    <div class="body">
                        <ul class="choose-skin list-unstyled m-b-0">
                            <li data-theme="black" class="active">
                                <div class="black"></div>
                            </li>
                            <li data-theme="purple">
                                <div class="purple"></div>
                            </li>                   
                            <li data-theme="blue">
                                <div class="blue"></div>
                            </li>
                            <li data-theme="cyan">
                                <div class="cyan"></div>                    
                            </li>
                            <li data-theme="green">
                                <div class="green"></div>
                            </li>
                            <li data-theme="orange">
                                <div class="orange"></div>
                            </li>
                            <li data-theme="blush">
                                <div class="blush"></div>                    
                            </li>
                        </ul>
                    </div>
                </div>                
                <div class="card">
                    <div class="header">
                        <h2><strong>Left</strong> Menu</h2>
                    </div>
                    <div class="body theme-light-dark">
                        <button class="t-dark btn btn-primary btn-round btn-block">Dark</button>
                    </div>
                </div>               
            </div>
        </div>
    </div>
    <div id="leftsidebar" class="sidebar">
        <div class="menu">
            <ul class="list">
                <li>
                    <div class="user-info m-b-20">
                        <div class="image">
                            <a href="javascript:;"><img src="{{ asset('admins/assets/images/profile_av.svg') }}" alt="User"></a>
                        </div>
                        <div class="detail">
                            {{-- <h6>{{ auth()->user()->name }}</h6> --}}
                            {{-- <p class="m-b-0">{{ auth()->user()->username }}</p> --}}
                        </div>
                    </div>
                </li>
                <li class="@yield('dashboard-nav')"> <a href="{{ url('/admin') }}"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>    
                <li class="@yield('category-nav')"> <a href="{{ url('/admin/category') }}"><i class="zmdi zmdi-label"></i><span>Category</span></a></li>    
                <li class="@yield('product-nav')"> <a href="{{ url('/admin/product') }}"><i class="zmdi zmdi-collection-plus"></i><span>Product</span></a></li>    
                <li class="@yield('transaksi-nav')"> <a href="{{ url('/admin/transaksi') }}"><i class="zmdi zmdi-money-box"></i><span>Transaksi</span></a></li>    
                @if (auth()->user()->role->name === 'admin')
                <li class="@yield('karyawan-nav')"> <a href="{{ url('/admin/karyawan') }}"><i class="zmdi zmdi-accounts"></i><span>Karyawan</span></a></li>    
                <li class="@yield('laporan-nav')"> <a href="{{ url('/admin/laporan') }}"><i class="zmdi zmdi-chart"></i><span>Laporan</span></a></li>    
                <li class="@yield('setting-nav')"> <a href="{{ url('/admin/setting') }}"><i class="zmdi zmdi-settings"></i><span>Setting</span></a></li>    
                @endif
            </ul>
        </div>
    </div>
</aside>