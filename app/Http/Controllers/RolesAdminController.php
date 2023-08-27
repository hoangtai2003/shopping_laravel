<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RolesAdminController extends Controller
{
    private $role;
    public function __construct(Role $role)
    {
        $this->role = $role;
    }
    public function index(){
        $roles = $this->role->paginate(10);
        return view('admin.role.index', compact('roles'));
    }
    public function create(){
        return view ('admin.role.add');
    }
}
