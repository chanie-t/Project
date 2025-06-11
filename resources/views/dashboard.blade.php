{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}
<x-admin.admin-layout>
    <x-slot name="mainContent">
        <div class="main-content">

    <div class="main-content-inner">

        <div class="main-content-wrap">
            <div class="tf-section-2 mb-30">
                <div class="flex flex-wrap gap-5">
                    <div class="col mb-20">
                        <div class="wg-chart-default">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap14">

                                    <div>
                                        <div class="body-text mb-2">Số lượng danh mục</div>
                                        <h4>{{$categoryCount }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-20">
                        <div class="wg-chart-default">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap14">

                                    <div>
                                        <div class="body-text mb-2">Số lượng nhãn hàng</div>
                                        <h4>{{$brandCount }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-20">
                        <div class="wg-chart-default">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap14">

                                    <div>
                                        <div class="body-text mb-2">Số lượng sản phẩm</div>
                                        <h4>{{$productCount}}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="tf-section mb-30">

                <div class="wg-box">
                    <div class="flex items-center justify-between">
                        <h5>Sản phẩm được thêm gần đây</h5>
                        <div class="dropdown default">
                            <a class="btn btn-secondary dropdown-toggle" href="#">
                                <span class="view-all">Xem tất cả</span>
                            </a>
                        </div>
                    </div>
                    <div class="wg-table table-all-product">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 80px">ID</th>
                                        <th>Tên sản phẩm</th>
                                        <th class="text-center">Giá</th>
                                        <th class="text-center">Số lượng</th>
                                        <th class="text-center">Trạng thái</th>
                                        <th class="text-center">Ngày thêm</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product)
                                    <tr>
                                        <td class="text-center">{{ $product->id }}</td>
                                        <td class="text-center">{{ $product->name }}</td>
                                        <td class="text-center">{{ number_format($product->price, 0, ',', '.') }}₫</td>
                                        <td class="text-center">{{ $product->quantity }}</td>
                                        <td class="text-center">
                                            {{ $product->status == 1 ? 'Còn hàng' : 'Hết hàng' }}
                                        </td>
                                        <td class="text-center">{{ $product->created_at->format('Y-m-d') }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('products.show', $product->id) }}" class="list-icon-function">
                                                <div class="list-icon-function view-icon">
                                                    <div class="item eye">
                                                        <i class="icon-eye"></i>
                                                    </div>
                                                </div>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
s
    </div>
    </x-slot>
    <x-slot name="script">

    </x-slot>
</div>
</x-admin.admin-layout>
