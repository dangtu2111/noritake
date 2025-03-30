<div class="breadcrumb-content-inner">
    <div class="breadcrumb-shop clearfix">
        <div class="breadcrumb-list">
            <ol class="breadcrumb breadcrumb-arrows" itemscope
                itemtype="http://schema.org/BreadcrumbList">
                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <a href="https://noritake.vn/" target="_self" itemprop="item"><span
                            itemprop="name">Trang chủ</span></a>
                    <meta itemprop="position" content="1" />
                </li>

                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <a
                        href="https://noritake.vn/collections/tim-theo-bo-suu-tap-collections-search">
                        <span itemprop="name">Các bộ sưu tập</span>
                    </a>
                    <meta itemprop="position" content="2" />
                </li>


                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <a href="https://noritake.vn/collections/art-stage-collection"
                        target="_self" itemprop="item">
                        <span itemprop="name">{{ optional($product->productCatalogues->first())->name }}</span>
                    </a>
                    <meta itemprop="position" content="3" />
                </li>




                <!--<li class="active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                            <span itemprop="item" content="https://noritake.vn/products/bo-06-bat-com-chen-com-12-2cm-dung-tich-320ml-su-trang-art-stage-4257l-s91481">
                                <strong itemprop="name">Bộ 06 bát cơm (chén cơm) 12,2cm dung tích 320ml sứ trắng | Art Stage 4257L - S91481</strong>
                            </span>
                            <meta itemprop="position" content="3" />
                        </li>-->


            </ol>
        </div>
    </div>
</div>

<div class="product-container-detail stickyProduct-detail">
    <div class="product-content-summary">
        <div class="product-heading mb-3" style="margin-top: 0.5rem">

            <h1>{{ $product->name }} | {{ optional($product->productCatalogues->first())->name }} {{ $product->sku }} </h1>

            <span id="pro_sku"><strong>Mã SP:</strong> {{ $product->sku }}</span>

            <span class="pro-soldold"></span>
        </div>
        <div id="price-preview" class="product-price d-flex align-items-center py-2 mb-1">

            <span class="pro-price">{{ number_format($product->del ?? $product->price , 0, ',', '.') }}
                ₫</span>
        </div>
        <div class="product-available">
            <p class="txt-inventory"><!--<span>Tình trạng:</span>-->
                Còn hàng </p>
        </div>
        <div class="product-variants mb-md-3">

            <form id="add-item-form" action="https://noritake.vn/cart/add" method="post" class="variants clearfix">
                @csrf <!-- Thêm CSRF token cho Laravel -->

                <!-- Select ẩn cho biến thể sản phẩm -->
                <div class="select clearfix d-none">
                    <select id="product-select" name="id" value="{{ $product->id }}" style="display:none;">
                        <option value="{{ $product->id }}">{{ $product->name }} - {{ $product->del }}₫</option>
                        <!-- Có thể thêm các option khác nếu cần -->
                    </select>
                </div>

                <!-- Thuộc tính sản phẩm (nếu có) -->
                @if (isset($attrCatalogues) && is_array($attrCatalogues) && !empty($attrCatalogues) && !in_array(null, $attrCatalogues, true))
                <div class="product-attributes">
                    @foreach ($attrCatalogues as $key => $val)
                    <div class="attribute attribute-{{ strtolower($val->name) }}">
                        <div class="attribute-header d-flex justify-content-between mb-2">
                            <span class="attribute-title fw-medium fs-5">{{ $val->name }}</span>
                            @if ($val->id == 2) <!-- Hiển thị bảng size nếu ID là 2 -->
                            <a href="javascript:void(0)" class="size-chart-link fs-6"
                                data-bs-target="#exampleModalToggle" data-bs-toggle="modal">
                                Bảng size <i class="fa-solid fa-ruler"></i>
                            </a>
                            @endif
                        </div>
                        @if (!is_null($val->attributes) && is_iterable($val->attributes))
                        <div class="attribute-value d-flex flex-wrap gap-3 ps-4 mb-3">
                            @foreach ($val->attributes as $keyAttr => $attribute)
                            <a href="#"
                                class="choose-attribute {{ $keyAttr == 0 ? 'active' : '' }} attribute-item"
                                data-attribute-id="{{ $attribute->id }}"
                                data-attribute-type="{{ strtolower($val->name) }}"
                                title="{{ $attribute->name }}">
                                <div class="attribute-item-content">
                                    @if ($val->id == 1) <!-- Thuộc tính màu sắc (ID = 1) -->
                                    <img src="{{ $attribute->image }}"
                                        alt="{{ $attribute->name }}"
                                        class="me-2 rounded-circle" width="30" height="30">
                                    <span class="d-none d-md-inline-block">{{ $attribute->name }}</span>
                                    @else
                                    <span class="fw-bold text-uppercase">{{ $attribute->name }}</span>
                                    @endif
                                </div>
                            </a>
                            @endforeach
                        </div>
                        @endif
                    </div>
                    @endforeach
                </div>
                @endif

                <!-- Khu vực chọn swatch (nếu cần thêm) -->
                <div class="select-swatch clearfix">
                    <!-- Có thể thêm nội dung swatch nếu cần -->
                </div>

                <!-- Khu vực số lượng và nút thêm vào giỏ -->
                <div class="selector-actions selector-actions_bottom-mb">
                    <div class="quantity-area trai">
                        <input type="button" value="-" onclick="minusQuantity()" class="qty-btn minus">
                        <input type="text" id="quantity" name="quantity" value="1" min="1"
                            class="quantity-selector-input" aria-label="Quantity input">
                        <input type="button" value="+" onclick="plusQuantity()" class="qty-btn plus">
                    </div>
                    <div class="wrap-addcart">
                        <button type="button" id="add-to-cart"
                            class="add-to-cartProduct btn-box btnred add-toCart" name="add">
                            Thêm vào giỏ
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="mb-3">




            <div class="hrvproduct-tabs">
                <ul class="tabs">




                    @if(isset($product->description ))
                    <li class="active">
                        <p>Thông tin cơ bản </p>
                        <div class="tabs-content">
                            {!! $product->description !!}
                        </div>
                    </li>
                    @endif


@php
                                    $infos = json_decode($product->info, true); // Chuyển JSON thành mảng

                                    @endphp
                                    @if (is_array($infos))
                                    @foreach ($infos as $item)

                    <li class="active">
                        <p>Thông tin chi tiết </p>
                        <div class="tabs-content">
                            <table style="margin-top: 5px; height: 193px;">
                                <tbody>
                                    <tr style="height: 31px;">
                                        <td
                                            style="width: 195px; border-top: none; height: 31px;">
                                            <strong>Thương hiệu</strong>
                                        </td>
                                        <td
                                            style="width: 400px; border-top: none; height: 31px;">
                                            <a style="font-weight: 500;"><img
                                                    style="margin-bottom: 7px;"
                                                    src="{{ $product->brands->image }}"
                                                    alt="" height="20" /> &nbsp;&nbsp;<b>{{ $product->brands->name }}</b>
                                        </td>
                                    </tr>
                                    <tr style="height: 18px;">
                                        <td style="width: 195px; height: 18px;"><strong>Bộ sưu
                                                tập</strong></td>
                                        <td style="width: 400px; height: 18px;"><a
                                                title="Xem bộ sưu tập: {{ optional($product->productCatalogues->first())->name }}"
                                                href="{{ route('product.category', ['id' => optional($product->productCatalogues->first())->id]) }}">
                                                <span
                                                    style="color: #d29f13; font-weight: 500;">{{ optional($product->productCatalogues->first())->name }}</span></a></td>
                                    </tr>
                                    
                                    <tr>
                                        <td style="width: 187.066px;"><strong>{{ $item['key_info'] }}</strong></td>
                                        <td style="width: 378.976px;">{{ $item['info_ms'] }}</td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                    </li>
                    @endforeach

                                    @endif
                    @if(isset($product->children))
                    @foreach($product->children as $itemChildren)
                    <li class="active">
                        <p>Bộ sản phẩm bao gồm </p>
                        <div class="tabs-content">
                            <div class="row product-include-trai respon4"
                                style="margin: 0;">

                                <div class="col-6 col-sm-6 col-md-4"><a
                                        href="{{ route('product.detail',['slug'=>$itemChildren->slug]) }}">
                                        <img src="{{ $itemChildren->image?? 'https://file.hstatic.net/200000296482/file/dia_sau_long_21_4cm_dung_tich_300ml__3cfc42fa196f43289d268644aae2858e.jpg'}}"
                                            alt="Đĩa s&acirc;u l&ograve;ng 21,4cm" />
                                        <span style="font-size: 10pt;"> <strong>{{ $itemChildren->sku}}</strong> </span> </a> <br /><span
                                        style="font-size: 10pt;"> <a
                                            href="{{ route('product.detail',['slug'=>$itemChildren->slug]) }}">{{ $itemChildren->name}}<span
                                                style="color: #d29f13;"> </span> </a>
                                    </span></div>

                            </div>
                        </div>
                    </li>
                    @endforeach
                    @endif


                </ul>
            </div>

            <style>
                .hrvproduct-tabs {
                    position: relative;
                }

                .hrvproduct-tabs .tabs>li {
                    margin: 8px 0;
                    height: 40px;
                    overflow: hidden;
                }

                .hrvproduct-tabs .tabs>li.active {
                    height: auto;
                }

                .hrvproduct-tabs .tabs>li>a {
                    width: 100%;
                    display: block;
                    color: #000000;
                    padding: 0 10px;
                    height: 40px;
                    line-height: 40px;
                    transition: border-color 0.3s;
                    text-transform: uppercase;
                    font-weight: 500;
                    position: relative;
                    margin-bottom: 10px;
                }

                .hrvproduct-tabs .tabs>li>p {
                    font-size: 16px;
                    width: 100%;
                    display: block;
                    color: #000000;
                    height: 40px;
                    line-height: 40px;
                    transition: border-color 0.3s;
                    text-transform: uppercase;
                    font-weight: 500;
                    position: relative;
                    margin-bottom: -1px;
                    border-bottom: 1px solid #d29f13;
                }

                .hrvproduct-tabs .tabs>li>a>span {
                    height: 100%;
                    display: inline-block;
                    position: absolute;
                    right: 0;
                    top: 0;
                    width: 30px;
                    text-align: center;
                    font-size: 20px;
                }

                .hrvproduct-tabs .tabs>li.active>a {
                    border-bottom: 1px solid #d29f13;
                }

                .hrvproduct-tabs .tabs>li.active>a>span {
                    color: #d29f13;
                }

                .hrvproduct-tabs .tabs-content {
                    overflow: hidden;
                    padding: 10px 0;
                    background: #fff;
                }

                .tabs-content table {
                    border: 1px solid #ccc;
                }

                .row.product-include-trai .col-6 {
                    padding: 10px 5px 15px;
                    text-align: center;
                    /* border-bottom: 1px solid #e7e7e7;*/
                }

                @media (min-width: 768px) {

                    .row.product-include-trai .col-md-4:nth-child(3n+1):last-child,
                    .row.product-include-trai .col-md-4:nth-child(3n+2):last-child {
                        border-bottom: none;
                    }
                }

                @media (max-width: 767px) {
                    .row.product-include-trai .col-6:nth-child(2n+1):last-child {
                        border-bottom: none;
                    }
                }

                .row.container-bts {
                    display: flex;
                    align-items: stretch;
                    margin: 0;
                    border: 0px solid #e7e7e7;
                    cursor: pointer;
                    transition: transform .4s;
                }

                .row.container-bts:hover {
                    transform: scale(1.05);
                }

                .row.container-bts .col-5 {
                    flex: 5;
                    padding-left: 0;
                    padding-right: 10px;
                }

                .row.container-bts .col-5 img {
                    height: 100%;
                    object-fit: cover;
                }

                .row.container-bts .col-7 {
                    flex: 7;
                    padding-left: 0px;
                    padding-right: 0;
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                }

                .row.container-bts .col-7 .title-bts {
                    margin-bottom: 10px;
                    font-weight: 500;
                    white-space: initial;
                    overflow: hidden;
                    -webkit-line-clamp: 2;
                    -webkit-box-orient: vertical;
                    display: -webkit-box;
                    color: #d29f13;
                }

                .row.container-bts .col-7 .title-bts a {
                    color: #d29f13;
                }

                .row.container-bts .col-7 .description-bts {
                    margin: 0;
                    white-space: initial;
                    overflow: hidden;
                    -webkit-line-clamp: 2;
                    -webkit-box-orient: vertical;
                    display: -webkit-box;
                }
            </style>

            <script>
                var blocks = $('.hrvproduct-tabs .tabs li');
                var blockLinks = $('.hrvproduct-tabs .tabs li > a');
                var blockToggles = $('.hrvproduct-tabs .tabs li a > span');
                var blockContents = $('.hrvproduct-tabs .tabs-content');

                blockLinks.click(function(e) {
                    e.preventDefault();

                    var self = this;
                    var targetBlock = $(this).parent('li');
                    var blockHeight = targetBlock[0].scrollHeight;

                    if (targetBlock.hasClass('active')) {
                        blocks.removeClass('active');
                        blockToggles.text('+');
                        targetBlock.removeClass('active');
                        $(self).find('span').text('+');
                        targetBlock.animate({
                            height: 40
                        }, 300);
                    } else {
                        blocks.removeClass('active');
                        blockToggles.text('+');
                        blocks.animate({
                            height: 40
                        }, 200);
                        targetBlock.addClass('active');
                        $(self).find('span').text('-');
                        targetBlock.animate({
                            height: blockHeight
                        }, 200);
                    }
                });


                $(document).ready(function() {
                    function updateBorders() {
                        $('.row.product-include-trai').each(function() {
                            let items = $(this).find('.col-6');
                            let totalItems = items.length;

                            let windowWidth = $(window).width();
                            let itemsPerRow;

                            // Kiểm tra số cột dựa trên class của item
                            if (windowWidth >= 768) {
                                // Trên desktop: kiểm tra class để xác định số cột
                                itemsPerRow = items.first().hasClass('col-md-6') ? 2 : 3; // Nếu class là "col-md-6", thì là 2 cột, nếu là "col-md-4", thì là 3 cột
                            } else {
                                // Trên mobile, luôn là 2 cột
                                itemsPerRow = 2;
                            }

                            // Reset tất cả các đường gạch ngang
                            items.css('border-bottom', 'none');

                            // Thêm gạch ngang cho tất cả các hàng đủ cột, trừ hàng cuối cùng
                            for (let i = 0; i < totalItems; i += itemsPerRow) {
                                if (i + itemsPerRow < totalItems) {
                                    // Thêm border cho các hàng không phải là hàng cuối
                                    items.slice(i, i + itemsPerRow).css('border-bottom', '1px solid #e7e7e7');
                                }
                            }

                            // Loại bỏ border ở toàn bộ hàng cuối cùng
                            let remainder = totalItems % itemsPerRow;
                            if (remainder !== 0) {
                                // Loại bỏ border cho các item trong hàng cuối cùng không đủ số cột
                                items.slice(-remainder).css('border-bottom', 'none');
                            } else {
                                // Loại bỏ border cho toàn bộ hàng cuối nếu có đủ số item
                                items.slice(-itemsPerRow).css('border-bottom', 'none');
                            }

                            // Trường hợp có ít hơn hoặc bằng itemsPerRow item (chỉ có một hàng)
                            if (totalItems <= itemsPerRow) {
                                items.css('border-bottom', 'none');
                            }
                        });
                    }

                    // Gọi hàm cập nhật khi trang tải
                    updateBorders();

                    // Gọi hàm cập nhật khi thay đổi kích thước cửa sổ
                    $(window).resize(function() {
                        updateBorders();
                    });
                });
            </script>


        </div>
    </div>
</div>
</div>