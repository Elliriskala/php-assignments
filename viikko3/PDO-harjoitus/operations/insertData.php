<?php
session_start();
global $DBH;
global $SITE_URL;
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../db/dbConnect.php';

if (!isset($_SESSION['user'])) {
    header('Location: ' . $SITE_URL . '/user.php');
    exit;
}

if (!empty($_POST['title']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
    $filename = $_FILES['file']['name'];
    $filesize = $_FILES['file']['size'];
    $filetype = $_FILES['file']['type'];
    $tmp_name = $_FILES['file']['tmp_name'];
    $destination = __DIR__ . '/../uploads/' . $filename;

    $title = $_POST['title'];
    $description = $_POST['description'];
    $user_id = $_SESSION['user']['user_id'];

    // vain kuvia ja videoita
    $allowedTypes = array('image/jpeg', 'image/png', 'image/gif', 'image/webp', 'video/webm', 'video/mp4', 'video/ogg', 'video/quicktime', 'video/mov');
    if (!in_array($filetype, $allowedTypes)) {
        exit ("Invalid file type");
    }

    if (move_uploaded_file($tmp_name, $destination)) {
        echo "File uploaded successfully";
    } else {
        echo "Error uploading file";
    }

    $sql = "INSERT INTO MediaItems (filename, filesize, media_type, title, description, user_id) VALUES (:filename, :filesize, :media_type, :title, :description, :user_id)";
    $data = [
        'user_id' => $user_id,
        'filename' => $filename,
        'filesize' => $filesize,
        'media_type' => $filetype,
        'title' => $title,
        'description' => $description,
    ];

    try {
        $STH = $DBH->prepare($sql);
        $STH->execute($data);

        if ($STH->rowCount() > 0) {
            header('Location: ' . $SITE_URL);
            exit;
        }

    } catch (PDOException $error) {
        echo "Could not insert data from the database.";
        file_put_contents(__DIR__ . '/../logs/PDOErrors.txt', 'insertData.php - ' . $error->getMessage(), FILE_APPEND);
    }

} else {
    exit ("No file uploaded"); // tai die()
}


