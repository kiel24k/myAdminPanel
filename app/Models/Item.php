<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Item extends Model
{
    use HasApiTokens,HasFactory;

    protected $table = 'items';
    protected $fillable = [
        'name',
        'description',
        'price',
        'date',
    ];
}
