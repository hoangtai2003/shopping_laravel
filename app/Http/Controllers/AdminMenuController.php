<?php

namespace App\Http\Controllers;

use App\Components\Recusive\MenusRecusive;
use App\Models\Menu;
use App\Traits\DeleteModelTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminMenuController extends Controller
{
    use DeleteModelTrait;
    private $menuRecusive;
    private $menu;
    public function __construct(MenusRecusive $menusRecusive, Menu $menu)
    {
        $this->menuRecusive = $menusRecusive;
        $this->menu = $menu;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = $this->menu->paginate(10);
        return view('admin.admin.menus.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $optionSelect = $this->menuRecusive->menuRecusiveAdd();
        return view('admin.admin.menus.add', compact('optionSelect'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->menu->create ([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name)
        ]);
        return redirect() -> route('menus.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $this->menu->find($id)->delete();
        return redirect() -> route('menus.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $menuFollowIdEdit = $this->menu->find($id);
        $optionSelect = $this->menuRecusive->menuRecusiveEdit($menuFollowIdEdit->parent_id);
        return view('admin.admin.menus.edit', compact('optionSelect', 'menuFollowIdEdit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->menu->find($id)->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name)
        ]);
        return redirect() -> route('menus.index');
    }

    /**
     * Remove the specified resource from storage.
     */
}
