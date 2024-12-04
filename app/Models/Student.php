<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        "student_name",
        "student_class",
        "student_major",
        "photo",
        "photo_name"

    ];
}
