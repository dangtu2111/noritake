<section id="section-slider" class="section section--home-slider">
    <div id="home-slider" class="home-slider_3 owl-carousel">
        @forelse($banners as $index => $banner)
            @php
                $badge = $banner->publish == 1
                    ? '<span class="badge bg-success-subtle text-success text-uppercase p-2">Hiển Thị</span>'
                    : '<span class="badge bg-danger-subtle text-danger text-uppercase p-2">Ẩn</span>';
                
                $images = json_decode($banner->album, true);
                $image = is_array($images) ? ($images[0] ?? '') : $images;
            @endphp
            <div class="wrapper-item item-{{ $index + 1 }}">
                <div class="slider-image">
                    <picture>
                        <source media="(max-width: 767px)" srcset="{{ $image }}" sizes="100vw">
                        <source media="(min-width: 768px)" srcset="{{ $image }}" sizes="50vw">
                        <img src="{{ $image }}" alt="{{ $banner->name }}" loading="lazy">
                    </picture>
                </div>
                @if(!empty($banner->location))
                    <a href="{{ $banner->location }}" target="_blank" aria-label="Xem chi tiết về {{ $banner->name }}">
                        <div class="slider-content-text d-flex align-items-center text-center">
                            {{ $banner->name ?? '' }}
                        </div>
                    </a>
                @endif
            </div>
        @empty
            <p class="text-center">Không có banner nào để hiển thị.</p>
        @endforelse
    </div>

    <div class="container-fluid-mb f1 wrap-pagination1">
        <div class="wrap-swiper-button">
            <!-- Desktop Pagination -->
            <div class="row swiper-pagination1 swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-horizontal camket-mb">
                @foreach([
                    ["make-in-japan-icon_781cdb8ebc1b4439afa4737df245d00e.png", "Thương hiệu sứ cao cấp số 1 Nhật Bản"],
                    ["goi-qua-icon_9fb77d46ac8f4954838b78c7e43f3a61.png", "Hỗ trợ gói quà miễn phí"],
                    ["bao-hanh-be-vo-icon_2f6d022577394ed2976ed61a8c552e10.png", "Bảo hành bể vỡ khi vận chuyển"]
                ] as $key => $item)
                <div class="col-4 col-md-4 icon-box b{{ $key + 1 }}">
                    <img class="image-icon" src="//file.hstatic.net/200000296482/file/{{ $item[0] }}" alt="{{ $item[1] }}">
                    <span class="swiper-pagination-bullet {{ $key === 0 ? 'swiper-pagination-bullet-active' : '' }}" tabindex="0">{{ $item[1] }}</span>
                </div>
                @endforeach
            </div>

            <!-- Mobile Pagination -->
            <div class="row swiper-pagination-mb swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-horizontal camket-dt">
                @foreach([
                    ["make-in-japan-icon_781cdb8ebc1b4439afa4737df245d00e.png", "Thương hiệu sứ cao cấp số 1 Nhật Bản"],
                    ["goi-qua-icon_9fb77d46ac8f4954838b78c7e43f3a61.png", "Hỗ trợ gói quà miễn phí"],
                    ["bao-hanh-be-vo-icon_2f6d022577394ed2976ed61a8c552e10.png", "Bảo hành bể vỡ khi vận chuyển"]
                ] as $key => $item)
                <div class="icon-box-mb b{{ $key + 1 }}">
                    <img class="image-icon-mb" src="//file.hstatic.net/200000296482/file/{{ $item[0] }}" alt="{{ $item[1] }}">
                    <span class="swiper-pagination-bullet {{ $key === 0 ? 'swiper-pagination-bullet-active' : '' }}" tabindex="0">{{ $item[1] }}</span>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
