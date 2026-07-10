<?php

namespace Ayusinta15\GoogleKeepCli\Services;

use Ayusinta15\GoogleKeepCli\Models\Note;
use Ayusinta15\GoogleKeepCli\Repositories\NoteRepositoryInterface;

class NoteService
{
    private NoteRepositoryInterface $repository;

    public function __construct(NoteRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function addNote(
        string $title,
        string $content,
        bool $pinned,
        bool $archived
    ): bool {

        $note = new Note(
            null,
            $title,
            $content,
            $pinned,
            $archived
        );

        return $this->repository->add($note);
    }
}