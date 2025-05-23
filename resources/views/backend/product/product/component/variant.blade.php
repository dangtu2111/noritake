<div class="card variant-box">
    <div class="card-header">
        <div>
            <h5>Sản phẩm có nhiều phiên bản</h5>
        </div>
        <div class="description">Cho phép bạn bán các phiên bản khác nhau của sản phẩm, ví dụ: : quần, áo thì có các
            <strong class="text-danger">màu sắc</strong> và <strong class="text-danger">size</strong> số khác nhau. Mỗi
            phiên bản sẽ là 1 dòng trong mục danh sách phiên bản phía dưới
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="variant-checkbox uk-flex uk-flex-middle d-flex">
                    <input type="checkbox" value="1" name="accept" id="variantCheckbox"
                        class="variantInputCheckbox"
                        {{ old('accept') == 1 || (isset($product) && count($product->productVariant) > 0) ? 'checked' : '' }}>
                    <label for="variantCheckbox" class="turnOnVariant">Sản phẩm này có nhiều biến thể. Ví dụ như khác
                        nhau về màu sắc, kích thước</label>
                </div>
            </div>
        </div>
        @php
            $variantCatalogue = old(
                'attributeCatalogue',
                isset($product->attributeCatalogue) ? json_decode($product->attributeCatalogue, true) : [],
            );
        @endphp
        <div class="variant-wrapper {{ isset($variantCatalogue) && count($variantCatalogue) ? '' : 'd-none' }}">
            <div class="row variant-container">
                <div class="col-lg-3">
                    <div class="attribute-title">Chọn thuộc tính</div>
                </div>
                <div class="col-lg-9">
                    <div class="attribute-title">Chọn giá trị của thuộc tính (nhập 2 từ để tìm kiếm)</div>
                </div>
            </div>
            <div class="variant-body">

                @if ($variantCatalogue && count($variantCatalogue))
                    @foreach ($variantCatalogue as $keyAttr => $valAttr)
                        <div class="row variant-item pt-3 pb-3">
                            <div class="col-lg-3">
                                <div class="attribute-catalogue">
                                    <select name="attributeCatalogue[]" id=""
                                        class="nice-select choose-attribute niceSelect">
                                        <option value="">Nhóm thuộc tính</option>
                                        @foreach ($attributeCatalogue as $key => $val)
                                            <option value="{{ $val->id }}"
                                                {{ $valAttr == $val->id ? 'selected' : '' }}>{{ $val->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                {{-- <input type="text" name="" disabled class="fake-variant form-control"> --}}
                                <select name="attribute[{{ $valAttr }}][]"
                                    class="form-control selectVariant variant-{{ $valAttr }}" id=""
                                    multiple data-catid="{{ $valAttr }}"></select>
                            </div>
                            <div class="col-lg-1">
                                <button type="button" class="remove-attribute btn btn-danger"><svg
                                        data-icon="TrashSolidLarge" aria-hidden="true" focusable="false" width="15"
                                        height="16" viewBox="0 0 15 16" class="bem-Svg" style="display: block;">
                                        <path fill="currentColor"
                                            d="M2 14a1 1 0 001 1h9a1 1 0 001-1V6H2v8zM13 2h-3a1 1 0 01-1-1H6a1 1 0 01-1 1H1v2h13V2h-1z">
                                        </path>
                                    </svg></button>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="variant-foot mt10">
                <button type="button" class="add-variant">Thêm phiên bản mới</button>
            </div>
        </div>
    </div>
</div>
<div class="card product-variant">
    <div class="card-header">
        <h5>Danh sách phiên bản</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped variantTable">
                <thead></thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>

@php
    $variantQuantities = [];
    if(isset($product) && $product) {
    if($product->productVariant) {
        foreach ($product->productVariant as $valVariant) {
            $variantQuantities[] = [
                'id' => $valVariant->id,
                'quantity' => $valVariant->quantity,
            ];
        }
    }
}
@endphp

{{-- script chuyển dlieu về dạng json được compact từ controller lên blade --}}
<script>
    var attributeCatalogue = @json(
        $attributeCatalogue->map(function ($item) {
            return [
                'id' => $item->id,
                'name' => $item->name,
            ];
        })->values()
    );

    window.variantQuantities = @json($variantQuantities);

    var attribute = @json(old('attribute', isset($product->attribute) ? $product->attribute : []));
    var variant = @json(old('variant', isset($product->variant) ? json_decode($product->variant, true) : []));

    // Chuyển album từ chuỗi thành mảng
    if (variant.album && typeof variant.album[0] === 'string') {
        variant.album = variant.album[0].split(',').map(url => url.trim());
    }

    console.log('attributeCatalogue:', attributeCatalogue);
    console.log('variantQuantities:', window.variantQuantities);
    console.log('attribute:', attribute);
    console.log('variant:', variant);

    document.addEventListener("DOMContentLoaded", function () {
        const checkbox = document.getElementById("variantCheckbox");
        const variantWrapper = document.querySelector(".variant-wrapper");

        if (checkbox && variantWrapper) {
            checkbox.addEventListener("change", function () {
                variantWrapper.classList.toggle("d-none", !this.checked);
            });
            variantWrapper.classList.toggle("d-none", !checkbox.checked);
        } else {
            console.warn('Không tìm thấy checkbox hoặc variantWrapper');
        }
    });
</script>
