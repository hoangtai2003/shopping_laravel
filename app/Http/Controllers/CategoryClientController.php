<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryClientController extends Controller
{
    public function index($categoryId){
        $categoriesLimit = Category::where('parent_id', 0)->take(3)->get();
        $products = Product::where('category_id', $categoryId)->paginate(12);
        $categories = Category::where('parent_id', 0)->get();
        return view('client.product.category.list', compact('categoriesLimit','products', 'categories'));
    }
}
