<?php

namespace App\Http\Controllers;

use App\Components\MenusRecusive;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    private $menuRecusive;
    public function __construct(MenusRecusive $menusRecusive)
    {
        $this->menuRecusive = $menusRecusive;
    }
    public function index(){
        return view('menus.index');
    }
    public function create(){
        $optionSelect = $this->menuRecusive->menuRecusiveAdd();
        return view('menus.add', compact('optionSelect'));
    }
}
