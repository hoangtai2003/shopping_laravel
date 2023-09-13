<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Components\Recusive;
use Illuminate\Support\Str;
use App\Models\Product;

class CategoryController extends Controller
{
    private $category;
    public function __construct(Category $category)
    {
        $this->category = $category;
    }
    public function create(){
        $htmlOption = $this->getCategory($parentId = '');
        return view('admin.admin.category.add', compact('htmlOption'));
    }
    public function index(){
        $categories = $this->category->latest()->simplePaginate(5);
        return view('admin.admin.category.index', compact('categories'));
    }
    public function indexClient($slug, $categoryId) {
        $categorysLimit = Category::where('parent_id', 0)->take(3)->get();
        $products = Product::where('category_id', $categoryId)->paginate(12);
        $categorys = Category::where('parent_id', 0)->get();
        return view('client.product.category.list', compact('categorysLimit','products', 'categorys'));
    }
    public function store(Request $request)
    {
        $this->category->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name)
        ]);
        return redirect() -> route('categories.index');
    }
    public function getCategory($parentId){
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parentId);
        return $htmlOption;
    }
    public function edit($id)
    {
        $category = $this->category->find($id);
        $htmlOption = $this->getCategory($category->parent_id);
        return view('admin.admin.category.edit', compact('category', 'htmlOption'));
    }
    public function delete($id){
        $this->category->find($id)->delete();
        return redirect() -> route('categories.index');
    }
    public function update ($id, Request $request)
    {
        $this->category->find($id)->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name)
        ]);
        return redirect() -> route('categories.index');
    }
}
