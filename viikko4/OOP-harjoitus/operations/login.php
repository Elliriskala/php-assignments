<?php
session_start();
global $DBH;
global $SITE_URL;
require_once __DIR__ . "/../config/config.php";
require_once __DIR__ . '/../db/dbConnect.php';
require_once __DIR__ . '/../MediaProject/UserDBOps.class.php';

use MediaProject\UserDBOps;

if (!empty($_POST['username']) && !empty($_POST['password'])) {
    $userOps = new UserDBOps($DBH);
    $user = $userOps->login($_POST['username'], $_POST['password']);
    if ($user) {
        $_SESSION['user'] = $user->getUser();
        // redirect to secret page
        header('Location: ' . $SITE_URL);
        exit;
    } else {
        echo 'Invalid username or password';
    }
}