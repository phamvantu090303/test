 <!-- Header Section Start -->
 <div class="header-section section">

    <!-- Header Top Start -->
    <div class="header-top header-top-one bg-theme-two">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-center">

                <div class="col mt-10 mb-10 d-none d-md-flex">
                    <!-- Header Top Left Start -->
                    <div class="header-top-left">
                        <p>Welcome to WooDen Home</p>
                        <p>Hotline: <a href="tel:0123456789">0123 456 789</a></p>
                    </div><!-- Header Top Left End -->
                </div>

                <div class="col mt-10 mb-10">
                    <!-- Header Language Currency Start -->
                    <ul class="header-lan-curr">

                        <li><a href="#">eng</a>
                            <ul>
                                <li><a href="#">english</a></li>
                                <li><a href="#">spanish</a></li>
                                <li><a href="#">france</a></li>
                                <li><a href="#">russian</a></li>
                                <li><a href="#">chinese</a></li>
                            </ul>
                        </li>

                        <li><a href="#">$usd</a>
                            <ul>
                                <li><a href="#">pound</a></li>
                                <li><a href="#">dollar</a></li>
                                <li><a href="#">euro</a></li>
                                <li><a href="#">yen</a></li>
                            </ul>
                        </li>

                    </ul><!-- Header Language Currency End -->
                </div>

                <div class="col mt-10 mb-10">
                    <!-- Header Shop Links Start -->
                    <div class="header-top-right">

                        <p><a href="/logout">Logout My Account</a></p>
                        <p><a href="/login">Register|Login</a></p>

                    </div><!-- Header Shop Links End -->
                </div>
                {{-- đăng nhập bằng google --}}
                <div>
                    @if(Auth::check())
                        <span>Tài khoản: {{ Auth::user()->name }}</span>
                        <p><a href="/logoutgg">Đăng xuất</a></p>
                    @else
                        <p><a href="/login">Đăng nhập | Đăng ký</a></p>
                    @endif
                </div>


            </div>
        </div>
    </div><!-- Header Top End -->

    <!-- Header Bottom Start -->
    <div class="header-bottom header-bottom-one header-sticky">
        <div class="container-fluid">
            <div class="row menu-center align-items-center justify-content-between">

                <div class="col mt-15 mb-5">
                    <!-- Logo Start -->
                    <div class="header-logo">
                        <a href="index.html">
                            <img src="https://incucdep.com/wp-content/uploads/2014/12/logo-thoi-trang.jpg" style="height: 90px">
                        </a>
                    </div><!-- Logo End -->
                </div>

                <div class="col order-2 order-lg-3">
                    <!-- Header Advance Search Start -->
                    <div class="header-shop-links">

                        <div class="header-search">
                            <button class="search-toggle"><img src="/do_an_client/images/icons/search.png" alt="Search Toggle"><img class="toggle-close" src="/do_an_client/images/icons/close.png" alt="Search Toggle"></button>
                            <div class="header-search-wrap">
                                <form action="#">
                                    <input type="text" placeholder="Type and hit enter">
                                    <button><img src="/do_an_client/images/icons/search.png" alt="Search"></button>
                                </form>
                            </div>
                        </div>

                        <div class="header-wishlist">
                            <a href="wishlist.html"><img src="/do_an_client/images/icons/wishlist.png" alt="Wishlist"> <span>02</span></a>
                        </div>

                        <div class="header-mini-cart">
                            <a href="/chi-tiet-don-hang"><img src="/do_an_client/images/icons/cart.png" alt="Cart"> <span>Giỏ Hàng</span></a>
                        </div>

                    </div><!-- Header Advance Search End -->
                </div>

                <div class="col order-3 order-lg-2">
                    <div class="main-menu">
                        <nav>

                            <ul>
                                <li class="active"><a href="/">HOME</a>
                                    {{-- <ul class="sub-menu">
                                        <li class="active"><a href="index.html">Home One</a></li>
                                        <li><a href="index-2.html">Home Two</a></li>
                                        <li><a href="index-3.html">Home Three</a></li>
                                        <li><a href="index-box.html">Home Box</a></li>
                                    </ul> --}}
                                </li>
                                <li><a href="shop.html">SHOP</a>
                                    <ul class="sub-menu">
                                        <li><a href="shop.html">Shop</a></li>
                                        <li><a href="shop-left-sidebar.html">Shop Left Sidebar</a></li>
                                        <li><a href="shop-right-sidebar.html">Shop Right Sidebar</a></li>
                                        <li><a href="single-product.html">Single Product</a></li>
                                        <li><a href="single-product-left-sidebar.html">Single Product Left Sidebar</a></li>
                                        <li><a href="single-product-right-sidebar.html">Single Product Right Sidebar</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">PAGES</a>
                                    <ul class="sub-menu">
                                        <li><a href="cart.html">Cart</a></li>
                                        <li><a href="checkout.html">Checkout</a></li>
                                        <li><a href="login-register.html">Login & Register</a></li>
                                        <li><a href="my-account.html">My Account</a></li>
                                        <li><a href="wishlist.html">Wishlist</a></li>
                                        <li><a href="404.html">404 Error</a></li>
                                    </ul>
                                </li>
                                <li><a href="blog.html">BLOG</a>
                                    <ul class="sub-menu">
                                        <li><a href="blog.html">Blog</a></li>
                                        <li><a href="single-blog.html">Single Blog</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact.html">CONTACT</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <!-- Mobile Menu -->
                <div class="mobile-menu order-12 d-block d-lg-none col"></div>

            </div>
        </div>
    </div><!-- Header BOttom End -->

</div><!-- Header Section End -->
