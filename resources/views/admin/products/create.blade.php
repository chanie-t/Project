<x-admin.admin-layout>
    <x-slot name="mainContent">
    <div class="main-content">
        <!-- main-content-wrap -->
        <div class="main-content-inner">
            <!-- main-content-wrap -->
            <div class="main-content-wrap">
                <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                    <h3>Add Product</h3>
                    <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                        <li>
                            <a href="index-2.html">
                                <div class="text-tiny">Dashboard</div>
                            </a>
                        </li>
                        <li>
                            <i class="icon-chevron-right"></i>
                        </li>
                        <li>
                            <a href="all-product.html">
                                <div class="text-tiny">Products</div>
                            </a>
                        </li>
                        <li>
                            <i class="icon-chevron-right"></i>
                        </li>
                        <li>
                            <div class="text-tiny">Add product</div>
                        </li>
                    </ul>
                </div>
                <!-- form-add-product -->
                <form class="tf-section-2 form-add-product" method="POST" enctype="multipart/form-data"
                    action="{{ route('products.store') }}">
                    @csrf
                    <div class="wg-box">
                        <fieldset class="name">
                            <div class="body-title mb-10">Tên sản phẩm <span class="tf-color-1">*</span></div>
                            <input id="name" class="mb-10" type="text" placeholder="Nhập tên sản phẩm"
                                name="name" tabindex="0" value="" aria-required="true" required>
                            <div class="text-tiny">Không nhập quá 100 kí tự</div>
                        </fieldset>

                        <fieldset class="name">
                            <div class="body-title mb-10">Slug <span class="tf-color-1">*</span></div>
                            <input id="slug" class="mb-10" type="text" placeholder="Nhập slug" readonly
                                name="slug" tabindex="0" value="" aria-required="true" required>
                            <div class="text-tiny">Slug sẽ được tạo tự động từ tên sản phẩm.</div>
                        </fieldset>


                        <div class="gap22 cols">
                            <fieldset class="category">
                                <div class="body-title mb-10">Danh mục <span class="tf-color-1">*</span>
                                </div>
                                <div class="select">
                                    <select class="" name="category_id">
                                        <option>Chọn danh mục</option>
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>)
                                        @endforeach

                                    </select>
                                </div>
                            </fieldset>
                            <fieldset class="brand">
                                <div class="body-title mb-10">Nhãn hàng <span class="tf-color-1">*</span>
                                </div>
                                <div class="select">
                                    <select class="" name="brand_id">
                                        <option>Chọn nhãn hàng</option>
                                        @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>)
                                        @endforeach

                                    </select>
                                </div>
                            </fieldset>
                        </div>

                        <fieldset class="shortdescription">
                            <div class="body-title mb-10">Mô tả ngắn <span
                                    class="tf-color-1">*</span></div>
                            <textarea class="mb-10 ht-150" name="short_description"
                                placeholder="Nhập mô tả ngắn" tabindex="0" aria-required="true"
                                required=""></textarea>
                            <div class="text-tiny">Do not exceed 100 characters when entering the
                                product name.</div>
                        </fieldset>

                        <fieldset class="description">
                            <div class="body-title mb-10">Mô tả <span class="tf-color-1">*</span>
                            </div>
                            <textarea class="mb-10" name="description" placeholder="Nhập mô tả"
                                tabindex="0" aria-required="true" required=""></textarea>
                            <div class="text-tiny">Do not exceed 100 characters when entering the
                                product name.</div>
                        </fieldset>
                    </div>
                    <div class="wg-box">
                        <fieldset>
                            <div class="body-title">Ảnh sản phẩm <span class="tf-color-1">*</span></div>
                            <div class="upload-image flex-grow">
                                <div class="item" id="imgpreview" style="display:none">
                                    <img src="" class="effect8" alt="Preview ảnh" id="previewImg">
                                </div>
                                <div id="upload-file" class="item up-load">
                                    <label class="uploadfile" for="myFile">
                                        <span class="icon">
                                            <i class="icon-upload-cloud"></i>
                                        </span>
                                        <span class="body-text">Kéo ảnh vào hoặc chọn ảnh</span>
                                        <input type="file" id="myFile" name="image" accept="image/*">
                                    </label>
                                </div>
                            </div>
                        </fieldset>
                        <div class="cols gap22">
                            <fieldset class="name">
                                <div class="body-title mb-10">Giá tiền <span
                                        class="tf-color-1">*</span></div>
                                <input class="mb-10" type="text" placeholder="Nhập giá tiền"
                                    name="price" tabindex="0" value="" aria-required="true"
                                    required="">
                            </fieldset>
                            <fieldset class="name">
                                <div class="body-title mb-10">Số lượng <span class="tf-color-1">*</span>
                                </div>
                                <input class="mb-10" type="text" placeholder="Nhập số lượng"
                                    name="quantity" tabindex="0" value="" aria-required="true"
                                    required="">
                            </fieldset>
                        </div>
                        <div class="cols gap22">
                            <fieldset class="name">
                                <div class="body-title mb-10">Trạng thái</div>
                                <div class="select mb-10">
                                    <select class="" name="status">
                                        <option value="stock">Còn hàng</option>
                                        <option value="out_of_stock">Hết hàng</option>x
                                        <option value="discontinued">Dừng bàn</option>
                                    </select>
                                </div>
                            </fieldset>
                        </div>
                        <div class="cols gap10">
                            <button class="tf-button w-full" type="submit">Thêm sản phẩm</button>
                        </div>
                    </div>
                </form>
                <!-- /form-add-product -->
            </div>
            <!-- /main-content-wrap -->
        </div>
        <!-- /main-content-wrap -->
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
        <script>
            const inputFile = document.getElementById('myFile');
            const imgPreviewDiv = document.getElementById('imgpreview');
            const previewImg = document.getElementById('previewImg');
            const uploadFileDiv = document.getElementById('upload-file');
            const containerUploadfile = document.querySelector('.upload-image.flex-grow');

            inputFile.addEventListener('change', function () {
                const file = this.files[0];

                if (file) {
                    const reader = new FileReader();

                    reader.onload = function (e) {
                        previewImg.src = e.target.result;
                        imgPreviewDiv.style.display = 'block';
                        uploadFileDiv.querySelector('.body-text').textContent = 'Thay đổi ảnh';
                        imagePreviewDiv.classList.add('effect8');
                    };

                    reader.readAsDataURL(file);
                } else {
                    previewImg.src = '';
                    imgPreviewDiv.style.display = 'none';
                }
            });
        </script>
    </x-slot>
</x-admin.admin-layout>
