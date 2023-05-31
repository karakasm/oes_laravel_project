<?php

namespace App\Http\Livewire;

use App\Models\Folder;
use App\Models\Course;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class ShowFolders extends Component
{


    use WithFileUploads;


    public Course $course;
    public $folders = [];
    public $iteration = 0;

    public $folder_id = '';

    protected $rules = [
        'folders.*' => 'required|file',
    ];

    public function save()
    {
        $this->validate();


        foreach ($this->folders as $folder) {

            if (Folder::where('course_id', $this->course->id)->where('name', explode('.', $folder->getClientOriginalName())[0])->first()) {
                $this->dispatchBrowserEvent('fileAlreadyExist', ['message' => explode('.', $folder->getClientOriginalName())[0] . ' isimli dosya zaten mevcut.']);
            } else {
                $folder->storeAs($this->course->id . '\\folders', explode('.', $folder->getClientOriginalName())[0] . '.' . $folder->guessExtension());
                Folder::create([
                    'course_id' => $this->course->id,
                    'uuid' => Str::orderedUuid(),
                    'path' => storage_path('app') . '\\' . $this->course->id . '\\folders\\',
                    'name' => explode('.', $folder->getClientOriginalName())[0],
                    'extension' => $folder->guessExtension(),
                    'size' => $folder->getSize()
                ]);
                $this->dispatchBrowserEvent('fileUploadSuccess', ['message' => explode('.', $folder->getClientOriginalName())[0] . ' isimli dosya başarılı bir şekilde yüklendi.']);
            }
            $this->folders = null;
            $this->iteration++;
        }
    }

    public function render()
    {
        return view('livewire.show-folders', ['all' => Folder::where('course_id', $this->course->id)->orderBy('id', 'DESC')->get()]);
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
