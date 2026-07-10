<?php

namespace Ayusinta15\GoogleKeepCli\Repositories;

use Ayusinta15\GoogleKeepCli\Config\Database;
use Ayusinta15\GoogleKeepCli\Models\Note;
use PDO;

class NoteRepository implements NoteRepositoryInterface
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function add(Note $note): bool
    {
        $sql = "INSERT INTO notes (title, content, pinned, archived)
                VALUES (:title, :content, :pinned, :archived)";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ':title'     => $note->getTitle(),
            ':content'   => $note->getContent(),
            ':pinned'    => $note->isPinned(),
            ':archived'  => $note->isArchived()
        ]);
    }

    public function getAll(): array
    {
        return [];
    }

    public function getById(int $id): ?Note
    {
        return null;
    }

    public function update(Note $note): bool
    {
        return false;
    }

    public function delete(int $id): bool
    {
        return false;
    }

    public function search(string $keyword): array
    {
        return [];
    }

    public function pin(int $id): bool
    {
        return false;
    }

    public function archive(int $id): bool
    {
        return false;
    }
}