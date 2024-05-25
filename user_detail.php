<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['email'] != 'theetshiAdmin@gmail.com') {
    header('Location: index.php');
    exit();
}

require_once 'model/DB.php';

// Retrieve all user details
$query = "SELECT id, name, email, course1, course2, course3, course4, course5, course6, course7, course8, course9, course10 FROM users";
$result = $callconn->query($query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hogwarts University - User Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffe6f0;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1000px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #ff66b2;
            color: white;
        }
    </style>
</head>
<body>
<?php include 'view/partials/navbar.php'; ?>

<div class="container">
    <h2>User Details</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Courses</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>";
                    for ($i = 1; $i <= 10; $i++) {
                        if (!empty($row["course$i"])) {
                            echo $row["course$i"] . "<br>";
                        }
                    }
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No users found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>



</body>
</html>
