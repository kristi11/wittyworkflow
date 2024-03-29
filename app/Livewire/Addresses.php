<?php

namespace App\Livewire;

use App\Models\Address;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class Addresses extends Component
{
    public $address;
    public $name;
    public $street;
    public $city;
    public $state;
    public $zip;
    public $phone;
    public $showAddressModal = false;

    protected $rules = [
        'name' => 'required|string',
        'street' => 'required|string',
        'city' => 'required|string',
        'state' => 'required|string',
        'zip' => 'required|integer',
        'phone' => 'nullable|string',
    ];

    public function mount(Address $address): void
    {
        $this->loadAddress($address);
    }

    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);
    }

    public function editAddress(Address $address): void
    {
        $this->loadAddress($address);
        $this->showAddressModal = true;
    }

    public function save(): void
    {
        $this->commitSave();
    }

    protected function commitSave(): void
    {
        $this->authorize('save', $this->address);
        $this->validateData();
        $this->updateAddressData();
        $this->saveAddress();
        $this->showAddressModal = false;
        $this->dispatch('notify', 'Address saved!');
    }

    protected function loadAddress(Address $address): void
    {
        $this->address = $address;
        $this->name = $address->name;
        $this->street = $address->street;
        $this->city = $address->city;
        $this->state = $address->state;
        $this->zip = $address->zip;
        $this->phone = $address->phone;
    }

    protected function validateData(): void
    {
        $this->validate($this->rules);
    }

    protected function updateAddressData(): void
    {
        $this->address->user_id = auth()->user()->id;
        $this->address->name = $this->name;
        $this->address->street = $this->street;
        $this->address->city = $this->city;
        $this->address->state = $this->state;
        $this->address->zip = $this->zip;
        $this->address->phone = $this->phone;
    }

    protected function saveAddress(): void
    {
        $this->address->save();
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.addresses', [
            'addresses' => Address::first(),
        ]);
    }
}
