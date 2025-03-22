@extends('frontend.home.layout')
@section('page_title')
@if(isset($title))
{{ $title }}
@else
Chi tiết bài viết
@endif
@endsection
@section('content')
<main class="mainContent-theme">
    <div class="overlay123"></div>
    <style>
        @media (min-width: 767px) {
            .mobile-image {
                display: none;
            }

            img.desktop-image {
                width: 100%;
            }
        }

        @media (max-width: 767px) {
            .desktop-image {
                display: none;
            }

            .mobile-image {
                display: block;
            }
        }
    </style>

    <!--<a href="https://noritake.vn/collections/uu-dai-den-10"><img class="desktop-image" src="https://file.hstatic.net/200000296482/file/1920_x_450_px_1.jpg" alt=""/></a>
<a href="https://noritake.vn/collections/uu-dai-den-10"><img class="mobile-image" src="https://file.hstatic.net/200000296482/file/1920_x_1440_px.jpg" alt=""/></a>-->

    <div id="article">
        <div class="wrapper-content-article">
            <div class="container-fluid">
                <div class="row row-breadcrumb">
                    <div class="col-12 col-lg-1"></div>
                    <div class="col-12 col-lg-7 col-breadcrumb">
                        <div class="breadcrumb-content-inner">
                            <div class="breadcrumb-shop clearfix">
                                <div class="breadcrumb-list">
                                    <ol class="breadcrumb breadcrumb-arrows" itemscope="" itemtype="http://schema.org/BreadcrumbList">
                                        <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                                            <a href="/" target="_self" itemprop="item"><span itemprop="name">Trang chủ</span></a>
                                            <meta itemprop="position" content="1">
                                        </li>
                                        <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                                            <a href="https://noritake.vn/blogs/all" itemprop="item">
                                                <span itemprop="name">Blog</span>
                                            </a>
                                            <meta itemprop="position" content="2">
                                        </li>
                                        <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                                            <a href="/blogs/tin-tuc-su-kien" itemprop="item">
                                                <span itemprop="name">Tin tức - Sự kiện</span>
                                            </a>
                                            <meta itemprop="position" content="2">
                                        </li>
                                        <!--<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="active">
						<span itemprop="item" content="https://noritake.vn/blogs/tin-tuc-su-kien/noritake-private-sale-su-kien-danh-cho-khach-hang-than-thiet"><strong itemprop="name">Noritake Private Sale @ Diamond Plaza – Hành trình trải nghiệm tinh hoa sứ Nhật dành riêng cho khách hàng VIP</strong></span>
						<meta itemprop="position" content="3" />
					</li>-->
                                    </ol>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-12 col-lg-3"></div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-1" style="z-index: 1;">

                        <!-- start icon share -->
                        <ul class="cpanel-action social-pin">
                            <li>
                                <a class="cpanel-item facebook" target="_blank" href="//www.facebook.com/sharer.php?u=https://noritake.vn/blogs/tin-tuc-su-kien/noritake-private-sale-su-kien-danh-cho-khach-hang-than-thiet" data-track-content="" data-content-name="article-actions" data-content-piece="article-actions-facebook" data-content-target="" rel="nofollow" title="Chia sẻ bài viết lên facebook">
                                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M21.125 16.3V19.2H24.05C24.275 19.2 24.3875 19.4 24.3875 19.6L23.9375 21.5C23.9375 21.6 23.7125 21.7 23.6 21.7H21.125V29H17.75V21.8H15.8375C15.6125 21.8 15.5 21.7 15.5 21.5V19.6C15.5 19.4 15.6125 19.3 15.8375 19.3H17.75V16C17.75 14.3 19.2125 13 21.125 13H24.1625C24.3875 13 24.5 13.1 24.5 13.3V15.7C24.5 15.9 24.3875 16 24.1625 16H21.4625C21.2375 16 21.125 16.1 21.125 16.3Z" fill="#292D32"></path>
                                    </svg>
                                </a>
                            </li>
                            <!--<li>
						<a class="cpanel-item twitter" href="https://twitter.com/intent/tweet?text=https://dantri.com.vn/xa-hoi/chu-tich-nuoc-bieu-duong-nhung-guong-mat-vang-sea-games-32-20230523144436970.htm" target="_blank" data-track-content="" data-content-name="article-actions" data-content-piece="article-actions-twitter" data-content-target="/xa-hoi/chu-tich-nuoc-bieu-duong-nhung-guong-mat-vang-sea-games-32-20230523144436970.htm" rel="nofollow" title="Chia sẻ bài viết lên twitter">
							<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M29.5 15.5C28.825 15.8 28.15 15.9 27.3625 16C28.15 15.6 28.7125 15 28.9375 14.2C28.2625 14.6 27.475 14.8 26.575 15C25.9 14.4 24.8875 14 23.875 14C21.9625 14 20.275 15.5 20.275 17.3C20.275 17.6 20.275 17.8 20.3875 18C17.35 17.9 14.5375 16.6 12.7375 14.6C12.4 15.1 12.2875 15.6 12.2875 16.3C12.2875 17.4 12.9625 18.4 13.975 19C13.4125 19 12.85 18.8 12.2875 18.6C12.2875 20.2 13.525 21.5 15.2125 21.8C14.875 21.9 14.5375 21.9 14.2 21.9C13.975 21.9 13.75 21.9 13.525 21.8C13.975 23.1 15.325 24.1 17.0125 24.1C15.775 25 14.2 25.5 12.4 25.5C12.0625 25.5 11.8375 25.5 11.5 25.5C13.1875 26.4 15.1 27 17.125 27C23.875 27 27.5875 22 27.5875 17.7C27.5875 17.6 27.5875 17.4 27.5875 17.3C28.375 16.8 29.05 16.2 29.5 15.5Z" fill="#292D32" stroke="#292D32" stroke-linejoin="round"></path>
							</svg>
						</a>
					</li>-->
                            <li>
                                <a class="cpanel-item linkedin" target="_blank" href="https://www.linkedin.com/cws/share?url=https://noritake.vn/blogs/tin-tuc-su-kien/noritake-private-sale-su-kien-danh-cho-khach-hang-than-thiet" data-content-target="" rel="nofollow" title="Chia sẻ bài viết lên linkedin">
                                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_752_6605)">
                                            <path d="M27.8 12H13.2C12.8 12 12.5 12.3 12.5 12.7V27.4C12.5 27.7 12.8 28 13.2 28H27.9C28.3 28 28.6 27.7 28.6 27.3V12.7C28.5 12.3 28.2 12 27.8 12ZM17.2 25.6H14.9V18H17.3V25.6H17.2ZM16.1 17C15.3 17 14.7 16.3 14.7 15.6C14.7 14.8 15.3 14.2 16.1 14.2C16.9 14.2 17.5 14.8 17.5 15.6C17.4 16.3 16.8 17 16.1 17ZM26.1 25.6H23.7V21.9C23.7 21 23.7 19.9 22.5 19.9C21.3 19.9 21.1 20.9 21.1 21.9V25.7H18.7V18H21V19C21.3 18.4 22.1 17.8 23.2 17.8C25.6 17.8 26 19.4 26 21.4V25.6H26.1Z" fill="#292D32"></path>
                                        </g>
                                    </svg>
                                </a>
                            </li>
                          
                            <li>
                                <button onclick="Copy()" type="button" class="cpanel-item link" data-track-content="" data-content-name="" data-content-piece="" title="Copy">
                                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_608_611)">
                                            <path d="M16.5002 28.0001C15.3002 28.0001 14.2002 27.5001 13.3002 26.7001C11.5002 24.9001 11.5002 22.1001 13.3002 20.3001L14.0002 19.6001L15.4002 21.0001L14.7002 21.7001C13.7002 22.7001 13.7002 24.3001 14.7002 25.3001C15.7002 26.3001 17.3002 26.3001 18.3002 25.3001L21.3002 22.3001C22.3002 21.3001 22.3002 19.7001 21.3002 18.7001L20.6002 18.0001L22.0002 16.6001L22.7002 17.3001C24.5002 19.1001 24.5002 21.9001 22.7002 23.7001L19.7002 26.7001C18.9002 27.5001 17.7002 28.0001 16.5002 28.0001Z" fill="#292D32"></path>
                                            <path d="M18.0002 23.4L17.3002 22.7C15.5002 20.9 15.5002 18.1 17.3002 16.3L20.3002 13.3C21.2002 12.4 22.3002 12 23.5002 12C24.7002 12 25.8002 12.5 26.7002 13.3C28.5002 15.1 28.5002 17.9 26.7002 19.7L26.0002 20.4L24.6002 19L25.3002 18.3C26.3002 17.3 26.3002 15.7 25.3002 14.7C24.3002 13.7 22.7002 13.7 21.7002 14.7L18.7002 17.7C17.7002 18.7 17.7002 20.3 18.7002 21.3L19.4002 22L18.0002 23.4Z" fill="#292D32"></path>
                                        </g>
                                    </svg>
                                </button>
                                <p class="notification-message">Đã copy</p>
                            </li>
                            <li class="line">
                                <a href="#comment"><button type="button" class="cpanel-item comment" data-track-content="" data-content-name="article-actions" data-content-piece="article-actions-comment" data-content-target="" title="Bình luận">
                                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M17.5834 25.8334H17.1667C13.8334 25.8334 12.1667 25.0001 12.1667 20.8334V16.6667C12.1667 13.3334 13.8334 11.6667 17.1667 11.6667H23.8334C27.1667 11.6667 28.8334 13.3334 28.8334 16.6667V20.8334C28.8334 24.1667 27.1667 25.8334 23.8334 25.8334H23.4167C23.1584 25.8334 22.9084 25.9584 22.75 26.1667L21.5 27.8334C20.95 28.5667 20.05 28.5667 19.5 27.8334L18.25 26.1667C18.1167 25.9834 17.8084 25.8334 17.5834 25.8334Z" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M16.3333 16.6667H24.6666" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M16.3333 20.8333H21.3333" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </button></a>
                            </li>
                           
                            <li>
                                <button class="cpanel-item back" onclick="javascript:window.history.back();">
                                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M18.475 14.9417L13.4167 20L18.475 25.0583" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M27.5834 20H13.5583" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </button>
                            </li>
                        </ul>
                        <!-- end icon share -->

                    </div>
                    <div class="col-12 col-lg-7 col-article">
                        <div class="list_blog article-content" itemscope="" itemtype="https://schema.org/Recipe">
                            <div class="article-heading clearfix">
                                <h1 class="article-heading_title" itemprop="name" style="scroll-margin-top: 40px;" id="noritake-private-sale-@-diamond-plaza-–-hành-trình-trải-nghiệm-tinh-hoa-sứ-nhật-dành-riêng-cho-khách-hàng-vip-1">{{ $post->name }}</h1>
                                <ul class="article-heading_info article-info-more">
                                    <li>
                                        <!--<span class="article-heading_info-author" itemprop="author">Người viết: Nguyễn Trần Minh Nghi lúc</span>-->
                                        <span class="article-heading_info-date" itemprop="datePublished">
                                            <time datetime="2025-03-15">{{ \Carbon\Carbon::parse($post->created_at)->format('d/m/Y') }}</time>
                                        </span>
                                    </li>
                                    @if (!is_null($postCatalogues) && !empty($postCatalogues))
                                        @foreach ($postCatalogues as $categoryP)
                                    <li><i class="fa fa-file-text-o"></i><a href="{{ route('post.category', ['id' => $categoryP->id]) }}"> {{ $categoryP->name }}</a> </li>

                                        
                                        @endforeach
                                        @endif

                                </ul>
                            </div>
                            <div class="article-background-image mb-4 aspect-ratio trai">
                                <!--<img itemprop="image" class="lazyload" data-src="//file.hstatic.net/200000296482/article/thumbnal-private_sale_c05f692dbca248dd95d5cc6a01f5ff39_1024x1024.jpg" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" alt="Noritake Private Sale @ Diamond Plaza – Hành trình trải nghiệm tinh hoa sứ Nhật dành riêng cho khách hàng VIP" >-->
                                <img itemprop="image" width="100%" class=" ls-is-cached lazyloaded" src="{{ $post->image }}" alt="{{ $post->name }}">
                            </div>
                            <div class="article-content-desc mb-4" itemprop="description">
                            {!! $post->content !!}      
                            </div>
                            <!--<div class="article-post-nav clearfix mb-4">							
							<span class="float-right right">
								<a href="/blogs/tin-tuc-su-kien/su-nhat-noritake-mon-qua-dang-cap-ton-vinh-phai-dep-ngay-8-3" title="">Bài sau</a>
								<svg class="arrow-right d-inline-block align-middle" viewBox="0 0 11 18">
									<path d="M1.5 1.5l8 7.5-8 7.5" stroke-width="2" stroke="currentColor" fill="none" fill-rule="evenodd" stroke-linecap="square"></path>
								</svg>
							</span>

						</div>-->
                        </div>

                        <div class="singular-footer horizontal">
                            <ul class="cpanel-action social-pin hidden">
                                <li>
                                    <a class="cpanel-item facebook" target="_blank" href="//www.facebook.com/sharer.php?u=https://noritake.vn/blogs/tin-tuc-su-kien/noritake-private-sale-su-kien-danh-cho-khach-hang-than-thiet" data-track-content="" data-content-name="article-actions" data-content-piece="article-actions-facebook" data-content-target="" rel="nofollow" title="Chia sẻ bài viết lên facebook">
                                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M21.125 16.3V19.2H24.05C24.275 19.2 24.3875 19.4 24.3875 19.6L23.9375 21.5C23.9375 21.6 23.7125 21.7 23.6 21.7H21.125V29H17.75V21.8H15.8375C15.6125 21.8 15.5 21.7 15.5 21.5V19.6C15.5 19.4 15.6125 19.3 15.8375 19.3H17.75V16C17.75 14.3 19.2125 13 21.125 13H24.1625C24.3875 13 24.5 13.1 24.5 13.3V15.7C24.5 15.9 24.3875 16 24.1625 16H21.4625C21.2375 16 21.125 16.1 21.125 16.3Z" fill="#292D32"></path>
                                        </svg>
                                    </a>
                                </li>
                                <!--<li>
								<a class="cpanel-item twitter" href="https://twitter.com/intent/tweet?text=https://dantri.com.vn/xa-hoi/chu-tich-nuoc-bieu-duong-nhung-guong-mat-vang-sea-games-32-20230523144436970.htm" target="_blank" data-track-content="" data-content-name="article-actions" data-content-piece="article-actions-twitter" data-content-target="/xa-hoi/chu-tich-nuoc-bieu-duong-nhung-guong-mat-vang-sea-games-32-20230523144436970.htm" rel="nofollow" title="Chia sẻ bài viết lên twitter">
									<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M29.5 15.5C28.825 15.8 28.15 15.9 27.3625 16C28.15 15.6 28.7125 15 28.9375 14.2C28.2625 14.6 27.475 14.8 26.575 15C25.9 14.4 24.8875 14 23.875 14C21.9625 14 20.275 15.5 20.275 17.3C20.275 17.6 20.275 17.8 20.3875 18C17.35 17.9 14.5375 16.6 12.7375 14.6C12.4 15.1 12.2875 15.6 12.2875 16.3C12.2875 17.4 12.9625 18.4 13.975 19C13.4125 19 12.85 18.8 12.2875 18.6C12.2875 20.2 13.525 21.5 15.2125 21.8C14.875 21.9 14.5375 21.9 14.2 21.9C13.975 21.9 13.75 21.9 13.525 21.8C13.975 23.1 15.325 24.1 17.0125 24.1C15.775 25 14.2 25.5 12.4 25.5C12.0625 25.5 11.8375 25.5 11.5 25.5C13.1875 26.4 15.1 27 17.125 27C23.875 27 27.5875 22 27.5875 17.7C27.5875 17.6 27.5875 17.4 27.5875 17.3C28.375 16.8 29.05 16.2 29.5 15.5Z" fill="#292D32" stroke="#292D32" stroke-linejoin="round"></path>
									</svg>
								</a>
							</li>-->
                                <li>
                                    <a class="cpanel-item linkedin" target="_blank" href="https://www.linkedin.com/cws/share?url=https://noritake.vn/blogs/tin-tuc-su-kien/noritake-private-sale-su-kien-danh-cho-khach-hang-than-thiet" data-content-target="" rel="nofollow" title="Chia sẻ bài viết lên linkedin">
                                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_752_6605)">
                                                <path d="M27.8 12H13.2C12.8 12 12.5 12.3 12.5 12.7V27.4C12.5 27.7 12.8 28 13.2 28H27.9C28.3 28 28.6 27.7 28.6 27.3V12.7C28.5 12.3 28.2 12 27.8 12ZM17.2 25.6H14.9V18H17.3V25.6H17.2ZM16.1 17C15.3 17 14.7 16.3 14.7 15.6C14.7 14.8 15.3 14.2 16.1 14.2C16.9 14.2 17.5 14.8 17.5 15.6C17.4 16.3 16.8 17 16.1 17ZM26.1 25.6H23.7V21.9C23.7 21 23.7 19.9 22.5 19.9C21.3 19.9 21.1 20.9 21.1 21.9V25.7H18.7V18H21V19C21.3 18.4 22.1 17.8 23.2 17.8C25.6 17.8 26 19.4 26 21.4V25.6H26.1Z" fill="#292D32"></path>
                                            </g>
                                        </svg>
                                    </a>
                                </li>
                                <!--<li class="zalo-share-button" data-href="" data-oaid="" data-layout="3" data-color="blue" data-customize="true">
								<button class="cpanel-item zalo" title="Chia sẻ bài viết lên zalo">
									<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
										<g clip-path="url(#clip0_608_594)">
											<path fill-rule="evenodd" clip-rule="evenodd" d="M20.6809 17.5205V17.064H22.0481V23.4824H21.2659C20.9439 23.4824 20.6825 23.2224 20.6809 22.9008C20.6807 22.901 20.6804 22.9011 20.6802 22.9013C20.1295 23.304 19.4488 23.5431 18.7135 23.5431C16.872 23.5431 15.3789 22.0509 15.3789 20.2106C15.3789 18.3703 16.872 16.8782 18.7135 16.8782C19.4488 16.8782 20.1295 17.1173 20.6802 17.52C20.6804 17.5201 20.6807 17.5203 20.6809 17.5205ZM15.0246 15V15.2081C15.0246 15.5962 14.9727 15.9131 14.7205 16.2848L14.69 16.3197C14.6349 16.3821 14.5057 16.5287 14.4442 16.6083L10.0549 22.1175H15.0246V22.8974C15.0246 23.2205 14.7624 23.4824 14.439 23.4824H8V23.1146C8 22.6643 8.1119 22.4634 8.25335 22.254L12.9324 16.4624H8.19507V15H15.0246ZM23.7064 23.4824C23.4375 23.4824 23.2189 23.2639 23.2189 22.9953V15H24.6824V23.4824H23.7064ZM29.0096 16.838C30.864 16.838 32.3667 18.3414 32.3667 20.1929C32.3667 22.046 30.864 23.5494 29.0096 23.5494C27.1552 23.5494 25.6525 22.046 25.6525 20.1929C25.6525 18.3414 27.1552 16.838 29.0096 16.838ZM18.7135 22.1713C19.7972 22.1713 20.6754 21.2936 20.6754 20.2106C20.6754 19.1292 19.7972 18.2516 18.7135 18.2516C17.6298 18.2516 16.7516 19.1292 16.7516 20.2106C16.7516 21.2936 17.6298 22.1713 18.7135 22.1713ZM29.0096 22.168C30.0997 22.168 30.9844 21.2839 30.9844 20.1929C30.9844 19.1035 30.0997 18.2196 29.0096 18.2196C27.9179 18.2196 27.0348 19.1035 27.0348 20.1929C27.0348 21.2839 27.9179 22.168 29.0096 22.168Z" fill="#292D32"></path>
										</g>
										<defs>
											<clipPath id="clip0_608_594">
												<rect width="25" height="9" fill="white" transform="translate(8 15)"></rect>
											</clipPath>
										</defs>
									</svg>
								</button>
							</li>-->
                                <li>
                                    <button onclick="Copy1()" type="button" class="cpanel-item link" data-track-content="" data-content-name="" data-content-piece="" title="Copy">
                                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_608_611)">
                                                <path d="M16.5002 28.0001C15.3002 28.0001 14.2002 27.5001 13.3002 26.7001C11.5002 24.9001 11.5002 22.1001 13.3002 20.3001L14.0002 19.6001L15.4002 21.0001L14.7002 21.7001C13.7002 22.7001 13.7002 24.3001 14.7002 25.3001C15.7002 26.3001 17.3002 26.3001 18.3002 25.3001L21.3002 22.3001C22.3002 21.3001 22.3002 19.7001 21.3002 18.7001L20.6002 18.0001L22.0002 16.6001L22.7002 17.3001C24.5002 19.1001 24.5002 21.9001 22.7002 23.7001L19.7002 26.7001C18.9002 27.5001 17.7002 28.0001 16.5002 28.0001Z" fill="#292D32"></path>
                                                <path d="M18.0002 23.4L17.3002 22.7C15.5002 20.9 15.5002 18.1 17.3002 16.3L20.3002 13.3C21.2002 12.4 22.3002 12 23.5002 12C24.7002 12 25.8002 12.5 26.7002 13.3C28.5002 15.1 28.5002 17.9 26.7002 19.7L26.0002 20.4L24.6002 19L25.3002 18.3C26.3002 17.3 26.3002 15.7 25.3002 14.7C24.3002 13.7 22.7002 13.7 21.7002 14.7L18.7002 17.7C17.7002 18.7 17.7002 20.3 18.7002 21.3L19.4002 22L18.0002 23.4Z" fill="#292D32"></path>
                                            </g>
                                        </svg>
                                    </button>
                                    <p class="notification-message-1">Đã copy</p>
                                </li>
                                <li>
                                    <a href="#comment"><button type="button" class="cpanel-item comment" data-track-content="" data-content-name="article-actions" data-content-piece="article-actions-comment" data-content-target="" title="Bình luận">
                                            <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M17.5834 25.8334H17.1667C13.8334 25.8334 12.1667 25.0001 12.1667 20.8334V16.6667C12.1667 13.3334 13.8334 11.6667 17.1667 11.6667H23.8334C27.1667 11.6667 28.8334 13.3334 28.8334 16.6667V20.8334C28.8334 24.1667 27.1667 25.8334 23.8334 25.8334H23.4167C23.1584 25.8334 22.9084 25.9584 22.75 26.1667L21.5 27.8334C20.95 28.5667 20.05 28.5667 19.5 27.8334L18.25 26.1667C18.1167 25.9834 17.8084 25.8334 17.5834 25.8334Z" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M16.3333 16.6667H24.6666" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M16.3333 20.8333H21.3333" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </button></a>
                                </li>
                                <!--<li>
								<a rel="nofollow" href="/print-20230523144436970.htm" class="cpanel-item print comment-empty" data-track-content="" data-content-name="article-actions" data-content-piece="article-actions-print" data-content-target="" title="In">
									<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M16.5417 15.8334H24.4584V14.1667C24.4584 12.5001 23.8334 11.6667 21.9584 11.6667H19.0417C17.1667 11.6667 16.5417 12.5001 16.5417 14.1667V15.8334Z" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
										<path d="M28 18.3333V22.4999C28 24.1666 27.1667 24.9999 25.5 24.9999V23H15.5V25C13.8333 25 13 24.1666 13 22.4999V18.3333C13 16.6666 13.8333 15.8333 15.5 15.8333H25.5C27.1667 15.8333 28 16.6666 28 18.3333Z" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
										<path d="M25.5 23L24.29 23L15.5 23" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
										<path d="M16.3333 19.1667H18.8333" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
										<path d="M25.5 23V25.8571C25.5 27.2857 24.25 28 21.75 28H19.25C16.75 28 15.5 27.2857 15.5 25.8571V23H25.5Z" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
									</svg>
								</a>
							</li>-->
                                <li>
                                    <button class="cpanel-item back" onclick="javascript:window.history.back();">
                                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M18.475 14.9417L13.4167 20L18.475 25.0583" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M27.5834 20H13.5583" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </button>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <div class="col-12 col-lg-3">
                        @include('frontend.post.components.sidebar_post')
                    </div>
                </div>
            </div>
            
        </div>

    </div>
    <script>
        function Copy() {
            var Url = '';
            Url = window.location.href;
            console.log(Url);
            navigator.clipboard.writeText(Url);
            showNotification1();
        }

        function showNotification1() {
            var notificationEl1 = document.querySelector('p.notification-message');

            notificationEl1.classList.add('notify');
            setTimeout(function() {
                notificationEl1.classList.remove('notify');
            }, 600);
        }

        function Copy1() {
            var Url = '';
            Url = window.location.href;
            console.log(Url);
            navigator.clipboard.writeText(Url);
            showNotification2();
        }

        function showNotification2() {
            var notificationEl2 = document.querySelector('p.notification-message-1');

            notificationEl2.classList.add('notify-1');
            setTimeout(function() {
                notificationEl2.classList.remove('notify-1');
            }, 550);
        }
    </script>

</main>

@endsection
@section('js')

@endsection