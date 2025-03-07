@extends('frontend.home.layout')
@section('page_title')
Bee Cloudy
@endsection
@section('content')
<main class="mainContent-theme">
    <div class="overlay123"></div>
    <!-- Slider chính -->
    @include('frontend.index.components.banner')
    @include('frontend.index.components.category')
    @include('frontend.index.components.product_category',['products' => $productNew])
    <!-- Banner 1 -->

    @include('frontend.index.components.banner_1')
    <!-- End Banner 1 -->

    @include('frontend.index.components.product_category')
    @include('frontend.index.components.product_category')
    <!-- Trai Text + Banner -->
    @include('frontend.index.components.text_banner')
    @include('frontend.index.components.product_category')

  
    <!-- End Trai Text + Banner Section 5 -->
    <!-- Banner 2 -->
    @include('frontend.index.components.banner_2')

<!-- End Banner 2 -->
    @include('frontend.index.components.product_category')
    @include('frontend.index.components.text_banner')
    @include('frontend.index.components.post')
</main>
@endsection
@section('js')
<script>
    new Vue({
        el: '#app',
        data: {
            list: [],
            list_chil: [],
        },
        created() {
            this.LoadPost();
            this.LoadPost2();
        },
        methods: {
            LoadPost() {
                axios
                    .get('/post-home/data')
                    .then((res) => {
                        this.list = res.data.data;
                    });
            },
            LoadPost2() {
                axios
                    .get('/post-home/data-2')
                    .then((res) => {
                        this.list_chil = res.data.data;
                    });
            }
        },
    });
</script>
@endsection