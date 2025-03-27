@extends('frontend.home.layout')
@section('page_title')
<<<<<<< HEAD
Giỏ hàng
@endsection
@section('content')
<main class="mainContent-theme">
	<div class="overlay123"></div>

	<div class="breadcrumb-content-inner">
		<div class="breadcrumb-shop clearfix">
=======
    Giỏ hàng
@endsection
@section('content')
<main class="mainContent-theme">
            <div class="overlay123"></div>
            
<div class="breadcrumb-content-inner">
	<div class="breadcrumb-shop clearfix">
>>>>>>> a49165e89efd4cc07df4e43f35084b1750916191
			<div class="breadcrumb-list">
				<ol class="breadcrumb breadcrumb-arrows" itemscope="" itemtype="http://schema.org/BreadcrumbList">
					<li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
						<a href="/" target="_self" itemprop="item"><span itemprop="name">Trang chủ</span></a>
<<<<<<< HEAD
						<meta itemprop="position" content="1">
=======
						<meta itemprop="position" content="1">		
>>>>>>> a49165e89efd4cc07df4e43f35084b1750916191
					</li>
					<li class="active" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
						<span itemprop="item" content="https://noritake.vn/cart"><strong itemprop="name">Giỏ hàng (1)</strong></span>
						<meta itemprop="position" content="2">
					</li>
				</ol>
			</div>
		</div>
	</div>


<<<<<<< HEAD
	<div class="layoutPage-cart mt-4 pb-5">
		<div class="container-fluid">
			<div class="wrapper-cart-layout">
				<div class="heading-page-cart text-center pt-3 pb-4">
					<h1 class="m-0" style="scroll-margin-top: 40px;" id="giỏ-hàng-của-bạn-1">Giỏ hàng của bạn</h1>
				</div>
				<div class="wrapbox-content-cart">
					<div class="cart-container-inner">
						<div class="row">
							<div class="col-12 col-md-8">
								<form action="/cart" method="post" id="cartformpage">
									<div class="reponsive-table-cart">
										<div class="title-count-cart mb-2">
											Bạn đang có <span>1 sản phẩm</span> trong giỏ hàng
										</div>
										<div class="table-cart">
											<div class="list-item-cart">
												@if(isset($carts))
												@foreach ($carts->cartItems as $key => $cartItem)
												<div class="line-item-container" data-variant-id="{{ $cartItem->variant_id ?? $cartItem->id }}">
													<div class="line-item media">
														<div class="line-item-image_wrapper mr-3">
													
															<a href="{{ route('product.detail', ['slug' => $cartItem->products->slug]) }}" aria-label="{{ $cartItem->products->name }}" class="d-block">
																<img src="{{ $cartItem->products->image }}" alt="{{ $cartItem->products->name }}">
															</a>
														</div>
														<div class="line-item-product_body media-body">
															<div class="line-item_title mb-1 pr-4">
																
																<a href="{{ route('product.detail', ['slug' => $cartItem->products->slug]) }}" class="d-inline-block">
																	<h3 class="mb-0">{{ $cartItem->products->name }}</h3>
																</a>
															</div>
															<div class="line-item_vairant mb-2">
																<!-- Nếu có thông tin variant, có thể thêm vào đây -->
																@if($cartItem->variant_name ?? false)
																<span>{{ $cartItem->variant_name }}</span>
																@endif
															</div>
															<div class="line-item_price mb-2">
																<span class="price"><strong>{{ number_format($cartItem->products->del, 0, ',', '.') }}₫</strong></span>
															</div>
															<div data_item_id="{{ $cartItem->id }}" class="line-item_quantity product-quantity qty-click d-inline-block">
																<button type="button" class="qtyminus qty-btn border float-left">-</button>
																<input type="text" size="4" name="updates[]" min="1"
																	id="updates_{{ $cartItem->variant_id ?? $cartItem->id }}"
																	data-price="{{ $cartItem->products->del }}"
																	value="{{ $cartItem->quantity }}"
																	class="item-quantity float-left text-center border border-right-0 border-left-0">
																<button type="button" class="qtyplus qty-btn border float-left">+</button>
															</div>
															<div class="line-item_price-total float-md-right mt-2 mt-md-0">
																<p class="m-0">
																	<span class="text font-weight-normal">Thành tiền:</span>
																	<span class="line-item-total font-weight-bold">
																		{{ number_format($cartItem->products->del * $cartItem->quantity, 0, ',', '.') }}₫
																	</span>
																</p>
															</div>
															<a class="line-item_remove-item-cart"
																data_item_id="{{ $cartItem->id}}"
																type="button"
																href="#"
																title="Xóa sản phẩm này"
																aria-label="Xóa sản phẩm này">
																<i class="fa fa-trash-o" aria-hidden="true"></i>
															</a>
														</div>
													</div>
												</div>
												@endforeach
												@endif
											</div>
										</div>
									</div>
									<div class="reponsive-cart-noted mt-4">
										<div class="row">
											<div class="col-12 col-lg-6">
												<div class="checkout-note clearfix">
													<label for="note" class="note-label d-block">Ghi chú đơn hàng</label>
													<textarea id="note" class="form-control" name="note" rows="6"></textarea>
												</div>
												<div class="check_out_btn d-none">
													<a class="button dark link-continue d-none" href="javascript:history.back()" title="Tiếp tục mua hàng"><i class="fa fa-reply"></i>Tiếp tục mua hàng</a>
													<button type="submit" id="update-cart" class="btn-update button dark d-none" name="update" value="">Cập nhật</button>
													<a  href="{{ route('order.checkout') }}" id="checkout" class="btn-checkout button dark d-none" name="checkout" value="">Thanh toán</a>
												</div>
											</div>
											<div class="col-12 col-lg-6 d-none d-md-block">
												<div class="policy_return mt-3 mt-lg-0">
													<h3 class="mb-2"></h3>
													<ul class="list-group">
													</ul>
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>
							<div class="col-12 col-md-4">
								<div class="wrap-order-summary sticky-cart-order mt-4 mt-md-0">
									<div class="order-cart-block p-3 border">
										<h2 class="order-title mb-3">Thông tin đơn hàng</h2>
										<div class="order-total mb-2 font-weight-bold">
											<p class="d-flex justify-content-between align-items-center m-0 py-3 border-bottom border-top">
												Tổng tiền:<span>0₫</span>
											</p>
										</div>
										<div class="order-short-description">
											<p class="mb-2">Bạn có thể nhập mã giảm giá ở trang thanh toán</p>
										</div>
										<div class="order-action-checkout">
											<a href="{{ route('order.checkout') }}" class="checkout-btn d-block text-center text-white text-uppercase link" name="checkout">Thanh toán</a>
										</div>
										<a class="countine_order_cart d-block text-center mt-2 link" href="javascript:history.back()" title="Tiếp tục mua hàng"><i class="fa fa-reply mr-2"></i>Tiếp tục mua hàng</a>
									</div>
								</div>
								<div class="wrap-policy-cart d-block d-md-none">
									<div class="policy_return mt-3 mt-lg-0">
										<h3 class="mb-2"></h3>
										<ul class="list-group">
										</ul>
									</div>
								</div>
=======
<div class="layoutPage-cart mt-4 pb-5">
	<div class="container-fluid">
		<div class="wrapper-cart-layout">
			<div class="heading-page-cart text-center pt-3 pb-4">
				<h1 class="m-0" style="scroll-margin-top: 40px;" id="giỏ-hàng-của-bạn-1">Giỏ hàng của bạn</h1>	
			</div>
			<div class="wrapbox-content-cart">
				<div class="cart-container-inner">
					<div class="row">
						<div class="col-12 col-md-8">
							<form action="/cart" method="post" id="cartformpage">
								<div class="reponsive-table-cart">
									<div class="title-count-cart mb-2">
										Bạn đang có <span>1 sản phẩm</span> trong giỏ hàng
									</div>
									<div class="table-cart">
										<div class="list-item-cart">
											<div class="line-item-container" data-variant-id="1079135998">
												<div class="line-item media">
													<div class="line-item-image_wrapper mr-3">
														<a href="/products/bo-am-chen-uong-tra-am-1-250ml-chen-245ml-15-mon-su-xuong-bogart-platinum-4958l-t017a" aria-label="Bộ ấm chén uống trà (ấm 1.250ml, chén 245ml) 15 món sứ xương | Bogart Platinum 4958L - T017A" class="d-block">
															<img src="  //product.hstatic.net/200000296482/product/bogart_platinum_-_tra_15__1__63ae0de1a9e54c59840b12b75cbe3dc6_compact.jpg " alt="Bộ ấm chén uống trà (ấm 1.250ml, chén 245ml) 15 món sứ xương | Bogart Platinum 4958L - T017A">
														</a>
													</div>
													<div class="line-item-product_body media-body">
														<div class="line-item_title mb-1 pr-4">
															<a href="/products/bo-am-chen-uong-tra-am-1-250ml-chen-245ml-15-mon-su-xuong-bogart-platinum-4958l-t017a" class="d-inline-block">
																<h3 class="mb-0">Bộ ấm chén uống trà (ấm 1.250ml, chén 245ml) 15 món sứ xương | Bogart Platinum 4958L - T017A</h3>
															</a>
														</div>
														<div class="line-item_vairant mb-2">
														</div>
														<div class="line-item_price mb-2">
															<span class="price"><strong>13,658,000₫</strong></span>
														</div>
														<div class="line-item_quantity product-quantity qty-click d-inline-block">
															<button type="button" class="qtyminus qty-btn border float-left">-</button>
															<input type="text" size="4" name="updates[]" min="1" id="updates_1079135998" data-price="1365800000" value="1" class="item-quantity float-left text-center border border-right-0 border-left-0">
															<button type="button" class="qtyplus qty-btn border float-left">+</button>
														</div>
														<div class="line-item_price-total float-md-right mt-2 mt-md-0">
															<p class="m-0">
																<span class="text font-weight-normal">Thành tiền:</span>
																<span class="line-item-total font-weight-bold">13,658,000₫</span>
															</p>
														</div>
														<a class="line-item_remove-item-cart" href="/cart/change?line=1&amp;quantity=0" title="Xóa sản phẩm này" aria-label="Xóa sản phẩm này">
															<i class="fa fa-trash-o" aria-hidden="true"></i>
														</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="reponsive-cart-noted mt-4">
									<div class="row">
										<div class="col-12 col-lg-6">
											<div class="checkout-note clearfix">
												<label for="note" class="note-label d-block">Ghi chú đơn hàng</label>
												<textarea id="note" class="form-control" name="note" rows="6"></textarea>
											</div>
											<div class="check_out_btn d-none">
												<a class="button dark link-continue d-none" href="/collections/all" title="Tiếp tục mua hàng"><i class="fa fa-reply"></i>Tiếp tục mua hàng</a>
												<button type="submit" id="update-cart" class="btn-update button dark d-none" name="update" value="">Cập nhật</button>
												<button type="submit" id="checkout" class="btn-checkout button dark d-none" name="checkout" value="">Thanh toán</button>
											</div>
										</div>
										<div class="col-12 col-lg-6 d-none d-md-block">
											<div class="policy_return mt-3 mt-lg-0">
												<h3 class="mb-2"></h3>
												<ul class="list-group">
												</ul>
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
						<div class="col-12 col-md-4">
							<div class="wrap-order-summary sticky-cart-order mt-4 mt-md-0">
								<div class="order-cart-block p-3 border">
									<h2 class="order-title mb-3">Thông tin đơn hàng</h2>
									<div class="order-total mb-2 font-weight-bold">
										<p class="d-flex justify-content-between align-items-center m-0 py-3 border-bottom border-top">
											Tổng tiền:<span>13,658,000₫</span>
										</p>
									</div>
									<div class="order-short-description">
										<p class="mb-2">Bạn có thể nhập mã giảm giá ở trang thanh toán</p>
									</div>
									<div class="order-action-checkout">
										<a href="#" class="checkout-btn d-block text-center text-white text-uppercase link" name="checkout">Thanh toán</a>
									</div>
									<a class="countine_order_cart d-block text-center mt-2 link" href="/collections/all" title="Tiếp tục mua hàng"><i class="fa fa-reply mr-2"></i>Tiếp tục mua hàng</a>
								</div>
							</div>
							<div class="wrap-policy-cart d-block d-md-none">
								<div class="policy_return mt-3 mt-lg-0">
									<h3 class="mb-2"></h3>
									<ul class="list-group">
									</ul>
								</div>
>>>>>>> a49165e89efd4cc07df4e43f35084b1750916191
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<<<<<<< HEAD
	<script>
		$('.line-item_remove-item-cart').on('click', function(e) {
			e.preventDefault(); // Ngăn hành vi mặc định của thẻ a

			// Lấy id_cart_item từ thuộc tính data
			const cartItemId = $(this).attr('data_item_id');
			console.log(cartItemId);
			// Gọi hàm deleteCart với id_cart_item
			
			const $container = $(this).closest('.line-item-container');
			deleteCart(cartItemId);
			$container.remove(); 
		});
		function log(args) {
			var str = "";
			for (var i = 0; i < arguments.length; i++) {
				if (typeof arguments[i] === "object") {
					str += JSON.stringify(arguments[i]);
				} else {
					str += arguments[i];
				}
			}
			return str;
		}

		function addCommas(str) {
			var parts = (str + "").split("."),
				main = parts[0],
				len = main.length,
				output = "",
				i = len - 1;

			while (i >= 0) {
				output = main.charAt(i) + output;
				if ((len - i) % 3 === 0 && i > 0) {
					output = "," + output;
				}
				--i;
			}
			// put decimal part back
			if (parts.length > 1) {
				output += "," + parts[1];
			}
			return output;
		};
		(function($, window, document, undefined) {
			var pluginName = 'hrvAJAXCart',
				defaults = {
					propertyName: "value"
				};

			function Plugin(element, options) {
				this.element = element;
				this.options = $.extend({}, defaults, options);
				this._defaults = defaults;
				this._name = 'hrvAJAXCart';
				this.init();
			}
			Plugin.prototype = {
				init: function() {
					var item = this.options.item,
						item_total = this.options.item_total,
						item_qty = this.options.item_qty,
						subtotal = $(this.options.subtotal);

					// Change line item quantity
					$(item_qty).change(function() {
						var qty = $(this).val(),
							this_item = $(this).closest(item),
							variant_id = this_item.data('variant-id'),
							this_item_total = this_item.find(item_total);
						$.ajax({
							type: 'POST',
							url: '/cart/change.js',
							dataType: 'json',
							data: {
								quantity: qty,
								id: variant_id
							},
							success: function(cart) {
								if (qty == 0) {
									this_item.remove();
								} else {
									$.each(cart.items, function(index, row) {
										var price = parseFloat(row.line_price / 100).toFixed(2);
										var currency = Number(price.replace(/[^0-9\.-]+/g, ""));
										if (variant_id == row.variant_id) this_item_total.html(log(addCommas(currency)) + ' đ');
									});
								}
								var sub_price = parseFloat(cart.total_price / 100).toFixed(2);
								sub_price = Number(sub_price.replace(/[^0-9\.-]+/g, ""));
								subtotal.html(log(addCommas(sub_price)) + ' đ');
							},
							error: function(response) {
								alert(response);
							}
						});
					});

					// Remove line item
					$(this.options.item_remove).click(function(e) {
						e.preventDefault();
						$(this).closest(item).find(item_qty).val(0);
						$(this).closest(item).find(item_qty).trigger('change');
					});
				}
			};
			$.fn.hrvAJAXCart = function(options) {
				return this.each(function() {
					if (!$.data(this, "plugin_" + pluginName)) {
						$.data(this, "plugin_" + pluginName, new Plugin(this, options));
					}
				});
			};
		})(jQuery, window, document);
		$(document).ready(function() {
			var href = window.location.href;
			if (href.indexOf("?add=") != -1) {
				var splitHref = href.split("?add=")[1];
				var variantId = parseInt($.trim(splitHref.split("&ref=")[0]));
				$.ajax({
					url: "/cart/" + variantId + ":1",
					success: function(data) {
						var x = false;
						if (data.items.length > 0) {
							data.items.map(function(v, i) {
								if (v.variant_id == variantId) {
									x = true;
								}
							});
						}
						if (!x) {
							alert('Sản phẩm bạn vừa mua đã hết hàng');
						}
						window.location = '/cart';
					},
					error: function(XMLHttpRequest, textStatus) {
						Haravan.onError(XMLHttpRequest, textStatus);
					}
				});
			}
		});
	</script>
	<script>
		
		$('.qty-click .qtyplus').on('click', function(e) {
			e.preventDefault();
			var input = $(this).parent('.product-quantity').find('input');
			var currentVal = parseInt(input.val());
			if (!isNaN(currentVal)) {
				input.val(currentVal + 1);
			} else {
				input.val(1);
			}
			cartItem_id=$(this).closest('.line-item_quantity').attr('data_item_id');

			Update_price_change(cartItem_id,currentVal + 1);
			update_total_item();
			// Cập nhật tổng giỏ hàng
			let total = calculateTotalCart();
        	$(".order-total span").text( total);
		});
		$(".qty-click .qtyminus").on('click', function(e) {
			e.preventDefault();
			var input = $(this).parent('.product-quantity').find('input');
			var currentVal = parseInt(input.val());
			if (!isNaN(currentVal) && currentVal > 1) {
				input.val(currentVal - 1);
			} else {
				input.val(1);
			}
			cartItem_id=$(this).closest('.line-item_quantity').attr('data_item_id');
			Update_price_change(cartItem_id,currentVal - 1);
			update_total_item();
			// Cập nhật tổng giỏ hàng
			let total = calculateTotalCart();
        	$(".order-total").text("Tổng cộng: " + total);
			
		});
		function calculateTotalCart() {
			const totalCart = $(".line-item-container").toArray().reduce((sum, item) => {
				let total = parseInt($(item).find(".line-item-total").text().replace(/[^0-9]/g, "")) || 0;
				return sum + total;
			}, 0);
			return new Intl.NumberFormat("vi-VN").format(totalCart) + "₫";
		}
		function update_total_item() {
			$(".line-item-container").each(function() {
				// Lấy giá từ .price strong
				let priceText = $(this).find(".line-item_price .price strong").text();
				let price = parseInt(priceText.replace(/[^0-9]/g, "")) || 0; // Loại bỏ ký tự không phải số, mặc định 0 nếu lỗi

				// Lấy số lượng từ .item-quantity
				let quantity = parseInt($(this).find(".item-quantity").val()) || 1; // Lấy giá trị input, mặc định 1 nếu lỗi

				// Tính tổng giá
				let totalPrice = price * quantity;

				// Cập nhật .line-item-total
				$(this)
					.find(".line-item_price-total .line-item-total")
					.text(new Intl.NumberFormat("vi-VN").format(totalPrice) + "₫"); // Định dạng và thêm ₫
			});
		}
		let total = calculateTotalCart();
		$(".order-total span").text( total);
		function Update_price_change(id,quantity) {
			var _token = $('meta[name="csrf-token"]').attr("content");
			var params = {
				type: 'POST',
				url: '/ajax/cart/updateCart',
				data: {
					cartItem_id: id,
                    quantity: quantity,
                    _token: _token,
				},
				async: false,
				dataType: 'json',
				success: function(data) {
					// $.each(data.items, function(i, v) {
					// 	$('.table-cart .line-item:eq(' + i + ') .line-item-total').html(Haravan.formatMoney(v.line_price, "₫"));
					// });
					// $('.wrap-order-summary .order-total span').html(Haravan.formatMoney(data.total_price, "₫"));
					// $('.title-count-cart').html('Bạn đang có' + ' <span class="font-weight-bold">' + data.item_count + ' sản phẩm </span>' + 'trong giỏ hàng');
=======
</div>
<script>
function log(args) {
	var str = "";
	for (var i = 0; i < arguments.length; i++) {
		if (typeof arguments[i] === "object") {
			str += JSON.stringify(arguments[i]);
		} else {
			str += arguments[i];
		}
	}
	return str;
}
function addCommas(str) {
	var parts = (str + "").split("."),
			main = parts[0],
			len = main.length,
			output = "",
			i = len - 1;

	while(i >= 0) {
		output = main.charAt(i) + output;
		if ((len - i) % 3 === 0 && i > 0) {
			output = "," + output;
		}
		--i;
	}
	// put decimal part back
	if (parts.length > 1) {
		output += "," + parts[1];
	}
	return output;
}
;(function ( $, window, document, undefined ) {
	var pluginName = 'hrvAJAXCart',
			defaults = {
				propertyName: "value"
			};
	function Plugin( element, options ) {
		this.element = element;
		this.options = $.extend( {}, defaults, options );
		this._defaults = defaults;
		this._name = 'hrvAJAXCart';
		this.init();
	}
	Plugin.prototype = {
		init: function() {
			var item = this.options.item,
					item_total = this.options.item_total,
					item_qty = this.options.item_qty,
					subtotal = $(this.options.subtotal);

			// Change line item quantity
			$(item_qty).change(function() {
				var qty = $(this).val(),
						this_item = $(this).closest(item),
						variant_id = this_item.data('variant-id'),
						this_item_total = this_item.find(item_total);
				$.ajax({
					type: 'POST',
					url: '/cart/change.js',
					dataType: 'json',
					data: {
						quantity: qty,
						id: variant_id
					},
					success: function(cart) {
						if ( qty == 0 ) {
							this_item.remove();
						} else {
							$.each(cart.items,function(index,row) {
								var price = parseFloat(row.line_price / 100).toFixed(2);
								var currency = Number(price.replace(/[^0-9\.-]+/g,""));
								if ( variant_id == row.variant_id ) this_item_total.html( log(addCommas(currency)) + ' đ' );
							});
						}
						var sub_price = parseFloat(cart.total_price / 100).toFixed(2);
						sub_price = Number(sub_price.replace(/[^0-9\.-]+/g,""));
						subtotal.html( log(addCommas(sub_price)) + ' đ' );
					},
					error: function(response) {
						alert(response);
					}
				});
			});

			// Remove line item
			$(this.options.item_remove).click(function(e) {
				e.preventDefault();
				$(this).closest(item).find(item_qty).val(0);
				$(this).closest(item).find(item_qty).trigger('change');
			});
		}
	};
	$.fn.hrvAJAXCart = function ( options ) {
		return this.each(function () {
			if (!$.data(this, "plugin_" + pluginName)) {
				$.data(this, "plugin_" + pluginName, new Plugin( this, options ));
			}
		});
	};
})( jQuery, window, document );
	$(document).ready(function(){
		var href = window.location.href;
		if (href.indexOf("?add=") != -1){
			var splitHref = href.split("?add=")[1];
			var variantId = parseInt($.trim(splitHref.split("&ref=")[0]));  
			$.ajax({          
				url: "/cart/" + variantId + ":1",
				success: function(data){
					var x = false;
					if(data.items.length > 0){
						data.items.map(function(v,i){
							if(v.variant_id == variantId){
								x = true;
							}
						});            
					}    
					if(!x){
						alert('Sản phẩm bạn vừa mua đã hết hàng');
					}
					window.location = '/cart';
>>>>>>> a49165e89efd4cc07df4e43f35084b1750916191
				},
				error: function(XMLHttpRequest, textStatus) {
					Haravan.onError(XMLHttpRequest, textStatus);
				}
<<<<<<< HEAD
			};
			jQuery.ajax(params);
		}
	</script>
</main>
@endsection
=======
			});
		}
	});
</script>
<script>
$(document).ready(function(){
	$('.checkout-btn').click(function(e){
		e.preventDefault();
		$('button[name="checkout"]').trigger('click');
	})
});
$('.qty-click .qtyplus').on('click',function(e){
	e.preventDefault();
	var input = $(this).parent('.product-quantity').find('input');
	var currentVal = parseInt(input.val());
	if (!isNaN(currentVal)) {
		input.val(currentVal + 1);
	} else {
		input.val(1);
	}
	Update_price_change();
});
$(".qty-click .qtyminus").on('click',function(e) {
	e.preventDefault();
	var input = $(this).parent('.product-quantity').find('input');
	var currentVal = parseInt(input.val());
	if (!isNaN(currentVal) && currentVal > 1) {
		input.val(currentVal - 1);
	} else {
		input.val(1);
	}
	Update_price_change();
});
function Update_price_change(){
	var params = {
		type: 'POST',
		url: '/cart/update.js',
		data: $('#cartformpage').serialize(),
		async: false,
		dataType: 'json',
		success: function(data) { 
			$.each(data.items,function(i,v){
				$('.table-cart .line-item:eq('+i+') .line-item-total').html(Haravan.formatMoney(v.line_price, "₫"));
			});
			$('.wrap-order-summary .order-total span').html(Haravan.formatMoney(data.total_price, "₫"));
			$('.title-count-cart').html('Bạn đang có' + ' <span class="font-weight-bold">' + data.item_count + ' sản phẩm </span>' + 'trong giỏ hàng');
		},
		error: function(XMLHttpRequest, textStatus) {
			Haravan.onError(XMLHttpRequest, textStatus);
		}
	};
	jQuery.ajax(params);
}
</script>
        </main>
@endsection
>>>>>>> a49165e89efd4cc07df4e43f35084b1750916191
