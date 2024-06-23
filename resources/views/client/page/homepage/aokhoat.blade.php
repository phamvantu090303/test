@extends('client.share12.masterpase')
@section('noi_dung')
<div class="main-wrapper">
    <!-- Page Section Start -->
    <div class="page-section section section-padding mt-10">
        <div class="container">

            <div class="row">
                <div class="row">
                    <div class="section-title text-center col mb-30">
                        <h1>Áo Khoát Thời Trang</h1>
                        <p>All popular product find here</p>
                    </div>
                </div>
                <div class="col-12">
                    <div class="product-show">
                        <h4>Show:</h4>
                        <select class="nice-select">
                            <option>8</option>
                            <option>12</option>
                            <option>16</option>
                            <option>20</option>
                        </select>
                    </div>
                    <div class="product-short">
                        <h4>Short by:</h4>
                        <select class="nice-select">
                            <option>Name Ascending</option>
                            <option>Name Descending</option>
                            <option>Date Ascending</option>
                            <option>Date Descending</option>
                            <option>Price Ascending</option>
                            <option>Price Descending</option>
                        </select>
                    </div>
                </div>

                @foreach ($noithat as $key => $value)
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
                <div class="col-12">
                    <ul class="page-pagination">
                        <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                    </ul>
                </div>

            </div>

        </div>
    </div><!-- Page Section End -->

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
</div>



</html>
@endsection
@section('js')

@endsection
