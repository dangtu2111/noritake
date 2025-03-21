<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                        <h4 class="mb-sm-0">Thêm mới thành phần</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('home-components.index') }}">Danh sách</a></li>
                                <li class="breadcrumb-item active">Thêm mới</li>
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
            <form action="{{ $type == 'Create' ? route('home-components.store') : route('home-components.update', ['id' => $component->id ?? '']) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if($type != 'Create')
                    @method('PUT')
                @endif
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label">Tên thành phần:<span class="text-danger fz-18">*</span></label>
                                    <input type="text" class="form-control" name="name" id=""
                                           value="{{ old('name', $component->name ?? '') }}" placeholder="Tên thành phần">
                                    @if ($errors->has('name'))
                                        <span class="text-danger fz-12 mt-1">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Loại (Type):<span class="text-danger fz-18">*</span></label>
                                    <select class="form-select setUpSelect2" name="type" id="type-select">
                                        <option value="">[Chọn loại]</option>
                                        <option value="banner" {{ old('type', optional($component)->type ?? '') == 'banner' ? 'selected' : '' }}>Banner</option>
                                        <option value="category-home" {{ old('type', optional($component)->type ?? '') == 'category-home' ? 'selected' : '' }}>Category Home</option>
                                        <option value="product-category" {{ old('type', optional($component)->type ?? '') == 'product-category' ? 'selected' : '' }}>Product Category</option>
                                        <option value="banner2" {{ old('type', optional($component)->type ?? '') == 'banner2' ? 'selected' : '' }}>Banner 2</option>
                                        <option value="text-banner" {{ old('type', optional($component)->type ?? '') == 'text-banner' ? 'selected' : '' }}>Text Banner</option>
                                        <option value="post-home" {{ old('type', optional($component)->type ?? '') == 'post-home' ? 'selected' : '' }}>Post Home</option>
                                    </select>
                                    @if ($errors->has('type'))
                                        <span class="text-danger fz-12 mt-1">{{ $errors->first('type') }}</span>
                                    @endif
                                </div>
                                <div class="mb-3 field-title">
                                    <label class="form-label">Tiêu đề (Title):</label>
                                    <input type="text" class="form-control" name="props[title]" id=""
                                           value="{{ old('props.title', $component->props['title'] ?? '') }}" placeholder="Tiêu đề">
                                    @if ($errors->has('props.title'))
                                        <span class="text-danger fz-12 mt-1">{{ $errors->first('props.title') }}</span>
                                    @endif
                                </div>
                                <div class="mb-3 field-category">
                                    <label class="form-label">Danh mục (Category):</label>
                                    <select class="form-select setUpSelect2" name="props[id_category]">
                                        <option value="">[Chọn danh mục]</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                    {{ old('props.id_category', $component->props['id_category'] ?? '') == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('props.id_category'))
                                        <span class="text-danger fz-12 mt-1">{{ $errors->first('props.id_category') }}</span>
                                    @endif
                                </div>
                                <div class="mb-3 field-link">
                                    <label class="form-label">Đường dẫn (Link):</label>
                                    <input type="text" class="form-control" name="props[link]" id=""
                                           value="{{ old('props.link', $component->props['link'] ?? '') }}" placeholder="Đường dẫn">
                                    @if ($errors->has('props.link'))
                                        <span class="text-danger fz-12 mt-1">{{ $errors->first('props.link') }}</span>
                                    @endif
                                </div>
                                <div class="mb-3 field-description">
                                    <label class="form-label">Mô tả:</label>
                                    <textarea class="form-control ck-editor" id="description" data-height="150" name="props[description]">{{ old('props.description', $component->props['description'] ?? '') }}</textarea>
                                    @if ($errors->has('props.description'))
                                        <span class="text-danger fz-12 mt-1">{{ $errors->first('props.description') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card field-image">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Hình ảnh</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-4">
                                    <p class="text-muted">Chọn ảnh đại diện.</p>
                                    <div class="text-center">
                                        <div class="position-relative d-inline-block">
                                            <span class="image-target">
                                                <img src="{{ $component->props['image'] ?? '/libaries/upload/images/img-notfound.png' }}"
                                                     alt=""
                                                     class="render-image object-fit-cover rounded-1 mb-2 position-relative"
                                                     width="96" height="96">
                                            </span>
                                            <input type="hidden" name="props[image]" value="{{ $component->props['image'] ?? '' }}">
                                        </div>
                                    </div>
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
                                <h5 class="card-title mb-0">Thứ tự</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label">Thứ tự:<span class="text-danger fz-18">*</span></label>
                                    <input type="number" class="form-control" name="order" id=""
                                           value="{{ old('order', $component->order ?? '') }}" placeholder="Thứ tự">
                                    @if ($errors->has('order'))
                                        <span class="text-danger fz-12 mt-1">{{ $errors->first('order') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Xuất bản</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="choices-publish-status-input" class="form-label">Trạng thái</label>
                                    <select class="form-select setUpSelect2" name="active">
                                        <option value="">[ Chọn Trạng thái ]</option>
                                        <option value="1" {{ old('active', $component->active ?? '') == '1' ? 'selected' : '' }}>Hiển thị</option>
                                        <option value="0" {{ old('active', $component->active ?? '') == '0' ? 'selected' : '' }}>Ẩn</option>
                                    </select>
                                    @if ($errors->has('active'))
                                        <span class="text-danger fz-12 mt-1">{{ $errors->first('active') }}</span>
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

<!-- Script để điều khiển hiển thị các trường -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Khởi tạo Select2 (giả sử Select2 đã được load)
    const typeSelect = document.getElementById('type-select');
    if (typeof Select2 !== 'undefined') {
        new Select2(typeSelect);
    }

    // Lấy các phần tử cần thao tác
    const titleDiv = document.querySelector('.field-title');
    const categoryDiv = document.querySelector('.field-category');
    const linkDiv = document.querySelector('.field-link');
    const descriptionDiv = document.querySelector('.field-description');
    const imageCard = document.querySelector('.field-image');

    // Hàm kiểm tra và ẩn/hiện các trường
    function toggleFields() {
        const selectedValue = typeSelect.value;

        // Ẩn tất cả các trường trước khi áp dụng điều kiện
        titleDiv.style.display = 'none';
        categoryDiv.style.display = 'none';
        linkDiv.style.display = 'none';
        descriptionDiv.style.display = 'none';
        imageCard.style.display = 'none';

        // Điều kiện hiển thị dựa trên type
        if (selectedValue === 'banner') {
            // Không hiển thị gì thêm
        } else if (selectedValue === 'category-home') {
            titleDiv.style.display = 'block';
        } else if (selectedValue === 'product-category') {
            titleDiv.style.display = 'block';
            categoryDiv.style.display = 'block';
        } else if (selectedValue === 'banner2') {
            imageCard.style.display = 'block';
        } else if (selectedValue === 'text-banner') {
            titleDiv.style.display = 'block';
            linkDiv.style.display = 'block';
            imageCard.style.display = 'block';
            descriptionDiv.style.display = 'block';
        } else if (selectedValue === 'post-home') {
            // Không hiển thị gì thêm
        }
    }

    // Gọi hàm khi trang load để kiểm tra giá trị ban đầu
    toggleFields();

    // Sử dụng sự kiện change của Select2 (hoặc change thông thường nếu không có Select2)
    typeSelect.addEventListener('change', function(e) {
        toggleFields();
    });

    // Nếu dùng Select2, thêm sự kiện select2:select
    if (typeof jQuery !== 'undefined' && jQuery.fn.select2) {
        jQuery(typeSelect).on('select2:select', function(e) {
            toggleFields();
        });
    }
});
</script>