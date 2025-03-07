@extends('frontend.home.layout')
@section('page_title')
Giới thiệu
@endsection
@section('content')
@include("frontend.page_other.component.banner")       

<div class="wrapper-page-content page-seo mt-lg-1">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-8 trai-page">
                <div class="page-wrapper">
                    <div class="wrapbox-content-page">
                    @include("frontend.page_other.component.content")

                        
                    </div>
                </div>
            </div>
            @include("frontend.page_other.component.category_list")

        </div>
    </div>
</div>
@endsection