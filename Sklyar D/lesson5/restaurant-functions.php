<?php
function restaurant_check99($meal, $tax, $tip)
{
    $tax_amount = $meal * ($tax / 100);
    $tip_amount = $meal * ($tip / 100);
    $total_amount = $meal + $tax_amount + $tip_amount;
    return $total_amount;
}
function payment_method99($cash_on_hand, $amount)
{
    if ($amount > $cash_on_hand)
    {
        return 'credit card';
    }
    else
    {
        return 'cash';
    }
}