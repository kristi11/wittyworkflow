<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Functionality extends Model
{

    protected $fillable = [
        'role',
    ];

    const ROLE = [
        'staff' => 'Staff',
        'user' => 'User',
    ];

    const IS_OPEN = [
        false => 'Closed',
        true => 'Open',
    ];

    const WEEK_DAYS = [
        'sunday' => 'Sunday',
        'monday' => 'Monday',
        'tuesday' => 'Tuesday',
        'wednesday' => 'Wednesday',
        'thursday' => 'Thursday',
        'friday' => 'Friday',
        'saturday' => 'Saturday',
    ];

    const APPOINTMENT_STATUS = [
        'pending' => 'Pending',
        'confirmed' => 'Confirmed',
        'cancelled' => 'Cancelled',
        'completed' => 'Completed',
        'no_show' => 'No Show',
        'rescheduled' => 'Rescheduled',
    ];
}
