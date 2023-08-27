<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserAdminController extends Controller
{
    private $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function index(){
        $users = $this->user->paginate(5);
        return view('admin.user.index', compact('users'));
    }
}
