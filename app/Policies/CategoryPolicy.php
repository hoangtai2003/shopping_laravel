<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CategoryPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user)
    {
        return  $user->checkPermissionAccess("Category_List");
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        return  $user->checkPermissionAccess("Category_Add");
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user)
    {
        return  $user->checkPermissionAccess("Category_Edit");
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user)
    {
        return  $user->checkPermissionAccess("Category_Delete");
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Category $category)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Category $category)
    {
        //
    }
}