<?php

namespace App\Services\Admin\User;

use App\Models\User;
use App\Services\BaseService;

class UserService extends BaseService
{
    public function index($keywords)
    {
        $users = User::getAllUsersBySearch($keywords);

        $this->users = $users->paginate(30);

        return $this;
    }
}
