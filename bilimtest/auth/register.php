<?php
session_start();
include("../config/db.php");

$message = "";

// Регистрация
if (isset($_POST['register'])) {
    $fullname = trim($_POST['fullname']);
    $email = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    // Проверка, есть ли такой email
    $check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    if (mysqli_num_rows($check) > 0) {
        $message = "Этот e-mail уже используется";
    } else {
        $sql = "INSERT INTO users (fullname, email, password, role)
                VALUES ('$fullname', '$email', '$password', '$role')";
        if (mysqli_query($conn, $sql)) {
            $user_id = mysqli_insert_id($conn);
            $_SESSION['user_id'] = $user_id;
            $_SESSION['role'] = $role;
            $_SESSION['fullname'] = $fullname;

            if ($role == 'teacher') {
                header("Location: ../teacher/index.php");
            } else {
                header("Location: ../student/index.php");
            }
            exit;
        } else {
            $message = "Ошибка: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="kk">
<head>
    <meta charset="UTF-8">
    <title>BilimTest – Регистрация</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f0f2f5; font-family: Arial, sans-serif; }
        .navbar { background-color: #2d3436; color: #fff; padding: 10px 20px; }
        .navbar a { color: white; margin-left: 15px; text-decoration: none; }
        .navbar .title { font-size: 1.5rem; font-weight: bold; }
        .hero { background-color: #dfe6e9; border-radius: 12px; padding: 30px; margin-top: 30px; text-align: center; color: #2d3436; }
        .card { border-radius: 12px; box-shadow: 0 6px 15px rgba(0,0,0,0.1); margin-bottom: 20px; }
        .btn-primary { background-color: #636e72; border: none; }
        .btn-primary:hover { background-color: #2d3436; }
        .btn-outline-secondary { border-color: #636e72; color: #636e72; }
        .btn-outline-secondary:hover { background-color: #636e72; color: white; }
        .feature-card { background-color: #dfe6e9; }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar d-flex align-items-center">
    <div class="title">BilimTest</div>
    <div class="ms-auto">
        <input type="text" placeholder="⌕ Поиск" class="form-control form-control-sm d-inline-block" style="width: 200px;">
        <a href="#" title="Перевести страницу">⌯ Translate</a>
    </div>
</nav>

<div class="container mt-5">

    <!-- Hero / Приветствие -->
    <div class="hero">
        <h2>Что такое BilimTest?</h2>
        <p>Платформа для создания и прохождения тестов онлайн. Учителя создают тесты и вопросы, а ученики проходят их и отслеживают свои результаты.</p>
    </div>

    <!-- Преимущества платформы -->
    <div class="row text-center mt-4">
        <div class="col-md-4">
            <div class="card feature-card p-3">
                <h4>ᨒ Удобное обучение</h4>
                <p>Все тесты и материалы онлайн, доступ к любому курсу в любое время.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card feature-card p-3">
                <h4>ᨒ Создание тестов</h4>
                <p>Учителя могут быстро создавать тесты и вопросы с автоматической проверкой.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card feature-card p-3">
                <h4>ᨒ Анализ результатов</h4>
                <p>Студенты видят свои результаты, учителя – статистику и прогресс.</p>
            </div>
        </div>
    </div>

    <!-- Форма регистрации -->
    <div class="card shadow mx-auto p-4 mt-4" style="max-width: 450px;">
        <h3 class="text-center mb-4">Регистрация</h3>

        <?php if ($message) { ?>
            <div class="alert alert-danger"><?php echo $message; ?></div>
        <?php } ?>

        <form method="post">
            <input type="text" name="fullname" class="form-control mb-3" placeholder="Имя пользователя" required>
            <input type="email" name="email" class="form-control mb-3" placeholder="Email" required>
            <input type="password" name="password" class="form-control mb-3" placeholder="Пароль" required>
            <select name="role" class="form-select mb-3">
                <option value="student">Студент</option>
                <option value="teacher">Учитель</option>
            </select>
            <button type="submit" name="register" class="btn btn-primary w-100">Зарегистрироваться</button>
        </form>

        <div class="text-center mt-3">
            <a href="../auth/login.php" class="btn btn-outline-secondary w-100">У меня есть аккаунт</a>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>