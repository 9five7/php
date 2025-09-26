<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class Member extends Authenticatable
{
    use HasApiTokens, Notifiable;
    protected $fillable = [
        'memberid',
        'name',
        'email',
        'password',
        'avatar',
    ];
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    protected $hidden = [
        'password',
    ];
}
