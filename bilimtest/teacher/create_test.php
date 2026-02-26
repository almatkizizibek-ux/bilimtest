<?php
session_start();
include("../config/db.php");

// Защита: только учитель
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'teacher') {
    header("Location: ../auth/login.php");
    exit;
}

// Удаление теста
if (isset($_GET['delete_test'])) {
    $del_id = intval($_GET['delete_test']);
    mysqli_query($conn, "DELETE FROM tests WHERE id='$del_id' AND created_by='{$_SESSION['user_id']}'");
    // Также удаляем все вопросы теста
    mysqli_query($conn, "DELETE FROM questions WHERE test_id='$del_id'");
    header("Location: create_test.php");
    exit;
}

// Обработка формы создания теста
$message = "";
if (isset($_POST['create'])) {
    $title = trim($_POST['title']);
    $desc = trim($_POST['description']);
    $teacher_id = $_SESSION['user_id'];

    if ($title != "") {
        mysqli_query($conn, "INSERT INTO tests (title, description, created_by) VALUES ('$title', '$desc', '$teacher_id')");
        $message = "Тест успешно создан!";
    } else {
        $message = "Название теста обязательно";
    }
}

// Получаем последние тесты учителя
$teacher_id = $_SESSION['user_id'];
$result = mysqli_query($conn, "SELECT * FROM tests WHERE created_by='$teacher_id' ORDER BY id DESC LIMIT 5");
?>

<!DOCTYPE html>
<html lang="kk">
<head>
    <meta charset="UTF-8">
    <title>BilimTest – Создать тест</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f0f2f5; font-family: Arial, sans-serif; }
        .navbar { background-color: #2d3436; color: #fff; padding: 10px 20px; }
        .navbar a { color: white; margin-left: 15px; text-decoration: none; }
        .navbar .title { font-size: 1.5rem; font-weight: bold; }
        .hero { background-color: #dfe6e9; border-radius: 12px; padding: 20px; margin-top: 20px; text-align: center; color: #2d3436; }
        .card { border-radius: 12px; box-shadow: 0 6px 15px rgba(0,0,0,0.1); margin-top: 20px; }
        .btn-primary { background-color: #636e72; border: none; }
        .btn-primary:hover { background-color: #2d3436; }
        .btn-danger { background-color: #d63031; border: none; }
        .btn-danger:hover { background-color: #c0392b; }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar d-flex align-items-center">
    <div class="title">BilimTest</div>
    <div class="ms-auto">
        <span>Қош келдіңіз, <?php echo $_SESSION['fullname']; ?></span>
        <a href="index.php" class="btn btn-outline-light ms-3">Мұғалім панелі</a>
        <a href="../auth/logout.php" class="btn btn-outline-light ms-2">Шығу</a>
    </div>
</nav>

<div class="container">

    <!-- Hero-блок -->
    <div class="hero">
        <h2>Создать новый тест</h2>
        <p>Добавьте название и описание теста, чтобы ваши ученики могли проходить его.</p>
    </div>

    <!-- Форма создания теста -->
    <div class="card p-4">
        <?php if ($message != "") { ?>
            <div class="alert alert-success"><?php echo $message; ?></div>
        <?php } ?>

        <form method="post">
            <div class="mb-3">
                <label>Название теста</label>
                <input type="text" name="title" class="form-control" placeholder="Введите название теста" required>
            </div>
            <div class="mb-3">
                <label>Описание теста</label>
                <textarea name="description" class="form-control" placeholder="Описание теста (не обязательно)" rows="3"></textarea>
            </div>
            <button type="submit" name="create" class="btn btn-primary w-100">Создать тест</button>
        </form>
    </div>

    <!-- Последние тесты -->
    <div class="card p-4 mt-4">
        <h4>Последние тесты</h4>
        <?php if (mysqli_num_rows($result) > 0) { ?>
            <ul class="list-group list-group-flush">
                <?php while($row = mysqli_fetch_assoc($result)) { ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span>
                            <strong><?php echo $row['title']; ?></strong>
                            <?php if ($row['description'] != "") { ?>
                                — <?php echo $row['description']; ?>
                            <?php } ?>
                        </span>
                        <div>
                            <a href="add_question.php?test_id=<?php echo $row['id']; ?>" class="btn btn-sm btn-primary">Добавить вопросы</a>
                            <a href="create_test.php?delete_test=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Вы уверены, что хотите удалить этот тест? Все вопросы также будут удалены.')">Удалить</a>
                        </div>
                    </li>
                <?php } ?>
            </ul>
        <?php } else { ?>
            <p>Вы ещё не создали тесты.</p>
        <?php } ?>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>