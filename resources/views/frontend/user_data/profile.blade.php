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
							@include('frontend.user_data.component.account-sidebar')
						</div>
					</div>
					<div class="col-12 col-md-9">
						<div class="customer-sidebar clearfix">
							<h2 class="title-detail mb-2 pb-2 text-uppercase">Thông tin tài khoản</h2>
							<div class="box-info-sidebar">
								<p class="name-account mb-2">
									<span class="font-weight-bold mr-2">Họ tên: </span>{{ $user->name ?? 'Chưa cập nhật' }}
								</p>
								<p class="email mb-2">
									<span class="font-weight-bold mr-2">Email: </span>{{ $user->email ?? 'Chưa cập nhật' }}
								</p>
								<div class="address">
									<p class="mb-2">
										<span class="font-weight-bold mr-2">Địa chỉ: </span>{{ $user->address ?? 'Chưa cập nhật' }}
									</p>
									<p class="mb-2">
										<span class="font-weight-bold mr-2">Thuộc : </span>
										<span id="user_address">Đang cập nhật...</span>
									</p>

									<p class="mb-2">
										<span class="font-weight-bold mr-2">Quốc gia: </span>Vietnam
									</p>
									<p class="mb-2">
										<span class="font-weight-bold mr-2">Số điện thoại: </span>{{ $user->phone ?? 'Chưa cập nhật' }}
									</p>
									<a id="view_address" href="{{route('address.user')}}">Xem địa chỉ</a>
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
	</div>
</main>
<script>
    document.addEventListener("DOMContentLoaded", async function() {
        let provinceId = "{{ str_pad($user->province_id, 2, '0', STR_PAD_LEFT) }}";
        let districtId = "{{ str_pad($user->district_id, 3, '0', STR_PAD_LEFT) }}";
        let wardId = "{{ str_pad($user->ward_id, 5, '0', STR_PAD_LEFT) }}";

        if (provinceId && districtId && wardId) {
            try {
                // Gọi API lấy danh sách địa phương
                let response = await fetch("https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json");
                let data = await response.json();

                // Lấy tên tỉnh/thành
                let province = data.find(item => item.Id == provinceId);
                let provinceName = province ? province.Name : "Chưa cập nhật";

                // Lấy tên quận/huyện
                let district = province ? province.Districts.find(item => item.Id == districtId) : null;
                let districtName = district ? district.Name : "Chưa cập nhật";

                // Lấy tên phường/xã
                let ward = district ? district.Wards.find(item => item.Id == wardId) : null;
                let wardName = ward ? ward.Name : "Chưa cập nhật";

                // Cập nhật nội dung vào HTML
                document.getElementById("user_address").innerHTML = `${wardName}, ${districtName}, ${provinceName}`;
            } catch (error) {
                console.error("Lỗi khi lấy dữ liệu địa phương:", error);
            }
        }
    });
</script>
@endsection