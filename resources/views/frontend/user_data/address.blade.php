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
							<div class="account-sidebar">
								<h2 class="account-title title-sidebar mb-3 text-uppercase">Tài khoản</h2>
								<div class="account-content">
									<div class="account-list">
										<ul class="list-unstyled">
											<li><a href="/account" class="d-block position-relative">Thông tin tài khoản</a></li>
											<li><a href="/account/addresses" class="d-block position-relative">Danh sách địa chỉ</a></li>
											<li><a href="/account/logout" class="d-block position-relative">Đăng xuất</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 col-lg-9">
						<div class="row wrap_content_address">
							<div class="col-12 col-lg-6">
								<div class="wrap_edit_address">
									<div class="address_title position-relative">
										<h3 class="mb-0">
											<strong>tu dang</strong>
											<span class="default_address note">(Địa chỉ mặc định)</span>
										</h3>
										<p class="address_actions position-absolute m-auto">
											<span class="action_link action_edit d-inline-block align-middle text-center"><a href="#" onclick="Haravan.CustomerAddress.toggleForm(10223266902);return false"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></span>
											<span class="action_link action_delete d-inline-block align-middle text-center"><a href="#" onclick="Haravan.CustomerAddress.destroy(10223266902);return false"><i class="fa fa-times" aria-hidden="true"></i></a></span>
										</p>
									</div>
									<div class="address_table p-3 mb-4 bg-light">
										<div id="view_address_10223266902" class="customer_address">
											<div class="row">
												<div class="col-12 large_view d-inline-flex mb-2">
													<div class="lb-left pr-3">
														<b>Họ tên:</b>
													</div>
													<div class="lb-right">
														<p class="mb-0">tu dang</p>
													</div>
												</div>
												<div class="col-12 large_view d-inline-flex mb-2">
													<div class="lb-left pr-3">
														<b>Công ty:</b>
													</div>
													<div class="lb-right">
														<p class="mb-0"></p>
													</div>
												</div>
												<div class="col-12 large_view d-inline-flex mb-2">
													<div class="lb-left pr-3">
														<b>Địa chỉ:</b>
													</div>
													<div class="lb-right">
														<p class="mb-2"></p>
														<p class="mb-2"></p>
														<p class="mb-0"></p>
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
														<p class="mb-0"></p>
													</div>
												</div>
											</div>
										</div>
										<div id="edit_address_10223266902" class="customer_address edit_address" style="display:none;">
											<form accept-charset="UTF-8" action="/account/addresses/10223266902" id="address_form_10223266902" method="post">
												<input name="form_type" type="hidden" value="customer_address">
												<input name="utf8" type="hidden" value="✓">
												<div class="input-group mb-3">
													<span class="input-icon text-center"><i class="fa fa-user-o"></i></span>
													<input type="text" id="address_last_name_10223266902" class="input-textbox form-control" name="address[last_name]" value="tu" placeholder="Họ">
												</div>
												<div class="input-group mb-3">
													<span class="input-icon text-center"><i class="fa fa-user-o"></i></span>
													<input type="text" id="address_first_name_10223266902" class="input-textbox form-control" name="address[first_name]" value="dang" placeholder="Tên">
												</div>
												<div class="input-group mb-3">
													<span class="input-icon text-center"><i class="fa fa-home"></i></span>
													<input type="text" id="address_company_10223266902" class="input-textbox form-control" name="address[company]" value="" placeholder="Công ty">
												</div>
												<div class="input-group mb-3">
													<span class="input-icon text-center"><i class="fa fa-home"></i></span>
													<input type="text" id="address_address1_10223266902" class="input-textbox form-control" name="address[address1]" value="" placeholder="Địa chỉ 1">
												</div>
												<div class="input-group mb-3">
													<span class="input-icon text-center"><i class="fa fa-home"></i></span>
													<input type="text" id="address_address2_10223266902" class="input-textbox form-control" name="address[address2]" value="" placeholder="Địa chỉ 2">
												</div>
												<div class="input-group mb-3">
													<span class="input-icon text-center"><i class="fa fa-map-marker"></i></span>
													<select id="customer_shipping_province" class="input-textbox custom-select" name="address[country]" data-default="Vietnam">
														<option value="" data-provinces="[]">- Please Select --</option>
														
													</select>
												</div>
												<div class="input-group mb-3" id="address_province_container_10223266902" style="">
													<span class="input-icon text-center"><i class="fa fa-map-marker"></i></span>
													<select id="customer_shipping_district" class="input-textbox custom-select" name="address[province]" data-default="">
														<option value="" data-provinces="[]">- Please Select --</option>
														
													</select>
												</div>
												<div class="input-group mb-3" id="address_province_container_10223266902" style="">
													<span class="input-icon text-center"><i class="fa fa-map-marker"></i></span>
													<select id="customer_shipping_ward" class="input-textbox custom-select" name="address[province]" data-default="">
														<option value="" data-provinces="[]">- Please Select --</option>
														
													</select>
												</div>
												
												<div class="input-group mb-3">
													<span class="input-icon text-center"><i class="fa fa-phone"></i></span>
													<input type="text" id="address_phone_10223266902" class="input-textbox form-control" name="address[phone]" value="" placeholder="Số điện thoại">
												</div>
												<div class="special-default mb-3">
													<input type="checkbox" id="address_default_address_10223266902" name="address[default]" value="1"> Đặt làm địa chỉ mặc định.
												</div>
												<div class="action_bottom">
													<input class="btn bg-dark text-white mr-1" type="submit" value="Cập nhật">
													<span class="">hoặc <a href="/" onclick="Haravan.CustomerAddress.toggleForm(10223266902); return false;" class="font-weight-bold">Hủy</a></span>
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
												<select id="customer_shipping_ward" class="input-textbox custom-select" name="address[country]" data-default="">
													<option value"" >- Please Select --</option>
													
												</select>
												<div class="input-group mb-3" id="address_province_container_10223266902" style="">
													<span class="input-icon text-center"><i class="fa fa-map-marker"></i></span>
													<select id="customer_shipping_district" class="input-textbox custom-select" name="address[province]" data-default="">
														<option value="" data-provinces="[]">- Please Select --</option>
														
													</select>
												</div>
												<div class="input-group mb-3" id="address_province_container_10223266902" style="">
													<span class="input-icon text-center"><i class="fa fa-map-marker"></i></span>
													<select id="customer_shipping_district" class="input-textbox custom-select" name="address[province]" data-default="">
														<option value="" data-provinces="[]">- Please Select --</option>
														
													</select>
												</div>
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
	
</main>
<script>
		// Lấy các phần tử select theo id
        var citis = document.getElementById("customer_shipping_province");
        var districts = document.getElementById("customer_shipping_district");
        var wards = document.getElementById("customer_shipping_ward");

        // Cấu hình tham số cho axios
        var Parameter = {
            url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json",
            method: "GET",
            responseType: "application/json",
        };

        // Gọi API và render dữ liệu tỉnh/thành
        axios(Parameter)
            .then(function(result) {
                renderCity(result.data);
            })
            .catch(function(error) {
                console.error("Lỗi khi tải dữ liệu:", error);
            });


        function renderCity(data) {
            // Đổ dữ liệu tỉnh/thành vào select
            for (const x of data) {
                citis.options[citis.options.length] = new Option(x.Name, x.Id);
            }

            // Khi chọn tỉnh/thành
            citis.onchange = function() {
                // Reset lại danh sách quận/huyện và phường/xã
                districts.length = 1;
                wards.length = 1;
                if (this.value !== "") {
                    // Lọc lấy tỉnh được chọn
                    const result = data.filter(n => n.Id === this.value);
                    if (result.length > 0) {
                        // Đổ dữ liệu quận/huyện
                        for (const k of result[0].Districts) {
                            districts.options[districts.options.length] = new Option(k.Name, k.Id);
                        }
                    }
                }
            };

            // Khi chọn quận/huyện
            districts.onchange = function() {
                // Reset lại danh sách phường/xã
                wards.length = 1;
                // Lọc dữ liệu tỉnh hiện đang được chọn
                const dataCity = data.filter(n => n.Id === citis.value);
                if (this.value !== "" && dataCity.length > 0) {
                    // Lọc lấy quận/huyện được chọn
                    const districtData = dataCity[0].Districts.filter(n => n.Id === this.value);
                    if (districtData.length > 0) {
                        // Đổ dữ liệu phường/xã
                        const dataWards = districtData[0].Wards;
                        for (const w of dataWards) {
                            wards.options[wards.options.length] = new Option(w.Name, w.Id);
                        }
                    }
                }
            };
        }
	</script>
<script src="hstatic.net/0/0/global/customer_area.js"></script>

@endsection