@if (isset($products) && $products->isNotEmpty())
    <div class="col-12 col-lg-4">
        <aside class="sidebar-blogs blog-aside-sticky sidebar-product">
            <div class="sidebox_wrapper">
                <div class="sidebox_title js-sidebox-title">
                    <p class="trai-title-sidebar htitle">Bộ sưu tập nổi bật</p>
                </div>
                <div class="sidebox_content trai sidebox-content-togged clearfix">
                    <div class="sidebox_content-list list-blogs-latest trai_list1">
                        @foreach ($products as $product)
                            <div class="item-article d-flex align-items-center trai1">
                                <div class="post-image">
                                    <a href="{{ route('product.detail', ['slug' => $product['slug']]) }}"
                                       aria-label="{{ $product['name'] }}"
                                       style="aspect-ratio: 16 / 9; display: block; overflow: hidden;">
                                        <img class="lazyload"
                                             src="{{ $product['image'] }}"
                                             alt="{{ $product['name'] }}"
                                             style="width: 100%; height: 100%; object-fit: cover;">
                                    </a>
                                </div>
                                <div class="post-content">
                                    <p class="trai-title">
                                        <a href="{{ route('product.detail', ['slug' => $product['slug']]) }}"
                                           class="fw-500">{{ $product['name'] }}</a>
                                    </p>
                                    <p class="post-meta" data-description="{!! strip_tags($product['description']) !!}">
                                        <a href="{{ route('product.detail', ['slug' => $product['slug']]) }}">
                                            <!-- Nội dung sẽ được JS điền -->
                                        </a>
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </aside>
    </div>

    <style>
        .item-article {
            display: flex;
            align-items: stretch;
            padding:9px 0 !important;
        }
        .post-image {
            flex: 0 0 auto;
        }
        .post-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            padding:0 !important;
        }
        .post-meta {
            font-size: 16px;
            line-height: 1.5;
            margin: 0;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const items = document.querySelectorAll('.item-article');
            items.forEach(item => {
                const postImage = item.querySelector('.post-image');
                const postContent = item.querySelector('.post-content');
                const postMeta = item.querySelector('.post-meta');
                const description = postMeta.getAttribute('data-description');
                const link = postMeta.querySelector('a');

                // Lấy chiều cao của post-image
                const imageHeight = postImage.offsetHeight;

                // Đo chiều cao thực tế của tiêu đề (trai-title) thay vì giả định
                const titleElement = item.querySelector('.trai-title');
                const titleHeight = titleElement ? titleElement.offsetHeight : 24; // Mặc định 24px nếu không đo được
                const availableHeight = imageHeight - titleHeight;

                // Tính số dòng tối đa dựa trên line-height
                const lineHeight = 24; // 16px * 1.5
                const maxLines = Math.floor(availableHeight / lineHeight);

                // Ước lượng số ký tự mỗi dòng (có thể điều chỉnh dựa trên thiết kế thực tế)
                const charsPerLine = 50;
                const maxChars = maxLines * charsPerLine;

                // Cắt chuỗi và thêm vào nội dung
                const truncatedDescription = description.length > maxChars
                    ? description.substring(0, maxChars) + '...'
                    : description;
                link.innerHTML = truncatedDescription;
            });
        });
    </script>
@endif