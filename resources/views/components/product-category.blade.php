<!-- Section Bộ sưu tập cho mobile -->
<section id="section-collection-home" class="section section1 section-collection">
    <div class="container-fluid-mb pro-mb">
        <div class="wrapper-heading-home text-center">
            <h2>
                <a class="titleH-second link" href="collections/bo-am-chen-uong-tra.html">
                    TOP BỘ ẤM CHÉN UỐNG TRÀ
                </a>
            </h2>
            <p>
                <a class="titleH-second link" href="collections/bo-am-chen-uong-tra.html">
                    Xem tất cả >>
                </a>
            </p>
        </div>
        <div class="wrapper-collection-1">


            <div id="content-product-list-0"
                class="pro-mb content-product-list-0 content-product-list content-product-list_vertical">
                @if ( !empty($products))

                @foreach ($products as $key => $productN)
                @php
                // Mảng để theo dõi các màu đã hiển thị (nếu cần)
                $shownColors = [];

                // Tính phần trăm khuyến mãi nếu có
                $promotion = $productN->del != 0 && $productN->del != null
                ? (($productN->price - $productN->del) / $productN->price) * 100
                : 0;

                // Format giá hiển thị, dùng giá khuyến mãi nếu có
                $price = $productN->del != 0 && $productN->del != null
                ? number_format($productN->del, 0, ',', '.')
                : number_format($productN->price, 0, ',', '.');

                // Lấy phiên bản đầu tiên của sản phẩm làm mặc định, giả sử chứa thông tin hình ảnh
                $variantFirst = $productN->productVariant->first();

                // Giả sử biến $attribute được gán bằng variant đầu tiên, chứa thuộc tính image
                $attribute = $variantFirst;
                @endphp
                <div class="product-loop-slide">




                    <div class="product-inner product-resize">
                        <div class="product-image d-flex justify-content-center align-items-center image-resize">

                            <div class="product-label">
                                <span class="onsale">
                                    <span class="sale-bg"></span>
                                    <span class="sale-text">-8%</span>
                                    <div class="corner-fold"></div> <!-- Miếng gấp sẽ được tạo ở đây -->
                                </span>
                            </div>









                            <a href="products/bo-bat-dia-an-chau-a-co-ban-22-mon-cho-6-nguoi-su-trang-hampshire-platinum-4336l-d022ab.html"
                                title="Bộ bát đĩa ăn châu Á cơ bản 22 món (cho 6 người) sứ trắng | Hampshire Platinum 4336L - D022AB"
                                class="aspect-ratio">
                                <div class="image-first-holder d-flex justify-content-center align-items-center">
                                    <picture>
                                        <!-- Sử dụng các biến `image_medium` và `image_large` -->
                                        <source media="(max-width: 480px)"
                                            srcset="../product.hstatic.net/200000296482/product/a_22_8e427bbf822b4242929bf8a20f66e63a_medium.html">
                                        <source media="(min-width: 481px) and (max-width: 767px)"
                                            srcset="../product.hstatic.net/200000296482/product/a_22_8e427bbf822b4242929bf8a20f66e63a_large.jpg">
                                        <source media="(min-width: 768px)"
                                            srcset="../product.hstatic.net/200000296482/product/a_22_8e427bbf822b4242929bf8a20f66e63a_large.jpg">

                                        <!-- Hình ảnh với `lazyload` -->
                                        <img class="image-loop"
                                            src="../product.hstatic.net/200000296482/product/a_22_8e427bbf822b4242929bf8a20f66e63a_large.jpg"
                                            alt="Bộ b&#225;t đĩa ăn ch&#226;u &#193; cơ bản 22 m&#243;n (cho 6 người) sứ trắng | Hampshire Platinum 4336L - D022AB">
                                    </picture>
                                </div>
                            </a>
                        </div>
                        <div class="product-detail">
                            <div class="box-pro-detail">
                                <span class="pro-vendor"><a title="Xem bộ sưu tập: Hampshire Platinum 4336L"
                                        href="collections/hampshire-platinum-4336l.html">Hampshire Platinum 4336L</a></span>
                                <h3 class="pro-name">
                                    <a href="products/bo-bat-dia-an-chau-a-co-ban-22-mon-cho-6-nguoi-su-trang-hampshire-platinum-4336l-d022ab.html"
                                        title="Bộ bát đĩa ăn châu Á cơ bản 22 món (cho 6 người) sứ trắng | Hampshire Platinum 4336L - D022AB"
                                        class="link">
                                        Bộ bát đĩa ăn châu Á cơ bản 22 món (cho 6 người) sứ trắng | Hampshire Platinum 4336L - D022AB
                                    </a>
                                </h3>
                                <div class="box-pro-prices">
                                    <p class="block-pro-price highlight">
                                        <span class="pro-price">9,333,400₫</span>
                                        <span class="pro-price-del">
                                            <del class="compare-price">
                                                10,145,000₫
                                            </del>
                                        </span>
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
                <a class="titleH-second link" href="collections/bo-am-chen-uong-tra.html">
                    TOP BỘ ẤM CHÉN UỐNG TRÀ
                </a>
            </h2>
            <p>
                <a class="titleH-second link" href="collections/bo-am-chen-uong-tra.html">
                    Xem tất cả >>
                </a>
            </p>
        </div>
        <div class="wrapper-collection-1">


            <div id="content-product-list-1"
                class="content-product-list-2 owl-carousel content-product-list content-product-list_vertical"
                style="display: none;">







                @if ( !empty($products))

                @foreach ($products as $key => $productN)
                @php
                // Mảng để theo dõi các màu đã hiển thị (nếu cần)
                $shownColors = [];

                // Tính phần trăm khuyến mãi nếu có
                $promotion = $productN->del != 0 && $productN->del != null
                ? (($productN->price - $productN->del) / $productN->price) * 100
                : 0;

                // Format giá hiển thị, dùng giá khuyến mãi nếu có
                $price = $productN->del != 0 && $productN->del != null
                ? number_format($productN->del, 0, ',', '.')
                : number_format($productN->price, 0, ',', '.');

                // Lấy phiên bản đầu tiên của sản phẩm làm mặc định, giả sử chứa thông tin hình ảnh
                $variantFirst = $productN->productVariant->first();

                // Giả sử biến $attribute được gán bằng variant đầu tiên, chứa thuộc tính image
                $attribute = $variantFirst;
                @endphp
                <div class="product-loop-slide">
                    <div class="product-inner product-resize">
                        <div class="product-image d-flex justify-content-center align-items-center image-resize">
                            <div class="product-label">
                                <span class="onsale">
                                    <span class="sale-bg"></span>
                                    <span class="sale-text">-{{ round($promotion, 0) . '%' }}</span>
                                    <div class="corner-fold"></div> <!-- Miếng gấp (corner fold) -->
                                </span>
                            </div>
                            <a href="{{ route('product.detail', ['slug' => $productN->slug]) }}"
                                title="{{ $productN->name }}"
                                class="aspect-ratio">
                                <div class="image-first-holder d-flex justify-content-center align-items-center">
                                    <picture>
                                        <!-- Responsive image sources, sử dụng ảnh từ biến $attribute -->
                                        <source media="(max-width: 480px)" srcset="{{ $productN->image }}">
                                        <source media="(min-width: 481px) and (max-width: 767px)" srcset="{{ $productN->image }}">
                                        <source media="(min-width: 768px)" srcset="{{ $productN->image }}">
                                        <img class="image-loop" src="{{ $productN->image }}" alt="{{ $productN->name }}">
                                    </picture>
                                </div>
                            </a>
                        </div>
                        <div class="product-detail">
                            <div class="box-pro-detail">
                                <span class="pro-vendor">
                                    <a title="Xem bộ sưu tập: {{  $productN->productCatalogues[0]->name}}"
                                        href="{{ route('product.category', ['id' => $productN->brands->id]) }}">
                                        {{ $productN->brands->name}}
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
                                        <span class="pro-price">{{ $price }}</span>
                                        @if ($productN->del != 0 && $productN->del != null)
                                        <span class="pro-price-del">
                                            <del class="compare-price">
                                                {{ number_format($productN->price, 0, ',', '.') }}
                                            </del>
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