<?php

global $DBH;
global $SITE_URL;
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../db/dbConnect.php';

if (!empty($_GET['media_id'])) {
    // tiedoston deletointi
    $file_sql = "SELECT * FROM MediaItems WHERE media_id = :media_id";

    $media_id = $_GET['media_id'];
    $data = array('media_id' => $media_id);

    try {
        $fileSTH = $DBH->prepare($file_sql);
        $fileSTH->execute($data);

        $row = $fileSTH->fetch();

        unlink(__DIR__ . '/../uploads/' . $row['filename']);

    } catch (PDOException $e) {
        echo "Could not delete data from the database.";
        file_put_contents('PDOErrors.txt', 'deleteData.php - database delete -' . $e->getMessage(), FILE_APPEND);
    };

    $sql = "DELETE FROM MediaItems WHERE media_id = :media_id";


    try {
        $STH = $DBH->prepare($sql);
        $STH->execute($data);

        if ($STH->rowCount() > 0) {
            header('Location: ' . $SITE_URL);
        }
    } catch (PDOException $e) {
        echo "Could not delete data from the database.";
        file_put_contents('PDOErrors.txt', 'deleteData.php - ' . $e->getMessage(), FILE_APPEND);
    }
}

?>
