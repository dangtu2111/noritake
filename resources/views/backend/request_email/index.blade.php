<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 p-0">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4 class="card-title mb-0 text-uppercase">Danh sách email yêu cầu nhận khuyển mãi</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active">Danh sách email yêu cầu nhận khuyển mãi</li>
                                </ol>
                            </div>
                        </div>
                        
                        <div class="card-body">
                            <div class="listjs-table" id="customerList">
                            @include('backend.request_email.component.filter')
                            @include('backend.request_email.component.table')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
