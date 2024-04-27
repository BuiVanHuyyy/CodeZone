<!-- Start Header Area -->
<header class="rbt-header rbt-header-9">
    <div class="rbt-sticky-placeholder"></div>
    <div class="rbt-header-campaign rbt-header-campaign-1 rbt-header-top-news bg-image1">
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="inner justify-content-center">
                            <div class="content">
                                <span class="rbt-badge variation-02 bg-color-primary color-white radius-round">Ưu đãi giới hạn</span>
                                <span class="news-text color-white-off">
                                    <img src="{{ asset('client_assets/images/icons/hand-emojji.svg') }}"
                                         alt="Hand Emojji Images"/>
                                    Giảm 5% khóa học đầu tiên
                                </span>
                            </div>
                            <div class="right-button">
                                <a class="rbt-btn-link color-white"
                                   href="https://themeforest.net/checkout/from_item/42846507?license=regular">
                                    <span>Mua ngay
                                        <i class="feather-arrow-right"></i>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="icon-close position-right">
            <button class="rbt-round-btn btn-white-off bgsection-activation">
                <i class="feather-x"></i>
            </button>
        </div>
    </div>
    <!-- Start Header Top -->
    <div class="rbt-header-middle position-relative rbt-header-mid-1 bg-color-white rbt-border-bottom">
        <div class="container">
            <div class="rbt-header-sec align-items-center">
                <div class="rbt-header-sec-col rbt-header-left">
                    <div class="rbt-header-content">
                        <div class="logo">
                            <a href="{{ route('client.home') }}">
                                <img src="{{ asset('client_assets/images/logo/logo.png') }}" alt="CodeZone Logo Images"/>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="rbt-header-sec-col rbt-header-center d-none d-md-block">
                    <div class="rbt-header-content">
                        <div class="header-info">
                            <div class="rbt-search-field">
                                <div class="search-field">
                                    <input type="text" placeholder="Search Course"/>
                                    <button class="rbt-round-btn serach-btn" type="submit">
                                        <i class="feather-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="rbt-header-sec-col rbt-header-right">
                    <div class="rbt-header-content">
                        <div class="header-info">
                            <ul class="quick-access">
                                @if(Auth::check())
                                    @if(Auth::user()->role == 'student')
                                        @php
                                            $totalItem = session('cart') ? count(session('cart')) : 0;
                                            $totalMoney = 0;
                                            foreach (session('cart', []) as $item) {
                                                $totalMoney += $item['price'];
                                            }
                                        @endphp
                                        <li class="access-icon rbt-mini-cart">
                                            <a class="rbt-cart-sidenav-activation rbt-round-btn" href="#">
                                                <i class="feather-shopping-cart"></i>
                                                <span class="rbt-cart-count">{{ $totalItem }}</span>
                                            </a>
                                        </li>
                                    @endif
                                    <li class="account-access rbt-user-wrapper right-align-dropdown d-none d-xl-block">
                                        <a href="#">
                                            <i class="feather-user"></i>{{ Auth::user()->name }}
                                        </a>
                                        <div class="rbt-user-menu-list-wrapper">
                                            <div class="inner">
                                                <div class="rbt-admin-profile">
                                                    <div class="admin-thumbnail">
                                                        <img
                                                            src="{{ Auth::user()->students->avatar ?? asset('client_assets/images/avatar/default-avatar.png') }}" alt="User Images"/>
                                                    </div>
                                                    <div class="admin-info">
                                                        <span class="name">{{ Auth::user()->name }}</span>
                                                        <a class="rbt-btn-link color-primary"
                                                           href="{{ Auth::user()->role == 'student' ? route('student.profile') : route('instructor.profile') }}">Trang cá nhân</a>
                                                    </div>
                                                </div>
                                                <ul class="user-list-wrapper">
                                                    <li>
                                                        <a href="">
                                                            <i class="feather-home"></i>
                                                            <span>Dashboard</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="feather-bookmark"></i>
                                                            <span>Bookmark</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <i class="feather-shopping-bag"></i>
                                                            <span>Enrolled Courses</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <i class="feather-heart"></i>
                                                            <span>Wishlist</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <i class="feather-star"></i>
                                                            <span>Reviews</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <i class="feather-list"></i>
                                                            <span>My Quiz Attempts</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <i class="feather-clock"></i>
                                                            <span>Order History</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <i class="feather-message-square"></i>
                                                            <span>Question & Answer</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <hr class="mt--10 mb--10"/>
                                                <ul class="user-list-wrapper">
                                                    <li>
                                                        <a href="#"><i class="feather-book-open"></i>
                                                            <span>Getting Started</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <hr class="mt--10 mb--10"/>
                                                <ul class="user-list-wrapper">
                                                    <li>
                                                        <a href="">
                                                            <i class="feather-settings"></i>
                                                            <span>Settings</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <form method="post" action="{{ route('logout') }}">
                                                            @csrf
                                                            <a onclick="event.preventDefault();
                                                                this.closest('form').submit();"
                                                               href="{{ route('logout') }}"><i
                                                                    class="feather-log-out"></i><span>Đăng xuất</span></a>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="access-icon rbt-user-wrapper right-align-dropdown d-block d-xl-none">
                                        <a class="rbt-round-btn" href="#">
                                            <i class="feather-user"></i>
                                        </a>
                                        <div class="rbt-user-menu-list-wrapper">
                                            <div class="inner">
                                                <div class="rbt-admin-profile">
                                                    <div class="admin-thumbnail">
                                                        <img src="{{ asset('client_assets/images/team/avatar.jpg') }}"
                                                             alt="User Images"/>
                                                    </div>
                                                    <div class="admin-info">
                                                        <span class="name">{{ Auth::user()->name }}</span>
                                                        <a class="rbt-btn-link color-primary" href="">View Profile</a>
                                                    </div>
                                                </div>
                                                <ul class="user-list-wrapper">
                                                    <li>
                                                        <a href="">
                                                            <i class="feather-home"></i>
                                                            <span>My Dashboard</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="feather-bookmark"></i>
                                                            <span>Bookmark</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <i class="feather-shopping-bag"></i>
                                                            <span>Enrolled Courses</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <i class="feather-heart"></i>
                                                            <span>Wishlist</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <i class="feather-star"></i>
                                                            <span>Reviews</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <i class="feather-list"></i>
                                                            <span>My Quiz Attempts</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <hr class="mt--10 mb--10"/>
                                                <ul class="user-list-wrapper">
                                                    <li>
                                                        <a href="#">
                                                            <i class="feather-book-open"></i>
                                                            <span>Getting Started</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <hr class="mt--10 mb--10"/>
                                                <ul class="user-list-wrapper">
                                                    <li>
                                                        <a href="">
                                                            <i class="feather-settings"></i>
                                                            <span>Settings</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <form method="post" action="{{ route('logout') }}">
                                                            @csrf
                                                            <a onclick="event.preventDefault(); this.closest('form').submit();"
                                                               href="{{ route('logout') }}">
                                                                <i class="feather-log-out"></i>
                                                                <span>Đăng xuất</span>
                                                            </a>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Top -->

    <div class="rbt-header-wrapper header-not-transparent header-sticky">
        <div class="container">
            <div
                class="mainbar-row rbt-navigation-end align-items-center"
            >
                <div class="rbt-main-navigation d-none d-xl-block">
                    <nav class="mainmenu-nav">
                        <ul class="mainmenu">
                            <li>
                                <a href="{{ route('client.home') }}">Trang chủ </a>
                            </li>
                            <li>
                                <a href="{{ route('client.home') }}#about-us">Về chúng tôi </a>
                            </li>
                            <li>
                                <a href="{{ route('client.home') }}#category">Chương trình đào tạo</a>
                            </li>
                            <li>
                                <a href={{ route('client.home') }}#blog">Blog </a>
                            </li>
                            <li>
                                <a href="{{ route('client.home') }}#contact">Liện hệ </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="header-right">
                    @if(!Auth::check())
                        <div class="rbt-btn-wrapper">
                            <a class="btn btn-outline-secondary"
                               style=" margin-right: 10px; border-radius: 0; font-size: 15px;"
                               href="{{ route('login') }}">Đăng
                                nhập</a>
                            <a class="btn btn-secondary" style="border-radius: 0; font-size: 15px"
                               href="{{ route('register') }}">Đăng ký</a>
                        </div>
                    @endif
                    <!-- Start Mobile-Menu-Bar -->
                    <div class="mobile-menu-bar d-block d-xl-none">
                        <div class="hamberger">
                            <button class="hamberger-button rbt-round-btn">
                                <i class="feather-menu"></i>
                            </button>
                        </div>
                    </div>
                    <!-- Start Mobile-Menu-Bar -->
                </div>
            </div>
        </div>
    </div>
    <a class="rbt-close_side_menu" href="javascript:void(0);"></a>
</header>
<!-- Mobile Menu Section -->
<div class="popup-mobile-menu">
    <div class="inner-wrapper">
        <div class="inner-top">
            <div class="content">
                <div class="logo">
                    <a href="{{route('client.home')}}">
                        <img src="{{ asset('client_assets/images/logo/logo.png') }}" alt="Education Logo Images"/>
                    </a>
                </div>
                <div class="rbt-btn-close">
                    <button class="close-button rbt-round-btn">
                        <i class="feather-x"></i>
                    </button>
                </div>
            </div>
            <p class="description">
                CodeZone nền tảng học lập trình cho mọi người.
            </p>
            <ul class="navbar-top-left rbt-information-list justify-content-start">
                <li>
                    <a href="mailto:hello@example.com"
                    ><i class="feather-mail"></i>codezone@gmail.com</a>
                </li>
                <li>
                    <a href="#"><i class="feather-phone"></i>(+_84) 123-4567</a>
                </li>
            </ul>
        </div>

        <nav class="mainmenu-nav">
            <ul class="mainmenu">
                <li>
                    <a href="">Trang chủ </a>
                </li>

                <li>
                    <a href="#about-us">Về chúng tôi </a>
                </li>
                <li>
                    <a href="#category">Chương trình đào tạo </a>
                </li>
                <li>
                    <a href="#blog">Blog </a>
                </li>
                <li>
                    <a href="#contact">Liện hệ </a>
                </li>
            </ul>
        </nav>

        <div class="mobile-menu-bottom">
            <div class="rbt-btn-wrapper mb--20">
                <a class="rbt-btn btn-border-gradient radius-round btn-sm hover-transform-none w-100 justify-content-center text-center"
                   href="#">
                    <span>Đăng nhập ngay</span>
                </a>
            </div>

            <div class="social-share-wrapper">
                <span class="rbt-short-title d-block">Follow CodeZone tại:</span>
                <ul class="social-icon social-default transparent-with-border justify-content-start mt--20">
                    <li>
                        <a href="https://www.facebook.com/">
                            <i class="feather-facebook"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.twitter.com/">
                            <i class="feather-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/">
                            <i class="feather-instagram"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.linkdin.com/">
                            <i class="feather-linkedin"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@if(Auth::check() && Auth::user()->role == 'student')
<div class="rbt-cart-side-menu">
    <div class="inner-wrapper">
        <div class="inner-top">
            <div class="content">
                <div class="title">
                    <h4 class="title mb--0">Giỏ hàng của bạn</h4>
                </div>
                <div class="rbt-btn-close" id="btn_sideNavClose">
                    <button class="minicart-close-button rbt-round-btn"><i class="feather-x"></i></button>
                </div>
            </div>
        </div>
        <nav class="side-nav w-100">
            <ul class="rbt-minicart-wrapper">
                @if(session('cart') == [] || is_null(session('cart')))
                    <p>Giỏ hàng của bạn đang trống</p>
                @else
                    @foreach(session('cart', []) as $id => $item)
                        <li id="li-{{ $id }}" class="minicart-item">
                            <div class="thumbnail">
                                <a href="#">
                                    <img src="{{ $item['image'] }}" alt="Course Images">
                                </a>
                            </div>
                            <div class="product-content">
                                <h6 class="title"><a href="">{{ $item['name'] }}</a></h6>
                                <span class="price">₫ {{ number_format($item['price']) }}</span>
                            </div>
                            <div class="close-btn">
                                <button data-id="{{ $id }}" data-url="{{ route('cart.remove', ['id' => $id]) }}"
                                        class="rbt-round-btn remove-item-cart">
                                    <i class="feather-x"></i>
                                </button>
                            </div>
                        </li>
                    @endforeach
                @endif
            </ul>
        </nav>

        <div class="rbt-minicart-footer">
            <hr class="mb--0">
            <div class="rbt-cart-subttotal">
                <p class="subtotal"><strong>Tổng cộng:</strong></p>
                <p class="price">₫ {{ number_format($totalMoney, 0) }}</p>
            </div>
            <hr class="mb--0">
            <div class="rbt-minicart-bottom mt--20">
                <form action="{{ route('cart.placeorder') }}" method="post">
                    @csrf
                    <div class="form-check">
                        <input class="form-check-input" value="VNBANK" type="radio" name="payment_method" id="bankCode">
                        <label class="form-check-label" for="bankCode">
                            Thanh toán qua thẻ ATM/Tài khoản nội địa
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="INTCARD" name="payment_method"
                               id="flexRadioDefault2" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            Thanh toán qua thẻ quốc tế
                        </label>
                    </div>
                    <div class="checkout-btn mt--20">
                        <button type="submit" class="rbt-btn btn-gradient icon-hover w-100 text-center">
                            <span class="btn-text">Thanh toán qua VNPAY</span>
                            <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endif
<a class="close_side_menu" href="javascript:void(0);"></a>
