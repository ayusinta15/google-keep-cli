<?php

namespace Ayusinta15\GoogleKeepCli\Models;

class Note
{
    public int $id;
    public string $title;
    public string $content;
    public bool $isPinned;
    public bool $isArchived;

    public function __construct(
        int $id,
        string $title,
        string $content,
        bool $isPinned = false,
        bool $isArchived = false
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->isPinned = $isPinned;
        $this->isArchived = $isArchived;
    }
}