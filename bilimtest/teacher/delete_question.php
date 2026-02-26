<?php
session_start();
include("../config/db.php");

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'teacher') {
    header("Location: ../auth/login.php");
    exit;
}

if (isset($_GET['question_id']) && isset($_GET['test_id'])) {

    $question_id = $_GET['question_id'];
    $test_id = $_GET['test_id'];

    mysqli_query($conn, "DELETE FROM questions WHERE id='$question_id'");
}

header("Location: add_question.php?test_id=" . $test_id);
exit;
?>