<?php

if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}

global $DBH;
global $SITE_URL;
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../db/dbConnect.php';
require_once __DIR__ . '/../MediaProject/MediaItemDBOps.class.php';

use MediaProject\MediaItemDBOps;

$mediaItemDBOps = new MediaItemDBOps($DBH);
$mediaItems = $mediaItemDBOps->getMediaItems();

foreach ($mediaItems as $mediaItem):
    $row = $mediaItem->getMediaItem();
    ?>
    <tr>
        <td><?php echo $row['title']; ?></td>
        <td><?php echo $row['description']; ?></td>
        <td><?php echo date_format(date_create($row['created_at']), 'd.m.Y H:i'); ?></td>
        <td><?php echo $row['username']; ?></td>
        <td><img src="./uploads/<?php echo $row['filename']; ?>" alt="<?php echo $row['title']; ?>"></td>
        <td>
            <?php if ($_SESSION['user']['user_id'] == $row['user_id'] || $_SESSION['user']['user_level_id'] == 1): ?>
                <button class="modify-button" data-media_id="<?php echo $row['media_id']; ?>">Modify</button>
                <a href="<?php echo $SITE_URL; ?>/operations/deleteData.php?media_id=<?php echo $row['media_id']; ?>">Delete</a>
            <?php endif; ?>
        </td>
    </tr>
<?php endforeach; ?>
