<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hogwarts University</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffe6f0;
            margin: 0;
            padding: 0;
        }

        .content {
            max-width: 800px;
            margin-top: 200px;
            margin-left: 200px;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .register-button, .login-button {
            background-color: #ff66b2;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 10px;
        }

        .register-button:hover, .login-button:hover {
            background-color: #ff4d94;
        }
    </style>
</head>
<body>

<?php include 'view/partials/navbar.php'; ?>

<div class="content">
    <p>Dear learners, summer courses registration are open now. Please enroll if not already.</p>
   <br>
    <a href="register.php" class="register-button">Register Now</a>
  
</div>

<?php include 'view/partials/footer.php'; ?>

</body>
</html>
