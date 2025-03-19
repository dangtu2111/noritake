<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HomeComponent;

class HomeComponentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $components = [
            [
                'type' => 'banner',
                'props' => null,
                'order' => 1,
                'active' => true,
            ],
            [
                'type' => 'category-home',
                'props' => null,
                'order' => 2,
                'active' => true,
            ],
            [
                'type' => 'product-category',
                'props' => ['id_category' => 1, 'title' => 'Sản phẩm mới'],
                'order' => 3,
                'active' => true,
            ],
            [
                'type' => 'banner2',
                'props' => null,
                'order' => 4,
                'active' => true,
            ],
            [
                'type' => 'product-category',
                'props' => ['id_category' => 1, 'title' => 'Sản phẩm nổi bật'],
                'order' => 5,
                'active' => true,
            ],
            [
                'type' => 'product-category',
                'props' => ['id_category' => 1, 'title' => 'Sản phẩm khác'],
                'order' => 6,
                'active' => true,
            ],
            [
                'type' => 'text-banner',
                'props' => null,
                'order' => 7,
                'active' => true,
            ],
            [
                'type' => 'product-category',
                'props' => ['id_category' => 11, 'title' => 'Sản phẩm khuyến mãi'],
                'order' => 8,
                'active' => true,
            ],
            [
                'type' => 'banner2',
                'props' => null,
                'order' => 9,
                'active' => true,
            ],
            [
                'type' => 'product-category',
                'props' => ['id_category' => 1, 'title' => 'Sản phẩm thêm'],
                'order' => 10,
                'active' => true,
            ],
            [
                'type' => 'text-banner',
                'props' => null,
                'order' => 11,
                'active' => true,
            ],
            [
                'type' => 'post-home',
                'props' => null,
                'order' => 12,
                'active' => true,
            ],
        ];

        // Xóa dữ liệu cũ trước khi seed (tùy chọn)
        HomeComponent::truncate();

        // Thêm dữ liệu vào bảng
        foreach ($components as $component) {
            HomeComponent::create($component);
        }
    }
}