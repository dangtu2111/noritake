<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div
                        class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                        <h4 class="mb-sm-0">Xóa dữ liệu</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('user.catalogue.index') }}">Danh sách</a>
                                </li>
                                <li class="breadcrumb-item active">Xóa dữ liệu</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="align-items-center">
                                <h5>Lưu ý:(<span class="text-danger fz-18">*</span>)</h5>
                                <span style="line-height: 1.4rem">Sao khi xóa thì bạn sẽ không thể phục hồi lại như ban
                                    đầu. Hãy cân nhắc kỹ trước khi xóa!<p class="fst-italic">Nếu bạn đã chắc chắn muốn
                                        hãy thực hiện thao tác ngay dưới.</p> </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" >
                <div class="col-lg-5">
                    <div class="card" style="height: 125px">
                        <div class="card-body">
                            <div class="align-items-center">
                                <h5>Thông tin</h5>
                                <div class="pt-3 pb-3">
                                    <span style="line-height: 1.4rem">Thông tin bạn đang muốn xóa là<span
                                            class="text-danger fw-bold fz-14"> {{ $userCatalogue->name }}.</span> Không thể khôi phục!</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <form action="{{ route('user.catalogue.destroy', ['id' => $userCatalogue->id]) }}" method="POST" >
                        @csrf
                        @method('DELETE')
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card" style="height: 125px">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="form-label" style="padding-bottom: 2px">Tên nhóm:</label>
                                            <input type="text" class="form-control" name="name" id=""
                                                value="{{ $userCatalogue->name }}" readonly>
                                            @if ($errors->has('name'))
                                                <span class="text-danger fz-12 mt-1">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="text-end mb-3">
                                    <button type="submit" name="submit" value="cancel" class="btn btn-outline-primary w-sm">Hủy</button>
                                    <button type="submit" name="submit" value="confirm" class="btn btn-success w-sm">Xác nhận</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
