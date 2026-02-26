<?php
session_start();
include("../config/db.php");

$message = "";

if (isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);

        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['fullname'] = $user['fullname'];

            if ($user['role'] == 'teacher') {
                header("Location: ../teacher/index.php");
            } else {
                header("Location: ../student/index.php");
            }
            exit;
        } else {
            $message = "Неправильный пароль";
        }
    } else {
        $message = "Пользователь не найден";
    }
}
?>

<!DOCTYPE html>
<html lang="kk">
<head>
    <meta charset="UTF-8">
    <title>Кіру - BilimTest</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f2f5;
            font-family: Arial, sans-serif;
        }
        .navbar {
            background-color: #2d3436;
            color: #ffffff;
            padding: 10px 20px;
        }
        .navbar a {
            color: white;
            margin-left: 15px;
            text-decoration: none;
        }
        .navbar .title {
            font-size: 1.5rem;
            font-weight: bold;
        }
        .card {
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0,0,0,0.1);
        }
        .btn-primary {
            background-color: #636e72;
            border: none;
        }
        .btn-primary:hover {
            background-color: #2d3436;
        }
        .description {
            background-color: #dfe6e9;
            padding: 20px;
            border-radius: 12px;
            margin-bottom: 30px;
            color: #2d3436;
        }
    </style>
</head>
<body>

<!-- Навбар -->
<nav class="navbar d-flex align-items-center">
    <div class="title">BilimTest</div>
    <div class="ms-auto">
        <input type="text" placeholder="⌕ Поиск" class="form-control form-control-sm d-inline-block" style="width: 200px;">
        <a href="#" title="Перевести страницу">⌯ Translate</a>
    </div>
</nav>

<div class="container mt-5">

    <!-- Описание входа -->
    <div class="description text-center">
        <h4>Уже есть аккаунт?</h4>
        <p>Войдите в BilimTest, чтобы создавать и проходить тесты, отслеживать прогресс и пользоваться всеми функциями платформы.</p>
    </div>

    <!-- Форма входа -->
    <div class="card shadow mx-auto" style="max-width: 450px;">
        <div class="card-body">

            <h3 class="text-center mb-4">Вход</h3>

            <?php if ($message) { ?>
                <div class="alert alert-danger"><?php echo $message; ?></div>
            <?php } ?>

            <form method="post">

                <div class="mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                </div>

                <div class="mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Пароль" required>
                </div>

                <button type="submit" name="login" class="btn btn-primary w-100">
                    Войти
                </button>

            </form>

            <div class="text-center mt-3">
                <a href="register.php">Создать новый аккаунт</a>
            </div>

        </div>
    </div>

</div>

</body>
</html>