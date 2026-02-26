<?php
session_start();
include("../config/db.php");

// Только студент
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'student') {
    header("Location: ../auth/login.php");
    exit;
}

// Получаем все тесты
$result = mysqli_query($conn, "SELECT * FROM tests");
?>

<!DOCTYPE html>
<html lang="kk">
<head>
    <meta charset="UTF-8">
    <title>BilimTest – Панель студента</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f0f2f5; font-family: Arial, sans-serif; }
        .navbar { background-color: #2d3436; color: #fff; padding: 10px 20px; }
        .navbar a { color: white; margin-left: 15px; text-decoration: none; }
        .navbar .title { font-size: 1.5rem; font-weight: bold; }
        .card { border-radius: 12px; box-shadow: 0 6px 15px rgba(0,0,0,0.1); margin-top: 20px; }
        .btn-primary { background-color: #636e72; border: none; }
        .btn-primary:hover { background-color: #2d3436; }
        .test-item { margin-bottom: 15px; padding: 15px; background-color: #dfe6e9; border-radius: 8px; }
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

    <!-- Hero-блок -->
    <div class="card p-4 hero">
        <h2>Панель студента</h2>
        <p>Здравствуйте, <?php echo $_SESSION['fullname']; ?>! Здесь вы можете посмотреть доступные вам тесты и пройти их.</p>
    </div>

    <!-- Список тестов -->
    <div class="card p-4 mt-3">
        <h4>Доступные тесты</h4>
        <?php if(mysqli_num_rows($result) > 0) { ?>
            <?php while($row = mysqli_fetch_assoc($result)) { ?>
                <div class="test-item d-flex justify-content-between align-items-center">
                    <div>
                        <strong><?php echo $row['title']; ?></strong><br>
                        <?php echo $row['description']; ?>
                    </div>
                    <a href="take_test.php?test_id=<?php echo $row['id']; ?>" class="btn btn-primary">Пройти тест</a>
                </div>
            <?php } ?>
        <?php } else { ?>
            <p>Тесты еще не добавлены.</p>
        <?php } ?>
    </div>

    <!-- Преимущества платформы -->
    <div class="card p-4 mt-4">
        <h4>Почему BilimTest?</h4>
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card p-3 text-center">
                    <h5>ᨒ Удобно</h5>
                    <p>Все тесты и материалы в одном месте.</p>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card p-3 text-center">
                    <h5>ᨒ Быстро</h5>
                    <p>Вы можете пройти тесты 1 кликом.</p>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card p-3 text-center">
                    <h5>ᨒ Интерактивно</h5>
                    <p>Закрепление знаний через интересные задания.</p>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>