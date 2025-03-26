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
<script>
	var template_style = "style-03";
	$(document).ready(function(){
		$(document).on('click','#add-to-cart', function(e){	
			e.preventDefault();
			var quantity = $("#quantity").val();
			add_item_show_modalCart($('#product-select').val(),quantity,{{ $product->del }});
			/*$('.header-bottom').addClass('pos-relative');*/
			$('html, body').animate({scrollTop:0}, 10);

		});
		$('#quan-input').keyup(function(){
			$('[name="quantity"]').val($(this).val());
		});
		$('[name="quantity"]').on('keyup change', function(){
			$('#quan-input').val($(this).val());
		});
		$(document).on('click','.add-to-contactProduct', function(e){
			e.preventDefault();
			window.location.href = $('#link-to-contact').attr('href');
		});
		if(template_style == 'style-01'){
			$('body').scrollspy({ target: '#scrollspyProducts' });
			$('#scrollspyProducts a[href*="#"]').click(function(e){
				e.preventDefault();
				$('#scrollspyProducts .product-thumb').removeClass('active');
				$('html, body').animate({
					scrollTop: $($.attr(this, 'href')).offset().top + 20
				}, 500);		
			});
			if ($(window).width() < 992){
				$("#sliderProduct").owlCarousel({
					items:1,
					nav: true,
					dots: true,
					lazyLoad: false,		
					loop: false,	
					smartSpeed: 1000
				});	
			}
		}
		if(template_style == 'style-02'){
			if ($(window).width() < 992){
				$("#sliderProduct").owlCarousel({
					items: 1,
					nav: true,
					dots: true,
					lazyLoad: false,		
					loop: false,	
					smartSpeed: 1000
				});	
			}
		}
		if(template_style == 'style-03'){
			$('#productSlick-slider').slick({
				slidesToShow: 1,
				slidesToScroll: 1,
				arrows: true,
				fade: false,
				infinite: false,
				speed: 600,
				asNavFor: '#productSlick-thumb',
				dots: false,
				arrows: true,
				prevArrow: '<button type="button" data-role="none" class="slick-prev" aria-label="Previous" tabindex="0" role="button"></button>',
				nextArrow: '<button type="button" data-role="none" class="slick-next" aria-label="Next" tabindex="0" role="button"></button>',
				lazyLoad: 'ondemand'
			});
			if($(window).width() > 767) {
				$('#productSlick-thumb').slick({
					slidesToShow: 6,
					slidesToScroll: 6,
					asNavFor: '#productSlick-slider',
					dots: false,
					arrows: false,
					vertical: true,
					
					infinite: false,
					focusOnSelect: true,
          draggable: false
				});
			} else {
				$('#productSlick-thumb').slick({
					slidesToShow: 6,
					slidesToScroll: 6,
					asNavFor: '#productSlick-slider',
					dots: false,
					arrows: false,
					infinite: false,
					focusOnSelect: true
				});
			}
			
			$("#productSlick-slider").on('setPosition', function () {
				$(this).find('.slick-slide').height('auto');
				var slickTrackHeight = $(this).find('.slick-track').height();
				$(this).find('.slick-slide').css('height', slickTrackHeight + 'px');
			});
			
			$(document).on('click','#productSlick-thumb .product-thumb-item', function(e){
				e.preventDefault();
				$('#productSlick-thumb .product-thumb').removeClass('slick-current');
				$(this).parent().addClass('slick-current');
			});

		}
	});
	$(document).on("click", ".product-sharing", function(){
		$(this).toggleClass('sharing-active');
	});	
</script>
@endsection
@section('js')

@endsection