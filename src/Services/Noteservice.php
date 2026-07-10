<?php

namespace Ayusinta15\GoogleKeepCli\Services;

use Ayusinta15\GoogleKeepCli\Models\Note;
use Ayusinta15\GoogleKeepCli\Repositories\NoteRepository;

class NoteService
{
    private NoteRepository $repository;
    private int $nextId = 1;

    public function __construct(NoteRepository $repository)
    {
        $this->repository = $repository;
    }

    public function createNote(string $title, string $content)
    {
        $note = new Note(
            $this->nextId,
            $title,
            $content
        );

        $this->nextId++;

        $this->repository->save($note);

        return $note;
    }

    public function getAllNotes()
    {
        return $this->repository->findAll();
    }
}