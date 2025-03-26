@extends('frontend.home.layout')
@section('page_title')
    Đăng ký
@endsection
@section('content')
<link href="/theme.hstatic.net/200000296482/1001063914/14/style-customer.scss.css?v=5233" rel="stylesheet" type="text/css" media="all">

<main class="mainContent-theme">
            <div class="overlay123"></div>
            <div class="layout-account my-5">
	<div class="container">
		<div class="wrapbox-content-account pb-4">
			<div class="customers-account-form userbox m-auto">
				<div class="customers-register">
					<div class="account-type text-center"><h1 style="scroll-margin-top: 40px;" id="tạo-tài-khoản-1">Tạo tài khoản</h1></div>
<form accept-charset="UTF-8" action="https://noritake.vn/account" id="create_customer" method="post">
<input name="form_type" type="hidden" value="create_customer">
<input name="utf8" type="hidden" value="✓">
<input name="__RequestVerificationToken" type="hidden" value="CfDJ8FyFPV59mBtNhmQGz0fYZt_KHBBjGx7RCt_2zhAUXqsWlJr7WC2drlSDsFyJNZai1Ux-Am-IlYij4FjFAzUL18tMEncjG9ID_5w9aCPcrQRGPzje3NEECn2ptTFjv_CCwfxFbTFvduVvIypeRNU1HcI">
					
					<div class="form-group mb-4 clearfix">
						<label for="last_name" class="text-field d-none font-weight-normal text-uppercase mb-2">Họ</label>
						<input id="last_name" required="" type="text" placeholder="Họ" name="customer[last_name]" class="form-control">
					</div>
					<div class="form-group mb-4 clearfix">
						<label for="first_name" class="text-field d-none font-weight-normal text-uppercase mb-2">Tên</label>
						<input id="first_name" required="" type="text" placeholder="Tên" name="customer[first_name]" class="form-control">
					</div>
					<div id="grender-group" class="form-group mb-4 clearfix">
						<label for="grender" class="text-field d-none font-weight-normal text-uppercase mb-2">Giới tính</label>
						<input id="radio1" type="radio" value="0" name="customer[gender]"> 
						<label for="radio1">Nữ</label>
						<input id="radio2" type="radio" value="1" name="customer[gender]"> 
						<label for="radio2">Nam</label>
					</div>
					<div class="form-group mb-4 clearfix">
						<label for="birthday" class="text-field d-none font-weight-normal text-uppercase mb-2">Ngày tháng năm sinh (mm/dd/yyyy)</label>
						<input id="birthday" required="" type="text" placeholder="mm/dd/yyyy" name="customer[birthday]" class="form-control">
					</div>
					<div class="form-group mb-4 clearfix">
						<label for="email" class="text-field d-none font-weight-normal text-uppercase mb-2">Email</label>
						<input id="email" required="" type="email" placeholder="Email" name="customer[email]" class="form-control">
					</div>
					<div class="form-group mb-4 clearfix">
						<label for="password" class="text-field d-none font-weight-normal text-uppercase mb-2">Mật khẩu</label>
						<input id="password" required="" type="password" placeholder="Mật khẩu" name="customer[password]" class="form-control" autocomplete="off">
					</div>
					<div class="sitebox-recaptcha mb-4">
						This site is protected by reCAPTCHA and the Google
						<a href="https://policies.google.com/privacy" target="_blank" rel="noreferrer">Privacy Policy</a> 
						and <a href="https://policies.google.com/terms" target="_blank" rel="noreferrer">Terms of Service</a> apply.
					</div>
					<div class="customers-action-account clearfix">
						<div class="action-button">
							<button type="submit" class="btn btn-box dark">Đăng ký</button>	
						</div>
					</div>
					<div class="clearfix req_pass mt-5">
						<a class="come-back d-block font-weight-bold" href="login.html"><i class="fa fa-long-arrow-left mr-4"></i> Quay lại đăng nhập</a>
					</div>

<!-- <input id="3830a876440744b7a85b9c61af9d929a" name="g-recaptcha-response" type="hidden"><script src="../../www.google.com/recaptcha/api030a.js?render=6LchSLkqAAAAABVHBpeFgg8N-WgkYsr5fO6GUF_s"></script><script>let recaptchaElm=document.getElementById('3830a876440744b7a85b9c61af9d929a');let recaptchaForm=recaptchaElm.parentNode;recaptchaForm.addEventListener("submit",function(formEvent){if(!recaptchaElm.value){formEvent.preventDefault();grecaptcha.ready(function(){grecaptcha.execute('6LchSLkqAAAAABVHBpeFgg8N-WgkYsr5fO6GUF_s',{action:'submit'}).then(function(token){recaptchaElm.value=token;recaptchaForm.requestSubmit(formEvent.submitter)})})}})</script></form>				</div> -->
			</div>
		</div>
	</div>
</div>
        </main>
@endsection
