<?php

namespace Ayusinta15\GoogleKeepCli\Models;

class Note
{
    private ?int $id;
    private string $title;
    private string $content;
    private bool $pinned;
    private bool $archived;
    private ?string $createdAt;

    public function __construct(
        ?int $id,
        string $title,
        string $content,
        bool $pinned = false,
        bool $archived = false,
        ?string $createdAt = null
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->pinned = $pinned;
        $this->archived = $archived;
        $this->createdAt = $createdAt;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function isPinned(): bool
    {
        return $this->pinned;
    }

    public function isArchived(): bool
    {
        return $this->archived;
    }

    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function setPinned(bool $pinned): void
    {
        $this->pinned = $pinned;
    }

    public function setArchived(bool $archived): void
    {
        $this->archived = $archived;
    }
}