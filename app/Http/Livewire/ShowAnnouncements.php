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
    public function delete($id){
        $this->anno_id = $id;
    }
    public function deleteConfirm(){
        Announcement::where('id',$this->anno_id)->delete();
        $this->dispatchBrowserEvent('show-delete-alert',['message' => 'Duyuru başarılı bir şekilde silindi.']);
    }

}
