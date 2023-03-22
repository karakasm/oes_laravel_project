<?php

namespace App\Http\Livewire\Student;

use App\Models\Announcement;
use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;

class ShowAnnouncements extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public Course $course;

    public string $search = '';
    public $page = 1;

    protected $queryString = [
        'search' => ['except' => '', 'as' => 's'],
        'page' => ['except' => 1, 'as' => 'p'],
    ];

    public function render()
    {
        $query = Announcement::query()->where('course_id', $this->course->id)
            ->where('status', 'active');

        if ($this->search) {
            $query->where('content', 'like', '%' . $this->search . '%')
                ->orWhere('title', 'like', '%' . $this->search . '%')->orderBy('updated_at', 'desc');
        }

        return view('livewire.student.show-announcements', [
            'announcements' => $query->orderBy('updated_at', 'desc')->paginate(3)
        ]);
    }

    public function updated($property)
    {
        if ($property === 'search') {
            $this->resetPage();
        }
    }
}
