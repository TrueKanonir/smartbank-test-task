<?php

namespace Domain\Shop;

use Domain\Merchant\Merchant;
use Domain\Shop\Data\CoordinateData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @package Domain\Shop
 * @property int $id
 * @property int $merchant_id
 * @property string $address
 * @property string $schedule
 * @property float $longitude
 * @property float $latitude
 * @property-read  \Domain\Shop\Data\CoordinateData $coordinates
 * @property \Domain\Merchant\Merchant $merchant
 */
class Shop extends Model
{
    use HasFactory;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'shops';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'merchant_id',
        'address',
        'schedule',
        'longitude',
        'latitude',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, mixed>
     */
    protected $casts = [
        'merchant_id' => 'int',
        'longitude' => 'float',
        'latitude' => 'float',
    ];

    /**
     * The model's attributes.
     *
     * @var array<string, mixed>
     */
    protected $attributes = [];

    /**
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function coordinates(): Attribute
    {
        return Attribute::get(fn () => new CoordinateData(
            $this->longitude,
            $this->latitude
        ));
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function merchant(): BelongsTo
    {
        return $this->belongsTo(Merchant::class, 'merchant_id');
    }
}
