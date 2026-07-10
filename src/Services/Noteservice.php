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

    public function createNote(
        string $title,
        string $content,
        bool $isPinned = false,
        bool $isArchived = false
    )
    {
        $note = new Note(
            $this->nextId,
            $title,
            $content,
            $isPinned,
            $isArchived
        );

        $this->nextId++;

        $this->repository->save($note);

        return $note;
    }

    public function getAllNotes()
    {
        return $this->repository->findAll();
    }

    public function updateNote(
    int $id,
    string $title,
    string $content,
    bool $isPinned,
    bool $isArchived
    )
    {
    $notes = $this->repository->findAll();

    foreach ($notes as $note) {

        if ($note->id === $id) {

            $note->title = $title;
            $note->content = $content;
            $note->isPinned = $isPinned;
            $note->isArchived = $isArchived;

            $this->repository->update($note);

            return $note;
        }
    }

    return null;
    }

    public function deleteNote(int $id)
    {
    return $this->repository->delete($id);
    }
}