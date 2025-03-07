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

                        <div class="product-container-gallery blog-aside-sticky">



                            <div class="wrapbox-image">
                                <div class="product-gallery one text-center">

                                    <img id="zo-"
                                        data-zoom-image="{{ $product->image }}"
                                        style="border: 1px dashed #ddd;" class="zoom_01 product-image-feature"
                                        src="{{ $product->image }}"
                                        alt=" {{ $product->name }}" width="100%">
                                </div>
                            </div>


                        </div>

                        <div class="product-container-gallery-trai">
                            <div class="overlay" style="display: none;"></div>
                            <input type="hidden" id="idproduct" value="{{ $product->id }}" name="idproduct"/>
                            <ul class="productList-slider-trai" id="productSlick-slider-trai">

                                <li data-thumb="{{ $product->image }}"
                                    data-src="{{ $product->image }}">
                                    <picture>
                                        <source media="(max-width: 480px)"
                                            srcset="{{ $product->image }}">
                                        <source media="(min-width: 481px)"
                                            srcset="{{ $product->image }}">
                                        <img class="trai" id="zo-1"
                                            data-zoom-image="{{ $product->image }}"
                                            src="{{ $product->image }}"
                                            alt=" {{ $product->name }}">
                                    </picture>
                                </li>

                            </ul>
                        </div>

                    </div>
                    <div class="col-12 col-lg-5 product-content-summary" id="detail-product">

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
                                                <span itemprop="name">Art Stage Collection</span>
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
                                    <!--<span class="pro-vendor">
                                        <a title="Xem bộ sưu tập: Art Stage Collection" href="/collections/art-stage-collection">Art Stage Collection</a>
                                    </span>-->
                                    <h1>{{ $product->name }}</h1>

                                    <span id="pro_sku"><strong>Mã SP:</strong> {{ $product->sku }}</span>

                                    <span class="pro-soldold"></span>
                                </div>
                                <div id="price-preview" class="product-price d-flex align-items-center py-2 mb-1">

                                    <span class="pro-price">{{ $product->price }}₫</span>
                                </div>
                                <div class="product-available">
                                    <p class="txt-inventory"><!--<span>Tình trạng:</span>-->
                                        Còn hàng </p>
                                </div>
                                <div class="product-variants mb-md-3">


                                    <form id="add-item-form" action="https://noritake.vn/cart/add" method="post"
                                        class="variants clearfix">
                                        @if (is_array($attrCatalogues) && !empty($attrCatalogues) && !in_array(null, $attrCatalogues, true))
                                            <div class="product-attributes">
                                                @foreach ($attrCatalogues as $key => $val)
                                                    <div class="attribute attribute-{{ strtolower($val->name) }}">
                                                        <div class="attribute-header d-flex justify-content-between mb-2">
                                                            <span class="attribute-title fw-medium fs-5">{{ $val->name }}</span>
                                                            
                                                            @if ($val->id == 2) <!-- Hiển thị bảng size nếu ID là 2 -->
                                                                <a href="javascript:void(0)"
                                                                class="size-chart-link fs-6"
                                                                data-bs-target="#exampleModalToggle" 
                                                                data-bs-toggle="modal">
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

                                        
                                        <div class="select-swatch clearfix">

                                        </div>
                                        <div class="selector-actions selector-actions_bottom-mb">
                                            <div class="quantity-area trai">
                                                <input type="button" value="-" onclick="minusQuantity()"
                                                    class="qty-btn minus">
                                                <input type="text" id="quantity" name="quantity" value="1" min="1"
                                                    class="quantity-selector-input" aria-label="Quantity input">
                                                <input type="button" value="+" onclick="plusQuantity()"
                                                    class="qty-btn plus">
                                            </div>
                                            <div class="wrap-addcart">
                                                <button type="button" id="add-to-cart"
                                                    class=" add-to-cartProduct btn-box btnred add-toCart" name="add">
                                                    Thêm vào giỏ </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!--<div class="product-available mb-3">
                                    <p class="txt-inventory">
    Đã bán gần hết								</p>
                                </div>-->
                                <div class="mb-3">




                                    <div class="hrvproduct-tabs">
                                        <ul class="tabs">





                                            <li class="active">
                                                <p>Thông tin cơ bản </p>
                                                <div class="tabs-content">
                                                    {!! $product->description !!}
                                                </div>
                                            </li>




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
                                                                        title="Xem bộ sưu tập:  Art Stage Collection"
                                                                        href="https://noritake.vn/collections/art-stage-collection">
                                                                        <span
                                                                            style="color: #d29f13; font-weight: 500;">Art
                                                                            Stage Collection</span></a></td>
                                                            </tr>
                                                            <tr style="height: 18px;">
                                                                <td style="width: 195px; height: 18px;"><strong>Đặc
                                                                        điểm</strong></td>
                                                                <td style="width: 400px; height: 18px;">M&agrave;u trắng
                                                                    kh&ocirc;ng họa tiết</td>
                                                            </tr>
                                                            <tr style="height: 18px;">
                                                                <td style="width: 195px; height: 18px;"><strong>Chất
                                                                        liệu</strong></td>
                                                                <td style="width: 400px; height: 18px;">Sứ trắng</td>
                                                            </tr>
                                                            <tr style="height: 18px;">
                                                                <td style="width: 195px; height: 18px;"><strong>Phong
                                                                        c&aacute;ch thiết kế</strong></td>
                                                                <td style="width: 400px; height: 18px;">Art Stage Style
                                                                </td>
                                                            </tr>
                                                            <tr style="height: 18px;">
                                                                <td style="width: 195px; height: 18px;">
                                                                    <strong>K&iacute;ch thước mỗi sản
                                                                        phẩm</strong><strong><br /></strong>
                                                                </td>
                                                                <td style="width: 400px; height: 18px;">Đường
                                                                    k&iacute;nh 122mm | Cao 56mm</td>
                                                            </tr>
                                                            <tr style="height: 18px;">
                                                                <td style="width: 195px; height: 18px;"><strong>Dung
                                                                        t&iacute;ch mỗi sản phẩm</strong></td>
                                                                <td style="width: 400px; height: 18px;">320ml</td>
                                                            </tr>
                                                            <tr style="height: 18px;">
                                                                <td style="width: 195px; height: 18px;"><strong>Trọng
                                                                        lượng mỗi sản phẩm</strong></td>
                                                                <td style="width: 400px; height: 18px;">Đang cập nhật
                                                                </td>
                                                            </tr>
                                                            <tr style="height: 18px;">
                                                                <td style="width: 195px; height: 18px;"><strong>Lưu
                                                                        &yacute; khi sử dụng</strong></td>
                                                                <td style="width: 400px; height: 18px;">Sử dụng được
                                                                    trong l&ograve; vi s&oacute;ng v&agrave; m&aacute;y
                                                                    rửa ch&eacute;n</td>
                                                            </tr>
                                                            <tr style="height: 18px;">
                                                                <td style="width: 195px; height: 18px;"><strong>Nơi sản
                                                                        xuất</strong></td>
                                                                <td style="width: 400px; height: 18px;">Nh&agrave;
                                                                    m&aacute;y Noritake tại Sri Lanka</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </li>

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


                                        /*$(document).ready(function() {
                                            function updateBorders() {
                                                $('.row.product-include-trai').each(function() {
                                                    let items = $(this).find('.col-6');
                                                    let totalItems = items.length;

                                                    // Kiểm tra xem class "two" có tồn tại hay không
                                                    let hasTwoColumns = $(this).hasClass('two');
                                                    let windowWidth = $(window).width();

                                                    // Nếu có class "two", thì sẽ là 2 cột, nếu không thì sẽ là 3 cột
                                                    let itemsPerRow = hasTwoColumns ? 2 : (windowWidth >= 768 ? 3 : 2); // 3 cột trên desktop, 2 cột trên mobile

                                                    // Reset tất cả các đường gạch ngang
                                                    items.css('border-bottom', 'none');

                                                    // Thêm gạch ngang cho tất cả các hàng đủ cột, trừ hàng cuối cùng
                                                    for (let i = 0; i < totalItems; i += itemsPerRow) {
                                                        if (i + itemsPerRow < totalItems) {
                                                            // Thêm border cho các hàng không phải là hàng cuối
                                                            items.slice(i, i + itemsPerRow).css('border-bottom', '1px solid #e7e7e7');
                                                        }
                                                    }
                                                });
                                            }

                                            // Gọi hàm cập nhật khi trang tải
                                            updateBorders();

                                            // Gọi hàm cập nhật khi thay đổi kích thước cửa sổ
                                            $(window).resize(function() {
                                                updateBorders();
                                            });
                                        });*/


                                        /*$(document).ready(function() {
                                            function updateBorders() {
                                                $('.row.product-include-trai').each(function() {
                                                    let items = $(this).find('.col-6');
                                                    let totalItems = items.length;

                                                    let isDesktop = $(window).width() >= 768;
                                                    let itemsPerRow = isDesktop ? 3 : 2;

                                                    // Reset tất cả các đường gạch ngang
                                                    items.css('border-bottom', 'none');

                                                    // Thêm gạch ngang cho tất cả các hàng đủ cột, trừ hàng cuối cùng
                                                    for (let i = 0; i < totalItems; i += itemsPerRow) {
                                                        if (i + itemsPerRow <= totalItems) {
                                                            // Kiểm tra nếu đây không phải là hàng cuối cùng
                                                            if (i + itemsPerRow < totalItems) {
                                                                items.slice(i, i + itemsPerRow).css('border-bottom', '1px solid #e7e7e7');
                                                            }
                                                        }
                                                    }
                                                });
                                            }

                                            // Gọi hàm cập nhật khi trang tải
                                            updateBorders();

                                            // Gọi hàm cập nhật khi thay đổi kích thước cửa sổ
                                            $(window).resize(function() {
                                                updateBorders();
                                            });
                                        });*/
                                    </script>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <p class="d-none"><a id="link-to-contact" href="tel:0934 033 988">0934 033 988</a></p>
        <!-- 
    <div class="product-tabs mt-4 mt-md-5 pb-4">
        <div class="container-fluid">
            <div class="product-description">
                <a class="show-tab-dropdown show-tab-dropdown_mobile" href="javascript:void(0)"></a>
                <ul class="nav nav-tabs tab-alignment justify-content-center" id="productTab" role="tablist">
                    <li class="nav-item tab-item">
                        <a class="nav-link tab-title active" id="product-tab-1" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">Mô tả chi tiết</a>
                    </li>
                </ul>
                <div class="tab-content" id="productTabContent">
                    <div class="tab-pane tab-content-item fade show active" id="tab-1" role="tabpanel" aria-labelledby="product-description-1">
                        <div class="panel-toggle-wrap">
                            <div class="content-outer">
                                <div class="p-2 collection-heading_title border-bottom border-top bg-light">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    -->

        <!-- trai 1 -->

        <div class="productDetail-related clearfix border-top pt-4 tr">
            <div>
                <div class="productRelated-title text-center">
                    <a href="https://noritake.vn/collections/art-stage-collection">
                        <h3>CÙNG BỘ SƯU TẬP</h3>
                    </a>
                </div>
                <div class="noritake-conetent owl-carousel owl-theme" style="margin: 0px; display: flex; overflow-x: auto;">
                    <div class="owl-stage-outer">
                        <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all; width: 5881px;">
                            <div class="owl-item active" style="width: 207.8px; margin-right: 10px;">
                                <div class="product-loop">









                                    <div class="product-inner product-resize">
                                        <div class="product-image d-flex jutify-content-center align-items-center image-resize">

                                            <div class="product-label">
                                                <span class="onsale">
                                                    <span class="sale-bg"></span>
                                                    <span class="sale-text tr">-8%</span>
                                                    <div class="corner-fold"></div> <!-- Miếng gấp sẽ được tạo ở đây -->
                                                </span>
                                            </div>










                                            <a href="/products/bat-canh-to-canh-tron-22-7cm-dung-tich-1-600ml-su-trang-hampshire-gold-4335l-91908" title="Bát canh (tô canh) tròn 22,7cm dung tích 1.600ml sứ trắng | Hampshire Gold 4335L - 91908" class="aspect-ratio">
                                                <div class="image-first-holder d-flex justify-content-center align-items-center lazyloaded" data-expand="-1">
                                                    <picture>
                                                        <source media="(max-width: 480px)" data-srcset="//product.hstatic.net/200000296482/product/bat_canh__to_canh__tron_22_7cm_hampshire_gold_4335l-91908_a996cc2c62194e75bdf013338f90e742_medium.jpg" srcset="//product.hstatic.net/200000296482/product/bat_canh__to_canh__tron_22_7cm_hampshire_gold_4335l-91908_a996cc2c62194e75bdf013338f90e742_medium.jpg" sizes="206px">
                                                        <source media="(min-width: 481px) and (max-width: 767px)" data-srcset="//product.hstatic.net/200000296482/product/bat_canh__to_canh__tron_22_7cm_hampshire_gold_4335l-91908_a996cc2c62194e75bdf013338f90e742_large.jpg" srcset="//product.hstatic.net/200000296482/product/bat_canh__to_canh__tron_22_7cm_hampshire_gold_4335l-91908_a996cc2c62194e75bdf013338f90e742_large.jpg" sizes="206px">
                                                        <source media="(min-width: 768px)" data-srcset="//product.hstatic.net/200000296482/product/bat_canh__to_canh__tron_22_7cm_hampshire_gold_4335l-91908_a996cc2c62194e75bdf013338f90e742_large.jpg" srcset="//product.hstatic.net/200000296482/product/bat_canh__to_canh__tron_22_7cm_hampshire_gold_4335l-91908_a996cc2c62194e75bdf013338f90e742_large.jpg" sizes="206px">
                                                        <img class="image-loop lazyautosizes ls-is-cached lazyloaded" data-sizes="auto" data-src="//product.hstatic.net/200000296482/product/bat_canh__to_canh__tron_22_7cm_hampshire_gold_4335l-91908_a996cc2c62194e75bdf013338f90e742_large.jpg" data-lowsrc="//product.hstatic.net/200000296482/product/bat_canh__to_canh__tron_22_7cm_hampshire_gold_4335l-91908_a996cc2c62194e75bdf013338f90e742_large.jpg" src="//product.hstatic.net/200000296482/product/bat_canh__to_canh__tron_22_7cm_hampshire_gold_4335l-91908_a996cc2c62194e75bdf013338f90e742_large.jpg" alt=" Bát canh (tô canh) tròn 22,7cm dung tích 1.600ml sứ trắng | Hampshire Gold 4335L - 91908 " sizes="206px">
                                                    </picture>
                                                </div>
                                                <div class="image-second-holder d-flex justify-content-center align-items-center">
                                                    <picture>
                                                        <source media="(max-width: 480px)" data-srcset="//product.hstatic.net/200000296482/product/bat_canh__to_canh__tron_22_7cm_hampshire_gold_4335l-91908_a996cc2c62194e75bdf013338f90e742_medium.jpg" srcset="//product.hstatic.net/200000296482/product/bat_canh__to_canh__tron_22_7cm_hampshire_gold_4335l-91908_a996cc2c62194e75bdf013338f90e742_medium.jpg">
                                                        <source media="(min-width: 481px) and (max-width: 767px)" data-srcset="//product.hstatic.net/200000296482/product/bat_canh__to_canh__tron_22_7cm_hampshire_gold_4335l-91908_a996cc2c62194e75bdf013338f90e742_large.jpg" srcset="//product.hstatic.net/200000296482/product/bat_canh__to_canh__tron_22_7cm_hampshire_gold_4335l-91908_a996cc2c62194e75bdf013338f90e742_large.jpg">
                                                        <source media="(min-width: 768px)" data-srcset="//product.hstatic.net/200000296482/product/bat_canh__to_canh__tron_22_7cm_hampshire_gold_4335l-91908_a996cc2c62194e75bdf013338f90e742_large.jpg" srcset="//product.hstatic.net/200000296482/product/bat_canh__to_canh__tron_22_7cm_hampshire_gold_4335l-91908_a996cc2c62194e75bdf013338f90e742_large.jpg">
                                                        <img class="image-hover ls-is-cached lazyloaded" data-src="//product.hstatic.net/200000296482/product/bat_canh__to_canh__tron_22_7cm_hampshire_gold_4335l-91908_a996cc2c62194e75bdf013338f90e742_large.jpg" src="//product.hstatic.net/200000296482/product/bat_canh__to_canh__tron_22_7cm_hampshire_gold_4335l-91908_a996cc2c62194e75bdf013338f90e742_large.jpg" alt=" Bát canh (tô canh) tròn 22,7cm dung tích 1.600ml sứ trắng | Hampshire Gold 4335L - 91908 ">
                                                    </picture>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="product-detail">
                                            <div class="box-pro-detail">
                                                <span class="pro-vendor"><a title="Xem bộ sưu tập: Hampshire Gold 4335L" href="/collections/hampshire-gold-4335l">Hampshire Gold 4335L</a></span>
                                                <h3 class="pro-name">
                                                    <a href="/products/bat-canh-to-canh-tron-22-7cm-dung-tich-1-600ml-su-trang-hampshire-gold-4335l-91908" title="Bát canh (tô canh) tròn 22,7cm dung tích 1.600ml sứ trắng | Hampshire Gold 4335L - 91908" class="link">
                                                        Bát canh (tô canh) tròn 22,7cm dung tích 1.600ml sứ trắng | Hampshire Gold 4335L - 91908
                                                    </a>
                                                </h3>
                                                <div class="box-pro-prices">
                                                    <p class="block-pro-price highlight">
                                                        <span class="pro-price">1,262,240₫</span>
                                                        <span class="pro-price-del">
                                                            <del class="compare-price">
                                                                1,372,000₫
                                                            </del>
                                                        </span>
                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="owl-item active" style="width: 207.8px; margin-right: 10px;">
                                <div class="product-loop">









                                    <div class="product-inner product-resize">
                                        <div class="product-image d-flex jutify-content-center align-items-center image-resize">










                                            <div class="sold-out"><span>Liên hệ</span></div>
                                            <a href="/products/binh-hu-duong-co-nap-day-dung-tich-370ml-su-trang-hampshire-gold-4335l-91127" title="Bình (hũ) đường có nắp đậy dung tích 370ml sứ trắng | Hampshire Gold 4335L - 91127" class="aspect-ratio">
                                                <div class="image-first-holder d-flex justify-content-center align-items-center lazyloaded" data-expand="-1">
                                                    <picture>
                                                        <source media="(max-width: 480px)" data-srcset="//product.hstatic.net/200000296482/product/binh__hu__duong_co_nap_day_dung_tich_370ml_363104014cfd43cb9b4908be203bb3e7_medium.jpg" srcset="//product.hstatic.net/200000296482/product/binh__hu__duong_co_nap_day_dung_tich_370ml_363104014cfd43cb9b4908be203bb3e7_medium.jpg" sizes="206px">
                                                        <source media="(min-width: 481px) and (max-width: 767px)" data-srcset="//product.hstatic.net/200000296482/product/binh__hu__duong_co_nap_day_dung_tich_370ml_363104014cfd43cb9b4908be203bb3e7_large.jpg" srcset="//product.hstatic.net/200000296482/product/binh__hu__duong_co_nap_day_dung_tich_370ml_363104014cfd43cb9b4908be203bb3e7_large.jpg" sizes="206px">
                                                        <source media="(min-width: 768px)" data-srcset="//product.hstatic.net/200000296482/product/binh__hu__duong_co_nap_day_dung_tich_370ml_363104014cfd43cb9b4908be203bb3e7_large.jpg" srcset="//product.hstatic.net/200000296482/product/binh__hu__duong_co_nap_day_dung_tich_370ml_363104014cfd43cb9b4908be203bb3e7_large.jpg" sizes="206px">
                                                        <img class="image-loop lazyautosizes lazyloaded" data-sizes="auto" data-src="//product.hstatic.net/200000296482/product/binh__hu__duong_co_nap_day_dung_tich_370ml_363104014cfd43cb9b4908be203bb3e7_large.jpg" data-lowsrc="//product.hstatic.net/200000296482/product/binh__hu__duong_co_nap_day_dung_tich_370ml_363104014cfd43cb9b4908be203bb3e7_large.jpg" src="//product.hstatic.net/200000296482/product/binh__hu__duong_co_nap_day_dung_tich_370ml_363104014cfd43cb9b4908be203bb3e7_large.jpg" alt=" Bình (hũ) đường có nắp đậy dung tích 370ml sứ trắng | Hampshire Gold 4335L - 91127 " sizes="206px">
                                                    </picture>
                                                </div>
                                                <div class="image-second-holder d-flex justify-content-center align-items-center">
                                                    <picture>
                                                        <source media="(max-width: 480px)" data-srcset="//product.hstatic.net/200000296482/product/binh__hu__duong_co_nap_day_dung_tich_370ml_363104014cfd43cb9b4908be203bb3e7_medium.jpg" srcset="//product.hstatic.net/200000296482/product/binh__hu__duong_co_nap_day_dung_tich_370ml_363104014cfd43cb9b4908be203bb3e7_medium.jpg">
                                                        <source media="(min-width: 481px) and (max-width: 767px)" data-srcset="//product.hstatic.net/200000296482/product/binh__hu__duong_co_nap_day_dung_tich_370ml_363104014cfd43cb9b4908be203bb3e7_large.jpg" srcset="//product.hstatic.net/200000296482/product/binh__hu__duong_co_nap_day_dung_tich_370ml_363104014cfd43cb9b4908be203bb3e7_large.jpg">
                                                        <source media="(min-width: 768px)" data-srcset="//product.hstatic.net/200000296482/product/binh__hu__duong_co_nap_day_dung_tich_370ml_363104014cfd43cb9b4908be203bb3e7_large.jpg" srcset="//product.hstatic.net/200000296482/product/binh__hu__duong_co_nap_day_dung_tich_370ml_363104014cfd43cb9b4908be203bb3e7_large.jpg">
                                                        <img class="image-hover ls-is-cached lazyloaded" data-src="//product.hstatic.net/200000296482/product/binh__hu__duong_co_nap_day_dung_tich_370ml_363104014cfd43cb9b4908be203bb3e7_large.jpg" src="//product.hstatic.net/200000296482/product/binh__hu__duong_co_nap_day_dung_tich_370ml_363104014cfd43cb9b4908be203bb3e7_large.jpg" alt=" Bình (hũ) đường có nắp đậy dung tích 370ml sứ trắng | Hampshire Gold 4335L - 91127 ">
                                                    </picture>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="product-detail">
                                            <div class="box-pro-detail">
                                                <span class="pro-vendor"><a title="Xem bộ sưu tập: Hampshire Gold 4335L" href="/collections/hampshire-gold-4335l">Hampshire Gold 4335L</a></span>
                                                <h3 class="pro-name">
                                                    <a href="/products/binh-hu-duong-co-nap-day-dung-tich-370ml-su-trang-hampshire-gold-4335l-91127" title="Bình (hũ) đường có nắp đậy dung tích 370ml sứ trắng | Hampshire Gold 4335L - 91127" class="link">
                                                        Bình (hũ) đường có nắp đậy dung tích 370ml sứ trắng | Hampshire Gold 4335L - 91127
                                                    </a>
                                                </h3>
                                                <div class="box-pro-prices">
                                                    <p class="block-pro-price ">
                                                        <span class="pro-price">801,320₫</span>
                                                        <span class="pro-price-del">
                                                            <del class="compare-price">
                                                                871,000₫
                                                            </del>
                                                        </span>
                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function shuffleArray(array) {
                for (let i = array.length - 1; i > 0; i--) {
                    const j = Math.floor(Math.random() * (i + 1));
                    [array[i], array[j]] = [array[j], array[i]];
                }
            }

            var screenWidth = $(window).width();
            // $(document).ready(function () {
            //     jQuery.ajax({
            //         url: '/collections/art-stage-collection?view=pagepro',
            //         async: false,
            //         success: function (data) {
            //             $(".noritake-conetent").append(data);

            //             // Select the items to be shuffled and displayed
            //             const $itemsToShuffle = $(".noritake-conetent").children();
            //             const shuffledItems = $itemsToShuffle.toArray();
            //             shuffleArray(shuffledItems);

            //             // Clear the content and append shuffled items
            //             $(".noritake-conetent").empty().append(shuffledItems);

            //             $('.noritake-conetent').css('display', 'flex');
            //             $('.noritake-conetent').css('overflow-x', 'auto');
            //             if (screenWidth > 767) {
            //                 if ($(".noritake-conetent").length > 0) {
            //                     $('.noritake-conetent').owlCarousel({
            //                         items: 5,
            //                         nav: true,
            //                         dots: false,
            //                         pagination: false,
            //                         slideSpeed: 1000,
            //                         smartSpeed: 1000,
            //                         addClassActive: true,
            //                         scrollPerPage: false,
            //                         touchDrag: true,
            //                         autoplay: false,
            //                         loop: false,
            //                         responsive: {
            //                             0: {
            //                                 items: 2,
            //                                 stagePadding: 15,
            //                                 margin: 10
            //                             },
            //                             768: {
            //                                 items: 4,
            //                                 margin: 10,
            //                             },
            //                             992: {
            //                                 items: 5,
            //                                 margin: 10
            //                             },
            //                             1200: {
            //                                 items: 5,
            //                                 margin: 10
            //                             }
            //                         }
            //                     });
            //                 }
            //             }
            //         }
            //     });
            // })
        </script>
    </div>

    <script>
        var template_style = "style-03";
        $(document).ready(function() {
            $(document).on('click', '#add-to-cart', function(e) {
                e.preventDefault();
                var quantity = $("#quantity").val();
                add_item_show_modalCart($('#idproduct').val(),$('#idproduct').val(),quantity,$('#product-select').val(),{{ $product->price }});
                /*$('.header-bottom').addClass('pos-relative');*/
                $('html, body').animate({
                    scrollTop: 0
                }, 10);

            });
            $('#quan-input').keyup(function() {
                $('[name="quantity"]').val($(this).val());
            });
            $('[name="quantity"]').on('keyup change', function() {
                $('#quan-input').val($(this).val());
            });
            $(document).on('click', '.add-to-contactProduct', function(e) {
                e.preventDefault();
                window.location.href = $('#link-to-contact').attr('href');
            });
            if (template_style == 'style-01') {
                $('body').scrollspy({
                    target: '#scrollspyProducts'
                });
                $('#scrollspyProducts a[href*="#"]').click(function(e) {
                    e.preventDefault();
                    $('#scrollspyProducts .product-thumb').removeClass('active');
                    $('html, body').animate({
                        scrollTop: $($.attr(this, 'href')).offset().top + 20
                    }, 500);
                });
                if ($(window).width() < 992) {
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
            if (template_style == 'style-02') {
                if ($(window).width() < 992) {
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
            if (template_style == 'style-03') {
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
                if ($(window).width() > 767) {
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

                $("#productSlick-slider").on('setPosition', function() {
                    $(this).find('.slick-slide').height('auto');
                    var slickTrackHeight = $(this).find('.slick-track').height();
                    $(this).find('.slick-slide').css('height', slickTrackHeight + 'px');
                });

                $(document).on('click', '#productSlick-thumb .product-thumb-item', function(e) {
                    e.preventDefault();
                    $('#productSlick-thumb .product-thumb').removeClass('slick-current');
                    $(this).parent().addClass('slick-current');
                });

            }
            /*
            if($(window).width() > 991){
                $('.product-gallery [data-fancybox="gallery"]').fancybox({
                    hash : false,
                    infobar : false,
                });
            }
            else{
                var ttALt = $('.product-gallery [data-fancybox="gallery"]').find('img').attr('alt')
                $('.product-gallery [data-fancybox="gallery"]').removeAttr("data-fancybox").removeAttr("href").attr('title',ttALt );
            }
            */
        });
        $(document).on("click", ".product-sharing", function() {
            $(this).toggleClass('sharing-active');
        });
    </script>

    <script>
        var check_variant = true;
        var fIndex = false;
        var checkScroll = ''
        var selectCallback = function(variant, selector) {
            if (variant) {
                if (variant.inventory_management == null) {
                    jQuery('.product-available').find(".txt-inventory").html('');
                } else {
                    var inventoryQty = variant.inventory_quantity;
                    if (inventoryQty == 0) {
                        jQuery('.product-available').find(".txt-inventory").html('Đã bán hết');
                    } else {
                        if (inventoryQty > 10) {
                            jQuery('.product-available').find(".txt-inventory").html('Còn hàng');
                        } else {
                            jQuery('.product-available').find(".txt-inventory").html('Còn hàng');
                        }
                    }
                }
                if (variant.featured_image != null) {
                    if (template_style == 'style-01') {
                        checkScroll = Haravan.resizeImage(variant.featured_image.src, 'master').replace('https://noritake.vn/products/bo-06-bat-com-chen-com-12-2cm-dung-tich-320ml-su-trang-art-stage-4257l-s91481', '');
                        if ($(window).width() < 992) {
                            var indeximg_mb = $(".sliderOwl-product div.product-gallery[data-image='" + Haravan.resizeImage(variant.featured_image.src, 'master').replace('https://noritake.vn/products/bo-06-bat-com-chen-com-12-2cm-dung-tich-320ml-su-trang-art-stage-4257l-s91481', '') + "']").parent().index();
                            $('.sliderOwl-product').trigger('to.owl.carousel', [indeximg_mb, 500]);
                        }
                    }
                    if (template_style == 'style-02') {
                        if ($(window).width() < 992) {
                            var indeximg_mb = $(".sliderOwl-product div.product-gallery[data-image='" + Haravan.resizeImage(variant.featured_image.src, 'master').replace('https://noritake.vn/products/bo-06-bat-com-chen-com-12-2cm-dung-tich-320ml-su-trang-art-stage-4257l-s91481', '') + "']").parent().index();
                            $('.sliderOwl-product').trigger('to.owl.carousel', [indeximg_mb, 500]);
                        } else {
                            var temp = $(".sliderOwl-product a.product-gallery-item:eq(0) img").attr("src");
                            var tempHref = $(".sliderOwl-product a.product-gallery-item:eq(0)").attr("href");
                            var imgVariant = Haravan.resizeImage(variant.featured_image.src, 'grande').replace('https://noritake.vn/products/bo-06-bat-com-chen-com-12-2cm-dung-tich-320ml-su-trang-art-stage-4257l-s91481', '');
                            var indexVariant = $(".product-gallery-item img[src='" + Haravan.resizeImage(variant.featured_image.src, 'grande').replace('https://noritake.vn/products/bo-06-bat-com-chen-com-12-2cm-dung-tich-320ml-su-trang-art-stage-4257l-s91481', '') + "']").parents('.product-gallery').index();
                            $("a.product-gallery-item:eq(0) img").attr("src", imgVariant); //Thế vị trí hình đầu tiên sau khi change
                            $("a.product-gallery-item:eq(" + indexVariant + ") img").attr("src", temp);
                            $("a.product-gallery-item:eq(0)").attr("href", imgVariant);
                            $("a.product-gallery-item:eq(" + indexVariant + ")").attr("href", tempHref);
                        }
                    }
                    if (template_style == 'style-03') {
                        setTimeout(function() { //debugger;
                            var indeximg = $("div.product-gallery[data-image='" + Haravan.resizeImage(variant.featured_image.src, 'master').replace('https://noritake.vn/products/bo-06-bat-com-chen-com-12-2cm-dung-tich-320ml-su-trang-art-stage-4257l-s91481', '') + "']").index();
                            $("#productSlick-slider").slick('slickGoTo', indeximg);
                            $('#slidePrductThumb').find('.slick-slide').removeClass('slick-current');
                            $('#slidePrductThumb').find('.slick-slide:nth-child(' + (indeximg + 1) + ')').addClass('slick-current');
                        }, 100);
                    }
                }
                if (variant.sku != null) {
                    jQuery('#pro_sku').html('<strong>Mã SP: </strong>' + variant.sku);
                }
                if (variant.price < variant.compare_at_price) {
                    var pro_sold = variant.price;
                    var pro_comp = variant.compare_at_price / 100;
                    var sale = 100 - (pro_sold / pro_comp);
                    var kq_sale = Math.round(sale);
                    var html = '<span class="pro-sale">Giảm giá ' + kq_sale + '%</span>';
                    html += '<span class="pro-price">' + Haravan.formatMoney(pro_sold, "1234567₫") + '</span>';
                    html += '<del>' + Haravan.formatMoney(variant.compare_at_price, "1234567₫") + '</del>';
                    jQuery('#detail-product #price-preview').html(html);
                } else {
                    jQuery('#detail-product #price-preview').html("<span class='pro-price'>" + Haravan.formatMoney(variant.price, "1234567₫" + "</span>"));
                }
                if (variant.available) {
                    if (variant.price == 0) {
                        jQuery('#detail-product .add-to-cartProduct').removeAttr('disabled').removeClass('disabled');
                        jQuery('#detail-product .add-to-cartProduct').removeAttr('id').addClass('add-to-contactProduct').html("Liên hệ");
                    } else {
                        jQuery('#detail-product .add-to-cartProduct').attr("id", "add-to-cart").removeClass('add-to-contactProduct');
                        jQuery('#detail-product .add-to-cartProduct').removeAttr('disabled').removeClass('disabled').html("Thêm vào giỏ");
                    }
                    jQuery('#detail-product .pro-soldold').addClass('d-none');
                    check_variant = true;
                } else {
                    jQuery('#detail-product .add-to-cartProduct').removeAttr('id').addClass('add-to-contactProduct').html("Liên hệ");
                    var message = variant ? "Hết hàng" : "Không có hàng";
                    jQuery('#detail-product .pro-soldold').removeClass('d-none');
                    jQuery('#detail-product .pro-soldold').text(message);
                    check_variant = false;
                }
            } else {
                jQuery('#detail-product .add-to-cartProduct').removeAttr('id').addClass('add-to-contactProduct').html("Liên hệ");
                var message = variant ? "Hết hàng" : "Không có hàng";
                jQuery('#detail-product .pro-soldold').removeClass('d-none');
                jQuery('#detail-product .pro-soldold').text(message);
                check_variant = false;
            }
            return check_variant;
        };
        jQuery(document).ready(function($) {

            new Haravan.OptionSelectors("product-select", {
                product: {
                    "available": true,
                    "compare_at_price_max": 0.0,
                    "compare_at_price_min": 0.0,
                    "compare_at_price_varies": false,
                    "compare_at_price": 0.0,
                    "content": null,
                    "description": "<div class=\"p-2 collection-heading_title border-bottom border-top bg-light\">#####</div><div class=\"p-2 collection-heading_title border-bottom border-top bg-light\">art-stage-collection</div>",
                    "featured_image": "https://product.hstatic.net/200000296482/product/img_7242_eb1fd4f4faf0451594ef84f644330c30.jpg",
                    "handle": "bo-06-bat-com-chen-com-12-2cm-dung-tich-320ml-su-trang-art-stage-4257l-s91481",
                    "id": 1047769485,
                    "images": ["https://product.hstatic.net/200000296482/product/img_7242_eb1fd4f4faf0451594ef84f644330c30.jpg"],
                    "options": ["Tiêu đề"],
                    "price": 163800000.0,
                    "price_max": 163800000.0,
                    "price_min": 163800000.0,
                    "price_varies": false,
                    "tags": ["Sứ trắng", "Sản phẩm theo bộ", "Dùng được trong lò vi sóng", "Bát cơm (chén cơm)", "Bộ sản phẩm 06 món các loại", "Dùng được trong máy rửa chén", "Chén cơm", "Rice Bowl"],
                    "template_suffix": null,
                    "title": "Bộ 06 bát cơm (chén cơm) 12,2cm dung tích 320ml sứ trắng | Art Stage 4257L - S91481",
                    "type": "Art Stage Style",
                    "url": "/products/bo-06-bat-com-chen-com-12-2cm-dung-tich-320ml-su-trang-art-stage-4257l-s91481",
                    "pagetitle": "Bộ 06 bát cơm 12,2cm dung tích 320ml sứ trắng Art Stage 4257L - S91481",
                    "metadescription": "Bộ 6 bát cơm đường kính 12cm sứ trắng Art Stage được làm từ chất liệu sứ trắng, thuộc thương hiệu hàng đầu tại Nhật - Noritake. Sản phẩm có thể sử dụng trong máy rửa chén hoặc lò vi sóng nên cực kỳ tiện lợi cho nhu cầu sử dụng hàng ngày.",
                    "variants": [{
                        "id": 1107654370,
                        "barcode": null,
                        "available": true,
                        "price": 163800000.0,
                        "sku": "4257L - S91481",
                        "option1": "Art Stage Collection",
                        "option2": "",
                        "option3": "",
                        "options": ["Art Stage Collection"],
                        "inventory_quantity": 10.0,
                        "old_inventory_quantity": 10.0,
                        "title": "Art Stage Collection",
                        "weight": 0.0,
                        "compare_at_price": 0.0,
                        "inventory_management": "haravan",
                        "inventory_policy": "deny",
                        "selected": false,
                        "url": null,
                        "featured_image": null
                    }],
                    "vendor": "Art Stage Collection",
                    "published_at": "2023-07-16T02:30:45.954Z",
                    "created_at": "2023-06-23T07:08:56.093Z",
                    "not_allow_promotion": false
                },
                onVariantSelected: selectCallback
            });
            // Add label if only one product option and it isn't 'Title'.

            // Auto-select first available variant on page load.





            $('#detail-product .single-option-selector:eq(0)').val("Art Stage Collection").trigger('change');



            $('#detail-product .selector-wrapper select').each(function() {
                $(this).wrap('<span class="custom-dropdown custom-dropdown--white"></span>');
                $(this).addClass("custom-dropdown__select custom-dropdown__select--white");
            });

        });
    </script>
    <script>
        var swatch_size = parseInt($('#add-item-form .select-swatch').children().size());
        jQuery(document).on('click', '#add-item-form .swatch input', function(e) {
            e.preventDefault();
            var $this = $(this);
            var _available = '';
            $this.parent().siblings().find('label').removeClass('sd');
            $this.next().addClass('sd');
            var name = $this.attr('name');
            var value = $this.val();
            $('#add-item-form select[data-option=' + name + ']').val(value).trigger('change');
            if (swatch_size == 2) {
                if (name.indexOf('1') != -1) {
                    $('#add-item-form #variant-swatch-1 .swatch-element').find('input').prop('disabled', false);
                    $('#add-item-form #variant-swatch-2 .swatch-element').find('input').prop('disabled', false);
                    $('#add-item-form #variant-swatch-1 .swatch-element label').removeClass('sd');
                    $('#add-item-form #variant-swatch-1 .swatch-element').removeClass('soldout');
                    $('#add-item-form .selector-wrapper .single-option-selector').eq(1).find('option').each(function() {
                        var _tam = $(this).val();
                        $(this).parent().val(_tam).trigger('change');
                        if (check_variant) {
                            if (_available == '') {
                                _available = _tam;
                            }
                        } else {
                            $('#add-item-form #variant-swatch-1 .swatch-element[data-value="' + _tam + '"]').addClass('soldout');
                            $('#add-item-form #variant-swatch-1 .swatch-element[data-value="' + _tam + '"]').find('input').prop('disabled', true);
                        }
                    })
                    $('#add-item-form .selector-wrapper .single-option-selector').eq(1).val(_available).trigger('change');
                    $('#add-item-form #variant-swatch-1 .swatch-element[data-value="' + _available + '"] label').addClass('sd');
                }
            } else if (swatch_size == 3) {
                var _count_op2 = $('#add-item-form #variant-swatch-1 .swatch-element').size();
                var _count_op3 = $('#add-item-form #variant-swatch-2 .swatch-element').size();
                if (name.indexOf('1') != -1) {
                    $('#add-item-form #variant-swatch-1 .swatch-element').find('input').prop('disabled', false);
                    $('#add-item-form #variant-swatch-2 .swatch-element').find('input').prop('disabled', false);
                    $('#add-item-form #variant-swatch-1 .swatch-element label').removeClass('sd');
                    $('#add-item-form #variant-swatch-1 .swatch-element').removeClass('soldout');
                    $('#add-item-form #variant-swatch-2 .swatch-element label').removeClass('sd');
                    $('#add-item-form #variant-swatch-2 .swatch-element').removeClass('soldout');
                    var _avi_op1 = '';
                    var _avi_op2 = '';
                    $('#add-item-form #variant-swatch-1 .swatch-element').each(function(ind, value) {
                        var _key = $(this).data('value');
                        var _unavi = 0;
                        $('#add-item-form .single-option-selector').eq(1).val(_key).change();
                        $('#add-item-form #variant-swatch-2 .swatch-element label').removeClass('sd');
                        $('#add-item-form #variant-swatch-2 .swatch-element').removeClass('soldout');
                        $('#add-item-form #variant-swatch-2 .swatch-element').find('input').prop('disabled', false);
                        $('#add-item-form #variant-swatch-2 .swatch-element').each(function(i, v) {
                            var _val = $(this).data('value');
                            $('#add-item-form .single-option-selector').eq(2).val(_val).change();
                            if (check_variant == true) {
                                if (_avi_op1 == '') {
                                    _avi_op1 = _key;
                                }
                                if (_avi_op2 == '') {
                                    _avi_op2 = _val;
                                }
                                //console.log(_avi_op1 + ' -- ' + _avi_op2)
                            } else {
                                _unavi += 1;
                            }
                        })
                        if (_unavi == _count_op3) {
                            $('#add-item-form #variant-swatch-1 .swatch-element[data-value = "' + _key + '"]').addClass('soldout');
                            setTimeout(function() {
                                $('#add-item-form #variant-swatch-1 .swatch-element[data-value = "' + _key + '"] input').attr('disabled', 'disabled');
                            })
                        }
                    })
                    $('#add-item-form #variant-swatch-1 .swatch-element[data-value="' + _avi_op1 + '"] input').click();
                } else if (name.indexOf('2') != -1) {
                    $('#add-item-form #variant-swatch-2 .swatch-element label').removeClass('sd');
                    $('#add-item-form #variant-swatch-2 .swatch-element').removeClass('soldout');
                    $('#add-item-form #variant-swatch-2 .swatch-element').find('input').prop('disabled', false);
                    $('#add-item-form .selector-wrapper .single-option-selector').eq(2).find('option').each(function() {
                        var _tam = $(this).val();
                        $(this).parent().val(_tam).trigger('change');
                        if (check_variant) {
                            if (_available == '') {
                                _available = _tam;
                            }
                        } else {
                            $('#add-item-form #variant-swatch-2 .swatch-element[data-value="' + _tam + '"]').addClass('soldout');
                            $('#add-item-form #variant-swatch-2 .swatch-element[data-value="' + _tam + '"]').find('input').prop('disabled', true);
                        }
                    })
                    $('#add-item-form .selector-wrapper .single-option-selector').eq(2).val(_available).trigger('change');
                    $('#add-item-form #variant-swatch-2 .swatch-element[data-value="' + _available + '"] label').addClass('sd');
                }
            }

            if (template_style == 'style-01') {
                if (checkScroll != '' && $(window).width() > 991 && fIndex == true) {
                    var indeximg1 = $(".sliderOwl-product div.product-gallery[data-image='" + checkScroll + "']").index();
                    $('html, body').animate({
                        scrollTop: $('.sliderOwl-product div.product-gallery:eq(' + indeximg1 + ')').offset().top - 15
                    }, 800);
                }
            }
        })
        $(document).ready(function() {
            var vl = $('#add-item-form .swatch .color input').val();
            var _chage = '';
            $('#add-item-form .swatch-element[data-value="' + $('#add-item-form .selector-wrapper .single-option-selector').eq(0).val() + '"]').find('input').click();
            $('#add-item-form .swatch-element[data-value="' + $('#add-item-form .selector-wrapper .single-option-selector').eq(1).val() + '"]').find('input').click();
            if (swatch_size == 2) {
                var _avi_op1 = '';
                var _avi_op2 = '';
                var _count = $('#add-item-form #variant-swatch-1 .swatch-element').size();
                $('#add-item-form #variant-swatch-0 .swatch-element').each(function(ind, value) {
                    var _key = $(this).data('value');
                    var _unavi = 0;
                    $('#add-item-form .single-option-selector').eq(0).val(_key).change();
                    $('#add-item-form #variant-swatch-1 .swatch-element').each(function(i, v) {
                        var _val = $(this).data('value');
                        $('#add-item-form .single-option-selector').eq(1).val(_val).change();
                        if (check_variant == true) {
                            if (_avi_op1 == '') {
                                _avi_op1 = _key;
                            }
                            if (_avi_op2 == '') {
                                _avi_op2 = _val;
                            }
                        } else {
                            _unavi += 1;
                        }
                    })
                    if (_unavi == _count) {
                        $('#add-item-form #variant-swatch-0 .swatch-element[data-value = "' + _key + '"]').addClass('soldout');
                        //$('#add-item-form #variant-swatch-0 .swatch-element[data-value = "'+_key+'"]').find('input').attr('disabled','disabled');
                    }
                })
                $('#add-item-form #variant-swatch-1 .swatch-element[data-value = "' + _avi_op2 + '"] input').click();
                $('#add-item-form #variant-swatch-0 .swatch-element[data-value = "' + _avi_op1 + '"] input').click();
            } else if (swatch_size == 3) {
                var _avi_op1 = '';
                var _avi_op2 = '';
                var _avi_op3 = '';
                var _size_op2 = $('#add-item-form #variant-swatch-1 .swatch-element').size();
                var _size_op3 = $('#add-item-form #variant-swatch-2 .swatch-element').size();

                $('#add-item-form #variant-swatch-0 .swatch-element').each(function(ind, value) {
                    var _key_va1 = $(this).data('value');
                    var _count_unavi = 0;
                    $('#add-item-form .single-option-selector').eq(0).val(_key_va1).change();
                    $('#add-item-form #variant-swatch-1 .swatch-element').each(function(i, v) {
                        var _key_va2 = $(this).data('value');
                        var _unavi_2 = 0;
                        $('#add-item-form .single-option-selector').eq(1).val(_key_va2).change();
                        $('#add-item-form #variant-swatch-2 .swatch-element').each(function(j, z) {
                            var _key_va3 = $(this).data('value');
                            $('#add-item-form .single-option-selector').eq(2).val(_key_va3).change();
                            if (check_variant == true) {
                                if (_avi_op1 == '') {
                                    _avi_op1 = _key_va1;
                                }
                                if (_avi_op2 == '') {
                                    _avi_op2 = _key_va2;
                                }
                                if (_avi_op3 == '') {
                                    _avi_op3 = _key_va3;
                                }
                            } else {
                                _unavi_2 += 1;
                            }
                        })
                        if (_unavi_2 == _size_op3) {
                            _count_unavi += 1;
                        }
                    })
                    if (_size_op2 == _count_unavi) {
                        $('#add-item-form #variant-swatch-0 .swatch-element[data-value = "' + _key_va1 + '"]').addClass('soldout');
                        //	$('#add-item-form #variant-swatch-0 .swatch-element[data-value = "'+_key_va1+'"]').find('input').attr('disabled','disabled');
                    }
                })
                $('#add-item-form #variant-swatch-0 .swatch-element[data-value = "' + _avi_op1 + '"] input').click();
            } else {}
            if (template_style == 'style-01') {
                fIndex = true;
                if (checkScroll != '') {
                    if ($(window).width() > 991) {
                        var indeximg1 = $(".sliderOwl-product div.product-gallery[data-image='" + checkScroll + "']").index();
                        if ($(window).scrollTop() > $('.productDetail-information').offset().top) {
                            $('html, body').animate({
                                scrollTop: $('.sliderOwl-product div.product-gallery:eq(' + indeximg1 + ')').offset().top - 15
                            }, 800);
                        }
                    }
                }
            }

            $('#add-item-form .swatch .color input').parents(".swatch").find(".header-swatch span").html(vl);
            $("#add-item-form .select-swap .color").hover(function() {
                var value = $(this).data("value");
                $(this).parents(".swatch").find(".header-swatch span").html(value);
            }, function() {
                var value = $("#add-item-form .select-swap .color label.sd span").html();
                $(this).parents(".swatch").find(".header-swatch span").html(value);
            });
        });
    </script>

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

@endsection
@section('js')
<script>
    $(document).ready(function() {

        if ($(window).width() > 1500) {
            thumbItems = 7;
            verticalHeight = 755;
        }

        if ($(window).width() > 1200 && $(window).width() <= 1500) {
            thumbItems = 6;
            verticalHeight = 635;
        }

        if ($(window).width() >= 767 && $(window).width() <= 1200) {
            thumbItems = 5;
            verticalHeight = 539;
        }

        // Chỉ khởi tạo slider nếu màn hình >= 767px
        if ($(window).width() >= 767) {
            $("#productSlick-slider-trai-1").lightSlider({
                gallery: true,
                item: 1,
                vertical: true,
                verticalHeight: verticalHeight,
                loop: true,
                thumbItem: thumbItems, // Sử dụng biến đã được thiết lập
                thumbMargin: 15,
                slideMargin: 0,
            });
        }

        setTimeout(function() {
            $('.productList-slider.lightSlider li img').css({
                'width': '100%',
                'height': '100%',
                'object-fit': 'cover',
                'display': 'block'
            });
        }, 0);
    });

    /*if($(window).width() < 768) {
        $(document).ready(function() {
            $('#productSlick-slider-trai').lightSlider({
                gallery: true,
                item: 1,
                loop: true,
                thumbItem: 6,
                thumbMargin: 5,
                slideMargin: 0,
                enableDrag: false,
                slideMargin: 0,
                onSliderLoad: function(el) {
                    el.lightGallery({
                        selector: '#productSlick-slider-trai .lslide'
                    });
                }
            });
        });
    }*/

    // Gắn sự kiện click cho thẻ a bằng cách sử dụng phương thức click() của jQuery
    $('#click-zoom').click(function(e) {
        e.preventDefault(); // Ngăn chặn hành vi mặc định khi click vào thẻ a
        // Thay đổi thuộc tính display của overlay thành block
        $('.overlay').css('display', 'block');
        $('.image-zoom').css('display', 'block');
        $(".template-product").addClass("zoomable-element");
    });

    $(document).ready(function() {
        // Gắn sự kiện click cho document bằng cách sử dụng phương thức on() của jQuery
        $(document).on('click', function(e) {
            // Kiểm tra xem sự kiện click xảy ra trên overlay hay không
            if ($(e.target).hasClass('overlay')) {
                // Thay đổi thuộc tính display của overlay thành none
                $('.overlay').css('display', 'none');
                $('.image-zoom').css('display', 'none');
                $(".template-product").removeClass("zoomable-element");
            }
        });
    });

    $(document).ready(function() {
        $('.zoomable-element').on('touchstart', function(event) {
            if (!$(event.target).hasClass('image-zoom')) {
                event.preventDefault();
            }
        });
    });
</script>
@endsection