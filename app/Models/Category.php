<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    // use SoftDeletes;
    // insert dữ liệu
    protected $fillable = ['name', 'parent_id', 'slug'];
    protected $table = 'categories';
    public function categoryChildrent(){
        return $this->hasMany(Category::class, 'parent_id');
    }
    public function products(){
        return $this->hasMany(Product::class, 'category_id');
    }
}
