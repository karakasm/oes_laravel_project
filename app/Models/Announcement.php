<?php

namespace App\Models;

use App\Events\AnnouncementShared;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
  use HasFactory;

  protected $fillable = [
    'course_id', 'title', 'content', 'status'
  ];
  public function course()
  {
    return $this->belongsTo(Course::class);
  }
}
