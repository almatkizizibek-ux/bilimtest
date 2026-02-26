<?php
session_start();
include("../config/db.php");

// Только учитель
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'teacher') {
    header("Location: ../auth/login.php");
    exit;
}

// Получаем id теста
$test_id = intval($_GET['test_id']);

// Добавление вопроса
if (isset($_POST['add'])) {
    $question = trim($_POST['question']);
    $a = trim($_POST['option_a']);
    $b = trim($_POST['option_b']);
    $c = trim($_POST['option_c']);
    $d = trim($_POST['option_d']);
    $correct = strtoupper(trim($_POST['correct_option']));

    mysqli_query($conn, "INSERT INTO questions (test_id, question, option_a, option_b, option_c, option_d, correct_option) 
                         VALUES ('$test_id', '$question', '$a', '$b', '$c', '$d', '$correct')");

    header("Location: add_question.php?test_id=$test_id");
    exit;
}

// Удаление вопроса
if (isset($_GET['delete_question'])) {
    $del_id = intval($_GET['delete_question']);
    mysqli_query($conn, "DELETE FROM questions WHERE id='$del_id' AND test_id='$test_id'");
    header("Location: add_question.php?test_id=$test_id");
    exit;
}

// Получаем все вопросы теста
$result = mysqli_query($conn, "SELECT * FROM questions WHERE test_id='$test_id'");
?>

<!DOCTYPE html>
<html lang="kk">
<head>
    <meta charset="UTF-8">
    <title>BilimTest – Добавить вопросы</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f0f2f5; font-family: Arial, sans-serif; }
        .navbar { background-color: #2d3436; color: #fff; padding: 10px 20px; }
        .navbar a { color: white; margin-left: 15px; text-decoration: none; }
        .navbar .title { font-size: 1.5rem; font-weight: bold; }
        .card { border-radius: 12px; box-shadow: 0 6px 15px rgba(0,0,0,0.1); margin-top: 20px; }
        .btn-primary { background-color: #636e72; border: none; }
        .btn-primary:hover { background-color: #2d3436; }
        .btn-danger { background-color: #d63031; border: none; }
        .btn-danger:hover { background-color: #c0392b; }
        .question-item { margin-bottom: 15px; padding: 10px; background-color: #dfe6e9; border-radius: 8px; }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar d-flex align-items-center">
    <div class="title">BilimTest</div>
    <div class="ms-auto">
        <span>Добро пожаловать, <?php echo $_SESSION['fullname']; ?></span>
        <a href="create_test.php" class="btn btn-outline-light ms-3">Панель учителя</a>
        <a href="../auth/logout.php" class="btn btn-outline-light ms-2">Выйти</a>
    </div>
</nav>

<div class="container">

    <!-- Hero-блок -->
    <div class="card p-4 hero">
        <h2>Добавить вопрос</h2>
        <p>Создайте вопросы для вашего теста. Можно добавлять несколько вариантов ответа и указывать правильный.</p>
    </div>

    <!-- Форма добавления вопроса -->
    <div class="card p-4 mt-3">
        <form method="post">
            <div class="mb-3">
                <label>Вопрос</label>
                <textarea name="question" class="form-control" placeholder="Введите вопрос" required></textarea>
            </div>
            <div class="mb-3">
                <label>Вариант A</label>
                <input type="text" name="option_a" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Вариант B</label>
                <input type="text" name="option_b" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Вариант C</label>
                <input type="text" name="option_c" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Вариант D</label>
                <input type="text" name="option_d" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Правильный вариант (A/B/C/D)</label>
                <input type="text" name="correct_option" class="form-control" maxlength="1" required>
            </div>
            <button name="add" class="btn btn-primary w-100">Добавить вопрос</button>
        </form>
    </div>

    <!-- Список вопросов -->
    <div class="card p-4 mt-4">
        <h4>Вопросы теста</h4>
        <?php if (mysqli_num_rows($result) > 0) { ?>
            <?php while($row = mysqli_fetch_assoc($result)) { ?>
                <div class="question-item d-flex justify-content-between align-items-center">
                    <div>
                        <strong><?php echo $row['question']; ?></strong><br>
                        A: <?php echo $row['option_a']; ?>, 
                        B: <?php echo $row['option_b']; ?>, 
                        C: <?php echo $row['option_c']; ?>, 
                        D: <?php echo $row['option_d']; ?>,
                        Правильный: <?php echo $row['correct_option']; ?>
                    </div>
                    <a href="add_question.php?test_id=<?php echo $test_id; ?>&delete_question=<?php echo $row['id']; ?>" 
                       class="btn btn-sm btn-danger" 
                       onclick="return confirm('Вы уверены, что хотите удалить этот вопрос?')">Удалить</a>
                </div>
            <?php } ?>
        <?php } else { ?>
            <p>Вопросы ещё не добавлены.</p>
        <?php } ?>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>