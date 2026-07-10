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
    usort($this->notes, function ($a, $b) {

        return $b->isPinned <=> $a->isPinned;

    });

    return $this->notes;
    }

    public function update(Note $note)
    {
    foreach ($this->notes as $index => $item) {

        if ($item->id === $note->id) {
            $this->notes[$index] = $note;
            return true;
        }

    }

    return false;
    }
}