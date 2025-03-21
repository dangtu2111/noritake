<div class="col-12 col-lg-3" style="padding: 0;">
    <aside class="sidebar-blogs blog-aside-sticky sidebar-collection">
        <!-- Tiêu đề bộ sưu tập -->
        <div class="sidebox_wrapper">
            <div class="sidebox_title js-sidebox-title">
                <p class="trai-title-sidebar htitle">Bộ sưu tập nổi bật</p>
            </div>
        </div>

        <!-- Danh sách bộ sưu tập -->
        @if(isset($productShopNews) && count($productShopNews) > 0)
            <div class="sidebox_content trai sidebox-content-togged clearfix">
                <div class="sidebox_content-list list-blogs-latest trai_list">
                    @foreach($productShopNews as $product)
                        <div class="item-article d-flex align-items-center trai1">
                            <div class="post-image">
                                <a href="{{ route('product.detail',['slug'=>$product->slug])}}" aria-label="{{ $product->title ?? 'Menorca Palace (4964L)' }}">
                                    <img src="{{ $product->image ?? '//file.hstatic.net/200000296482/file/su-xuong-menorca-palace-cover_230b8c7cbd3a4ceb816a0d399fdc0211_small.jpg' }}" alt="{{ $product->title ?? 'Menorca Palace (4964L)' }}">
                                </a>
                            </div>
                            <div class="post-content">
                                <p class="trai-title">
                                    <a href="{{ route('product.detail',['slug'=>$product->slug])}}">{{ $product->name ?? 'Menorca Palace (4964L)' }}</a>
                                </p>
                                <p class="post-meta">
                                    <a href="{{ route('product.detail',['slug'=>$product->slug])}}">{!! Str::limit(strip_tags($product->description), 200) !!}</a>
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <div class="sidebox_content trai sidebox-content-togged clearfix">
                <div class="sidebox_content-list list-blogs-latest trai_list">
                    <p>Không có bộ sưu tập nào để hiển thị.</p>
                </div>
            </div>
        @endif
    </aside>
</div>