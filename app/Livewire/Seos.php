<?php

namespace App\Livewire;


use App\Models\Seo;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class Seos extends Component
{
    public $seo;
    public $title;
    public $description;
    public $showSEOModal = false;

    public function rules(): array
    {
        return [
            "title" => [
                "nullable",
                "max:60",
                "string",
            ],
            "description" => ["nullable", "max:160", "string"],
        ];
    }

    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);
    }

    public function mount(): void
    {
        $this->seo = $this->makeBlankSEO();
    }

    public function makeBlankSEO()
    {
        return Seo::make([]);
    }

    public function save(): void
    {
        $this->validate();
        $user = auth()->user();
        $this->seo->user_id = $user->id;
        $this->seo->title = $this->title;
        $this->seo->description = $this->description;
        $this->seo->save();
        $this->showSEOModal = false;
        $this->dispatch("notify", "SEO saved!");
    }

    public function addSEO(): void
    {
        $this->seo = $this->makeBlankSEO();
        $this->showSEOModal = true;
    }

    public function edit(Seo $seo): void
    {
        if ($this->seo->isNot($seo)) {
            $this->seo = $seo;
            $this->title = $seo->title;
            $this->description = $seo->description;
        }
        $this->showSEOModal = true;
    }

    public function delete(Seo $seo): void
    {
        // Delete the Seo model instance
        $seo->delete();
        $this->dispatch("notify", "SEO deleted!");
        $this->reset();
    }

    public function render(): Factory|View|Application
    {
        $seos = Seo::first();
        return view('livewire.seos', [
            "seos" => $seos,
        ]);
    }
}
