<?php

    $connect = mysqli_connect('localhost', 'root', '', 'testtable');

    if (!$connect) {
        die('Error connect to DataBase');
    }