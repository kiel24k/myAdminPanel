<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StudentProfile extends Model
{
    use HasFactory;


     protected $fillable = [
        'student_id',
        'country'
     ];
     
    public function students () {
        return $this->hasMany(Student::class);
    }
}