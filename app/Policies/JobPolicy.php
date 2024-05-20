<?php

namespace App\Policies;

use App\Enums\JobPermissions;
use App\Models\Job;
use App\Models\User;




class JobPolicy
{
    public function create(User $user): bool
    {
        return $user->permissions == -1 || ($user->permissions & JobPermissions::create->value ) == JobPermissions::create->value;
    }



    public function edit(User $user, Job $job): bool
    {

        return $user->permissions == -1 || $job->employer->user->is($user) &&  ($user->permissions & JobPermissions::edit->value ) == JobPermissions::edit->value;
    }


    public function delete(User $user, Job $job): bool
    {
        return $user->permissions == -1 || $job->employer->user->is($user) &&  ($user->permissions & JobPermissions::delete->value )== JobPermissions::delete->value ;
    }

}
