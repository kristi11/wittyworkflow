<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property mixed $estimated_hours
 * @property mixed $estimated_minutes
 * @method static get(string $string)
 */
class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'description',
        'price',
        'estimated_hours',
        'estimated_minutes',
        'extra_description',
    ];

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
