@extends('frontend.home.layout')
@section('page_title')
Tìm kiếm
@endsection
@section('content')
<main class="mainContent-theme">
    <div class="overlay123"></div>
    <div class="container-fluid breadcrumb">
        <div class="breadcrumb-content-inner">
            <div class="breadcrumb-shop clearfix">
                <div class="breadcrumb-list">
                    <ol class="breadcrumb breadcrumb-arrows" itemscope="" itemtype="http://schema.org/BreadcrumbList">
                        <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                            <a href="/" target="_self" itemprop="item"><span itemprop="name">Trang chủ</span></a>
                            <meta itemprop="position" content="1">
                        </li>
                        <li class="active" itemprop="itemListElement" itemscope=""
                            itemtype="http://schema.org/ListItem">
                            <span itemprop="item" content="{{ config('app.url').'pages/he-thong-cua-hang' }}"><strong
                                    itemprop="name">Tìm kiếm</strong></span>
                            <meta itemprop="position" content="2">
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="layout-pageContact mt-4 mt-lg-5 mb-5">
        <div class="container-fluid">
            <div class="heading-page text-center">
                <h1 style="scroll-margin-top: 40px;" id="tìm-kiếm-1">Tìm kiếm</h1>
                <p class="subtxt mb-4">Có <strong>{{ $totalProducts }} sản phẩm</strong> cho tìm kiếm</p>
            </div>
            <div class="wrapbox-content-page">
                <div class="content-page-search">
                    <p class="subtext-result mb-4"> Kết quả tìm kiếm cho <strong>"{{ $keyword }}"</strong>.</p>

                    <div class="row search-list-results">
                        @foreach($products as $product)
                        <div class="col-6 col-md-4 col-lg-3 product-loop">
                            <div class="product-inner product-resize toan">
                                <div
                                    class="product-image d-flex justify-content-center align-items-center image-resize">
                                    <a href="{{ route('product.detail', ['slug' => $product->slug]) }}"
                                        title="{{ $product->name }}" class="aspect-ratio">
                                        <div
                                            class="image-first-holder d-flex justify-content-center align-items-center">
                                            <picture>
                                                <source media="(max-width: 480px)" srcset="{{ $product->image }}">
                                                <source media="(min-width: 481px) and (max-width: 767px)"
                                                    srcset="{{ $product->image }}">
                                                <source media="(min-width: 768px)" srcset="{{ $product->image }}">
                                                <img class="image-loop" src="{{ $product->image }}"
                                                    alt="{{ $product->name }}">
                                            </picture>
                                        </div>
                                    </a>
                                </div>

                                <div class="product-detail">
                                    <div class="box-pro-detail">
                                        <p class="pro-name">
                                            <a href="{{ route('product.detail', ['slug' => $product->slug]) }}"
                                                title="{{ $product->name }}" class="link">
                                                {{ $product->name }}
                                            </a>
                                        </p>
                                        <div class="box-pro-prices">
                                            <p class="block-pro-price">
                                                <span
                                                    class="pro-price">{{ number_format($product->price, 0, ',', '.') }}₫</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="row">
                        <div class="col-12 search-pagination">
                            <div id="pagination">
                                <ul class="pagination">
                                    {{-- Previous Page Link --}}
                                    @if ($products->onFirstPage())
                                    <li class="disabled">
                                    <span style="display: inline-flex; align-items: center; justify-content: center; width: 30px; height: 30px;">
                                    <i class="fa fa-angle-double-left"></i>
                                    </span>
                                    </li>
                                    @else
                                    <li><a href="{{ $products->previousPageUrl() . '&q=' . request('q') }}"><i
                                                class="fa fa-angle-double-left"></i></a></li>
                                    @endif

                                    {{-- Pagination Elements --}}
                                    @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                                    @if ($page == $products->currentPage())
                                    <li class="active">
                                        <span style="display: inline-flex; align-items: center; justify-content: center; width: 30px; height: 30px;">
                                            {{ $page }}
                                        </span>
                                    </li>
                                    @else
                                    <li><a href="{{ $url . '&q=' . request('q') }}">{{ $page }}</a></li>
                                    @endif
                                    @endforeach

                                    {{-- Next Page Link --}}
                                    @if ($products->hasMorePages())
                                    <li><a href="{{ $products->nextPageUrl() . '&q=' . request('q') }}"><i
                                                class="fa fa-angle-double-right"></i></a></li>
                                    @else
                                    <li class="disabled">
                                        <span style="display: inline-flex; align-items: center; justify-content: center; width: 30px; height: 30px;">
                                            <i class="fa fa-angle-double-right"></i>
                                        </span>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
<style>
.search-pagination {
    text-align: center;
}
</style>