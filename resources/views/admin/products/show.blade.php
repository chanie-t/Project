<x-admin.admin-layout>
    <x-slot name="mainContent">
        <style>
            .product-cover {
                background-color: #f8f9fa;
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 2rem;
            }

            .product-card {
                max-width: 1000px;
                width: 100%;
                background-color: #fff;
                border-radius: 1rem;
                box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
                overflow: hidden;
            }

            .product-image {
                object-fit: cover;
                width: 100%;
                height: 100%;
                max-height: 500px;
                border-top-left-radius: 1rem;
                border-bottom-left-radius: 1rem;
            }

            .product-detail {
                padding: 2rem;
            }

            .product-status span {
                font-size: 0.9rem;
                padding: 0.4rem 0.8rem;
                border-radius: 0.5rem;
                font-weight: 500;
            }
        </style>

        <div class="product-cover">
            <div class="product-card row g-0">
                <div class="col-md-6">
                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="product-image">
                </div>
                <div class="col-md-6 d-flex flex-column justify-content-between">
                    <div class="product-detail">
                        <h2 class="fw-bold mb-3">{{ $product->name }}</h2>
                        <p class="text-muted mb-1"><strong>Slug:</strong> {{ $product->slug }}</p>
                        <p class="text-muted mb-1"><strong>Giá:</strong> <span class="text-danger">{{ number_format($product->price, 0, ',', '.') }}₫</span></p>
                        <p class="text-muted mb-1"><strong>Danh mục:</strong> {{ $product->category->name }}</p>
                        <p class="text-muted mb-1"><strong>Thương hiệu:</strong> {{ $product->brand->name }}</p>
                        <p class="text-muted mb-1"><strong>Số lượng:</strong> {{ $product->quantity }}</p>

                        <div class="product-status mt-3 mb-3">
                            @if ($product->status == 'stock')
                                <span class="bg-success text-white">Đang bán</span>
                            @elseif ($product->status == 'out_of_stock')
                                <span class="bg-warning text-dark">Hết hàng</span>
                            @else
                                <span class="bg-danger text-white">Dừng bán</span>
                            @endif
                        </div>

                        <p><strong>Mô tả ngắn:</strong><br>{{ $product->short_description }}</p>

                        <div class="mt-3">
                            <h5 class="fw-semibold mb-2">Mô tả chi tiết</h5>
                            <div class="bg-light p-3 rounded" style="min-height: 100px;">
                                {!! nl2br(e($product->description)) !!}
                            </div>
                        </div>
                    </div>

                    <div class="text-end p-4">
                        <a href="{{ route('products.index') }}" class="btn btn-outline-secondary px-4 py-2">
                            <i class="bi bi-arrow-left"></i> Quay lại
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
    <x-slot name="script"></x-slot>
</x-admin.admin-layout>
