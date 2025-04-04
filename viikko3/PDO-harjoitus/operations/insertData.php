<?php
global $DBH;
require_once __DIR__ . '/../db/dbConnect.php';

if (!empty($_POST['title']) && !empty($_POST['user_id']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
    $filename = $_FILES['file']['name'];
    $filesize = $_FILES['file']['size'];
    $filetype = $_FILES['file']['type'];
    $tmp_name = $_FILES['file']['tmp_name'];
    $destination = __DIR__ . '/../uploads/' . $filename;

    $title = $_POST['title'];
    $description = $_POST['description'];
    $user_id = $_POST['user_id'];

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
    } catch (PDOException $error) {
        echo "Could not insert data from the database.";
        file_put_contents(__DIR__ . '/../logs/PDOErrors.txt', 'insertData.php - ' . $error->getMessage(), FILE_APPEND);
    }

} else {
    exit ("No file uploaded"); // tai die()
}


