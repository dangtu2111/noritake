<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div
                        class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                        <h4 class="mb-sm-0">Chỉnh sửa sản phẩm</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Danh sách</a>
                                </li>
                                <li class="breadcrumb-item active">Chỉnh sửa</li>
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
                                <span>Lưu ý: Điền đầy đủ và chính xác thông
                                    tin giúp hệ
                                    thống có thể dễ dàng quản lý hơn. <p class="fst-italic">Những trường có (<span
                                            class="text-danger fz-18">*</span>)
                                        là bắt buộc!</p> </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <form action="{{ route('product.edit', ['slug' => $product->slug]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label">Tên sản phẩm:<span
                                            class="text-danger fz-18">*</span></label>
                                    <input type="text" class="form-control" name="name" id=""
                                        value="{{ old('name', $product->name) }}" placeholder="Tên sản phẩm">
                                    @if ($errors->has('name'))
                                    <span class="text-danger fz-12 mt-1">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="addproduct-general-info" role="tabpanel">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Slug:<span
                                                            class="text-danger fz-18">*</span></label>
                                                    <input type="text" name="slug" class="form-control" id=""
                                                        value="{{ old('slug', $product->slug) }}"
                                                        placeholder="Slug sản phẩm">
                                                    @if ($errors->has('slug'))
                                                    <span
                                                        class="text-danger fz-12 mt-1">{{ $errors->first('slug') }}</span>
                                                    @endif
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- <div>
                                    <label class="form-label" for="info">Thông tin</label>
                                    <div>
                                        <textarea class="form-control" id="info" data-height="100"
                                            name="info">{{ old('info', $product->info) }}</textarea>
                                        @if ($errors->has('info'))
                                        <span class="text-danger fz-12 mt-1">{{ $errors->first('info') }}</span>
                                        @endif
                                    </div>
                                </div> -->
                                @php
                                $infos = json_decode($product->info, true); // Chuyển JSON thành mảng

                                @endphp
                                <div class="row" id="keyInfoContainer">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label class="form-label" for="ckContent">Key info</label>
                                        <a href="#" id="multipleInserKeyInfo">Thêm key</a>
                                    </div>
                                    @if (is_array($infos))
                                    @foreach ($infos as $item)
                                    <div class="row key-info-row mt-2">
                                        <div class="col-lg-4">
                                            <input type="text" name="key_info[]" class="form-control"
                                                value="{{ old('key_info') ?? $item['key_info'] }}" placeholder="key_info sản phẩm">
                                            @if ($errors->has('key_info'))
                                            <span class="text-danger fz-12 mt-1">{{ $errors->first('key_info') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-lg-7">
                                            <input type="text" name="info_ms[]" class="form-control"
                                                value="{{ old('info_ms') ?? $item['info_ms'] }}" placeholder="info_ms sản phẩm">
                                            @if ($errors->has('info_ms'))
                                            <span class="text-danger fz-12 mt-1">{{ $errors->first('info_ms') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-lg-1">
                                            <button type="button" class="btn btn-danger btn-sm remove-row">Xóa</button>
                                        </div>
                                    </div>
                                    @endforeach
                                    @else
                                    <div class="row key-info-row mt-2">
                                        <div class="col-lg-4">
                                            <input type="text" name="key_info[]" class="form-control"
                                                value="{{ old('key_info') }}" placeholder="key_info sản phẩm">
                                            @if ($errors->has('key_info'))
                                            <span class="text-danger fz-12 mt-1">{{ $errors->first('key_info') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="text" name="info_ms[]" class="form-control"
                                                value="{{ old('info_ms') }}" placeholder="info_ms sản phẩm">
                                            @if ($errors->has('info_ms'))
                                            <span class="text-danger fz-12 mt-1">{{ $errors->first('info_ms') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    @endif
                                    

                                </div>
                                <div class="mt-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label class="form-label" for="ckContent">Mô tả </label>
                                        {{-- data- đc gọi là thuộc tính dữ liệu tùy chỉnh  --}}
                                        <a href="#" class="multipleUploadImageCkeditor" data-target="ckContent">Upload
                                            nhiều hình ảnh</a>
                                    </div>
                                    <div>
                                        <textarea class="form-control ck-editor" id="ckContent" data-height="300"
                                            name="description">{{ old('description', $product->description) }}</textarea>
                                    </div>
                                </div>
                                <!-- album ảnh -->
                                <div class="card">
                                    <div class="card-header">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5>Albums ảnh</h5>
                                            <div class="upload-album">
                                                <a href="#" class="upload-variant-picture">Chọn hình</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div
                                                    class="click-to-upload-variant text-center {{ count($albumArray) ? 'd-none' : '' }}">
                                                    <div class="icon">
                                                        <a type="button" class="upload-variant-picture">
                                                            <img src="/libaries/upload/images/img-notfound.png" alt=""
                                                                class="render-image object-fit-cover rounded-1 mb-2 position-relative "
                                                                width="96" height="96">
                                                        </a>
                                                    </div>
                                                    <div class="small-text">
                                                        <span>Sử dụng nút chọn hình hoặc click vào đây để thêm hình
                                                            ảnh.</span>
                                                    </div>
                                                </div>
                                                <div
                                                    class="upload-variant-list {{ count($albumArray) ? '' : 'd-none' }}">
                                                    <div class="row">
                                                        <ul id="sortable2"
                                                            class="clearfix data-album sortui ui-sortable d-lg-flex justify-content-start flex-wrap">
                                                            @foreach ($albumArray as $image)
                                                            @if (!empty($image))
                                                            <li class="album-item-seft list-unstyled m-2">
                                                                <div class="thumb position-relative">
                                                                    <span class="span image img-scaledown">
                                                                        <img src="{{ $image }}" alt="Ảnh sản phẩm"
                                                                            class="object-fit-contain" width="130px"
                                                                            height="110px">
                                                                        <input type="hidden" name="album[]"
                                                                            value="{{ $image }}">
                                                                        <button type="button"
                                                                            class="delete-variant-image position-absolute top-0 start-0">
                                                                            <i class="fa-solid fa-trash"></i>
                                                                        </button>
                                                                    </span>
                                                                </div>
                                                            </li>
                                                            @endif
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- {{-- sản phẩm nhiều phiên bản  --}}
                                @include('backend.product.product.component.variant')
                                {{-- kết thúc nhiều phiên bản  --}} -->
                            </div>
                        </div>
                        <div class="text-end mb-3">
                            <button type="submit" class="btn btn-success w-sm">Xác nhận</button>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Nhóm sản phẩm</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between">
                                        <label for="choices-catalogue-input" class="form-label">Tên nhóm <span class="text-danger fz-18">*</span></label>
                                        <span class="mt-2"><a href="{{ route('product.catalogue.create') }}"
                                                class="text-decoration-underline text-primary">Thêm mới</a></span>
                                    </div>
                                    <select class="form-select setUpSelect2" name="product_catalogue_id[]" multiple="multiple">
                                        <option value="0">[Chọn nhóm sản phẩm]</option>
                                        @foreach ($productCatalogues as $catalogue)
                                        <option value="{{ $catalogue->id }}"
                                            {{ in_array($catalogue->id, old('product_catalogue_id', $product->productCatalogues->pluck('id')->toArray())) ? 'selected' : '' }}>
                                            {{ $catalogue->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('product_catalogue_id')
                                    <span class="text-danger fz-12 mt-1">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <div class="d-flex justify-content-between">
                                        <label for="choices-child-product-input" class="form-label">Sản phẩm con <span class="text-danger fz-18">*</span></label>
                                        <span class="mt-2"><a href="{{ route('product.create') }}"
                                                class="text-decoration-underline text-primary">Thêm mới</a></span>
                                    </div>
                                    <select class="form-select setUpSelect2" name="child_id[]" multiple="multiple">
                                        <option value="0">[Chọn sản phẩm con]</option>
                                        @foreach ($products as $productItem)
                                        <option value="{{ $productItem->id }}"
                                            {{ in_array($productItem->id, old('child_id', $product->children->pluck('id')->toArray())) ? 'selected' : '' }}>
                                            {{ $productItem->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('child_id')
                                    <span class="text-danger fz-12 mt-1">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between">
                                        <label for="choices-publish-status-input" class="form-label">Thương hiệu<span
                                                class="text-danger fz-18 ">*</span>
                                        </label>
                                        <span class="mt-2"><a href="{{ route('brand.create') }}"
                                                class="text-decoration-underline text-primary">Chỉnh sửa</a></span>
                                    </div>
                                    <select class="form-select setUpSelect2" name="brand_id">
                                        <option value="0">[Chọn thương hiệu]</option>
                                        @foreach ($brands as $key => $brand)
                                        <option value="{{ $brand->id }}"
                                            {{ $brand->id == $product->brand_id ? 'selected' : '' }}>
                                            {{ $brand->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('brand_id'))
                                    <span class="text-danger fz-12 mt-1">{{ $errors->first('brand_id') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Thông tin chung</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="product_sku" class="form-label">Mã sản phẩm</label>
                                    <input type="text" name="sku" id="product_sku" class="form-control"
                                        placeholder="Nhập mã sản phẩm" value="{{ old('sku', $product->sku) }}">
                                    @if ($errors->has('sku'))
                                    <span class="text-danger fz-12 mt-1">{{ $errors->first('sku') }}</span>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Giá</label>
                                    <input type="text" name="price" class="form-control"
                                        placeholder="Nhập giá cho sản phẩm" value="{{ old('price', $product->price) }}"
                                        min="0">
                                    @if ($errors->has('price'))
                                    <span class="text-danger fz-12 mt-1">{{ $errors->first('price') }}</span>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Giá giảm</label>
                                    <input type="text" name="del" class="form-control"
                                        value="{{ old('del', $product->del) }}" min="0">
                                    <span class="text-warning fz-12 mt-1">Có thể bỏ trống nếu không giảm giá!</span>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Tiêu điểm</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="choices-is_hot-status-input " class="form-label">Nổi bật</label>
                                    <select class="form-select setUpSelect2" name="is_hot">
                                        <option value="0" {{ $product->is_hot == 0 ? 'selected' : '' }}>Không</option>
                                        <option value="1" {{ $product->is_hot == 1 ? 'selected' : '' }}>Có</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Xuất bản</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="choices-publish-status-input " class="form-label">Trạng thái</label>
                                    <select class="form-select select2" name="publish">
                                        <option value="">[Chọn trạng thái]</option>
                                        <option value="1" {{ $product->publish == 1 ? 'selected' : '' }}>Hiển thị
                                        </option>
                                        <option value="0" {{ $product->publish == 0 ? 'selected' : '' }}>Ẩn
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Hình ảnh</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-4">
                                    <p class="text-muted">Chọn ảnh đại diện.</p>
                                    <div class="text-center">
                                        <div class="position-relative d-inline-block">
                                            {{-- image-target dùng dể choose image hthi cho ngxem  --}}
                                            <span class="image-target">
                                                <img src="{{ old('image', $product->image ?? '') ? '' . old('image', $product->image ?? '') : '/libaries/upload/images/img-notfound.png' }}"
                                                    alt=""
                                                    class="render-image  object-fit-contain rounded-1 mb-2 position-relative "
                                                    width="96" height="96">
                                            </span>
                                            {{-- input ẩn gửi lên controller xử lý  --}}
                                            <input type="hidden" name="image" value="{{ $product->image }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('multipleInserKeyInfo').addEventListener('click', function(e) {
            e.preventDefault(); // Ngăn hành vi mặc định của thẻ <a>

            // Tạo HTML cho dòng mới
            const newRow = `
            <div class="row key-info-row mt-2">
                <div class="col-lg-4">
                    <input type="text" name="key_info[]" class="form-control" 
                        placeholder="key_info sản phẩm">
                </div>
                <div class="col-lg-8">
                    <input type="text" name="info_ms[]" class="form-control" 
                        placeholder="info_ms sản phẩm">
                </div>
            </div>
        `;

            // Thêm dòng mới vào container
            document.getElementById('keyInfoContainer').insertAdjacentHTML('beforeend', newRow);
        });
    });
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.remove-row').forEach(button => {
            button.addEventListener('click', function() {
                this.closest('.key-info-row').remove();
            });
        });
    });
</script>