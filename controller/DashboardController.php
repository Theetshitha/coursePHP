<?php
require_once '../model/DB.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit();
}

$user_id = $_SESSION['user_id'];

$courses = [];
$result = $db->query("SELECT name, image FROM courses INNER JOIN user_courses ON courses.id = user_courses.course_id WHERE user_courses.user_id = $user_id");
while ($row = $result->fetch_assoc()) {
    $courses[] = $row;
}
