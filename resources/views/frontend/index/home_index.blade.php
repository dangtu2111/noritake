@extends('frontend.home.layout')
@section('page_title')
@if(isset($title))
{{ $title }}
@else
Page
@endif
@endsection
@section('content')
<x-home-content />
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