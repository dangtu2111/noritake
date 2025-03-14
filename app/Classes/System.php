<?php
namespace App\Classes;


class System{

	public function config(){
        $data['homepage']=[
          'label'=>'Thông tin chung',
          'description'=>'Cài đặt đầy đủ thông tin website',
          'value'=>[
            'company'=>['type'=>'text','label'=>'Tên công ty'],
            'brand'=>['type'=>'text','label'=>'Tên thương hiệu'],
            'slogan'=>['type'=>'text','label'=>'Slogan'],
            'logo'=>['type'=>'image','label'=>'Logo website','title'=>'Click vào ảnh kế bên để tải logo'],
            'logo_payment1'=>['type'=>'image','label'=>'Logo thanh toán website 1','title'=>'Click vào ảnh kế bên để tải logo'],
            'logo_payment2'=>['type'=>'image','label'=>'Logo thanh toán website 2','title'=>'Click vào ảnh kế bên để tải logo'],
            'logo_payment3'=>['type'=>'image','label'=>'Logo thanh toán website 3','title'=>'Click vào ảnh kế bên để tải logo'],
            'website'=>[
                'type'=>'select',
                'label'=>'Tình trạng website',
                'option'=>[
                    'open'=>'Mở cửa website',
                    'close'=>'Website đang bảo trì'
                ]
            ]
          ]  
        ];

        $data['contact']=[
            'label'=>'Thông tin liên hệ',
            'description'=>'Cài đặt thông tin liên hệ',
            'value'=>[
              'address'=>['type'=>'text','label'=>'Đia chỉ công ty'],
              'address1'=>['type'=>'text','label'=>'Đia chỉ công ty 1'],
              'address2'=>['type'=>'text','label'=>'Đia chỉ công ty 2'],
              'hotline'=>['type'=>'text','label'=>'Hotline'],
              // 'technial_phone'=>['type'=>'text','label'=>'Hotline kỹ thuật'],
              // 'sell_phone'=>['type'=>'text','label'=>'Hotline kinh doanh'],
              // 'fax'=>['type'=>'text','label'=>'Fax'],
              'email'=>['type'=>'text','label'=>'Email'],
              'website'=>['type'=>'text','label'=>'Website'],
              'logo1'=>['type'=>'image','label'=>'Logo website Liên hệ','title'=>'Click vào ảnh kế bên để tải logo'],
              'slug_logo1'=>['type'=>'text','label'=>'Đường dẫn'],
              'logo2'=>['type'=>'image','label'=>'Logo website Liên hệ','title'=>'Click vào ảnh kế bên để tải logo'],
              'slug_logo2'=>['type'=>'text','label'=>'Đường dẫn'],
              'logo3'=>['type'=>'image','label'=>'Logo website Liên hệ','title'=>'Click vào ảnh kế bên để tải logo'],
              'slug_logo3'=>['type'=>'text','label'=>'Đường dẫn'],
              'logo4'=>['type'=>'image','label'=>'Logo website Liên hệ','title'=>'Click vào ảnh kế bên để tải logo'],
              'slug_logo4'=>['type'=>'text','label'=>'Đường dẫn'],
              'map'=>[
                'type'=>'textarea',
                'label'=>'Bản đồ',
                'link'=>[
                    'text'=>'Hướng dẫn thiết lập bản đồ',
                    'href'=>'https://manhan.vn/hoc-website-nang-cao/huong-dan-nhung-ban-do-vao-website/'
                    ]
                ]
              
            ]  
          ];
        // $data['seo']=[
        //     'label'=>'Cấu hình SEO cho trang chủ',
        //     'description'=>'Cài đặt đầy đủ thông tin SEO website',
        //     'value'=>[
        //       'meta_title'=>['type'=>'text','label'=>'Tiêu đề SEO'],
        //       'meta_keyword'=>['type'=>'text','label'=>'Từ khóa SEO'],
        //       'meta_description'=>['type'=>'text','label'=>'Mô tả SEO'],
        //       'meta_images'=>['type'=>'image','label'=>'Ảnh SEO'],            
        //     ]  
        //   ];
        return $data;
    }

}