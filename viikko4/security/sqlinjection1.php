<?php

global $DBH;
require_once __DIR__ . '/db/dbConnect.php';

$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);

$sql = "SELECT * FROM Users WHERE username = '$username' AND password = '$password'";
$STH = $DBH->query($sql);
$user = $STH->fetch(PDO::FETCH_ASSOC);
print_r($user);
