<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    use HasFactory;

    protected $table = 'user_data';

    protected $fillable = [
        'user_id',
        'age',
        'height',
        'weight',
        'gender',
        'type',
        'bmr',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
