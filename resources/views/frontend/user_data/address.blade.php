@extends('frontend.home.layout')
@section('page_title')
Danh sách địa chỉ
@endsection
@push('styles')
<link href="/theme.hstatic.net/200000296482/1001063914/14/style-customer.scss.css?v=5233" rel="stylesheet" type="text/css" media="all">

@section('content')
<main class="mainContent-theme">
	<div class="overlay123"></div>
	<div class="layout-info-account mb-5">
		<div class="container">
			<div class="title-info-account text-center py-5">
				<h1 class="m-0" style="scroll-margin-top: 40px;" id="thông-tin-địa-chỉ-1">Thông tin địa chỉ</h1>
			</div>
			<div class="content-infor-account">
				<div class="row">
					<div class="col-12 col-lg-3">
						<div class="sidebar-account-inner mb-4">
							@include('frontend.user_data.component.account-sidebar')
						</div>
					</div>
					<div class="col-12 col-lg-9">
						<div class="row wrap_content_address">
							<div class="col-12 col-lg-6">
								<div class="wrap_edit_address">
									<div class="address_title position-relative">
										<h3 class="mb-0">
											<strong>{{ $user->name }}</strong>
											<span class="default_address note">(Địa chỉ mặc định)</span>
										</h3>
										<p class="address_actions position-absolute m-auto">
											<span class="action_link action_edit d-inline-block align-middle text-center"><a href="#" onclick="Haravan.CustomerAddress.toggleForm(10223266902);return false"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></span>
											<span class="action_link action_delete d-inline-block align-middle text-center"><a href="#" onclick="Haravan.CustomerAddress.destroy(10223266902);return false"><i class="fa fa-times" aria-hidden="true"></i></a></span>
										</p>
									</div>
									<div class="address_table p-3 mb-4 bg-light">
										<div id="view_address_{{ $user->id }}" class="customer_address">
											<div class="row">
												<div class="col-12 large_view d-inline-flex mb-2">
													<div class="lb-left pr-3">
														<b>Họ tên:</b>
													</div>
													<div class="lb-right">
														<p class="mb-0">{{ $user->name }}</p>
													</div>
												</div>

												<div class="col-12 large_view d-inline-flex mb-2">
													<div class="lb-left pr-3">
														<b>Địa chỉ:</b>
													</div>
													<div class="lb-right">
														<p class="mb-2">{{ $user->address }}</p>
														<p class="mb-2">Quận: {{ $user->district_id }}</p>
														<p class="mb-0">Phường: {{ $user->ward_id }}</p>
													</div>
												</div>

												<div class="col-12 large_view d-inline-flex mb-2">
													<div class="lb-left pr-3">
														<b>Quốc gia:</b>
													</div>
													<div class="lb-right">
														<p class="mb-0">Vietnam</p>
													</div>
												</div>

												<div class="col-12 large_view d-inline-flex mb-2">
													<div class="lb-left pr-3">
														<b>Số điện thoại:</b>
													</div>
													<div class="lb-right">
														<p class="mb-0">{{ $user->phone }}</p>
													</div>
												</div>
											</div>
										</div>

										<div id="edit_address_{{ $user->id }}" class="customer_address edit_address" style="display:none;">
											<form accept-charset="UTF-8" action="{{ route('profile.update') }}" method="post">
												@csrf
												<div class="input-group mb-3">
													<span class="input-icon text-center"><i class="fa fa-user-o"></i></span>
													<input type="text" class="input-textbox form-control" name="name" value="{{ $user->name }}" placeholder="Họ và tên">
												</div>

												<div class="input-group mb-3">
													<span class="input-icon text-center"><i class="fa fa-phone"></i></span>
													<input type="text" class="input-textbox form-control" name="phone" value="{{ $user->phone }}" placeholder="Số điện thoại">
												</div>

												<div class="input-group mb-3">
													<span class="input-icon text-center"><i class="fa fa-envelope"></i></span>
													<input type="email" class="input-textbox form-control" name="email" value="{{ $user->email }}" placeholder="Nhập email">
												</div>

												<div class="input-group mb-3">
													<span class="input-icon text-center"><i class="fa fa-calendar"></i></span>
													<input type="date" class="input-textbox form-control" name="birthday" value="{{ $user->birthday }}" placeholder="Ngày sinh">
												</div>

												<div class="input-group mb-3">
													<span class="input-icon text-center"><i class="fa fa-home"></i></span>
													<input type="text" class="input-textbox form-control" name="address" value="{{ $user->address }}" placeholder="Địa chỉ">
												</div>

												<div class="input-group mb-3">
													<span class="input-icon text-center"><i class="fa fa-map-marker"></i></span>
													<select class="customer_shipping_province input-textbox custom-select" name="province_id">
														<option value="">- Chọn tỉnh/thành phố -</option>
														<option value="22" {{ $user->province_id == 22 ? 'selected' : '' }}>Tỉnh 22</option>
													</select>
												</div>

												<div class="input-group mb-3">
													<span class="input-icon text-center"><i class="fa fa-map-marker"></i></span>
													<select class="customer_shipping_district input-textbox custom-select" name="district_id">
														<option value="">- Chọn quận/huyện -</option>
														<option value="207" {{ $user->district_id == 207 ? 'selected' : '' }}>Quận 207</option>
													</select>
												</div>

												<div class="input-group mb-3">
													<span class="input-icon text-center"><i class="fa fa-map-marker"></i></span>
													<select class="customer_shipping_ward input-textbox custom-select" name="ward_id">
														<option value="">- Chọn phường/xã -</option>
														<option value="07195" {{ $user->ward_id == '07195' ? 'selected' : '' }}>Phường 07195</option>
													</select>
												</div>

												<div class="special-default mb-3">
													<input type="checkbox" name="default" value="1"> Đặt làm địa chỉ mặc định.
												</div>

												<div class="action_bottom">
													<input class="btn bg-dark text-white mr-1" type="submit" value="Cập nhật">
													<span>hoặc <a href="/" onclick="event.preventDefault();" class="font-weight-bold">Hủy</a></span>
												</div>
											</form>
										</div>
									</div>

								</div>
							</div>
							<div class="col-12 col-lg-6">
								<div class="wrap_edit_address">
									<a href="#" onclick="Haravan.CustomerAddress.toggleNewForm(); return false;" class="add-new-address d-inline-block bg-dark text-white text-uppercase text-center w-100 p-2">Nhập địa chỉ mới</a>
									<div id="add_address" class="customer_address add_address p-3 mb-3 bg-light" style="display:none;">
										<form accept-charset="UTF-8" action="/account/addresses" id="address_form_new" method="post">
											<input name="form_type" type="hidden" value="customer_address">
											<input name="utf8" type="hidden" value="✓">
											<div class="input-group mb-3">
												<span class="input-icon text-center"><i class="fa fa-user-o"></i></span>
												<input type="text" id="address_last_name_new" class="input-textbox form-control" name="address[last_name]" value="" placeholder="Họ">
											</div>
											<div class="input-group mb-3">
												<span class="input-icon text-center"><i class="fa fa-user-o"></i></span>
												<input type="text" id="address_first_name_new" class="input-textbox form-control" name="address[first_name]" value="" placeholder="Tên">
											</div>
											<div class="input-group mb-3">
												<span class="input-icon text-center"><i class="fa fa-home"></i></span>
												<input type="text" id="address_company_new" class="input-textbox form-control" name="address[company]" value="" placeholder="Công ty">
											</div>
											<div class="input-group mb-3">
												<span class="input-icon text-center"><i class="fa fa-home"></i></span>
												<input type="text" id="address_address1_new" class="input-textbox form-control" name="address[address1]" value="" placeholder="Địa chỉ 1">
											</div>
											<div class="input-group mb-3">
												<span class="input-icon text-center"><i class="fa fa-home"></i></span>
												<input type="text" id="address_address2_new" class="input-textbox form-control" name="address[address2]" value="" placeholder="Địa chỉ 2">
											</div>
											<div class="input-group mb-3">
												<span class="input-icon text-center"><i class="fa fa-map-marker"></i></span>
												<select id="" class="customer_shipping_province input-textbox custom-select">
													<option value="" data-provinces="[]">- Please Select --</option>

												</select>
											</div>
											<div class="input-group mb-3" id="address_province_container_10223266902" style="">
												<span class="input-icon text-center"><i class="fa fa-map-marker"></i></span>
												<select id="" class="customer_shipping_district input-textbox custom-select" name="address[province]" data-default="">
													<option value="">- Please Select --</option>

												</select>

											</div>
											<div class="input-group mb-3" id="address_province_container_10223266902" style="">
												<span class="input-icon text-center"><i class="fa fa-map-marker"></i></span>
												<select id="" class="customer_shipping_ward input-textbox custom-select" name="address[province]" data-default="">
													<option value="">- Please Select --</option>

												</select>

											</div>
											<div class="input-group mb-3" id="address_province_container_new" style="display:none">
												<span class="input-icon text-center"><i class="fa fa-map-marker"></i></span>
												<select id="address_province_new" class="input-textbox custom-select" name="address[province]" data-default=""></select>
											</div>
											<div class="input-group mb-3">
												<span class="input-icon text-center"><i class="fa fa-phone"></i></span>
												<input type="text" id="address_phone_new" class="input-textbox form-control" name="address[phone]" value="" placeholder="Số điện thoại">
											</div>
											<div class="special-default mb-3">
												<input type="checkbox" id="address_default_address_new" name="address[default]" value="1"> Đặt làm địa chỉ mặc định.
											</div>
											<div class="action_bottom">
												<input class="btn bg-dark text-white mr-1" type="submit" value="Cập nhật">
												<span class="">hoặc <a href="#" onclick="Haravan.CustomerAddress.toggleNewForm(); return false;" class="font-weight-bold">Hủy</a></span>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
	<script type="text/javascript" charset="utf-8">
		document.addEventListener("DOMContentLoaded", function() {
			// Lấy danh sách tất cả các select có cùng class
			var citis = document.querySelectorAll(".customer_shipping_province");
			var districts = document.querySelectorAll(".customer_shipping_district");
			var wards = document.querySelectorAll(".customer_shipping_ward");

			if (!citis.length || !districts.length || !wards.length) {
				console.error("Không tìm thấy các phần tử select.");
				return;
			}

			// Cấu hình tham số cho axios
			var Parameter = {
				url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json",
				method: "GET",
				responseType: "json",
			};

			// Gọi API và render dữ liệu tỉnh/thành cho tất cả các select
			axios(Parameter)
				.then(function(response) {
					if (response.data && Array.isArray(response.data)) {
						citis.forEach((citySelect, index) => {
							renderCity(response.data, citySelect, districts[index], wards[index]);
						});
					} else {
						console.error("Dữ liệu không hợp lệ.");
					}
				})
				.catch(function(error) {
					console.error("Lỗi khi tải dữ liệu:", error);
				});

			function renderCity(data, citis, districts, wards) {
				// Đổ dữ liệu tỉnh/thành vào từng select
				data.forEach(x => {
					let option = new Option(x.Name, x.Id);
					citis.add(option);
				});

				// Khi chọn tỉnh/thành
				citis.addEventListener("change", function() {
					districts.innerHTML = '<option value="">Chọn quận/huyện</option>';
					wards.innerHTML = '<option value="">Chọn phường/xã</option>';

					if (this.value) {
						let result = data.find(n => n.Id === this.value);
						if (result) {
							result.Districts.forEach(k => {
								let option = new Option(k.Name, k.Id);
								districts.add(option);
							});
						}
					}
				});

				// Khi chọn quận/huyện
				districts.addEventListener("change", function() {
					wards.innerHTML = '<option value="">Chọn phường/xã</option>';

					let dataCity = data.find(n => n.Id === citis.value);
					if (this.value && dataCity) {
						let districtData = dataCity.Districts.find(n => n.Id === this.value);
						if (districtData) {
							districtData.Wards.forEach(w => {
								let option = new Option(w.Name, w.Id);
								wards.add(option);
							});
						}
					}
				});
			}
		});
	</script>


</main>
<script src="hstatic.net/0/0/global/customer_area.js"></script>

@endsection