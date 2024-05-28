<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hogwarts University - Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffe6f0;
            margin: 0;
            padding: 0;
        }

        main {
            max-width: 400px;
            margin-top: 100px;
            margin-left: 400px;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form {
            display: flex;
            flex-direction: column;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        button {
            margin: 10px 0;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            max-height: 100px; 
            overflow-y: auto; 
        }

        .dropdown-content label {
            display: block;
            margin-bottom: 5px;
        }

        .dropdown-content input[type="checkbox"] {
            margin-right: 5px;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        button {
            background-color: #ff66b2;
            color: white;
            cursor: pointer;
        }

        button:hover {
            background-color: #ff4d94;
        }

        .login-link {
            margin-top: 10px;
            text-align: center;
        }

        .login-link a {
            color: #ff66b2;
            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <?php include 'view/partials/navbar.php'; ?>

    <main>
    <form method="POST" action="<?php echo isset($_GET['id']) ? 'controller/UpdateUserController.php' : 'controller/RegisterController.php'; ?>">
        <input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>">
        <input type="text" name="name" placeholder="Name" value="<?php echo isset($user['name']) ? $user['name'] : ''; ?>" required>
        <input type="email" name="email" placeholder="Email" value="<?php echo isset($user['email']) ? $user['email'] : ''; ?>" required>
        <input type="password" name="password" placeholder="Password" required>

            <div class="dropdown">
                <button type="button">Select Courses</button>
               
                <div class="dropdown-content">
                    <label><input type="checkbox" name="courses[]" value="potions"> Potions</label>
                    <label><input type="checkbox" name="courses[]" value="transfiguration"> Transfiguration</label>
                    <label><input type="checkbox" name="courses[]" value="charms"> Charms</label>
                    <label><input type="checkbox" name="courses[]" value="defense"> Defense Against the Dark Arts</label>
                    <label><input type="checkbox" name="courses[]" value="herbology"> Herbology</label>
                    <label><input type="checkbox" name="courses[]" value="coding"> Coding 101</label>
                    <label><input type="checkbox" name="courses[]" value="webdev"> Web Development Fundamentals</label>
                    <label><input type="checkbox" name="courses[]" value="python"> Python Programming</label>
                    <label><input type="checkbox" name="courses[]" value="java"> Java Essentials</label>
                    <label><input type="checkbox" name="courses[]" value="html"> HTML Basics</label>
                    <label><input type="checkbox" name="courses[]" value="css"> CSS Styling</label>
                    <label><input type="checkbox" name="courses[]" value="javascript"> JavaScript Fundamentals</label>
                    <label><input type="checkbox" name="courses[]" value="database"> Database Management</label>
                    <label><input type="checkbox" name="courses[]" value="networking"> Networking Basics</label>
                    <label><input type="checkbox" name="courses[]" value="cybersecurity"> Cybersecurity Principles</label>
                    <label><input type="checkbox" name="courses[]" value="ai"> Artificial Intelligence Concepts</label>
                    <label><input type="checkbox" name="courses[]" value="machinelearning"> Machine Learning Fundamentals</label>
                    <label><input type="checkbox" name="courses[]" value="datascience"> Data Science Essentials</label>
                    <label><input type="checkbox" name="courses[]" value="cloud"> Cloud Computing Basics</label>
                    <label><input type="checkbox" name="courses[]" value="iot"> Internet of Things (IoT)</label>
                    <label><input type="checkbox" name="courses[]" value="blockchain"> Blockchain Technology</label>
                </div>
            </div>

            <button type="submit"><?php echo isset($_GET['id']) ? 'Update' : 'Register'; ?></button>
    </form>

        <div class="login-link">
            <p>Already registered? <a href="login.php">Login</a></p>
        </div>
    </main>

    <?php include 'view/partials/footer.php'; ?>

    <script>
        function validateForm() {
            const checkboxes = document.querySelectorAll('input[name="courses[]"]:checked');
            if (checkboxes.length < 4) {
                alert("Please select at least 4 courses.");
                return false;
            }
            return true;
        }
    </script>
</body>
</html>
