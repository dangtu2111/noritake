<?php
namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\AttributeRepository;

class AttributeController extends Controller
{
    protected $attributeRepository;

    public function __construct(
        AttributeRepository $attributeRepository,
    ) {
        $this->attributeRepository = $attributeRepository;
    }

    public function getAttribute(Request $request)
    {
        // bắt payload
        $payload = $request->input();
        // lấy ra các thông tin attribute bằng phương thức searchAttributes
        $attributes = $this->attributeRepository->searchAttributes($payload['search'], $payload['option']);
        // Nếu không có attribute_language, lấy tên trực tiếp từ thuộc tính
        $attributeMapped = $attributes->map(function ($attribute) {
            return [
                'id' => $attribute->id,
                'text' => $attribute->name, // Lấy trực tiếp tên từ thuộc tính
            ];
        })->all();

        return response()->json(array('items' => $attributeMapped));
    }
    public function loadAttribute(Request $request)
    {
        // Lấy dữ liệu attribute từ request
        $attributeInput = $request->input('attribute');

        // Kiểm tra và xử lý dữ liệu attribute
        if (is_string($attributeInput)) {
            // Trường hợp dữ liệu là chuỗi JSON (ít xảy ra)
            $payload['attribute'] = json_decode($attributeInput, true) ?? [];
        } else {
            // Trường hợp dữ liệu là mảng (thường gặp sau khi sửa Blade)
            $payload['attribute'] = $attributeInput ?? [];
        }

        $payload['attributeCatalogueId'] = $request->input('attributeCatalogueId');

        // Kiểm tra attributeCatalogueId hợp lệ
        if (!isset($payload['attributeCatalogueId']) || !isset($payload['attribute'][$payload['attributeCatalogueId']])) {
            return response()->json(['items' => []]);
        }

        $attributeArray = $payload['attribute'][$payload['attributeCatalogueId']];

        // Lấy danh sách attribute từ repository
        $temp = [];
        if (!empty($attributeArray)) {
            $attributes = $this->attributeRepository->findAttributeByIdArray($attributeArray);

            if (!empty($attributes)) {
                foreach ($attributes as $val) {
                    $temp[] = [
                        'id' => $val->id,
                        'text' => $val->name
                    ];
                }
            }
        }

        return response()->json(['items' => $temp]);
    }
}
