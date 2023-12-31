<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property mixed $client_name
 * @property mixed $client_email
 * @property mixed $client_phone
 * @property mixed $client_message
 * @property mixed $client_referer
 */
class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'date',
        'appointment_time',
        'appointment_status',
        'client_name',
        'client_email',
        'client_phone',
        'client_message',
        'client_referer'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
