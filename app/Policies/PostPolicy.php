<?php

namespace App\Policies;

use App\Enums\PostPermissions;
use App\Models\Post;
use App\Models\User;

class PostPolicy
{

    public function create(User $user): bool
    {
        return $user->permissions == -1 || ($user->permissions & PostPermissions::create->value) == PostPermissions::create->value;
    }


    public function edit(User $user, Post $post): bool
    {

        return $user->permissions == -1 || $post->employer->user->is($user) && ($user->permissions & PostPermissions::edit->value) == PostPermissions::edit->value;
    }


    public function delete(User $user, Post $post): bool
    {
        return $user->permissions == -1 || $post->employer->user->is($user) && ($user->permissions & PostPermissions::delete->value) == PostPermissions::delete->value;
    }
}
