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
                                    <p class="trai-title ">
                                        <a href="{{ route('product.detail', ['slug' => $product['slug']]) }}"
                                           class="fw-500">{{ $product['name'] }}</a>
                                    </p>
                                    <p class="post-meta text-muted">
                                        <a href="{{ route('product.detail', ['slug' => $product['slug']]) }}">
                                            {!! Str::limit(strip_tags($product['description']), 100) !!}
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
@endif