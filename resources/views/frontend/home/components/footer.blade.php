@if(!empty($systems))
<section id="sectionInfoFooter" class="clearfix">
<div class="footer-top">
    <ul class="row footer-top-trai">
              <li class="column_trai w6 top"><i class="fa fa-circle" aria-hidden="true"></i><a href="/pages/chinh-sach-doi-tra">Chính sách giao hàng &amp; đổi trả</a></li>
              <li class="column_trai w4 top"><i class="fa fa-circle" aria-hidden="true"></i><a href="/pages/chinh-sach-bao-mat">Chính sách bảo mật</a></li>
              <li class="column_trai w6 bot"><i class="fa fa-circle" aria-hidden="true"></i><a href="/pages/dieu-khoan-dich-vu">Phương thức thanh toán</a></li>
              <li class="column_trai w4 bot"><i class="fa fa-circle" aria-hidden="true"></i><a href="/pages/huong-dan-su-dung">Hướng dẫn sử dụng</a></li>
          </ul>
  </div>
  <!--<div class="container-fluid-mb footer-mb-trai f2 clearfix">-->

  <div class="container-fluid-mb footer-mb-trai f2 clearfix">
    <div class="row innerInfoFooter clearfix">
      <div class="col-12 col-sm-4 site-animation col-footer-1">
        <p class="heading-h4">CHẤP NHẬN THANH TOÁN</p>
        <!--<div class="infoContent">
					<p>
						<span class="titleHotline"><a class="linkHotline" href="tel:1800 1162">0934 033 988</a></span>					
					</p>-->
        <ul class="payment-icon">
          @for($i = 1; $i <= 3; $i++)
            <li><img src="{{ $systems["homepage_logo_payment$i"] ?? '' }}"></li>
          @endfor
        </ul>

        <p class="heading-h4 footer-newletter footer-trai">ĐĂNG KÝ NHẬN KHUYẾN MẠI</p>
        <div class="col-9 col-sm-12 col-md-12 col-lg-9 col-xl-9" style="padding: 0; margin: 0 0 13px 0;">
          <form accept-charset='UTF-8' action='{{ route('sendmail_promotion') }}' class='contact-form' method='post'>
          @csrf
          <input type="hidden" name="full_name" value="{{ auth()->check() ? auth()->user()->name : 'Người đăng kí' }}">

            <input type="email" placeholder="Nhập email của bạn" name="email">
            <button type="submit" class="btn btn-box dark">Đăng ký</button>
            
          </form>
        </div>

        <p class="heading-h4">LIÊN HỆ VỚI CHÚNG TÔI</p>
        <ul class="footer-text-line">
          <li><i class="fa fa-phone"></i>
            <p>Hotline: <a href="">{{ $systems['contact_hotline'] ?? '' }}</a> </p>
            </li>
          <li><i class="fa fa-envelope"></i>
            <p>Email: {{ $systems['contact_email'] ?? 'Chưa có email' }}</p>
          </li>
        </ul>
      </div>

      <div class="col-12 col-sm-4 site-animation col-footer-2">
        <p class="heading-h4">HỆ THỐNG SHOWROOM</p>
        <ul class="footer-wrap-item-info-list noClass">
          @foreach(['contact_address', 'contact_address1', 'contact_address2'] as $key)
            <li><i class="fa fa-map-marker"></i><p>{{ $systems[$key] ?? '' }}</p></li><br>
          @endforeach
        </ul>
      </div>

      <div class="col-12 col-sm-4 site-animation col-footer-3">
        <p class="heading-h4">FANPAGE CỦA CHÚNG TÔI</p>
        <div id="container1" style="width:100%;">
          @if(!empty($systems['contact_website']))
            <div class="fb-page" data-href="{{ $systems['contact_website'] }}" data-tabs="" data-width="555px" data-height="300px" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
              <blockquote cite="{{ $systems['contact_website'] }}" class="fb-xfbml-parse-ignore"><a href="{{ $systems['contact_website'] }}">{{ $systems['contact_website'] }}</a></blockquote>
            </div>
          @endif
        </div>
        <div class="icon-trai" style="display: flex; justify-content: space-between; align-items: center; margin-top: 5px;">
          <ul class="navbar-social">
            @for($i = 1; $i <= 4; $i++)
              @if(!empty($systems["contact_slug_logo$i"]) && !empty($systems["contact_logo$i"]))
                <li class="social">
                  <a data-eventlabel="{{ ['instagram', 'zalo', 'youtube', 'linkedin'][$i-1] }}" class="link-social" href="{{ $systems["contact_slug_logo$i"] }}" target="_blank" rel="nofollow">
                    <img class="icon-social {{ ['instagram', 'zalo', 'youtube', 'linkedin'][$i-1] }}" src="{{ $systems["contact_logo$i"] }}">
                  </a>
                </li>
              @endif
            @endfor
          </ul>
          <div class="navbar-social-1">
            <a style="text-align: right;" href="http://online.gov.vn/Home/WebDetails/80881"><img src="/file.hstatic.net/200000296482/file/bo-cong-thuong_3489dcf13995496c92881750ea9c9628.png" /></a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="footer-bot">
    <div class="footer-bot-trai">
      <p>© 2021 - 2024 - Bản quyền thuộc về Công ty TNHH NRTK - GĐKKD số 0316678810 do SKH&ĐT Tp. Hồ Chí Minh cấp ngày 20/01/2021.</p>
    </div>
  </div>
</section>

<div class="addThis_listSharing d-none">
  <ul class="addThis_listing">
    <li class="addThis_item">
      <a class="addThis_item--icon" href="tel:0934 033 988" rel="nofollow" aria-label="phone">
        <svg viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
          <circle cx="22" cy="22" r="22" fill="url(#paint2_linear)" />
          <path fill-rule="evenodd" clip-rule="evenodd" d="M14.0087 9.35552C14.1581 9.40663 14.3885 9.52591 14.5208 9.61114C15.3315 10.148 17.5888 13.0324 18.3271 14.4726C18.7495 15.2949 18.8903 15.9041 18.758 16.3558C18.6214 16.8415 18.3953 17.0971 17.384 17.9109C16.9786 18.239 16.5988 18.5756 16.5391 18.6651C16.3855 18.8866 16.2617 19.3212 16.2617 19.628C16.266 20.3395 16.7269 21.6305 17.3328 22.6232C17.8021 23.3944 18.6428 24.3828 19.4749 25.1413C20.452 26.0361 21.314 26.6453 22.2869 27.1268C23.5372 27.7488 24.301 27.9064 24.86 27.6466C25.0008 27.5826 25.1501 27.4974 25.1971 27.4591C25.2397 27.4208 25.5683 27.0202 25.9268 26.5772C26.618 25.7079 26.7759 25.5674 27.2496 25.4055C27.8513 25.201 28.4657 25.2563 29.0844 25.5716C29.5538 25.8145 30.5779 26.4493 31.2393 26.9095C32.1098 27.5187 33.9703 29.0355 34.2221 29.3381C34.6658 29.8834 34.7427 30.5821 34.4439 31.3534C34.1281 32.1671 32.8992 33.6925 32.0415 34.3444C31.2649 34.9323 30.7145 35.1581 29.9891 35.1922C29.3917 35.222 29.1442 35.1709 28.3804 34.8556C22.3893 32.3887 17.6059 28.7075 13.8081 23.65C11.8239 21.0084 10.3134 18.2688 9.28067 15.427C8.67905 13.7696 8.64921 13.0495 9.14413 12.2017C9.35753 11.8438 10.2664 10.9575 10.9278 10.4633C12.0288 9.64524 12.5365 9.34273 12.9419 9.25754C13.2193 9.19787 13.7014 9.24473 14.0087 9.35552Z" fill="white" />
          <defs>
            <linearGradient id="paint2_linear" x1="22" y1="-7.26346e-09" x2="22.1219" y2="40.5458" gradientUnits="userSpaceOnUse">
              <stop offset="50%" stop-color="#d29f13" />
              <stop offset="100%" stop-color="#d29f13" />
            </linearGradient>
          </defs>
        </svg>
        <span class="tooltip-text">HOTLINE</span>
      </a>
    </li>
    <li class="addThis_item">
      <a class="addThis_item--icon" href="http://zalo.me/3535660045369223497" target="_blank" rel="nofollow noreferrer" aria-label="zalo">
        <svg viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
          <circle cx="22" cy="22" r="22" fill="url(#paint4_linear)" />
          <g clip-path="url(#clip0)">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M15.274 34.0907C15.7773 34.0856 16.2805 34.0804 16.783 34.0804C16.7806 34.0636 16.7769 34.0479 16.7722 34.0333C16.777 34.0477 16.7808 34.0632 16.7832 34.0798C16.8978 34.0798 17.0124 34.0854 17.127 34.0965H25.4058C26.0934 34.0965 26.7809 34.0977 27.4684 34.0989C28.8434 34.1014 30.2185 34.1039 31.5935 34.0965H31.6222C33.5357 34.0798 35.0712 32.5722 35.0597 30.7209V27.4784C35.0597 27.4582 35.0612 27.4333 35.0628 27.4071C35.0676 27.3257 35.0731 27.2325 35.0368 27.2345C34.9337 27.2401 34.7711 27.2757 34.7138 27.3311C34.2744 27.6145 33.8483 27.924 33.4222 28.2335C32.57 28.8525 31.7179 29.4715 30.7592 29.8817C27.0284 31.0993 23.7287 31.157 20.2265 30.3385C20.0349 30.271 19.9436 30.2786 19.7816 30.292C19.6773 30.3007 19.5436 30.3118 19.3347 30.3068C19.3093 30.3077 19.2829 30.3085 19.2554 30.3093C18.9099 30.3197 18.4083 30.3348 17.8088 30.6877C16.4051 31.1034 14.5013 31.157 13.5175 31.0147C13.522 31.0245 13.5247 31.0329 13.5269 31.0407C13.5236 31.0341 13.5204 31.0275 13.5173 31.0208C13.5036 31.0059 13.4864 30.9927 13.4696 30.98C13.4163 30.9393 13.3684 30.9028 13.46 30.8268C13.4867 30.8102 13.5135 30.7929 13.5402 30.7757C13.5937 30.7412 13.6472 30.7067 13.7006 30.6771C14.4512 30.206 15.1559 29.6905 15.6199 28.9311C16.2508 28.1911 15.9584 27.9025 15.4009 27.3524L15.3799 27.3317C12.6639 24.6504 11.8647 21.8054 12.148 17.9785C12.486 15.8778 13.4829 14.0708 14.921 12.4967C15.7918 11.5433 16.8288 10.7729 17.9632 10.1299C17.9796 10.1198 17.9987 10.1116 18.0182 10.1032C18.0736 10.0793 18.1324 10.0541 18.1408 9.98023C18.1475 9.92191 18.0507 9.90264 18.0163 9.90264C17.3698 9.90264 16.7316 9.89705 16.0964 9.89148C14.8346 9.88043 13.5845 9.86947 12.3041 9.90265C10.465 9.95254 8.78889 11.1779 8.81925 13.3614C8.82689 17.2194 8.82435 21.0749 8.8218 24.9296C8.82053 26.8567 8.81925 28.7835 8.81925 30.7104C8.81925 32.5007 10.2344 34.0028 12.085 34.0749C13.1465 34.1125 14.2107 34.1016 15.274 34.0907ZM13.5888 31.1403C13.5935 31.1467 13.5983 31.153 13.6032 31.1594C13.7036 31.2455 13.8031 31.3325 13.9021 31.4202C13.8063 31.3312 13.7072 31.2423 13.6035 31.1533C13.5982 31.1487 13.5933 31.1444 13.5888 31.1403ZM16.5336 33.8108C16.4979 33.7885 16.4634 33.7649 16.4337 33.7362C16.4311 33.7358 16.4283 33.7352 16.4254 33.7345C16.4281 33.7371 16.4308 33.7397 16.4335 33.7423C16.4632 33.7683 16.4978 33.79 16.5336 33.8108Z" fill="white" />
            <path d="M17.6768 21.6754C18.5419 21.6754 19.3555 21.6698 20.1633 21.6754C20.6159 21.6809 20.8623 21.8638 20.9081 22.213C20.9597 22.6509 20.6961 22.9447 20.2034 22.9502C19.2753 22.9613 18.3528 22.9558 17.4247 22.9558C17.1554 22.9558 16.8919 22.9669 16.6226 22.9502C16.2903 22.9336 15.9637 22.8671 15.8033 22.5345C15.6429 22.2019 15.7575 21.9026 15.9752 21.631C16.8575 20.5447 17.7455 19.4527 18.6336 18.3663C18.6851 18.2998 18.7367 18.2333 18.7883 18.1723C18.731 18.0781 18.6508 18.1224 18.582 18.1169C17.9633 18.1114 17.3388 18.1169 16.72 18.1114C16.5768 18.1114 16.4335 18.0947 16.296 18.067C15.9695 17.995 15.7689 17.679 15.8434 17.3686C15.895 17.158 16.0669 16.9862 16.2846 16.9363C16.4221 16.903 16.5653 16.8864 16.7085 16.8864C17.7284 16.8809 18.7539 16.8809 19.7737 16.8864C19.9571 16.8809 20.1347 16.903 20.3123 16.9474C20.7019 17.0749 20.868 17.4241 20.7133 17.7899C20.5758 18.1058 20.3581 18.3774 20.1404 18.649C19.3899 19.5747 18.6393 20.4948 17.8888 21.4093C17.8258 21.4814 17.7685 21.5534 17.6768 21.6754Z" fill="white" />
            <path d="M24.3229 18.7604C24.4604 18.5886 24.6036 18.4279 24.8385 18.3835C25.2911 18.2948 25.7151 18.5775 25.7208 19.021C25.738 20.1295 25.7323 21.2381 25.7208 22.3467C25.7208 22.6349 25.526 22.8899 25.2453 22.973C24.9588 23.0783 24.6322 22.9952 24.4432 22.7568C24.3458 22.6404 24.3057 22.6183 24.1682 22.7236C23.6468 23.1338 23.0567 23.2058 22.4207 23.0063C21.4009 22.6848 20.9827 21.9143 20.8681 20.9776C20.7478 19.9632 21.0973 19.0986 22.0369 18.5664C22.816 18.1175 23.6067 18.1563 24.3229 18.7604ZM22.2947 20.7836C22.3061 21.0275 22.3863 21.2603 22.5353 21.4543C22.8447 21.8534 23.4348 21.9365 23.8531 21.6372C23.9218 21.5873 23.9848 21.5263 24.0421 21.4543C24.363 21.033 24.363 20.3402 24.0421 19.9189C23.8817 19.7027 23.6296 19.5752 23.3603 19.5697C22.7301 19.5309 22.289 20.002 22.2947 20.7836ZM28.2933 20.8168C28.2474 19.3923 29.2157 18.3281 30.5907 18.2893C32.0517 18.245 33.1174 19.1928 33.1632 20.5785C33.209 21.9808 32.321 22.973 30.9517 23.106C29.4563 23.2502 28.2704 22.2026 28.2933 20.8168ZM29.7313 20.6838C29.7199 20.961 29.8058 21.2326 29.9777 21.4598C30.2928 21.8589 30.8829 21.9365 31.2955 21.6261C31.3585 21.5818 31.41 21.5263 31.4616 21.4709C31.7939 21.0496 31.7939 20.3402 31.4673 19.9189C31.3069 19.7083 31.0548 19.5752 30.7855 19.5697C30.1668 19.5364 29.7313 19.991 29.7313 20.6838ZM27.7891 19.7138C27.7891 20.573 27.7948 21.4321 27.7891 22.2912C27.7948 22.6848 27.474 23.0118 27.0672 23.0229C26.9985 23.0229 26.924 23.0174 26.8552 23.0007C26.5688 22.9287 26.351 22.6349 26.351 22.2857V17.8791C26.351 17.6186 26.3453 17.3636 26.351 17.1031C26.3568 16.6763 26.6375 16.3992 27.0615 16.3992C27.4969 16.3936 27.7891 16.6708 27.7891 17.1142C27.7948 17.9789 27.7891 18.8491 27.7891 19.7138Z" fill="white" />
            <path d="M22.2947 20.7828C22.289 20.0013 22.7302 19.5302 23.3547 19.5634C23.6239 19.5745 23.876 19.702 24.0364 19.9181C24.3573 20.3339 24.3573 21.0322 24.0364 21.4535C23.7271 21.8526 23.1369 21.9357 22.7187 21.6364C22.65 21.5865 22.5869 21.5255 22.5296 21.4535C22.3864 21.2595 22.3062 21.0267 22.2947 20.7828ZM29.7314 20.683C29.7314 19.9957 30.1668 19.5357 30.7856 19.569C31.0549 19.5745 31.307 19.7075 31.4674 19.9181C31.794 20.3394 31.794 21.0544 31.4617 21.4701C31.1408 21.8636 30.545 21.9302 30.1382 21.6198C30.0752 21.5754 30.0236 21.52 29.9778 21.459C29.8059 21.2318 29.7257 20.9602 29.7314 20.683Z" fill="#0068FF" />
          </g>
          <defs>
            <linearGradient id="paint4_linear" x1="22" y1="0" x2="22" y2="44" gradientUnits="userSpaceOnUse">
              <stop offset="50%" stop-color="#d29f13" />
              <stop offset="100%" stop-color="#d29f13" />
            </linearGradient>
            <clipPath id="clip0">
              <rect width="26.3641" height="24.2" fill="white" transform="translate(8.78906 9.90234)" />
            </clipPath>
          </defs>
        </svg>
        <span class="tooltip-text">Chat với chúng tôi qua Zalo</span>
      </a>
    </li>
    <li class="addThis_item">
      <a class="addThis_item--icon" data-toggle="modal" href="#addthis-modalContact" aria-label="email">
        <svg viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
          <circle cx="22" cy="22" r="22" fill="url(#paint1_linear)" />
          <path fill-rule="evenodd" clip-rule="evenodd" d="M11.4589 11.6667H32.5414C33.1621 11.6667 33.6993 11.8861 34.153 12.3245C34.6062 12.7634 34.8332 13.2904 34.8332 13.9064C34.8332 14.6435 34.599 15.3481 34.1319 16.0197C33.6639 16.6914 33.0816 17.2655 32.3846 17.7413C30.0672 19.3131 28.3185 20.4998 27.1311 21.3061C26.4785 21.7489 25.9931 22.0787 25.6817 22.2905C25.6355 22.3222 25.5634 22.3723 25.4675 22.4396C25.3643 22.5117 25.2337 22.6037 25.0729 22.7174C24.7625 22.9368 24.5048 23.114 24.2994 23.2495C24.0938 23.3846 23.8457 23.5363 23.5545 23.7043C23.2631 23.8724 22.9887 23.9983 22.7309 24.0823C22.4731 24.1661 22.2344 24.2082 22.0148 24.2082H22.0006H21.9863C21.7667 24.2082 21.5281 24.1661 21.2702 24.0823C21.0125 23.9983 20.7378 23.8721 20.4466 23.7043C20.1552 23.5363 19.9068 23.385 19.7017 23.2495C19.4964 23.114 19.2386 22.9368 18.9284 22.7174C18.7672 22 inefficiency6037 18.6366 22.5118 18.5334 22.4393L18.5233 22.4323C18.4325 22.3688 18.3638 22.3208 18.3195 22.2905C17.9197 22.0157 17.4354 21.6846 16.8739 21.3022C16.2152 20.8532 15.4486 20.3329 14.5671 19.7359C12.9342 18.6303 11.9554 17.9654 11.6308 17.7413C11.0388 17.3494 10.4802 16.8107 9.95513 16.1248C9.43011 15.4387 9.16748 14.8018 9.16748 14.214C9.16748 13.4864 9.36539 12.8796 9.76184 12.3944C10.158 11.9095 10.7234 11.6667 11.4589 11.6667ZM33.4002 19.2392C31.4494 20.5296 29.7913 21.6405 28.4258 22.5725L34.8324 28.8337V18.0213C34.4217 18.4695 33.9443 18.8752 33.4002 19.2392ZM9.1665 18.0214C9.58659 18.4788 10.0691 18.8848 10.6132 19.2393C12.6414 20.5863 14.2935 21.6952 15.5757 22.5701L9.1665 28.8335V18.0214ZM34.0421 30.8208C33.6172 31.1883 33.1173 31.3745 32.5403 31.3745H11.4578C10.8809 31.3745 10.3807 31.1883 9.95575 30.8208L17.2287 23.7122C17.4107 23.8399 17.5789 23.9592 17.7306 24.0679C18.2751 24.4597 18.7165 24.7654 19.0556 24.9845C19.3944 25.2041 19.8455 25.4279 20.4091 25.6564C20.9726 25.8853 21.4976 25.9993 21.9847 25.9993H21.9989H22.0132C22.5002 25.9993 23.0253 25.8852 23.5888 25.6564C24.152 25.4279 24.6032 25.2041 24.9423 24.9845C25.2814 24.7654 25.7231 24.4597 26.2672 24.0679C26.427 23.955 26.5961 23.8362 26.7705 23.7141L34.0421 30.8208Z" fill="white" />
          <defs>
            <linearGradient id="paint1_linear" x1="22" y1="0" x2="22" y2="44" gradientUnits="userSpaceOnUse">
              <stop offset="50%" stop-color="#d29f13" />
              <stop offset="100%" stop-color="#d29f13" />
            </linearGradient>
          </defs>
        </svg>
        <span class="tooltip-text">Đăng kí thông tin và để lại lời nhắn</span>
      </a>
    </li>
    <li class="addThis_item">
      <a class="addThis_item--icon" href="https://www.google.com/maps/place/Noritake+Việt+Nam/@10.7733732,106.7247518,17z/data=!3m1!4b1!4m5!3m4!1s0x3175255cfaed7b6f:0xed24bb04136b5a20!8m2!3d10.7733732!4d106.7269405" aria-label="Liên hệ" rel="noreferrer">
        <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
          <circle cx="22" cy="22" r="22" fill="url(#paint5_linear)" />
          <path d="M22 10C17.0374 10 13 13.7367 13 18.3297C13 24.0297 21.0541 32.3978 21.397 32.7512C21.7191 33.0832 22.2815 33.0826 22.603 32.7512C22.9459 32.3978 31 24.0297 31 18.3297C30.9999 13.7367 26.9626 10 22 10ZM22 22.5206C19.5032 22.5206 17.4719 20.6406 17.4719 18.3297C17.4719 16.0188 19.5032 14.1388 22 14.1388C24.4968 14.1388 26.528 16.0189 26.528 18.3297C26.528 20.6406 24.4968 22.5206 22 22.5206Z" fill="white" />
          <defs>
            <linearGradient id="paint5_linear" x1="22" y1="0" x2="22" y2="44" gradientUnits="userSpaceOnUse">
              <stop offset="50%" stop-color="#d29f13" />
              <stop offset="100%" stop-color="#d29f13" />
            </linearGradient>
          </defs>
        </svg>
        <span class="tooltip-text">Xem địa chỉ doanh nghiệp</span>
      </a>
    </li>
  </ul>
</div>

<div class="actionToolbar_mobile d-md-none actionToolbar_mobile-trai">
  <ul class="actionToolbar_listing d-flex justify-content-between align-items-center">
    <li>
      <a href="tel:0934 033 988" rel="nofollow" aria-label="phone">
        <img src="/file.hstatic.net/200000296482/file/hot-line.png" alt="phone">
      </a>
      <span class="tooltip-text trai">Gọi Ngay</span>
    </li>
    <li>
      <a href="http://zalo.me/3535660045369223497" target="_blank" rel="nofollow noreferrer" aria-label="zalo">
        <img src="/file.hstatic.net/200000296482/file/zalo-icon.png" alt="zalo">
      </a>
      <span class="tooltip-text trai">Zalo</span>
    </li>
    <li>
      <a href="{{ route('home_index.index') }}" rel="noreferrer noopener" aria-label="home">
        <img src="/file.hstatic.net/200000296482/file/home_icon_orange.png" alt="home">
      </a>
      <span class="tooltip-text trai">Trang chủ</span>
    </li>
    <li>
      <a href="http://m.me/101945615048076" rel="nofollow" aria-label="messenger">
        <img src="/file.hstatic.net/200000296482/file/mess-icon.png" alt="messenger">
      </a>
      <span class="tooltip-text trai">Messenger</span>
    </li>
    <li>
      <a href="#" aria-label="Go to top" onclick="topFunction()">
        <img src="/file.hstatic.net/200000296482/file/go-to-top.png" alt="Go to top">
      </a>
      <span class="tooltip-text trai">Go to top</span>
    </li>
  </ul>
</div>

<div id="addthis-modalContact" class="modal fade modal-addThis modal-contactform" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <p class="modal-title" id="exampleModalLabel">Để lại lời nhắn cho chúng tôi</p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body body-popupform">
        <form accept-charset='UTF-8' action='' class='contact-form' method='post'>
          <input name='form_type' type='hidden' value='contact'>
          <input name='utf8' type='hidden' value='✓'>
          <input name='__RequestVerificationToken' type='hidden' value='CfDJ8FyFPV59mBtNhmQGz0fYZt_c0YksJidjGQ-Nt1gusScYneRZEG0n55dUbXkXnLdiJykFZ9cjvJM77N34CSE-UjXUYhwEMecdQS5Y7UmVyZFRq0SH93BtKkq3CSPuJlFp9CaBumKSTii1r6jWQxDfZY8'>
          <div class="row">
            <div class="col-12">
              <div class="input-group mb-3">
                <input required type="text" class="form-control" id="yourname" name="contact[name]" placeholder="Tên của bạn" aria-label="Tên của bạn">
              </div>
            </div>
            <div class="col-12">
              <div class="input-group mb-3">
                <input required type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" class="form-control" id="youremail" name="contact[email]" placeholder="Email của bạn" aria-label="Email của bạn">
              </div>
            </div>
            <div class="col-12">
              <div class="input-group mb-3">
                <input required pattern="\+?\(?\d{2,4}\)?[\d\s-]{3,}" maxlength="18" type="text" id="yourphone" name="contact[phone]" class="form-control" placeholder="Số điện thoại của bạn" aria-label="Số điện thoại của bạn">
              </div>
            </div>
            <div class="col-12">
              <div class="input-group mb-3">
                <textarea required placeholder="Nội dung" class="form-control" id="yourinfor" name="contact[body]" rows="3" aria-label="Nội dung"></textarea>
              </div>
            </div>
            <div class="col-12">
              <div class="sitebox-recaptcha mb-3">
                This site is protected by reCAPTCHA and the Google
                <a href="https://policies.google.com/privacy" target="_blank" rel="noreferrer">Privacy Policy</a>
                and <a href="https://policies.google.com/terms" target="_blank" rel="noreferrer">Terms of Service</a> apply.
              </div>
            </div>
            <div class="col-12 text-center">
              <button class="btnSubmit-modal btn btn-box dark clearfix">Gửi cho chúng tôi</button>
            </div>
          </div>
          <!-- <input id='da50cddbf79b428595434c207502e686' name='g-recaptcha-response' type='hidden'><noscript src='../www.google.com/recaptcha/api030a.js?render=6LchSLkqAAAAABVHBpeFgg8N-WgkYsr5fO6GUF_s'></noscript><noscript>let recaptchaElm=document.getElementById('da50cddbf79b428595434c207502e686');let recaptchaForm=recaptchaElm.parentNode;recaptchaForm.addEventListener("submit",function(formEvent){if(!recaptchaElm.value){formEvent.preventDefault();grecaptcha.ready(function(){grecaptcha.execute('6LchSLkqAAAAABVHBpeFgg8N-WgkYsr5fO6GUF_s',{action:'submit'}).then(function(token){recaptchaElm.value=token;recaptchaForm.requestSubmit(formEvent.submitter)})})}})</noscript> -->
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade modal-addThis modal-succesform ">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-icon sweet-alert">
        <div class="sa-icon sa-success animate"> <span class="sa-line sa-tip animateSuccessTip"></span> <span class="sa-line sa-long animateSuccessLong"></span>
          <div class="sa-placeholder"></div>
          <div class="sa-fix"></div>
        </div>
      </div>
      <div class="modal-body text-center">
        <p class="modal-title">Đăng kí thông tin thành công</p>
        <p>Cảm ơn bạn đã để lại thông tin <br> Chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất </p>
        <p class="txtloading">Thông báo sẽ tự động tắt sau 5 giây...</p>
      </div>
    </div>
  </div>
</div>

<style>
  .tooltip-text.trai { font-size: 10px; margin-top: 5px; }
  .actionToolbar_mobile { transition: transform 0.2s ease-in-out; }
  .actionToolbar_mobile-trai { height: 60px !important; padding: 6.5px !important; }
  .actionToolbar_mobile-trai img { width: 30px; height: 30px; }
  .actionToolbar_mobile ul.actionToolbar_listing li { display: flex; flex-direction: column; align-items: center; }
  .selector-actions.selector-actions_bottom-mb { transition: transform 0.2s ease-in-out; }
</style>
</div>

<!-- Site Overlay -->
<div id="site-overlay" class="site-overlay"></div>
<script>

    // Gửi form khi người dùng nhấn nút đăng ký
    $('.contact-form').on('submit', function(e) {
        e.preventDefault(); // Ngừng hành động submit mặc định của form

        // Lấy dữ liệu của form
        var formData = new FormData(this);

        // Gửi dữ liệu AJAX
        $.ajax({
            url: $(this).attr('action'), // Lấy URL từ thuộc tính action của form
            method: 'POST',
            data: formData,
            processData: false, // Không xử lý dữ liệu
            contentType: false, // Không thay đổi kiểu nội dung
            success: function(response) {
                // Nếu gửi thành công, xử lý dữ liệu trả về
                alert(response.message); // Giả sử server trả về thông điệp
            },
            error: function(xhr, status, error) {
                // Xử lý lỗi
                alert('Có lỗi xảy ra! Vui lòng thử lại.');
            }
        });
    });

</script>
{{ $systems['homepage_script']??'' }}
@endif