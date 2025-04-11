<?php
global $SITE_URL;
require_once __DIR__ . '/../config/config.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--suppress HtmlUnknownTarget -->
    <link href="./css/style.css" rel="stylesheet">
    <script src="./js/main.js" defer></script>
    <title>Media Items</title>
</head>
<body>
<div class="container">
    <header>
        <nav>
            <ul>
                <li>
                    <a href="<?php echo $SITE_URL ?>/">Home</a>
                </li>
                <li>
                    <a href="<?php echo $SITE_URL ?>/user.php">Login/Register</a>
                </li>
                <li>
                    <a href="<?php echo $SITE_URL ?>/operations/logout.php">Logout</a>
                </li>
            </ul>
        </nav>
    </header>