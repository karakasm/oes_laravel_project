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


    public function download(Folder $folder)
    {
        $path = $folder->path . $folder->name . '.' . $folder->extension;

        if (file_exists($path)) {
            return response()->download($path);
        } else {
            session()->flash('file-not-found', 'İlgili Dosya Bulunamamaktır.');
        }
    }
}
