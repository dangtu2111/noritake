<div class="product-container-gallery blog-aside-sticky">
    <div class="wrapbox-image d-flex">
        <div class="productSlick-slider-trai-1">
            <div class="lSSlideOuter vertical" style="padding-left: 0px;">
                <div class="lSSlideWrapper usingCss" style="height: 539px;">
                    <ul class="productList-slider lightSlider lsGrab lSSlide" id="productSlick-slider-trai-1">
                        @php
                            // Xử lý chuỗi album thành mảng
                            if ($product->album) {
                                $images = explode(',', $product->album); // Tách chuỗi bằng dấu phẩy
                                $images = array_map('trim', $images); // Loại bỏ khoảng trắng thừa
                            } else {
                                $images = $product->image ? [$product->image] : ['/default-image.jpg'];
                            }
                            $index = 1;
                        @endphp
                        @foreach($images as $image)
                            <li data-thumb="{{ asset($image) }}" 
                                data-src="{{ asset($image) }}" 
                                class="lslide {{ $index == 1 ? 'active' : '' }}" 
                                style="height: 539px; margin-bottom: 0px;">
                                <picture>
                                    <source media="(max-width: 480px)" 
                                            srcset="{{ asset($image) }}">
                                    <source media="(min-width: 481px)" 
                                            srcset="{{ asset($image) }}">
                                    <img class="trai" 
                                         id="zo-{{ $index }}" 
                                         data-zoom-image="{{ asset($image) }}" 
                                         src="{{ asset($image) }}" 
                                         alt="{{ $product->name ?? 'Sản phẩm không có tên' }}" 
                                         style="width: 100%; height: 100%; object-fit: cover; display: block;">
                                </picture>
                            </li>
                            @php $index++; @endphp
                        @endforeach
                    </ul>
                    <div class="lSAction"><a class="lSPrev"></a><a class="lSNext"></a></div>
                </div>
              
            </div>
        </div>
    </div>
</div>

<div class="product-container-gallery-trai">
    <div class="overlay" style="display: none;"></div>
    <input type="hidden" id="idproduct" value="{{ $product->id ?? '' }}" name="idproduct" />
    <ul class="productList-slider-trai" id="productSlick-slider-trai">
        @foreach($images as $image)
            <li data-thumb="{{ asset($image) }}" 
                data-src="{{ asset($image) }}">
                <picture>
                    <source media="(max-width: 480px)" 
                            srcset="{{ asset($image) }}">
                    <source media="(min-width: 481px)" 
                            srcset="{{ asset($image) }}">
                    <img class="trai" 
                         id="zo-{{ $loop->iteration }}" 
                         data-zoom-image="{{ asset($image) }}" 
                         src="{{ asset($image) }}" 
                         alt="{{ $product->name ?? 'Sản phẩm không có tên' }}">
                </picture>
            </li>
        @endforeach
    </ul>
</div>
<!-- CSS -->
