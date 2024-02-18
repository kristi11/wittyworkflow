<?php

namespace App\Livewire;

use App\Models\BusinessHour;
use App\Models\Functionality;
use App\Models\Setting;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Validation\Rule;
use Livewire\Component;

class BusinessHours extends Component
{
    public  $businessHour;
    public  $day;
    public  $open_from;
    public  $open_until;

    public $open = '';
    public $showBusinessHoursModal = false;

    public $alwaysOpen;

    public function rules(): array
    {
        $rules = [
            'day' => [
                'required',
                'in:' . implode(',', array_keys(Functionality::WEEK_DAYS)),
            ],
            'open' => 'required|in:' . implode(',', array_keys(Functionality::IS_OPEN)),
        ];

        // Add a custom rule for creating a new record with a unique day
        if (!$this->businessHour->exists) {
            $rules['day'][] = Rule::unique('business_hours', 'day')->where(function ($query) {
                return $query->where('user_id', auth()->user()->id);
            });
        } else {
            // Custom rule to check uniqueness when the 'day' is changing
            $rules['day'][] = Rule::unique('business_hours', 'day')->ignore($this->businessHour->id)->where(function ($query) {
                return $query->where('user_id', auth()->user()->id);
            });
        }

        // Add conditional rules for 'open_from' and 'open_until' based on the 'open' field
        if ($this->open) {
            $rules['open_from'] = 'required|string';
            $rules['open_until'] = 'required|string';
        } else {
            $rules['open_from'] = 'nullable|string';
            $rules['open_until'] = 'nullable|string';
        }

        return $rules;
    }



    public function messages(): array
    {
        return [
            'day.required' => 'The day field is required.',
            'open.required' => 'The status is required.',
            'day.unique' => 'You\'ve already added business hours for this day.',
            'open.in' => 'The status must be open or closed.',
            'open_from.required' => 'You need to specify the opening time.',
            'open_until.required' => 'You need to specify the closing time.',
        ];
    }


    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);

    }

    public function mount(): void
    {
        $this->businessHour = $this->makeBlankBusinessHours();
        $this->alwaysOpen = Setting::value('alwaysOpen') ?? false;
    }

    private function makeBlankBusinessHours()
    {
        return BusinessHour::make([]);
    }

    public function toggleAlwaysOpen(): void
    {
        $this->alwaysOpen = !$this->alwaysOpen;

        // Update or create the setting record
        Setting::updateOrCreate(
            ['user_id' => 1],
            ['alwaysOpen' => $this->alwaysOpen],
        );

        $this->dispatch('notify', 'Always open status changed!');
    }

    public function edit(BusinessHour $businessHour): void
    {

        $this->businessHour = $businessHour;
        $this->day = $businessHour->day;
        $this->open_from = $businessHour->open_from;
        $this->open_until = $businessHour->open_until;
        $this->open = $businessHour->open;

        $this->showBusinessHoursModal = true;
    }

    public function delete(BusinessHour $businessHour): void
    {
        $this->authorize('delete', $businessHour);
        BusinessHour::find($businessHour->id)->delete();
        $this->dispatch('notify', 'Business hour deleted');
    }

    public function addHours(): void
    {
        $this->businessHour = $this->makeBlankBusinessHours();
        $this->showBusinessHoursModal = true;
    }
//
//    public function toggle(): void
//    {
//           $this->open = !$this->open;
//    }

    public function save(): void
    {
        $this->authorize('save', $this->businessHour);
        $this->validate();
        $this->businessHour->user_id = auth()->user()->id;

        if (!$this->open) {
            $this->businessHour->open = false;
            $this->businessHour->open_from = null;
            $this->businessHour->open_until = null;
        } else {
            $this->businessHour->open = true;
            $this->businessHour->open_from = $this->open_from;
            $this->businessHour->open_until = $this->open_until;
        }

        $this->businessHour->day = $this->day;
        $this->businessHour->save();
        $this->dispatch('notify', 'Business hour saved');
        $this->showBusinessHoursModal = false;
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.business-hours',
            [
                'businessHours' => BusinessHour::query('day', 'open_from', 'open_until', 'open')->get(),
            ]);
    }
}
