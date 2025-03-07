@extends('fontend.home.layout')
@section('page_title')
    Quên mật khẩu
@endsection
@section('content')
<link href="/theme.hstatic.net/200000296482/1001063914/14/style-customer.scss.css?v=5233" rel="stylesheet" type="text/css" media="all">

<main class="mainContent-theme">
            <div class="overlay123"></div>
            <div class="layout-account my-5">
	<div class="container">
		<div class="wrapbox-content-account pb-4">
			<div class="customers-account-form userbox m-auto">
				<div id="login" class="customers-account" style="display: none;">
					<div class="account-type text-center">
						<h1 style="scroll-margin-top: 40px;" id="đăng-nhập-1">Đăng nhập</h1>
					</div>		
<form accept-charset="UTF-8" action="/account/login" id="customer_login" method="post">
<input name="form_type" type="hidden" value="customer_login">
<input name="utf8" type="hidden" value="✓">
<input name="__RequestVerificationToken" type="hidden" value="CfDJ8FyFPV59mBtNhmQGz0fYZt8iDYHnvjuFds7PWiY2k-5Ce-uB-1NgCXKyLNQ5OoFkEyAVYvwL9MnbCsL1BpoSSa76Od0owczN1TIVxCFn4qbmVnMyDQdUk0wlAWg-MrAbyq3WLn5JOAkgP_YzO75derve9oYvtUbrm_V8eoGFXrY8sLbdIL7jFc9i62Fg_Bb0aA">
					
					<div class="form-group mb-4 clearfix">
						<label for="customer_email" class="text-field d-none font-weight-normal text-uppercase mb-2">Địa chỉ email</label>
						<input id="customer_email" required="" type="email" name="customer[email]" placeholder="Email" autocomplete="off" class="form-control">
					</div>
					<div class="form-group mb-4 clearfix">
						<label for="customer_password" class="text-field d-none font-weight-normal text-uppercase mb-2">Mật khẩu</label>
						<input id="customer_password" required="" type="password" value="" name="customer[password]" placeholder="Mật khẩu" autocomplete="off" class="form-control">      
					</div>
					<div class="sitebox-recaptcha mb-4">
						This site is protected by reCAPTCHA and the Google
						<a href="https://policies.google.com/privacy" target="_blank" rel="noreferrer">Privacy Policy</a> 
						and <a href="https://policies.google.com/terms" target="_blank" rel="noreferrer">Terms of Service</a> apply.
					</div>
					<div class="customers-action-account text-center">
						<div class="action-button">
							<button type="submit" class="btn btn-box dark">Đăng nhập</button>
						</div>
						<div class="register--password mt-3">
							<p class="mb-2">
								Quên mật khẩu?
								<a href="#" onclick="showRecoverPasswordForm();return false;">Khôi phục mật khẩu</a>
							</p>
							<p class="mb-0">
								Khách hàng mới?
								<a href="/account/register" class="" title="Đăng ký">Tạo tài khoản của bạn</a>
							</p>
						</div>
					</div>
</form>				</div>
				<div id="recover-password" style="display: block;">
					<div class="account-type text-center"><h2>Phục hồi mật khẩu</h2></div>		
<form accept-charset="UTF-8" action="/account/recover" method="post">
<input name="form_type" type="hidden" value="recover_customer_password">
<input name="utf8" type="hidden" value="✓">
<input name="__RequestVerificationToken" type="hidden" value="CfDJ8FyFPV59mBtNhmQGz0fYZt8iDYHnvjuFds7PWiY2k-5Ce-uB-1NgCXKyLNQ5OoFkEyAVYvwL9MnbCsL1BpoSSa76Od0owczN1TIVxCFn4qbmVnMyDQdUk0wlAWg-MrAbyq3WLn5JOAkgP_YzO75derve9oYvtUbrm_V8eoGFXrY8sLbdIL7jFc9i62Fg_Bb0aA">
					
					<div class="form-group mb-4 clearfix">
						<label for="email" class="text-field d-none font-weight-normal text-uppercase mb-2">Địa chỉ email</label>
						<input type="email" required="" name="email" placeholder="Email" id="recover-email" class="form-control">
					</div>
					<div class="sitebox-recaptcha mb-4">
						This site is protected by reCAPTCHA and the Google
						<a href="https://policies.google.com/privacy" target="_blank" rel="noreferrer">Privacy Policy</a> 
						and <a href="https://policies.google.com/terms" target="_blank" rel="noreferrer">Terms of Service</a> apply.
					</div>
					<div class="customers-action-account text-center clearfix">
						<div class="action-button">
							<button type="submit" class="btn btn-box dark">Gửi</button>
						</div>
						<div class="register--password mt-3">
							<p>
								Bạn đã nhớ mật khẩu?
								<a href="#" onclick="hideRecoverPasswordForm();return false;">Quay lại đăng nhập</a>
							</p>
						</div>
					</div>
</form>				</div>
				
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	function showRecoverPasswordForm() {
	document.getElementById('recover-password').style.display = 'block';
	document.getElementById('login').style.display='none';
	}

	function hideRecoverPasswordForm() {
	document.getElementById('recover-password').style.display = 'none';
	document.getElementById('login').style.display = 'block';
	}

	if (window.location.hash == '#recover') { showRecoverPasswordForm() }
</script>


        </main>
@endsection
