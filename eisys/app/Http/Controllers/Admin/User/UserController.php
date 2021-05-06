<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\IndexRequest;
use App\Services\Admin\User\UserService;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    protected $user_service;

    public function __construct(UserService $user_service)
    {
        $this->user_service = $user_service;
    }

    public function Index(IndexRequest $request)
    {
        $data = $this->user_service
            ->index($request->keywords);

        return view(('admin.contents.user.index'), compact('data'));
    }

}
