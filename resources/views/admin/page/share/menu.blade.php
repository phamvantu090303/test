<div class="nav-container primary-menu">
    <div class="mobile-topbar-header">
        <div>
            <img src="/assets_admin/images/logo-icon.png" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Rukada</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <nav class="navbar navbar-expand-xl w-100">
        <ul class="navbar-nav justify-content-start flex-grow-1 gap-1">
            <li class="nav-item dropdown">
                <a href="javascript:;" class="nav-link dropdown-toggle dropdown-toggle-nocaret"
                    data-bs-toggle="dropdown">
                    <div class="parent-icon"><i class='bx bx-home-circle'></i>
                    </div>
                    <div class="menu-title">Dashboard</div>
                </a>
                <ul class="dropdown-menu">
                    <li> <a class="dropdown-item" href="/"><i class="bx bx-right-arrow-alt"></i>Default</a>
                    </li>
                </ul>
            </li>
            <a class="nav-link" href="/danhmuc">
                <div class="parent-icon"><i class="fa-solid fa-film"></i>
                </div>
                <div class="menu-title text-nowrap">Danh Mục</div>
            </a>
            <a class="nav-link" href="/chuyenmuc">
                <div class="parent-icon"><i class="fa-brands fa-chromecast"></i>
                </div>
                <div class="menu-title text-nowrap"> Chuyên Mục</div>
            </a>
            <a class="nav-link" href="/sanpham">
                <div class="parent-icon"><i class="fa-solid fa-thermometer"></i>
                </div>
                <div class="menu-title">Sản Phẩm</div>
            </a>
            <a class="nav-link" href="/danhsachtaikhoan">
                <div class="parent-icon"><i class="fa-regular fa-address-book"></i>
                </div>
                <div class="menu-title">Danh Sách Tài Khoản</div>
            </a>
            <a class="nav-link" href="/donhang">
                <div class="parent-icon"><i class="fa-solid fa-user"></i>
                </div>
                <div class="menu-title">Đơn Hàng</div>
            </a>
            <a class="nav-link" href="/taikhoanAdmin">
                <div class="parent-icon"><i class="fa-solid fa-bell"></i>
                </div>
                <div class="menu-title">Admin</div>
            </a>

            @php
                $admin = Auth::guard('admin')->user();
                $id_chuc_nang = 33;
                $user_login = Auth::guard('admin')->user();

                $check = \App\Models\QuyenChucNang::where('id_quyen', $user_login->id_quyen)
                                                ->where('id_chuc_nang', $id_chuc_nang)
                                                ->first();
            @endphp
            @if ($check)
                <a class="nav-link" href="/quyen">
                    <div class="parent-icon"><i class="fa-solid fa-user-shield"></i></div>
                    <div class="menu-title">Phân Quyền</div>
                </a>
            @endif
            <a class="nav-link" href="/slide">
                <div class="parent-icon"><i class="fa-regular fa-newspaper"></i>
                </div>
                <div class="menu-title">Slide</div>
            </a>
            <li class="nav-item dropdown">
                <a href="javascript:;" class="nav-link dropdown-toggle dropdown-toggle-nocaret"
                    data-bs-toggle="dropdown">
                    <div class="parent-icon"><i class="fa-solid fa-chart-line"></i>
                    </div>
                    <div class="menu-title">Thống Kê</div>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="dropdown-item" href="/admin/thong-ke/bt-1">
                            <i class="bx bx-right-arrow-alt"></i>
                            Phim nào có lượt mua nhiều nhất
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="/admin/thong-ke/bt-2">
                            <i class="bx bx-right-arrow-alt"></i>
                            Doanh thu từ ngày đến ngày
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="/admin/thong-ke/bt-2">
                            <i class="bx bx-right-arrow-alt"></i>
                            5 khách hàng mua vé nhiều
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="/admin/thong-ke/bt-2">
                            <i class="bx bx-right-arrow-alt"></i>
                            Các suất chiếu của phim
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="/admin/thong-ke/bt-2">
                            <i class="bx bx-right-arrow-alt"></i>
                            Công suất hoạt động của các phòng chiếu
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>

</div>
