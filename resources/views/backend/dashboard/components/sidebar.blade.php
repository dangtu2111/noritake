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
                    <a class="nav-link menu-link" href="#sidebarProducts" data-bs-toggle="collapse" role="button"
                        aria-expanded="{{ request()->is('attribute*') || request()->is('brand*') || request()->is('product*') ? 'true' : 'false' }}"
                        aria-controls="sidebarProducts">
                        <i class="ri-pages-line"></i> <span data-key="t-products">Sản phẩm</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->is('attribute*') || request()->is('brand*') || request()->is('product*') ? 'show' : '' }}"
                        id="sidebarProducts">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('brand.index') }}" class="nav-link">Thương hiệu</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('product.catalogue.index') }}" class="nav-link">Nhóm sản phẩm</a>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarProductList" class="nav-link" data-bs-toggle="collapse" role="button"
                                    aria-expanded="{{ request()->is('product*') ? 'true' : 'false' }}"
                                    aria-controls="sidebarProductList">Sản phẩm</a>
                                <div class="collapse menu-dropdown {{ request()->is('product*') ? 'show' : '' }}"
                                    id="sidebarProductList">
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
                        <i class="fa-brands fa-shopify"></i> <span data-key="t-orders">Đơn hàng</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->is('order*') ? 'show' : '' }}" id="sidebarOrders">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('order.index') }}" class="nav-link">Danh sách</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Doanh thu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarRevenue" data-bs-toggle="collapse" role="button"
                        aria-expanded="{{ request()->is('revenue*') ? 'true' : 'false' }}"
                        aria-controls="sidebarRevenue">
                        <i class="fa-solid fa-dollar-sign"></i> <span data-key="t-revenues">Doanh thu</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->is('revenue*') ? 'show' : '' }}"
                        id="sidebarRevenue">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('revenue.index') }}" class="nav-link">Quản lý</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Thành viên -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarMembers" data-bs-toggle="collapse" role="button"
                        aria-expanded="{{ request()->is('user*') ? 'true' : 'false' }}"
                        aria-controls="sidebarMembers">
                        <i class="ri-group-fill"></i> <span data-key="t-members">Thành viên</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->is('user*') ? 'show' : '' }}"
                        id="sidebarMembers">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('user.catalogue.index') }}" class="nav-link">Nhóm thành viên</a>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarUserList" class="nav-link" data-bs-toggle="collapse" role="button"
                                    aria-expanded="{{ request()->is('user*') && !request()->is('user.catalogue*') ? 'true' : 'false' }}"
                                    aria-controls="sidebarUserList">Thành viên</a>
                                <div class="collapse menu-dropdown {{ request()->is('user*') && !request()->is('user.catalogue*') ? 'show' : '' }}"
                                    id="sidebarUserList">
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
                    <a class="nav-link menu-link" href="#sidebarVouchers" data-bs-toggle="collapse" role="button"
                        aria-expanded="{{ request()->is('promotions*') ? 'true' : 'false' }}"
                        aria-controls="sidebarVouchers">
                        <i class="fa-solid fa-ticket"></i> <span data-key="t-vouchers">Voucher</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->is('promotions*') ? 'show' : '' }}"
                        id="sidebarVouchers">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#sidebarVoucherList" class="nav-link" data-bs-toggle="collapse" role="button"
                                    aria-expanded="{{ request()->is('promotions*') ? 'true' : 'false' }}"
                                    aria-controls="sidebarVoucherList">Quản lý</a>
                                <div class="collapse menu-dropdown {{ request()->is('promotions*') ? 'show' : '' }}"
                                    id="sidebarVoucherList">
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
                    <a class="nav-link menu-link" href="#sidebarReviews" data-bs-toggle="collapse" role="button"
                        aria-expanded="{{ request()->is('comment*') || request()->is('productreview*') ? 'true' : 'false' }}"
                        aria-controls="sidebarReviews">
                        <i class="fa-solid fa-comments"></i> <span data-key="t-reviews">Đánh giá</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->is('comment*') || request()->is('productreview*') ? 'show' : '' }}"
                        id="sidebarReviews">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#sidebarReviewList" class="nav-link" data-bs-toggle="collapse" role="button"
                                    aria-expanded="{{ request()->is('comment*') || request()->is('productreview*') ? 'true' : 'false' }}"
                                    aria-controls="sidebarReviewList">Quản lý</a>
                                <div class="collapse menu-dropdown {{ request()->is('comment*') || request()->is('productreview*') ? 'show' : '' }}"
                                    id="sidebarReviewList">
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
                    <a class="nav-link menu-link" href="#sidebarPosts" data-bs-toggle="collapse" role="button"
                        aria-expanded="{{ request()->is('post*') ? 'true' : 'false' }}"
                        aria-controls="sidebarPosts">
                        <i class="fa-solid fa-newspaper"></i> <span data-key="t-posts">Bài viết</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->is('post*') ? 'show' : '' }}"
                        id="sidebarPosts">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('post.catalogue.index') }}" class="nav-link">Nhóm bài viết</a>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarPostList" class="nav-link" data-bs-toggle="collapse" role="button"
                                    aria-expanded="{{ request()->is('post*') && !request()->is('post.catalogue*') ? 'true' : 'false' }}"
                                    aria-controls="sidebarPostList">Bài viết</a>
                                <div class="collapse menu-dropdown {{ request()->is('post*') && !request()->is('post.catalogue*') ? 'show' : '' }}"
                                    id="sidebarPostList">
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
                    <a class="nav-link menu-link" href="#sidebarPages" data-bs-toggle="collapse" role="button"
                        aria-expanded="{{ request()->is('home-components*') || request()->is('banner*') ? 'true' : 'false' }}"
                        aria-controls="sidebarPages">
                        <i class="fa-solid fa-image"></i> <span data-key="t-pages">Trang</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->is('home-components*') || request()->is('banner*') ? 'show' : '' }}"
                        id="sidebarPages">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('static-pages.index') }}" class="nav-link">Trang tĩnh</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('home-components.index') }}" class="nav-link">Trang chủ</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Câu hỏi liên hệ -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarContacts" data-bs-toggle="collapse" role="button"
                        aria-expanded="{{ request()->is('contact*') ? 'true' : 'false' }}"
                        aria-controls="sidebarContacts">
                        <i class="fas fa-address-card"></i> <span data-key="t-contacts">Câu hỏi liên hệ</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->is('contact*') ? 'show' : '' }}"
                        id="sidebarContacts">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('contact.index') }}" class="nav-link">Danh sách liên hệ</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Email yêu cầu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarEmails" data-bs-toggle="collapse" role="button"
                        aria-expanded="{{ request()->is('email*') ? 'true' : 'false' }}"
                        aria-controls="sidebarEmails">
                        <i class="fas fa-address-card"></i> <span data-key="t-emails">Email yêu cầu</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->is('email*') ? 'show' : '' }}"
                        id="sidebarEmails">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('email.index') }}" class="nav-link">Danh sách email yêu cầu</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="menu-title"><i class="ri-more-fill"></i> <span class="text-light">Cấu Hình</span></li>

                <!-- Banner -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarBanners" data-bs-toggle="collapse" role="button"
                        aria-expanded="{{ request()->is('banner*') ? 'true' : 'false' }}"
                        aria-controls="sidebarBanners">
                        <i class="fa-solid fa-image"></i> <span data-key="t-banners">Banner</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->is('banner*') ? 'show' : '' }}"
                        id="sidebarBanners">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('banner.index') }}" class="nav-link">Danh sách</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Hệ thống -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarSystem" data-bs-toggle="collapse" role="button"
                        aria-expanded="{{ request()->is('system*') ? 'true' : 'false' }}"
                        aria-controls="sidebarSystem">
                        <i class="fa-solid fa-cogs"></i> <span data-key="t-system">Hệ thống</span>
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