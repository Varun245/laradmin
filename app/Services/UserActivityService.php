<?php

namespace App\Services;

use App\Repositories\UserActivityRepository;
use App\User;

class UserActivityService
{

    public function __construct(UserActivityRepository $user)
    {
        $this->user = $user;
    }

    public function create($oldValues, $newValues, $name)
    {
        $this->user->track($oldValues, $newValues, $name);
    }

}
