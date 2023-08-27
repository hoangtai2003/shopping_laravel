<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
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
    public function store(Request $request){
        $user = $this->user->create ([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        $user->roles()->attach($request->role_id);
        return redirect()->route('users.index');
    }
}
