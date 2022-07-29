<?php

namespace App\Repositories;

use App\Models\Model;
use App\Models\User;
use App\Repositories\UserContract;

class UserRepository extends BaseRepository implements UserContract
{
    /**
     *  @param User $model
     *
     */
    public function __construct(User $model)
    {
        $this->model = $model;
    }
}
