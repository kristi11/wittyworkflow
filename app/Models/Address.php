<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property mixed $street
 * @property mixed $phone
 */
class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'street',
        'city',
        'state',
        'zip',
        'phone',
    ];

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
