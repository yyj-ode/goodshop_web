<?php

namespace App\Policies;

use App\Models\AdminUser;
use App\Models\AdminRole;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostService
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function update(AdminUser $user, Post $post)
    {
        return $user->id === $post->user_id;
    }
}
