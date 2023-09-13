<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Traits\DeleteModelTrait;

class UserAdminController extends Controller
{
    use DeleteModelTrait;
    private $user, $role;
    public function __construct(User $user, Role $role)
    {
        $this->user = $user;
        $this->role = $role;
    }
    public function index(){
        $users = $this->user->paginate(5);
        return view('admin.admin.user.index', compact('users'));
    }
    public function create(){
        $roles =$this->role->all();
        return view('admin.admin.user.add', compact('roles'));
    }
    public function store(Request $request){
        try {
            DB::beginTransaction();
            $user = $this->user->create ([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            $user->roles()->attach($request->role_id);
            DB::commit();
            return redirect()->route('users.index');
        } catch(Exception $exp){
            DB::rollBack();
            Log::error("Message: " . $exp->getMessage() . 'Line: ' . $exp->getLine());
        }
    }
    public function edit($id){
        $roles =$this->role->all();
        $user = $this->user->find($id);
        $roleOfUser = $user->roles;
        return view('admin.admin.user.edit', compact('roles', 'user', 'roleOfUser'));
    }
    public function update($id, Request $request){
        try {
            DB::beginTransaction();
            $this->user->find($id)->update ([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            $user = $this->user->find($id);
            $user->roles()->sync($request->role_id);
            DB::commit();
            return redirect()->route('users.index');
        } catch(Exception $exp){
            DB::rollBack();
            Log::error("Message: " . $exp->getMessage() . 'Line: ' . $exp->getLine());
        }
    }
    public function delete($id){
        return $this->deleteModelTrait($id, $this->user);
    }
}
