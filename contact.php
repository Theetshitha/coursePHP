<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hogwarts University - Contact</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffe6f0;
            margin: 0;
            padding: 0;
        }


        .container {
            max-width: 400px;
            margin-top: 120px;
            margin-left: 430px;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        input[type="text"],
        input[type="email"],
        textarea,
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
        footer{
        position: sticky;
        bottom: 0px;
        }
    </style>
</head>
<body>

   
    <?php include 'view/partials/navbar.php'; ?>

    <div class="container">
        <h2>Contact Us</h2>
        <form action="controller/ContactController.php" method="post">
            <input type="text" id="name" name="name" placeholder="Name" required>
            <input type="email" id="email" name="email" placeholder="Email" required>
            <textarea id="message" name="message" placeholder="Message" required></textarea>
            <button type="submit">Send Message</button>
        </form>
    </div>

    <?php include 'view/partials/footer.php'; ?>
   
</body>
</html>
