<?php

session_start();
require_once 'connect.php';

$text = $_POST['text'];
$id = $_POST['Id'];
$author = $_SESSION['user']['login'];
$date = date("Y-m-d H:i:s");


if($text != "")
    $check_login = mysqli_query($connect, "UPDATE images SET comment = '$text', author = '$author', comment_date = '$date' WHERE `id` = '$id'");
header('Location: ../index.php');