<main class="mainContent-theme">
    <div class="overlay123"></div>
    @foreach($components as $component)
        @switch($component->type)
            @case('banner')
                <x-banner />
                @break

            @case('category-home')
                <x-category-home />
                @break

            @case('product-category')
                <x-product-category 
                    :id_category="$component->props['id_category'] ?? null" 
                    :title="$component->props['title'] ?? 'Danh mục sản phẩm'" 
                />
                @break

            @case('banner2')
                <x-banner2 />
                @break

            @case('text-banner')
                <x-text-banner />
                @break

            @case('post-home')
                <x-post-home />
                @break

            @default
                <!-- Bỏ qua nếu type không hợp lệ -->
        @endswitch
    @endforeach
    
</main>