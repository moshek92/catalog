<?php

$for_time = time() - 1;
setcookie('rememberme_id', $user['id'], $for_time);
setcookie('rememberme_name', $user['name'], $for_time);
session_start();
session_destroy();
header('location: login.php');