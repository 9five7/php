<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Member extends Authenticatable
{
    protected $fillable = [
        'memberid',
        'name',
        'email',
        'password',
        'avatar',
    ];

    protected $hidden = [
        'password',
    ];
}
