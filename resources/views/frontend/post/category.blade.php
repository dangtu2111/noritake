@extends('frontend.home.layout')
@section('page_title')
Danh mục bài viết
@endsection
@section('content')
<main class="mainContent-theme">
    <div class="overlay123"></div>
    <div id="blog">
        <div class="wrapper-content-blogs">

            <!-- breadcrumb -->
            <div class="container-fluid">
                <div class="row row-breadcrumb">
                    <div class="col-12 col-lg-1"></div>
                    <div class="col-12 col-lg-7 col-breadcrumb no-padding">
                        <div class="breadcrumb-content-inner">
                            <div class="breadcrumb-shop clearfix">
                                <div class="breadcrumb-list">
                                    <ol class="breadcrumb breadcrumb-arrows" itemscope="" itemtype="http://schema.org/BreadcrumbList">
                                        <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                                            <a href="/" target="_self" itemprop="item"><span itemprop="name">Trang chủ</span></a>
                                            <meta itemprop="position" content="1">
                                        </li>


                                        <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                                            <a href="{{ route('post.page') }}" itemprop="item">
                                                <span itemprop="name">Blog</span>
                                            </a>
                                            <meta itemprop="position" content="2">
                                        </li>

                                        <!--<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="active">
						<span itemprop="item" content="https://noritake.vn/blogs/decor-sap-xep"><strong itemprop="name">Decor - Sắp xếp</strong></span>
						<meta itemprop="position" content="2" />
					</li>-->
                                    </ol>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-12 col-lg-3"></div>
                </div>
            </div>

            <div class="container-fluid heading-page-bar">
                <div class="row blog-heading-page">
                    <div class="col-12 col-lg-1">
                        <!--<img style="width: 100%" src="https://file.hstatic.net/200000296482/file/collection_banner_trefolio_gold_b9abb9c3ee1f45118360e2762314bdfd.jpg" />-->
                    </div>
                    <div class="col-12 col-lg-10 col-heading-page">
                        <div class="heading-page">

                            <h1 style="scroll-margin-top: 40px;" id="decor---sắp-xếp-1">{{$postCatalogue->name}}</h1>



                        </div>
                    </div>
                </div>
            </div>


            <div class="container-fluid blog-child">
                <div class="row">
                    <div class="col-12 col-lg-1">
                        <!--<img style="width: 100%" src="https://file.hstatic.net/200000296482/file/collection_banner_trefolio_gold_b9abb9c3ee1f45118360e2762314bdfd.jpg" />-->
                    </div>
                    <div class="col-12 col-lg-7">
                        <div class="content-list-blog">
                            <div class="row list-article-content blog-posts ">
                                @if (isset($postInCatagories) && $postInCatagories->isNotEmpty())
                                @foreach ($postInCatagories as $index => $post)
                                @if ($index === 0)
                                <div class="col-12 col-sm-12 col-lg-12 pd-item-article main-article">
                                    <article class="article article-list-item main-article">
                                        <a class="article-excerpt-image blog-post-thumbnail"
                                            href="{{ route('post.detail', ['slug' => $post->slug]) }}"
                                            title="{{ $post->name }}"
                                            rel="nofollow"
                                            aria-label="{{ $post->name }}"
                                            style="aspect-ratio: 16 / 9; display: block; overflow: hidden;">
                                            <img class="lazyload"
                                                data-src="{{ $post->image }}"
                                                src="{{ $post->image }}"
                                                alt="{{ $post->name }}"
                                                style="width: 100%; height: 100%; object-fit: cover;">
                                        </a>
                                        <div class="article-excerpt article-excerpt-content">
                                            <h2 class="article-excerpt-title main-article">
                                                <a href="{{ route('post.detail', ['slug' => $post->slug]) }}"
                                                    title="{{ $post->name }}"
                                                    class="link">{{ $post->name }}</a>
                                            </h2>
                                            <p><span class="date">- {{ $post->created_at->format('d.m.Y') }}</span></p>
                                            <div class="article-excerpt-desc">
                                                <a href="{{ route('post.detail', ['slug' => $post->slug]) }}"
                                                    class="link">
                                                    <p class="article-excerpt-desc_content">{{ Str::limit($post->excerpt, 200) }}</p>
                                                </a>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                                <div class="blog-border-top">
                                    @foreach ($postInCatagories as $indexChild => $postChild)
                                    @if ($indexChild > 0)
                                    <div class="list-blog-verticle">
                                        <div class="col-12 col-sm-12 col-lg-12 pd-item-article child-article">
                                            <article class="article article-list-item child-article">
                                                <a class="article-excerpt-image blog-post-thumbnail"
                                                    href="{{ route('post.detail', ['slug' => $postChild->slug]) }}"
                                                    title="{{ $postChild->name }}"
                                                    rel="nofollow"
                                                    aria-label="{{ $postChild->name }}"
                                                    style="aspect-ratio: 16 / 9; display: block; overflow: hidden;">
                                                    <img class="lazyload"
                                                        data-src="{{ $postChild->image }}"
                                                        src="{{ $postChild->image }}"
                                                        alt="{{ $postChild->name }}"
                                                        style="width: 100%; height: 100%; object-fit: cover;">
                                                </a>
                                                <div class="article-excerpt article-excerpt-content">
                                                    <h2 class="article-excerpt-title child-article">
                                                        <a href="{{ route('post.detail', ['slug' => $postChild->slug]) }}"
                                                            title="{{ $postChild->name }}"
                                                            class="link">{{ $postChild->name }}</a>
                                                    </h2>
                                                    <div class="article-excerpt-desc">
                                                        <a href="{{ route('post.detail', ['slug' => $postChild->slug]) }}"
                                                            class="link">
                                                            <p class="article-excerpt-desc_content">{!! Str::limit(strip_tags($postChild->description), 255) !!}</p>
                                                        </a>
                                                    </div>
                                                </div>
                                            </article>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                                @endif
                                @endforeach
                                @else
                                <div class="col-12">
                                    <p>Chưa có bài viết nào trong danh mục này.</p>
                                </div>
                                @endif
                            </div>
                            <!--<div id="pagination">
</div>-->
                        </div>
                    </div>
                    <div class="col-12 col-lg-3" style="padding-right: 0;">
                        @include('frontend.post.components.sidebar_post')
                    </div>
                </div>
            </div>

        </div>
    </div>
</main>

@endsection