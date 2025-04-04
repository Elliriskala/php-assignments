<?php
session_start();

global $DBH;
global $SITE_URL;
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/db/dbConnect.php';

if (!isset($_SESSION['user'])) {
    header('Location: ' . $SITE_URL . '/user.php');
    exit;
}

require_once __DIR__ . '/inc/header.php';
require_once __DIR__ . '/inc/etusivu.php';
require_once __DIR__ . '/inc/footer.php';