<?php
session_start();
include("../config/db.php");

// Только студент
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'student') {
    header("Location: ../auth/login.php");
    exit;
}

// Получаем ID теста
$test_id = $_GET['test_id'];

// Получаем тест
$test_result = mysqli_query($conn, "SELECT title FROM tests WHERE id='$test_id'");
$test_row = mysqli_fetch_assoc($test_result);
$test_title = $test_row['title'];

// Получаем все вопросы теста
$questions_result = mysqli_query($conn, "SELECT * FROM questions WHERE test_id='$test_id'");

$total_questions = mysqli_num_rows($questions_result);
$correct_count = 0;

// Если форма отправлена
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $answers = $_POST['answer'];

    // Проверяем ответы
    $questions_result = mysqli_query($conn, "SELECT * FROM questions WHERE test_id='$test_id'");
    while ($row = mysqli_fetch_assoc($questions_result)) {
        $qid = $row['id'];
        if (isset($answers[$qid]) && $answers[$qid] == $row['correct_option']) {
            $correct_count++;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="kk">
<head>
    <meta charset="UTF-8">
    <title>BilimTest – Резултаты</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f0f2f5; font-family: Arial, sans-serif; }
        .navbar { background-color: #2d3436; color: #fff; padding: 10px 20px; }
        .navbar a { color: white; margin-left: 15px; text-decoration: none; }
        .navbar .title { font-size: 1.5rem; font-weight: bold; }
        .card { border-radius: 12px; box-shadow: 0 6px 15px rgba(0,0,0,0.1); margin-top: 20px; }
        .btn-primary { background-color: #636e72; border: none; }
        .btn-primary:hover { background-color: #2d3436; }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar d-flex align-items-center">
    <div class="title">BilimTest</div>
    <div class="ms-auto">
        <span>Добро пожаловать, <?php echo $_SESSION['fullname']; ?></span>
        <a href="../auth/logout.php" class="btn btn-outline-light ms-3">Выйти</a>
    </div>
</nav>

<div class="container">

    <!-- Карточка с результатом -->
    <div class="card p-4 text-center">
        <h2>Тест: <?php echo $test_title; ?></h2>
        <p>Студент: <?php echo $_SESSION['fullname']; ?></p>
        <h4>Вы от <?php echo $correct_count; ?> / <?php echo $total_questions; ?> ответили на правильно!</h4>
        <a href="tests.php" class="btn btn-primary mt-3">Вернуться к текстам</a>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>