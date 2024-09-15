<?php
session_start();

if (isset($_SESSION['user'])) {
    header('Location: index.php');
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="registr">
    <form>
        <label>Логин</label>
        <input type="text" name="login" placeholder="Введите свой логин">
        <label>Пароль</label>
        <input type="password" name="password" placeholder="Введите пароль">
        <button type="submit" class="login-btn">Войти</button>
        <p>
            Нет аккаунта? - <a href="/registration.php">Зарегистрироваться</a>.
        </p>
        <p class="msg none">Скрытое поле.</p>
        <a href="/index.php">Вернуться на главную страницу</a>
    </form>

<script src="assets/js/jquery-3.7.1.min.js"></script>
<script src="assets/js/main.js"></script>

</body>
</html>