<?php
session_start();
include("../config/db.php");

// Защита: только учитель
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'teacher') {
    header("Location: ../auth/login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="kk">
<head>
    <meta charset="UTF-8">
    <title>BilimTest – Панель учителя</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f0f2f5; font-family: Arial, sans-serif; }
        .navbar { background-color: #2d3436; color: #fff; padding: 10px 20px; }
        .navbar a { color: white; margin-left: 15px; text-decoration: none; }
        .navbar .title { font-size: 1.5rem; font-weight: bold; }
        .hero { background-color: #dfe6e9; border-radius: 12px; padding: 30px; margin-top: 20px; text-align: center; color: #2d3436; }
        .card { border-radius: 12px; box-shadow: 0 6px 15px rgba(0,0,0,0.1); margin-bottom: 20px; }
        .btn-primary { background-color: #636e72; border: none; }
        .btn-primary:hover { background-color: #2d3436; }
        .feature-card { background-color: #dfe6e9; }
        a { text-decoration: none; }
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

    <!-- Hero-блок -->
    <div class="hero">
        <h2>Панель учителя</h2>
        <p>Здесь вы можете создавать тесты, добавлять вопросы и отслеживать прогресс своих студентов.</p>
    </div>

    <!-- Быстрый доступ / Карточки -->
    <div class="row mt-4 text-center">
        <div class="col-md-4">
            <div class="card feature-card p-3">
                <h4>ᨒ Создать тест</h4>
                <p>Создайте новый тест для своих учеников за пару минут.</p>
                <a href="create_test.php" class="btn btn-primary mt-2">Создать</a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card feature-card p-3">
                <h4>ᨒ Мои тесты</h4>
                <p>Просматривайте свои тесты, редактируйте их и добавляйте вопросы.</p>
                <a href="tests.php" class="btn btn-primary mt-2">Перейти</a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card feature-card p-3">
                <h4>ᨒ Статистика</h4>
                <p>Следите за результатами учеников и анализируйте их прогресс.</p>
                <a href="#" class="btn btn-primary mt-2 disabled">Скоро</a>
            </div>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>