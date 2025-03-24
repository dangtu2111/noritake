@extends('fontend.home.layout')
@section('page_title')
    Đăng nhập
@endsection
@section('content')
    <section>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-xl-4 col-lg-6 col-md-8 col-12">
                    <div class="card border-0 shadow-sm mt-4 card-bg-fill">
                        <div class="card-body p-4">
                            <div class="text-center mt-2">
                                <h5 class="text-body fz-18">Đăng nhập</h5>
                                <p class="text-muted fz-14">Chào mừng bạn đã trở lại!</p>
                            </div>
                            <div class="p-2 mt-4">
                                <form action="{{ route('store.login') }}" method="POST">
                                    {{ csrf_field() }}
                                    
                                    
                                    <div class="mt-4 text-center">
                                        <div class="signin-other-title">
                                            <h5 class="fz-13 mb-4 title">Đăng nhập với </h5>
                                        </div>
                                        <div>
                                            <a href="{{ route('auth.google') }}" type="button"
                                                class="btn btn-danger btn-icon waves-effect waves-light"><i
                                                    class="fa-brands fa-google-plus"></i></a>
                                            <a href="{{ route('auth.facebook') }}" type="button"
                                                class="btn btn-dark btn-icon waves-effect waves-light"><i
                                                    class="fa-brands fa-facebook-f"></i></a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="mt-4 text-center fz-14">
                                <p class="mb-0">Chưa có tài khoản ? <a href="{{ route('auth.register') }}"
                                        class="fw-semibold text-primary text-decoration-underline"> Đăng ký </a> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
