<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class message extends Model
{
    use HasApiTokens, HasFactory;

    protected $table = 'messages';
    protected $fillable = [
        'room_with',
        'sender_id',
        'receiver_id',
        'message',
    ];
}
