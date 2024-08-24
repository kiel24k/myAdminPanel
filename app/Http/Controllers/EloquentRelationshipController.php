<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Student;
use App\Models\StudentProfile;
use Illuminate\Http\Request;

class EloquentRelationshipController extends Controller
{
   public function one_to_one(){
    $single = Student::find(2);

    //kailangan tawagin muna ang method para makuha ang country
    return response()->json([
        $single,
        $single->profile
       
    ]);

   }

   public function one_to_many () {
       $data = Department::find(2);
       return response()->json([
        $data,
        $data->employees
       ]);
   }
}
