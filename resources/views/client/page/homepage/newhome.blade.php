@extends('client.share12.masterpase')
@section('noi_dung')

    <!-- Banner Section Start -->

    <div class="banner-section section mt-40">
        <div class="container-fluid">
            <div class="row row-10 mbn-20">

                <div class="col-lg-4 col-md-6 col-12 mb-20">
                    <div class="banner banner-1 content-left content-middle">

                        <a href="#" class="image"><img style="height: 213px; " src="https://dongphuchaianh.vn/wp-content/uploads/2022/06/thoi-trang-cong-so-han-quoc-ava.jpg"
                                alt="Banner Image"></a>

                        <div class="content">
                            <h1>New Arrival <br>Baby’s Shoe <br>GET 30% OFF</h1>
                            <a href="#" data-hover="SHOP NOW">SHOP NOW</a>
                        </div>

                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-12 mb-20">
                    <a href="#" class="banner banner-2">

                        <img style="height: 213px; " src="https://aokhoacnam.vn/upload/images/views/aokhoacnam/phoi-do-nam-mua-dong-han-quoc-1.jpg" alt="Banner Image">
                        <span class="banner-offer">25% off</span>

                    </a>
                </div>

                <div class="col-lg-4 col-md-6 col-12 mb-20">
                    <div class="banner banner-1 content-left content-top">

                        <a href="#" class="image"><img style="height: 213px" src="https://nguyentuanhung.vn/wp-content/uploads/2019/07/shopping-quan-ao-ngay-thu-shop-nha-kho-liti-3.jpg"
                                alt="Banner Image"></a>

                        <div class="content">
                            <h1>Trendy <br>Collections</h1>
                            <a href="#" data-hover="SHOP NOW">SHOP NOW</a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div><!-- Banner Section End -->



    <!-- Product Section Start -->
    <div class="product-section section section-padding">
        <div class="container">

            <div class="row">
                <div class="section-title text-center col mb-30">
                    <h1>Thời Trang Nam</h1>
                    <p>All popular product find here</p>
                </div>
            </div>

            <div class="row mbn-40">
                @foreach ($thoi_trang_nam as $key => $value)
                    <div class="col-xl-3 col-lg-4 col-md-6 col-12 mb-40">

                        <div class="product-item">
                            <div class="product-inner">

                                <div class="image">
                                    <a href="/film-detail/{{ $value->id }}"><img style="height: 285px; width: 250px"
                                            src="{{ $value->hinh_anh }}" alt=""></a>


                                </div>

                                <div class="content">

                                    <div class="content-left">

                                        <h4 class="title"><a href="/film-detail/{{ $value->id }}">{{ $value->ten_san_pham }}</a></h4>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>


                                        <h5 class="size">Size: <span>S</span><span>M</span><span>L</span><span>XL</span>
                                        </h5>
                                        <h5 class="color">Color: <span style="background-color: #ffb2b0"></span><span
                                                style="background-color: #0271bc"></span><span
                                                style="background-color: #efc87c"></span><span
                                                style="background-color: #00c183"></span></h5>


                                    </div>
                                    <div class="content-right">
										<span class="price">{{$value->don_gia}}$</span>
									</div>


                                </div>

                            </div>
                        </div>


                    </div>
                @endforeach
            </div>

        </div>
    </div>
    <!-- Product Section End -->

    <!-- Banner Section Start -->
    <div class="banner-section section section-padding pt-0 fix">
        <div class="row row-5 mbn-10">

            <div class="col-lg-4 col-md-6 col-12 mb-10">
                <div class="banner banner-3">

                    <a href="/giay-phukien" class="image"><img style="height: 285px; width: 600px" src="https://anhdep123.com/chiem-nguong-1001-hinh-anh-giay-dep-hot-hit-nhat-hanh-tinh/anh-giay-converse/"
                            alt="Banner Image"></a>

                    <div class="content" style="background-image: url(do_an_client/images/banner/banner-3-shape.png)">
                        <h1>Sản Phẩm</h1>
                        <h2>Giày Thiết Kế Nam Nữ</h2>
                        <h4>Best Seller</h4>
                    </div>

                    <a href="/giay-phukien" class="shop-link" data-hover="SHOP NOW">SHOP NOW</a>

                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-12 mb-10">
                <div class="banner banner-3">

                    <a href="/ao-khoat" class="image"><img style="height: 285px; width: 600px" src="https://cf.shopee.vn/file/sg-11134201-22100-395r2rhu3sivf8"
                            alt="Banner Image"></a>

                    <div class="content" style="background-image: url(do_an_client/images/banner/banner-3-shape.png)">
                        <h1>Sản Phẩm</h1>
                        <h2>Thời Trang Áo Khoát </h2>
                        <h4>Best Seller</h4>
                    </div>

                    <a href="/ao-khoat" class="shop-link" data-hover="SHOP NOW">SHOP NOW</a>

                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-12 mb-10">
                <div class="banner banner-3">

                    <a href="/thoi-trang-kinh-mat" class="image"><img style="height: 285px; width: 600px" src="https://cf.shopee.vn/file/3900cc05a2c78fa26ac234a554b1b253"
                            alt="Banner Image"></a>

                    <div class="content" style="background-image: (do_an_client/images/banner/banner-3-shape.png)">
                        <h1>Sản Phẩm</h1>
                        <h2>Kích Thời Trang 2024 </h2>
                        <h4>Best Seller</h4>
                    </div>

                    <a href="/thoi-trang-kinh-mat" class="shop-link" data-hover="SHOP NOW">SHOP NOW</a>

                </div>
            </div>

        </div>
    </div><!-- Banner Section End -->

    <!-- Product Section Start -->
    <div class="product-section section section-padding pt-0">
        <div class="container">
            <div class="row mbn-40">

                <div class="col-lg-4 col-md-6 col-12 mb-40">

                    <div class="row">
                        <div class="section-title text-left col mb-30">
                            <h1>Nổi Bật</h1>
                            <p>Exclusive deals for you</p>
                        </div>
                    </div>

                    <div class="best-deal-slider w-100">
                        @foreach ($slide as $key => $value)
                        <div class="slide-item">
                            <div class="best-deal-product">

                                <div class="image"><img style="height: 500px" src="{{ $value->hinh_anh }}"
                                        alt=""></div>

                                <div class="content-top">

                                    <div class="content-top-left">
                                        <h4 class="title"><a href="#">2 Piece Shirt Set</a></h4>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                        </div>
                                    </div>

                                    <div class="content-top-right">
                                        <span class="price">$13 <span class="old">$28</span></span>
                                    </div>

                                </div>

                                <div class="content-bottom">
                                    <div class="countdown" data-countdown="2021/06/20"></div>
                                    <a href="#" data-hover="SHOP NOW">SHOP NOW</a>
                                </div>

                            </div>
                        </div>
                        @endforeach


                    </div>

                </div>

                <div class="col-lg-8 col-md-6 col-12 pl-3 pl-lg-4 pl-xl-5 mb-40">

                    <div class="row">
                        <div class="section-title text-left col mb-30">
                            <h1>Thời Trang Nữ</h1>
                            <p>All featured product find here</p>
                        </div>
                    </div>

                    <div class="small-product-slider row row-7 mbn-40">
                        @foreach ($thoi_trang_nu as $key => $value)
                        <div class="col mb-40">

                            <div class="on-sale-product">

                                <a href="/film-detail/{{ $value->id }}" class="image"><img style="height: 285px" src="{{ $value->hinh_anh }}" alt=""></a>
                                <div class="content text-center">
                                    <h4 class="title"><a href="/film-detail/{{ $value->id }}">{{$value->ten_san_pham}}</a></h4>
                                    <span class="price">{{$value->don_gia}}$ <span class="old">$200</span></span>
                                    <div class="ratting">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                </div>
                            </div>

                        </div>
                        @endforeach

                    </div>

                </div>


            </div>
        </div>
    </div><!-- Product Section End -->

    <!-- Feature Section Start -->
    <div class="feature-section bg-theme-two section section-padding fix"
        style="background-image: url(do_an_client/images/pattern/pattern-dot.png);">
        <div class="container">
            <div class="feature-wrap row justify-content-between mbn-30">

                <div class="col-md-4 col-12 mb-30">
                    <div class="feature-item text-center">

                        <div class="icon"><img src="/do_an_client/images/feature/feature-1.png" alt=""></div>
                        <div class="content">
                            <h3>Giao Hàng Tận Nơi</h3>
                            <p>Miễn Phí</p>
                        </div>

                    </div>
                </div>

                <div class="col-md-4 col-12 mb-30">
                    <div class="feature-item text-center">

                        <div class="icon"><img src="https://theme.hstatic.net/200000065946/1001128819/14/vice_item_2_thumb.png?v=561" alt=""></div>
                        <div class="content">
                            <h3>Đổi Trả 1-1</h3>
                            <p>Trong Vòng 1 Năm</p>
                        </div>

                    </div>
                </div>

                <div class="col-md-4 col-12 mb-30">
                    <div class="feature-item text-center">

                        <div class="icon"><img src="https://theme.hstatic.net/200000065946/1001128819/14/vice_item_3_thumb.png?v=561" alt=""></div>
                        <div class="content">
                            <h3>Bảo Hành 2 Năm</h3>
                            <p>Miễn Phí</p>
                        </div>

                    </div>
                </div>
                <div class="col-md-4 col-12 mb-30">
                    <div class="feature-item text-center">

                        <div class="icon"><img src="https://theme.hstatic.net/200000065946/1001128819/14/vice_item_4_thumb.png?v=561" alt=""></div>
                        <div class="content">
                            <h3>Tư Vấn Thiết Kế</h3>
                            <p>Miễn Phí</p>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div><!-- Feature Section End -->

    <!-- Related Product Section Start -->
	<div class="section section-padding mt-5">
		<div class="container">
			<div class="row">

				<div class="section-title text-left col col mb-30">
					<h1>Shop BaBy</h1>
				</div>

				<div class="related-product-slider related-product-slider-1 col-12 p-0">
                    @foreach ($BaBy as $key => $value)
					<div class="col">

						<div class="product-item">
							<div class="product-inner">

								<div class="image">
									<a href="/film-detail/{{ $value->id }}" class="image"><img style="height: 300px" src="{{ $value->hinh_anh }}" alt=""></a>
								</div>

								<div class="content">

									<div class="content-left">

										<h4 class="title"><a href="/film-detail/{{ $value->id }}">{{$value->ten_san_pham}}</a></h4>

										<div class="ratting">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star-half-o"></i>
											<i class="fa fa-star-o"></i>
										</div>

										<h5 class="size">Size: <span>S</span><span>M</span><span>L</span><span>XL</span></h5>
										<h5 class="color">Color: <span style="background-color: #ffb2b0"></span><span style="background-color: #0271bc"></span><span style="background-color: #efc87c"></span><span style="background-color: #00c183"></span></h5>

									</div>

									<div class="content-right">
										<span class="price">{{$value->don_gia}}$</span>
									</div>

								</div>

							</div>
						</div>

					</div>
                    @endforeach

				</div>

			</div>
		</div>
	</div><!-- Related Product Section End -->


   <!-- Brand Section Start -->
   <div class="brand-section section section-padding pt-0">
    <div class="container-fluid">
        <div class="row">
            <div class="brand-slider">

                <div class="brand-item col">
                    <img src="do_an_client/images/brands/brand-1.png" alt="">
                </div>

                <div class="brand-item col">
                    <img src="do_an_client/images/brands/brand-2.png" alt="">
                </div>

                <div class="brand-item col">
                    <img src="do_an_client/images/brands/brand-3.png" alt="">
                </div>

                <div class="brand-item col">
                    <img src="do_an_client/images/brands/brand-4.png" alt="">
                </div>

                <div class="brand-item col">
                    <img src="do_an_client/images/brands/brand-5.png" alt="">
                </div>

                <div class="brand-item col">
                    <img src="do_an_client/images/brands/brand-6.png" alt="">
                </div>

            </div>
        </div>
    </div>
</div><!-- Brand Section End -->
@endsection
@section('js')
@endsection
