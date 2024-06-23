@extends('client.share12.masterpase')
@section('noi_dung')
    <div id="app">
        <div class="main-wrapper">
            <!-- Page Section Start -->
            <div class="page-section section section-padding">
                <div class="container">
                    <div class="row row-30 mbn-50">

                        <div class="col-12">
                            <div class="row row-20 mb-10">

                                <div class="col-lg-6 col-12 mb-40">
                                    <img style="height: 430px; width: 503px" v-bind:src="tt_san_pham.hinh_anh" alt="">
                                </div>

                                <div class="col-lg-6 col-12 mb-40">
                                    <div class="single-product-content">

                                        <div class="head">
                                            <div class="head-left">

                                                <h3 class="title">@{{ tt_san_pham.ten_san_pham }}</h3>

                                                <div class="ratting">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>

                                            </div>

                                            <div class="head-right">
                                                <span class="price">@{{ tt_san_pham.don_gia }}$</span>
                                            </div>
                                        </div>

                                        <div class="description">
                                            <p>@{{ tt_san_pham.mo_ta }}</p>
                                        </div>

                                        <span class="availability">Thể loại: <span>In Stock</span></span>

                                        <div class="quantity-colors">

                                            <div class="quantity">
                                                <h5>Số lượng:</h5>
                                                <div class="pro-qty">
                                                    <input id="soluong" v-model="soluong" type="number" value="1"
                                                        min="1">
                                                </div>
                                            </div>

                                            <div class="colors">
                                                <h5>Color:</h5>
                                                <div class="color-options">
                                                    <button style="background-color: #ff502e"></button>
                                                    <button style="background-color: #fff600"></button>
                                                    <button style="background-color: #1b2436"></button>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="actions">
                                            <button class="box" data-tooltip="Compare"><i
                                                    class="ti-control-shuffle"></i></button>
                                            <button class="box" data-tooltip="Wishlist"><i class="ti-heart"></i></button>
                                            <button v-on:click="addgiohang()"><span>ADD TO CART</span></button>


                                        </div>

                                        <div class="tags">

                                            <h5>Tags:</h5>
                                            <a href="#">Electronic</a>
                                            <a href="#">Smartphone</a>
                                            <a href="#">Phone</a>
                                            <a href="#">Charger</a>
                                            <a href="#">Powerbank</a>

                                        </div>

                                        <div class="share">

                                            <h5>Share: </h5>
                                            <a href="#"><i class="fa fa-facebook"></i></a>
                                            <a href="#"><i class="fa fa-twitter"></i></a>
                                            <a href="#"><i class="fa fa-instagram"></i></a>
                                            <a href="#"><i class="fa fa-google-plus"></i></a>

                                        </div>

                                    </div>
                                </div>

                            </div>

                            <div class="row mb-50">
                                <!-- Nav tabs -->
                                <div class="col-12">
                                    <ul class="pro-info-tab-list section nav">
                                        <li><a class="active" href="#more-info" data-toggle="tab">More info</a></li>
                                        <li><a href="#data-sheet" data-toggle="tab">Data sheet</a></li>
                                        <li><a href="#reviews" data-toggle="tab">Reviews</a></li>
                                    </ul>
                                </div>
                                <!-- Tab panes -->
                                <div class="tab-content col-12">
                                    <div class="pro-info-tab tab-pane active" id="more-info">
                                        <p>Fashion has been creating well-designed collections since 2010. The brand offers
                                            feminine designs delivering stylish separates and statement dresses which have
                                            since evolved into a full ready-to-wear collection in which every item is a
                                            vital part of a woman's wardrobe. The result? Cool, easy, chic looks with
                                            youthful elegance and unmistakable signature style. All the beautiful pieces are
                                            made in Italy and manufactured with the greatest attention. Now Fashion extends
                                            to a range of accessories including shoes, hats, belts and more!</p>
                                    </div>
                                    <div class="pro-info-tab tab-pane" id="data-sheet">
                                        <table class="table-data-sheet">
                                            <tbody>
                                                <tr class="odd">
                                                    <td>Compositions</td>
                                                    <td>Cotton</td>
                                                </tr>
                                                <tr class="even">
                                                    <td>Styles</td>
                                                    <td>Casual</td>
                                                </tr>
                                                <tr class="odd">
                                                    <td>Properties</td>
                                                    <td>Short Sleeve</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="pro-info-tab tab-pane" id="reviews">
                                        <a href="#">Be the first to write your review!</a>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <!-- Page Section End -->
        </div><!-- Related Product Section End -->

        <div class="section section-padding pt-0">
            <div class="container">
                <div class="row">
                    <div class="section-title text-left col col mb-30">
                        <h1>Sản Phẩm</h1>
                    </div>

                    <div class="related-product-slider related-product-slider-1 col-12 p-0">
                        @foreach ($allsanpham as $key => $value)
                            <div class="col">
                                <div class="product-item">
                                    <div class="product-inner">
                                        <div class="image">
                                            <a href="/film-detail/{{ $value->id }}">
                                                <img style="height: 300px" src="{{ $value->hinh_anh }}">
                                            </a>
                                        </div>
                                        <div class="content">
                                            <div class="content-left">
                                                <h4 class="title">
                                                    <a
                                                        href="/film-detail/{{ $value->id }}">{{ $value->ten_san_pham }}</a>
                                                </h4>
                                                <div class="ratting">
                                                    <!-- Your rating stars here -->
                                                </div>
                                                <h5 class="size">Size:
                                                    <span>S</span><span>M</span><span>L</span><span>XL</span>
                                                </h5>
                                                <h5 class="color">Color:
                                                    <span style="background-color: #ffb2b0"></span>
                                                    <span style="background-color: #0271bc"></span>
                                                    <span style="background-color: #efc87c"></span>
                                                    <span style="background-color: #00c183"></span>
                                                </h5>
                                            </div>
                                            <div class="content-right">
                                                <span class="price">{{ $value->don_gia }}$</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="brand-section section section-padding pt-0">
            <div class="container-fluid">
                <div class="row">
                    <div class="brand-slider">

                        <div class="brand-item col">
                            <img src="/do_an_client/images/brands/brand-1.png" alt="">
                        </div>

                        <div class="brand-item col">
                            <img src="/do_an_client/images/brands/brand-2.png" alt="">
                        </div>

                        <div class="brand-item col">
                            <img src="/do_an_client/images/brands/brand-3.png" alt="">
                        </div>

                        <div class="brand-item col">
                            <img src="/do_an_client/images/brands/brand-4.png" alt="">
                        </div>

                        <div class="brand-item col">
                            <img src="/do_an_client/images/brands/brand-5.png" alt="">
                        </div>

                        <div class="brand-item col">
                            <img src="/do_an_client/images/brands/brand-6.png" alt="">
                        </div>

                    </div>
                </div>
            </div>
        </div><!-- Brand Section End -->
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            new Vue({
                el: '#app',
                data: {
                    tt_san_pham: {},
                    soluong: '1',
                },
                created() {
                    this.loadData();
                },
                methods: {
                    convertIntToChar(number) {
                        return String.fromCharCode(65 + number);
                    },
                    loadData() {
                        var link = window.location.href;
                        var arr = link.split('/');
                        var payload = {
                            'id': arr[arr.length - 1]
                        }
                        axios
                        .post('{{ Route('getIdFilmDetail') }}', payload)
                            .then((res) => {
                                this.tt_san_pham = res.data.data;

                            })
                            .catch((res) => {
                                $.each(res.response.data.errors, function(k, v) {
                                    toastr.error(v[0], 'Error');
                                });
                            });

                    },

                    addgiohang() {
                        var link = window.location.href;
                        var arr = link.split('/');
                        var payload = {
                            'id': arr[arr.length - 1],
                            'soluong': $("#soluong").val(),
                        }
                        axios
                            .post('{{ Route('chitietgiohang') }}', payload)
                            .then((res) => {
                                if (res.data.status) {
                                    toastr.success(res.data.message, 'Success');
                                } else {
                                    toastr.error(res.data.message, 'Error');
                                }

                            })
                            .catch((res) => {
                                $.each(res.response.data.errors, function(k, v) {
                                    toastr.error(v[0], 'Error');
                                });
                            });

                    },

                },
            });
        });
    </script>
@endsection
