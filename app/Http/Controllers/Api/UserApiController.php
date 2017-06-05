<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Transformers\UserTransformer;
use App\Http\Controllers\ApiController;

class UserApiController extends ApiController
{
    public function users()
    {
        $user = User::all();    //这里也可以写成一些where条件
        return $this->response->item($user, new UserTransformer);
    }
}