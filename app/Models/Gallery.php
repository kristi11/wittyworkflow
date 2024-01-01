<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property mixed $description
 * @property mixed $path
 */
class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'applied_to',
        'path',
        'description',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
