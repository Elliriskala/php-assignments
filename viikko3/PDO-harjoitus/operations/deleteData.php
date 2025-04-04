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

if (!empty($_GET['media_id'])) {
    // tiedoston deletointi
    $file_sql = "SELECT * FROM MediaItems WHERE media_id = :media_id";
    $delete_sql = "DELETE FROM MediaItems WHERE media_id = :media_id";

    $media_id = $_GET['media_id'];
    $data = [
        'media_id' => $media_id,
    ];

    if ($_SESSION['user']['user_level_id'] !== 1) {
        $file_sql .= " AND user_id = :user_id";
        $delete_sql .= " AND user_id = :user_id";
        $data['user_id'] = $_SESSION['user']['user_id'];
    }

    try {
        $fileSTH = $DBH->prepare($file_sql);
        $fileSTH->execute($data);

        $row = $fileSTH->fetch();

        if ($fileSTH->rowCount() > 0) {
            unlink(__DIR__ . '/../uploads/' . $row['filename']);
        };

    } catch (PDOException $e) {
        echo "Could not delete data from the database.";
        file_put_contents('PDOErrors.txt', 'deleteData.php - database delete -' . $e->getMessage(), FILE_APPEND);
    };

    try {
        $STH = $DBH->prepare($delete_sql);
        $STH->execute($data);

        if ($STH->rowCount() > 0) {
            header('Location: ' . $SITE_URL);
            exit;
        }
    } catch (PDOException $e) {
        echo "Could not delete data from the database.";
        file_put_contents('PDOErrors.txt', 'deleteData.php - ' . $e->getMessage(), FILE_APPEND);
    }
}

?>
