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
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = $this->user->paginate(5);
        return view('admin.admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles =$this->role->all();
        return view('admin.admin.user.add', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->deleteModelTrait($id, $this->user);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $roles =$this->role->all();
        $user = $this->user->find($id);
        $roleOfUser = $user->roles;
        return view('admin.admin.user.edit', compact('roles', 'user', 'roleOfUser'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
