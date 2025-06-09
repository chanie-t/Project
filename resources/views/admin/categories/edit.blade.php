<x-admin.admin-layout>
    <x-slot name="mainContent">
    <div class="main-content">
                        <div class="main-content-inner">
                            <!-- main-content-wrap -->
                            <div class="main-content-wrap">
                                <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                                    <h3>Chỉnh sửa danh mục</h3>
                                    <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                                        <li>
                                            <a href="#">
                                                <div class="text-tiny">Dashboard</div>
                                            </a>
                                        </li>
                                        <li>
                                            <i class="icon-chevron-right"></i>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="text-tiny">Categories</div>
                                            </a>
                                        </li>
                                        <li>
                                            <i class="icon-chevron-right"></i>
                                        </li>
                                        <li>
                                            <div class="text-tiny">New Category</div>
                                        </li>
                                    </ul>
                                </div>
                                <!-- new-category -->
                                <div class="wg-box">
                                    <form class="form-new-product form-style-1" action="{{route("categories.update",$category->id)}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <fieldset class="name">
    <div class="body-title">Category Name <span class="tf-color-1">*</span></div>
    <input id="name" class="flex-grow" type="text" placeholder="Category name" name="name"
        value="{{ old('name', $category->name) }}" required>
    @error('name')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</fieldset>

                                       <fieldset class="name">
    <div class="body-title">Category Slug <span class="tf-color-1">*</span></div>
    <input id="slug" class="flex-grow" type="text" placeholder="Category Slug" name="slug"
        value="{{ old('slug', $category->slug) }}" required>
    @error('slug')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</fieldset>

<fieldset class="name">
    <div class="body-title">Description <span class="tf-color-1">*</span></div>
    <input class="flex-grow" type="text" placeholder="Category description" name="description"
        value="{{ old('description', $category->description) }}" required>
    @error('description')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</fieldset>

                                        <div class="bot">
                                            <div></div>
                                            <button class="tf-button w208" type="submit">Lưu</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="bottom-page">
                            <div class="body-text"></div>
                        </div>
                    </div>
    </x-slot>
    <x-slot name="script">
        <script>
            function slugify(str) {
                return str
                    .toLowerCase()
                    .normalize('NFD')                      // tách dấu tiếng Việt
                    .replace(/[\u0300-\u036f]/g, '')       // xóa dấu
                    .replace(/[^a-z0-9 -]/g, '')           // chỉ giữ a-z, 0-9, khoảng trắng và dấu -
                    .trim()
                    .replace(/\s+/g, '-')                  // thay khoảng trắng bằng dấu -
                    .replace(/-+/g, '-');                  // gộp nhiều dấu - liền nhau
            }

            document.getElementById('name').addEventListener('input', function () {
                const name = this.value;
                const slug = slugify(name);
                document.getElementById('slug').value = slug;
            });
        </script>
    </x-slot>
</x-admin.admin-layout>