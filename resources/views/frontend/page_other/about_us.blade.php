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
                                    <div class="row align-items-center">
                                        <div class="col-lg-3 col-md-4 col-sm-12 text-center"><img alt="Chapter I Image" class="img-fluid rounded" src="https://theme.hstatic.net/200000296482/1000794328/14/banner-100-nam-su-khai-sinh.jpg"></div>
                                        <div class="col-lg-9 col-md-8 col-sm-12">
                                            <h2 class="h3 fw-bold">Chương I: Sự khai sinh của công ty “Morimura Gumi” và công ty “Anh em nhà Morimura”</h2>
                                            <p class="text-dark">Vào đầu thế kỷ 20, công ty Morimura Gumi và Anh em nhà Morimura đã đặt những nền tảng đầu tiên cho sự phát triển của ngành công nghiệp gốm sứ Nhật Bản. Tầm nhìn của họ không chỉ đơn thuần là kinh doanh mà còn là sự cống hiến cho nghệ thuật và sự hoàn mỹ.</p><a class="btn btn-custom text-white" href="https://noritake.vn/pages/su-khai-sinh-cua-cong-ty-morimura-gumi-va-cong-ty-anh-em-nha-morimura">Đọc tiếp</a>
                                        </div>
                                    </div><!-- Chapter II -->
                                    <div class="row align-items-center">
                                        <div class="col-lg-3 col-md-4 col-sm-12 text-center"><img alt="Chapter II Image" class="img-fluid rounded" src="https://theme.hstatic.net/200000296482/1000794328/14/banner-100-nam-thoi-dai-vat-pham.jpg"></div>
                                        <div class="col-lg-9 col-md-8 col-sm-12">
                                            <h2 class="h3 fw-bold">Chương II: Thời đại của vật phẩm</h2>
                                            <p class="text-dark">Thời đại của vật phẩm mở ra một chương mới với việc mở rộng các sản phẩm gốm sứ ra thị trường quốc tế. Họ tập trung vào chất lượng và sáng tạo trong từng chi tiết, tạo nên sự khác biệt và đưa thương hiệu Nhật Bản lên một tầm cao mới.</p><a class="btn btn-custom text-white" href="https://noritake.vn/pages/thoi-dai-cua-vat-pham">Đọc tiếp</a>
                                        </div>
                                    </div><!-- Chapter III -->
                                    <div class="row align-items-center">
                                        <div class="col-lg-3 col-md-4 col-sm-12 text-center"><img alt="Chapter III Image" class="img-fluid rounded" src="https://theme.hstatic.net/200000296482/1000794328/14/banner-100-nam-muc-tieu-san-xuat.jpg"></div>
                                        <div class="col-lg-9 col-md-8 col-sm-12">
                                            <h2 class="h3 fw-bold">Chương III: Mục tiêu sản xuất bộ đồ bàn ăn phương Tây màu trắng tinh tế</h2>
                                            <p class="text-dark">Định hướng mới về sản xuất bộ đồ bàn ăn phương Tây với thiết kế tinh tế đã giúp họ tiếp cận được những người tiêu dùng yêu thích sự sang trọng. Sự tỉ mỉ và chất lượng của từng sản phẩm đã tạo nên uy tín không chỉ tại Nhật Bản mà còn trên khắp thế giới.</p><a class="btn btn-custom text-white" href="https://noritake.vn/pages/muc-tieu-san-xuat-bo-do-ban-an-phuong-tay-mau-trang-tinh-te">Đọc tiếp</a>
                                        </div>
                                    </div><!-- Chapter IV -->
                                    <div class="row align-items-center">
                                        <div class="col-lg-3 col-md-4 col-sm-12 text-center"><img alt="Chapter IV Image" class="img-fluid rounded" src="https://theme.hstatic.net/200000296482/1000794328/14/banner-100-nam-thanh-lap-cong-ty.jpg"></div>
                                        <div class="col-lg-9 col-md-8 col-sm-12">
                                            <h2 class="h3 fw-bold">Chương IV: Thành lập Công ty Hợp danh Gốm sứ Nhật Bản - Sự ra đời của thương hiệu Noritake</h2>
                                            <p class="text-dark">Thương hiệu Noritake được sinh ra từ khát vọng mang đến những sản phẩm chất lượng hàng đầu, phản ánh tinh thần Nhật Bản trong từng nét vẽ. Noritake nhanh chóng trở thành biểu tượng của sự tinh tế và sang trọng trong lĩnh vực sản xuất gốm sứ.</p><a class="btn btn-custom text-white" href="https://noritake.vn/pages/thanh-lap-cong-ty-hop-danh-gom-su-nhat-ban">Đọc tiếp</a>
                                        </div>
                                    </div><!-- Quote Section -->
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