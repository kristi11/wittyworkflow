<?php

namespace App\Livewire;

use App\Models\Hero;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class LandingpageHero extends Component
{
    use withFileUploads;
    public $hero;
    public $mainQuote;
    public $secondaryQuote;
    public $thirdQuote;
    public $gradientDegree;
    public $gradientFirstColor;
    public $gradientDegreeStart;
    public $gradientSecondColor;
    public $gradientDegreeEnd;
    public $waves;
        /**
         * @var true
         */
    public bool $showHeroModal;
    public $image;

    protected function rules(): array
    {
        return [
            "mainQuote" => ["required", "max:255", "string"],
            "secondaryQuote" => ["nullable", "max:255", "string"],
            "thirdQuote" => ["nullable", "max:255", "string"],
            "gradientDegree" => ["required", "numeric"],
            "gradientFirstColor" => ["required", "max:255", "string"],
            "gradientDegreeStart" => ["required", "numeric"],
            "gradientSecondColor" => ["required", "max:255", "string"],
            "gradientDegreeEnd" => ["required", "numeric"],
            "image" => ["nullable","sometimes","max:5120"],
            "waves" => ["required", "bool"],
        ];
    }

    public function messages(): array
    {
        return [
            "mainQuote.required" => "The Main quote is required.",
            "secondaryQuote.required" => "The Secondary quote is required.",
            "thirdQuote.required" => "The Third quote is required.",
            "gradientDegree.required" => "The Gradient degree is required.",
            "gradientFirstColor.required" => "The Gradient first color is required.",
            "gradientDegreeStart.required" => "The Gradient degree start is required.",
            "gradientSecondColor.required" => "The Gradient second color is required.",
            "gradientDegreeEnd.required" => "The Gradient degree end is required.",
            "waves.required" => "The waves field is required.",
            "image.image" => "The uploaded file must be an image.",
            "image.max" => "The image may not be greater than 5 Megabytes.",
        ];
    }

    public function mount(): void
    {

        $this->hero = new Hero();
    }

    //Realtime validation
    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);
    }

    public function editHero(Hero $hero): void
    {
            $this->hero = $hero;
            $this->mainQuote = $hero->mainQuote;
            $this->secondaryQuote = $hero->secondaryQuote;
            $this->thirdQuote = $hero->thirdQuote;
            $this->gradientDegree = $hero->gradientDegree;
            $this->gradientFirstColor = $hero->gradientFirstColor;
            $this->gradientDegreeStart = $hero->gradientDegreeStart;
            $this->gradientSecondColor = $hero->gradientSecondColor;
            $this->gradientDegreeEnd = $hero->gradientDegreeEnd;
            $this->image = $hero->image;
            $this->waves = $hero->waves;
            $this->showHeroModal = true;
    }

    #[On('saved')]
    public function save(): void
    {
        $this->commitSave();
    }

    protected function commitSave(): void
    {
        $this->authorize("save", $this->hero);
        $this->validate();
        $this->assignHeroProperties();
        $this->handleImageUpload();
        $this->hero->save();
        $this->showHeroModal = false;
        $this->dispatch("notify", "Saved!");
    }

    private function assignHeroProperties(): void
    {
        $user = auth()->user();
        $this->hero->user()->associate($user);
        $this->hero->mainQuote = $this->mainQuote;
        $this->hero->secondaryQuote = $this->secondaryQuote;
        $this->hero->thirdQuote = $this->thirdQuote;
        $this->hero->gradientDegree = $this->gradientDegree;
        $this->hero->gradientFirstColor = $this->gradientFirstColor;
        $this->hero->gradientDegreeStart = $this->gradientDegreeStart;
        $this->hero->gradientSecondColor = $this->gradientSecondColor;
        $this->hero->gradientDegreeEnd = $this->gradientDegreeEnd;
        $this->hero->waves = $this->waves;
    }

    private function handleImageUpload(): void
    {
        if ($this->image instanceof UploadedFile) {
            // Delete the old image file
            Storage::disk('s3-public')->delete($this->hero->image);

            // Save the new image file
            $filename = $this->image->store("heroImage", "s3-public");
            $this->hero->image = $filename;
        } elseif ($this->hero->getOriginal("image")) {
            // If no new image was uploaded and the original model has an image, retain the original image
            $this->hero->image = $this->hero->getOriginal("image");
        }
    }

//    #[On('saved')]
//    public function save(): void
//    {
//        $this->commitSave();
//    }
//
//    protected function commitSave(): void
//    {
//        $this->authorize("save", $this->hero);
//        $this->validate();
//        $user = auth()->user();
//        $this->hero->user_id = $user->id;
//        $this->hero->mainQuote = $this->mainQuote;
//        $this->hero->secondaryQuote = $this->secondaryQuote;
//        $this->hero->thirdQuote = $this->thirdQuote;
//        $this->hero->gradientDegree = $this->gradientDegree;
//        $this->hero->gradientFirstColor = $this->gradientFirstColor;
//        $this->hero->gradientDegreeStart = $this->gradientDegreeStart;
//        $this->hero->gradientSecondColor = $this->gradientSecondColor;
//        $this->hero->gradientDegreeEnd = $this->gradientDegreeEnd;
//        $this->hero->waves = $this->waves;
//
//        $newImageUploaded = false;
//        if ($this->image instanceof UploadedFile) {
//            // Delete the old image file
//            Storage::disk('s3-public')->delete($this->hero->image);
//
//            // Save the new image file
//            $filename = $this->image->store("heroImage", "s3-public");
//            $this->hero->image = $filename;
//
//            $newImageUploaded = true;
//        }
//
//        if (!$newImageUploaded && $this->hero->getOriginal("image")) {
//            // If no new image was uploaded and the original model has an image, retain the original image
//            $this->hero->image = $this->hero->getOriginal("image");
//        }
//        $this->hero->save();
//        $this->showHeroModal = false;
//        $this->dispatch("notify", "Saved!");
//    }

    public function render(): Factory|View|Application
    {
        return view('livewire.landingpage-hero', [
            'heroes' => Hero::first(),
        ]);
    }
}
