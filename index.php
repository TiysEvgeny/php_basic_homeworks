<?php
const ROOT_DIR = __DIR__;
include('config.php');

$page = (int)$_GET['page'];
switch ($page){
    case 1:
        include('files/home.php');
        break;
    case 2:
        include('files/addUser.php');
        break;
    case 3:
        include('files/catalog.php');
        break;
    case 4:
        include('files/editUser.php');
        break;
    case 5:
        include('files/addFile.php');
        break;
    default: include('files/home.php');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ДЗ6_Тийс</title>
</head>
<body>
    <ul>
        <li><a href="?page=1">Главная</a></li>
        <li><a href="?page=3">Каталог</a></li>
        <li><a href="?page=5">Файлы</a></li>
    </ul>
    <h1><?= $title?></h1>
    <div><?= $content?></div>

</body>
</html>
