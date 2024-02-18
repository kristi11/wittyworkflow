<?php

namespace App\Livewire\Users;

use App\Models\Functionality;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;

    public $user;
    public $role;
    public string $search = '';
    public bool $showEditModal = false;


    protected function rules(): array
    {
        return [
            "role" => [
                "required",
                "in:" .
                collect(Functionality::ROLE)
                    ->keys()
                    ->implode(","),
            ],
        ];
    }

    public function mount(): void
    {
        $this->user = new User(); // Initialize the user property with a User instance, or load it from your data source
    }


    public function edit(User $user)
    {
        // Set the selected user and their role for editing
        $this->user = $user;
        $this->role = $user->role;
        $this->showEditModal = true;
    }

    #[On('saved')]
    public function save(): void
    {
        $this->commitSave();
    }

    protected function commitSave(): void
    {
        $this->validate();


        // Update the selected user's role with the selected role
        $this->user->role = $this->role;
        $this->user->save();

        // Close the edit modal
        $this->showEditModal = false;

        // Notify the user about the role change
        $this->dispatch('notify', $this->user->name . '\'s role changed to ' . $this->role . '.');

    }


    public function render(): Factory|View|Application
    {
        return view('livewire.users.users', [
            'users' => User::search('name', $this->search)->paginate('5'),
            'user' => $this->user,
        ]);
    }
}
