<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
   public function index()
    {
        $brands = Brand::all();

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
