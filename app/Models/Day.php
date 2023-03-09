<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    use HasFactory;

    protected $fillable = ['day'];

    public function courses(){
        return $this->belongsToMany(Course::class, 'course_day')->withTimestamps();
    }
}
