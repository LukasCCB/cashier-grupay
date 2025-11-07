<?php

namespace LukasCCB\GruPay;

use LukasCCB\GruPay\Concerns\ManagesCustomer;
use LukasCCB\GruPay\Concerns\ManagesSubscriptions;
use LukasCCB\GruPay\Concerns\ManagesTransactions;
use LukasCCB\GruPay\Concerns\PerformsCharges;

trait Billable
{
    use ManagesCustomer;
    use ManagesSubscriptions;
    use ManagesTransactions;
    use PerformsCharges;
}
