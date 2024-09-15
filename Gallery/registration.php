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
    <title>Регистрация</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="registr">
    <form>
        <label>Логин</label>
        <input type="text" name="login" placeholder="Введите свой логин">
        <label>Почта</label>
        <input type="email" name="email" placeholder="Введите Email">
        <label>Пароль</label>
        <input type="password" name="password" placeholder="Введите пароль">
        <label>Подтверждение пароля</label>
        <input type="password" name="password_confirm" placeholder="Подтвердите пароль">
        <button type="submit" class="register-btn">Зарегистрироваться</button>
        <p>
            Уже есть учетная запись? - <a href="/authorization.php">Авторизоваться</a>.
        </p> 
        <p class="msg none">Скрытое поле.</p>       
        <a href="/index.php">Вернуться на главную страницу</a>
    </form>
<script src="assets/js/jquery-3.7.1.min.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>