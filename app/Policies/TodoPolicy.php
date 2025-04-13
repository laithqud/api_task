<?php

namespace App\Policies;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TodoPolicy
{
    public function update(User $user, Todo $todo)
    {
        return $user->id === $todo->user_id;
    }

    public function delete(User $user, Todo $todo)
    {
        return $user->id === $todo->user_id;
    }
   
    public function viewAny(User $user): bool
    {
        return false;
    }

   
    public function view(User $user, Todo $todo): bool
    {
        return false;
    }

    
    public function create(User $user): bool
    {
        return false;
    }

   
    public function restore(User $user, Todo $todo): bool
    {
        return false;
    }

    
    public function forceDelete(User $user, Todo $todo): bool
    {
        return false;
    }
}
