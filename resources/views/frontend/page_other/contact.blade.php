@extends('frontend.home.layout')
@section('page_title')
Liên hệ
@endsection
@section('content')
<main class="mainContent-theme">
    <div class="overlay123"></div>
    <div class="container-fluid breadcrumb">

        <div class="breadcrumb-content-inner">
            <div class="breadcrumb-shop clearfix">
                <div class="breadcrumb-list">
                    <ol class="breadcrumb breadcrumb-arrows" itemscope="" itemtype="http://schema.org/BreadcrumbList">
                        <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                            <a href="/" target="_self" itemprop="item"><span itemprop="name">Trang chủ</span></a>
                            <meta itemprop="position" content="1">
                        </li>
                        <li class="active" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                            <span itemprop="item" content="https://noritake.vn/pages/he-thong-cua-hang"><strong itemprop="name">Hệ thống cửa hàng</strong></span>
                            <meta itemprop="position" content="2">
                        </li>
                    </ol>
                </div>
            </div>
        </div>


    </div>
    <div class="layout-pageContact mt-4 mt-lg-5 mb-5">
        <div class="wrapper-infor-contact">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6 mb-4">
                        <div class="heading-page-contact">
                            <h2 class="mb-3">Hệ thống cửa hàng</h2>
                        </div>
                        <div class="description-contact">
                            <p>Nếu bạn có gì thắc mắc hãy liên hệ với chúng tôi qua địa chỉ</p>
                        </div>
                        <div class="wrapper-info-contact">
                            <ul class="list-info-contact">
                                <li class="d-flex">
                                    <div class="info-contact_left">
                                        <span class="mr-3">Điện thoại</span>
                                    </div>
                                    <div class="info-contact_right">
                                        <p class="m-0">0934033988</p>
                                    </div>
                                </li>
                                <li class="d-flex">
                                    <div class="info-contact_left">
                                        <span class="mr-3">Địa chỉ</span>
                                    </div>
                                    <div class="info-contact_right">
                                        <p class="m-0">40 Đường B2, KĐT Sala - Đại Quang Minh, P. An Lợi Đông, Q.2, Tp. Hồ Chí Minh</p>
                                    </div>
                                </li>
                                <li class="d-flex">
                                    <div class="info-contact_left">
                                        <span class="mr-3">Email</span>
                                    </div>
                                    <div class="info-contact_right">
                                        <p class="m-0">contact@noritake-vietnam.com</p>
                                    </div>
                                </li>
                                <li class="d-flex">
                                    <div class="info-contact_left">
                                        <span class="mr-3">Thời gian làm việc</span>
                                    </div>
                                    <div class="info-contact_right">
                                        <p class="m-0">Thứ 2 đến Thứ 7 từ 8h30 đến 19h; Chủ nhật từ 8h30 đến 17h00</p>
                                    </div>
                                </li>
                            </ul>

                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 mb-4">
                        <div class="heading-page-contact">
                            <h2 class="mt-3 mt-md-0 mb-3">Gửi thắc mắc cho chúng tôi</h2>
                            <div class="description-contact">
                                <p>Nếu bạn có thắc mắc gì, có thể gửi yêu cầu cho chúng tôi, và chúng tôi sẽ liên lạc lại với bạn sớm nhất có thể .</p>
                            </div>
                        </div>
                        <div class="wrapper-contact-form">
                            <form accept-charset="UTF-8" action="/contact" class="contact-form" method="post">
                                <input name="form_type" type="hidden" value="contact">
                                <input name="utf8" type="hidden" value="✓">
                                <input name="__RequestVerificationToken" type="hidden" value="CfDJ8FyFPV59mBtNhmQGz0fYZt_FgtNAPE7u8QGUxIojmlulBtS0Of4pfeyWxJ3930fcvkOoi-fj5lyYa_LaGKzKbBjKpz_JITYv9armZzq92H7kqg_amS4zmGBOveuDvkQ_cdxqGIK5wT-MNgj8dGSvMY7JTc5XNHM6cztYa5tCvnBvM-n7RrCQxst-Ogc2-sLdeg">

                                <div class="row">
                                    <div class="col-12 col-md-6 pr-md-2">
                                        <div class="form-group">
                                            <input required="" type="text" name="contact[name]" class="form-control" placeholder="Tên của bạn" aria-label="Tên của bạn">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 pl-md-2">
                                        <div class="form-group">
                                            <input required="" type="text" name="contact[email]" class="form-control" placeholder="Email của bạn" aria-label="Email của bạn">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input pattern="[0-9]{10,12}" required="" type="text" name="contact[phone]" class="form-control" placeholder="Số điện thoại của bạn" aria-label="Số điện thoại của bạn">
                                </div>
                                <div class="form-group">
                                    <textarea required="" name="contact[body]" cols="40" rows="5" class="text form-control" placeholder="Nội dung" aria-label="Nội dung"></textarea>
                                </div>
                                <div class="sitebox-recaptcha mb-3">
                                    This site is protected by reCAPTCHA and the Google
                                    <a href="https://policies.google.com/privacy" target="_blank" rel="noreferrer">Privacy Policy</a>
                                    and <a href="https://policies.google.com/terms" target="_blank" rel="noreferrer">Terms of Service</a> apply.
                                </div>
                                <button type="submit" class="btn btn-box dark clearfix">Gửi cho chúng tôi</button>

                                <input id="a21ea18c3e2045a6b37ff9d828397f63" name="g-recaptcha-response" type="hidden">
                                <script src="https://www.google.com/recaptcha/api.js?render=6LchSLkqAAAAABVHBpeFgg8N-WgkYsr5fO6GUF_s"></script>
                                <script>
                                    let recaptchaElm = document.getElementById('a21ea18c3e2045a6b37ff9d828397f63');
                                    let recaptchaForm = recaptchaElm.parentNode;
                                    recaptchaForm.addEventListener("submit", function(formEvent) {
                                        if (!recaptchaElm.value) {
                                            formEvent.preventDefault();
                                            grecaptcha.ready(function() {
                                                grecaptcha.execute('6LchSLkqAAAAABVHBpeFgg8N-WgkYsr5fO6GUF_s', {
                                                    action: 'submit'
                                                }).then(function(token) {
                                                    recaptchaElm.value = token;
                                                    recaptchaForm.requestSubmit(formEvent.submitter)
                                                })
                                            })
                                        }
                                    })
                                </script>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="wrapper-map-contact pt-4">
            <div class="container-fluid">
                <div class="box-contact-map">

                    <iframe style="width: 100%;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15677.9796508507!2d106.7269498!3d10.7733555!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3175255cfaed7b6f%3A0xed24bb04136b5a20!2sNoritake%20Vi%E1%BB%87t%20Nam!5e0!3m2!1svi!2s!4v1717987285540!5m2!1svi!2s" width="600" height="450" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection