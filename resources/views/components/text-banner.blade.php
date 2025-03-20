<section id="section-banner-home-frist" class="section section5 section-banner">
        <div class="wrapper-banner-introproduct introproduct-5">
            <div class="col-md-12">
                <div class="row align-items-md-center mb5">
                    <div class="col-12 col-md-7 left">
                        <div class="banner-introproduct">
                            <p class="passions-conflict">
                                {{ $name }}
                            </p>
                            <p class="text-description">
                            {{ $title }}
                            </p>
                            <p class="text-1">
                                {!! $description !!}
                            </p>
                            <!--<div class="row ba-cot">
							<div class="col-md-4"><img src="https://file.hstatic.net/200000296482/file/horeca-choice_e8aef896885a45178cb14b527df9d383.png" alt=""></div>
							<div class="col-md-4"><img src="https://file.hstatic.net/200000296482/file/dishwasher-safe_83a307cefd244b71abad8ba2ab7ade6c.png" alt=""></div>
							<div class="col-md-4"><img src="https://file.hstatic.net/200000296482/file/microwave-safe_be965e4ba16945fab419809bdfc00601.png" alt=""></div>
						</div>-->
                            <a href="{{ $link }}">
                                <div class="button-trai">
                                    <button type="button" class="btn btn-box dark">Xem thêm ngay</button>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-12 col-md-5 right">
                        <div class="banner-introproduct-image">
                            <picture>
                                <img
                                    src="{{ $img }}"
                                    alt="Bộ sưu tập sứ trắng không họa tiết">
                            </picture>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>