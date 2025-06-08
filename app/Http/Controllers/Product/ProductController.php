<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.products.index');
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'slug' => 'nullable|string|max:100|unique:products,slug',
            'price' => 'required|numeric|min:0',
            'short_description' => 'required|max:200',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'image' => 'nullable|image|max:2048', // 2MB
            'quantity' => 'min:0'
        ]);

         if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public'); 
            $validated['image'] = $path; 
        }
        Product::create($validated);

        return redirect()->route('product.index')->with('success', 'Tạo sản phẩm thành công!');
    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}
