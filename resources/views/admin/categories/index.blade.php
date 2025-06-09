<x-admin.admin-layout>
    <x-slot name="mainContent">
        <div class="main-content-inner">

    <div class="main-content-wrap">
                                <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                                    <h3>Categories</h3>
                                    <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                                        <li>
                                            <a href="index.html">
                                                <div class="text-tiny">Dashboard</div>
                                            </a>
                                        </li>
                                        <li>
                                            <i class="icon-chevron-right"></i>
                                        </li>
                                        <li>
                                            <div class="text-tiny">Categories</div>
                                        </li>
                                    </ul>
                                </div>

                                <div class="wg-box">
                                    <div class="flex items-center justify-between gap10 flex-wrap">
                                        <div class="wg-filter flex-grow">
                                            <form class="form-search">
                                                <fieldset class="name">
                                                    <input type="text" placeholder="Search here..." class="" name="name"
                                                        tabindex="2" value="" aria-required="true" required="">
                                                </fieldset>
                                                <div class="button-submit">
                                                    <button class="" type="submit"><i class="icon-search"></i></button>
                                                </div>
                                            </form>
                                        </div>
                                        <a class="tf-button style-1 w208" href="{{route('categories.create')}}"><i
                                                class="icon-plus"></i>Thêm danh mục</a>
                                    </div>
                                    <div class="wg-table table-all-user">
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Tên danh mục</th>
                                                    <th>Slug</th>
                                                    <th>Mô tả</th>
                                                    <th>Thao tác</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($categories as $category)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td class="pname">
                                                        <div class="name">
                                                            <a href="#" class="body-title-2">{{$category->name}}</a>
                                                        </div>
                                                    </td>
                                                    <td>{{$category->slug}}</td>
                                                    <td><a href="#" target="_blank">{{$category->description}}</a></td>
                                                    <td>
                                                        <div class="list-icon-function">
                                                            <!-- Nút sửa -->
                                                            <a href="{{ route('categories.edit', $category->id) }}" class="action-icon" title="Chỉnh sửa">
                                                                <i class="icon-edit-3"></i>
                                                            </a>

                                                            <!-- Nút xóa -->
                                                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="p-0" onsubmit="return confirm('Bạn có chắc muốn xóa?')" style="display: inline;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="action-icon text-danger p-2" title="Xóa">
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
                            </div>
</div>
    </x-slot>
    <x-slot name="script">
        
    </x-slot>
</x-admin.admin-layout>