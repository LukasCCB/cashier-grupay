<?php

namespace LukasCCB\GruPay\Components;

use Illuminate\View\Component;
use LukasCCB\GruPay\Checkout as GruPayCheckout;

class Button extends Component
{
    /**
     * Initialise the Button component class.
     */
    public function __construct(public GruPayCheckout $checkout)
    {
        //
    }

    /**
     * Get the view / view contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('cashier::components.button');
    }
}
