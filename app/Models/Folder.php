<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid', 'course_id', 'path', 'name', 'extension', 'size'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
