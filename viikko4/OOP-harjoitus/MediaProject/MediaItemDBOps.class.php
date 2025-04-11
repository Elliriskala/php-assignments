<?php

namespace MediaProject;

require_once __DIR__ . '/MediaItem.class.php';

class MediaItemDBOps
{
    private \PDO $DBH;

    public function __construct(\PDO $DBH)
    {
        $this->DBH = $DBH;
    }

    public function getMediaItems(): array
    {
        $sql = "SELECT MediaItems.*, Users.username FROM MediaItems JOIN Users ON Users.user_id = MediaItems.user_id;";
        $STH = $this->DBH->query($sql);
        $STH->setFetchMode(\PDO::FETCH_ASSOC);
        $mediaItems = [];
        while ($row = $STH->fetch()) {
            $mediaItems[] = new MediaItem($row);
        }
        return $mediaItems;
    }

}