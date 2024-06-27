<?php
// process_payment.php
session_start();
include '../config.php';
include '../calculate_bill.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['customer_id'])) {
    $units = $_POST['units'];
    $payment_method = $_POST['payment_method'];
    $customer_id = $_SESSION['customer_id'];
    $connection_type = $_SESSION['connection_type'];
    $amount = calculateBill($units, $connection_type);

    $sql = "INSERT INTO payments (customer_id, units, amount, payment_method) VALUES ('$customer_id', '$units', '$amount', '$payment_method')";

    if (mysqli_query($conn, $sql)) {
        echo "Payment successful! Amount paid: Rs. " . $amount;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    echo "Unauthorized access!";
}
?>
