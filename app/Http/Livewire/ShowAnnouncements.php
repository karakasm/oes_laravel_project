<?php

namespace App\Http\Livewire;


use App\Models\Announcement;
use App\Models\Course;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithPagination;

class ShowAnnouncements extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public  Course $course;

    public $anno_id = '';

    public string $search = '';
    public $page = 1;

    protected $queryString = [
        'search' => ['except' => '', 'as' => 's'],
        'page' => ['except' => 1, 'as' => 'p'],
    ];

    public function render()
    {

        $query = Announcement::query()->where('course_id', $this->course->id);
        if ($this->search) {
            $query->where('content', 'like', '%' . trim($this->search) . '%')
                ->orWhere('title', 'like', '%' . trim($this->search) . '%')->orderBy('updated_at', 'desc');
        }

        return view('livewire.show-announcements', [
            'announcements' => $query->orderBy('updated_at', 'desc')->paginate(3)
        ]);
    }

    public function updated($property)
    {
        if ($property === 'search') {
            $this->resetPage();
        }
    }
    public function delete($id)
    {
        $this->anno_id = $id;
    }
    public function deleteConfirm()
    {
        Announcement::where('id', $this->anno_id)->delete();
        $this->dispatchBrowserEvent('show-delete-alert', ['message' => 'Duyuru başarılı bir şekilde silindi.']);
    }
}
