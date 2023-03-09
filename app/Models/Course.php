<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
       'instructor_id','name','code','number','language','aim','content','credit','capacity','enrolled'
    ];

    public function days(){
        return $this->belongsToMany(Day::class,'course_day')->withPivot('open_time', 'close_time','building','room')->orderBy('id')->withTimestamps();
    }

    public function users() {
       return $this->belongsToMany(User::class, 'course_user')->withTimestamps();
    }

    public function announcements(){
        return $this->belongsToMany(Announcement::class,'announcement_course')->withTimestamps();
    }
}
