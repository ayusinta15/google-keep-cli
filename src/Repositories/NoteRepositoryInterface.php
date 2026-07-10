<?php

namespace Ayusinta15\GoogleKeepCli\Repositories;

use Ayusinta15\GoogleKeepCli\Models\Note;

interface NoteRepositoryInterface
{
    public function add(Note $note): bool;

    public function getAll(): array;

    public function getById(int $id): ?Note;

    public function update(Note $note): bool;

    public function delete(int $id): bool;

    public function search(string $keyword): array;

    public function pin(int $id): bool;

    public function archive(int $id): bool;
}