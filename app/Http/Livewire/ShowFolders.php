<?php

namespace App\Http\Livewire;

use App\Events\FolderShared;
use App\Models\Folder;
use App\Models\Course;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class ShowFolders extends Component
{

    use WithPagination;
    use WithFileUploads;

    protected $paginationTheme = 'bootstrap';


    public $search;
    public $page = 1;
    public Course $course;
    public $folders = [];
    public $iteration = 0;

    public $folder_id = '';

    protected  $queryString = [
        'search' => ['except' => '', 'as' => 's'],
        'page' => ['except' => 1, 'as' => 'p'],
    ];

    protected $rules = [
        'folders.*' => 'required|file|max:102400', //max 100MB;
    ];

    public function save()
    {
        if (empty($this->folders)) {
            $this->dispatchBrowserEvent('NeedFileToUpload', ['message' => 'Lütfen Dosya Seçiniz.']);
        } else {

            $this->validate();

            foreach ($this->folders as $folder) {

                if (Folder::where('course_id', $this->course->id)->where('name', explode('.', $folder->getClientOriginalName())[0])->first()) {
                    $this->dispatchBrowserEvent('fileAlreadyExist', ['message' => explode('.', $folder->getClientOriginalName())[0] . ' isimli dosya zaten mevcut.']);
                } else {
                    $folder->storeAs($this->course->id . '\\folders', explode('.', $folder->getClientOriginalName())[0] . '.' . $folder->guessExtension());
                    $registeredFolder = Folder::create([
                        'course_id' => $this->course->id,
                        'uuid' => Str::orderedUuid(),
                        'path' => storage_path('app') . '\\' . $this->course->id . '\\folders\\',
                        'name' => explode('.', $folder->getClientOriginalName())[0],
                        'extension' => $folder->guessExtension(),
                        'size' => $folder->getSize()
                    ]);
                    $this->dispatchBrowserEvent('fileUploadSuccess', ['message' => explode('.', $folder->getClientOriginalName())[0] . ' isimli dosya başarılı bir şekilde yüklendi.']);

                    FolderShared::dispatch($registeredFolder, $this->course);
                }
                $this->folders = null;
                $this->iteration++;
            }
        }
    }

    public function render()
    {
        $query = Folder::query()->where('course_id', $this->course->id);
        if ($this->search) {
            $query->where('name', 'like', '%' . trim($this->search) . '%')->orderBy('created_at', 'desc');
        }

        // return view('livewire.show-folders', ['all' => Folder::where('course_id', $this->course->id)->orderBy('id', 'DESC')->get()]);
        return view('livewire.show-folders', ['all' => $query->orderBy('created_at', 'DESC')->paginate(5)]);
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

    public function delete($id)
    {
        $this->folder_id = $id;
    }
    public function deleteConfirm()
    {

        $tmpFolder = Folder::where('id', $this->folder_id)->first();
        $path = $tmpFolder->path . $tmpFolder->name . '.' . $tmpFolder->extension;
        if (file_exists($path)) {
            unlink($path);
        }


        Folder::where('id', $this->folder_id)->delete();
        $this->dispatchBrowserEvent('show-delete-alert', ['message' => 'Dosya başarılı bir şekilde silindi.']);
    }
}
