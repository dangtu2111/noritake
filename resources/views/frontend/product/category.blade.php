@extends('frontend.home.layout')
@section('page_title')
@if(isset($category))
{{ $category->name }}
@else
Sản phẩm danh mục
@endif
@endsection
@section('content')
<main class="mainContent-theme">
  <div class="overlay123"></div>
  <div id="collection" class="layout-collectionPage collection-temp2">
    @include('frontend.product.component.banner')
    @include('frontend.product.component.products')
    @include('frontend.product.component.content')
  </div>

  <div class="modal fade hidden-xs" id="quick-view-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="false">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <!--<h4 class="p-title modal-title" id="">Tên sản phẩm</h4>-->
          <p class="p-title modal-title" id="">Tên sản phẩm</p>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><a aria-hidden="true"></a></button>
        </div>
        <div class="modal-body">
          <div class="container-fluid">
            <div class="row">
              <form method="post" action="https://noritake.vn/cart/add">
                <div class="col-lg-5 col-md-6">
                  <div class="image-zoom row">
                    <img class="p-product-image-feature" src="#">
                    <div id="p-sliderproduct" class="flexslider">
                      <ul class="slides"></ul>
                    </div>
                  </div>
                </div>
                <div class="col-lg-7 col-md-6 pull-right">
                  <div class="form-input">
                    <div class="product-price">
                      <span class="p-price "></span>
                      <del></del>
                    </div>
                  </div>
                  <div class="p-option-wrapper">
                    <select name="id" class="" id="p-select"></select>
                  </div>
                  <div class="form-input hidden">
                    <label>Số lượng</label>
                    <input name="quantity" type="number" min="1" value="1" />
                  </div>

                  <div class="form-input" style="width: 100%">
                    <button type="submit" class="btn-detail  btn-color-add btn-min-width btn-mgt btn-addcart">Thêm vào giỏ</button>
                    <button disabled class="btn-detail addtocart btn-color-add btn-min-width btn-mgt btn-soldout">Hết hàng</button>
                    <div class="qv-readmore">
                      <span> hoặc </span><a class="read-more p-url" href="#" role="button">Xem chi tiết</a>
                    </div>
                  </div>
                </div>
                <div class="col-lg-7 col-md-6 pull-right">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  <script>
    var callBack = function(variant, selector) {
      if (variant) {
        modal = $('#quick-view-modal');
        $('.p-price').html(Haravan.formatMoney(variant.price, "₫"));
        if (variant.compare_at_price > 0)
          modal.find('del').html(Haravan.formatMoney(variant.compare_at_price, "₫"));
        else
          modal.find('del').html('');
        if (variant.available) {
          modal.find('.btn-addcart').css('display', 'block');
          modal.find('.btn-soldout').css('display', 'none');
        } else {
          modal.find('.btn-addcart').css('display', 'none');
          modal.find('.btn-soldout').css('display', 'block');
        }
      } else {
        modal.find('.btn-addcart').css('display', 'none');
        modal.find('.btn-soldout').css('display', 'block');
      }
    }
    var p_select_data = $('.p-option-wrapper').html();
    var p_zoom = $('.image-zoom').html();
    var quickViewProduct = function(purl) {

      if ($(window).width() < 680) {
        window.location = purl;
        return false;
      }
      modal = $('#quick-view-modal');
      modal.modal('show');
      $.ajax({
        url: purl + '.js',
        async: false,
        success: function(product) {
          $.each(product.options, function(i, v) {
            product.options[i] = v.name;
          })
          modal.find('.p-title').html(product.title);
          modal.find('.p-option-wrapper').html(p_select_data);
          $('.image-zoom').html(p_zoom);
          modal.find('.p-url').attr('href', product.url);

          $.each(product.variants, function(i, v) {
            modal.find('select#p-select').append("<option value='" + v.id + "'>" + v.title + ' - ' + v.price + "</option>");
          })
          if (product.variants.length == 1 && product.variants[0].title.indexOf('Default') != -1)
            $('.p-option-wrapper').hide();
          else
            $('.p-option-wrapper').show();
          if (product.variants.length == 1 && product.variants[0].title.indexOf('Default') != -1) {
            callBack(product.variants[0], null);
          } else {
            new Haravan.OptionSelectors("p-select", {
              product: product,
              onVariantSelected: callBack
            });
            if (product.options.length == 1 && product.options[0].indexOf('Tiêu đề') == -1)
              modal.find('.selector-wrapper:eq(0)').prepend('<label>' + product.options[0] + '</label>');
            $('.p-option-wrapper select:not(#p-select)').each(function() {
              $(this).wrap('<span class="custom-dropdown custom-dropdown--white"></span>');
              $(this).addClass("custom-dropdown__select custom-dropdown__select--white");
            });
            callBack(product.variants[0], null);
          }
          if (product.images.length == 0) {
            modal.find('.p-product-image-feature').attr('src', 'http://hstatic.net/0/0/global/noDefaultImage6_large.gif');
          } else {
            /*
            $('#p-sliderproduct').remove();
             $('.image-zoom').append("<div id='p-sliderproduct' class='flexslider'>");
             $('#p-sliderproduct').append("<ul class='slides'>");

             $.each(product.images, function (i, v) {
            	 elem = $('<li class="product-thumb">').append('<a href="#" data-image="" data-zoom-image=""><img /></a>');
            	 elem.find('a').attr('data-image', Haravan.resizeImage(v, 'medium'));
            	 elem.find('a').attr('data-zoom-image', v);
            	 elem.find('img').attr('data-image', Haravan.resizeImage(v, 'medium'));
            	 elem.find('img').attr('data-zoom-image',v);
            	 elem.find('img').attr('src', Haravan.resizeImage(v, 'small'));
            	 modal.find('.slides').append(elem);
             });

             modal.find('.p-product-image-feature').attr('src', product.featured_image);
             $(".modal-footer .btn-readmore").attr('href', purl);
             var iflag = 0;
             $('#p-sliderproduct img').load(function () {
            	 iflag++;
            	 if (iflag == $('#p-sliderproduct img').length) {
            		 $('#p-sliderproduct img').imagesLoaded( function() {
            			 $('#p-sliderproduct').flexslider({
            				 animation: "slide",
            				 controlNav: false,
            				 animationLoop: false,
            				 slideshow: false,
            				 itemWidth: 90
            			 });
            		 });
            	 }
             });
             */
            $('#p-sliderproduct').remove();
            $('.image-zoom').append("<div id='p-sliderproduct'>");
            $('#p-sliderproduct').append("<ul class='owl-carousel'>");
            $.each(product.images, function(i, v) {
              elem = $('<li class="item">').append('<a href="#" data-image="" data-zoom-image=""><img /></a>');
              elem.find('a').attr('data-image', Haravan.resizeImage(v, 'medium'));
              elem.find('a').attr('data-zoom-image', v);
              elem.find('img').attr('data-image', Haravan.resizeImage(v, 'medium'));
              elem.find('img').attr('data-zoom-image', v);
              elem.find('img').attr('src', Haravan.resizeImage(v, 'small'));
              modal.find('.owl-carousel').append(elem);
            });
            var owl = $('.owl-carousel');
            owl.owlCarousel({
              items: 3,
              navigation: true,
              navigationText: ['owl-prev', 'owl-next']
            });
            $('#p-sliderproduct .owl-carousel .owl-item').first().children('.item').addClass('active');
            modal.find('.p-product-image-feature').attr('src', product.featured_image);
            $(".modal-footer .btn-readmore").attr('href', purl);
          }

        }
      });

      //$('.modal-backdrop').css('opacity', '0');
      return false;
    }
    $('#quick-view-modal').on('click', '.item img', function(event) {
      event.preventDefault();
      modal = $('#quick-view-modal');
      modal.find('.p-product-image-feature').attr('src', $(this).attr('data-zoom-image'));
      modal.find('.item').removeClass('active');
      $(this).parents('li').addClass('active');
      return false;
    });

    $(document).on("click", ".mask img", function(event) {
      event.preventDefault();
      quickViewProduct($(this).attr('data-handle'));
    });
  </script>
  <script>
    $(document).ready(function() {
      // Xử lý responsive cho filter
      if ($(window).width() < 991) {
        $('.desktop-filter').remove();
      } else {
        $('.mobile-filter').remove();
        $('.desktop-filter').show();
      }

      // Xử lý click vào filter trên mobile
      jQuery('body').on('click', '.js-collection-options-filter', function(e) {
        e.preventDefault();
        if (jQuery(window).width() > 992) {
          $('.js-collection-options-filter').parent().toggleClass('filters-open');
          $(this).parents('.wrapper-mainCollection').toggleClass('filter-active');
          if ($(this).parents('.wrapper-mainCollection').hasClass('filter-active')) {
            $('.collection-list-product').parent().attr('class', 'col-9 collection-content-list_product');
          } else {
            $('.collection-list-product').parent().attr('class', 'col-12 collection-content-list_product');
          }
        }
      });

      // Xử lý click vào checkbox filter
      jQuery('body').on('click', '.checkbox-list li > input', function() {
        jQuery(this).parent().toggleClass('active');
        Stringfilter();
      });

      // Xử lý xóa filter
      jQuery('body').on('click', '.filter_tags_remove', function() {
        $(this).parent().removeClass('opened').find('b').html('');
        var indexClick = $(this).parent().index();
        $('.filter-group:eq(' + indexClick + ') li.active input').attr('checked', false);
        $('.filter-group:eq(' + indexClick + ') li.active').removeClass('active');
        if ($('.filter_tags:not(.filter_tags_remove_all).opened').length == 1) {
          $('.filter_tags_remove_all').removeClass('opened');
        }
        Stringfilter();
      });

      // Xử lý xóa tất cả filter
      jQuery('body').on('click', '.filter_tags_remove_all', function() {
        $('.filter-group li.active input').attr('checked', false);
        $('.filter-group li.active').removeClass('active');
        $('.filter_tags b').html('').parent().removeClass('opened');
        $('.filter_tags_remove_all').removeClass('opened');
        Stringfilter();
      });

      // Hàm xử lý filter
      function Stringfilter() {
        var q = "",
          gia = "",
          vendor = "",
          type = "",
          color = "",
          size1 = "",
          size2 = "",
          size3 = "",
          size4 = "",
          size5 = "";
        var handle_coll = $('#coll-handle').val();
        var str_url = 'https://noritake.vn/collections/filter=';
        q = "(" + handle_coll + ")";

        // Xử lý filter theo giá
        jQuery('.filter-price ul.checkbox-list li.active').each(function() {
          gia = gia + jQuery(this).find('input').data('price') + '||';
        })
        gia = gia.substring(0, gia.length - 2);
        if (gia != "") {
          gia = '(' + gia + ')';
          q += '&&' + gia;
        }

        // Xử lý filter theo thương hiệu
        jQuery('.filter-brand ul.checkbox-list li.active').each(function() {
          vendor = vendor + jQuery(this).find('input').data('vendor') + '||';
        })
        vendor = vendor.substring(0, vendor.length - 2);
        if (vendor != "") {
          vendor = '(' + vendor + ')';
          q += '&&' + vendor;
        }

        // Xử lý filter theo màu
        jQuery('.filter-color ul.checkbox-list li.active').each(function() {
          color = color + jQuery(this).find('input').data('color') + '||';
        })
        color = color.substring(0, color.length - 2);
        if (color != "") {
          color = '(' + color + ')';
          q += '&&' + color;
        }

        // Xử lý filter theo kích thước
        jQuery('.filter-size1 ul.checkbox-list li.active').each(function() {
          size1 = size1 + jQuery(this).find('input').data('size1') + '||';
        })
        size1 = size1.substring(0, size1.length - 2);
        if (size1 != "") {
          size1 = '(' + size1 + ')';
          q += '&&' + size1;
        }

        str_url += encodeURIComponent(q);
        window.location.href = str_url;
      }
    });
  </script>

  <script>
    function Copy() {
      var Url = '';
      Url = window.location.href;
      console.log(Url);
      navigator.clipboard.writeText(Url);
      showNotification1();
    }

    function showNotification1() {
      var notificationEl1 = document.querySelector('p.notification-message');

      notificationEl1.classList.add('notify');
      setTimeout(function() {
        notificationEl1.classList.remove('notify');
      }, 600);
    }

    function Copy1() {
      var Url = '';
      Url = window.location.href;
      //console.log(Url);
      navigator.clipboard.writeText(Url);
      showNotification2();
    }

    function showNotification2() {
      var notificationEl2 = document.querySelector('p.notification-message-1');

      notificationEl2.classList.add('notify-1');
      setTimeout(function() {
        notificationEl2.classList.remove('notify-1');
      }, 550);
    }
  </script>
</main>
@endsection