@extends('frontend.home.layout')
@section('page_title')
Giới thiệu
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

    <div class="container-fluid breadcrumb">
        <div class="row row-breadcrumb">
            <div class="col-12 col-lg-12 col-breadcrumb">
                <div class="breadcrumb-content-inner">
                    <div class="breadcrumb-shop clearfix">
                        <div class="breadcrumb-list">
                            <ol class="breadcrumb breadcrumb-arrows" itemscope="" itemtype="http://schema.org/BreadcrumbList">
                                <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                                    <a href="/" target="_self" itemprop="item"><span itemprop="name">Trang chủ</span></a>
                                    <meta itemprop="position" content="1">
                                </li>
                                <li class="active" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                                    <span itemprop="item" content="https://noritake.vn/pages/lich-su-100-nam-hinh-thanh-va-phat-trien"><strong itemprop="name">Lịch sử 100 năm hình thành và phát triển</strong></span>
                                    <meta itemprop="position" content="2">
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="wrapper-page-content page-seo mt-lg-1">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-8 trai-page">
                    <div class="page-wrapper">
                        <div class="wrapbox-content-page">
                            <div class="content-page">

                                <!-- Main Content -->
                                <div id="history-main"><!-- Chapter I -->
                                    @if(isset($postInCatagories))
                                    @foreach($postInCatagories as $post)
                                    <div class="row align-items-center">
                                        <div class="col-lg-3 col-md-4 col-sm-12 text-center"><img alt="Chapter I Image" class="img-fluid rounded" src="{{ $post->image }}"></div>
                                        <div class="col-lg-9 col-md-8 col-sm-12">
                                            <h2 class="h3 fw-bold">{{ $post->name }}</h2>
                                            <p class="text-dark">{!! Str::limit(strip_tags($post->description), 255) !!}</p><a class="btn btn-custom text-white" href="{{ route('post.detail', ['slug' => $post->slug]) }}">Đọc tiếp</a>
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif
                                    Quote Section
                                    <p class="fst-italic text-secondary">“Chân thành và không ngừng theo đuổi hoài bão, chúng ta phấn đấu vì lợi ích của dân tộc và hạnh phúc của người dân.”- Ichizaemon Morimura</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                    @include("frontend.page_other.component.category_list")
                    
                
            </div>
        </div>
    </div>

    <!-- Hidden container for include -->


    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script>
        $(document).ready(function() {
            // Check if the current canonical URL matches the target URL
            var canonicalUrl = $('link[rel="canonical"]').attr('href');
            var targetUrl = "https://noritake.vn/pages/qua-tang-tan-gia-cao-cap";

            if (canonicalUrl === targetUrl) {
                // Find the second <h2> element and insert the content of hidden container after it
                $('h2').eq(1).before($('#hidden-container').html()).show();
            }
        });
    </script>
</main>
@endsection