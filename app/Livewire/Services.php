<?php

namespace App\Livewire;

use App\Models\Service;
use App\Models\Setting;
use App\Models\User;
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

    public $appointmentsVisibility;


    public $showServicesDescriptionModal = false;

    public $showDeleteModal = false;

    public $search = '';

    public function rules(): array
    {
        return [
            'name' => 'required|min:3|max:255',
            'description' => 'required|min:3|max:3000',
            'price' => 'nullable',
            'estimated_hours' => 'nullable|numeric',
            'estimated_minutes' => 'nullable|numeric|max:59',
            'extra_description' => 'nullable|min:3|max:255',
        ];
    }

    public function mount(Service $service): void
    {
//        $this->service = $this->makeBlackService();
        $this->service = $service;
        // Retrieve the value directly
        $this->appointmentsVisibility = Setting::value('appointmentsVisibility') ?? false;
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
        $this->service->price = empty($this->price) ? null : $this->price; // Handle nullable field
        $this->service->estimated_hours = empty($this->estimated_hours) ? null : $this->estimated_hours; // Handle nullable field
        $this->service->estimated_minutes = empty($this->estimated_minutes) ? null : $this->estimated_minutes; // Handle nullable field
        $this->service->extra_description = empty($this->extra_description) ? null : $this->extra_description; // Handle nullable field
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



    public function updatedSearch(): void
    {
        $this->resetPage();
    }

    protected function applySearch($query)
    {
        return $this->search === ''
            ? $query
            : $query
                ->where('name', 'like', '%'.$this->search.'%')
                ->orWhere('price', 'like', '%'.$this->search.'%');
    }

    public function render(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $query = Service::query()->where('user_id', auth()->id());

        $query = $this->applySearch($query);


        return view('livewire.services',
            [
                'services' => $query->paginate(5),
                'customerServices' => Service::query('name', 'description', 'price', 'estimated_hours', 'estimated_minutes', 'extra_description')->get(),
            ]);
    }
}
