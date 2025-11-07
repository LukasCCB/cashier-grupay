<?php

namespace Workbench\App\Models;

use Illuminate\Foundation\Auth\User as Authenticable;
use Laravel\GruPay\Billable;

class User extends Authenticable
{
    use Billable;

    protected $guarded = [];
}
