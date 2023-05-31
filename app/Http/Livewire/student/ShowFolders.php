<?php

namespace App\Http\Livewire\Student;

use App\Models\Course;
use App\Models\Folder;
use Livewire\Component;
use Livewire\WithPagination;

class ShowFolders extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public Course $course;
    public $search = '';
    public $page = 1;

    protected $queryString = [
        'search' => ['except' => '', 'as' => 's'],
        'page' => ['except' => 1, 'as' => 'p'],
    ];
    public function render()
    {
        $query = Folder::query()->where('course_id', $this->course->id);
        if ($this->search) {
            $query->where('name', 'like', '%' . trim($this->search) . '%')->orderBy('created_at', 'DESC');
        }

        // return view('livewire.student.show-folders', ['folders' => Folder::where('course_id', $this->course->id)->orderBy('created_at', 'DESC')->get()]);
        return view('livewire.student.show-folders', ['folders' => $query->orderBy('created_at', 'DESC')->paginate(5)]);
    }


    public function updated($property)
    {
        if ($property === 'search') {
            $this->resetPage();
        }
    }


    public function download(Folder $folder)
    {
        $path = $folder->path . $folder->name . '.' . $folder->extension;

        if (file_exists($path)) {
            return response()->download($path);
        } else {
            $this->dispatchBrowserEvent('fileNotFound', ['message' => 'İlgili Dosya Bulunamamaktadır.']);
        }
    }
}
