<h1 align="center"><strong>Project: Website bán hàng</strong>  </h1>

<h2>Thông tin cá nhân</h2>

👤 **Họ tên:** Nguyễn Thùy Trang 

🎓 **Mã sinh viên:** 23010487

## 📝 Mô tả dự án

Website bán hàng, cho phép người quản lý thêm, xóa, phân loại sản phẩm.  
Dự án sử dụng Laravel, MySQL.

## 🧰 Công nghệ sử dụng

-   PHP (Laravel Framework)
-   AJAX (Asynchronous JavaScript and XML)
-   Laravel Breeze
-   MySQL (Aiven Cloud)
-   Blade Template
-   Tailwind CSS (do Breeze tích hợp sẵn)

## 🚀 Cài đặt & Chạy thử

```bash
git: https://github.com/chanie-t/Project
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate
```
# Sơ đồ khối

![image](https://github.com/user-attachments/assets/4ad00187-be78-439c-b068-103059e74e83)

## ⚙️Sơ đồ chức năng
![image](https://github.com/user-attachments/assets/f13ca2c9-b702-4dad-9a3c-c0598721f8fd)

## 🧠Sơ đồ thuật toán
<strong>Dasboard</strong>


![image](https://github.com/user-attachments/assets/ad013140-5993-4f88-8ada-9cfc470ee5da)

CRUD Product

![image](https://github.com/user-attachments/assets/c3e94a0f-7796-4c5a-b04d-8a2ddd1345e1)

CRUD Category

![image](https://github.com/user-attachments/assets/2ae345ec-a9d0-4810-a24e-e61e1a570b88)

CRUD Brand

![image](https://github.com/user-attachments/assets/091ac992-7e7a-4af7-9f74-19b7ded57ca4)


# Một số Code chính minh họa
## Model
*Product Model: 

        class Product extends Model
{
     use HasFactory;

    // Các trường được phép gán hàng loạt
    protected $fillable = [
        'name',
        'slug',
        'price',
        'short_description',
        'description',
        'category_id',
        'brand_id',
        'status',
        'image',
        'quantity'
    ];

    /**
     * Quan hệ product thuộc về category
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function getImageUrlAttribute()
    {
        if (strpos($this->image, 'https://') === 0 || strpos($this->image, 'http://') === 0) {
            return $this->image;
        }
        return asset(Storage::url($this->image));
    }

}

*Brands model:

        class Brand extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}


*Category model:

        class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}


## Controller
*ProductController 

        class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with(['category', 'brand']);

        if ($request->has('keyword')) {
            $search = $request->input('keyword');
            $query->where(function ($q) use ($search) {
            $q->where('name', 'like', '%' . $search . '%')
              ->orWhere('slug', 'like', '%' . $search . '%');
            });
        }

        $products = $query->paginate(10);

        return view('admin.products.index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.show', compact('product'));
    }

    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.products.create', compact('categories', 'brands'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'slug' => 'nullable|string|max:100|unique:products,slug,' . $request->id,
            'price' => 'required|numeric|min:0',
            'short_description' => 'required|max:200',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif,bmp,svg,webp|max:2048',
            'quantity' => 'min:0'
        ]);

         if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $validated['image'] = $path;
        }
        Product::create($validated);

        return redirect()->route('products.index')->with('success', 'Tạo sản phẩm thành công!');
    }

    public function edit(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.products.edit', compact('product', 'categories', 'brands'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'slug' => 'nullable|string|max:100|unique:products,slug,' . $product->id,
            'price' => 'required|numeric|min:0',
            'short_description' => 'required|max:200',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'image' => 'nullable|image|max:2048', // 2MB
            'quantity' => 'min:0',
            'status' => 'in:stock,out_of_stock,discontinued'
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $validated['image'] = $path;
        }

        $product->update($validated);

        return redirect()->route('products.index')->with('success', 'Cập nhật sản phẩm thành công!');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Xóa sản phẩm thành công!');
    }

    public function getProductByPage(Request $request)
    {
         $products = Product::paginate(12);

        if ($request->ajax()) {
            $view = view('partials.product-loop', ['products' => $products])->render();

            return response()->json([
                'html' => $view,
                'hasMore' => $products->hasMorePages(),
            ]);
        }

        return view('welcome', compact('products'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $products = Product::where('name', 'like', '%' . $search . '%')
            ->orWhere('slug', 'like', '%' . $search . '%')
            ->paginate(10);

        return view('admin.products.index', compact('products'));
    }
    // get product by slug
    public function getProductBySlug($slug)
    {
        $product = Product::where('slug', $slug)->with(['category', 'brand'])->firstOrFail();
        return view('client.product.show', compact('product'));
    }
}

<strong>
BrandsController:
</strong>

        class BrandController extends Controller
{
   public function index(Request $request)
    {
        $query = Brand::query();


        if ($request->has('keyword')) {
            $search = $request->input('keyword');
            $query->where(function ($q) use ($search) {
            $q->where('name', 'like', '%' . $search . '%')
              ->orWhere('slug', 'like', '%' . $search . '%');
            });
        }
        $brands = $query->get();

        return view('admin.brands.index', compact('brands'));
    }

    public function create()
    {
        return view('admin.brands.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'slug' => 'nullable|string|max:100|unique:brands,slug',
            'description' => 'nullable|string',
        ]);

        Brand::create($validated);
        return redirect()->route('brands.index')->with('success', 'Tạo thương hiệu thành công!');
    }

    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.brands.edit', compact('brand'));
    }

    public function update(Request $request, $id)
    {
        $brand = Brand::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'slug' => 'nullable|string|max:100|unique:brands,slug,' . $brand->id,
            'description' => 'nullable|string',
        ]);

        $brand->update($validated);

        return redirect()->route('brands.index')->with('success', 'Cập nhật thương hiệu thành công!');
    }

    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();

        return redirect()->route('brands.index')->with('success', 'Xóa thương hiệu thành công!');
    }
}


*CategoryController:

        class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $query = Category::query();

        if ($request->has('keyword')) {
            $search = $request->input('keyword');
            $query->where(function ($q) use ($search) {
            $q->where('name', 'like', '%' . $search . '%')
              ->orWhere('slug', 'like', '%' . $search . '%');
            });
        }
        $categories = $query->paginate(10);

        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'slug' => 'nullable|string|max:100|unique:categories,slug',
            'description' => 'nullable|string',
        ]);

        Category::create($validated);

        return redirect()->route('categories.index')->with('success', 'Tạo danh mục thành công!');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'slug' => 'nullable|string|max:100|unique:categories,slug,' . $category->id,
            'description' => 'nullable|string',
        ]);

        $category->update($validated);

        return redirect()->route('categories.index')->with('success', 'Cập nhật danh mục thành công!');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Xóa danh mục thành công!');
    }
}


## View
Cấu trúc chính của view

![image](https://github.com/user-attachments/assets/a0108521-3ac9-4a45-8c98-4e9216122915)

# Security Setup
<strong>
    Luôn sử dụng phiên bản Laravel mới nhất để đảm bảo ứng dụng nhận được các bản vá bảo mật, cải tiến hiệu năng và các tính năng mới nhất từ cộng đồng phát triển
</strong>

![image](https://github.com/user-attachments/assets/92d2377c-6fec-46cc-8e99-13de409f1fe7)


# Link
## Github link
https://github.com/chanie-t/Project
## Github page
https://chanie-t.github.io/Project/
# Một số hình ảnh chức năng chính
## Xác thực người dùng
Trang đăng nhập

![image](https://github.com/user-attachments/assets/ff7cd06b-4d8b-4db2-a9c3-769372315975)
Trang đăng ký

![image](https://github.com/user-attachments/assets/57875f94-9511-4236-bb13-f49d0f9a20c5)
## Trang chính

![image](https://github.com/user-attachments/assets/d0146771-9931-4d93-8e7d-9bf14a73f42b)
## CRUD Products

![image](https://github.com/user-attachments/assets/dbb6c939-2eae-48a8-aabe-61ffac57172c)
Thêm sản phẩm

![image](https://github.com/user-attachments/assets/6fd9acf0-48ff-404d-bf7b-e915782cd119)
Xem , sửa và xóa :

![image](https://github.com/user-attachments/assets/82518721-7981-4649-a296-48439209eef1)

## CRUD Categories
![image](https://github.com/user-attachments/assets/e118003d-65e9-45f3-8bbb-72aff9229f06)
Thêm mới:

![image](https://github.com/user-attachments/assets/78eca0c7-47c5-47dd-8309-60f3f9dbbce4)
Sửa và xóa:

![image](https://github.com/user-attachments/assets/f9ba8ad6-237a-40df-8a53-b48422ae1103)
Xem sản phẩm:

![image](https://github.com/user-attachments/assets/501993e1-31b4-4760-9a54-a3bb6d12520a)



## CRUD Brands
![image](https://github.com/user-attachments/assets/233373bc-1863-47db-acb3-1683ba1f70d8)
Thêm mới:

![image](https://github.com/user-attachments/assets/48d5584b-6f64-44dc-b944-3d857066f801)
sửa và xóa:

![image](https://github.com/user-attachments/assets/e721d089-e915-4dfa-a0c1-849fffc03f3f)




