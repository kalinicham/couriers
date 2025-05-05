<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;


/**
 * @property int $id
 * @property int $courier_id
 * @property float $latitude
 * @property float $longitude
 * @property Carbon $recorded_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
class CourierLocation extends Model
{
    protected $fillable = [
        'courier_id',
        'latitude',
        'longitude',
    ];

    public function courier(): BelongsTo
    {
        return $this->belongsTo(Couriers::class , 'courier_id');
    }
}
