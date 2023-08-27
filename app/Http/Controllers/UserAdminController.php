<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserAdminController extends Controller
{
    private $user, $role;
    public function __construct(User $user, Role $role)
    {
        $this->user = $user;
        $this->role = $role;
    }
    public function index(){
        $users = $this->user->paginate(5);
        return view('admin.user.index', compact('users'));
    }
    public function create(){
        $roles =$this->role->all();
        return view('admin.user.add', compact('roles'));
    }
}
