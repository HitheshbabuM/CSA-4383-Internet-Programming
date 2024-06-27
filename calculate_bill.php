<?php
// calculate_bill.php

function calculateBill($units, $type) {
    $amount = 0;
    if ($type == 'domestic') {
        if ($units <= 100) {
            $amount = $units * 1;
        } elseif ($units <= 200) {
            $amount = 100 * 1 + ($units - 100) * 2.5;
        } elseif ($units <= 500) {
            $amount = 100 * 1 + 100 * 2.5 + ($units - 200) * 4;
        } else {
            $amount = 100 * 1 + 100 * 2.5 + 300 * 4 + ($units - 500) * 6;
        }
    } else if ($type == 'commercial') {
        if ($units <= 100) {
            $amount = $units * 2;
        } elseif ($units <= 200) {
            $amount = 100 * 2 + ($units - 100) * 4.5;
        } elseif ($units <= 500) {
            $amount = 100 * 2 + 100 * 4.5 + ($units - 200) * 6;
        } else {
            $amount = 100 * 2 + 100 * 4.5 + 300 * 6 + ($units - 500) * 7;
        }
    }
    return $amount;
}
?>
