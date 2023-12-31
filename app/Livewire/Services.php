<?php

namespace App\Livewire;

use App\Models\Service;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;
use Livewire\WithPagination;

class Services extends Component
{
    use WithPagination;

    public $service;

    public $name;

    public $description;
    public $price;
    public $estimated_hours;
    public $estimated_minutes;
    public $extra_description;

    public $showServicesModal = false;
    private $deleteId;


    public $showServicesDescriptionModal = false;

    public $showDeleteModal = false;

    public function rules(): array
    {
        return [
            'name' => 'required|min:3|max:255',
            'description' => 'required|min:3|max:3000',
            'price' => 'required|numeric|min:0|max:1000000',
            'estimated_hours' => 'required|numeric',
            'estimated_minutes' => 'required|numeric|max:59',
            'extra_description' => 'nullable|min:3|max:255',
        ];
    }

    public function mount(Service $service): void
    {
//        $this->service = $this->makeBlackService();
        $this->service = $service;
    }

    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);
    }

    public function makeBlackService()
    {
        return Service::make([]);
    }

    public function addService(): void
    {
        $this->reset();
        $this->service = $this->makeBlackService();
        $this->showServicesModal = true;
    }

    public function serviceDescription($serviceId): void
    {
        $this->service = Service::find($serviceId);
        $this->showServicesDescriptionModal = true;
    }

    public function editService(Service $service): void
    {
        $this->service = $service;
        $this->name = $service->name;
        $this->description = $service->description;
        $this->price = $service->price;
        $this->estimated_hours = $service->estimated_hours;
        $this->estimated_minutes = $service->estimated_minutes;
        $this->extra_description = $service->extra_description;
        $this->showServicesModal = true;
    }

    public function save(): void
    {
        $this->validate();

        $this->service->user_id = auth()->id();
        $this->service->name = $this->name;
        $this->service->description = $this->description;
        $this->service->price = $this->price;
        $this->service->estimated_hours = $this->estimated_hours;
        $this->service->estimated_minutes = $this->estimated_minutes;
        $this->service->extra_description = $this->extra_description;
        $this->service->save();

        $this->showServicesModal = false;
        $this->dispatch('notify', 'Service saved!');
    }

    public function delete($id): void
    {
        $this->deleteId = $id;
        Service::find($id)->delete();
        $this->dispatch("notify", "Service deleted!");
    }



    public function render(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.services',
            [
                'services' => Service::where("user_id", auth()->id())->paginate(5),
                'customerServices' => Service::query('name', 'description', 'price', 'estimated_hours', 'estimated_minutes', 'extra_description')->get(),
            ]);
    }
}
