<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Show the dashboard view.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $products = Product::latest()->take(5)->get();
        // get count of products,cateogries, and brands
        $productCount = Product::count();
        $categoryCount = Category::count();
        $brandCount = Brand::count();
        return view('dashboard', compact('products', 'productCount', 'categoryCount', 'brandCount'));
    }
}
