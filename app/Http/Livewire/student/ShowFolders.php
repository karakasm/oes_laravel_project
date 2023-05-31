<?php

namespace App\Http\Livewire\Student;

use App\Models\Course;
use App\Models\Folder;
use Livewire\Component;

class ShowFolders extends Component
{
    public Course $course;
    public function render()
    {
        return view('livewire.student.show-folders', ['folders' => Folder::where('course_id', $this->course->id)->orderBy('created_at', 'DESC')->get()]);
    }
}
