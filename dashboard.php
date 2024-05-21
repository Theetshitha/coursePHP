<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hogwarts University - Dashboard</title>
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
            text-align: center;
        }

        h2 {
            color: #ff66b2;
        }
       img{
        height: 200px;
        width: 200px;
       }
        .course-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-top: 20px;
        }

        .course {
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 50px;
            padding: 10px;
            text-align: center;
        }

        .course img {
            max-width: 100%;
            border-radius: 5px;
        }

        .course h3 {
            margin-top: 10px;
            margin-bottom: 5px;
        }

        .explore-course-btn {
            display: block;
            margin-top: 10px;
            color: #ff66b2;
            text-decoration: none;
        }

        .explore-course-btn:hover {
            text-decoration: underline;
        }

        footer {
            background-color: #ff99cc;
            color: white;
            text-align: center;
            padding: 3px 0;
            width: 100%;
            bottom: 0;
        }
    </style>
</head>
<body>

<?php include 'view/partials/navbar.php'; ?>

<div class="container">
    <h2>Welcome to Your Dashboard</h2>
    <p>Here you can view your courses, check your grades, and update your profile.</p>

    <div class="course-grid">
        <?php
        // Retrieve course data from the database
        require_once 'model/DB.php';
        $query = "SELECT * FROM course";
        $result = $callconn->query($query);

        // Check if any courses are found
        if ($result->num_rows > 0) {
            // Loop through each course
            while ($row = $result->fetch_assoc()) {
                // Output HTML for each course
                ?>
                <div class="course">
                    <img src="view/src/<?php echo $row['image']; ?>" alt="<?php echo $row['course_name']; ?>">
                    <h3><?php echo $row['course_name']; ?></h3>
                    <a href="#" class="explore-course-btn">Explore Course ></a>
                </div>
                <?php
            }
        } else {
            echo "<p>No courses found.</p>";
        }
        ?>
    </div>
</div>

<footer>
    <p>&copy; 2024 Hogwarts University</p>
</footer>

</body>
</html>
