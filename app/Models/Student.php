<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    //kukuniin ang data mula sa StudentProfile na may kaparehas na Unique ID
    public function profile () {
        return $this->hasOne(StudentProfile::class);
    }
}
