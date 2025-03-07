@extends('frontend.home.layout')
@section('page_title')
    Thông tin cá nhân
@endsection
@push('styles')
<link href="/theme.hstatic.net/200000296482/1001063914/14/style-customer.scss.css?v=5233" rel="stylesheet" type="text/css" media="all">

@section('content')

<main class="mainContent-theme">
            <div class="overlay123"></div>
            <div class="layout-info-account mb-5">
	<div class="container">
		<div class="title-info-account text-center py-5">
			<h1 class="m-0" style="scroll-margin-top: 40px;" id="tài-khoản-của-bạn-1">Tài khoản của bạn</h1>
		</div>
		<div class="content-infor-account">
			<div class="row">
				<div class="col-12 col-md-3">
					<div class="sidebar-account-inner mb-4">
<div class="account-sidebar">
	<h2 class="account-title title-sidebar mb-3 text-uppercase">Tài khoản</h2>
	<div class="account-content">
		<div class="account-list">
			<ul class="list-unstyled">			
				<li><a href="{{ route("profile.user") }}" class="d-block position-relative">Thông tin tài khoản</a></li>
				<li><a href="{{ route("address.user") }}" class="d-block position-relative">Danh sách địa chỉ</a></li>
				<li><form action="" method="POST">
                                                @csrf
                                                <button type="submit" class="d-block position-relative">Đăng xuất</button>
                                            </form></li>
			</ul>
		</div>
	</div>
</div>
					</div>
				</div>
				<div class="col-12 col-md-9">
					<div class="customer-sidebar clearfix">
						<h2 class="title-detail mb-2 pb-2 text-uppercase">Thông tin tài khoản</h2>
						<div class="box-info-sidebar">
							<p class="name-account mb-2"><span class="font-weight-bold mr-2">Họ tên: </span>tu dang</p>
							<p class="email mb-2"><span class="font-weight-bold mr-2">Email: </span>anhtuhanam1@gmail.com</p>
							<div class="address">
								<p class="mb-2"><span class="font-weight-bold mr-2">Địa chỉ 1: </span></p>
								<p class="mb-2"><span class="font-weight-bold mr-2">Địa chỉ 2: </span></p>
								<p class="mb-2"><span class="font-weight-bold mr-2">Quốc gia: </span> Vietnam</p>
								<p class="mb-2"><span class="font-weight-bold mr-2">Số điện thoại: </span></p>
								<a id="view_address" href="/account/addresses">Xem địa chỉ</a>
							</div>
						</div>
					</div>
					<div class="customer-orders mb-4">
						<div class="wrap-order-table p-2 mt-4 mb-3">
							<div id="customer_orders" class="customers-order-bg p-2">
								<p class="mt-2">Bạn chưa đặt mua sản phẩm.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
        </main>
@endsection
