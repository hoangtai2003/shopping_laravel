<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // insert dữ liệu
    protected $fillable = ['name', 'parent_id', 'slug'];
}
