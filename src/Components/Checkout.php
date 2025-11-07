<?php

namespace Laravel\GruPay\Components;

use Illuminate\View\Component;
use Laravel\GruPay\Checkout as GruPayCheckout;

class Checkout extends Component
{
    /**
     * Initialise the Checkout component class.
     */
    public function __construct(
        protected GruPayCheckout $checkout,
        public string $id = 'grupay-checkout-container',
        protected int $height = 366,
        protected array $settings = []
    ) {
        //
    }

    /**
     * Get the view / view contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('cashier::components.checkout');
    }

    /**
     * Get the options for the inline GruPay Checkout script.
     *
     * @return array
     */
    public function options()
    {
        $options = $this->checkout->options();

        $options['settings']['frameTarget'] = $this->id;
        $options['settings']['frameInitialHeight'] = $this->height;

        $options['settings'] = array_filter(
            array_merge($options['settings'], $this->settings),
            fn ($option) => ! is_null($option)
        );

        return $options;
    }
}
