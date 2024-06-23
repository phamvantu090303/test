@extends('client.share12.masterpase')
@section('noi_dung')
    <div class="main-wrapper" id="app">
        <!-- Page Section Start -->
        <div class="page-section section section-padding">
            <div class="container">
                <div class="row mbn-40 ">
                    <div class="col-12 mb-40">
                        <div class="cart-table table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="pro-thumbnail">Image</th>
                                        <th class="pro-title">Tên Sản Phẩm</th>
                                        <th class="pro-price">Thành Tiền</th>
                                        <th class="pro-quantity">Số Lượng</th>
                                        <th class="pro-quantity">Cập Nhật</th>

                                        <th class="pro-remove">Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <template v-for="(value, key) in data_gio_hang">
                                        <tr>
                                            <th class="text-center align-middle">@{{ key + 1 }}</th>
                                            <td class="align-middle text-center">
                                                <img class="rounded-circle p-1 border" width="90px" height="90px" v-bind:src="value.hinh_anh" alt="">
                                            </td>
                                            <td class="align-middle">@{{ value.ten_san_pham }}</td>
                                            <td class="align-middle">@{{ value.thanh_tien }}</td>

                                            <td class="pro-quantity">
                                                <div class="pro-qty">
                                                    <input type="number" v-model="value.so_luong">
                                                </div>
                                            </td>
                                            <td v-on:click="capnhat(value)" class="pro-add-cart"><a>Cập Nhật</a></td>
                                            <td v-on:click="Del(value)" class="pro-remove"><a>×</a></td>
                                        </tr>
                                    </template>
                                    <!-- Separate row for Đặt Hàng button -->
                                    <tr>
                                        <td colspan="6"></td> <!-- Empty cells to align with other columns -->
                                        <td v-on:click="dathang()" class="pro-add-cart text-right"><a>Đặt Hàng</a></td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>


                    </div>
                    <div class="col-lg-8 col-md-7 col-12 mb-40">
                        <div class="cart-buttons mb-30">

                            <a href="/">Continue Shopping</a>
                        </div>
                        <div class="cart-coupon">
                            <h4>Coupon</h4>
                            <p>Enter your coupon code if you have one.</p>
                             <div class="cuppon-form">
                                <input type="text" placeholder="Coupon code" />
                                <input type="submit" value="Apply Coupon" />
                             </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-5 col-12 mb-40">
                        <div class="cart-total fix">
                            <h3>Tổng Tiền </h3>
                            <table>
                                <tbody>
                                    <tr class="cart-subtotal">
                                        <th>Subtotal</th>
                                        <td><span class="amount">@{{data_don_hang}}</span></td>
                                    </tr>
                                    <tr class="order-total">
                                        <th>Total</th>
                                        <td>
                                            <strong><span class="amount">@{{data_don_hang}}</span></strong>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="proceed-to-checkout section mt-30">
                                <a href="#">Thanh Toán</a>
                            </div>
                        </div>
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
@endsection

@section('js')
    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
    <script>
        $(document).ready(function() {
            new Vue({
                el: '#app',
                data: {
                    data_gio_hang: [],
                    data_don_hang:0,//tổng tiền đơn hàng

                },
                created() {
                    this.loadData();
                },
                methods: {
                    loadData() {
                        axios
                            .get('{{ Route('datagiohang') }}')
                            .then((res) => {
                                this.data_gio_hang = res.data.data;
                                //tổng tiền trong giỏ hàng
                                this.data_don_hang = res.data.xxx;

                            });
                    },
                    dathang() {
                        var payload = {
                            'gio_hang'     :   this.data_gio_hang
                        };
                        axios
                            .post('{{ Route('dataDonHang') }}', payload)
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
                    Del(value) {
                        axios
                            .post("{{ Route('delgionhang') }}", value)
                            .then((res) => {
                                if (res.data.status) {
                                    toastr.success(res.data.message, 'Success');
                                    this.loadData();

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
                    capnhat(value){
                        axios
                            .post("{{ Route('updateGiohang') }}", value)
                            .then((res) => {
                              if(res.data.status) {
                                toastr.success(res.data.message, 'Success');
                                this.loadData();
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
