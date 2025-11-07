<?php

return [

    /*
    |--------------------------------------------------------------------------
    | GruPay Keys
    |--------------------------------------------------------------------------
    |
    | The GruPay seller ID and API key will allow your application to call
    | the GruPay API. The seller key is typically used when interacting
    | with GruPay.js, while the "API" key accesses private endpoints.
    |
    */

    'client_token' => env('GRUPAY_CLIENT_TOKEN'),

    'api_key' => env('GRUPAY_API_KEY'),

    /*
    |--------------------------------------------------------------------------
    | Cashier Path
    |--------------------------------------------------------------------------
    |
    | This is the base URI path where Cashier's views, such as the webhook
    | route, will be available. You're free to tweak this path based on
    | the needs of your particular application or design preferences.
    |
    */

    'path' => env('CASHIER_PATH', 'grupay'),

    /*
    |--------------------------------------------------------------------------
    | Cashier Webhook
    |--------------------------------------------------------------------------
    |
    | This is the base URI where webhooks from GruPay will be sent. The URL
    | built into Cashier GruPay is used by default; however, you can add
    | a custom URL when required for any application testing purposes.
    |
    */

    'webhook' => env('CASHIER_WEBHOOK'),

    /*
    |--------------------------------------------------------------------------
    | Currency
    |--------------------------------------------------------------------------
    |
    | This is the default currency that will be used when generating charges
    | from your application. Of course, you are welcome to use any of the
    | various world currencies that are currently supported via GruPay.
    |
    */

    'currency' => env('CASHIER_CURRENCY', 'BRL'),

    /*
    |--------------------------------------------------------------------------
    | Currency Locale
    |--------------------------------------------------------------------------
    |
    | This is the default locale in which your money values are formatted in
    | for display. To utilize other locales besides the default en locale
    | verify you have the "intl" PHP extension installed on the system.
    |
    */

    'currency_locale' => env('CASHIER_CURRENCY_LOCALE', 'pt-br'),

    /*
    |--------------------------------------------------------------------------
    | GruPay Sandbox
    |--------------------------------------------------------------------------
    |
    | This option allows you to toggle between the GruPay live environment
    | and its sandboxed environment.
    |
    */

    'sandbox' => env('GRUPAY_SANDBOX', false),

];
