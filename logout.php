<?php
session_start();

unset($_SESSION['user_id']);
unset($_SESSION['name']);
unset($_SESSION['email']);

header('Location: index.php');
exit();
?>
