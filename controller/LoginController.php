<?php
require_once '../model/DB.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $callconn->prepare("SELECT id, name, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($user_id, $name, $hashed_password);
        $stmt->fetch();
        if (password_verify($password, $hashed_password)) {
            $_SESSION['user_id'] = $user_id;
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password; 
            header('Location: ../dashboard.php');
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found with this email.";
    }
    $stmt->close();
}
?>
