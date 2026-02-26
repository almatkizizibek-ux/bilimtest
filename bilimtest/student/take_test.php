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

// Получаем вопросы
$result = mysqli_query($conn, "SELECT * FROM questions WHERE test_id='$test_id'");

// Получаем название теста
$test_result = mysqli_query($conn, "SELECT title FROM tests WHERE id='$test_id'");
$test_row = mysqli_fetch_assoc($test_result);
$test_title = $test_row['title'];
?>

<!DOCTYPE html>
<html lang="kk">
<head>
    <meta charset="UTF-8">
    <title>BilimTest – <?php echo $test_title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f0f2f5; font-family: Arial, sans-serif; }
        .navbar { background-color: #2d3436; color: #fff; padding: 10px 20px; }
        .navbar a { color: white; margin-left: 15px; text-decoration: none; }
        .navbar .title { font-size: 1.5rem; font-weight: bold; }
        .card { border-radius: 12px; box-shadow: 0 6px 15px rgba(0,0,0,0.1); margin-top: 20px; }
        .question-card { background-color: #dfe6e9; padding: 15px; margin-bottom: 15px; border-radius: 8px; }
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

    <!-- Заголовок теста -->
    <div class="card p-4">
        <h2><?php echo $test_title; ?></h2>
        <p>Внимательно прочитайте тест, и ответьте на все вопросы. Удачи.</p>
    </div>

    <!-- Форма вопросов -->
    <form method="post" action="submit_test.php?test_id=<?php echo $test_id; ?>">
        <?php while($row = mysqli_fetch_assoc($result)) { ?>
            <div class="question-card">
                <p><strong><?php echo $row['question']; ?></strong></p>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="answer[<?php echo $row['id']; ?>]" value="A" required>
                    <label class="form-check-label"><?php echo $row['option_a']; ?></label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="answer[<?php echo $row['id']; ?>]" value="B">
                    <label class="form-check-label"><?php echo $row['option_b']; ?></label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="answer[<?php echo $row['id']; ?>]" value="C">
                    <label class="form-check-label"><?php echo $row['option_c']; ?></label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="answer[<?php echo $row['id']; ?>]" value="D">
                    <label class="form-check-label"><?php echo $row['option_d']; ?></label>
                </div>
            </div>
        <?php } ?>

        <button type="submit" class="btn btn-primary w-100 mt-3">Отправить</button>
    </form>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>