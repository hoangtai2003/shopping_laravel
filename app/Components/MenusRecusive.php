<?php
namespace App\Components;

use App\Models\Menu;

class MenusRecusive {
    private $html;
    public function __construct()
    {
        $this->html = '';
    }
    public function menuRecusiveAdd($parentId = 0, $subMark = ''){
        $data = Menu::Where('parent_id', $parentId)->get();
        foreach($data as $dataItem){
            $this->html .= '<option value= "' . $dataItem->id . '">' . $subMark . $dataItem->name . '</option>';
            $this->menuRecusiveAdd($dataItem->id, $subMark . '--');
        }
        return $this->html;
    }
}
