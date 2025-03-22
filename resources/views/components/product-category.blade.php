<!-- Section Bộ sưu tập cho mobile -->
<section id="section-collection-home" class="section section1 section-collection">
    <div class="container-fluid-mb pro-mb">
        <div class="wrapper-heading-home text-center">
            <h2>
                <a class="titleH-second link" href="{{ $link }}">
                    {{ $title }}
                </a>
            </h2>
            <p>
                <a class="titleH-second link" href="{{ $link }}">
                    Xem tất cả >>
                </a>
            </p>
        </div>
        <div class="wrapper-collection-1">
            <div id="content-product-list-0" class="pro-mb content-product-list-0 content-product-list content-product-list_vertical">
                @if (!empty($products))
                    @foreach ($products as $key => $productN)
                        @php
                            // Tính phần trăm khuyến mãi nếu có
                            $promotion = ($productN->del != 0 && $productN->del != null)
                                ? (($productN->price - $productN->del) / $productN->price) * 100
                                : 0;

                            // Format giá hiển thị
                            $price = ($productN->del != 0 && $productN->del != null)
                                ? number_format($productN->del, 0, ',', '.')
                                : number_format($productN->price, 0, ',', '.');
                        @endphp
                        <div class="product-loop-slide">
                            <div class="product-inner product-resize">
                                <div class="product-image d-flex justify-content-center align-items-center image-resize">
                                    @if ($promotion > 0)
                                        <div class="product-label">
                                            <span class="onsale">
                                                <span class="sale-bg"></span>
                                                <span class="sale-text">-{{ round($promotion, 0) }}%</span>
                                                <div class="corner-fold"></div>
                                            </span>
                                        </div>
                                    @endif
                                    <a href="{{ route('product.detail', ['slug' => $productN->slug]) }}"
                                       title="{{ $productN->name }}"
                                       class="aspect-ratio">
                                        <div class="image-first-holder d-flex justify-content-center align-items-center">
                                            <picture>
                                                <source media="(max-width: 480px)" srcset="{{ $productN->image }}">
                                                <source media="(min-width: 481px) and (max-width: 767px)" srcset="{{ $productN->image }}">
                                                <source media="(min-width: 768px)" srcset="{{ $productN->image }}">
                                                <img class="image-loop"
                                                     src="{{ $productN->image }}"
                                                     alt="{{ $productN->name }}">
                                            </picture>
                                        </div>
                                    </a>
                                </div>
                                <div class="product-detail">
                                    <div class="box-pro-detail">
                                        <span class="pro-vendor">
                                            <a title="Xem bộ sưu tập: {{ $productN->productCatalogues[0]->name ?? '' }}"
                                               href="{{ route('product.category', ['id' => $productN->brands->id ?? '']) }}">
                                                {{ $productN->brands->name ?? '' }}
                                            </a>
                                        </span>
                                        <h3 class="pro-name">
                                            <a href="{{ route('product.detail', ['slug' => $productN->slug]) }}"
                                               title="{{ $productN->name }}"
                                               class="link">
                                                {{ $productN->name }}
                                            </a>
                                        </h3>
                                        <div class="box-pro-prices">
                                            <p class="block-pro-price highlight">
                                                <span class="pro-price">{{ $price }}₫</span>
                                                @if ($promotion > 0)
                                                    <span class="pro-price-del">
                                                        <del class="compare-price">{{ number_format($productN->price, 0, ',', '.') }}₫</del>
                                                    </span>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>Không có sản phẩm mới.</p>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Section Bộ sưu tập cho desktop -->
<section id="section-collection-home" class="section section1 section-collection">
    <div class="pro-dt">
        <div class="wrapper-heading-home text-center">
            <h2>
                <a class="titleH-second link" href="{{ $link }}">
                    {{ $title }}
                </a>
            </h2>
            <p>
                <a class="titleH-second link" href="{{ $link }}">
                    Xem tất cả >>
                </a>
            </p>
        </div>
        <div class="wrapper-collection-1">
            <div id="content-product-list-1" class="content-product-list-2 owl-carousel content-product-list content-product-list_vertical" style="display: none;">
                @if (!empty($products))
                    @foreach ($products as $key => $productN)
                        @php
                            // Tính phần trăm khuyến mãi nếu có
                            $promotion = ($productN->del != 0 && $productN->del != null)
                                ? (($productN->price - $productN->del) / $productN->price) * 100
                                : 0;

                            // Format giá hiển thị
                            $price = ($productN->del != 0 && $productN->del != null)
                                ? number_format($productN->del, 0, ',', '.')
                                : number_format($productN->price, 0, ',', '.');
                        @endphp
                        <div class="product-loop-slide">
                            <div class="product-inner product-resize">
                                <div class="product-image d-flex justify-content-center align-items-center image-resize">
                                    @if ($promotion > 0)
                                        <div class="product-label">
                                            <span class="onsale">
                                                <span class="sale-bg"></span>
                                                <span class="sale-text">-{{ round($promotion, 0) }}%</span>
                                                <div class="corner-fold"></div>
                                            </span>
                                        </div>
                                    @endif
                                    <a href="{{ route('product.detail', ['slug' => $productN->slug]) }}"
                                       title="{{ $productN->name }}"
                                       class="aspect-ratio">
                                        <div class="image-first-holder d-flex justify-content-center align-items-center">
                                            <picture>
                                                <source media="(max-width: 480px)" srcset="{{ $productN->image }}">
                                                <source media="(min-width: 481px) and (max-width: 767px)" srcset="{{ $productN->image }}">
                                                <source media="(min-width: 768px)" srcset="{{ $productN->image }}">
                                                <img class="image-loop"
                                                     src="{{ $productN->image }}"
                                                     alt="{{ $productN->name }}">
                                            </picture>
                                        </div>
                                    </a>
                                </div>
                                <div class="product-detail">
                                    <div class="box-pro-detail">
                                        <span class="pro-vendor">
                                            <a title="Xem bộ sưu tập: {{ $productN->productCatalogues[0]->name ?? '' }}"
                                               href="{{ route('product.category', ['id' => $productN->brands->id ?? '']) }}">
                                                {{ $productN->brands->name ?? '' }}
                                            </a>
                                        </span>
                                        <h3 class="pro-name">
                                            <a href="{{ route('product.detail', ['slug' => $productN->slug]) }}"
                                               title="{{ $productN->name }}"
                                               class="link">
                                                {{ $productN->name }}
                                            </a>
                                        </h3>
                                        <div class="box-pro-prices">
                                            <p class="block-pro-price highlight">
                                                <span class="pro-price">{{ $price }}₫</span>
                                                @if ($promotion > 0)
                                                    <span class="pro-price-del">
                                                        <del class="compare-price">{{ number_format($productN->price, 0, ',', '.') }}₫</del>
                                                    </span>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>Không có sản phẩm mới.</p>
                @endif
            </div>
        </div>
    </div>
</section>