<?php

namespace Laravel\GruPay\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Laravel\GruPay\Subscription;

class SubscriptionUpdated
{
    use Dispatchable, SerializesModels;

    /**
     * The subscription instance.
     *
     * @var \Laravel\GruPay\Subscription
     */
    public $subscription;

    /**
     * The webhook payload.
     *
     * @var array
     */
    public $payload;

    /**
     * Create a new event instance.
     *
     * @param  \Laravel\GruPay\Subscription  $subscription
     * @param  array  $payload
     * @return void
     */
    public function __construct(Subscription $subscription, array $payload)
    {
        $this->subscription = $subscription;
        $this->payload = $payload;
    }
}
