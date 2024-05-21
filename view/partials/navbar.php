<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        nav {
            background-color: #ff66b2;
            padding: 20px;
            position: sticky;
            top: 0px;
        }

        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: space-around;
        }

        nav ul li {
            margin: 0;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            padding: 10px;
        }

        nav ul li a:hover {
            background-color: #ff4d94;
        }
    </style>
</head>
<body>
<nav>
    <ul>
        <li><a href="index.php">HOGWARTS UNIVERSITY</a></li>
        <li><a href="index.php">Home</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="contact.php">Contact</a></li>
        <?php if (isset($_SESSION['user_id'])): ?>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="controller/LogoutController.php">Logout</a></li>
        <?php else: ?>
            <li><a href="login.php">Login</a></li>
        <?php endif; ?>
    </ul>
</nav>
</body>
</html>
