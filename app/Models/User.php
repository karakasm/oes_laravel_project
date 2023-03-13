<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name','role_id','surname','username','password'
    ];


    public function role(){
        return $this->belongsTo(Role::class);
    }
    public function courses(){
       return $this->belongsToMany(Course::class,'course_user')->orderBy('code')->orderBy('number')->withTimestamps();
    }
}
