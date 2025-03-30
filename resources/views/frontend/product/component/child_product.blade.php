@if(isset($productSimilars) && $productSimilars->isNotEmpty())
<div class="productDetail-related clearfix border-top pt-4 tr">
    <div>
        <div class="productRelated-title text-center">
            <a href="{{ route('product.category', ['id' => optional($product->productCatalogues->first())->id]) }}">
                <h3>CÙNG BỘ SƯU TẬP</h3>
            </a>
        </div>
        <div class="noritake-conetent owl-carousel owl-theme" style="margin: 0px; display: flex; overflow-x: auto;">
            <div class="owl-stage-outer">
                <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all; width: 5881px;">
                    
                    @foreach($productSimilars as $productItem)
                    <div class="owl-item active" style="width: 207.8px; margin-right: 10px;">
                        <div class="product-loop">
                            <div class="product-inner product-resize">
                                <div class="product-image d-flex justify-content-center align-items-center image-resize">
                                    <!-- Nhãn giảm giá (nếu có) -->
                                    @if($productItem->del && $productItem->price > $productItem->del)
                                    <div class="product-label">
                                        <span class="onsale">
                                            <span class="sale-bg"></span>
                                            <span class="sale-text tr">
                                                -{{ round((($productItem->price - $productItem->del) / $productItem->price) * 100) }}%
                                            </span>
                                            <div class="corner-fold"></div>
                                        </span>
                                    </div>
                                    @endif

                                    <!-- Hình ảnh sản phẩm -->
                                    <a href="{{ route('product.detail', $productItem->slug) }}"
                                        title="{{ $productItem->name }}"
                                        class="aspect-ratio">
                                        <div class="image-first-holder d-flex justify-content-center align-items-center lazyloaded" data-expand="-1">
                                            <picture>
                                                <source media="(max-width: 480px)"
                                                    data-srcset="{{ $productItem->image ? asset($productItem->image) : '/default-image.jpg' }}"
                                                    srcset="{{ $productItem->image ? asset($productItem->image) : '/default-image.jpg' }}"
                                                    sizes="206px">
                                                <source media="(min-width: 481px) and (max-width: 767px)"
                                                    data-srcset="{{ $productItem->image ? asset($productItem->image) : '/default-image.jpg' }}"
                                                    srcset="{{ $productItem->image ? asset($productItem->image) : '/default-image.jpg' }}"
                                                    sizes="206px">
                                                <source media="(min-width: 768px)"
                                                    data-srcset="{{ $productItem->image ? asset($productItem->image) : '/default-image.jpg' }}"
                                                    srcset="{{ $productItem->image ? asset($productItem->image) : '/default-image.jpg' }}"
                                                    sizes="206px">
                                                <img class="image-loop lazyautosizes ls-is-cached lazyloaded"
                                                    data-sizes="auto"
                                                    data-src="{{ $productItem->image ? asset($productItem->image) : '/default-image.jpg' }}"
                                                    data-lowsrc="{{ $productItem->image ? asset($productItem->image) : '/default-image.jpg' }}"
                                                    src="{{ $productItem->image ? asset($productItem->image) : '/default-image.jpg' }}"
                                                    alt="{{ $productItem->name }}"
                                                    sizes="206px">
                                            </picture>
                                        </div>
                                        <!-- Hình ảnh hover (nếu có) -->
                                        <div class="image-second-holder d-flex justify-content-center align-items-center">
                                            <picture>
                                                <source media="(max-width: 480px)"
                                                    data-srcset="{{ $productItem->image ? asset($productItem->image) : '/default-image.jpg' }}"
                                                    srcset="{{ $productItem->image ? asset($productItem->image) : '/default-image.jpg' }}">
                                                <source media="(min-width: 481px) and (max-width: 767px)"
                                                    data-srcset="{{ $productItem->image ? asset($productItem->image) : '/default-image.jpg' }}"
                                                    srcset="{{ $productItem->image ? asset($productItem->image) : '/default-image.jpg' }}">
                                                <source media="(min-width: 768px)"
                                                    data-srcset="{{ $productItem->image ? asset($productItem->image) : '/default-image.jpg' }}"
                                                    srcset="{{ $productItem->image ? asset($productItem->image) : '/default-image.jpg' }}">
                                                <img class="image-hover ls-is-cached lazyloaded"
                                                    data-src="{{ $productItem->image ? asset($productItem->image) : '/default-image.jpg' }}"
                                                    src="{{ $productItem->image ? asset($productItem->image) : '/default-image.jpg' }}"
                                                    alt="{{ $productItem->name }}">
                                            </picture>
                                        </div>
                                    </a>
                                </div>
                                <div class="product-detail">
                                    <div class="box-pro-detail">
                                        <!-- Thương hiệu hoặc danh mục (nếu có) -->
                                        @if($productItem->productCatalogues)
                                        <span class="pro-vendor">
                                            <a title="Xem bộ sưu tập: {{ optional($productItem->productCatalogues->first())->name }}"
                                                href="{{ route('product.category', ['id' => optional($productItem->productCatalogues->first())->id]) }}">
                                                {{ optional($productItem->productCatalogues->first())->name }}
                                            </a>
                                        </span>
                                        @endif
                                        <h3 class="pro-name">
                                            <a href="{{ route('product.detail', $productItem->slug) }}"
                                                title="{{ $productItem->name }}"
                                                class="link">
                                                {{ $productItem->name }}
                                            </a>
                                        </h3>
                                        <div class="box-pro-prices">
                                            <p class="block-pro-price highlight">
                                                <span class="pro-price">
                                                    {{ number_format($productItem->del ?? $productItem->price, 0, ',', '.') }}₫
                                                </span>
                                                @if($productItem->del && $productItem->price > $productItem->del)
                                                <span class="pro-price-del">
                                                    <del class="compare-price">
                                                        {{ number_format($productItem->price, 0, ',', '.') }}₫
                                                    </del>
                                                </span>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                 

                </div>
            </div>
        </div>
    </div>
</div>
@endif