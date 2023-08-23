<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Components\Recusive;
use App\Traits\StorageImageTrait;
use Storage;
class AdminProductController extends Controller
{
    use StorageImageTrait;
    private $category;
    public function __construct(Category $category)
    {
        $this->category = $category;
    }
    public function index(){
        return view('admin.product.index');
    }
    public function create(){
        $htmlOption = $this->getCategory($parentId = '');
        return view('admin.product.add', compact('htmlOption'));
    }
    public function getCategory($parentId){
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parentId);
        return $htmlOption;
    }
    public function store(Request $request){
        // $dataProductCreate = [
        //     'name' => $request->name,
        //     'price' => $request->price,
        //     'content' => $request->contents,
        //     'user_id' => auth()->id(),
        //     'category' => $request->category_id
        // ];
        $dataUploadFeatureImage = $this->storageTraitUpload($request, 'feature_image_path', 'product');
        dd($dataUploadFeatureImage);

    }
}
