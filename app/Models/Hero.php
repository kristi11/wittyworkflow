<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property mixed $user_id
 * @property array|mixed $image
 * @method static where(string $string, int|string|null $id)
 * @method static make()
 * @method static create(array $array)
 * @method static firstOrFail()
 * @method static first()
 */
class Hero extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'mainQuote',
        'secondaryQuote',
        'thirdQuote',
        'gradientDegree',
        'gradientFirstColor',
        'gradientDegreeStart',
        'gradientSecondColor',
        'gradientDegreeEnd',
        'image',
        'waves',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
