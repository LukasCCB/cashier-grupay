<?php

namespace LukasCCB\GruPay;

use Illuminate\Database\Eloquent\Model;

/**
 * @property \LukasCCB\GruPay\Subscription|null $subscription
 */
class SubscriptionItem extends Model
{
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'quantity' => 'integer',
    ];

    /**
     * Get the subscription that the item belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subscription()
    {
        $model = Cashier::$subscriptionModel;

        return $this->belongsTo($model, (new $model)->getForeignKey());
    }
}
