<?php

namespace Ayusinta15\GoogleKeepCli\Repositories;

use Ayusinta15\GoogleKeepCli\Models\Note;

class NoteRepository
{
    private array $notes = [];

    public function save(Note $note)
    {
        $this->notes[] = $note;
    }

    public function findAll()
    {
        return $this->notes;
    }
}