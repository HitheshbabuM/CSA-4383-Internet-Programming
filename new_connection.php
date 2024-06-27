<?php
include '../config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $state = $_POST['state'];
    $area = $_POST['area'];
    $connection_type = $_POST['connection_type'];
    $status = 'Waiting for approval';

    $query = "INSERT INTO new_connections (name, email, phone, address, state, area, connection_type, status) VALUES ('$name', '$email', '$phone', '$address', '$state', '$area', '$connection_type', '$status')";
    if ($conn->query($query) === TRUE) {
        echo "New connection request submitted successfully";
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}
?>