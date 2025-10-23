<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Auth;

class UserScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * This scope automatically filters queries to only include
     * data for the currently logged-in user.
     *
     * It will be SKIPPED if the user has the 'admin' role.
     */
    public function apply(Builder $builder, Model $model): void
    {
        $user = Auth::user();

        // Check if a user is authenticated AND they are NOT an admin
        if ($user && !$user->hasRole('admin')) {
            // Automatically add "WHERE user_id = {current_user_id}"
            // to every query for this model.
            $builder->where($model->qualifyColumn('user_id'), $user->id);
        }
    }
}
