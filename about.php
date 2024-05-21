
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hogwarts University - About</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffe6f0;
            margin: 0;
            padding: 0;
        }

 
        .container {
            max-width: 800px;
            margin-top: 120px;
            margin-left: 230px;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        li{
            text-align: justify;
        }

    </style>
</head>
<body>

   

    <?php include 'view/partials/navbar.php'; ?>

    <div class="container">
        <h2>About Hogwarts University</h2>
        <ul>
            <li> <p>Hogwarts University is a premier institution of higher learning, offering a diverse range of courses to students from all over the world. Our mission is to provide quality education that empowers students to reach their full potential.</p></li>
            <li> <p>Our faculty consists of world-renowned scholars and industry experts who are dedicated to teaching and research. We are committed to fostering an inclusive and innovative learning environment that prepares students for success in their chosen fields.</p> </li>
            <li> <p>At Hogwarts University, we believe in the power of education to transform lives and make a positive impact on society. Join us and become a part of our vibrant and dynamic community.</p> </li>
        </ul>
        
    </div>

    <?php include 'view/partials/footer.php'; ?>

</body>
</html>
