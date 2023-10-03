<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\View\View;

class HomeClientController extends Controller
{
    public function index():View
    {
        $sliders = Slider::query()->latest()->get();
        $categories = Category::query()->where('parent_id', 0)->get();
        $products = Product::query()->latest()->take(6)->get();
        $productsRecommend = Product::query()->latest('views_count')->take(12)->get();
        $categoriesLimit = Category::query()->where('parent_id', 0)->take(3)->get();
        return view('client.home.HomeClient', compact('sliders', 'categories', 'products', 'productsRecommend','categoriesLimit'));
    }
}
