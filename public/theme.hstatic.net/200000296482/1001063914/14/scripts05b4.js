
var timeOut_modalCart,
    viewout = !0,
    check_show_modal = !0,
    add_item_show_modalCart = function (product_id, quantity, price) {
        check_show_modal &&
            ((check_show_modal = !1),
            (timeOut_modalCart = setTimeout(function () {
                check_show_modal = !0;
            }, 1e3)),
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
            }),
            $.ajax({
                type: "POST",
                url: "/ajax/cart/addToCart",
                async: !0,
                data: {
                    product_id: product_id,
                    // product_variant_id: product_variant_id,
                    quantity: quantity,
                    price: price,
                    // attribute_id: attribute_id,
                    // _token: _token,
                },
                dataType: "json",
                success: function (t) {
                    getCartModal(t);
					// Hiển thị giỏ hàng và cuộn lên đầu trang nếu cần
					if ($("#site-header .header-bottom").hasClass("hSticky")) {
						setTimeout(function () {
							$(".wrap-cart").addClass("show-action");
							$("#site-header .header-bottom").addClass(
								"hSticky hSticky-down hSticky-up"
							);
						}, 300);
					} else {
						$(".wrap-cart").addClass("show-action");
						$("html, body").animate({ scrollTop: 0 }, 600);
					}
                },
                error: function(xhr, status, error) {  // Sử dụng các tham số chuẩn của jQuery AJAX error
					// Log toàn bộ response để debug
					if (xhr.responseJSON && xhr.responseJSON.message) {
						console.log("Error message:", xhr.responseJSON.message);
						alert(xhr.responseJSON.message);
					} else {
						console.log("Error status:", status);
						alert("Sản phẩm bạn vừa mua đã vượt quá tồn kho");
					}
				}
            }));
    },
    plusQuantity = function () {
        if (void 0 != $('input[name="quantity"]').val()) {
            var t = parseInt($('input[name="quantity"]').val());
            isNaN(t)
                ? $('input[name="quantity"]').val(1)
                : $('input[name="quantity"]').val(t + 1);
        }
    },
    minusQuantity = function () {
        if (void 0 != $('input[name="quantity"]').val()) {
            var t = parseInt($('input[name="quantity"]').val());
            !isNaN(t) && t > 1 && $('input[name="quantity"]').val(t - 1);
        }
    };

function getCartModal() {
    $.getJSON("/ajax/cart/getOrderByCartId", function (response) {
        if (response && response.cartItem && response.cartItem.length > 0) {
            const items = response.cartItem; // Mảng chứa các sản phẩm trong giỏ hàng
            const itemCount = items.length;

            // Cập nhật số lượng sản phẩm trong giỏ hàng
            $(".count-holder .count").html(itemCount);

            // Kiểm tra nếu giỏ hàng rỗng
            if (itemCount === 0) {
                $("#cart-view").html(`
						<div class="mini-cart_empty-state">
							<svg width="65" height="65" viewBox="0 0 81 70">
								<g transform="translate(0 2)" stroke-width="4" stroke="#333333" fill="none" fill-rule="evenodd">
									<circle stroke-linecap="square" cx="34" cy="60" r="6"></circle>
									<circle stroke-linecap="square" cx="67" cy="60" r="6"></circle>
									<path d="M22.936 15h54.807l-4.339 30H30.339L19.668 0H.996"></path>
								</g>
							</svg>
							<p class="m-0">Hiện chưa có sản phẩm</p>
						</div>
					`);
            } else {
                $("#cart-view").html(""); // Xóa nội dung cũ

                // Hiển thị từng sản phẩm trong giỏ hàng
                $.each(items, function (index, item) {
                    clone_item(item, index);
                });

                // Cập nhật tổng giá trị giỏ hàng
                const totalPrice = items.reduce(
                    (total, item) => total + item.price * item.quantity,
                    0
                );
                $("#total-view-cart").html(
<<<<<<< HEAD
            
					Number(totalPrice).toLocaleString('vi-VN') + '₫'
=======
                    totalPrice
>>>>>>> a49165e89efd4cc07df4e43f35084b1750916191
                    // Haravan.formatMoney(totalPrice, formatMoney)
                );
                $(".cart-subtotal").html(
                    totalPrice
                    // Haravan.formatMoney(totalPrice, formatMoney)
                );
            }
        } else {
            $("#cart-view").html(`
					<div class="mini-cart_empty-state">
						<svg width="65" height="65" viewBox="0 0 81 70">
							<g transform="translate(0 2)" stroke-width="4" stroke="#333333" fill="none" fill-rule="evenodd">
								<circle stroke-linecap="square" cx="34" cy="60" r="6"></circle>
								<circle stroke-linecap="square" cx="67" cy="60" r="6"></circle>
								<path d="M22.936 15h54.807l-4.339 30H30.339L19.668 0H.996"></path>
							</g>
						</svg>
						<p class="m-0">Hiện chưa có sản phẩm</p>
					</div>
				`);
        }
    });

    
}
getCartModal();
function clone_item(item, index) {
    console.log(item.products?.image); // Debug giá trị image

    // Clone template từ #clone-item-cart
    const $template = $("#clone-item-cart").find(".list-item").clone();

    // Lấy thông tin sản phẩm với giá trị mặc định
    const product = item.products || {};
    const image =
        product.image ||
        "/theme.hstatic.net/1000406564/1000622245/14/no_image.jpg?v=1";
    const name = product.name || "Sản phẩm không có tiêu đề";
    const price = Number(item.price) || Number(product.price) || 0; // Chuyển thành số, mặc định 0 nếu không hợp lệ

    // Cập nhật hình ảnh
    $template.find("img").attr({
        src: product.image,
        alt: name,
    });

    // Cập nhật link sản phẩm
    $template.find("a:not(.remove-cart)").attr({
        href: item.url || "#",
        title: name,
    });

    // Cập nhật tiêu đề, số lượng, giá
    $template.find(".pro-title-view").html(name);
    $template.find(".pro-quantity-view").html(item.quantity || 1);
<<<<<<< HEAD
	$template.find(".pro-price-view").html(
		Number(item.products.del).toLocaleString('vi-VN') + 'đ'
	);

    // Cập nhật nút xóa
    $template.find(".remove-cart").html(`
        <a href="javascript:void(0);" onclick="deleteCart(${item.id})">
=======
    $template.find(".pro-price-view").html(1000000);

    // Cập nhật nút xóa
    $template.find(".remove-cart").html(`
        <a href="javascript:void(0);" onclick="deleteCart(${index + 1})">
>>>>>>> a49165e89efd4cc07df4e43f35084b1750916191
            <i class="fa fa-times"></i>
        </a>
    `);

    // Xử lý variant options
    let variantText = "";
    if (
        item.variant_options &&
        item.variant_options.indexOf("Default Title") === -1
    ) {
        variantText = item.variant_options.join(" / ");
    }
    $template.find(".variant").html(variantText);

    // Hiển thị bản sao trong #cart-view
    $template.removeClass("d-none").prependTo("#cart-view");
}
function deleteCart(t) {
<<<<<<< HEAD
	
    var _token = $('meta[name="csrf-token"]').attr("content");
	let datas = {
		id_cart_item:t,
		_token: _token,
	};
    $.ajax({
        type: "DELETE",
        url: "/ajax/cart/destroyCart",
        data: datas,
=======
    $.ajax({
        type: "POST",
        url: "/cart/change.js",
        data: "quantity=0&line=" + t,
>>>>>>> a49165e89efd4cc07df4e43f35084b1750916191
        dataType: "json",
        success: function (t) {
            getCartModal();
        },
        error: function (t, e) {
            Haravan.onError(t, e);
        },
    });
}

function boxAccount(t) {
    $("#account-popover .popover-panel").addClass("invisible"),
        $("#account-popover .popover-panel").removeClass("is-selected"),
        $("#account-popover .popover-panel#" + t).removeClass("invisible");
    var e = $("#account-popover .popover-panel#" + t)
        .addClass("is-selected")
        .height();
    $(".popover-panel").hasClass("is-selected") &&
        $(".popover-panel_list").css("height", e);
}

function fixHeightProduct(t, e, i) {
    var o = 0,
        n = 0,
        s = t + " " + e,
        a = t + " " + e + " " + i;
    $(a).css("height", "auto"),
        $($(s)).css("height", "auto"),
        $($(s)).removeClass("fixheight"),
        $($(s)).each(function () {
            $(this)
                .find(i + " .lazyloaded")
                .height() > n && (n = $(this).find($(i)).height());
        }),
        n > 0 && $(a).height(n),
        $($(s)).each(function () {
            $(this).height() > o && (o = $(this).height());
        }),
        $($(s)).addClass("fixheight"),
        o > 0 && $($(s)).height(o);
    try {
        fixheightcallback();
    } catch (l) {}
}
if (
    (document.addEventListener("lazyloaded", function (t) {
        fixHeightProduct(
            ".wrapper-collection-1 .content-product-list",
            ".product-resize",
            ".image-resize"
        ),
            jQuery(window).width() > 991 &&
                $(window).resize(function () {
                    fixHeightProduct(
                        ".wrapper-collection-1 .content-product-list",
                        ".product-resize",
                        ".image-resize"
                    );
                }),
            fixHeightProduct(
                ".wrapper-list-collection .product-list-filter",
                ".product-resize",
                ".image-resize"
            ),
            jQuery(window).width() > 991 &&
                $(window).resize(function () {
                    fixHeightProduct(
                        ".wrapper-list-collection .product-list-filter",
                        ".product-resize",
                        ".image-resize"
                    );
                }),
            fixHeightProduct(
                ".wrapbox-content-page .search-list-results",
                ".product-resize",
                ".image-resize"
            ),
            jQuery(window).width() > 991 &&
                $(window).resize(function () {
                    fixHeightProduct(
                        ".wrapbox-content-page .search-list-results",
                        ".product-resize",
                        ".image-resize"
                    );
                }),
            fixHeightProduct(
                ".productDetail-related .content-product-list",
                ".product-resize",
                ".image-resize"
            ),
            jQuery(window).width() > 991 &&
                $(window).resize(function () {
                    fixHeightProduct(
                        ".productDetail-related .content-product-list",
                        ".product-resize",
                        ".image-resize"
                    );
                }),
            fixHeightProduct(
                ".productDetail-recently-viewed .content-product-list",
                ".product-resize",
                ".image-resize"
            ),
            jQuery(window).width() > 991 &&
                $(window).resize(function () {
                    fixHeightProduct(
                        ".productDetail-recently-viewed .content-product-list",
                        ".product-resize",
                        ".image-resize"
                    );
                });
    }),
    $(document).ready(function () {
        if (template.indexOf("index") > -1) {
            var t =
                    '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"viewBox="0 0 407.436 407.436" style="enable-background:new 0 0 407.436 407.436;" xml:space="preserve"><polygon points="315.869,21.178 294.621,0 91.566,203.718 294.621,407.436 315.869,386.258 133.924,203.718 "/></svg>',
                e =
                    '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 407.436 407.436" style="enable-background:new 0 0 407.436 407.436;" xml:space="preserve"><polygon points="112.814,0 91.566,21.178 273.512,203.718 91.566,386.258 112.814,407.436 315.869,203.718 " /></svg>';
            $("#home-slider").owlCarousel({
                items: 1,
                nav: !0,
                navText: [t, e],
                dots: !0,
                lazyLoad: !0,
                touchDrag: !0,
                mouseDrag: !0,
                animateOut: "fadeOut",
                smartSpeed: 250,
                loop: $("#home-slider .wrapper-item").length > 1,
                responsive: {
                    0: {
                        items: 1,
                        nav: !1,
                        autoplay: !1,
                    },
                    768: {
                        items: 1,
                        nav: !1,
                        autoplay: !1,
                    },
                    992: {
                        items: 1,
                        nav: !0,
                        autoplay: !0,
                        autoplayTimeout: 5e3,
                        autoplaySpeed: 400,
                        autoplayHoverPause: !0,
                    },
                },
                onChanged: function (t) {
                    setTimeout(function () {
                        $("#home-slider")
                            .find(".owl-dot")
                            .each(function (t) {
                                $(this).attr("aria-label", t + 1);
                            });
                    }, 400);
                },
            }),
                $("#collection-two-slide").length > 0 &&
                    $("#collection-two-slide").owlCarousel({
                        nav: !1,
                        dots: !1,
                        loop: !1,
                        smartSpeed: 1e3,
                        responsive: {
                            0: {
                                items: 1,
                                nav: !0,
                            },
                            768: {
                                items: 2,
                                nav: !0,
                            },
                            992: {
                                items: 4,
                                nav: !1,
                            },
                            1200: {
                                items: 4,
                                nav: !1,
                            },
                        },
                    });
        }
        if (
            ($("#collection-three-slide").length > 0 &&
                $("#collection-three-slide").owlCarousel({
                    nav: !1,
                    dots: !1,
                    loop: !1,
                    smartSpeed: 1e3,
                    responsive: {
                        0: {
                            items: 1,
                            nav: !0,
                        },
                        768: {
                            items: 2,
                            nav: !0,
                        },
                        992: {
                            items: 4,
                            nav: !1,
                        },
                        1200: {
                            items: 4,
                            nav: !1,
                        },
                    },
                }),
            $(".slider-banner-testimonials").length > 0 &&
                $(".slider-banner-testimonials").owlCarousel({
                    nav: !0,
                    navText: [t, e],
                    dots: !0,
                    pagination: !1,
                    autoplayTimeout: 5e3,
                    autoplayHoverPause: !0,
                    slideSpeed: 1e3,
                    smartSpeed: 1e3,
                    addClassActive: !0,
                    scrollPerPage: !1,
                    touchDrag: !0,
                    mouseDrag: !0,
                    autoplay: !0,
                    loop:
                        $(".slider-banner-testimonials .banner-testimonials")
                            .length > 1,
                    responsive: {
                        0: {
                            items: 1,
                            margin: 15,
                        },
                        768: {
                            items: 1,
                            margin: 15,
                        },
                        992: {
                            items: 1,
                            margin: 15,
                        },
                    },
                    onChanged: function (t) {
                        setTimeout(function () {
                            $(".slider-banner-testimonials")
                                .find(".owl-dot")
                                .each(function (t) {
                                    $(this).attr("aria-label", t + 1);
                                });
                        }, 400);
                    },
                }),
            $(".home-blog").length > 0 &&
                $(window).width() > 480 &&
                $(".home-blog .home-blog-wrap").slick({
                    dots: !0,
                    arrows: !1,
                    infinite: !1,
                    speed: 300,
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    responsive: [
                        {
                            breakpoint: 768,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 2,
                            },
                        },
                        {
                            breakpoint: 480,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 2,
                            },
                        },
                    ],
                }),
            768 > $(window).width() &&
                $(document).on(
                    "click",
                    ".main-footer .js-footer-block-title",
                    function () {
                        $(this)
                            .toggleClass("active")
                            .parent()
                            .find(".footer-block_content")
                            .stop()
                            .slideToggle("medium");
                    }
                ),
            template.indexOf("product") > -1 &&
                ($("#owlProductRelated").length > 0 &&
                    $("#owlProductRelated").owlCarousel({
                        items: 5,
                        nav: !0,
                        dots: !1,
                        pagination: !1,
                        slideSpeed: 1e3,
                        smartSpeed: 1e3,
                        addClassActive: !0,
                        scrollPerPage: !1,
                        touchDrag: !0,
                        autoplay: !1,
                        loop: !1,
                        responsive: {
                            0: {
                                items: 2,
                                stagePadding: 15,
                                margin: 15,
                            },
                            768: {
                                items: 4,
                                margin: 15,
                            },
                            992: {
                                items: 5,
                                margin: 15,
                            },
                            1200: {
                                items: 5,
                                margin: 15,
                            },
                        },
                    }),
                $(".js-backto-page-history").click(function () {
                    window.history.back();
                }),
                $(".product-tabs").length > 0))
        ) {
            var i,
                o = $(".tab-content-item.active .panel-toggle-wrap");
            if (
                (o.outerHeight() > 300 &&
                    (o.addClass("applied-height"),
                    o.find(".content-outer").css({
                        "max-height": "300px",
                        overflow: "hidden",
                    }),
                    o.append(
                        "<div class=content-toolbar><div class=content-toggle><span>Xem th\xeam</span></div></div>"
                    )),
                $(".content-toggle").on("click", function () {
                    o.toggleClass("content-outer-open"),
                        o.hasClass("content-outer-open")
                            ? $(this).find("span").text("R\xfat gọn")
                            : $(this).find("span").text("Xem th\xeam");
                }),
                768 > $(window).width())
            ) {
                $(".show-tab-dropdown_mobile").click(function (t) {
                    t.preventDefault(), $(this).toggleClass("active");
                });
                let n = $(".tab-title.active").text();
                $(".show-tab-dropdown_mobile").html(n),
                    $(".tab-title").click(function (t) {
                        t.preventDefault(),
                            $(this)
                                .parents(".product-description")
                                .find(".show-tab-dropdown_mobile")
                                .html($(this).text()),
                            $(".show-tab-dropdown_mobile").removeClass(
                                "active"
                            );
                    });
            }
        }
        template.indexOf("collection") > -1 &&
            (991 > $(window).width() &&
                $(".filter-group-subtitle").on("click", function () {
                    $(this).toggleClass("group-layered"),
                        $(this)
                            .parent()
                            .find(".filter-group-content")
                            .slideToggle("medium"),
                        $(this)
                            .find("span.icon-control")
                            .toggleClass("activeFilter");
                }),
            $(window).width() > 991 &&
                $(document).ready(function () {
                    var t = 0,
                        e = 0,
                        i = 0,
                        o = 0,
                        n = 0,
                        s = 0,
                        a = 0;
                    $(".filter-group-subtitle.tr01").on("click", function () {
                        1 == ++t
                            ? ($(this)
                                  .parent()
                                  .find(".filter-group-content")
                                  .css({
                                      visibility: "visible",
                                      opacity: "1",
                                      transform: "translateY(10px)",
                                      position: "relative",
                                  }),
                              $(this)
                                  .find("span.icon-control")
                                  .toggleClass("activeFilter"),
                              $("#icon-plus-1").hide(),
                              $("#icon-minus-1").show())
                            : 2 === t &&
                              ($(this)
                                  .parent()
                                  .find(".filter-group-content")
                                  .css({
                                      visibility: "hidden",
                                      opacity: "0",
                                      transform: "translateY(0)",
                                      position: "absolute",
                                  }),
                              $(this)
                                  .find("span.icon-control")
                                  .toggleClass("activeFilter"),
                              $("#icon-plus-1").show(),
                              $("#icon-minus-1").hide(),
                              (t = 0));
                    }),
                        $(".filter-group-subtitle.tr02").on(
                            "click",
                            function () {
                                1 == ++e
                                    ? ($(this)
                                          .parent()
                                          .find(".filter-group-content")
                                          .css({
                                              visibility: "visible",
                                              opacity: "1",
                                              transform: "translateY(10px)",
                                              position: "relative",
                                          }),
                                      $(this)
                                          .find("span.icon-control")
                                          .toggleClass("activeFilter"),
                                      $("#icon-plus-2").hide(),
                                      $("#icon-minus-2").show())
                                    : 2 === e &&
                                      ($(this)
                                          .parent()
                                          .find(".filter-group-content")
                                          .css({
                                              visibility: "hidden",
                                              opacity: "0",
                                              transform: "translateY(0)",
                                              position: "absolute",
                                          }),
                                      $(this)
                                          .find("span.icon-control")
                                          .toggleClass("activeFilter"),
                                      $("#icon-plus-2").show(),
                                      $("#icon-minus-2").hide(),
                                      (e = 0));
                            }
                        ),
                        $(".filter-group-subtitle.tr03").on(
                            "click",
                            function () {
                                1 == ++i
                                    ? ($(this)
                                          .parent()
                                          .find(".filter-group-content")
                                          .css({
                                              visibility: "visible",
                                              opacity: "1",
                                              transform: "translateY(10px)",
                                              position: "relative",
                                          }),
                                      $(this)
                                          .find("span.icon-control")
                                          .toggleClass("activeFilter"),
                                      $("#icon-plus-3").hide(),
                                      $("#icon-minus-3").show())
                                    : 2 === i &&
                                      ($(this)
                                          .parent()
                                          .find(".filter-group-content")
                                          .css({
                                              visibility: "hidden",
                                              opacity: "0",
                                              transform: "translateY(0)",
                                              position: "absolute",
                                          }),
                                      $(this)
                                          .find("span.icon-control")
                                          .toggleClass("activeFilter"),
                                      $("#icon-plus-3").show(),
                                      $("#icon-minus-3").hide(),
                                      (i = 0));
                            }
                        ),
                        $(".filter-group-subtitle.tr04").on(
                            "click",
                            function () {
                                1 == ++o
                                    ? ($(this)
                                          .parent()
                                          .find(".filter-group-content")
                                          .css({
                                              visibility: "visible",
                                              opacity: "1",
                                              transform: "translateY(10px)",
                                              position: "relative",
                                          }),
                                      $(this)
                                          .find("span.icon-control")
                                          .toggleClass("activeFilter"),
                                      $("#icon-plus-4").hide(),
                                      $("#icon-minus-4").show())
                                    : 2 === o &&
                                      ($(this)
                                          .parent()
                                          .find(".filter-group-content")
                                          .css({
                                              visibility: "hidden",
                                              opacity: "0",
                                              transform: "translateY(0)",
                                              position: "absolute",
                                          }),
                                      $(this)
                                          .find("span.icon-control")
                                          .toggleClass("activeFilter"),
                                      $("#icon-plus-4").show(),
                                      $("#icon-minus-4").hide(),
                                      (o = 0));
                            }
                        ),
                        $(".filter-group-subtitle.tr05").on(
                            "click",
                            function () {
                                1 == ++n
                                    ? ($(this)
                                          .parent()
                                          .find(".filter-group-content")
                                          .css({
                                              visibility: "visible",
                                              opacity: "1",
                                              transform: "translateY(10px)",
                                              position: "relative",
                                          }),
                                      $(this)
                                          .find("span.icon-control")
                                          .toggleClass("activeFilter"),
                                      $("#icon-plus-5").hide(),
                                      $("#icon-minus-5").show())
                                    : 2 === n &&
                                      ($(this)
                                          .parent()
                                          .find(".filter-group-content")
                                          .css({
                                              visibility: "hidden",
                                              opacity: "0",
                                              transform: "translateY(0)",
                                              position: "absolute",
                                          }),
                                      $(this)
                                          .find("span.icon-control")
                                          .toggleClass("activeFilter"),
                                      $("#icon-plus-5").show(),
                                      $("#icon-minus-5").hide(),
                                      (n = 0));
                            }
                        ),
                        $(".filter-group-subtitle.tr06").on(
                            "click",
                            function () {
                                1 == ++s
                                    ? ($(this)
                                          .parent()
                                          .find(".filter-group-content")
                                          .css({
                                              visibility: "visible",
                                              opacity: "1",
                                              transform: "translateY(10px)",
                                              position: "relative",
                                          }),
                                      $(this)
                                          .find("span.icon-control")
                                          .toggleClass("activeFilter"),
                                      $("#icon-plus-6").hide(),
                                      $("#icon-minus-6").show())
                                    : 2 === s &&
                                      ($(this)
                                          .parent()
                                          .find(".filter-group-content")
                                          .css({
                                              visibility: "hidden",
                                              opacity: "0",
                                              transform: "translateY(0)",
                                              position: "absolute",
                                          }),
                                      $(this)
                                          .find("span.icon-control")
                                          .toggleClass("activeFilter"),
                                      $("#icon-plus-6").show(),
                                      $("#icon-minus-6").hide(),
                                      (s = 0));
                            }
                        ),
                        $(".filter-group-subtitle.tr07").on(
                            "click",
                            function () {
                                1 == ++a
                                    ? ($(this)
                                          .parent()
                                          .find(".filter-group-content")
                                          .css({
                                              visibility: "visible",
                                              opacity: "1",
                                              transform: "translateY(10px)",
                                              position: "relative",
                                          }),
                                      $(this)
                                          .find("span.icon-control")
                                          .toggleClass("activeFilter"),
                                      $("#icon-plus-7").hide(),
                                      $("#icon-minus-7").show())
                                    : 2 === a &&
                                      ($(this)
                                          .parent()
                                          .find(".filter-group-content")
                                          .css({
                                              visibility: "hidden",
                                              opacity: "0",
                                              transform: "translateY(0)",
                                              position: "absolute",
                                          }),
                                      $(this)
                                          .find("span.icon-control")
                                          .toggleClass("activeFilter"),
                                      $("#icon-plus-7").show(),
                                      $("#icon-minus-7").hide(),
                                      (a = 0));
                            }
                        );
                }),
            $(".js-collection-options-filter").click(function (t) {
                992 > $(window).width()
                    ? $("body").addClass("open-filter")
                    : $(".js-sortby-title").removeClass("open-sort"),
                    $("body").removeClass("open-sort");
            }),
            $(document).on(
                "click",
                "body.open-filter .site-overlay, .filter-close .back-icon",
                function () {
                    $("body").removeClass("open-filter");
                }
            ),
            $(document).on(
                "click",
                "body.open-sort .site-overlay, .collection-sortby-close_mb .back-icon_sortby",
                function () {}
            ),
            $(document).mouseup(function (t) {
                var e = $(".collection-options-sortby.filter-trai");
                e.is(t.target) ||
                    0 !== e.has(t.target).length ||
                    ($("body").removeClass("open-sort"),
                    $(".collection-sortby").removeClass("open-sort"));
                var i = $(".collection-options-sortby.sort-trai");
                i.is(t.target) ||
                    0 !== i.has(t.target).length ||
                    ($("body").removeClass("open-sort1"),
                    $(".collection-sortby").removeClass("open-sort1"));
            }),
            jQuery("body").on("click", ".js-sortby-title", function () {
                992 > $(window).width()
                    ? $("body").addClass("open-sort")
                    : $(this).parent().toggleClass("open-sort");
            }),
            jQuery("body").on("click", ".js-sortby-title01", function () {
                $(this).parent().toggleClass("open-sort1");
            })),
            $(".sub-child li a").click(function (t) {
                if ($(this).find("i").length) {
                    t.preventDefault();
                    var e = $(this).parent().data("menu-root");
                    $(".sub-child").addClass("mm-subopened"),
                        $("#" + e).addClass("mm-opened");
                }
            }),
            $(".menuList-sub li:first-child a").click(function () {
                $(this).parents(".menuList-sub").removeClass("mm-opened"),
                    $(".menuList-sub").removeClass("mm-subopened");
            }),
            $(".menuList-sub li.level-2 a").click(function (t) {
                if ($(this).find("i").length) {
                    t.preventDefault();
                    var e = $(this).parent().data("menu-root");
                    $("li.level-2").addClass("mm-subopened"),
                        $("#" + e).addClass("mm-sub");
                }
            }),
            $(".menuList-sub li:first-child a").click(function () {
                $(this).parents(".menuList-sub").removeClass("mm-sub"),
                    $(".menuList-sub").removeClass("mm-subopened");
            }),
            $(document).on("click", ".menuList-sub li.level-3 a", function (t) {
                if ($(this).find("i").length) {
                    t.preventDefault();
                    var e = $(this).parent().data("menu-root");
                    $("li.level-3").addClass("mm-open-3"),
                        $("#" + e).addClass("mm-sub-3");
                }
            }),
            $(document).on(
                "click",
                ".menuList-sub li:first-child a",
                function (t) {
                    $(this).parents(".menuList-sub").removeClass("mm-sub-3"),
                        $(".menuList-sub").removeClass("mm-open-3");
                }
            );
        var s = !1,
            a = $(window).prop("innerWidth"),
            l = $(".main-header").outerHeight(),
            r = $(".header-bottom");
        if (567 > $(window).width()) var c = r.outerHeight() + 25;
        else var c = r.outerHeight() + 37;
        var d = 0;
        $(".main-header").css("min-height", l),
            $(window).on("resize", function () {
                s && clearTimeout(s),
                    (s = setTimeout(function () {
                        var t = $(window).prop("innerWidth");
                        a != t &&
                            (r
                                .removeClass("hSticky-up")
                                .removeClass("hSticky-down")
                                .removeClass("hSticky"),
                            $(".main-header").css("min-height", ""),
                            (l = $(".main-header").outerHeight()),
                            $(".main-header").css("min-height", l),
                            (a = t));
                    }, 200));
            }),
            setTimeout(function () {
                r
                    .removeClass("hSticky-up")
                    .removeClass("hSticky-down")
                    .removeClass("hSticky"),
                    $(".main-header").css("min-height", ""),
                    (l = $(".main-header").outerHeight()),
                    $(".main-header").css("min-height", l),
                    jQuery(window).scroll(function () {
                        jQuery(window).scrollTop() > c &&
                        jQuery(window).scrollTop() > d
                            ? (jQuery(window).width() > 991 &&
                                  ($("body").removeClass("locked-scroll"),
                                  $(".header-action").removeClass(
                                      "show-action"
                                  )),
                              r.addClass("hSticky"),
                              jQuery(window).scrollTop() > c &&
                                  (r
                                      .addClass("hSticky-up")
                                      .addClass("hSticky-down"),
                                  $(
                                      ".f-nav .f-nav-one > li.onMega .f-nav-two"
                                  ).addClass("hide")))
                            : jQuery(window).scrollTop() > c &&
                              (r.addClass("hSticky-up"),
                              $(
                                  ".f-nav .f-nav-one > li.onMega .f-nav-two"
                              ).removeClass("hide")),
                            jQuery(window).scrollTop() <= d &&
                                jQuery(window).scrollTop() <= c &&
                                (r
                                    .removeClass("hSticky-up")
                                    .removeClass("hSticky-down")
                                    .removeClass("hSticky"),
                                $(
                                    ".f-nav .f-nav-one > li.onMega .f-nav-two"
                                ).removeClass("hide")),
                            (d = jQuery(window).scrollTop());
                    });
            }, 300);
    }),
    $(".header-action-toggle-menu").click(function (t) {
        $(".navigation-header").toggleClass("hide"),
            t.preventDefault(),
            $(this).parents(".header-action").hasClass("show-action")
                ? ($("body").removeClass("locked-scroll"),
                  $(this).parents(".header-action").removeClass("show-action"),
                  $("html").removeClass("no-scroll"),
                  $(".overlay123").removeClass("active-overlay123"))
                : ($(".header-action").removeClass("show-action"),
                  $(this).parents(".header-action").addClass("show-action"),
                  $("html").addClass("no-scroll"),
                  $(".overlay123").addClass("active-overlay123"));
    }),
    $(".header-action-toggle").click(function (t) {
        t.preventDefault(),
            $(this).parents(".header-action").hasClass("show-action")
                ? ($("body").removeClass("locked-scroll"),
                  $(this).parents(".header-action").removeClass("show-action"),
                  $("html").removeClass("no-scroll"),
                  $(".overlay123").removeClass("active-overlay123"))
                : ($(".header-action").removeClass("show-action"),
                  $(this).parents(".header-action").addClass("show-action"),
                  $("html").addClass("no-scroll"),
                  $(".overlay123").addClass("active-overlay123"));
    }),
    $("body").on("click", "#site-overlay", function (t) {
        $("body").removeClass("locked-scroll"),
            $(".header-action").removeClass("show-action");
    }),
    $("body").on("click", ".link-accented", function (t) {
        t.preventDefault(), boxAccount($(this).attr("aria-controls"));
    }),
    $("#account-popover .form-group input").blur(function () {
        "" == $(this).val()
            ? $(this).removeClass("is-filled")
            : $(this).addClass("is-filled");
    }),
    $(".addThis_listSharing").length > 0 &&
        ($(window).scroll(function () {
            $(window).scrollTop() > 100
                ? $(".addThis_listSharing").addClass("is-show")
                : $(".addThis_listSharing").removeClass("is-show");
        }),
        $(".body-popupform form.contact-form").submit(function (t) {
            var e = $(this);
            !0 == $(this)[0].checkValidity() &&
                (t.preventDefault(),
                grecaptcha.ready(function () {
                    grecaptcha
                        .execute("6LdD18MUAAAAAHqKl3Avv8W-tREL6LangePxQLM-", {
                            action: "submit",
                        })
                        .then(function (t) {
                            e.find('input[name="g-recaptcha-response"]').val(t),
                                $.ajax({
                                    type: "POST",
                                    url: "/contact",
                                    data: $(
                                        ".body-popupform form.contact-form"
                                    ).serialize(),
                                    success: function (t) {
                                        $(".modal-contactform.fade.show").modal(
                                            "hide"
                                        ),
                                            setTimeout(function () {
                                                $(".modal-succesform").modal(
                                                    "show"
                                                ),
                                                    setTimeout(function () {
                                                        $(
                                                            ".modal-succesform.fade.show"
                                                        ).modal("hide");
                                                    }, 5e3);
                                            }, 300);
                                    },
                                });
                        });
                }));
        }),
        $(".modal-succesform").on("hidden.bs.modal", function () {
            location.reload();
        })),
    768 > $(window).width() && $(".layoutProduct_scroll").length > 0)
) {
    var t = 0;
    $(window).scroll(function () {
        var e = $(window).scrollTop();
        e > t && e > 200
            ? $(".layoutProduct_scroll")
                  .removeClass("scroll-down")
                  .addClass("scroll-up")
            : e > 200 &&
              e + $(window).height() + 150 < $(document).height() &&
              $(".layoutProduct_scroll")
                  .removeClass("scroll-up")
                  .addClass("scroll-down"),
            e < t &&
                e < 200 &&
                $(".layoutProduct_scroll")
                    .removeClass("scroll-up")
                    .removeClass("scroll-down"),
            (t = e);
    });
}
$("#header-login-panel form#customer_login").submit(function (t) {
    var e = $(this);
    !0 == $(this)[0].checkValidity() &&
        (t.preventDefault(),
        grecaptcha.ready(function () {
            grecaptcha
                .execute("6LdD18MUAAAAAHqKl3Avv8W-tREL6LangePxQLM-", {
                    action: "submit",
                })
                .then(function (t) {
                    e.find('input[name="g-recaptcha-response"]').val(t),
                        e.unbind("submit").submit();
                });
        }));
}),
    $("#header-recover-panel form").submit(function (t) {
        var e = $(this);
        !0 == $(this)[0].checkValidity() &&
            (t.preventDefault(),
            grecaptcha.ready(function () {
                grecaptcha
                    .execute("6LdD18MUAAAAAHqKl3Avv8W-tREL6LangePxQLM-", {
                        action: "submit",
                    })
                    .then(function (t) {
                        e.find('input[name="g-recaptcha-response"]').val(t),
                            e.unbind("submit").submit();
                    });
            }));
    }),
    $(".ultimate-search").submit(function (t) {
        t.preventDefault();
        var e = $(this).find("input[name=q]").val();
        if (e.indexOf("script") > -1 || e.indexOf(">") > -1)
            alert(
                "Từ kh\xf3a của bạn c\xf3 chứa m\xe3 độc hại ! Vui l\xf2ng nhập lại key word kh\xe1c"
            ),
                $(this).find("input[name=q]").val("");
        else {
            var i = "product",
                o = encodeURIComponent(e);
            if (e) {
                window.location = "/search?type=" + i + "&q=" + o;
                return;
            }
            window.location = "/search?type=" + i + "&q=";
            return;
        }
    });
const $input = $('.ultimate-search input[type="text"]');
$input.on("keyup change paste propertychange", function () {
    let t = $(this)
            .val()
            .normalize("NFD")
            .replace(/[\u0300-\u036F]/g, ""),
        e = $(this).parents(".wpo-wrapper-search"),
        i = e.find(".smart-search-wrapper");
    if (t.indexOf("script") > -1 || t.indexOf(">") > -1) {
        alert(
            "Từ kh\xf3a của bạn c\xf3 chứa m\xe3 độc hại ! Vui l\xf2ng nhập lại key word kh\xe1c"
        ),
            $(this).val("");
        return;
    }
    t.length > 0
        ? ($(this).attr("data-history", t),
          (str =
              "/search?type=product&q=" +
              (key2 = t) +
              "&view=ultimate-product"),
          $.ajax({
              url: str,
              type: "GET",
              async: !0,
              success: function (t) {
                  i.find(".resultsContent").html(t),
                      console.log("Gi\xe1 trị key:", key2);
              },
              error: function (t, e, i) {
                  console.error("Lỗi khi tải kết quả t\xecm kiếm:", i);
              },
          }),
          $(".search-bar-mobile .ultimate-search").addClass("expanded"),
          i.fadeIn())
        : ($(".search-bar-mobile .ultimate-search").removeClass("expanded"),
          i.fadeOut());
}),
    $("body").click(function (t) {
        var e = t.target;
        "ajaxSearchResults" !== e.id &&
            "inputSearchAuto" !== e.id &&
            $("#ajaxSearchResults").hide(),
            "ajaxSearchResults-mb" !== e.id &&
                "inputSearchAuto-mb" !== e.id &&
                $("#ajaxSearchResults-mb").hide(),
            "ajaxSearchResults-dk" !== e.id &&
                "inputSearchAuto-dk" !== e.id &&
                $("#ajaxSearchResults-dk").hide();
    }),
    $("body").on("click", '.ultimate-search input[type="text"]', function () {
        $(this).is(":focus") &&
            "" != $(this).val() &&
            $(".ajaxSearchResults").show();
    }),
    $("body").on("click", ".ultimate-search .search-close", function (t) {
        t.preventDefault(),
            $(".ajaxSearchResults").hide(),
            $(".ultimate-search").removeClass("expanded"),
            $(".ultimate-search").find("input[name=q]").val("");
    }),
    $("body").on(
        "click",
        '.search-bar-mobile .ultimate-search input[type="text"]',
        function () {
            $(".header-action").removeClass("show-action"),
                $("body").removeClass("locked-scroll");
        }
    ),
    $(document).ready(function () {
        $(".wrap-menu").scroll(function () {
            var t = $(this).scrollLeft(),
                e = $(this)[0].scrollWidth;
            t == e - $(this).outerWidth()
                ? $(".header-bottom::after").hide()
                : $(".header-bottom::after").show();
        });
    }),
    $(document).ready(function () {
        $(".data-li[data-menu-root]").hover(
            function () {
                $(".item-lever").css("display", "block"),
                    $(".item-lever").css("top", "0"),
                    $("#mb-menu .menuList-sub li a").css(
                        "color",
                        "#d29f13!important"
                    );
            },
            function () {
                $(".item-lever").css("display", "none");
            }
        );
    }),
    $(".wrap-menu")
        .on("touchstart", function () {
            $(this).addClass("scrolling");
        })
        .on("touchmove", function () {
            $(this).addClass("scrolling");
        })
        .on("touchend", function () {
            var t = $(this);
            t.addClass("delay-remove"),
                setTimeout(function () {
                    t.removeClass("scrolling delay-remove");
                }, 1e3);
        }),
    $(".content-product-list-0")
        .on("touchstart", function () {
            $(this).addClass("scrolling");
        })
        .on("touchmove", function () {
            $(this).addClass("scrolling");
        })
        .on("touchend", function () {
            var t = $(this);
            t.addClass("delay-remove"),
                setTimeout(function () {
                    t.removeClass("scrolling delay-remove");
                }, 1e3);
        }),
    $(document).ready(function () {
        768 > $(window).width()
            ? ($(".pro-dt").remove(),
              $(".banner1-dt").remove(),
              $(".banner2-dt").remove())
            : ($(".pro-mb").remove(),
              $(".banner1-mb").remove(),
              $(".banner2-mb").remove());
    });
let mybutton = document.getElementById("btn-back-to-top");

function scrollFunction() {
    let t = window.innerHeight;
    document.body.scrollTop > t || document.documentElement.scrollTop > t
        ? (mybutton.style.display = "block")
        : (mybutton.style.display = "none");
}

function backToTop() {
    (document.body.scrollTop = 0), (document.documentElement.scrollTop = 0);
}
(window.onscroll = function () {
    scrollFunction();
}),
    $(document).ready(function () {
        $(".home-slider_3").owlCarousel({
            items: 1,
            loop: !0,
            nav: !0,
            navText: ["prev", "next"],
            autoplay: !0,
            autoplayTimeout: 1500,
            autoplayHoverPause: !0,
        });
    }),
    $(document).ready(function () {
        $(".header-action-toggle.trai").hover(function (t) {
            t.preventDefault();
            var e = $(this).parents(".header-action");
            e.hasClass("show-action")
                ? e.mouseleave(function () {
                      e.removeClass("show-action");
                  })
                : ($(".header-action").not(e).removeClass("show-action"),
                  e.addClass("show-action"));
        }),
            $(document).ready(function () {
                $(window).resize(function () {
                    $(window).width() > 991
                        ? ($("#menu-desktop-icon").show(),
                          $("#menu-mobile-icon").hide())
                        : ($("#menu-desktop-icon").hide(),
                          $("#menu-mobile-icon").show());
                }),
                    $(window).resize();
            }),
            $(document).ready(function () {
                $(".plus-btn").click(function () {
                    var t = $(this).siblings(".quantity-input"),
                        e = parseInt(t.val());
                    isNaN(e) ? t.val(1) : t.val(e + 1);
                }),
                    $(".minus-btn").click(function () {
                        var t = $(this).siblings(".quantity-input"),
                            e = parseInt(t.val());
                        !isNaN(e) && e > 1 && t.val(e - 1);
                    });
            }),
            $(document).ready(function () {
                $(".product-image .sold-out").each(function () {
                    var t = $(this)
                        .closest(".product-loop")
                        .find(".btn-collection-add-to-cart.before");
                    t.addClass("disabled"),
                        t.prop("disabled", !0),
                        t.removeClass("btn-box"),
                        t
                            .css({
                                "background-color": "#f1f1f1",
                                border: "none",
                                padding: "16.5px 20px",
                                "font-size": "11px",
                                "text-transform": "uppercase",
                                "line-height": "5px",
                                "margin-top": "6px",
                            })
                            .text("Tạm hết hàng"); // Thay đổi nội dung của button
                });
            });
        var t = $("p.countdown"),
            e = 2;
        $(document).ready(function () {
            $(".btn-collection-add-to-cart.before").click(function () {
                var t = $(this);
                t.hide(),
                    t.siblings(".form-collection-add-to-cart").show(),
                    t.siblings(".btn-collection-add-to-cart.after").show();
            }),
                $('form[action="/cart/add"]').submit(function (i) {
                    i.preventDefault();
                    var o = $(this).serialize();
                    $(this).find("#variant_id").val();
                    var n = $(this).find("#quantity").val();
                    $.post(
                        "/cart/add.js",
                        o,
                        function (t) {
                            $("#exampleModalCenter1").modal("show"),
                                $(this)
                                    .closest(".product-loop")
                                    .find(".btn-collection-add-to-cart.after")
                                    .addClass("disabled"),
                                $(".template-collection.modal-open").css(
                                    "padding-right",
                                    "0"
                                ),
                                $.getJSON("/cart.js", function (t, e) {
                                    t
                                        ? (jQuery(".count-holder .count").html(
                                              t.item_count
                                          ),
                                          0 == t.item_count
                                              ? $("#cart-view").html(
                                                    '<div class="mini-cart_empty-state"><svg width="65" height="65" viewBox="0 0 81 70"><g transform="translate(0 2)" stroke-width="4" stroke="#333333" fill="none" fill-rule="evenodd"><circle stroke-linecap="square" cx="34" cy="60" r="6"></circle><circle stroke-linecap="square" cx="67" cy="60" r="6"></circle><path d="M22.9360352 15h54.8070373l-4.3391876 30H30.3387146L19.6676025 0H.99560547"></path></g></svg><p class="m-0">Hiện chưa c\xf3 sản phẩm</p></div>'
                                                )
                                              : $("#cart-view").html(""),
                                          $.each(t.items, function (t, e) {
                                              clone_item(e, t);
                                          }),
<<<<<<< HEAD
										  $("#total-view-cart").html(
											Number(t.total_price).toLocaleString('vi-VN') + '₫'
										),
                                          $(".cart-subtotal").html(
											  Number(tota.total_pricelPrice).toLocaleString('vi-VN') + '₫'
=======
                                          $("#total-view-cart").html(
                                              Haravan.formatMoney(
                                                  t.total_price,
                                                  formatMoney
                                              )
                                          ),
                                          $(".cart-subtotal").html(
                                              Haravan.formatMoney(
                                                  t.total_price,
                                                  formatMoney
                                              )
>>>>>>> a49165e89efd4cc07df4e43f35084b1750916191
                                          ))
                                        : $("#cart-view").html(
                                              '<div class="mini-cart_empty-state"><svg width="65" height="65" viewBox="0 0 81 70"><g transform="translate(0 2)" stroke-width="4" stroke="#333333" fill="none" fill-rule="evenodd"><circle stroke-linecap="square" cx="34" cy="60" r="6"></circle><circle stroke-linecap="square" cx="67" cy="60" r="6"></circle><path d="M22.9360352 15h54.8070373l-4.3391876 30H30.3387146L19.6676025 0H.99560547"></path></g></svg><p class="m-0">Hiện chưa c\xf3 sản phẩm</p></div>'
                                          );
                                });
                        },
                        "json"
                    ).fail(function (t, e, i) {
                        422 === t.status &&
                            ($("#exampleModalCenter2").modal("show"),
                            $(".template-collection.modal-open").css(
                                "padding-right",
                                "0"
                            ));
                    }),
                        $(".sweet-alert-p").html(
                            n + " sản phẩm đ\xe3 th\xeam v\xe0o giỏ h\xe0ng"
                        ),
                        (function i() {
                            t.text(
                                "Th\xf4ng b\xe1o sẽ tự tắt sau " +
                                    e +
                                    " gi\xe2y..."
                            ),
                                e > 0
                                    ? (e--, setTimeout(i, 1e3))
                                    : ($("#exampleModalCenter1").modal("hide"),
                                      (e = 2));
                        })();
                });
        }),
            $(document).ready(function () {
                var t = $(".product-loop.trai"),
                    e = $("#loadmore"),
                    i = $("#loading-spinner");
                $(window).width() > 991 &&
                    (t.slice(0, 20).show(), t.length <= 20 && e.hide()),
                    991 > $(window).width() &&
                        (t.slice(0, 10).show(), t.length <= 6 && e.hide()),
                    $(".baivietseo1").length > 0 &&
                        $(window).width() > 991 &&
                        t.slice(0, 20).show(),
                    $(".baivietseo1").length > 0 &&
                        991 > $(window).width() &&
                        t.slice(0, 10).show(),
                    window.location.href.includes("?page=") &&
                        (t.slice(0, 50).show(),
                        e.hide(),
                        $(".pagination").css("display", "block")),
                    e.on("click", function (t) {
                        t.preventDefault(),
                            i.show(),
                            setTimeout(function () {
                                $(".product-loop:hidden")
                                    .slice(0, 50)
                                    .slideDown(),
                                    i.hide(),
                                    0 === $(".product-loop:hidden").length &&
                                        (e.hide(),
                                        $(".pagination").css(
                                            "display",
                                            "block"
                                        ));
                            }, 1e3);
                    }),
                    $(".col-6.col-md-4.col-lg-3.product-loop.trai").each(
                        function () {
                            "" === $(this).text().trim() && $(this).hide();
                        }
                    );
            });
    }),
    $(document).ready(function () {
        $(".content-product-list-1").owlCarousel({
            center: !1,
            items: 5,
            loop: !0,
            margin: 10,
            nav: !0,
            slideBy: 3,
            autoplay: !1,
            autoplayTimeout: 4e3,
            autoplayHoverPause: !0,
            dots: !0,
            dotsEach: 3,
            responsive: {
                0: {
                    items: 2,
                },
                767: {
                    items: 4,
                },
                991: {
                    items: 5,
                },
            },
        }),
            $(".content-product-list-2").removeClass("owl-loaded"),
            $(".content-product-list-2").owlCarousel({
                center: !1,
                items: 5,
                loop: !0,
                margin: 10,
                nav: !0,
                slideBy: 3,
                autoplay: !1,
                autoplayTimeout: 4e3,
                autoplayHoverPause: !0,
                dots: !0,
                dotsEach: 3,
                responsive: {
                    0: {
                        items: 2,
                    },
                    767: {
                        items: 4,
                    },
                    991: {
                        items: 5,
                    },
                },
                onInitialized: function () {
                    setTimeout(function () {
                        $(".content-product-list-2").css("display", "block");
                    }, 200);
                },
            }),
            $(".content-product-list-3").owlCarousel({
                center: !1,
                items: 5,
                loop: !0,
                margin: 10,
                nav: !0,
                slideBy: 3,
                autoplay: !1,
                autoplayTimeout: 3500,
                autoplayHoverPause: !0,
                dots: !0,
                dotsEach: 3,
                responsive: {
                    0: {
                        items: 2,
                    },
                    767: {
                        items: 4,
                    },
                    991: {
                        items: 5,
                    },
                },
            });
    }),
    768 > $(window).width() &&
        $(document).ready(function () {
            $("#productSlick-slider-trai").lightSlider({
                gallery: !0,
                item: 1,
                loop: !0,
                thumbItem: 6,
                thumbMargin: 5,
                slideMargin: 0,
                enableDrag: !1,
                slideMargin: 0,
                onSliderLoad: function (t) {
                    t.lightGallery({
                        selector: "#productSlick-slider-trai .lslide",
                    });
                },
            });
        }),
    $(document).ready(function () {
        $("#collapseOne1").on("show.bs.collapse", function () {
            $("#icon-plus-1").hide(), $("#icon-minus-1").show();
        }),
            $("#collapseOne1").on("hide.bs.collapse", function () {
                $("#icon-plus-1").show(), $("#icon-minus-1").hide();
            });
    }),
    $(document).ready(function () {
        $("#collapseOne2").on("show.bs.collapse", function () {
            $("#icon-plus-2").hide(), $("#icon-minus-2").show();
        }),
            $("#collapseOne2").on("hide.bs.collapse", function () {
                $("#icon-plus-2").show(), $("#icon-minus-2").hide();
            });
    }),
    $(document).ready(function () {
        $("#collapseOne3").on("show.bs.collapse", function () {
            $("#icon-plus-3").hide(), $("#icon-minus-3").show();
        }),
            $("#collapseOne3").on("hide.bs.collapse", function () {
                $("#icon-plus-3").show(), $("#icon-minus-3").hide();
            });
    }),
    $(document).ready(function () {
        $("#collapseOne4").on("show.bs.collapse", function () {
            $("#icon-plus-4").hide(), $("#icon-minus-4").show();
        }),
            $("#collapseOne4").on("hide.bs.collapse", function () {
                $("#icon-plus-4").show(), $("#icon-minus-4").hide();
            });
    }),
    $(document).ready(function () {
        var t = 0,
            e = $(".actionToolbar_mobile"),
            i = !1;
        $(window).scroll(function (o) {
            if (!i) {
                var n = $(this).scrollTop();
                n > t
                    ? e.css("transform", "translateY(100%)")
                    : e.css("transform", "translateY(0)"),
                    $(window).scrollTop() + $(window).height() >=
                        $(document).height() &&
                        e.css("transform", "translateY(0)"),
                    (t = n);
            }
        }),
            $(".open-popup-button").on("click", function () {
                i = !0;
            }),
            $(".close-popup-button").on("click", function () {
                i = !1;
            });
    }),
    $(document).ready(function () {
        if (767 >= $(window).width()) {
            var t = 0;
            $(window).scroll(function () {
                var e = $(this).scrollTop(),
                    i = $(".selector-actions.selector-actions_bottom-mb");
                e > t
                    ? i.css("transform", "translateY(0)")
                    : i.css("transform", "translateY(-60px)"),
                    (t = e);
            });
        }
    }),
    $(document).ready(function () {
        $(".owl-carousel .owl-item img").on("mouseover", function () {
            $(this).addClass("fade-effect");
        }),
            $(".owl-carousel .owl-item img").on("animationend", function () {
                $(this).removeClass("fade-effect");
            });
    }),
    $(document).ready(function () {
        $(".home-slider_3").owlCarousel({
            items: 1,
            loop: true,
            nav: true,
            navText: ["prev", "next"],
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
        });
    });
