<?php
session_destroy();
global $SITE_URL;
require_once __DIR__ . "/../config/config.php";
header('Location: ' . $SITE_URL . '/user.php');
