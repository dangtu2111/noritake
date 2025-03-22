<div class="row list-article-content blog-posts blog-main">
    @if (isset($postNew) && !empty($postNew))
        @foreach ($postNew as $index => $post)
            @if ($index === 0)
                <!-- Bài viết chính (main article) -->
                <div class="col-12 col-sm-12 col-lg-12 pd-item-article main-article">
                    <article class="article article-list-item main-article">
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
                            <h2 class="article-excerpt-title main-article">
                                <a href="{{ route('post.detail', ['slug' => $post->slug]) }}"
                                   title="{{ $post->name }}"
                                   class="link">{{ $post->name }}</a>
                            </h2>
                            <p>
                                <span class="date">- {{ $post->created_at->format('d.m.Y') }}</span>
                                @if ($post->postCatalogues->isNotEmpty())
                                    <i class="fa fa-file-text-o" style="font-size: 12px; color: #ccc; margin-left: 5px;"></i>
                                    @foreach ($post->postCatalogues as $catalogue)
                                        <a href="{{ route('post.category', ['id' => $catalogue->id]) }}"
                                           style="font-size: 12px; color: #ccc; padding-left: 5px;">
                                            {{ $catalogue->name }}
                                        </a>{{ !$loop->last ? ',' : '' }}
                                    @endforeach
                                @endif
                            </p>
                            <div class="article-excerpt-desc">
                                <a href="{{ route('post.detail', ['slug' => $post->slug]) }}" class="link">
                                    <p class="article-excerpt-desc_content">{{ $post->excerpt }}</p>
                                </a>
                            </div>
                        </div>
                    </article>
                </div>
            @else
                <!-- Bài viết phụ (child article) -->
                <div class="col-12 col-sm-12 col-md-4 col-lg-4 pd-item-article child-article">
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
                            <p>
                                <span class="date">- {{ $post->created_at->format('d.m.Y') }}</span>
                                @if ($post->postCatalogues->isNotEmpty())
                                    <i class="fa fa-file-text-o" style="font-size: 12px; color: #ccc; margin-left: 5px;"></i>
                                    @foreach ($post->postCatalogues as $catalogue)
                                        <a href="{{ route('post.category', ['id' => $catalogue->id]) }}"
                                           style="font-size: 12px; color: #ccc; padding-left: 5px;">
                                            {{ $catalogue->name }}
                                        </a>{{ !$loop->last ? ',' : '' }}
                                    @endforeach
                                @endif
                            </p>
                        </div>
                    </article>
                </div>
            @endif
        @endforeach
    @endif
</div>