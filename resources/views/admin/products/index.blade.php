<x-admin.admin-layout>
    <x-slot name="mainContent">
        <div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>All Products</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li>
                    <a href="{{route('dashboard')}}" class="flex items-center gap5">
                        <div class="text-tiny">Dashboard</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <div class="text-tiny">Danh mục sản phẩm</div>
                </li>
            </ul>
        </div>

        <div class="wg-box">
            <div class="flex items-center justify-between gap10 flex-wrap">
                <div class="wg-filter flex-grow">
                    <form class="form-search" action="{{ route('products.index') }}" method="GET">
                        <fieldset class="name">
                            <input type="text" placeholder="Search here..." class="" name="keyword"
                                tabindex="2" value="{{ request('keyword') }}" aria-required="true" >
                        </fieldset>
                        <div class="button-submit">
                            <button class="" type="submit"><i class="icon-search"></i></button>
                        </div>
                    </form>
                </div>
                <a class="tf-button style-1 " href="{{route('products.create')}}"><i
                        class="icon-plus"></i>Thêm mới sản phẩm</a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên</th>
                            <th>Giá</th>
                            <th>Danh mục</th>
                            <th>Nhãn hàng</th>
                            <th>Mô tả ngắn</th>
                            <th>Số lượng</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td class="pname">
                                <div class="image">
                                    <img src="{{$product->image_url}}" alt="{{$product->name}}" class="image">
                                </div>
                                <div class="name overflow-hidden">
                                    <a href="#" class="body-title-2 truncate" title="{{$product->name}}">{{$product->name}}</a>
                                    <div class="text-tiny mt-3 truncate " title="{{$product->slug}}">{{$product->slug}}</div>
                                </div>
                            </td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->category->name}}</td>
                            <td>{{$product->brand->name}}</td>
                            <td>{{$product->short_description}}</td>
                            <td class="text-center">{{$product->quantity}}</td>
                            <td class="text-center">
                                @if ($product->status == 'stock')
                                    <span class="badge bg-success px-4 py-2 fs-4 fw-semibold d-inline-flex align-items-center">
                                        <i class="bi bi-check-circle-fill me-3"></i> Còn hàng
                                    </span>
                                @elseif ($product->status == 'out_of_stock')
                                    <span class="badge bg-warning text-dark px-4 py-2 fs-4 fw-semibold d-inline-flex align-items-center">
                                        <i class="bi bi-exclamation-triangle-fill me-3"></i> Hết hàng
                                    </span>
                                @else
                                    <span class="badge bg-danger px-4 py-2 fs-4 fw-semibold d-inline-flex align-items-center">
                                        <i class="bi bi-x-circle-fill me-3"></i> Dừng bán
                                    </span>
                                @endif
                            </td>
                            <td>
                                <div class="list-icon-function">
                                    <a href="{{route('products.show',$product->id)}}" >
                                        <div class="item eye">
                                            <i class="icon-eye"></i>
                                        </div>
                                    </a>
                                    <a href="{{ route('products.edit', $product->id) }}">
                                        <div class="item edit">
                                            <i class="icon-edit-3"></i>
                                        </div>
                                    </a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xoá sản phẩm này?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="">
                                            <i class="icon-trash-2"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="divider"></div>
            <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">
            </div>
        </div>
        {{$products->links()}}
    </div>
</div>
    </x-slot>
    <x-slot name="script">

    </x-slot>
</x-admin.admin-layout>
