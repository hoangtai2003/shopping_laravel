<?php

namespace App\Http\Controllers;

use App\Components\MenusRecusive;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    private $menuRecusive;
    private $menu;
    public function __construct(MenusRecusive $menusRecusive, Menu $menu)
    {
        $this->menuRecusive = $menusRecusive;
        $this->menu = $menu;
    }
    public function index(){
        $menus = $this->menu->paginate(10);
        return view('menus.index', compact('menus'));
    }
    public function create(){
        $optionSelect = $this->menuRecusive->menuRecusiveAdd();
        return view('menus.add', compact('optionSelect'));
    }
    public function store (Request $request){
        $this->menu->create ([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name)
        ]);
        return redirect() -> route('menus.index');
    }
}
