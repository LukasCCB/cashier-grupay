<?php
$transaction = $checkout->getTransaction();
$items = $checkout->getItems();
$customer = $checkout->getCustomer();
$custom = $checkout->getCustomData();
?>

<a
    href='#!'
    @if ($transaction)
        data-transaction-id='{{ $transaction['id'] }}'
    @else
        data-items='{!! json_encode($items) !!}'
    @endif
    data-allow-logout='false'
    @if ($customer) data-customer-id='{{ $customer->grupay_id }}' @endif
    @if ($custom) data-custom-data='{{ json_encode($custom) }}' @endif
    @if ($returnUrl = $checkout->getReturnUrl()) data-success-url='{{ $returnUrl }}' @endif
    {{ $attributes->merge(['class' => 'grupay_button']) }}
>
    {{ $slot }}
</a>
