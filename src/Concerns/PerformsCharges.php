<?php

namespace LukasCCB\GruPay\Concerns;

use LukasCCB\GruPay\Cashier;
use LukasCCB\GruPay\Checkout;
use LukasCCB\GruPay\Subscription;
use LukasCCB\GruPay\SubscriptionBuilder;

trait PerformsCharges
{
    /**
     * Get a checkout instance for a given list of prices.
     *
     * @param array|string $prices
     * @param  int         $quantity
     *
     * @return Checkout
     */
    public function checkout(array|string $prices, int $quantity = 1): Checkout
    {
        $customer = $this->createAsCustomer();

        return Checkout::customer($customer, is_array($prices) ? $prices : [$prices => $quantity]);
    }

    /**
     * Subscribe the customer to a new plan variant.
     *
     * @param  string|array  $prices
     * @param  string  $type
     *
     * @return Checkout
     */
    public function subscribe($prices, string $type = Subscription::DEFAULT_TYPE)
    {
        return $this->checkout($prices)->customData(['subscription_type' => $type]);
    }

    /**
     * Subscribe the customer to a new product.
     *
     * @param  int  $amount
     * @param  string  $name
     * @param  string  $type
     * @return SubscriptionBuilder
     */
    public function newSubscription(int $amount, string $name, string $type = Subscription::DEFAULT_TYPE)
    {
        return new SubscriptionBuilder($this, $amount, $name, $type);
    }

    /**
     * Creates a transaction for a "one-off" charge for the given amount and returns a checkout instance.
     *
     * @param  int  $amount
     * @param  string  $name
     * @param  array  $options
     *
     * @return Checkout
     */
    public function charge(int $amount, string $name, array $options = []): Checkout
    {
        return $this->chargeMany([array_replace_recursive([
            'price' => [
                'description' => "$name Custom Price",
                'unit_price' => [
                    'amount' => (string) $amount,
                    'currency_code' => config('cashier.currency'),
                ],
                'product' => [
                    'name' => $name,
                    'tax_category' => 'standard',
                ],
            ],
            'quantity' => 1,
        ], $options)]);
    }

    /**
     * Creates a transaction for a "one-off" charge for the given items and returns a checkout instance.
     *
     * @param  array $items
     *
     * @return Checkout
     */
    public function chargeMany(array $items): Checkout
    {
        $customer = $this->createAsCustomer();

        $transaction = Cashier::api('POST', 'transactions', ['items' => $items])->json()['data'];

        return Checkout::transaction($transaction, $customer);
    }
}
