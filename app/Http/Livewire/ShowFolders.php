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

    protected $rules = [
        'folders.*' => 'required|file',
    ];

    public function save()
    {
        $this->validate();


        foreach ($this->folders as $folder) {

            if (Folder::where('course_id', $this->course->id)->where('name', explode('.', $folder->getClientOriginalName())[0])->first()) {
                session()->flash('warning', explode('.', $folder->getClientOriginalName())[0] . ' isimli dosya zaten mevcut.');
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
                session()->flash('success', explode('.', $folder->getClientOriginalName())[0] . ' isimli dosya başarılı bir şekilde yüklendi.');
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
            session()->flash('file-not-found', 'İlgili Dosya Bulunamamaktır.');
        }
    }
}
