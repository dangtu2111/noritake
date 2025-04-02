<div class="banner-collection-header text-center" style="position: relative;">
    @if(isset($banner))
    @php
   
        $images = json_decode($banner->album, true);
        $image = is_array($images) ? ($images[0] ?? '') : $images;
    @endphp
    <img src="{{  $image}}" alt="{{ $banner->name }}" />

    @else
    <img src="https://file.hstatic.net/200000296482/collection/collection_banner_bo_am_chen_13_mon-2_9c3d305a3b994399a2741e41af3ab5d8.jpg" alt="[GỢI Ý] 39+ Mẫu Hộp Quà Tết Cao Cấp - Cho Năm Ất Tỵ 2025" />
    @endif

</div>
<div class="collection-breadcrumb">
    <div class="breadcrumb-content-inner">
        <div class="breadcrumb-shop clearfix">
            <div class="breadcrumb-list">
                <ol class="breadcrumb breadcrumb-arrows" itemscope itemtype="http://schema.org/BreadcrumbList">
                    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <a href="{{ route('home_index.index') }}" target="_self" itemprop="item"><span itemprop="name">Trang chủ</span></a>
                        <meta itemprop="position" content="1" />
                    </li>
                    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <a href="#" target="_self" itemprop="item">
                            <span itemprop="name">Các bộ sưu tập</span>
                        </a>
                        <meta itemprop="position" content="2" />
                    </li>
              


                </ol>
            </div>
        </div>
    </div>

</div>