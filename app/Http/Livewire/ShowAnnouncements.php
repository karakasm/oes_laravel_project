<?php

namespace App\Http\Livewire;


use App\Models\Announcement;
use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;

class ShowAnnouncements extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public  Course $course;

    public string $search = '';

    protected $queryString = ['search'];

    public function render()
    {

        $query = Announcement::query();
        if($this->search){
            $query->where('course_id',$this->course->id)
                ->where('content','like','%'.$this->search.'%')
            ->orWhere('title','like','%'.$this->search.'%')->orderBy('updated_at','desc');
        }

        return view('livewire.show-announcements',[
            'announcements'=> $query->where('course_id',$this->course->id)->orderBy('updated_at','desc')->paginate(3)
        ]);

    }

    public function updated($property){
        if($property === 'search'){
            $this->resetPage();
        }
    }

}
