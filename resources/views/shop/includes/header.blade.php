!
<header class="header_area sticky-header">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light main_box">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="{{ route('shop.index') }}"><img
                        src="{{ asset('shop/img/logo.png') }}" style="width: 50px;
                    height: 50px;" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto">
                        <li class="nav-item active"><a class="nav-link" href="{{ route('shop.index') }}">Trang chủ</a>
                        </li>
                        <li class="nav-item submenu dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-haspopup="true" aria-expanded="false">Shop</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="{{ route('home.index') }}">Danh mục sản
                                        phẩm</a></li>
                                <li class="nav-item"><a class="nav-link" href="single-product.html"></a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('checkOuts') }}">Thanh
                                        toán</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('show.cart') }}">Giỏ hàng</a>
                                </li>
                                {{-- <li class="nav-item"><a class="nav-link" href="confirmation.html">Confirmation</a>
                                  </li> --}}
                            </ul>
                        </li>
                        <li class="nav-item submenu dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-haspopup="true" aria-expanded="false">Pages</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="{{ route('shop.login') }}">Đăng nhập</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="{{route('logout')}}">Đăng xuất</a></li>
                                <li class="nav-item"><a class="nav-link" href="elements.html">Elements</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="contact.html">Liên hệ</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="nav-item"><a href="{{ route('show.cart') }}" class="cart"><span
                                    class="ti-bag"></span></a>
                        </li>
                        <li class="nav-item">
                            <button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="search_input" id="search_input_box">
        <div class="container">
            <form class="d-flex justify-content-between">
                <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                <button type="submit" class="btn"></button>
                <span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
            </form>
        </div>
    </div>
</header>
<!-- End Header Area -->
<section class="banner-area">
    <div class="container">
        <div class="row fullscreen align-items-center justify-content-start">
            <div class="col-lg-12">
                <div class="active-banner-slider owl-carousel">
                    <!-- single-slide -->
                    <div class="row single-slide align-items-center d-flex">
                        <div class="col-lg-5 col-md-6">
                            <div class="banner-content">
                                <h1 style="color:rgb(226, 239, 246)">car world <br></h1>
                                <h2 style="color:rgb(226, 239, 246)">Chúc bạn có trải nghiệm thú vị cùng shop !</h2>
                            </div>
                        </div>
                    </div>
                    <!-- single-slide -->
                    <div class="row single-slide">
                        {{-- <div class="col-lg-5">
                            </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>