@extends('admin.page.share.master')
@section('noi_dung')
    <div id="app">
        <div class="row">
            <div class="col-5 ">
                <div class="card">
                    <div class="card-header bg-primary">
                        Thêm Mới Danh Mục
                    </div>
                    <div class="card-body">
                        <div class="mb-2">
                            <label>Tên Danh Mục</label>
                            <input v-model="danh_muc.ten_danh_muc" type="text"class="form-control">
                        </div>
                        <div class="mb-2">
                            <label>Slug Danh Mục</label>
                            <input v-model="danh_muc.slug_danh_muc" type="text" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label>ID Chuyên Mục</label>
                            <select v-model="danh_muc.id_chuyen_muc" class="form-control">
                                <template v-for="(v, k) in list_chuyenmuc">
                                    <option v-bind:value="v.id">@{{ v.ten_chuyen_muc }}</option>
                                </template>
                            </select>

                        </div>
                        <div class="mb-2">
                            <label>Tình Trạng</label>
                            <select class="form-control" v-model="danh_muc.trang_thai">
                                <option value="1">Hiển Thị</option>
                                <option value="0">Tạm Tắt</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button v-on:click="themmoi()" class="btn btn-primary">Thêm Mới</button>
                    </div>

                </div>
            </div>
            <div class="col-7">
                <div class="card card-primary">
                    <div class="card-header">
                        Danh Sách Danh Mục
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Tên Danh Mục</th>
                                        <th class="text-center">Slug</th>
                                        <th class="text-center">ID Chuyên Mục</th>
                                        <th class="text-center">Tình Trạng</th>
                                        <th class="text-center">Date</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <template v-for="(value, key) in list_data">
                                        <tr>
                                            <th class="text-center align-middle">@{{ key + 1 }}</th>
                                            <td class="align-middle">@{{ value.ten_danh_muc }}</td>
                                            <td class="align-middle">@{{ value.slug_danh_muc }}</td>
                                            <td class="align-middle">@{{ value.ten_chuyen_muc }}</td>
                                            <td class="align-middle">
                                                <button v-on:click="doiTrangThai(value)" v-if="value.trang_thai==1"
                                                    class="btn btn-primary">Hiển Thị</button>
                                                <button v-on:click="doiTrangThai(value)" v-else class="btn btn-warning">Tạm
                                                    Tắt</button>
                                            </td>
                                            <td class="align-middle text-nowrap">@{{ value.created_at }}<br>
                                                @{{ value.updated_at }}
                                            </td>
                                            <td class="text-center text-nowrap">
                                                <button v-on:click="edit = Object.assign({}, value)" data-bs-toggle="modal"
                                                data-bs-target="#editModal"  class="btn btn-info">Cập Nhật</button>
                                                <button v-on:click="del=value" data-bs-toggle="modal"
                                                data-bs-target="#delModal" class="btn btn-info">Xoa</button>

                                            </td>
                                        </tr>
                                    </template>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Cập Nhật Danh Muc</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                            <div class="col">
                                                <label class="mb-2">Tên Danh Muc</label>
                                                <input v-model="edit.ten_danh_muc" type="text" class="form-control"
                                                    placeholder="Nhập vào tên phim">
                                            </div>
                                            <div class="col">
                                                <label class="mb-2">Slug Danh Muc</label>
                                                <input v-model="edit.slug_danh_muc" type="text" class="form-control"
                                                    placeholder="Nhập vào slug phim">
                                            </div>

                                            <div class="col">
                                                <label class="mb-2">ID Chuyen Muc</label>
                                                <select v-model="edit.id_chuyen_muc" class="form-control">
                                                    <template v-for="(v, k) in list_chuyenmuc">
                                                        <option v-bind:value="v.id">@{{ v.ten_chuyen_muc }}</option>
                                                    </template>
                                                </select>

                                            </div>
                                            <div class="col">
                                                <label class="mb-2">Trạng thái</label>
                                                <select class="form-control" v-model="edit.trang_thai">
                                                    <option value="1">Hiển Thị</option>
                                                    <option value="0">Tạm Tắt</option>
                                                </select>
                                            </div>



                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button v-on:click="capnhat()" type="button" class="btn btn-primary">Cập Nhật
                                            danh muc</button>
                                    </div>
                                </div>
                            </div>

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
                                                        class="text-danger">@{{ del.ten_danh_muc }}</b> này không!</div>
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
                    list_chuyenmuc: [],
                    danh_muc: {},
                    edit:{},
                    del:{},
                },
                created() {
                    this.loadData();
                },
                methods: {
                    loadData() {
                        axios
                            .post("{{ Route('danhmucData') }}")
                            .then((res) => {
                                this.list_data = res.data.data;
                                this.list_chuyenmuc = res.data.chuyenmuc;
                            });

                    },
                    themmoi() {
                        axios
                            .post("{{ Route('danhmucStore') }}", this.danh_muc)
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
                    doiTrangThai(payload){
                        axios
                            .post('{{Route("danhmucStatus")}}',payload)
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
                    capnhat() {
                        axios
                            .post("{{Route('danhmucupdate')}}", this.edit)
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
                            .post('{{Route("danhmucDel")}}', this.del)
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
                },
            });
        });
    </script>
@endsection
