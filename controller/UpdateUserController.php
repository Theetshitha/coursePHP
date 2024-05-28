<?php
require_once '../model/DB.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    // Add update logic for other fields as per your requirement

    $stmt = $callconn->prepare("UPDATE users SET name=?, email=? WHERE id=?");
    $stmt->bind_param("ssi", $name, $email, $id);

    if ($stmt->execute()) {
        // Redirect to user details page or wherever appropriate
        header('Location: ../user_detail.php');
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>
