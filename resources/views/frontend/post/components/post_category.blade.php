<div class="row row-heading-blog-child">
    <div class="col-12 col-lg-12 col-blog-child">
        <div class="heading-page heading-page-child">
            <h1>
                <a class="link" href="{{ route('post.category', ['id' => $categoryP->id]) }}">
                    {{ $categoryP->name }}
                </a>
            </h1>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 col-lg-12">
        <div class="content-list-blog">
            <div class="row list-article-content blog-posts {{ Str::slug($categoryP->name) }}">
                <div class="list-blog-verticle" style="display: block">
                    @if (isset($categoryP) && $categoryP->posts->isNotEmpty())
                        @foreach ($categoryP->posts as $post)
                            <div class="col-12 col-sm-12 col-lg-12 pd-item-article child-article">
                                <article class="article article-list-item child-article">
                                    <a class="article-excerpt-image blog-post-thumbnail aspect-ratio"
                                       href="{{ route('post.detail', ['slug' => $post->slug]) }}"
                                       title="{{ $post->name }}"
                                       rel="nofollow"
                                       aria-label="{{ $post->name }}">
                                        <img class="lazyload"
                                             data-src="{{ $post->image }}"
                                             src="{{ $post->image }}"
                                             alt="{{ $post->name }}"
                                             width="100%"
                                             height="auto">
                                    </a>
                                    <div class="article-excerpt article-excerpt-content">
                                        <h2 class="article-excerpt-title child-article">
                                            <a href="{{ route('post.detail', ['slug' => $post->slug]) }}"
                                               title="{{ $post->name }}"
                                               class="link">{{ $post->name }}</a>
                                        </h2>
                                        <div class="article-excerpt-desc">
                                            <a href="{{ route('post.detail', ['slug' => $post->slug]) }}"
                                               class="link">
                                                <p class="article-excerpt-desc_content">{{ $post->excerpt }}</p>
                                            </a>
                                        </div>
                                        <span class="date">- {{ $post->created_at->format('d.m.Y') }}</span>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                        <a class="xem-tat-ca link" href="{{ route('post.category', ['id' => $categoryP->id]) }}">
                            <span style="text-transform: uppercase;">Xem thêm</span>
                        </a>
                    @else
                        <p>Chưa có bài viết nào trong danh mục này.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>