<?php

namespace Domain\Merchant;

use Domain\Shop\Shop;
use JetBrains\PhpStorm\Pure;
use Illuminate\Database\Eloquent\Model;
use Domain\Merchant\Enums\MerchantStatus;
use Illuminate\Database\Eloquent\Builder;
use Domain\Merchant\Builders\MerchantBuilder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @package Domain\Merchant
 * @property int $id
 * @property string $name
 * @property \Domain\Merchant\Enums\MerchantStatus $status
 * @property \Carbon\Carbon $registered_at
 * @property \Illuminate\Database\Eloquent\Collection<Shop> $shops
 */
class Merchant extends Model
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
    protected $table = 'merchants';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'status',
        'registered_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, mixed>
     */
    protected $casts = [
        'status' => MerchantStatus::class,
        'registered_at' => 'datetime',
    ];

    /**
     * The model's attributes.
     *
     * @var array<string, mixed>
     */
    protected $attributes = [
        'status' => MerchantStatus::InActive,
    ];

    /**
     * Begin querying the model.
     *
     * @return \Domain\Merchant\Builders\MerchantBuilder|\Illuminate\Database\Eloquent\Builder
     */
    public static function query(): MerchantBuilder | Builder
    {
        return parent::query();
    }

    /**
     * Create a new Eloquent query builder for the model.
     *
     * @param \Illuminate\Database\Query\Builder $query
     * @return \Domain\Merchant\Builders\MerchantBuilder|\Illuminate\Database\Eloquent\Builder
     */
    #[Pure]
    public function newEloquentBuilder($query): MerchantBuilder | Builder
    {
        return new MerchantBuilder($query);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function shops(): HasMany
    {
        return $this->hasMany(Shop::class);
    }
}
