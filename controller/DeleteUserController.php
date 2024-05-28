<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['email'] != 'theetshiAdmin@gmail.com') {
    header('Location: index.php');
    exit();
}

require_once '../model/DB.php';

// Check if user ID is provided and valid
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $user_id = $_GET['id'];
    
    // Delete related records in other tables first (e.g., login_user)
    $delete_related_query = "DELETE FROM login_user WHERE user_id = ?";
    $stmt = $callconn->prepare($delete_related_query);
    $stmt->bind_param('i', $user_id);
    $stmt->execute();
    $stmt->close();

    // Now delete the user
    $delete_query = "DELETE FROM users WHERE id = ?";
    $stmt = $callconn->prepare($delete_query);
    $stmt->bind_param('i', $user_id);
    
    if ($stmt->execute()) {
        header('Location: user_detail.php');
        exit();
    } else {
        echo "Error deleting user.";
    }

    $stmt->close();
} else {
    echo "Invalid user ID.";
}
?>
