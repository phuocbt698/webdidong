<?php
    include_once  $_SERVER['DOCUMENT_ROOT'] . "/database/db_helper.php";
?>

<?php
    $URL_ADMIN = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'] . '/admin';
    $FOLDER_ROOT = $_SERVER['DOCUMENT_ROOT'];
    $URL = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'];
    $title = ucfirst(explode('/', $_SERVER['REQUEST_URI'])[2]);
    define('URL_ADMIN', $URL_ADMIN);
    define('URL_ROOT', $URL);
    define('FOLDER_ROOT', $FOLDER_ROOT);
    define('TITLE', $title);
    //Check login
    session_start();
    if (empty($_SESSION))
    {
        header("Location:" . URL_ADMIN . '/login.php');
    }
?>

<?php
    if (isset($_GET['action']) && $_GET['action'] == 'logout')
    {
        session_unset();
        header("Location:" . URL_ADMIN . '/login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= URL_ADMIN ?>/access/fontawesome-free-5.15.4-web/css/all.min.css">
    <link rel="stylesheet" href="<?= URL_ADMIN ?>/access/css/main.css">
    <link rel="stylesheet" href="<?= URL_ADMIN ?>/access/css/dashboard.css">
    <script src = "https://code.highcharts.com"> </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
    <title>Admin | <?= ($title == '') ? 'Dashboard' : $title ?> </title>
</head>
<body>
<div class="container">
    <div class="header">
        <div class="left">
            <img src="<?= URL_ADMIN ?>/access/img/admin.jpg" alt="">
        </div>
        <div class="right">
            <div class="info-user">
                <ul class="name-user">
                    <li>Xin chào, <?= $_SESSION['name'] ?>
                        <div class="menu-user" style="z-index: 999">
                            <div class="header-menu">
                                <img src="<?= URL_ROOT . '/public/image/user/' . $_SESSION['image'] ?>" alt="">
                                <span><?= $_SESSION['name'] ?></span>
                                <span><?= $_SESSION['role_name'] ?></span>
                            </div>
                            <div class="footer-menu">
                                <a style="margin-right: 15px;" href="?action=logout">Logout</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="img-user">
                <img src="<?= URL_ROOT . '/public/image/user/' . $_SESSION['image'] ?>" alt="">
            </div>
        </div>
    </div>
    <div class="content">


