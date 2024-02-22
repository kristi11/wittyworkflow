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
        $this->commitSave();
    }

    protected function commitSave(): void
    {
        $this->authorize("save", $this->social);
        $this->validate();
        $this->assignSocialProperties();
        $this->showSocialsModal = false;
        $this->dispatch('notify', 'Socials saved');
    }

    private function assignSocialProperties(): void
    {
        $existingSocial = Social::where('user_id', auth()->user()->id)->first();
        if ($existingSocial) {
            $existingSocial->update([
                'instagram' => $this->instagram,
                'facebook' => $this->facebook,
                'twitter' => $this->twitter,
                'linkedin' => $this->linkedin,
            ]);
        } else {
            Social::create([
                'user_id' => auth()->user()->id,
                'instagram' => $this->instagram,
                'facebook' => $this->facebook,
                'twitter' => $this->twitter,
                'linkedin' => $this->linkedin,
            ]);
        }
    }

    public function edit($socialId): void
    {
        $this->commitEdit($socialId);
    }

    protected function commitEdit($socialId): void
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
