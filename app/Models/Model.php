<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as BaseModel;

class Model extends BaseModel
{
    use HasFactory;

    protected $perPage = 20;

    // direction
    public const DIRECTION_ASC = 'asc';
    public const DIRECTION_DESC = 'desc';

    public static $directions = [
        self::DIRECTION_ASC,
        self::DIRECTION_DESC
    ];
}
