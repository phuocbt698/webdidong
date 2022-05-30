<?php
    include_once  $_SERVER['DOCUMENT_ROOT'] . "/database/db_helper.php";
    session_start();
    $URL_ADMIN = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'] . '/admin';

    if (isset($_POST['submit']))
    {
        $user_email = $_POST['user_email'];
        $user_pass = md5($_POST['user_pass']);
        $sql = "SELECT tbl_user.*, tbl_role.name AS role_name FROM tbl_user 
                LEFT JOIN tbl_role ON tbl_user.role_id = tbl_role.id 
                WHERE email = '$user_email' AND password  = '$user_pass'";
        $result = executeResult($sql, 1);
        if (!empty($result))
        {
            $_SESSION['id'] = $result['id'];
            $_SESSION['name'] = $result['name'];
            $_SESSION['email'] = $result['email'];
            $_SESSION['image'] = $result['image'];
            $_SESSION['role_id'] = $result['role_id'];
            $_SESSION['role_name'] = $result['role_name'];
            header("Location:" . $URL_ADMIN);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./access/fontawesome-free-5.15.4-web/css/all.min.css">
    <link rel="stylesheet" href="./access/css/login.css">
    <title>Admin | Login</title>
</head>
<body>
    <div class="container">
        <form action="" class="form-login" autocomplete="off"  method="POST">
            <img src="./access/img/admin.jpg" alt="">
            <h1>Login</h1>
            <div class="form-text">
                <label for="user_email">
                    <i class="fas fa-user"></i>
                    User email
                </label>
                <input type="email" name="user_email" id="user_email">
            </div>
            <div class="form-text">
                <label for="user_pass">
                    <i class="fas fa-unlock-alt"></i>
                    Password
                </label>
                <input type="password" name="user_pass" id="user_pass">
            </div>
            <button type="submit" name="submit">Login</button>
        </form>
    </div>

</body>
</html>