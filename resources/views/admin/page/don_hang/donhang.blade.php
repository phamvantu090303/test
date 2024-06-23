@extends('admin.page.share.master')
@section('noi_dung')
    <div class="row" id="app">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mt-2">Danh Sách Đơn Hàng</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Tên Khách Hàng</th>
                                    <th class="text-center">Mã Đơn Hàng</th>
                                    <th class="text-center">Tổng Tiền</th>
                                    <th class="text-center">is thanh toán</th>
                                    <th class="text-center">Ngày Hóa Đơn</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-for="(value, key) in list_don_hang">
                                    <tr>
                                        <th class="text-center">@{{ key + 1 }}</th>
                                        <td class="align-middle text-nowrap">@{{ value.ho_va_ten }}</td>
                                        <td class="text-center align-middle text-nowrap">@{{ value.ma_don_hang }}</td>
                                        <td class="align-middle text-nowrap">@{{ number_format(value.tong_tien) }}</td>
                                        <td class="align-middle text-nowrap">@{{ value.is_thanh_toan }}</td>
                                        <td class="text-center align-middle">@{{ date_format(value.created_at) }}</td>
                                        <td class="text-center align-middle">
                                            <button v-on:click="chitiet(value)" class="btn btn-primary"
                                                data-bs-toggle="modal" data-bs-target="#chitiet">Chi Tiết</button>
                                            <button v-on:click="del=value" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#delModal">Xóa</button>
                                        </td>

                                    </tr>
                                </template>
                            </tbody>
                        </table>
                        <div class="modal fade" id="chitiet" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Chi Tiết Đơn Hàng</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center align-middle text-nowrap">#</th>
                                                        <th class="text-center align-middle text-nowrap">Tên sản phẩm</th>
                                                        <th class="text-center align-middle text-nowrap">Hình ảnh</th>
                                                        <th class="text-center align-middle text-nowrap">Tình Trạng</th>
                                                        <th class="text-center align-middle text-nowrap">số lượng</th>
                                                        <th class="text-center align-middle text-nowrap">Đơn giá</th>
                                                        <th class="text-center align-middle text-nowrap">giá tiền</th>
                                                        <th class="text-center align-middle text-nowrap">mô tả</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <template v-for="(value, key) in ct_don_hang">
                                                        <tr>
                                                            <th class="text-center">@{{ key + 1 }}</th>
                                                            <td class="text-center">@{{ value.ten_san_pham }}</td>
                                                            <td class="align-middle text-center">
                                                                <img v-bind:src="value.hinh_anh"
                                                                    class="rounded-circle p-1 border" width="90px"
                                                                    height="90px">
                                                            </td>
                                                            <td class="text-center">@{{ value.trang_thai }}</td>

                                                            <td class="text-center">@{{ value.so_luong }}</td>
                                                            <td class="text-center">@{{ value.don_gia }}</td>
                                                            <td class="text-center">@{{ value.tong_tien }}</td>
                                                            <td class="text-center">@{{ value.mo_ta }}</td>
                                                        </tr>
                                                    </template>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="modal fade" id="delModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa Đơn Hàng</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div
                                            class="alert alert-warning border-0 bg-warning alert-dismissible fade show py-2">
                                            <div class="d-flex align-items-center">
                                                <div class="font-35 text-dark"><i class='bx bx-info-circle'></i>
                                                </div>
                                                <div class="ms-3">
                                                    <h6 class="mb-0 text-dark">Warning Alerts</h6>
                                                    <input type="hidden" id="id_xoa">
                                                    <div class="text-dark ">Bạn có chắc chắn muốn xóa đơn hàng <b
                                                            class="text-danger">@{{ del.ho_va_ten }}</b> này không!</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button v-on:click="Del()" type="button" class="btn btn-primary"
                                            data-bs-dismiss="modal">Xác Nhận Xóa</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        new Vue({
            el: '#app',
            data: {
                list_don_hang: [],
                ct_don_hang: [],
                del: {},
            },
            created() {
                this.getDataDonHang();
            },
            methods: {
                getDataDonHang() {
                    axios
                        .post("{{ Route('data') }}")
                        .then((res) => {
                            this.list_don_hang = res.data.data;
                            //    console.log(this.list_don_hang );
                        })
                        .catch((res) => {
                            $.each(res.response.data.errors, function(k, v) {
                                toastr.error(v[0]);
                            });
                        });
                },
                chitiet(value) {
                    axios
                        .post("{{ Route('dataChiTietDonHang') }}", value)
                        .then((res) => {
                            this.ct_don_hang = res.data.data;
                            // console.log(this.ct_don_hang);
                        })
                        .catch((res) => {
                            $.each(res.response.data.errors, function(k, v) {
                                toastr.error(v[0]);
                            });
                        });
                },
                Del() {
                    axios
                        .post("{{ Route('Delchitietdonhang') }}", this.del)
                        .then((res) => {
                            if (res.data.status) {
                                toastr.success(res.data.message, 'Success');
                            } else {
                                toastr.error(res.data.message, 'Error');
                            }
                            this.getDataDonHang();
                        })
                        .catch((res) => {
                            $.each(res.response.data.errors, function(k, v) {
                                toastr.error(v[0]);
                            });
                        });
                },
                date_format(now) {
                    return moment(now).format('DD/MM/yyyy HH:mm');
                },
                number_format(number) {
                    return new Intl.NumberFormat('vi', {
                        style: 'currency',
                        currency: 'VND'
                    }).format(number)
                },
            },
        });
    </script>
@endsection
