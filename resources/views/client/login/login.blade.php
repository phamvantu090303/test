@extends('client.share12.masterpase')
@section('noi_dung')
    <div class="main-wrapper" id="app">
        <!-- Page Section Start -->
        <div class="page-section section section-padding">
            <div class="container">
                <div class="row mbn-40">

                    <div class="col-lg-4 col-12 mb-40">
                        <div class="login-register-form-wrap">
                            <h3>Login</h3>
                            <div class="row">
                                <div class="col-12 mb-15">
                                    <input v-model="dang_nhap.email" type="email" placeholder="Username or Email">
                                </div>
                                <div class="col-12 mb-15">
                                    <input v-model="dang_nhap.password" type="password" placeholder="Password">
                                </div>
                                <div class="col-12 text-right mb-15">
                                    <button v-on:click="login()" class="place-order mt-10">Login</button>
                                    <button class="place-order mt-10"><a href="/forgot-password">Quên Mật Khẩu</a></button>
                                </div>
                            </div>
                            <h4>You can also login with...</h4>
                            <div class="social-login">
                                <a href="{{ route('login-by-fb') }}"><i  class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="{{ route('login-by-gg') }}"><i class="fa fa-google-plus"></i></a>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-12 mb-40 text-center">
                        <span class="login-register-separator"></span>
                    </div>

                    <div class="col-lg-6 col-12 mb-40 ml-auto">
                        <div class="login-register-form-wrap">
                            <h3>Register</h3>
                            <div class="row">
                                <div class="col-md-6 col-12 mb-5">
                                    <label>Họ và Tên</label>
                                    <input v-model="them_moi.ho_va_ten" type="text" placeholder="First Name">
                                </div>

                                <div class="col-md-6 col-12 mb-5">
                                    <label>Địa Chỉ</label>
                                    <input v-model="them_moi.dia_chi" type="text" placeholder="Last Name">
                                </div>

                                <div class="col-md-6 col-12 mb-5">
                                    <label>ngay sinh </label>
                                    <input v-model="them_moi.ngay_sinh" type="date" placeholder="Email Address">
                                </div>

                                <div class="col-md-6 col-12 mb-5">
                                    <label>Email </label>
                                    <input v-model="them_moi.email" type="email" placeholder="Email Address">
                                </div>

                                <div class="col-md-6 col-12 mb-5">
                                    <label>Password</label>
                                    <input v-model="them_moi.password" type="password" placeholder="Phone number">
                                </div>

                                <div class="col-md-6 col-12 mb-5">
                                    <label>SDT</label>
                                    <input v-model="them_moi.so_dien_thoai" type="tel" placeholder="Company Name">
                                </div>

                                <div class="col-md-6 col-12 mb-5">
                                    <label>Nhập lại password*</label>
                                    <input v-model="them_moi.re_password" type="password" placeholder="Address line 1">

                                </div>

                            </div>
                            <button v-on:click="register()" class="place-order">Place order</button>

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
    <script>
        new Vue({
            el: '#app',
            data: {
                them_moi: {},
                dang_nhap: {},
            },
            created() {

            },
            methods: {
                register() {
                    axios
                        .post("{{ Route('register') }}", this.them_moi)
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
                login() {
                    axios
                        .post('{{ Route('login') }}', this.dang_nhap)
                        .then((res) => {
                            if (res.data.status) {
                                //khi đăng nhập middleware thành công nó sẽ dẫn về đường dấn này
                                // window.location.href = "/";
                                toastr.success(res.data.message, 'Success');
                                setTimeout(() => {
                                    window.location.href = "/";
                                }, 700);
                            } else {
                                toastr.error(res.data.message, 'Error');
                                //ngược lại thì đưa về trang đăng nhập
                                setTimeout(() => {
                                    window.location.href = "/login";
                                }, 700);
                            }
                        })
                },
            },
        });
    </script>
@endsection
