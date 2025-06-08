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
                    action="http://localhost:8000/admin/product/store">
                    <input type="hidden" name="_token" value="8LNRTO4LPXHvbK2vgRcXqMeLgqtqNGjzWSNru7Xx"
                        autocomplete="off">
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
                                        <option value="1">Category1</option>
                                        <option value="2">Category2</option>
                                        <option value="3">Category3</option>
                                        <option value="4">Category4</option>

                                    </select>
                                </div>
                            </fieldset>
                            <fieldset class="brand">
                                <div class="body-title mb-10">Nhãn hàng <span class="tf-color-1">*</span>
                                </div>
                                <div class="select">
                                    <select class="" name="brand_id">
                                        <option>Chọn nhãn hàng</option>
                                        <option value="1">Brand1</option>
                                        <option value="2">Brand2</option>
                                        <option value="3">Brand3</option>
                                        <option value="4">Brand4</option>

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
                            <div class="body-title">Ảnh sản phẩm <span class="tf-color-1">*</span>
                            </div>
                            <div class="upload-image flex-grow">
                                <div class="item" id="imgpreview" style="display:none">
                                    <img src="../../../localhost_8000/images/upload/upload-1.png"
                                        class="effect8" alt="">
                                </div>
                                <div id="upload-file" class="item up-load">
                                    <label class="uploadfile" for="myFile">
                                        <span class="icon">
                                            <i class="icon-upload-cloud"></i>
                                        </span>
                                        <span class="body-text">Kéo ảnh vào hoặc chọn ảnh 
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
                                    name="regular_price" tabindex="0" value="" aria-required="true"
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
                                    <select class="" name="stock_status">
                                        <option value="instock">Đang bán</option>
                                        <option value="outofstock">Hết hàngngf</option>
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
    </x-slot>
</x-admin.admin-layout>