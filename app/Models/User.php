<?php

namespace App\Models;

use App\Models\UserDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $fillable = [
        'username',
        'email',
        'bio',
    ];

    public function details()
    {
        return $this->hasOne(UserDetail::class, 'user_id');
    }
}
