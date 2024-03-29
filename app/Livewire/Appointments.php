<?php

namespace App\Livewire;

use App\Mail\AppointmentDeletedMailable;
use App\Mail\AppointmentStatusChangedMailable;
use App\Mail\NewAppointmentMailable;
use App\Mail\UserAppointmentChangeMailable;
use App\Models\Appointment;
use App\Models\Service;
use App\Models\Setting;
use App\Models\User;
use Auth;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Livewire\WithPagination;
use Mail;


class Appointments extends Component
{


    use withPagination;
//    Variables --------------------------------------------------------------------------------------------
    #[Locked]
    public $appointment;
    public $name;
    public $date;
    public $appointment_time;
    public $appointment_status;
    public $client_name;
    public $client_email;
    public $client_phone;
    public $client_message;
    public $client_referer;
    public $appointmentsVisibility;
    public bool $readonly = true;
    public $showAppointmentsModal = false;
    public  $search = '';

    //    Rules --------------------------------------------------------------------------------------------
    protected $rules = [
        'name' => 'required|string',
        'date' => 'required|string',
        'appointment_time' => 'required|string',
        'appointment_status' => 'required|string',
        'client_name' => 'required|string',
        'client_email' => 'required|email',
        "client_phone" => [
            "nullable",
            'regex:/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/',
        ],
        'client_message' => 'nullable|string|max:1000',
        'client_referer' => 'nullable|string',
    ];

    //    Mount --------------------------------------------------------------------------------------------
    public function mount(): void
    {
        $this->appointment = $this->makeBlankAppointment();
        $this->client_name = auth()->user()->name;
        $this->client_email = auth()->user()->email;
        $this->client_phone = auth()->user()->phone;
        $this->appointment_status = 'pending';
        $this->appointmentsVisibility = Setting::value('appointmentsVisibility') ?? false;
    }

    //    Actions --------------------------------------------------------------------------------------------
    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);
    }

    public function updatedSearch(): void
    {
        $this->resetPage();
    }

    //    Blank appointment ---------------------------------------------------------------------------------
    protected function makeBlankAppointment()
    {
        return Appointment::make();
    }
//    Add appointment ----------------------------------------------------------------------------------------
    public function addAppointment(): void
    {
        $this->appointment = $this->makeBlankAppointment();
        $this->showAppointmentsModal = true;
    }
//    Edit appointment ----------------------------------------------------------------------------------------
    public function edit(Appointment $appointment): void
    {
        $this->user_appointments($appointment);
    }

    public function editStatus(Appointment $appointment): void
    {
        $this->user_appointments($appointment);
    }

    /**
     * @param Appointment $appointment
     * @return void
     */
    protected function user_appointments(Appointment $appointment): void
    {
        $this->appointment = $appointment;

        $this->name = $appointment->name;
        $this->date = $appointment->date;
        $this->appointment_time = $appointment->appointment_time;
        $this->appointment_status = $appointment->appointment_status;
        $this->client_name = $appointment->client_name;
        $this->client_email = $appointment->client_email;
        $this->client_phone = $appointment->client_phone;
        $this->client_message = $appointment->client_message;
        $this->client_referer = $appointment->client_referer;

        $this->showAppointmentsModal = true;
    }

    //    save appointment ----------------------------------------------------------------------------------------
    public function save(): void
    {
        $this->commitSave();
    }

    protected function commitSave(): void
    {
        $this->validate();
        $this->assignAppointmentProperties();
        $this->appointment->save();
        $this->sendEmails();
        $this->showAppointmentsModal = false;
        $this->dispatch('notify', 'Appointment ' . ($this->isNewAppointment() ? 'created' : 'updated') . '!');
    }

    private function assignAppointmentProperties(): void
    {
        $user = Auth::user();
        $this->appointment->user_id = $user->id;
        $this->appointment->name = $this->name;
        $this->appointment->date = $this->date;
        $this->appointment->appointment_time = $this->appointment_time;
        $this->appointment->appointment_status = $this->appointment_status ?? 'pending';
        $this->appointment->client_name = $user->name;
        $this->appointment->client_email = $user->email;
        $this->appointment->client_phone = $user->phone;
        $this->appointment->client_message = $this->client_message;
        $this->appointment->client_referer = $this->client_referer;
    }

    private function isNewAppointment(): bool
    {
        return !$this->appointment->exists;
    }

    private function sendEmails(): void
    {
        $adminUsers = User::where('role', 'admin')->get();
        $userMailable = $this->isNewAppointment()
            ? new NewAppointmentMailable($this->appointment)
            : new UserAppointmentChangeMailable($this->appointment);

        Mail::to($this->appointment->client_email)->queue($userMailable);

        foreach ($adminUsers as $adminUser) {
            Mail::to($adminUser->email)->queue(clone $userMailable);
        }
    }

//    This is the original function if you prefer to use it. It is the same as the one above. I just refactored it.
//    protected function commitSave(): void
//    {
//        $this->validate();
//        $user = Auth::user();
//        $isNewAppointment = !$this->appointment->exists; // Check if the appointment does not exist in the database
//
//        // Get the admin users
//        $adminUsers = User::where('role', 'admin')->get();
//
//        $this->appointment->user_id = $user->id;
//        $this->appointment->name = $this->name;
//        $this->appointment->date = $this->date;
//        $this->appointment->appointment_time = $this->appointment_time;
//
//        if ($this->appointment_status == null) {
//            $this->appointment->appointment_status = 'pending';
//        } else {
//            $this->appointment->appointment_status = $this->appointment_status;
//        }
//
//        $this->appointment->client_name = $user->name;
//        $this->appointment->client_email = $user->email;
//        $this->appointment->client_phone = $user->phone;
//        $this->appointment->client_message = $this->client_message;
//        $this->appointment->client_referer = $this->client_referer;
//        $this->appointment->save();
//
//        // Send a different mailable to the user who created the appointment
//        $userMailable = $isNewAppointment
//            ? new NewAppointmentMailable($this->appointment)
//            : new UserAppointmentChangeMailable($this->appointment);
//
//        Mail::to($this->appointment->client_email)->queue($userMailable);
//
//        // Send a different mailable to the admin users
//        foreach ($adminUsers as $adminUser) {
//            $userMailable = $isNewAppointment
//                ? new NewAppointmentMailable($this->appointment)
//                : new UserAppointmentChangeMailable($this->appointment);
//            Mail::to($adminUser->email)->queue($userMailable);
//        }
//
//        $this->showAppointmentsModal = false;
//        $this->dispatch('notify', 'Appointment ' . ($isNewAppointment ? 'created' : 'updated') . '!');
//    }

    //    Change status ----------------------------------------------------------------------------------------
    public function changeStatus(): void
    {
        $this->commitChangeStatus();
    }

    protected function commitChangeStatus(): void
    {
        $this->authorize('changeStatus', $this->appointment);
        Appointment::find($this->appointment->id)->update(['appointment_status' => $this->appointment_status]);
        $adminUsers = User::where('role', 'admin')->get();

        $this->appointment->name = $this->name;
        $this->appointment->date = $this->date;
        $this->appointment->appointment_time = $this->appointment_time;
        $this->appointment->appointment_status = $this->appointment_status;
        $this->appointment->client_name = $this->client_name;
        $this->appointment->client_email = $this->client_email;
        $this->appointment->client_phone = $this->client_phone;
        $this->appointment->client_message = $this->client_message;
        $this->appointment->client_referer = $this->client_referer;
        $this->appointment->save();

        // Send the mailable to the user
        Mail::to($this->appointment->client_email)->queue(new AppointmentStatusChangedMailable($this->appointment));

        $this->dispatch('notify', 'Appointment updated!');
        $this->showAppointmentsModal = false;
    }

    //    Delete appointment ----------------------------------------------------------------------------------------
    public function delete(Appointment $appointment): void
    {
        $this->commitDelete($appointment);
    }

    protected function commitDelete(Appointment $appointment): void
    {
        $this->authorize('delete', $appointment);
        $this->sendDeleteEmails($appointment);
        $appointment->delete();
        $this->dispatch('notify', 'Appointment cancelled!');
    }

    private function sendDeleteEmails(Appointment $appointment): void
    {
        $adminUsers = User::where('role', 'admin')->get();

        Mail::to($appointment->client_email)->queue(new AppointmentDeletedMailable($appointment));

        foreach ($adminUsers as $adminUser) {
            Mail::to($adminUser->email)->queue(new AppointmentDeletedMailable($appointment));
        }
    }

//    protected function commitDelete(Appointment $appointment): void
//    {
//        // Get the admin users
//        $adminUsers = User::where('role', 'admin')->get();
//
//        Mail::to($appointment->client_email)->queue(new AppointmentDeletedMailable($appointment));
//
//        // Send a different mailable to the admin users
//        foreach ($adminUsers as $adminUser) {
//            Mail::to($adminUser->email)->queue(new AppointmentDeletedMailable($appointment));
//        }
//
//        $appointment->delete();
//        $this->dispatch('notify', 'Appointment cancelled!');
//    }

    //    Search appointments ----------------------------------------------------------------------------------
    public function applySearch($query): void
    {
        $this->commitApplySearch($query);
    }

    protected function commitApplySearch($query){
        return $this->search === ''
            ? $query
            : $query
                ->where('name', 'like', '%'.$this->search.'%');
    }

    public function applyAdminSearch($query): void
    {
       $this->commitApplyAdminSearch($query);
    }

    protected function commitApplyAdminSearch($query){
        return $this->search === ''
            ? $query
            : $query
                ->where('name', 'like', '%'.$this->search.'%')
                ->orWhere('date', 'like', '%'.$this->search.'%')
                ->orWhere('appointment_time', 'like', '%'.$this->search.'%')
                ->orWhere('appointment_status', 'like', '%'.$this->search.'%')
                ->orWhere('client_name', 'like', '%'.$this->search.'%')
                ->orWhere('client_email', 'like', '%'.$this->search.'%')
                ->orWhere('client_phone', 'like', '%'.$this->search.'%')
                ->orWhere('client_message', 'like', '%'.$this->search.'%')
                ->orWhere('client_referer', 'like', '%'.$this->search.'%');
    }
//    Render ----------------------------------------------------------------------------------------
    public function render(): Factory|View|Application
    {
        $adminQuery = Appointment::query(
            'name',
            'date',
            'appointment_time',
            'appointment_status',
            'client_name',
            'client_email',
            'client_phone',
            'client_message',
            'client_referer'
        );
        $adminQuery = $this->commitApplyAdminSearch($adminQuery);

        $query = Appointment::query()->where('user_id', auth()->id());
        $query = $this->commitApplySearch($query);

        return view('livewire.appointments', [
            'appointments' => $adminQuery->paginate(10),
            'userAppointments' => $query->paginate(10),
            'services' => Service::get('name'),
        ]);
    }
}
