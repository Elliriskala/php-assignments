<?php
session_set_cookie_params(3600, '/', '', false, true);
session_start();

global $SITE_URL;
require_once __DIR__ . '/config/config.php';

if (!isset($_SESSION['user'])) {
    header('Location: ' . $SITE_URL . '/user.php');
    exit;
}

require_once __DIR__ . '/inc/header.php';
require_once __DIR__ . '/inc/etusivu.php';
require_once __DIR__ . '/inc/footer.php';