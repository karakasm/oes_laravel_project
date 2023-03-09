<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;

    public function courses(){
        return $this->belongsToMany(Course::class,'announcement_course')->withTimestamps();
    }
}
