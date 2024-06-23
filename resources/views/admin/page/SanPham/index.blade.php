@extends('admin.page.share.master')
@section('noi_dung')
    <div class="row" id="app">
        <div class="col-3">

            <div class="card border-primary border-bottom border-3 border-0">
                <div class="card-header mt-2">
                    <h6>Thêm Mới Sản Phẩm</h6>
                </div>
                <div class="card-body">
                    <label class="mb-2">Tên San Phẩm</label>
                    <input v-model="them_moi_sp.ten_san_pham" type="text" class="form-control mb-2"
                        placeholder="Nhập vào tên phòng">
                    <label class="mb-2">Slug sản phẩm</label>
                    <input v-model="them_moi_sp.slug_san_pham" type="text" class="form-control mb-2"
                        placeholder="Nhập vào loại máy chiếu">
                    <label class="mb-2">Hình ảnh</label>
                    <input v-model="them_moi_sp.hinh_anh" type="text" class="form-control mb-2"
                        placeholder="Nhập vào số ghế hàng ngang">
                        <label class="mb-2">Đơn Giá</label>
                        <input v-model="them_moi_sp.don_gia" type="number" class="form-control mb-2"
                            placeholder="Nhập vào số ghế hàng ngang">
                        <label class="mb-2">Danh Mục</label>
                        <select v-model="them_moi_sp.id_danh_muc" class="form-control">
                            <template v-for="(v, k) in list_danhmuc">
                                <option v-bind:value="v.id">@{{ v.ten_danh_muc }}</option>
                            </template>
                        </select>
                    <label class="mb-2">Mô Tả</label>
                    <input v-model="them_moi_sp.mo_ta" type="text" class="form-control mb-2"
                        placeholder="Nhập vào số ghế hàng dọc">
                    <label class="mb-2">Tình Trạng</label>
                    <select class="form-control mb-2" v-model="them_moi_sp.trang_thai">
                        <option value="1">Hoạt Động</option>
                        <option value="0">Dừng Hoạt Động</option>
                    </select>

                </div>
                <div class="card-footer text-end">
                    <button v-on:click="themmoi()" class="btn btn-primary">Thêm Mới Sản phẩm</button>
                </div>
            </div>


        </div>

        <div class="col-9">
            <div class="card border-danger border-bottom border-3 border-0">
                <div class="card-header mt-2">
                    <h6>Danh Sách Sản phẩm</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center align-middle text-nowrap">#</th>
                                    <th class="text-center align-middle text-nowrap">Tên sản phẩm</th>
                                    <th class="text-center align-middle text-nowrap">Danh Mục</th>
                                    <th class="text-center align-middle text-nowrap">Slug sản phẩm</th>
                                    <th class="text-center align-middle text-nowrap">Hình ảnh </th>
                                    <th class="text-center align-middle text-nowrap">Đơn Giá</th>
                                    <th class="text-center align-middle text-nowrap">Mô tả</th>
                                    <th class="text-center align-middle text-nowrap">created</th>
                                    <th class="text-center align-middle text-nowrap">Tình trạng</th>
                                    <th class="text-center align-middle text-nowrap">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-for="(value, key) in list_data">
                                    <tr>
                                        <th class="text-center align-middle">@{{ key + 1 }}</th>
                                        <td class="align-middle">@{{ value.ten_san_pham }}</td>

                                        <td class="align-middle">@{{ value.ten_danh_muc }}</td>
                                        <td class="align-middle">@{{ value.slug_san_pham }}</td>
                                        <td class="align-middle text-center">
                                            <img v-bind:src="value.hinh_anh" class="rounded-circle p-1 border"
                                                width="90px" height="90px">
                                        </td>
                                        <td class="text-nowrap align-middle">
                                            @{{ value.don_gia }}
                                        </td>
                                        <td class="text-nowrap align-middle">
                                            @{{ value.mo_ta }}
                                        </td>
                                        <td class="text-nowrap align-middle">
                                            @{{ value.created_at}}
                                        </td>
                                        <td class="text-nowrap align-middle text-center">
                                            <button v-on:click="doiTrangThai(value)" v-if="value.trang_thai==1" class="btn btn-primary">Hiển Thị</button>
                                            <button v-on:click="doiTrangThai(value)" v-else class="btn btn-warning">Tạm Tắt</button>
                                        </td>
                                        <td class="text-nowrap align-middle text-center">
                                            <button v-on:click="edit = Object.assign({}, value)" data-bs-toggle="modal"
                                                data-bs-target="#editModal" class="btn btn-info">Cập Nhật</button>
                                            <button v-on:click="del=value"  data-bs-toggle="modal"
                                                data-bs-target="#delModal" class="btn btn-danger">Hủy Bỏ</button>
                                        </td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>



                    </div>
                    <div class="modal fade" id="delModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa san pham</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="alert alert-warning border-0 bg-warning alert-dismissible fade show py-2">
                                        <div class="d-flex align-items-center">
                                            <div class="font-35 text-dark"><i class='bx bx-info-circle'></i>
                                            </div>
                                            <div class="ms-3">
                                                <h6 class="mb-0 text-dark">Warning Alerts</h6>
                                                <input type="hidden" id="id_xoa">
                                                <div class="text-dark">Bạn có chắc chắn muốn xóa san pham <b
                                                        class="text-danger">@{{ del.ten_san_pham }}</b> này không!</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button v-on:click="Del()" type="button" class="btn btn-primary"
                                        data-bs-dismiss="modal">Xác Nhận Xóa</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Cập Nhật Sản Phẩm</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                        <div class="col">
                                            <label class="mb-2">Tên sản phẩm</label>
                                            <input v-model="edit.ten_san_pham" type="text" class="form-control"
                                                placeholder="Nhập vào tên phim">
                                        </div>
                                        <div class="col">
                                            <label class="mb-2">Slug sản phẩm</label>
                                            <input v-model="edit.slug_san_pham" type="text" class="form-control"
                                                placeholder="Nhập vào slug phim">
                                        </div>
                                        <div class="col">
                                            <label class="mb-2">Hình Ảnh</label>
                                            <input v-model="edit.hinh_anh" type="text" class="form-control"
                                                placeholder="Nhập vào ảnh đại diện">
                                        </div>
                                        <div class="col">
                                            <label class="mb-2">Đơn Giá</label>
                                            <input v-model="edit.don_gia" type="number" class="form-control"
                                                placeholder="Nhập vào ảnh đại diện">
                                        </div>
                                        <div class="col">
                                            <label class="mb-2">Danh muc</label>
                                            <select v-model="edit.id_danh_muc" class="form-control">
                                                <template v-for="(v, k) in list_danhmuc">
                                                    <option v-bind:value="v.id">@{{ v.ten_danh_muc }}</option>
                                                </template>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label class="mb-2">mô tả</label>
                                            <input v-model="edit.mo_ta" type="text" class="form-control"
                                                placeholder="Nhập vào mô tả">
                                        </div>
                                        <div class="col">
                                            <label class="mb-2">Trạng thái</label>
                                            <input v-model="edit.trang_thai" type="text" class="form-control"
                                                placeholder="">
                                        </div>



                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button v-on:click="capnhat()" type="button" class="btn btn-primary">Cập Nhật
                                        sản phẩm</button>
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
    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
    <script>
        $(document).ready(function() {
            new Vue({
                el: '#app',
                data: {
                    list_data: [],
                    list_danhmuc: [],
                    them_moi_sp: {},
                    edit : {},
                    del:{},
                },
                created() {
                    this.loadData();
                },
                methods: {

                    loadData() {
                        axios
                            .post("{{ Route('sanphamData') }}")
                            .then((res) => {
                                this.list_data = res.data.data;
                                this.list_danhmuc = res.data.danhmuc;

                            });

                    },
                    themmoi() {
                        axios
                            .post("{{ Route('sanphamStore') }}", this.them_moi_sp)
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
                    capnhat() {
                        axios
                            .post("{{Route('sanphamupdate')}}", this.edit)
                            .then((res) => {
                                if(res.data.status) {
                                toastr.success(res.data.message, 'Success');
                                this.loadData();
                                $('#editModal').modal('hide');
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
                    Del(){
                        axios
                            .post('{{Route("sanphamDel")}}', this.del)
                            .then((res) => {
                            if(res.data.status) {
                                toastr.success(res.data.message, 'Success');
                                this.loadData();
                                $('#delModal').modal('hide');
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
                    doiTrangThai(payload){
                        axios
                            .post('{{Route("sanphamStatus")}}',payload)
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
                    }

                },
            });
        });
    </script>
@endsection
