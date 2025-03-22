<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                        <h4 class="mb-sm-0">{{ $type == 'Create' ? 'Thêm mới trang tĩnh' : 'Cập nhật trang tĩnh' }}</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('static-pages.index') }}">Danh sách</a></li>
                                <li class="breadcrumb-item active">{{ $type == 'Create' ? 'Thêm mới' : 'Cập nhật' }}</li>
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
                                <h5>Thông tin</h5>
                                <span>Lưu ý: Điền đầy đủ và chính xác thông tin giúp hệ thống có thể dễ dàng quản lý hơn.
                                    <p class="fst-italic">Những trường có (<span class="text-danger fz-18">*</span>) là bắt buộc!</p>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <form action="{{ $type == 'Create' ? route('static-pages.store') : route('static-pages.update', $staticPage) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if($type == 'Update')
                @method('PUT')
                @endif
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label">Tiêu đề:<span class="text-danger fz-18">*</span></label>
                                    <input type="text" class="form-control" name="title" id=""
                                        value="{{ old('title', $type == 'Create' ? '' : $staticPage->title) }}" placeholder="Tiêu đề trang tĩnh">
                                    @if ($errors->has('title'))
                                    <span class="text-danger fz-12 mt-1">{{ $errors->first('title') }}</span>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Slug:<span class="text-danger fz-18">*</span></label>
                                    <input type="text" name="slug" class="form-control" id=""
                                        value="{{ old('slug', $type == 'Create' ? '' : $staticPage->slug) }}" placeholder="Slug trang tĩnh">
                                    @if ($errors->has('slug'))
                                    <span class="text-danger fz-12 mt-1">{{ $errors->first('slug') }}</span>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label>Nội dung</label>
                                    <textarea class="form-control ck-editor" id="content" data-height="150" name="content">{{ old('content', $type == 'Create' ? '' : $staticPage->content) }}</textarea>
                                    @if ($errors->has('content'))
                                    <span class="text-danger fz-12 mt-1">{{ $errors->first('content') }}</span>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Meta Title</label>
                                    <input type="text" class="form-control" name="meta_title" id=""
                                        value="{{ old('meta_title', $type == 'Create' ? '' : $staticPage->meta_title) }}" placeholder="Tiêu đề SEO">
                                    @if ($errors->has('meta_title'))
                                    <span class="text-danger fz-12 mt-1">{{ $errors->first('meta_title') }}</span>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="choices-active-pr-input" class="form-label">Active PR</label>
                                    <select class="form-select setUpSelect2" name="active_pr">
                                        <option value="">[Chọn trạng thái]</option>
                                        <option value="1" {{ old('active_pr', $type == 'Create' ? '' : $staticPage->active_pr) == '1' ? 'selected' : '' }}>Hoạt động</option>
                                        <option value="0" {{ old('active_pr', $type == 'Create' ? '' : $staticPage->active_pr) == '0' ? 'selected' : '' }}>Không hoạt động</option>
                                    </select>
                                    @if ($errors->has('active_pr'))
                                    <span class="text-danger fz-12 mt-1">{{ $errors->first('active_pr') }}</span>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Meta Description</label>
                                    <textarea class="form-control" name="meta_description" id="meta_description">{{ old('meta_description', $type == 'Create' ? '' : $staticPage->meta_description) }}</textarea>
                                    @if ($errors->has('meta_description'))
                                    <span class="text-danger fz-12 mt-1">{{ $errors->first('meta_description') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="text-end mb-3">
                            <button type="submit" class="btn btn-success w-sm">Xác nhận</button>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Xuất bản</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="choices-publish-status-input" class="form-label">Trạng thái</label>
                                    <select class="form-select setUpSelect2" name="is_active">
                                        <option value="">[Chọn trạng thái]</option>
                                        <option value="1" {{ old('is_active', $type == 'Create' ? 1 : $staticPage->is_active) == '1' ? 'selected' : '' }}>Hiển thị</option>
                                        <option value="0" {{ old('is_active', $type == 'Create' ? 1 : $staticPage->is_active) == '0' ? 'selected' : '' }}>Ẩn</option>
                                    </select>
                                    @if ($errors->has('is_active'))
                                    <span class="text-danger fz-12 mt-1">{{ $errors->first('is_active') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>