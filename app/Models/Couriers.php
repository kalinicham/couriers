<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $name
 * @property int $age
 * @property string $gender
 * @property int $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
class Couriers extends Model
{
    /** @use HasFactory<\Database\Factories\CouriersFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'age',
        'gender',
        'status',
    ];

    public function latestLocation() {
        return $this->hasOne(CourierLocation::class, 'courier_id')->latestOfMany('recorded_at');
    }
}
