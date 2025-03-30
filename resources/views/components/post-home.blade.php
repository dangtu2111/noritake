@if(isset($posts) && !empty($posts))
<section id="section-collection-home last" class="section section10 section-collection">
    <div class="container-fluid-mb">
        <div class="wrapper-heading-home text-center">
            <h2>
                <a class="titleH-second link" href="blogs/all.html">
                    BÀI VIẾT
                </a>
            </h2>
            <p>
                <a class="titleH-second link" href="blogs/all.html">
                    Xem tất cả >>
                </a>
            </p>
        </div>

        <!-- Blog layout -->
        <div class="row blog-list">
            @php
                $firstPost = $posts->first(); // Lấy bài viết đầu tiên
                $remainingPosts = $posts->slice(1, 4); // Lấy 4 bài viết tiếp theo (từ 2 đến 5)
            @endphp

            <!-- Bên trái: Hiển thị bài viết đầu tiên -->
            <div class="col-12 col-md-8 blog-left">
                @if($firstPost)
                <div class="article-left">
                    <a href="{{ route('post.detail', ['slug' => $firstPost->slug]) }}"
                        class="aspect-ratio"
                        aria-label="{{ $firstPost->name }}">
                        <img
                            src="{{ $firstPost->image ?? '../file.hstatic.net/200000296482/article/website_-_thumbnail_1a9484542dc840ed845dd67a255d99a2_master.png' }}"
                            alt="{{ $firstPost->name }}" />
                    </a>
                    <p class="heading-left">
                        <a href="{{ route('post.detail', ['slug' => $firstPost->slug]) }}">{{ $firstPost->name }}</a>
                        <span class="article-date-left"> - {{ $firstPost->created_at->format('d/m/Y') }}  </span>
                        <i class="fa fa-file-text-o" style="font-size: 12px; color: #ccc"></i>
                        
                        @if($firstPost->postCatalogues && $firstPost->postCatalogues->first()->id)
                            <a href="{{ route('post.category', ['id' => $firstPost->postCatalogues->first()->id]) }}"
                                style="font-size: 12px; color: #ccc; padding-left: 5px;">
                                {{ $firstPost->postCatalogues->first()->name ?? 'Tin tức - Sự kiện' }}
                            </a>
                        @else
                            <span style="font-size: 12px; color: #ccc; padding-left: 5px;">Chưa có danh mục</span>
                        @endif
                    </p>
                </div>
                @endif
            </div>

            <!-- Bên phải: Hiển thị các bài viết từ 2 đến 5 -->
            <div class="col-12 col-md-4 blog-right">
                @foreach($remainingPosts as $post)
                <div class="article-right">
                    <div class="post-image">
                        <a href="{{ route('post.detail', ['slug' => $post->slug]) }}"
                            class="aspect-ratio"
                            aria-label="{{ $post->name }}">
                            <img
                                src="{{ $post->image ?? 'https://via.placeholder.com/150' }}"
                                alt="{{ $post->name }}" />
                        </a>
                    </div>
                    <div class="post-content">
                        <p class="heading-right">
                            <a href="{{ route('post.detail', ['slug' => $post->slug]) }}">{{ $post->name }}</a>
                        </p>
                        <span class="article-date-right">
                            - {{ $post->created_at->format('d/m/Y') }}
                            <i class="fa fa-file-text-o" style="font-size: 12px; color: #ccc; margin-left: 5px;"></i>
                            @if($post->postCatalogues && $post->postCatalogues->first()->id)
                                <a href="{{ route('post.category', ['id' => $post->postCatalogues->first()->id]) }}"
                                    style="font-size: 12px; color: #ccc; padding-left: 5px;">
                                    {{ $post->postCatalogues->first()->name ?? 'Chưa có danh mục' }}
                                </a>
                            @else
                                <span style="font-size: 12px; color: #ccc; padding-left: 5px;">Chưa có danh mục</span>
                            @endif
                        </span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <!-- End blog layout -->
    </div>
</section>
@endif