<?php

namespace MediaProject;

class MediaItem
{
    private int $media_id;
    private int $user_id;
    private string $filename;
    private int $filesize;
    private string $media_type;
    private string $title;
    private string $description;
    private string $created_at;
    private string $username;

    public function __construct(array $data)
    {
        $this->media_id = $data['media_id'];
        $this->user_id = $data['user_id'];
        $this->filename = $data['filename'];
        $this->filesize = $data['filesize'];
        $this->media_type = $data['media_type'];
        $this->title = $data['title'];
        $this->description = $data['description'];
        $this->created_at = $data['created_at'];
        $this->username = $data['username'];
    }

    public function getMediaItem(): array
    {
        return [
            'media_id' => $this->media_id,
            'user_id' => $this->user_id,
            'filename' => $this->filename,
            'filesize' => $this->filesize,
            'media_type' => $this->media_type,
            'title' => $this->title,
            'description' => $this->description,
            'created_at' => $this->created_at,
            'username' => $this->username
        ];
    }
}