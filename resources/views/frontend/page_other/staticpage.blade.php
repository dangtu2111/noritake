@extends('frontend.home.layout')
@section('page_title')
{{ $page?$page->title:"WhitePage" }}
@endsection
@section('content')
<link href='/theme.hstatic.net/200000296482/1001063914/14/style-themes.css?v=5243' rel='stylesheet' type='text/css'  media='all'  />
@include("frontend.page_other.component.topbar")       

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