@extends('frontend.home.layout')
@section('page_title')
Bài viết
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
                                    <ol class="breadcrumb breadcrumb-arrows" itemscope
                                        itemtype="http://schema.org/BreadcrumbList">
                                        <li itemprop="itemListElement" itemscope
                                            itemtype="http://schema.org/ListItem">
                                            <a href="../index.html" target="_self" itemprop="item"><span
                                                    itemprop="name">Trang chủ</span></a>
                                            <meta itemprop="position" content="1" />
                                        </li>


                                        <li itemprop="itemListElement" itemscope
                                            itemtype="http://schema.org/ListItem">
                                            <a href="all.html" itemprop="item">
                                                <span itemprop="name">Blog</span>
                                            </a>
                                            <meta itemprop="position" content="2" />
                                        </li>

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

                            <h1>Bài Viết Mới Nhất</h1>


                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button"
                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    Chủ đề
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    @if(isset($postCategories))
                                    @foreach($postCategories as $categoryP)
                                    <a class="dropdown-item" href="{{ route('post.category',['id'=>$categoryP->id]) }}">{{ $categoryP->name }}</a>
                                    @endforeach
                                    @endif
                                    
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid blog-all">
                <div class="row row-blog-all">
                    <div class="col-12 col-lg-1">
                        <!--<img style="width: 100%" src="https://file.hstatic.net/200000296482/file/collection_banner_trefolio_gold_b9abb9c3ee1f45118360e2762314bdfd.jpg" />-->
                    </div>
                    <div class="col-12 col-lg-7">
                        <div class="content-list-blog">
                            @include('frontend.post.components.post_new')
                        </div>
                        @if(isset($postCategories))
                        @foreach($postCategories as $categoryP)
                        <div class="blog-child">
                            @include('frontend.post.components.post_category',['categoryP'=>$categoryP])

                        </div>
                        @endforeach
                        @endif



                    </div>
                    <div class="col-12 col-lg-3 col-sidebar">
                        @include('frontend.post.components.sidebar_post')

                    </div>
                </div>
            </div>



        </div>
    </div>
</main>

@endsection