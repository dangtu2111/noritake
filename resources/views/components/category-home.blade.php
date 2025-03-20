<section class="section main_section main_section_box">
        <div class="section_title">
            <h2 class="main-h2">Bạn đang cần tìm gì?</h2>
        </div>
        <div class="wrap-box">
            <!-- Mỗi khối in-box đại diện cho một sản phẩm -->
            @if ($productCatalogues)
            @foreach ($productCatalogues as $keyPCate => $valPCate)
            
            <div class="in-box">
                <a href="{{ route('product.category',['id'=>$valPCate->id]) }}">
                    <span>
                        <img src="{{ $valPCate->image}}"
                            alt="{{ $valPCate->name}}">
                    </span>
                    <h3>{{ $valPCate->name}}</h3>
                </a>
            </div>
            @endforeach
            @endif
            
        </div>
    </section>