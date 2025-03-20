<div class="app-menu navbar-menu bg-main-aside overflow-y-auto" style="max-height: 100%">
    <div class="navbar-brand-box">
        <a href="{{ route('dashboard.index') }}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="" alt="" width="180px" height="auto">
            </span>
            <span class="logo-lg">
                <img src="" alt="" width="180px" height="auto">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>
    <div id="scrollbar">
        <div class="container-fluid">
            <div id="two-column-menu"></div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span class="text-light">Thống kê</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('dashboard.index') }}"
                        aria-expanded="{{ request()->is('dashboard*') ? 'true' : 'false' }}">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboards</span>
                    </a>
                </li>

                <li class="menu-title"><i class="ri-more-fill"></i> <span class="text-light">Quản lý</span></li>

                <!-- Sản phẩm -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarPages" data-bs-toggle="collapse" role="button"
                        aria-expanded="{{ request()->is('attribute*') || request()->is('brand*') || request()->is('product*') ? 'true' : 'false' }}"
                        aria-controls="sidebarPages">
                        <i class="ri-pages-line"></i> <span data-key="t-pages">Sản phẩm</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->is('attribute*') || request()->is('brand*') || request()->is('product*') ? 'show' : '' }}"
                        id="sidebarPages">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('attribute.catalogue.index') }}" class="nav-link">Nhóm thuộc tính</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('attribute.index') }}" class="nav-link">Thuộc tính</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('brand.index') }}" class="nav-link">Thương hiệu</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('product.catalogue.index') }}" class="nav-link">Nhóm sản phẩm</a>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarProduct" class="nav-link" data-bs-toggle="collapse" role="button"
                                    aria-expanded="{{ request()->is('product*') ? 'true' : 'false' }}"
                                    aria-controls="sidebarProduct">Sản phẩm</a>
                                <div class="collapse menu-dropdown {{ request()->is('product*') ? 'show' : '' }}"
                                    id="sidebarProduct">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="{{ route('product.index') }}" class="nav-link">Danh sách</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('product.create') }}" class="nav-link">Thêm mới</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Đơn hàng -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarOrders" data-bs-toggle="collapse" role="button"
                        aria-expanded="{{ request()->is('order*') ? 'true' : 'false' }}"
                        aria-controls="sidebarOrders">
                        <i class="fa-brands fa-shopify"></i> <span data-key="t-Orders">Đơn hàng</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->is('order*') ? 'show' : '' }}" id="sidebarOrders">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#sidebarorder" class="nav-link" data-bs-toggle="collapse" role="button"
                                    aria-expanded="{{ request()->is('order*') ? 'true' : 'false' }}"
                                    aria-controls="sidebarorder">Quản lý</a>
                                <div class="collapse menu-dropdown {{ request()->is('order*') ? 'show' : '' }}"
                                    id="sidebarorder">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="{{ route('order.index') }}" class="nav-link">Danh sách</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Doanh thu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarRevenue" data-bs-toggle="collapse" role="button"
                        aria-expanded="{{ request()->is('revenue*') ? 'true' : 'false' }}"
                        aria-controls="sidebarRevenue">
                        <i class="fa-solid fa-dollar-sign"></i> <span data-key="t-Revenues">Doanh thu</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->is('revenue*') ? 'show' : '' }}"
                        id="sidebarRevenue">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('revenue.index') }}" class="nav-link" data-key="t-starter">Quản lý</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Thành viên -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarMembers" data-bs-toggle="collapse" role="button"
                        aria-expanded="{{ request()->is('user*') ? 'true' : 'false' }}"
                        aria-controls="sidebarMembers">
                        <i class="ri-group-fill"></i> <span data-key="t-pages">Thành viên</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->is('user*') ? 'show' : '' }}"
                        id="sidebarMembers">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('user.catalogue.index') }}" class="nav-link">Nhóm thành viên</a>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarUser" class="nav-link" data-bs-toggle="collapse" role="button"
                                    aria-expanded="{{ request()->is('user*') && !request()->is('user.catalogue*') ? 'true' : 'false' }}"
                                    aria-controls="sidebarUser">Thành viên</a>
                                <div class="collapse menu-dropdown {{ request()->is('user*') && !request()->is('user.catalogue*') ? 'show' : '' }}"
                                    id="sidebarUser">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="{{ route('user.index') }}" class="nav-link">Quản lý</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('user.create') }}" class="nav-link">Thêm mới</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Voucher -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarPagesvoucher" data-bs-toggle="collapse" role="button"
                        aria-expanded="{{ request()->is('promotions*') ? 'true' : 'false' }}"
                        aria-controls="sidebarPagesvoucher">
                        <i class="fa-solid fa-ticket"></i> <span data-key="t-pages">Voucher</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->is('promotions*') ? 'show' : '' }}"
                        id="sidebarPagesvoucher">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#sidebarvoucher" class="nav-link" data-bs-toggle="collapse" role="button"
                                    aria-expanded="{{ request()->is('promotions*') ? 'true' : 'false' }}"
                                    aria-controls="sidebarvoucher">Quản lý</a>
                                <div class="collapse menu-dropdown {{ request()->is('promotions*') ? 'show' : '' }}"
                                    id="sidebarvoucher">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="{{ route('promotions.index') }}" class="nav-link">Danh sách</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('promotions.create') }}" class="nav-link">Thêm mới</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Đánh giá -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarPagescomment" data-bs-toggle="collapse" role="button"
                        aria-expanded="{{ request()->is('comment*') || request()->is('productreview*') ? 'true' : 'false' }}"
                        aria-controls="sidebarPagescomment">
                        <i class="fa-solid fa-comments"></i> <span data-key="t-pages">Đánh giá</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->is('comment*') || request()->is('productreview*') ? 'show' : '' }}"
                        id="sidebarPagescomment">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#sidebarcomment" class="nav-link" data-bs-toggle="collapse" role="button"
                                    aria-expanded="{{ request()->is('comment*') || request()->is('productreview*') ? 'true' : 'false' }}"
                                    aria-controls="sidebarcomment">Quản lý</a>
                                <div class="collapse menu-dropdown {{ request()->is('comment*') || request()->is('productreview*') ? 'show' : '' }}"
                                    id="sidebarcomment">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="{{ route('comment') }}" class="nav-link">Bài viết</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('productreview') }}" class="nav-link">Sản phẩm</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Bài viết -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarPageposts" data-bs-toggle="collapse" role="button"
                        aria-expanded="{{ request()->is('post*') ? 'true' : 'false' }}"
                        aria-controls="sidebarPageposts">
                        <i class="fa-solid fa-newspaper"></i> <span data-key="t-pageposts">Bài viết</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->is('post*') ? 'show' : '' }}"
                        id="sidebarPageposts">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('post.catalogue.index') }}" class="nav-link">Nhóm bài viết</a>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarPost" class="nav-link" data-bs-toggle="collapse" role="button"
                                    aria-expanded="{{ request()->is('post*') && !request()->is('post.catalogue*') ? 'true' : 'false' }}"
                                    aria-controls="sidebarPost">Bài viết</a>
                                <div class="collapse menu-dropdown {{ request()->is('post*') && !request()->is('post.catalogue*') ? 'show' : '' }}"
                                    id="sidebarPost">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="{{ route('post.index') }}" class="nav-link">Danh sách</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('post.create') }}" class="nav-link">Thêm mới</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Trang -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarPage" data-bs-toggle="collapse" role="button"
                        aria-expanded="{{ request()->is('home-components*') || request()->is('banner*') ? 'true' : 'false' }}"
                        aria-controls="sidebarPage">
                        <i class="fa-solid fa-image"></i> <span data-key="t-Page">Trang</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->is('homeview*') || request()->is('banner*') ? 'show' : '' }}"
                        id="sidebarPage">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('banner.index') }}" class="nav-link">Trang tĩnh</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('home-components.index') }}" class="nav-link">Trang chủ</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="menu-title"><i class="ri-more-fill"></i> <span class="text-light">Cấu Hình</span></li>

                <!-- Banner -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarBanner" data-bs-toggle="collapse" role="button"
                        aria-expanded="{{ request()->is('banner*') ? 'true' : 'false' }}"
                        aria-controls="sidebarBanner">
                        <i class="fa-solid fa-image"></i> <span data-key="t-Banner">Banner</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->is('banner*') ? 'show' : '' }}"
                        id="sidebarBanner">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#sidebarBannerManage" class="nav-link" data-bs-toggle="collapse" role="button"
                                    aria-expanded="{{ request()->is('banner*') ? 'true' : 'false' }}"
                                    aria-controls="sidebarBannerManage">Quản lý</a>
                                <div class="collapse menu-dropdown {{ request()->is('banner*') ? 'show' : '' }}"
                                    id="sidebarBannerManage">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="{{ route('banner.index') }}" class="nav-link">Danh sách</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Hệ thống -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarSystem" data-bs-toggle="collapse" role="button"
                        aria-expanded="{{ request()->is('system*') ? 'true' : 'false' }}"
                        aria-controls="sidebarSystem">
                        <i class="fa-solid fa-cogs"></i> <span data-key="t-System">Hệ thống</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->is('system*') ? 'show' : '' }}"
                        id="sidebarSystem">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('system.index') }}" class="nav-link">Thông tin hệ thống</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('menu.index') }}" class="nav-link">Menu</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="sidebar-background"></div>
</div>
<div class="vertical-overlay"></div>