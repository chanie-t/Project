<x-admin.admin-layout>
    <x-slot name="mainContent">
                    <div class="main-content">
                        <div class="main-content-inner">
                            <div class="main-content-wrap">
                                <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                                    <h3>Thêm mới danh mục</h3>
                                    <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                                        <li>
                                            <a href="{{route('dashboard')}}">
                                                <div class="text-tiny">Dashboard</div>
                                            </a>
                                        </li>
                                        <li>
                                            <i class="icon-chevron-right"></i>
                                        </li>
                                        <li>
                                            <a href="{{route('brands.index')}}">
                                                <div class="text-tiny">Brands</div>
                                            </a>
                                        </li>
                                        <li>
                                            <i class="icon-chevron-right"></i>
                                        </li>
                                        <li>
                                            <div class="text-tiny">New Brand</div>
                                        </li>
                                    </ul>
                                </div>
                                <!-- new-category -->
                                <div class="wg-box">
                                    <form class="form-new-product form-style-1" action="{{route('brands.store')}}" method="POST">
                                        @csrf
                                        <fieldset class="name">
                                            <div class="body-title">Tên nhãn hàng <span class="tf-color-1">*</span></div>
                                           <input id="name" class="flex-grow" type="text" placeholder="Nhập tên nhãn hàng" name="name"
    tabindex="0" value="" aria-required="true" required="">
                                        </fieldset>
                                        <fieldset class="name">
                                            <div class="body-title">Slug <span class="tf-color-1">*</span></div>
                                            <input id="slug" class="flex-grow" type="text" placeholder="Nhập Slug" name="slug"
                                                tabindex="0" value="" aria-required="true" required="">
                                        </fieldset>
                                        <fieldset class="name">
                                            <div class="body-title">Mô tả <span class="tf-color-1">*</span></div>
                                            <textarea class="flex-grow"  name="description" id="" cols="30" rows="10"></textarea>
                                        </fieldset>

                                        <div class="bot">
                                            <div></div>
                                            <button class="tf-button w208" type="submit">Tạo</button>
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
