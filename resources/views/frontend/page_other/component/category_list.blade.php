<div class="col-12 col-lg-4">
    <aside class="sidebar-blogs blog-aside-sticky sidebar-product">
        <div class="sidebox_wrapper">
            <div class="sidebox_title js-sidebox-title">
                <p class="trai-title-sidebar htitle">Bộ sưu tập nổi bật</p>
            </div>
        </div>

        <div class="sidebox_content trai sidebox-content-togged clearfix">
            <div class="sidebox_content-list list-blogs-latest trai_list1">
                @if(isset($products) && $products->isNotEmpty())
                    @foreach($products as $product)
                        <div class="item-article d-flex align-items-center trai1">
                            <div class="post-image col-4" >
                                <a href="{{ route('product.detail',['slug'=>$product['slug']]) }}" aria-label="{{ $product['name'] }}">
                                    <img src="{{ $product['image'] }}" alt="{{ $product['title'] }}">
                                </a>
                            </div>
                            <div class="post-content">
                                <p class="trai-title">
                                    <a href="{{ route('product.detail',['slug'=>$product['slug']]) }}">{{ $product['name'] }}</a>
                                </p>
                                <p class="post-meta">
                                    <a href="{{ route('product.detail',['slug'=>$product['slug']]) }}">{!!  $product['description'] !!}</a>
                                </p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>Không có bộ sưu tập nào để hiển thị.</p>
                @endif
            </div>
        </div>

        <!-- Phần danh mục (nếu cần hiển thị) -->
        <!-- @if(isset($categories) && $categories->isNotEmpty())
            <div class="sidebox_wrapper mb-4 py-4 py-lg-0 px-3">
                <div class="sidebox_title js-sidebox-title">
                    <h3 class="htitle">Danh mục <span class="fa fa-angle-down"></span></h3>
                </div>
                <div class="sidebox_content sidebox-content-togged clearfix">
                    <ul class="menuList-links">
                        <li><a href="/" title="Trang chủ"><span>Trang chủ</span></a></li>
                        @foreach($categories as $category)
                            <li class="has-submenu level0">
                                <a href="{{ $category['url'] }}" title="{{ $category['title'] }}">
                                    {{ $category['title'] }} 
                                    @if(isset($category['submenus']) && $category['submenus']->isNotEmpty())
                                        <span class="icon-plus-submenu plus-nClick1"></span>
                                    @endif
                                </a>
                                @if(isset($category['submenus']) && $category['submenus']->isNotEmpty())
                                    <ul class="submenu-links">
                                        @foreach($category['submenus'] as $submenu)
                                            <li class="has-submenu level1">
                                                <a href="{{ $submenu['url'] }}">
                                                    {{ $submenu['title'] }}
                                                    @if(isset($submenu['children']) && $submenu['children']->isNotEmpty())
                                                        <span class="icon-plus-submenu plus-nClick2"></span>
                                                    @endif
                                                </a>
                                                @if(isset($submenu['children']) && $submenu['children']->isNotEmpty())
                                                    <ul class="submenu-links">
                                                        @foreach($submenu['children'] as $child)
                                                            <li>
                                                                <a href="{{ $child['url'] }}" title="{{ $child['title'] }}">
                                                                    {{ $child['title'] }}
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif -->
    </aside>
</div>