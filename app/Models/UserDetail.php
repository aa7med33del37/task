<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserDetail extends Model
{
    use HasFactory;
    protected $table = 'users_details';
    protected $fillable = [
        'user_id',
        'certification_title',
        'certification_file',
        'map_location',
        'date_of_birth',
    ];

    public function user()
    {
        return $this->beLongsTo(User::class, 'user_id', 'id');
    }
}
