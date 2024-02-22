<?php

namespace App\Livewire;

use App\Models\Gallery;
use App\Models\Service;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

/**
 * @property $user_id
 */
class Galleries extends Component
{
    use WithFileUploads;

    public $gallery;
    public $path = '';
    public $applied_to = '';

    public $description = '';
    public $showGalleryModal = false;
    public $showGalleryImageModal = false;

    public $editing = false;


    protected $rules = [
        'path' => 'nullable',
        'applied_to' => 'required|string|max:255',
        'description' => 'required|string|max:3000',
    ];

    public function mount(Gallery $gallery): void
    {
        $this->gallery = $gallery;
    }

    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);
    }

    public function makeBlankImage()
    {
        return Gallery::make();
    }

    public function addImage(): void
    {
        $this->gallery = $this->makeBlankImage();
        $this->path = '';
        $this->applied_to = '';
        $this->description = '';
        $this->showGalleryModal = true;
    }

    public function expandImage($galleryId): void
    {
        $this->gallery = Gallery::find($galleryId);
        $this->showGalleryImageModal = true;
    }

    public function expandCustomerImage($galleryId): void
    {
        $this->gallery = Gallery::find($galleryId);
        $this->showGalleryModal = true;
    }

    public function edit($galleryId): void
    {
        $this->editing = true;

        $gallery = Gallery::find($galleryId);
        $this->gallery = $gallery;
        $this->user_id = auth()->user()->id;

        $this->applied_to = $gallery->applied_to;
        $this->path = $gallery->path;
        $this->description = $gallery->description;

        $this->showGalleryModal = true;
    }

    public function save(): void
    {
       $this->commitSave();
    }

    protected function commitSave(): void
    {
        $this->authorize('save', $this->gallery);
        $this->editing = false;

        $this->validate();
        $admin = auth()->user();

        $this->gallery->user_id = $admin->id;
        $this->gallery->applied_to = $this->applied_to;
        $this->gallery->description = $this->description;

        $newImageUploaded = false;
        if ($this->path instanceof UploadedFile) {
            // Delete the old image file if it exists
            if ($this->gallery->path) {
                Storage::disk('s3-public')->delete($this->gallery->path);
            }

            // Save the new image file
            $filename = $this->path->store("serviceImages", "s3-public");
            $this->gallery->path = $filename;

            $newImageUploaded = true;
        }

        if (!$newImageUploaded && $this->gallery->getOriginal("path")) {
            // If no new image was uploaded and the original model has an image, retain the original path
            $this->gallery->path = $this->gallery->getOriginal("path");
        }

        $this->gallery->save();
        $this->showGalleryModal = false;
        $this->dispatch('notify', 'Image saved');
    }

    public function delete(Gallery $gallery): void
    {
        $this->authorize('delete', $gallery);
        $gallery->delete();
        Storage::disk('s3-public')->delete($gallery->path);
        $this->showGalleryModal = false;
        $this->dispatch('notify', 'Image deleted');
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.galleries', [
            'galleries' => Gallery::all(),
            'services' => Service::get('name'),
        ]);
    }
}
