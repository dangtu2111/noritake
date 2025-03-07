<?php
if (!function_exists('sortString')) {
    function sortString($string = '')
    {
        $extract = explode(',', $string);
        // loại bỏ khoản trắng quanh phaan tử
        $extract = array_map('trim', $extract);
        sort($extract, SORT_NUMERIC);
        $newArray = implode(',', $extract);
        return $newArray;
    }
}
if (!function_exists('sortAttributeId')) {
    function sortAttributeId(array $attribute_id = [])
    {
        $attributeId = array_map('trim', $attribute_id);
        sort($attributeId, SORT_NUMERIC);
        $attributeId = implode(',', $attributeId);
        return $attributeId;
    }
}

// vnpay
if (!function_exists('vnpayConfig')) {
    function vnpayConfig()
    {
        return [
            'vnp_Url' => 'https://sandbox.vnpayment.vn/paymentv2/vpcpay.html',
            'vnp_Returnurl' => config('app.url') . '/return/vnpay',
            'vnp_TmnCode' => '1C5MASGJ',
            'vnp_HashSecret' => '05GRXUNICKIUM8NHTF6GL73GXPIVQTX0',
            'vnp_apiUrl' => 'https://sandbox.vnpayment.vn/merchant_webapi/merchant.html',
            'apiUrl' => 'https://sandbox.vnpayment.vn/merchant_webapi/api/transaction'
        ];
    }
}

// momo
if (!function_exists('momoConfig')) {
    function momoConfig()
    {
        return [
            'partnerCode' => 'MOMOBKUN20180529',
            'accessKey' => 'klm05TvNBzhg7h7j',
            'secretKey' => 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa',
        ];
    }
}
if (!function_exists('execPostRequest')) {
    function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data)
            )
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);

        //close connection
        curl_close($ch);
        return $result;
    }
}

// Hàm chuyển đổi một mảng hoặc đối tượng thành một mảng liên kết theo cặp key-value
if (!function_exists('convert_array')) {
    function convert_array($system = null, string $keyword = '', string $value = ''): array {
        $temp = [];
        
        // Nếu $system là mảng, duyệt qua từng phần tử và lấy giá trị theo key-value
        if (is_array($system)) {
            foreach ($system as $val) {
                if (isset($val[$keyword], $val[$value])) {
                    $temp[$val[$keyword]] = $val[$value];
                }
            }
        }

        // Nếu $system là đối tượng, thực hiện tương tự nhưng dùng thuộc tính của đối tượng
        if (is_object($system)) {
            foreach ($system as $val) {
                if (isset($val->$keyword, $val->$value)) {
                    $temp[$val->$keyword] = $val->$value;
                }
            }
        }

        return $temp;
    }
}

// Hàm tạo input text trong form
if (!function_exists('renderSystemInput')) {
    function renderSystemInput(string $name = '', ?array $systems = null): string {
        $value = $systems[$name] ?? '';
        return '<input 
            type="text" 
            name="config[' . htmlspecialchars($name) . ']" 
            value="' . htmlspecialchars(old($name, $value)) . '" 
            class="form-control"
            placeholder="" 
            autocomplete="off">';
    }
}

// Hàm tạo input text dành cho đường dẫn hình ảnh
if (!function_exists('renderSystemImage')) {
    function renderSystemImage(string $name = '', ?array $systems = null): string {
        $value = old($name, is_array($systems) ? ($systems[$name] ?? '') : '');
        $imageSrc = $value ?: '/libaries/upload/images/img-notfound.png';

        return '<input 
            type="text" 
            name="config[' . e($name) . ']" 
            value="' . e($value) . '" 
            class="form-control upload-image hidden"
            placeholder="" 
            autocomplete="off">
            <span class="image-target">
                <img src="' . e($imageSrc) . '"
                alt=""
                class="render-image object-fit-contain rounded-1 mb-2 position-relative "
                width="96" height="96">
            </span>';
    }
}


// Hàm tạo textarea trong form
if (!function_exists('renderSystemTextarea')) {
    function renderSystemTextarea(string $name = '', ?array $systems = null): string {
        return '<textarea name="config[' . htmlspecialchars($name) . ']" class="form-control">'
            . htmlspecialchars(old($name, $systems[$name] ?? '')) . 
            '</textarea>';
    }
}

// Hàm tạo thẻ <a> nếu tồn tại thông tin link
if (!function_exists('renderSystemLink')) {
    function renderSystemLink(array $item = []): string {
        return isset($item['link']['href'], $item['link']['text']) 
            ? '<a href="' . htmlspecialchars($item['link']['href']) . '">' . htmlspecialchars($item['link']['text']) . '</a>' 
            : '';
    }
}

// Hàm hiển thị tiêu đề với class "text-danger notice"
if (!function_exists('renderSystemTitle')) {
    function renderSystemTitle(array $item = []): string {
        return isset($item['title']) 
            ? '<span class="text-danger notice">' . htmlspecialchars($item['title']) . '</span>' 
            : '';
    }
}

// Hàm tạo dropdown select trong form
if (!function_exists('renderSystemSelect')) {
    function renderSystemSelect(array $item, string $name = '', ?array $systems = null): string {
        $selectedValue = $systems[$name] ?? '';
        $html = '<select name="config[' . htmlspecialchars($name) . ']" class="form-control">';
        
        // Nếu tồn tại option, duyệt qua để tạo các thẻ <option>
        if (isset($item['option']) && is_array($item['option'])) {
            foreach ($item['option'] as $key => $val) {
                $selected = ($key == $selectedValue) ? 'selected' : '';
                $html .= '<option value="' . htmlspecialchars($key) . '" ' . $selected . '>' . htmlspecialchars($val) . '</option>';
            }
        }
        
        $html .= '</select>';
        return $html;
    }
}