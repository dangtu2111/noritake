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
              'email'=>['type'=>'text','label'=>'Email'],
              'website'=>['type'=>'text','label'=>'Website'],
              'logo1'=>['type'=>'image','label'=>'Logo website Liên hệ 1','title'=>'Click vào ảnh kế bên để tải logo'],
              'slug_logo1'=>['type'=>'text','label'=>'Đường dẫn Logo website Liên hệ 1'],
              'logo2'=>['type'=>'image','label'=>'Logo website Liên hệ 2','title'=>'Click vào ảnh kế bên để tải logo'],
              'slug_logo2'=>['type'=>'text','label'=>'Đường dẫn Logo website Liên hệ 2'],
              'logo3'=>['type'=>'image','label'=>'Logo website Liên hệ 3','title'=>'Click vào ảnh kế bên để tải logo'],
              'slug_logo3'=>['type'=>'text','label'=>'Đường dẫn Logo website Liên hệ 3'],
              'logo4'=>['type'=>'image','label'=>'Logo website Liên hệ 4','title'=>'Click vào ảnh kế bên để tải logo'],
              'slug_logo4'=>['type'=>'text','label'=>'Đường dẫn Logo website Liên hệ 4'],
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
        
        return $data;
    }

}