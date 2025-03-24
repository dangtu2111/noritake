@extends('frontend.home.layout')
@section('page_title')
Chi tiết sản phẩm
@endsection
@section('content')
<main class="mainContent-theme">
    <div class="overlay123"></div>
    <div class="layout-productDetail">
        @php
        $price = '';
        $priceDiscount = '';
        $price .=
        $product->del != 0 && $product->del != null
        ? number_format($product->del, '0', ',', '.') .
        'đ' .
        ' ' .
        '-' .
        ' ' .
        number_format($product->price, '0', ',', '.') .
        'đ'
        : number_format($product->price, '0', ',', '.') . 'đ';
        $priceDiscount .= number_format($product->price - $product->del, '0', ',', '.') . 'đ';
        // -- //
        $attrCatalogues = $product->attributeCatalogue;
        $albumVairiants = [];
        foreach ($product->productVariant as $variant) {
        if (!empty($variant->album)) {
        $albumVairiants[] = $variant->album;
        }
        }
        $gallerys = $albumVairiants;
        //-- //
        $totalSoldCount = 0;
        $totalReviewCount = 0;
        foreach ($product->productVariant as $variant) {
        $totalSoldCount += $variant->sold_count;
        }

        foreach ($product->productVariant as $variant) {
        $totalReviewCount += $variant->rating_count;
        }
        $numericPrice = (int) preg_replace('/\D/', '', $price);
        @endphp
        <div class="productDetail-information productDetail_style_03">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-7 product-content-image">

                        @include('frontend.product.component.product-container-gallery')

                    </div>
                    <div class="col-12 col-lg-5 product-content-summary" id="detail-product">
                        @include('frontend.product.component.product-content-summary')
                    </div>
                </div>
            </div>

        </div>

        <p class="d-none"><a id="link-to-contact" href="tel:0934 033 988">0934 033 988</a></p>
        
        <!-- trai 1 -->

        <div class="productDetail-related clearfix border-top pt-4 tr">
            @include('frontend.product.component.child_product')
        </div>

       
    </div>

    

    <style>
        @media (max-width: 767px) {
            .productSlick-slider-trai-1 {
                display: none;
                /* Ẩn slider trên mobile */
            }
        }

        @media (min-width: 767px) {
            .productSlick-slider-trai-1 {
                display: block;
                /* Hiển thị slider khi màn hình >= 767px */
            }
        }
    </style>

</main>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Khởi tạo LightSlider
        var slider = $('#productSlick-slider-trai-1').lightSlider({
            gallery: true,
            item: 1,
            vertical: true,
            verticalHeight: 539,
            vThumbWidth: 100,
            thumbItem: 6,
            thumbMargin: 15,
            slideMargin: 0,
            currentPagerPosition: 'left',
            controls: true,
            loop: true,
            onSliderLoad: function() {
                console.log('Slider loaded');
                // Đảm bảo ảnh hiển thị đúng kích thước
                document.querySelectorAll('.productList-slider.lightSlider li img').forEach(function(img) {
                    img.style.width = '100%';
                    img.style.height = '100%';
                    img.style.objectFit = 'cover';
                    img.style.display = 'block';
                });
            }
        });

        // Sự kiện click vào thumbnail
        document.querySelectorAll('.lSPager.lSGallery li').forEach(function(thumbnail) {
            thumbnail.addEventListener('click', function(e) {
                e.preventDefault(); // Ngăn hành vi mặc định của thẻ <a>
                var slideIndex = this.getAttribute('data-slide-index'); // Lấy chỉ số slide
                slider.goToSlide(slideIndex); // Chuyển slider đến slide tương ứng

                // Cập nhật class active
                document.querySelectorAll('.lSPager.lSGallery li').forEach(function(item) {
                    item.classList.remove('active');
                });
                this.classList.add('active');
            });
        });
    });
</script>
@endsection
@section('js')

@endsection