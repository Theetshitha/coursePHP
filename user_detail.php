<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['email'] != 'theetshiAdmin@gmail.com') {
    header('Location: index.php');
    exit();
}

require_once 'model/DB.php';

// Retrieve all user details
$query = "SELECT id, name, email FROM users";
$result = $callconn->query($query);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hogwarts University - User Details</title>
    <style>
          /* Style for the popup form */
          .modal {
            display: none; 
            position: fixed; 
            z-index: 1; 
            left: 0;
            top: 0;
            width: 100%; 
            height: 100%; 
            overflow: auto; 
            background-color: rgb(0,0,0); 
            background-color: rgba(0,0,0,0.4); 
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

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
    <center><h2>User Details</h2></center>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td>
                    <a href="register.php?id=<?php echo $row['id']; ?>" class="editBtn">Edit</a>
                    <a href="controller/DeleteUserController.php?id=<?php echo $row['id']; ?>" class="deleteBtn">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

    <!-- The Modal -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <?php include 'register.php'; ?>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Edit button click event
        $('.editBtn').click(function() {
            var id = $(this).data('id');
            $.ajax({
                url: '/controller/UpdateUserController.php',
                type: 'GET',
                data: { id: id },
                success: function(response) {
                    var user = JSON.parse(response);
                    // Populate register form with user data
                    $('input[name="id"]').val(user.id);
                    $('input[name="name"]').val(user.name);
                    $('input[name="email"]').val(user.email);
                    // Additional fields can be populated here
                    $('#myModal').css("display", "block");
                }
            });
        });

        // Delete button click event
        $('.deleteBtn').click(function() {
            var id = $(this).data('id');
            if (confirm('Are you sure you want to delete this record?')) {
                $.ajax({
                    url: '/controller/DeleteUserController.php',
                    type: 'POST',
                    data: { id: id },
                    success: function(response) {
                        // Reload the page or update the table after deletion
                        location.reload();
                    }
                });
            }
        });

        // Modal close button click event
        $('.close').click(function() {
            $('#myModal').css("display", "none");
        });

        // Close modal when clicking outside of it
        window.onclick = function(event) {
            var modal = document.getElementById('myModal');
            if (event.target == modal) {
                modal.style.display = "none";
            }
        };
    });
</script>
</body>
</html>
