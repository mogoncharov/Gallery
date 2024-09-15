<?php

session_start();
require_once 'connect.php';
require_once '../config.php';

$title = $_POST['title'];
$comment = $_POST['comment'];
$author = $_SESSION['user']['login'];
$date = date("Y-m-d H:i:s");

$error_fields = [];
$message = '';
if ($title === '') {
    $error_fields[] = 'title';
    $message = "Укажите название картинки.";
}

if (!isset($_FILES['img']) || !$_FILES['img']) {
    $error_fields[] = 'img';
    $message = "Не выбрана картинка.";
}

if(isset($_FILES['img']) && $_FILES['img']) {
    if($_FILES['img']['size'] > MAXSIZE){
        $error_fields[] = 'max_size';
        $message = "Размер файла более 20 Мб.";
    }
    if(!in_array($_FILES['img']['type'], ALLOWED_TYPES)){
        $error_fields[] = 'wrong_format';
        $message = "Неправильный формат файла.";
    }
}
if (!empty($error_fields)) {
    $response = [
        "status" => false,
        "type" => 1,
        "message" => $message,
        "fields" => $error_fields
    ];

    echo json_encode($response);

    die();
}


$path = 'uploads/' . time() . $_FILES['img']['name'];
if (!move_uploaded_file($_FILES['img']['tmp_name'], '../' . $path)) {
    $response = [
        "status" => false,
        "type" => 2,
        "message" => "Ошибка при загрузке",
    ];
    echo json_encode($response);
}

mysqli_query($connect, "INSERT INTO `images` (`id`, `title`, `comment`, `link`, `author`, `comment_date`, `date_upload`) VALUES (NULL, '$title', '$comment', '$path', '$author', '$date', '$date')");

$response = [
    "status" => true,
    "message" => "Изображение успешно загружено",
];

echo json_encode($response);