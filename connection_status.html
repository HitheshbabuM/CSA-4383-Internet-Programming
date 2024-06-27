<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connection Status - Indian Electricity Board</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }
        .container {
            max-width: 500px;
            margin: 50px auto;
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #0077b6;
            margin-bottom: 30px;
        }
        .status-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 30px;
        }
        .status-item {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        .status-item i {
            font-size: 24px;
            margin-right: 10px;
        }
        .status-item span {
            font-size: 18px;
            font-weight: 500;
        }
        .status-item.waiting i {
            color: #ffa500;
        }
        .status-item.approved i {
            color: #00b300;
        }
        .status-item.rejected i {
            color: #ff0000;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Connection Status</h2>
        <div class="status-container">
            <?php
            include '../config.php';

            $query = "SELECT * FROM new_connections WHERE email = '" . $_GET['email'] . "'";
            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $status = $row['status'];
                $statusClass = '';
                $statusIcon = '';

                switch ($status) {
                    case 'Waiting for approval':
                        $statusClass = 'waiting';
                        $statusIcon = 'fa-clock';
                        break;
                    case 'Approved':
                        $statusClass = 'approved';
                        $statusIcon = 'fa-check';
                        break;
                    case 'Rejected':
                        $statusClass = 'rejected';
                        $statusIcon = 'fa-times';
                        break;
                }

                echo "<div class='status-item " . $statusClass . "'>";
                echo "<i class='fas " . $statusIcon . "'></i>";
                echo "<span>" . $status . "</span>";
                echo "</div>";
            } else {
                echo "<div class='status-item'>";
                echo "<span>No connection request found for the provided email.</span>";
                echo "</div>";
            }
            ?>
        </div>
    </div>
</body>
</html>