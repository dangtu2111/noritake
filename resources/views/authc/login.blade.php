@extends('frontend.home.layout')
@section('page_title')
Đăng nhập
@endsection
@section('content')
<link href="/theme.hstatic.net/200000296482/1001063914/14/style-customer.scss.css?v=5233" rel="stylesheet" type="text/css" media="all">

<main class="mainContent-theme">
    <div class="overlay123"></div>
    <div class="layout-account my-5">
        <div class="container">
            <div class="wrapbox-content-account pb-4">
                <div class="customers-account-form userbox m-auto">
                    <div id="login" class="customers-account">
                        <div class="account-type text-center">
                            <h1 style="scroll-margin-top: 40px;" id="đăng-nhập-1">Đăng nhập</h1>
                        </div>
                        <form accept-charset="UTF-8" action="{{ route('store.login') }}" id="customer_login" method="post">
                            <input name="form_type" type="hidden" value="customer_login">
                            <input name="utf8" type="hidden" value="✓">
                            <hr width="100%">
                            {{ csrf_field() }}
                            @if (Route::currentRouteNamed('auth.admin.login'))
                            <div class="form-group mb-4 clearfix">
                                <label for="customer_email" class="text-field d-none font-weight-normal text-uppercase mb-2">Địa chỉ email</label>
                                <input type="text" class="form-control" name="email" id="email" placeholder="Nhập email" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                <span class="text-danger fz-12 mt-1">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-4 clearfix">
                                <label for="customer_password" class="text-field d-none font-weight-normal text-uppercase mb-2">Mật khẩu</label>
                                <input id="password-input" name="password" required="" type="password" value="" placeholder="Mật khẩu" autocomplete="off" class="form-control">
                                @if ($errors->has('password'))
                                <span class="text-danger fz-12 mt-1">{{ $errors->first('password') }}</span>
                                @endif
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
                                        <a href="{{ route('password.confirm_email') }}">Khôi phục mật khẩu</a>
                                    </p>
                                    <p class="mb-0">
                                        Khách hàng mới?
                                        <a href="{{ route('auth.register') }}" class="" title="Đăng ký">Tạo tài khoản của bạn</a>
                                    </p>
                                </div>

                            </div>
                            @endif

                            <div class="social-login-container">
                                <a href="{{ route('auth.google') }}" style="width: 100%;" type="button" class="btn btn-danger btn-icon waves-effect waves-light">
                                    <div class="google-btn">
                                        <div class="google-icon-wrapper">
                                            <img class="google-icon" src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c1/Google_%22G%22_logo.svg/36px-Google_%22G%22_logo.svg.png" alt="Google Icon" />
                                        </div>
                                        <p class="btn-text"><b>Sign in with Google</b></p>
                                    </div>
                                </a>
                                <a href="{{ route('auth.facebook') }}" style="width: 100%;" type="button" class="btn btn-dark btn-icon waves-effect waves-light">
                                    <div class="facebook-btn">
                                        <div class="facebook-icon-wrapper">
                                            <img class="facebook-icon" src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/05/Facebook_Logo_%282019%29.png/900px-Facebook_Logo_%282019%29.png" alt="Facebook Icon" />
                                        </div>
                                        <p class="btn-text"><b>Sign in with Facebook</b></p>
                                    </div>
                                </a>
                            </div>
                        </form>
                    </div>
                    <div id="recover-password" style="display:none;">
                        <div class="account-type text-center">
                            <h2>Phục hồi mật khẩu</h2>
                        </div>
                        <form accept-charset="UTF-8" action="/account/recover" method="post">
                            <input name="form_type" type="hidden" value="recover_customer_password">
                            <input name="utf8" type="hidden" value="✓">
                            <input name="__RequestVerificationToken" type="hidden" value="CfDJ8FyFPV59mBtNhmQGz0fYZt9fYeHym1dn_nhlbJWXZGNYmCgoFt2HdXt-jIIZBj9hSf27YpnXIRyOneE-SebMwIhFxTK5X0i8ZSNZoHYrWl9-xutfLeL_8m31iso7W8EMJEXf2_5F_pakiRvcziL9dVEROpbsg-BJrn7T6JzJ8C6e_zV_chOY4mTHoL5JVktxTA">

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
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function showRecoverPasswordForm() {
            document.getElementById('recover-password').style.display = 'block';
            document.getElementById('login').style.display = 'none';
        }

        function hideRecoverPasswordForm() {
            document.getElementById('recover-password').style.display = 'none';
            document.getElementById('login').style.display = 'block';
        }

        if (window.location.hash == '#recover') {
            showRecoverPasswordForm()
        }
    </script>


</main>
<style>
    .social-login-container {
    display: flex;
    flex-direction: column;
    align-items: center; /* Căn giữa theo chiều ngang */
    gap: 15px; /* Khoảng cách giữa hai nút */
    max-width: 300px; /* Giới hạn chiều rộng */
    margin: 0 auto; /* Căn giữa container trong trang */
    padding: 20px;
}

.google-btn, .facebook-btn {
    display: flex;
    align-items: center; /* Căn giữa theo chiều dọc */
    justify-content: center; /* Căn giữa theo chiều ngang */
    width: 100%; /* Chiếm toàn bộ chiều rộng của container cha */
    border-radius: 5px;
    padding: 10px 15px;
    text-decoration: none;
    font-family: Arial, sans-serif;
    transition: background-color 0.3s ease;
}

.google-btn {
    background-color: #4285F4; /* Màu nền Google */
    color: white;
}

.google-btn:hover {
    background-color: #3267D6;
}

.facebook-btn {
    background-color: #3B5998; /* Màu nền Facebook */
    color: white;
}

.facebook-btn:hover {
    background-color: #2D4373;
}

.google-icon-wrapper, .facebook-icon-wrapper {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 32px;
    height: 32px;
    background-color: white;
    border-radius: 3px;
    margin-right: 10px;
}

.google-icon, .facebook-icon {
    width: 20px;
    height: 20px;
}

.btn-text {
    margin: 0; /* Xóa margin mặc định của <p> */
    font-size: 16px;
    font-weight: 500;
    text-align: center; /* Đảm bảo text căn giữa */
    flex: 1; /* Cho phép text chiếm không gian còn lại */
}

/* Nếu bạn dùng class btn từ Bootstrap, đảm bảo không bị ghi đè */
.btn {
    padding: 0; /* Xóa padding mặc định của Bootstrap */
    border: none; /* Xóa border mặc định */
}
</style>
@endsection