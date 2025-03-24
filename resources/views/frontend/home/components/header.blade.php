<header id="site-header" class="main-header mainHeader_temp_2">
    <div class="navigation-header">
        <div class="container-fluid f1">
            <div class="row flex-nowrap flexContainer-header justify-content-between flex-end">
                <div class="col-md-4 wrapper-header-blank"></div>
                <div class="col-md-4 wrapper-header-logo">
                    <div class="wrap-logo text-center" itemscope="" itemtype="http://schema.org/Organization">
                        <a href="{{ route('home_index.index') }}" itemprop="url" aria-label="logo">
                            <img itemprop="logo"
                                src="/file.hstatic.net/200000296482/file/logo_1c90af075f3541399f3f74a35237f63c.png"
                                alt="Thương hiệu đồ gốm sứ Nhật Bản cao cấp">
                        </a>
                        <!--<h1 style="display:none">
                  <a href="https://noritake.vn" itemprop="url">Thương hiệu sứ số 1 Nhật Bản</a>
                </h1>-->
                    </div>
                </div>
                <div class="col-md-4 wrapper-header-icon">
                    <div class="header-action-icon d-flex justify-content-end ">
                        <div class="search-bar-mobile d-block">
                            <div class="search-box wpo-wrapper-search">
                                <form action="https://noritake.vn/search"
                                    class="searchform searchform-categoris ultimate-search">
                                    <div class="wpo-search-inner">
                                        <input type="hidden" name="type" value="product" />
                                        <input required id="inputSearchAuto-mb" name="q" maxlength="40"
                                            autocomplete="off" class="searchinput input-search search-input" type="text"
                                            size="20" placeholder="Tìm kiếm sản phẩm..."
                                            aria-label="Tìm kiếm sản phẩm...">
                                    </div>
                                    <button type="submit" class="btn-search btn" id="search-header-btn-mb"
                                        aria-label="Button icon search">
                                        <span class="search-icon">
                                            <svg version="1.1" class="svg search" xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                viewBox="0 0 24 27" style="enable-background:new 0 0 24 27;"
                                                xml:space="preserve">
                                                <path
                                                    d="M10,2C4.5,2,0,6.5,0,12s4.5,10,10,10s10-4.5,10-10S15.5,2,10,2z M10,19c-3.9,0-7-3.1-7-7s3.1-7,7-7s7,3.1,7,7S13.9,19,10,19z">
                                                </path>
                                                <rect x="17" y="17"
                                                    transform="matrix(0.7071 -0.7071 0.7071 0.7071 -9.2844 19.5856)"
                                                    width="4" height="8"></rect>
                                            </svg>
                                        </span>
                                        <span class="search-close">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z">
                                                </path>
                                            </svg>
                                        </span>
                                    </button>
                                </form>
                                <div id="ajaxSearchResults-mb" class="smart-search-wrapper ajaxSearchResults"
                                    style="display: none">
                                    <div class="resultsContent"></div>
                                </div>
                            </div>
                        </div>
                        <div class="wrap-search header-action">
                            <a id="site-search-handle" class="header-action-toggle icon-state"
                                href="javascript:void(0)">
                                <span class="box-action-icon">
                                    <svg class="svg--icon svg-icon-search" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px"
                                        viewBox="0 0 451 451" style="enable-background:new 0 0 451 451;"
                                        xml:space="preserve">
                                        <g>
                                            <path
                                                d="M447.05,428l-109.6-109.6c29.4-33.8,47.2-77.9,47.2-126.1C384.65,86.2,298.35,0,192.35,0C86.25,0,0.05,86.3,0.05,192.3   s86.3,192.3,192.3,192.3c48.2,0,92.3-17.8,126.1-47.2L428.05,447c2.6,2.6,6.1,4,9.5,4s6.9-1.3,9.5-4   C452.25,441.8,452.25,433.2,447.05,428z M26.95,192.3c0-91.2,74.2-165.3,165.3-165.3c91.2,0,165.3,74.2,165.3,165.3   s-74.1,165.4-165.3,165.4C101.15,357.7,26.95,283.5,26.95,192.3z">
                                            </path>
                                        </g>
                                    </svg>
                                    <span class="box-icon--close">
                                        <svg viewBox="0 0 19 19">
                                            <path
                                                d="M9.1923882 8.39339828l7.7781745-7.7781746 1.4142136 1.41421357-7.7781746 7.77817459 7.7781746 7.77817456L16.9705627 19l-7.7781745-7.7781746L1.41421356 19 0 17.5857864l7.7781746-7.77817456L0 2.02943725 1.41421356.61522369 9.1923882 8.39339828z"
                                                fill="currentColor" fill-rule="evenodd"></path>
                                        </svg>
                                    </span>
                                </span>
                            </a>
                            <div class="header_dropdown_content site_search">
                                <span class="box-triangle">
                                    <svg viewBox="0 0 20 9">
                                        <path
                                            d="M.47108938 9c.2694725-.26871321.57077721-.56867841.90388257-.89986354C3.12384116 6.36134886 5.74788116 3.76338565 9.2467995.30653888c.4145057-.4095171 1.0844277-.40860098 1.4977971.00205122L19.4935156 9H.47108938z"
                                            fill="#ffffff"></path>
                                    </svg>
                                </span>
                                <div class="site-nav-container">
                                    <p class="titlebox-search">Tìm kiếm</p>
                                    <div class="wpo-wrapper-search pt-3">
                                        <form action="https://noritake.vn/search"
                                            class="searchform searchform-categoris ultimate-search mb-2">
                                            <div class="wpo-search-inner">
                                                <input type="hidden" name="type" value="product" />
                                                <input required id="inputSearchAuto" name="q" maxlength="40"
                                                    autocomplete="off" class="searchinput input-search search-input"
                                                    type="text" size="20" placeholder="Tìm kiếm sản phẩm..."
                                                    aria-label="Tìm kiếm sản phẩm...">
                                            </div>
                                            <button type="submit" class="btn btn-search" id="search-header-btn-dk"
                                                aria-label="Button icon search">
                                                <svg version="1.1" class="svg search" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                    viewBox="0 0 24 27" style="enable-background:new 0 0 24 27;"
                                                    xml:space="preserve">
                                                    <path
                                                        d="M10,2C4.5,2,0,6.5,0,12s4.5,10,10,10s10-4.5,10-10S15.5,2,10,2z M10,19c-3.9,0-7-3.1-7-7s3.1-7,7-7s7,3.1,7,7S13.9,19,10,19z">
                                                    </path>
                                                    <rect x="17" y="17"
                                                        transform="matrix(0.7071 -0.7071 0.7071 0.7071 -9.2844 19.5856)"
                                                        width="4" height="8"></rect>
                                                </svg>
                                            </button>
                                        </form>
                                        <div id="ajaxSearchResults" class="smart-search-wrapper ajaxSearchResults"
                                            style="display: none">
                                            <div class="resultsContent"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="wrap-account header-action">
                            <a id="site-account-handle" class="header-action-toggle icon-state"
                                href="javascript:void(0);" aria-label="Tài khoản">
                                <span class="box-action-icon">
                                    <svg class="svg--icon svg-icon-account" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px"
                                        viewBox="0 0 488.9 488.9" style="enable-background:new 0 0 488.9 488.9;"
                                        xml:space="preserve">
                                        <g>
                                            <path
                                                d="M477.7,454.8v-26c0-26.5-12.4-52-33.1-68.1c-48.2-37.4-97.3-63.5-114.5-72.2v-29.7c3.5-7.8,6.4-16.3,8.6-25.5   c12.8-4.6,19.8-23.4,24.5-40c6.3-22.1,5.6-37.6-1.8-46.2c7.8-42.5,4.3-73.8-10.3-93.1c-7.7-10.1-16.7-14.4-22.7-16.3   c-4.3-6-13-16.1-27.7-24.2C285.5,4.5,268.4,0,249.6,0c-3.4,0-6.8,0.2-9.8,0.4c-8.4,0.4-16.7,2-24.9,4.7c-0.1,0-0.2,0.1-0.3,0.1   c-9,3.1-17.8,7.6-26.3,13.4c-9.7,6.2-18.6,13.6-26.3,21.8c-15.1,15.5-25.1,33-29.4,51.7c-4.1,15.5-4.4,31.1-1,46.4   c-1.8,1.3-3.4,2.8-4.8,4.6c-6.9,9.1-7.2,23.4-1.1,45.1c4.2,15,9.8,30.3,19.3,37.2c2.8,14.4,7.5,27.5,13.8,39.1v24.1   c-17.2,8.7-66.3,34.7-114.5,72.2c-20.7,16.1-33.1,41.5-33.1,68.1v26c0,18.8,15.3,34,34,34h398.5   C462.4,488.9,477.7,473.6,477.7,454.8z M35.6,454.8v-26c0-19,8.8-37.2,23.6-48.7c52-40.3,104.9-66.9,115-71.8   c5.6-2.7,9.1-8.3,9.1-14.6v-32.5c0-2.2-0.6-4.3-1.7-6.2c-6.6-11.2-11.2-24.6-13.5-39.9c-0.8-4.9-4.4-8.8-9.1-10   c-1.3-1.5-5-6.9-9.7-23.6c-3.9-13.8-3.6-20.2-3.2-22.5c3.9,0.2,7.8-1.6,10.3-4.7c2.6-3.3,3.3-7.7,1.9-11.6   c-5.2-14.5-5.8-29.4-1.8-44.6c3.4-14.6,11.2-28.2,23.3-40.6c6.5-7,14-13.1,22-18.2c0.1-0.1,0.3-0.2,0.4-0.3   c6.7-4.7,13.7-8.2,20.6-10.6c0.1,0,0.2-0.1,0.2-0.1c5.9-2,12-3.1,18.4-3.4c17.5-1.5,33.2,1.8,47.1,9.9   c15.2,8.4,21.4,19.4,21.4,19.4c1.9,3.9,5.3,6.2,9.7,6.5c0.3,0,6.8,1,12.4,8.9c5.9,8.4,14.3,30,3.8,80.4c-1.2,5.6,1.7,11.2,6.8,13.6   c0.5,1.8,1.3,7.9-3,23.1c-3.8,13.4-6.9,19.5-8.7,22.2c-2.3-0.4-4.7-0.2-6.9,0.8c-3.8,1.6-6.6,5.1-7.3,9.1c-2.1,12-5.5,22.8-9.9,32   c-0.8,1.7-1.2,3.5-1.2,5.3v37.6c0,6.3,3.5,11.8,9.1,14.6c10.1,4.9,63,31.6,114.9,71.8c14.8,11.5,23.6,29.7,23.6,48.7v26   c0,5.2-4.3,9.5-9.5,9.5H45.2C39.9,464.4,35.6,460.1,35.6,454.8z">
                                            </path>
                                        </g>
                                    </svg>
                                    <span class="box-icon--close">
                                        <svg viewBox="0 0 19 19">
                                            <path
                                                d="M9.1923882 8.39339828l7.7781745-7.7781746 1.4142136 1.41421357-7.7781746 7.77817459 7.7781746 7.77817456L16.9705627 19l-7.7781745-7.7781746L1.41421356 19 0 17.5857864l7.7781746-7.77817456L0 2.02943725 1.41421356.61522369 9.1923882 8.39339828z"
                                                fill="currentColor" fill-rule="evenodd"></path>
                                        </svg>
                                    </span>
                                </span>
                            </a>
                            <div id="account-popover" class="header_dropdown_content site_account ">
                                <span class="box-triangle">
                                    <svg class="icon--nav-triangle" viewBox="0 0 20 9">
                                        <path
                                            d="M.47108938 9c.2694725-.26871321.57077721-.56867841.90388257-.89986354C3.12384116 6.36134886 5.74788116 3.76338565 9.2467995.30653888c.4145057-.4095171 1.0844277-.40860098 1.4977971.00205122L19.4935156 9H.47108938z"
                                            fill="#ffffff"></path>
                                    </svg>
                                </span>
                                <div class="site-nav-container text-center">
                                    @guest
                                    <!-- Hiển thị form đăng nhập nếu chưa đăng nhập -->
                                    <div class="popover-panel_list">
                                        <div id="header-login-panel"
                                            class="popover-panel popover-panel_default is-selected">
                                            <div class="popover-inner">
                                                <form accept-charset="UTF-8" action="{{ route('store.login') }}"
                                                    method="post">
                                                    @csrf
                                                    <div class="popover_header">
                                                        <p class="popover_title">Đăng nhập tài khoản</p>
                                                        <p class="popover_legend">Nhập email và mật khẩu của bạn:</p>
                                                    </div>
                                                    <div
                                                        class="form-group form-input-wrapper form-input-wrapper_labelled">
                                                        <input type="email" class="form-field_text form-control"
                                                            name="email" id="email" placeholder="Nhập email"
                                                            value="{{ old('email') }}">
                                                        @error('email')
                                                        <span class="text-danger fz-12 mt-1">{{ $message }}</span>
                                                        @enderror
                                                        <label for="login-customer[email]"
                                                            class="text-field form-floating_label">Email</label>
                                                    </div>
                                                    <div
                                                        class="form-group form-input-wrapper form-input-wrapper_labelled">
                                                        <input id="password-input" name="password" required
                                                            type="password" placeholder="Mật khẩu" autocomplete="off"
                                                            class="form-field_text form-control">
                                                        <label for="login-customer[password]"
                                                            class="text-field form-floating_label">Mật khẩu</label>
                                                    </div>
                                                    <button type="submit" class="form-submit btn btn-box dark">Đăng
                                                        nhập</button>
                                                </form>
                                                <div class="popover-secondary-action">
                                                    <p class="mb-2">Khách hàng mới?
                                                        <a href="{{ route('auth.register') }}" class="link">Tạo tài
                                                            khoản</a>
                                                    </p>
                                                    <p class="mb-0">Quên mật khẩu?
                                                        <a href="{{ route('password.confirm_email') }}"
                                                            class="link-accented link">Khôi phục mật khẩu</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endguest

                                    @auth
                                    <ul class="popover-panel_list">
                                        <li><a class="  form-control" href="{{ route("profile.user") }}">Trang cá
                                                nhân</a></li>
                                        <li><a class="  form-control" href="">Đơn hàng của tôi</a></li>
                                        <li>
                                            <form action="{{ route('auth.logout') }}" method="POST">
                                                @csrf
                                                <button type="submit" class="dropdown-item">Đăng xuất</button>
                                            </form>
                                        </li>
                                    </ul>
                                    <!-- Hiển thị dropdown nếu đã đăng nhập -->

                                    @endauth
                                </div>

                            </div>
                        </div>
                        <div class="wrap-cart header-action">
                            <a id="site-cart-handle" class="header-action-toggle icon-state" href="javascript:void(0)">
                                <span class="box-action-icon">
                                    <svg class="svg--icon svg-icon-cart" version="1.1"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        x="0px" y="0px" width="22px" height="24px" viewBox="0 0 22 24"
                                        enable-background="new 0 0 22 24" xml:space="preserve">
                                        <path fill="none" stroke="currentColor" stroke-width="1.15"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                            d="M14.622,17.984v-1.791c0-1.353,1.097-2.45,2.45-2.45s2.45,1.097,2.45,2.45v1.947">
                                        </path>
                                        <line fill="none" stroke="currentColor" stroke-width="1.15"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                            x1="3.563" y1="21.844" x2="11.172" y2="21.844">
                                        </line>
                                        <path fill="none" stroke="currentColor" stroke-width="1.15"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                            d="M13.101,7.719V4.653c0-2.087-1.692-3.78-3.78-3.78c-2.087,0-3.779,1.692-3.779,3.78v3.066">
                                        </path>
                                        <path fill="none" stroke="currentColor" stroke-width="1.15"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                            d="M3.513,21.844c-1.34,0-2.427-1.087-2.427-2.427l0.184-2.167L2.322,5.179h14l0.569,6.306">
                                        </path>
                                        <path fill="none" stroke="currentColor" stroke-width="1.15"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                            d="M20.854,23.141h-7.56c-0.055,0-0.1-0.045-0.1-0.1v-4.8c0-0.055,0.045-0.1,0.1-0.1h7.56c0.055,0,0.1,0.045,0.1,0.1v4.8 C20.954,23.096,20.909,23.141,20.854,23.141z">
                                        </path>
                                    </svg>
                                    <span class="count-holder">
                                        <span class="count">0</span>
                                    </span>
                                    <span class="box-icon--close">
                                        <svg viewBox="0 0 19 19">
                                            <path
                                                d="M9.1923882 8.39339828l7.7781745-7.7781746 1.4142136 1.41421357-7.7781746 7.77817459 7.7781746 7.77817456L16.9705627 19l-7.7781745-7.7781746L1.41421356 19 0 17.5857864l7.7781746-7.77817456L0 2.02943725 1.41421356.61522369 9.1923882 8.39339828z"
                                                fill="currentColor" fill-rule="evenodd"></path>
                                        </svg>
                                    </span>
                                </span>
                            </a>
                            <div class="header_dropdown_content site_cart">
                                <span class="box-triangle">
                                    <svg class="icon--nav-triangle" viewBox="0 0 20 9">
                                        <path
                                            d="M.47108938 9c.2694725-.26871321.57077721-.56867841.90388257-.89986354C3.12384116 6.36134886 5.74788116 3.76338565 9.2467995.30653888c.4145057-.4095171 1.0844277-.40860098 1.4977971.00205122L19.4935156 9H.47108938z"
                                            fill="#ffffff"></path>
                                    </svg>
                                </span>
                                <div class="site-nav-container">
                                    <div class="mini-cart_alert-wrapper">
                                        <p class="title-box">Giỏ hàng</p>
                                    </div>
                                    <div id="clone-item-cart" class="clone-tiem-cart">
                                        <div class="mini-cart_line-item list-item d-none">
                                            <div class="mini-cart_image-wrapper img">
                                                <a href="#"><img src="#" alt="" /></a>
                                            </div>
                                            <div class="mini-cart_item-wrapper item">
                                                <a href="#" class="mini-cart_product-title link pro-title-view"
                                                    title=""></a>
                                                <span class="mini-cart_product-variant variant"></span>
                                                <span class="mini-cart_product-quantity pro-quantity-view"></span>
                                                <span class="mini-cart_product-price pro-price-view"></span>
                                                <span
                                                    class="mini-cart_product-remove-item remove_link remove-cart"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mini-cart_inner">
                                        <div class="mini-cart_content">
                                            <div class="mini-cart_scroll">
                                                <div class="mini-cart_line-item-list" id="cart-view">
                                                    <div class="mini-cart_empty-state">
                                                        <svg width="65" height="65" viewBox="0 0 81 70">
                                                            <g transform="translate(0 2)" stroke-width="4"
                                                                stroke="#333333" fill="none" fill-rule="evenodd">
                                                                <circle stroke-linecap="square" cx="34" cy="60" r="6">
                                                                </circle>
                                                                <circle stroke-linecap="square" cx="67" cy="60" r="6">
                                                                </circle>
                                                                <path
                                                                    d="M22.9360352 15h54.8070373l-4.3391876 30H30.3387146L19.6676025 0H.99560547">
                                                                </path>
                                                            </g>
                                                        </svg>
                                                        <p class="m-0">Hiện chưa có sản phẩm</p>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mini-cart_total-recap">
                                        <div
                                            class="mini-cart_price-total-line d-flex justify-content-between align-items-center">
                                            <span>TỔNG TIỀN:</span>
                                            <span id="total-view-cart">0₫</span>
                                        </div>
                                        <div class="mini-cart_button-container d-flex ">
                                            <a href="{{ route('cart.index') }}" class="link-to-cart btn-box dark">Xem
                                                giỏ hàng</a>
                                            <a href="{{ route('order.checkout') }}"
                                                class="link-to-checkout btn-box btnred">Thanh toán</a>
                                        </div>
                                    </div>
                                </div>
                            </div>





                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom">
        <div class="wrapper-header-nav header-action d-block">
            <div class="site-handle" id="site-menu-handle">

                <div id="menu-mobile-icon" class="icon-nav icon-state">
                    <span class="header-action-toggle-menu hamburger-menu" aria-hidden="true">
                        <svg class="svg--icon icon--hamburger-mobile" viewBox="0 0 20 16">
                            <path d="M0 14h20v2H0v-2zM0 0h20v2H0V0zm0 7h20v2H0V7z" fill="currentColor"
                                fill-rule="evenodd"></path>
                        </svg>

                        <span class="box-icon--close">
                            <svg viewBox="0 0 19 19">
                                <path
                                    d="M9.1923882 8.39339828l7.7781745-7.7781746 1.4142136 1.41421357-7.7781746 7.77817459 7.7781746 7.77817456L16.9705627 19l-7.7781745-7.7781746L1.41421356 19 0 17.5857864l7.7781746-7.77817456L0 2.02943725 1.41421356.61522369 9.1923882 8.39339828z"
                                    fill="currentColor" fill-rule="evenodd"></path>
                            </svg>
                        </span>

                    </span>
                </div>

                <!--<div id="menu-desktop-icon" class="icon-nav icon-state">
								<span class="header-action-toggle trai hamburger-menu" aria-hidden="true">
									<svg class="svg--icon icon--hamburger-mobile" viewBox="0 0 20 16">
										<path d="M0 14h20v2H0v-2zM0 0h20v2H0V0zm0 7h20v2H0V7z" fill="currentColor" fill-rule="evenodd"></path>
									</svg>
								</span>
							</div>-->

                <div id="menu-desktop-icon" class="icon-nav icon-state">
                    <a href="{{ route('home_index.index') }}" class="trai home-icon" aria-hidden="true"
                        style="color: #fff;">
                        <!-- SVG biểu tượng Home -->
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                            style="padding-top: 4px; padding-bottom: 2px;">
                            <path d="M12 3L2 12H5V21H10V15H14V21H19V12H22L12 3Z" fill="currentColor" />
                        </svg>
                    </a>
                </div>

            </div>
            <div class="header_dropdown_content site_menu_mobile mobile-menu-icon">
                <span class="box-triangle">
                    <svg viewBox="0 0 20 9">
                        <path
                            d="M.47108938 9c.2694725-.26871321.57077721-.56867841.90388257-.89986354C3.12384116 6.36134886 5.74788116 3.76338565 9.2467995.30653888c.4145057-.4095171 1.0844277-.40860098 1.4977971.00205122L19.4935156 9H.47108938z"
                            fill="#ffffff"></path>
                    </svg>
                </span>
                <div class="site-nav-container-menu">
                    <div class="menu-mobile-content">
                        <nav id="mb-menu">
                            <div class="navbar-level" data-level="1">
                                <ul class="menuList-sub vertical-menu-list sub-child">
                                    <li>
                                        <a class="parent" href="{{ route('home_index.index') }}">
                                            <span style="font-size: 17px; font-weight: 500;">TRANG CHỦ</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a class="parent" href="collections/new-arrival.html">
                                            <span style="font-size: 17px; font-weight: 400;">Sản phẩm mới</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a class="parent" href="collections/kiet-tac-phien-ban-gioi-han.html">
                                            <span style="font-size: 17px; font-weight: 400;">Kiệt tác phiên bản giới
                                                hạn</span>
                                        </a>
                                    </li>



                                    <li class="accordion" id="accordionExample2">
                                        <div class="card">
                                            <div class="card-header" id="headingOne">
                                                <div class="mb-0">
                                                    <button class="btn btn-link menu-mobile-button"
                                                        data-toggle="collapse" data-target="#collapseOne2"
                                                        aria-expanded="true" aria-controls="collapseOne2">
                                                        <span style="font-weight: 500; font-size: 17px;">Tìm theo loại
                                                            sản phẩm</span>
                                                        <span class="icon-control">
                                                            <img id="icon-plus-2"
                                                                src="../file.hstatic.net/200000296482/file/icons8-plus-24_056a68c5ba51474ea67c80ccdd68c0c1.png">
                                                            <img id="icon-minus-2"
                                                                src="../file.hstatic.net/200000296482/file/icons8-minus-24_9763de20001449b39af4c7b544d27690.png">
                                                            <!--<i id="icon-plus-2" class="fa fa-plus" aria-hidden="true"></i>
            							<i id="icon-minus-2" class="fa fa-minus" aria-hidden="true"></i>-->
                                                        </span>
                                                    </button>
                                                </div>
                                            </div>
                                            <div id="collapseOne2" class="collapse" aria-labelledby="headingOne"
                                                data-parent="#accordionExample2">
                                                <ul class="card-body">
                                                    <li>
                                                        <img style="width: 50px"
                                                            src="../file.hstatic.net/200000296482/file/bo-ban-tra_d2ebb2ea983a4a0e9cec3f625c037487.png">
                                                        <a class="parent" href="collections/coc-su-ly-su.html">Cốc sứ
                                                            (ly sứ)</a>
                                                    </li>
                                                    <li style="border-bottom: 1px solid #d7d7d7;;">
                                                        <img style="width: 50px"
                                                            src="../file.hstatic.net/200000296482/file/bo-ban-an-chau-a_633264541fd44401b9a9f3159fd8aa34.png">
                                                        <a class="parent"
                                                            href="collections/nap-coc-su-nap-ly-su.html">Nắp cốc sứ (ly
                                                            sứ)</a>
                                                    </li>
                                                    <li>
                                                        <img style="width: 50px"
                                                            src="../file.hstatic.net/200000296482/file/bo-ban-an-chau-au_0e5003f327c04f988d9163da98b48fad.png">
                                                        <a class="parent" href="collections/am-tra-binh-tra.html">Ấm trà
                                                            (bình trà)</a>
                                                    </li>
                                                    <li>
                                                        <img style="width: 50px"
                                                            src="../file.hstatic.net/200000296482/file/su-trang-khong-hoa-tiet_1cf2df365e824392b8248e6a3cd7d7df.png">
                                                        <a class="parent"
                                                            href="collections/chen-tra-tach-tra-va-dia-lot.html">Chén
                                                            trà (tách
                                                            trà) & đĩa lót</a>
                                                    </li>
                                                    <li>
                                                        <img style="width: 50px"
                                                            src="../file.hstatic.net/200000296482/file/ly-coc-uong-nuoc_68481bd8dcd947b7b0b46963d988776d.png">
                                                        <a class="parent" href="collections/hu-dung-sua.html">Hũ đựng
                                                            sữa</a>
                                                    </li>
                                                    <li style="border-bottom: 1px solid #d7d7d7;;">
                                                        <img style="width: 50px"
                                                            src="../file.hstatic.net/200000296482/file/binh-hoa-khung-tranh_cddf35af2f324a21ba82d32c46188c5e.png">
                                                        <a class="parent" href="collections/hu-dung-duong.html">Hũ đựng
                                                            đường</a>
                                                    </li>
                                                    <li>
                                                        <img style="width: 50px"
                                                            src="../product.hstatic.net/200000296482/product/mc04_-_ac-ph_f2af86724a0b449dab88aebfface6aae_master.jpg">
                                                        <a class="parent" href="collections/bat-com-chen-com.html">Bát
                                                            (chén) cơm (11cm -
                                                            12,5cm)</a>
                                                    </li>
                                                    <li>
                                                        <img style="width: 50px"
                                                            src="../file.hstatic.net/200000296482/file/phu-kien-ban-tra_d81b87e9702a402da9cd601c9311067d.png">
                                                        <a class="parent"
                                                            href="collections/bat-dung-nuoc-cham-bat-an-sup.html">Bát
                                                            (chén) đựng
                                                            nước chấm, súp</a>
                                                    </li>
                                                    <li>
                                                        <img style="width: 50px"
                                                            src="../file.hstatic.net/200000296482/file/phu-kien-ban-tra_d81b87e9702a402da9cd601c9311067d.png">
                                                        <a class="parent"
                                                            href="collections/bat-chen-da-nang-dung-trai-cay-ngu-coc.html">Bát
                                                            (chén) đa năng</a>
                                                    </li>
                                                    <li>
                                                        <img style="width: 50px"
                                                            src="../file.hstatic.net/200000296482/file/phu-kien-ban-tra_d81b87e9702a402da9cd601c9311067d.png">
                                                        <a class="parent"
                                                            href="collections/bat-chen-cream-soup-02-quai-cam.html">Bát
                                                            (chén)
                                                            creamsoup 02 quai cầm</a>
                                                    </li>
                                                    <li>
                                                        <img style="width: 50px"
                                                            src="../file.hstatic.net/200000296482/file/phu-kien-ban-tra_d81b87e9702a402da9cd601c9311067d.png">
                                                        <a class="parent"
                                                            href="collections/bat-an-yen-co-nap-day.html">Bát (chén) ăn
                                                            yến có nắp
                                                            đậy</a>
                                                    </li>
                                                    <li>
                                                        <img style="width: 50px"
                                                            src="../file.hstatic.net/200000296482/file/phu-kien-ban-tra_d81b87e9702a402da9cd601c9311067d.png">
                                                        <a class="parent" href="collections/bat-my-to-my.html">Bát mỳ
                                                            (tô mỳ)</a>
                                                    </li>
                                                    <li>
                                                        <img style="width: 50px"
                                                            src="../file.hstatic.net/200000296482/file/phu-kien-ban-tra_d81b87e9702a402da9cd601c9311067d.png">
                                                        <a class="parent"
                                                            href="collections/bat-soup-to-soup-cac-loai.html">Bát ăn
                                                            soup (tô ăn
                                                            soup)</a>
                                                    </li>
                                                    <li>
                                                        <img style="width: 50px"
                                                            src="../file.hstatic.net/200000296482/file/phu-kien-ban-tra_d81b87e9702a402da9cd601c9311067d.png">
                                                        <a class="parent" href="collections/bat-canh-to-canh.html">Bát
                                                            canh (tô canh)</a>
                                                    </li>
                                                    <li>
                                                        <img style="width: 50px"
                                                            src="../file.hstatic.net/200000296482/file/phu-kien-ban-tra_d81b87e9702a402da9cd601c9311067d.png">
                                                        <a class="parent" href="collections/dia-sau-long.html">Đĩa sâu
                                                            lòng</a>
                                                    </li>
                                                    <li>
                                                        <img style="width: 50px"
                                                            src="../file.hstatic.net/200000296482/file/phu-kien-ban-tra_d81b87e9702a402da9cd601c9311067d.png">
                                                        <a class="parent" href="collections/dia-dung-khan-lanh.html">Đĩa
                                                            đựng khăn lạnh</a>
                                                    </li>
                                                    <li>
                                                        <img style="width: 50px"
                                                            src="../file.hstatic.net/200000296482/file/phu-kien-ban-tra_d81b87e9702a402da9cd601c9311067d.png">
                                                        <a class="parent" href="collections/dia-dung-nuoc-cham.html">Đĩa
                                                            đựng nước chấm (8cm -
                                                            11cm)</a>
                                                    </li>
                                                    <li>
                                                        <img style="width: 50px"
                                                            src="../file.hstatic.net/200000296482/file/phu-kien-ban-tra_d81b87e9702a402da9cd601c9311067d.png">
                                                        <a class="parent" href="collections/dia-lot-bat-com.html">Đĩa
                                                            lót bát (chén) cơm (15cm -
                                                            18cm)</a>
                                                    </li>
                                                    <li>
                                                        <img style="width: 50px"
                                                            src="../file.hstatic.net/200000296482/file/phu-kien-ban-tra_d81b87e9702a402da9cd601c9311067d.png">
                                                        <a class="parent" href="collections/dia-tron-co-vua.html">Đĩa
                                                            tròn cỡ vừa (19cm -
                                                            24cm)</a>
                                                    </li>
                                                    <li>
                                                        <img style="width: 50px"
                                                            src="../file.hstatic.net/200000296482/file/phu-kien-ban-tra_d81b87e9702a402da9cd601c9311067d.png">
                                                        <a class="parent" href="collections/dia-tron-co-lon.html">Đĩa
                                                            tròn cỡ lớn (26cm -
                                                            30cm)</a>
                                                    </li>
                                                    <li>
                                                        <img style="width: 50px"
                                                            src="../file.hstatic.net/200000296482/file/phu-kien-ban-tra_d81b87e9702a402da9cd601c9311067d.png">
                                                        <a class="parent" href="collections/dia-oval-co-nho.html">Đĩa
                                                            Oval cỡ nhỏ (26cm -
                                                            32cm)</a>
                                                    </li>
                                                    <li>
                                                        <img style="width: 50px"
                                                            src="../file.hstatic.net/200000296482/file/phu-kien-ban-tra_d81b87e9702a402da9cd601c9311067d.png">
                                                        <a class="parent" href="collections/dia-oval-co-vua.html">Đĩa
                                                            Oval cỡ vừa (34cm -
                                                            38cm)</a>
                                                    </li>
                                                    <li>
                                                        <img style="width: 50px"
                                                            src="../file.hstatic.net/200000296482/file/phu-kien-ban-tra_d81b87e9702a402da9cd601c9311067d.png">
                                                        <a class="parent" href="collections/dia-oval-co-lon.html">Đĩa
                                                            Oval cỡ lớn (39cm trở
                                                            lên)</a>
                                                    </li>
                                                    <li>
                                                        <img style="width: 50px"
                                                            src="../file.hstatic.net/200000296482/file/phu-kien-ban-tra_d81b87e9702a402da9cd601c9311067d.png">
                                                        <a class="parent" href="collections/dia-hinh-vuong.html">Đĩa
                                                            hình vuông</a>
                                                    </li>
                                                    <li>
                                                        <img style="width: 50px"
                                                            src="../file.hstatic.net/200000296482/file/phu-kien-ban-tra_d81b87e9702a402da9cd601c9311067d.png">
                                                        <a class="parent" href="collections/dia-hinh-chu-nhat.html">Đĩa
                                                            hình chữ nhật</a>
                                                    </li>
                                                    <li>
                                                        <img style="width: 50px"
                                                            src="../file.hstatic.net/200000296482/file/phu-kien-ban-tra_d81b87e9702a402da9cd601c9311067d.png">
                                                        <a class="parent" href="collections/dia-hinh-luc-giac.html">Đĩa
                                                            hình lục giác</a>
                                                    </li>
                                                    <li>
                                                        <img style="width: 50px"
                                                            src="../file.hstatic.net/200000296482/file/phu-kien-ban-tra_d81b87e9702a402da9cd601c9311067d.png">
                                                        <a class="parent" href="collections/dia-hinh-tam-giac.html">Đĩa
                                                            hình tam giác</a>
                                                    </li>
                                                    <li>
                                                        <img style="width: 50px"
                                                            src="../file.hstatic.net/200000296482/file/phu-kien-ban-tra_d81b87e9702a402da9cd601c9311067d.png">
                                                        <a class="parent" href="collections/dia-hinh-dam-may.html">Đĩa
                                                            hình đám mây</a>
                                                    </li>
                                                    <li>
                                                        <img style="width: 50px"
                                                            src="../file.hstatic.net/200000296482/file/phu-kien-ban-tra_d81b87e9702a402da9cd601c9311067d.png">
                                                        <a class="parent" href="collections/dia-hinh-song.html">Đĩa hình
                                                            sóng</a>
                                                    </li>
                                                    <li>
                                                        <img style="width: 50px"
                                                            src="../file.hstatic.net/200000296482/file/phu-kien-ban-tra_d81b87e9702a402da9cd601c9311067d.png">
                                                        <a class="parent" href="collections/au-dung-com-tho-com.html">Âu
                                                            đựng cơm (thố cơm)</a>
                                                    </li>
                                                    <li>
                                                        <img style="width: 50px"
                                                            src="../file.hstatic.net/200000296482/file/phu-kien-ban-tra_d81b87e9702a402da9cd601c9311067d.png">
                                                        <a class="parent"
                                                            href="collections/binh-dung-nuoc-xot-kem-dia-lot.html">Bình
                                                            (hũ) đựng
                                                            nước xốt</a>
                                                    </li>
                                                    <li>
                                                        <img style="width: 50px"
                                                            src="../file.hstatic.net/200000296482/file/phu-kien-ban-tra_d81b87e9702a402da9cd601c9311067d.png">
                                                        <a class="parent"
                                                            href="collections/binh-dung-nuoc-tuong-nuoc-mam.html">Bình
                                                            đựng nước
                                                            tương, nước mắm</a>

                                                    </li>
                                                    <li>
                                                        <img style="width: 50px"
                                                            src="../file.hstatic.net/200000296482/file/phu-kien-ban-tra_d81b87e9702a402da9cd601c9311067d.png">
                                                        <a class="parent"
                                                            href="collections/dung-cu-an-trung-vit-lon.html">Dụng cụ ăn
                                                            trứng
                                                            (hột) vịt lộn</a>
                                                    </li>
                                                    <li>
                                                        <img style="width: 50px"
                                                            src="../file.hstatic.net/200000296482/file/phu-kien-ban-tra_d81b87e9702a402da9cd601c9311067d.png">
                                                        <a class="parent"
                                                            href="collections/lo-dung-tieu-va-muoi.html">Lọ đựng tiêu &
                                                            muối</a>
                                                    </li>
                                                    <li>
                                                        <img style="width: 50px"
                                                            src="../file.hstatic.net/200000296482/file/phu-kien-ban-tra_d81b87e9702a402da9cd601c9311067d.png">
                                                        <a class="parent" href="collections/lo-dung-tam.html">Lọ đựng
                                                            tăm</a>
                                                    </li>
                                                    <li>
                                                        <img style="width: 50px"
                                                            src="../file.hstatic.net/200000296482/file/phu-kien-ban-tra_d81b87e9702a402da9cd601c9311067d.png">
                                                        <a class="parent" href="collections/thia-su-muong-su.html">Thìa
                                                            sứ (muỗng sứ)</a>
                                                    </li>
                                                    <li>
                                                        <img style="width: 50px"
                                                            src="../file.hstatic.net/200000296482/file/phu-kien-ban-tra_d81b87e9702a402da9cd601c9311067d.png">
                                                        <a class="parent"
                                                            href="collections/gac-dua-gac-thia-bang-su.html">Gác đũa,
                                                            gác thìa
                                                            (muỗng) bằng sứ</a>
                                                    </li>
                                                    <li style="border-bottom: 1px solid #d7d7d7;">
                                                        <img style="width: 50px"
                                                            src="../file.hstatic.net/200000296482/file/phu-kien-ban-tra_d81b87e9702a402da9cd601c9311067d.png">
                                                        <a class="parent" href="collections/gat-tan-thuoc-la.html">Gạt
                                                            tàn thuốc lá</a>
                                                    </li>
                                                    <li>
                                                        <img style="width: 50px"
                                                            src="../file.hstatic.net/200000296482/file/phu-kien-ban-tra_d81b87e9702a402da9cd601c9311067d.png">
                                                        <a class="parent" href="collections/dao-muong-nia.html">Bộ dao
                                                            muỗng nĩa (dao thìa
                                                            dĩa)</a>
                                                    </li>
                                                    <li>
                                                        <img style="width: 50px"
                                                            src="../file.hstatic.net/200000296482/file/phu-kien-ban-tra_d81b87e9702a402da9cd601c9311067d.png">
                                                        <a class="parent" href="collections/dua-go-cac-loai.html">Đũa gỗ
                                                            các loại</a>
                                                    </li>
                                                    <li>
                                                        <img style="width: 50px"
                                                            src="../file.hstatic.net/200000296482/file/phu-kien-ban-tra_d81b87e9702a402da9cd601c9311067d.png">
                                                        <a class="parent" href="collections/thia-muong-ca-phe.html">Thìa
                                                            (muỗng) cà phê</a>
                                                    </li>
                                                    <li>
                                                        <img style="width: 50px"
                                                            src="../file.hstatic.net/200000296482/file/phu-kien-ban-tra_d81b87e9702a402da9cd601c9311067d.png">
                                                        <a class="parent"
                                                            href="collections/dia-nia-an-trai-cay.html">Dĩa (nĩa) ăn
                                                            trái cây</a>
                                                    </li>
                                                    <li>
                                                        <img style="width: 50px"
                                                            src="../file.hstatic.net/200000296482/file/phu-kien-ban-tra_d81b87e9702a402da9cd601c9311067d.png">
                                                        <a class="parent" href="collections/dung-cu-loc-tra.html">Dụng
                                                            cụ lọc trà</a>
                                                    </li>
                                                    <li>
                                                        <img style="width: 50px"
                                                            src="../file.hstatic.net/200000296482/file/phu-kien-ban-tra_d81b87e9702a402da9cd601c9311067d.png">
                                                        <a class="parent" href="collections/ly-thuy-tinh-pha-le.html">Ly
                                                            thủy tinh - pha lê</a>
                                                    </li>
                                                    <li>
                                                        <img style="width: 50px"
                                                            src="../file.hstatic.net/200000296482/file/phu-kien-ban-tra_d81b87e9702a402da9cd601c9311067d.png">
                                                        <a class="parent" href="collections/binh-ma-bac.html">Bình mạ
                                                            bạc</a>
                                                    </li>
                                                    <li>
                                                        <img style="width: 50px"
                                                            src="../file.hstatic.net/200000296482/file/phu-kien-ban-tra_d81b87e9702a402da9cd601c9311067d.png">
                                                        <a class="parent" href="collections/khay-ma-bac.html">Khay mạ
                                                            bạc</a>
                                                    </li>
                                                    <li style="border-bottom: 1px solid #d7d7d7;">
                                                        <img style="width: 50px"
                                                            src="../file.hstatic.net/200000296482/file/phu-kien-ban-tra_d81b87e9702a402da9cd601c9311067d.png">
                                                        <a class="parent" href="collections/ke-banh.html">Kệ bánh</a>
                                                    </li>
                                                    <li>
                                                        <img style="width: 50px"
                                                            src="../file.hstatic.net/200000296482/file/phu-kien-ban-tra_d81b87e9702a402da9cd601c9311067d.png">
                                                        <a class="parent" href="collections/binh-hoa.html">Bình hoa</a>
                                                    </li>
                                                    <li>
                                                        <img style="width: 50px"
                                                            src="../file.hstatic.net/200000296482/file/phu-kien-ban-tra_d81b87e9702a402da9cd601c9311067d.png">
                                                        <a class="parent" href="collections/tuong-su.html">Tượng sứ</a>
                                                    </li>
                                                    <li>
                                                        <img style="width: 50px"
                                                            src="../file.hstatic.net/200000296482/file/phu-kien-ban-tra_d81b87e9702a402da9cd601c9311067d.png">
                                                        <a class="parent" href="#">Đồng hồ sứ</a>
                                                    </li>
                                                    <li>
                                                        <img style="width: 50px"
                                                            src="../file.hstatic.net/200000296482/file/phu-kien-ban-tra_d81b87e9702a402da9cd601c9311067d.png">
                                                        <a class="parent" href="collections/khung-anh-dep.html">Khung
                                                            ảnh</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="accordion" id="accordionExample3">
                                        <div class="card">
                                            <div class="card-header" id="headingOne">
                                                <div class="mb-0">
                                                    <button class="btn btn-link menu-mobile-button"
                                                        data-toggle="collapse" data-target="#collapseOne3"
                                                        aria-expanded="true" aria-controls="collapseOne3">
                                                        <span style="font-weight: 500; font-size: 17px;">Tìm theo bộ sưu
                                                            tập</span>
                                                        <span class="icon-control">
                                                            <img id="icon-plus-3"
                                                                src="../file.hstatic.net/200000296482/file/icons8-plus-24_056a68c5ba51474ea67c80ccdd68c0c1.png">
                                                            <img id="icon-minus-3"
                                                                src="../file.hstatic.net/200000296482/file/icons8-minus-24_9763de20001449b39af4c7b544d27690.png">
                                                            <!--<i id="icon-plus-2" class="fa fa-plus" aria-hidden="true"></i>
            							<i id="icon-minus-2" class="fa fa-minus" aria-hidden="true"></i>-->
                                                        </span>
                                                    </button>
                                                </div>
                                            </div>
                                            <div id="collapseOne3" class="collapse" aria-labelledby="headingOne"
                                                data-parent="#accordionExample3">
                                                <ul class="card-body">
                                                    <li>

                                                        <div style="margin: 0" class="row">

                                                            <div class="col-6 col-md-4 col-lg-3 collection-loop"
                                                                style="padding: 0;">
                                                                <div class="p-0 banner-image-testimonials">
                                                                    <div
                                                                        class="banner-image-testimonials_content effect-banner">
                                                                        <a
                                                                            href="collections/cher-blanc-1655/index.html">
                                                                            <span class="effect-banner-image">
                                                                                <img data-src="https://file.hstatic.net/200000296482/file/cher_blanc_65e7279a6a55464193cd0f89fb474088.png"
                                                                                    class="lazyloaded"
                                                                                    src="../file.hstatic.net/200000296482/file/cher_blanc_65e7279a6a55464193cd0f89fb474088.png">
                                                                            </span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <p style="text-align: center">
                                                                    <a href="collections/cher-blanc-1655/index.html">Cher
                                                                        Blanc</a>
                                                                </p>
                                                            </div>

                                                            <div class="col-6 col-md-4 col-lg-3 collection-loop"
                                                                style="padding: 0;">
                                                                <div class="p-0 banner-image-testimonials">
                                                                    <div
                                                                        class="banner-image-testimonials_content effect-banner">
                                                                        <a href="collections/Yoshino-9983J.html">
                                                                            <span class="effect-banner-image">
                                                                                <img data-src="https://file.hstatic.net/200000296482/file/yoshino_a7727a8ade0a4fee8f5f90e238f17d93.png"
                                                                                    class="lazyloaded"
                                                                                    src="../file.hstatic.net/200000296482/file/yoshino_a7727a8ade0a4fee8f5f90e238f17d93.png">
                                                                            </span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <p style="text-align: center">
                                                                    <a href="collections/Yoshino-9983J.html">Yoshino</a>
                                                                </p>
                                                            </div>

                                                            <div class="col-6 col-md-4 col-lg-3 collection-loop"
                                                                style="padding: 0;">
                                                                <div class="p-0 banner-image-testimonials">
                                                                    <div
                                                                        class="banner-image-testimonials_content effect-banner">
                                                                        <a href="collections/crochet-4966.html">
                                                                            <span class="effect-banner-image">
                                                                                <img data-src="https://file.hstatic.net/200000296482/file/crochet_b8e62f06fda34491a748dab14b98f7bd.png"
                                                                                    class="lazyloaded"
                                                                                    src="../file.hstatic.net/200000296482/file/crochet_b8e62f06fda34491a748dab14b98f7bd.png">
                                                                            </span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <p style="text-align: center">
                                                                    <a href="collections/crochet-4966.html">Crochet</a>
                                                                </p>
                                                            </div>

                                                            <div class="col-6 col-md-4 col-lg-3 collection-loop"
                                                                style="padding: 0;">
                                                                <div class="p-0 banner-image-testimonials">
                                                                    <div
                                                                        class="banner-image-testimonials_content effect-banner">
                                                                        <a href="collections/rochelle-gold-4796l.html">
                                                                            <span class="effect-banner-image">
                                                                                <img data-src="https://file.hstatic.net/200000296482/file/rochelle_gold_d4d0753851b64103aeaeee94d00c5c61.png"
                                                                                    class="lazyloaded"
                                                                                    src="../file.hstatic.net/200000296482/file/rochelle_gold_d4d0753851b64103aeaeee94d00c5c61.png">
                                                                            </span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <p style="text-align: center">
                                                                    <a href="collections/rochelle-gold-4796l.html">Rochelle
                                                                        Gold</a>
                                                                </p>
                                                            </div>



                                                            <div class="col-12 viewmore" style="text-align: right;">
                                                                <a
                                                                    href="collections/tim-theo-bo-suu-tap-collections-search.html">Xem
                                                                    thêm</a>
                                                            </div>


                                                        </div>

                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="accordion" id="accordionExample4">
                                        <div class="card">
                                            <div class="card-header" id="headingOne">
                                                <div class="mb-0">
                                                    <button class="btn btn-link menu-mobile-button"
                                                        data-toggle="collapse" data-target="#collapseOne4"
                                                        aria-expanded="true" aria-controls="collapseOne4">
                                                        <span style="font-weight: 500; font-size: 17px;">Tìm nhanh bộ
                                                            sản phẩm</span>
                                                        <span class="icon-control">
                                                            <img id="icon-plus-4"
                                                                src="../file.hstatic.net/200000296482/file/icons8-plus-24_056a68c5ba51474ea67c80ccdd68c0c1.png">
                                                            <img id="icon-minus-4"
                                                                src="../file.hstatic.net/200000296482/file/icons8-minus-24_9763de20001449b39af4c7b544d27690.png">
                                                            <!--<i id="icon-plus-2" class="fa fa-plus" aria-hidden="true"></i>
            							<i id="icon-minus-2" class="fa fa-minus" aria-hidden="true"></i>-->
                                                        </span>
                                                    </button>
                                                </div>
                                            </div>
                                            <div id="collapseOne4" class="collapse" aria-labelledby="headingOne"
                                                data-parent="#accordionExample4">
                                                <ul class="card-body">


                                                    <li>
                                                        <img style="width: 50px"
                                                            src="../file.hstatic.net/200000296482/file/bo-ban-tra_d2ebb2ea983a4a0e9cec3f625c037487.png">
                                                        <a class="parent" href="collections/bo-am-chen-uong-tra.html">Bộ
                                                            ấm trà cao cấp</a>
                                                    </li>
                                                    <li>
                                                        <img style="width: 50px"
                                                            src="../file.hstatic.net/200000296482/file/bo-ban-tra_d2ebb2ea983a4a0e9cec3f625c037487.png">
                                                        <a class="parent"
                                                            href="collections/cac-bo-am-chen-uong-tra-13-mon.html">Bộ ấm
                                                            chén uống
                                                            trà 13 món</a>
                                                    </li>
                                                    <li>
                                                        <img style="width: 50px"
                                                            src="../file.hstatic.net/200000296482/file/bo-ban-tra_d2ebb2ea983a4a0e9cec3f625c037487.png">
                                                        <a class="parent"
                                                            href="collections/bo-am-chen-uong-tra-15-mon.html">Bộ ấm
                                                            chén uống trà
                                                            15 món</a>
                                                    </li>
                                                    <li>
                                                        <img style="width: 50px"
                                                            src="../file.hstatic.net/200000296482/file/bo-ban-an-chau-a_633264541fd44401b9a9f3159fd8aa34.png">
                                                        <a class="parent"
                                                            href="collections/bo-am-chen-uong-tra-18-den-21-mon.html">Bộ
                                                            ấm chén
                                                            uống trà 18 món - 21 món</a>
                                                    </li>
                                                    <li>
                                                        <img style="width: 50px"
                                                            src="../file.hstatic.net/200000296482/file/bo-ban-an-chau-a_633264541fd44401b9a9f3159fd8aa34.png">
                                                        <a class="parent"
                                                            href="collections/bo-bat-dia-an-kieu-a-22-mon.html">Bộ bát
                                                            đĩa ăn kiểu
                                                            Á 22 món</a>
                                                    </li>
                                                    <li>
                                                        <img style="width: 50px"
                                                            src="../file.hstatic.net/200000296482/file/bo-ban-an-chau-au_0e5003f327c04f988d9163da98b48fad.png">
                                                        <a class="parent"
                                                            href="collections/bo-bat-dia-an-kieu-a-38-mon.html">Bộ bát
                                                            đĩa ăn kiểu
                                                            Á 38 món</a>
                                                    </li>
                                                    <li>
                                                        <img style="width: 50px"
                                                            src="../file.hstatic.net/200000296482/file/su-trang-khong-hoa-tiet_1cf2df365e824392b8248e6a3cd7d7df.png">
                                                        <a class="parent" href="collections/bo-dia-an-kieu-au.html">Bộ
                                                            đĩa ăn kiểu Âu 22 món</a>
                                                    </li>
                                                    <li>
                                                        <img style="width: 50px"
                                                            src="../file.hstatic.net/200000296482/file/su-trang-khong-hoa-tiet_1cf2df365e824392b8248e6a3cd7d7df.png">
                                                        <a class="parent"
                                                            href="collections/bo-san-pham-06-mon-cac-loai.html">Bộ sản
                                                            phẩm 06 món
                                                            các loại</a>
                                                    </li>
                                                    <li>
                                                        <img style="width: 50px"
                                                            src="../file.hstatic.net/200000296482/file/su-trang-khong-hoa-tiet_1cf2df365e824392b8248e6a3cd7d7df.png">
                                                        <a class="parent"
                                                            href="collections/cap-tach-tra-kem-dia-lot-cap-dia-banh-dep.html">Cặp
                                                            tách trà kèm đĩa lót, cặp đĩa bánh</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <a class="parent" href="pages/he-thong-cua-hang.html">
                                            <span style="font-size: 17px; font-weight: 400;">Hệ thống cửa hàng</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a class="parent" href="blogs/all.html">
                                            <span style="font-size: 17px; font-weight: 400;">Tin Tức</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a class="parent" href="pages/lich-su-100-nam-hinh-thanh-va-phat-trien.html">
                                            <span style="font-size: 17px; font-weight: 400;">Về chúng tôi</span>
                                        </a>
                                    </li>

                                    <li class="row" style="margin: 65px 0;">
                                        <div class="col-12" style="text-align: center; margin-top: 20px;">
                                            <img style="width: 50%;"
                                                src="/file.hstatic.net/200000296482/file/logo_1c90af075f3541399f3f74a35237f63c.png">
                                        </div>
                                        <div class="col-12">
                                            <p style="text-align: center; margin: 15px 15px 0;">NORITAKE - Sứ cao cấp số
                                                1 Nhật Bản |
                                                Website chính thức tại Việt Nam</p>
                                        </div>
                                        <div class="col-12" style="margin:0 15px 15px 15px;">

                                        </div>
                                    </li>

                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="header_dropdown_content site_menu_mobile desktop-menu-icon">
                <span class="box-triangle">
                    <svg viewBox="0 0 20 9">
                        <path
                            d="M.47108938 9c.2694725-.26871321.57077721-.56867841.90388257-.89986354C3.12384116 6.36134886 5.74788116 3.76338565 9.2467995.30653888c.4145057-.4095171 1.0844277-.40860098 1.4977971.00205122L19.4935156 9H.47108938z"
                            fill="#ffffff"></path>
                    </svg>
                </span>
                <div class="site-nav-container-menu">
                    <div class="menu-mobile-content">
                        <nav id="mb-menu">
                            <div class="navbar-level" data-level="1">
                                <ul class="menuList-sub vertical-menu-list sub-child">
                                    <li class="data-li">
                                        <a class="parent" href="collections/bo-am-chen-uong-tra.html">Bộ ấm trà cao
                                            cấp</a>
                                    </li>
                                    <li class="data-li">
                                        <a class="parent" href="collections/bo-bat-dia-dep.html">Bộ bát đĩa đẹp cao
                                            cấp</a>
                                    </li>
                                    <li class="data-li">
                                        <a class="parent" href="collections/su-trang-khong-hoa-tiet.html">Bộ sản phẩm sứ
                                            trắng</a>
                                    </li>
                                    <li class="data-li">
                                        <a class="parent" href="collections/coc-su-ly-su.html">Cốc sứ / Ly sứ</a>
                                    </li>
                                    <li class="data-li">
                                        <a class="parent" href="collections/binh-hoa.html">Bình hoa đẹp</a>
                                    </li>
                                    <li class="data-li">
                                        <a class="parent" href="collections/khung-anh-dep.html">Khung ảnh đẹp</a>
                                    </li>
                                    <li class="data-li">
                                        <a class="parent" href="collections/phu-kien-ban-tra.html">Phụ kiện bàn trà</a>
                                    </li>
                                    <!--<li class="main_help">
							<div class="mobile_menu_section">
								<p class="mobile_menu_section-title">Hotline</p>
								<div class="mobile_menu_help">
									<svg class="icon icon--bi-phone" viewBox="0 0 24 24">
										<g stroke-width="2" fill="none" fill-rule="evenodd" stroke-linecap="square">
											<path d="M17 15l-3 3-8-8 3-3-5-5-3 3c0 9.941 8.059 18 18 18l3-3-5-5z" stroke="#333333"></path>
											<path d="M14 1c4.971 0 9 4.029 9 9m-9-5c2.761 0 5 2.239 5 5" stroke="#333333"></path>
										</g>
									</svg>
									<a href="tel:(+84) 934 033 988" rel="nofollow">(+84) 934 033 988</a>
								</div>
								<div class="mobile_menu_help">
									<svg class="icon icon--bi-email" viewBox="0 0 22 22">
										<g fill="none" fill-rule="evenodd">
											<path stroke="#333333" d="M.916667 10.08333367l3.66666667-2.65833334v4.65849997zm20.1666667 0L17.416667 7.42500033v4.65849997z"></path>
											<path stroke="#333333" stroke-width="2" d="M4.58333367 7.42500033L.916667 10.08333367V21.0833337h20.1666667V10.08333367L17.416667 7.42500033"></path>
											<path stroke="#333333" stroke-width="2" d="M4.58333367 12.1000003V.916667H17.416667v11.1833333m-16.5-2.01666663L21.0833337 21.0833337m0-11.00000003L11.0000003 15.5833337"></path>
											<path d="M8.25000033 5.50000033h5.49999997M8.25000033 9.166667h5.49999997" stroke="#333333" stroke-width="2" stroke-linecap="square"></path>
										</g>
									</svg>
									<a href="mailto:contact@noritake.vn" rel="nofollow">contact@noritake.vn</a>
								</div>
							</div>
						</li>-->
                                </ul>

                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <nav class="f-nav nav-wrap-menu">
            <ul class="f-nav-one wrap-menu">
                @if(isset($menus))
                @foreach ($menus as $menu)
                <li class="hidden-on-small {{ $menu->children->count() ? 'has-sub' : '' }}">
                    <a href="{{ url($menu->slug) }}" title="{{ $menu->name }}">
                        {{ $menu->name }}
                        @if ($menu->children->count())
                        <svg class="icon--arrow-bottom" viewBox="0 0 12 8">
                            <path stroke="currentColor" stroke-width="2" d="M10 2L6 6 2 2" fill="none"
                                stroke-linecap="square"></path>
                        </svg>
                        @endif
                    </a>

                    @if ($menu->children->count())
                    <ul class="f-nav-two">
                        @foreach ($menu->children as $child)
                        <li class="has-sub">
                            <a href="{{ url($child->slug) }}" title="{{ $child->name }}">
                                {{ $child->name }}
                                @if ($child->children->count())
                                <svg class="icon--arrow-right" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8 16a.999.999 0 0 1-.707-1.707L11.586 10 7.293 5.707a.999.999 0 1 1 1.414-1.414l5 5a.999.999 0 0 1 0 1.414l-5 5A.997.997 0 0 1 8 16"
                                        fill-rule="evenodd" stroke-linecap="square"></path>
                                </svg>
                                @endif
                            </a>

                            @if ($child->children->count())
                            <ul class="f-nav-three trai">
                                @foreach ($child->children as $subChild)
                                <li>
                                    <a href="{{ url($subChild->slug) }}" title="{{ $subChild->name }}">
                                        {{ $subChild->name }}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                            @endif
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </li>
                @endforeach
                @endif
            </ul>
        </nav>


        <style>
        .f-nav-three.trai {
            height: auto;
        }

        /* Đặt chiều cao cố định cho phần tử đầu tiên và cuối cùng nếu cần */
        .f-nav-three.trai li:first-child a {
            height: auto;
        }

        .f-nav-three.trai li:last-child a {
            height: auto;
        }


        .f-nav-three:nth-of-type(2) {
            left: 450px !important;
        }

        .f-nav-three:nth-of-type(3) {
            left: 675px !important;
        }

        .f-nav-three:nth-of-type(4) {
            left: 900px !important;
        }

        .has-sub {
            /*border-bottom: 1px solid #ddd;*/
        }
        </style>

        <script>
        $(document).ready(function() {
            // Duyệt qua mỗi thẻ li có class has-sub
            $("li.has-sub").each(function() {
                // Lấy ul đầu tiên và cuối cùng trong thẻ li này
                var firstUl = $(this).find("ul").first();
                var lastUl = $(this).find("ul").last();

                // Thêm class ul-last vào ul cuối cùng
                lastUl.addClass("ul-last");

                // Kiểm tra nếu cả ul đầu tiên và cuối cùng đều tồn tại
                if (firstUl.length && lastUl.length) {
                    // Lấy chiều cao của ul đầu tiên
                    var firstUlHeight = firstUl.outerHeight();
                    // Đặt chiều cao của ul cuối cùng bằng chiều cao của ul đầu tiên
                    lastUl.css("height", firstUlHeight + "px");
                }
            });
        });
        </script>
    </div>
</header>