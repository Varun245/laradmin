<?php

namespace App\Http\Controllers;

use App\Services\UserActivityService;

class UserActivityController extends Controller
{
    protected $userActivityService;

    public function __construct(UserActivityService $userActivityService)
    {
        $this->userActivityService = $userActivityService;
    }

}
