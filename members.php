<?php

session_start();

if (isset($_COOKIE['rememberme_id'])) {

    if (isset($_COOKIE['rememberme_name'])) {

        $_SESSION['uid'] = $_COOKIE['rememberme_id'];
        $_SESSION['uname'] = $_COOKIE['rememberme_name'];
    }
}

if (!isset($_SESSION['uid'])) {

    header('location: login.php');
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Members only page</title>
    <meta charset="UTF-8">
</head>

<body>
    <p>Welcome, <?= $_SESSION['uname']; ?>
        <a href="logout.php">Logout</a>
    </p>
</body>

</html>