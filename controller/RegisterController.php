<?php
require_once '../model/DB.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $courses = isset($_POST['courses']) ? $_POST['courses'] : [];

    if (count($courses) < 4) {
        echo "Please select at least 4 courses.";
        exit;
    }

    // Prepare up to 10 course values
    $course1 = isset($courses[0]) ? $courses[0] : null;
    $course2 = isset($courses[1]) ? $courses[1] : null;
    $course3 = isset($courses[2]) ? $courses[2] : null;
    $course4 = isset($courses[3]) ? $courses[3] : null;
    $course5 = isset($courses[4]) ? $courses[4] : null;
    $course6 = isset($courses[5]) ? $courses[5] : null;
    $course7 = isset($courses[6]) ? $courses[6] : null;
    $course8 = isset($courses[7]) ? $courses[7] : null;
    $course9 = isset($courses[8]) ? $courses[8] : null;
    $course10 = isset($courses[9]) ? $courses[9] : null;

    // Insert user and selected courses
    $stmt = $callconn->prepare(
        "INSERT INTO users (name, email, password, course1, course2, course3, course4, course5, course6, course7, course8, course9, course10) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
    );
    $stmt->bind_param("sssssssssssss", $name, $email, $password, $course1, $course2, $course3, $course4, $course5, $course6, $course7, $course8, $course9, $course10);

    if ($stmt->execute()) {
        $user_id = $stmt->insert_id;
        $_SESSION['user_id'] = $user_id;
        header('Location: ../login.php');
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>
