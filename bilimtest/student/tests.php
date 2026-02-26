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
    <title>BilimTest – Доступные тесты</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f0f2f5; font-family: Arial, sans-serif; }
        .navbar { background-color: #2d3436; color: #fff; padding: 10px 20px; }
        .navbar a { color: white; margin-left: 15px; text-decoration: none; }
        .navbar .title { font-size: 1.5rem; font-weight: bold; }
        .card { border-radius: 12px; box-shadow: 0 6px 15px rgba(0,0,0,0.1); margin-bottom: 20px; padding: 20px; }
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

<div class="container mt-4">

    <h2>Доступные тесты</h2>

    <?php if(mysqli_num_rows($result) == 0) { ?>
        <p>Пока нет доступных тестов.</p>
    <?php } ?>

    <?php while($row = mysqli_fetch_assoc($result)) { ?>
        <div class="card">
            <h5><?php echo $row['title']; ?></h5>
            <p><?php echo $row['description']; ?></p>
            <a href="take_test.php?test_id=<?php echo $row['id']; ?>" class="btn btn-primary">Пройти тест</a>
        </div>
    <?php } ?>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>