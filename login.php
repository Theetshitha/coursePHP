<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hogwarts University - Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffe6f0;
            margin: 0;
            padding: 0;
        }

        main {
            max-width: 400px;
            margin-top: 120px;
            margin-left: 430px;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form {
            display: flex;
            flex-direction: column;
        }

        input[type="email"],
        input[type="password"],
        button {
            margin: 10px 0;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #ff66b2;
            color: white;
            cursor: pointer;
        }

        button:hover {
            background-color: #ff4d94;
        }

        .register-link {
            margin-top: 10px;
            text-align: center;
        }

        .register-link a {
            color: #ff66b2;
            text-decoration: none;
        }

        .register-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <?php include 'view/partials/navbar.php'; ?>

    <main>
    <form method="post" action="controller/LoginController.php">

            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>

        <div class="register-link">
            <p>New user? <a href="register.php">Register</a></p>
        </div>
    </main>

    <?php include 'view/partials/footer.php'; ?>
</body>
</html>
