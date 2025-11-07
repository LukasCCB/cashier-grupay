<?php

namespace Laravel\GruPay;

use Laravel\GruPay\Concerns\ManagesCustomer;
use Laravel\GruPay\Concerns\ManagesSubscriptions;
use Laravel\GruPay\Concerns\ManagesTransactions;
use Laravel\GruPay\Concerns\PerformsCharges;

trait Billable
{
    use ManagesCustomer;
    use ManagesSubscriptions;
    use ManagesTransactions;
    use PerformsCharges;
}
