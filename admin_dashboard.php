<?php
$servername = "localhost";
$username = "root";
$password = "@@8790658049@@";
$dbname = "billpayment";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $domestic_first_100 = $_POST['domestic_first_100'];
    $domestic_next_100 = $_POST['domestic_next_100'];
    $domestic_next_300 = $_POST['domestic_next_300'];
    $domestic_above_500 = $_POST['domestic_above_500'];
    $commercial_first_100 = $_POST['commercial_first_100'];
    $commercial_next_100 = $_POST['commercial_next_100'];
    $commercial_next_300 = $_POST['commercial_next_300'];
    $commercial_above_500 = $_POST['commercial_above_500'];

    // Update rates for domestic
    $update_domestic = "UPDATE rates SET first_100_units='$domestic_first_100', next_100_units='$domestic_next_100', next_300_units='$domestic_next_300', above_500_units='$domestic_above_500' WHERE connection_type='domestic'";
    if ($conn->query($update_domestic) === TRUE) {
        echo "Domestic rates updated successfully.";
    } else {
        echo "Error updating domestic rates: " . $conn->error;
    }

    // Update rates for commercial
    $update_commercial = "UPDATE rates SET first_100_units='$commercial_first_100', next_100_units='$commercial_next_100', next_300_units='$commercial_next_300', above_500_units='$commercial_above_500' WHERE connection_type='commercial'";
    if ($conn->query($update_commercial) === TRUE) {
        echo "Commercial rates updated successfully.";
    } else {
        echo "Error updating commercial rates: " . $conn->error;
    }
}

// Fetch current rates
$sql = "SELECT * FROM rates";
$result = $conn->query($sql);

$domestic_rates = [];
$commercial_rates = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        if ($row['connection_type'] == 'domestic') {
            $domestic_rates = $row;
        } else if ($row['connection_type'] == 'commercial') {
            $commercial_rates = $row;
        }
    }
} else {
    echo "0 results";
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Update Rates</h1>
    <form method="POST" action="">
        <h2>Domestic Rates</h2>
        <label>First 100 units: </label>
        <input type="text" name="domestic_first_100" value="<?php echo isset($domestic_rates['first_100_units']) ? $domestic_rates['first_100_units'] : ''; ?>"><br>
        <label>Next 100 units: </label>
        <input type="text" name="domestic_next_100" value="<?php echo isset($domestic_rates['next_100_units']) ? $domestic_rates['next_100_units'] : ''; ?>"><br>
        <label>Next 300 units: </label>
        <input type="text" name="domestic_next_300" value="<?php echo isset($domestic_rates['next_300_units']) ? $domestic_rates['next_300_units'] : ''; ?>"><br>
        <label>Above 500 units: </label>
        <input type="text" name="domestic_above_500" value="<?php echo isset($domestic_rates['above_500_units']) ? $domestic_rates['above_500_units'] : ''; ?>"><br>
        
        <h2>Commercial Rates</h2>
        <label>First 100 units: </label>
        <input type="text" name="commercial_first_100" value="<?php echo isset($commercial_rates['first_100_units']) ? $commercial_rates['first_100_units'] : ''; ?>"><br>
        <label>Next 100 units: </label>
        <input type="text" name="commercial_next_100" value="<?php echo isset($commercial_rates['next_100_units']) ? $commercial_rates['next_100_units'] : ''; ?>"><br>
        <label>Next 300 units: </label>
        <input type="text" name="commercial_next_300" value="<?php echo isset($commercial_rates['next_300_units']) ? $commercial_rates['next_300_units'] : ''; ?>"><br>
        <label>Above 500 units: </label>
        <input type="text" name="commercial_above_500" value="<?php echo isset($commercial_rates['above_500_units']) ? $commercial_rates['above_500_units'] : ''; ?>"><br>

        <button type="submit">Update Rates</button>
    </form>
</body>
</html>
