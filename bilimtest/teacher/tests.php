<?php
session_start();
include("../config/db.php");

// Защита: только учитель
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'teacher') {
    header("Location: ../auth/login.php");
    exit;
}

// Получаем тесты учителя
$teacher_id = $_SESSION['user_id'];
$result = mysqli_query($conn, "SELECT * FROM tests WHERE created_by='$teacher_id'");
?>

<!DOCTYPE html>
<html lang="kk">
<head>
    <meta charset="UTF-8">
    <title>BilimTest – Мои тесты</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f0f2f5; font-family: Arial, sans-serif; }
        .navbar { background-color: #2d3436; color: #fff; padding: 10px 20px; }
        .navbar a { color: white; margin-left: 15px; text-decoration: none; }
        .navbar .title { font-size: 1.5rem; font-weight: bold; }
        .card { border-radius: 12px; box-shadow: 0 6px 15px rgba(0,0,0,0.1); margin-bottom: 20px; }
        .btn-primary { background-color: #636e72; border: none; }
        .btn-primary:hover { background-color: #2d3436; }
        .btn-outline-primary { border-color: #636e72; color: #636e72; }
        .btn-outline-primary:hover { background-color: #636e72; color: #fff; }
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

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Мои тесты</h2>
        <a href="create_test.php" class="btn btn-primary">Создать новый тест</a>
    </div>

    <?php while($row = mysqli_fetch_assoc($result)) { ?>
        <div class="card p-3">
            <h5><?php echo $row['title']; ?></h5>
            <p><?php echo $row['description']; ?></p>
            <div class="d-flex gap-2">
                <a href="add_question.php?test_id=<?php echo $row['id']; ?>" class="btn btn-outline-primary btn-sm">Добавить вопросы</a>
                <a href="delete_test.php?test_id=<?php echo $row['id']; ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Вы уверены, что хотите удалить тест?');">Удалить тест</a>
            </div>
        </div>
    <?php } ?>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>