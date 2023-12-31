<?php

namespace App\Livewire;

use App\Models\Social;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class Socials extends Component
{
    public $social;
    public $instagram;
    public $facebook;
    public $twitter;
    public $linkedin;

    public $showSocialsModal = false;

    public function rules(): array
    {
        return [
            "instagram" => [
                "nullable",
                "string",
//                "url",
//                "regex:/^(https?:\/\/)?(www\.)?instagram\.com\/[A-Za-z0-9_-]+\/?$/",
            ],

            "facebook" => [
                "nullable",
                "string",
//                "url",
//                "regex:/^(https?:\/\/)?(www\.)?facebook\.com\/[A-Za-z0-9_\-\.]+\/?$/",
            ],

            "twitter" => [
                "nullable",
                "string",
//                "url",
//                "regex:/^(https?:\/\/)?(www\.)?twitter\.com\/[A-Za-z0-9_]+\/?$/",
            ],

            "linkedin" => [
                "nullable",
                "string",
//                "url",
//                "regex:/^(https?:\/\/)?(www\.)?linkedin\.com\/in\/[A-Za-z0-9_-]+\/?$/",
            ],
        ];
    }
    public function mount(): void
    {
        $this->social = Social::make();
    }

    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);
    }

    public function save(): void
    {
        $this->validate();

        $existingSocial = Social::where('user_id', auth()->user()->id)->first();

        if ($existingSocial) {
            // If it exists, update the existing record
            $existingSocial->update([
                'instagram' => $this->instagram,
                'facebook' => $this->facebook,
                'twitter' => $this->twitter,
                'linkedin' => $this->linkedin,
            ]);
        } else {
            // If it doesn't exist, create a new record
            Social::create([
                'user_id' => auth()->user()->id,
                'instagram' => $this->instagram,
                'facebook' => $this->facebook,
                'twitter' => $this->twitter,
                'linkedin' => $this->linkedin,
            ]);
        }

        $this->showSocialsModal = false;
        $this->dispatch('notify', 'Socials saved');
    }


    public function edit($socialId): void
    {
        $social = Social::find($socialId);
        $this->instagram = $social->instagram;
        $this->facebook = $social->facebook;
        $this->twitter = $social->twitter;
        $this->linkedin = $social->linkedin;

        $this->showSocialsModal = true;
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.socials',
            [
                'socials' => Social::first(),
            ]);
    }
}
