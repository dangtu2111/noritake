<div class="main-header">

    <a href="/" class="logo">

        <h1 class="logo-text">{{ $systems['homepage_company'] }}</h1>

    </a>

    <style>
        a.logo {
            display: block;
        }

        .logo-cus {
            width: 100%;
            padding: 15px 0;
            text-align: ;
        }

        .logo-cus img {
            max-height: 4.2857142857em
        }

        .logo-text {
            text-align: ;
        }

        @media (max-width: 767px) {
            .banner a {
                display: block;
            }
        }
    </style>


</div>
<div class="main-content">



    <div>
        <div class="section">
            <div class="section-header os-header">

                <svg width="50" height="50" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="#000" stroke-width="2" class="hanging-icon checkmark">
                    <path class="checkmark_circle" d="M25 49c13.255 0 24-10.745 24-24S38.255 1 25 1 1 11.745 1 25s10.745 24 24 24z"></path>
                    <path class="checkmark_check" d="M15 24.51l7.307 7.308L35.125 19"></path>
                </svg>

                <div class="os-header-heading">
                    <h2 class="os-header-title">

                        Đặt hàng thành công

                    </h2>
                    <span class="os-order-number">
                        Mã đơn hàng {{ $order->code }}
                    </span>

                    <span class="os-description">
                        Cám ơn bạn đã mua hàng!
                    </span>

                </div>
            </div>
        </div>

        <div class="thank-you-additional-content">
       
            
        </div>

        <div class="section thank-you-checkout-info">
            <div class="section-content">
                <div class="content-box">
                    <div class="content-box-row content-box-row-padding content-box-row-no-border">
                        <h2>Thông tin đơn hàng</h2>
                    </div>
                    <div class="content-box-row content-box-row-padding">
                        <div class="section-content">
                            <div class="section-content-column">
                                <h3>Thông tin giao hàng</h3>

                                {{ $order->full_name }}
                                <br>



                                {{ $order->phone }}
                                <br>





                                <p>


                                {{ $order->address }}
                                    <br>
                                    Vietnam
                                    <br>


                                </p>



                                <h3>Phương thức thanh toán</h3>
                                <p>

                                    Thanh toán khi nhận hàng

                                </p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="step-footer">

            <a href="{{ route('home.index') }}" class=" btn">
                <span class="btn-content">Tiếp tục mua hàng</span>
            </a>

            <p class="step-footer-info">
                <i class="icon icon-os-question"></i>
                <span>


                    Cần hỗ trợ? <a href="mailto:{{ config('mail.system_mail') }}">Liên hệ chúng tôi</a>
                </span>
            </p>
        </div>
    </div>


</div>
<div class="hrv-coupons-popup">
    <div class="hrv-title-coupons-popup">
        <p>Chọn giảm giá <span class="count-coupons"></span></p>
        <div class="hrv-coupons-close-popup">
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M17.1663 2.4785L15.5213 0.833496L8.99968 7.35516L2.47801 0.833496L0.833008 2.4785L7.35468 9.00016L0.833008 15.5218L2.47801 17.1668L8.99968 10.6452L15.5213 17.1668L17.1663 15.5218L10.6447 9.00016L17.1663 2.4785Z" fill="#424242"></path>
            </svg>
        </div>
    </div>
    <div class="hrv-content-coupons-code">
        <h3 class="coupon_heading">Mã giảm giá của shop</h3>
        <div class="hrv-discount-code-web">
        </div>
        <div class="hrv-discount-code-external">

        </div>
    </div>
</div>
<div class="hrv-coupons-popup-site-overlay"></div>
<div class="main-footer footer-powered-by">Powered by Dang Tu</div>
