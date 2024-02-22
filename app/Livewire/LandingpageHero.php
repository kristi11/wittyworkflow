<?php

namespace App\Livewire;

use App\Models\Hero;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class LandingpageHero extends Component
{
    use withFileUploads;

    public Hero $hero;
    public User $user;
    /**
     * @var true
     */
    public bool $showHeroModal;
    public $image;



    protected function rules(): array
    {
        return [
            "hero.mainQuote" => ["required", "max:255", "string"],
            "hero.secondaryQuote" => ["nullable", "max:255", "string"],
            "hero.thirdQuote" => ["nullable", "max:255", "string"],
            "hero.gradientDegree" => ["required", "max:90", "numeric"],
            "hero.gradientFirstColor" => ["required", "max:255", "string"],
            "hero.gradientDegreeStart" => ["required", "max:100", "numeric"],
            "hero.gradientSecondColor" => ["required", "max:255", "string"],
            "hero.gradientDegreeEnd" => ["required", "max:100", "numeric"],
            "image" => ["nullable","image", "max:5120"],
            "hero.waves" => ["required", "bool"],
        ];
    }

    public function messages(): array
    {
        return [
            "hero.mainQuote.required" => "The Main quote is required.",
            "hero.secondaryQuote.required" => "The Secondary quote is required.",
            "hero.thirdQuote.required" => "The Third quote is required.",
            "hero.gradientDegree.required" => "The Gradient degree is required.",
            "hero.gradientFirstColor.required" => "The Gradient first color is required.",
            "hero.gradientDegreeStart.required" => "The Gradient degree start is required.",
            "hero.gradientSecondColor.required" => "The Gradient second color is required.",
            "hero.gradientDegreeEnd.required" => "The Gradient degree end is required.",
            "hero.waves.required" => "The waves field is required.",
            "image.image" => "The uploaded file must be an image.",
            "image.max" => "The image may not be greater than 5 Megabytes.",
        ];
    }

    public function mount(): void
    {

        $this->hero = $this->makeBlankHero();
    }

    //Realtime validation
    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);
    }

    function makeBlankHero()
    {
        return Hero::make();
    }

    public function editHero(Hero $hero): void
    {
        if ($this->hero->isNot($hero)) {
            $this->hero = $hero;
        }
        $this->showHeroModal = true;
    }

    #[On('saved')]
    public function save(): void
    {
        $this->validate();
        $user = auth()->user();
        $this->hero->user_id = $user->id;
        $newImageUploaded = false;
        if ($this->image) {
            // Delete the old image file
            Storage::delete("heroImage/" . $this->hero->image);

            // Save the new image file
            $filename = $this->image->store("/", "heroImage");
            $this->hero->image = $filename;

            $newImageUploaded = true;
        }

        if (!$newImageUploaded && $this->hero->getOriginal("image")) {
            // If no new image was uploaded and the original model has an image, retain the original image
            $this->hero->image = $this->hero->getOriginal("image");
        }
        $this->hero->save();
        $this->showHeroModal = false;
        $this->dispatch("notify", "Saved!");
    }

    public function render(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.landingpage-hero', [
            'heroes' => Hero::where("user_id", auth()->id())->get()
        ]);
    }
}
