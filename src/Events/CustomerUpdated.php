<?php

namespace LukasCCB\GruPay\Events;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use LukasCCB\GruPay\Customer;

class CustomerUpdated
{
    use Dispatchable, SerializesModels;

    /**
     * The billable entity.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    public $billable;

    /**
     * The customer instance.
     *
     * @var \LukasCCB\GruPay\Customer
     */
    public $customer;

    /**
     * The webhook payload.
     *
     * @var array
     */
    public $payload;

    /**
     * Create a new event instance.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $billable
     * @param  \LukasCCB\GruPay\Customer  $customer
     * @param  array  $payload
     * @return void
     */
    public function __construct(Model $billable, Customer $customer, array $payload)
    {
        $this->billable = $billable;
        $this->customer = $customer;
        $this->payload = $payload;
    }
}
