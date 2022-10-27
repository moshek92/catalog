<?php

session_start();

if (isset($_SESSION['uid']) || isset($_COOKIE['rememberme_id'])) {

    header('location: members.php');
}

$user = [
    'id' => 56,
    'name' => 'shimi',
    'email' => 'shim@gmail.com',
    'password' => '123456',
];

$error = '';
$emailRegex = "/^[\w-]+(\.[\w-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i";

if (isset($_POST['submit'])) {

    // if (empty($_POST['email']) || !preg_match($emailRegex, $_POST['email'])) {
    if (
        empty($_POST['email']) ||
        !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)
    ) {

        $error = ' * A valid email is required';
    } elseif (empty($_POST['password'])) {

        $error = ' * Password field is required';
    } elseif ($_POST['email'] != $user['email'] || $_POST['password']  != $user['password']) {

        $error = ' * Worng email/password combination';
    } else {

        if (!empty($_POST['stay'])) {

            $for_time = time() + 60 * 60 * 24 * 365;
            setcookie('rememberme_id', $user['id'], $for_time);
            setcookie('rememberme_name', $user['name'], $for_time);
        }

        $_SESSION['uid'] = $user['id'];
        $_SESSION['uname'] = $user['name'];
        header('location: members.php');
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Login page</title>
    <meta charset="UTF-8">
</head>

<body>
    <div id="signin-form-wrapper">
        <form method="post" action="" novalidate="novalidate">
            <label for="email">Email:</label>
            <br>
            <input type="email" name="email" id="email">
            <br><br>
            <label for="password">Password:</label>
            <br>
            <input type="password" name="password" id="password">
            <br><br>
            <input type="checkbox" name="stay" value="1" id="stay">
            <label for="stay">Stay connected</label>
            <br><br>
            <input type="submit" name="submit" value="Login">
            <span style="color: red;"><?= $error; ?></span>
        </form>
    </div>
</body>

</html>