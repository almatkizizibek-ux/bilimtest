<?php
session_start();
include("../config/db.php");

// Только учитель
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'teacher') {
    header("Location: ../auth/login.php");
    exit;
}

if (isset($_GET['test_id'])) {

    $test_id = $_GET['test_id'];
    $teacher_id = $_SESSION['user_id'];

    // Удаляем только если тест принадлежит этому учителю
    mysqli_query($conn, "DELETE FROM tests WHERE id='$test_id' AND created_by='$teacher_id'");

    // Удаляем все вопросы этого теста
    mysqli_query($conn, "DELETE FROM questions WHERE test_id='$test_id'");
}

header("Location: tests.php");
exit;
?>