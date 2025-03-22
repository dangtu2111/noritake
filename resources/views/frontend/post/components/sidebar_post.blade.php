
    <aside class="sidebar-blogs blog-aside-sticky sidebar-collection">
        <div class="sidebox_wrapper">
            <div class="sidebox_title js-sidebox-title">
                <p class="htitle">Bài viết mới nhất</p>
            </div>
            <div class="sidebox_content sidebox-content-togged clearfix">
                <div class="sidebox_content-list list-blogs-latest">
                    @if ($postSimilar != null)
                        @foreach ($postSimilar as $key => $valSimilar)
                            <div class="item-article d-flex align-items-center mb-3">
                                <div class="post-image me-2">
                                    <a href="{{ route('post.detail', ['slug' => $valSimilar->slug]) }}" 
                                       class="aspect-ratio" 
                                       aria-label="{{ $valSimilar->name }}">
                                        <img class="lazyload rounded-2" 
                                             data-src="{{ $valSimilar->image }}" 
                                             src="{{ $valSimilar->image }}" 
                                             alt="{{ $valSimilar->name }}" 
                                             width="100" 
                                             height="80" 
                                             style="object-fit: contain;">
                                    </a>
                                </div>
                                <div class="post-content">
                                    <p class="mb-0">
                                        <a href="{{ route('post.detail', ['slug' => $valSimilar->slug]) }}" 
                                           class="fw-500 fz-16 text-dark">
                                            {{ $valSimilar->name }}
                                        </a>
                                    </p>
                                    <p class="post-meta text-muted">
                                        <span class="date">{{ $valSimilar->created_at }}</span>
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </aside>
