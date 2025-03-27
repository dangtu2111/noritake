<div class="wrapper-mainCollection">
    <div class="container-fluid">
        <div class="collection-heading-page">
            @include('frontend.product.component.header')
        </div>
        <div class="row flex-lg-nowrap collection-content-page">
            <div class="col-12 collection-content-list_product">
                @include('frontend.product.component.title_filter')

                <div class="collection-list-product">
                    <div id="loader"></div>
                    <div id="collection-body">
                        <div class="wrapper-list-collection">
                            <div class="row product-list-filter">
                                @if(isset($productInCategories) && !empty($productInCategories))
                                    @foreach ($productInCategories as $product)
                                        <div class="col-6 col-md-4 col-lg-3 product-loop trai">
                                            <div class="product-inner product-resize toan">
                                                <div class="product-image d-flex justify-content-center align-items-center image-resize">
                                                    <a href="{{ route('product.detail', ['slug' => $product->slug]) }}"
                                                        title="{{ $product->name }}" class="aspect-ratio">
                                                        <div class="image-first-holder d-flex justify-content-center align-items-center">
                                                            <picture>
                                                                <source media="(max-width: 480px)" srcset="{{ $product->image ?? 'http://via.placeholder.com/150' }}">
                                                                <source media="(min-width: 481px) and (max-width: 767px)" srcset="{{ $product->image ?? 'http://via.placeholder.com/300' }}">
                                                                <source media="(min-width: 768px)" srcset="{{ $product->image ?? 'http://via.placeholder.com/300' }}">
                                                                <img class="image-loop"
                                                                    src="{{ $product->image ?? 'http://via.placeholder.com/300' }}"
                                                                    alt="{{ $product->name }}">
                                                            </picture>
                                                        </div>
                                                        <div class="image-second-holder d-flex justify-content-center align-items-center">
                                                            <picture>
                                                                <source media="(max-width: 480px)" srcset="{{ $product->image_hover ?? $product->image ?? 'http://via.placeholder.com/150' }}">
                                                                <source media="(min-width: 481px) and (max-width: 767px)" srcset="{{ $product->image_hover ?? $product->image ?? 'http://via.placeholder.com/300' }}">
                                                                <source media="(min-width: 768px)" srcset="{{ $product->image_hover ?? $product->image ?? 'http://via.placeholder.com/300' }}">
                                                                <img class="image-loop"
                                                                    src="{{ $product->image_hover ?? $product->image ?? 'http://via.placeholder.com/300' }}"
                                                                    alt="{{ $product->name }}">
                                                            </picture>
                                                        </div>
                                                    </a>
                                                </div>

                                                <div class="product-detail">
                                                    <div class="box-pro-detail">
                                                        <span class="pro-vendor">
                                                            @if($product->category_id && $product->category)
                                                                <a title="Xem bộ sưu tập: {{ $product->category->name }}"
                                                                    href="{{ route('product.category', ['id' => $product->category->id]) }}">
                                                                    {{ $product->category->name }}
                                                                </a>
                                                            @else
                                                                <span>{{ $product->vendor ?? 'Danh mục' }}</span>
                                                            @endif
                                                        </span>
                                                        <p class="pro-name">
                                                            <a href="{{ route('product.detail', ['slug' => $product->slug]) }}"
                                                                title="{{ $product->name }}" class="link">
                                                                {{ $product->name }}
                                                            </a>
                                                        </p>
                                                        <div class="box-pro-prices">
                                                            <p class="block-pro-price">
                                                                <span class="pro-price">{{ number_format($product->price, 0, ',', '.') }}₫</span>
                                                            </p>
                                                        </div>

                                                        <button class="btn-collection-add-to-cart before btn-box btnred">Thêm vào giỏ hàng</button>
                                                        <form class="form-collection-add-to-cart" data-product-id="{{ $product->id }}">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{ $product->id }}" />
                                                            <div class="add-to-cart-section">
                                                                <div class="quantity-area">
                                                                    <input type="button" value="-" class="qty-btn minus-btn col-md-4 no-zoom">
                                                                    <input type="text" id="quantity_{{ $product->id }}" name="quantity" value="1" class="quantity-input" readonly>
                                                                    <input type="button" value="+" class="qty-btn plus-btn col-md-4 no-zoom">
                                                                </div>
                                                                <button type="submit" class="btn-collection-add-to-cart after btn-box btnred">
                                                                    <i class="fa fa-cart-plus" aria-hidden="true"></i>
                                                                </button>
                                                            </div>
                                                        </form>

                                                        <!-- Modal 1: Success -->
                                                        <div class="modal fade" id="exampleModalCenter1_{{ $product->id }}"
                                                            data-backdrop="static" tabindex="-1" role="dialog"
                                                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-body trai">
                                                                        <div style="width: 20%; margin: 0 auto;">
                                                                            <svg version="1.1" id="tick" xmlns="http://www.w3.org/2000/svg"
                                                                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                                                viewBox="0 0 37 37" style="" xml:space="preserve">
                                                                                <path class="circ path" style="fill:none;stroke-width:3;stroke-linejoin:round;stroke-miterlimit:10;"
                                                                                    d="M30.5,6.5L30.5,6.5c6.6,6.6,6.6,17.4,0,24l0,0c-6.6,6.6-17.4,6.6-24,0l0,0c-6.6-6.6-6.6-17.4,0-24l0,0C13.1-0.2,23.9-0.2,30.5,6.5z" />
                                                                                <polyline class="tick path" style="fill:none;stroke-width:3;stroke-linejoin:round;stroke-miterlimit:10;"
                                                                                    points="11.6,20 15.9,24.2 26.4,13.8" stroke-linecap="round" />
                                                                            </svg>
                                                                        </div>
                                                                        <p class="sweet-alert-h2">Cảm ơn bạn!</p>
                                                                        <p class="sweet-alert-p" style="display: block;">Sản phẩm đã được thêm vào giỏ thành công!</p>
                                                                        <p class="countdown"></p>
                                                                    </div>
                                                                    <div class="modal-footer trai">
                                                                        <button type="button" class="btn btn-box mua-tiep" data-dismiss="modal">Tiếp tục mua hàng</button>
                                                                        <button type="button" class="btn btn-box dark den-gio-hang" onclick="window.location.href='{{ route('cart.index') }}';">Đến giỏ hàng</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Modal 2: Error -->
                                                        <div class="modal fade" id="exampleModalCenter2_{{ $product->id }}"
                                                            data-backdrop="static" tabindex="-1" role="dialog"
                                                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-body trai">
                                                                        <div style="width: 20%; margin: 0 auto;">
                                                                            <img style="width: 80px;" src="https://file.hstatic.net/200000296482/file/close_9d79ea724eb24c78a9f5a9f18aba5291.png">
                                                                        </div>
                                                                        <p class="notice-red" style="display: block;">Sản phẩm vượt quá tồn kho, vui lòng giảm số lượng.</p>
                                                                    </div>
                                                                    <div class="modal-footer trai">
                                                                        <button type="button" class="btn btn-box dark mua-tiep" data-dismiss="modal">Tôi đã hiểu</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="col-12 text-center">
                                        <p>Không có sản phẩm nào trong danh mục này.</p>
                                    </div>
                                @endif
                            </div>

                            <div class="row collection-pagination pagination-filter justify-content-center">
                                <div class="col-12" style="text-align: center">
                                    <div id="pagination">
                                        <!-- Phân trang sẽ được xử lý động nếu cần -->
                                    </div>
                                    <div id="loadmore" class="btn-boxx btnred">Xem thêm sản phẩm</div>
                                </div>
                            </div>
                            <div id="loading-spinner">
                                <div class="spinner"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="text" class="d-none" id="coll-handle" value="(collectionid:product={{ $categoryId ?? '1003780318' }})" />
</div>

<!-- Thêm script jQuery và AJAX -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function() {
        $('.form-collection-add-to-cart').on('submit', function(e) {
            e.preventDefault();
            var form = $(this);
            var productId = form.data('product-id');
            var quantity = $('#quantity_' + productId).val();

            $.ajax({
                url: '{{ route("ajax.cart.addToCart") }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    product_id: productId,
                    quantity: quantity
                },
                success: function(response) {
                    if (response.code === 10) {
                        // Hiển thị modal thành công
                        $('#exampleModalCenter1_' + productId).modal('show');
                    } else if (response.code === 11 && response.redirect) {
                        // Chưa đăng nhập, chuyển hướng đến trang login
                        window.location.href = response.redirect;
                    } else {
                        // Hiển thị modal lỗi
                        $('#exampleModalCenter2_' + productId).modal('show');
                    }
                },
                error: function(xhr) {
                    // Hiển thị modal lỗi chung
                    $('#exampleModalCenter2_' + productId).modal('show');
                }
            });
        });

        // Xử lý tăng/giảm số lượng
        $('.minus-btn').on('click', function() {
            var input = $(this).siblings('.quantity-input');
            var value = parseInt(input.val());
            if (value > 1) {
                input.val(value - 1);
            }
        });

        $('.plus-btn').on('click', function() {
            var input = $(this).siblings('.quantity-input');
            var value = parseInt(input.val());
            input.val(value + 1);
        });
    });
</script>