<?php

use PHPUnit\Framework\TestCase;
use Ayusinta15\GoogleKeepCli\Services\NoteService;
use Ayusinta15\GoogleKeepCli\Repositories\NoteRepository;

class NoteServiceTest extends TestCase
{
    public function test_create_note_success()
    {
    $repository = new NoteRepository();
    $service = new NoteService($repository);

    $note1 = $service->createNote(
        "Tugas Pengujian",
        "Membuat fitur Google Keep"
    );

    $note2 = $service->createNote(
        "Belajar PHPUnit",
        "Membuat unit testing"
    );

    $this->assertEquals(
        "Tugas Pengujian",
        $note1->title
    );

    $this->assertEquals(
        "Membuat fitur Google Keep",
        $note1->content
    );

    $this->assertEquals(
        "Belajar PHPUnit",
        $note2->title
    );

    $this->assertEquals(
        "Membuat unit testing",
        $note2->content
    );

    $this->assertEquals(1, $note1->id);
    $this->assertEquals(2, $note2->id);
    }


    public function test_get_all_notes_success()
    {
    $repository = new NoteRepository();

    $service = new NoteService($repository);

    $service->createNote(
        "Tugas Pengujian",
        "Membuat fitur Google Keep"
    );

    $service->createNote(
        "Belajar PHPUnit",
        "Membuat unit testing"
    );

    $notes = $service->getAllNotes();

    $this->assertCount(2, $notes);

    $this->assertEquals(
        "Tugas Pengujian",
        $notes[0]->title
    );

    $this->assertEquals(
        "Membuat fitur Google Keep",
        $notes[0]->content
    );

    $this->assertEquals(
        "Belajar PHPUnit",
        $notes[1]->title
    );

    $this->assertEquals(
        "Membuat unit testing",
        $notes[1]->content
    );
    }

    public function test_update_note_success()
    {
    $repository = new NoteRepository();
    $service = new NoteService($repository);

    $service->createNote(
        "Tugas Pengujian",
        "Membuat Google Keep CLI"
    );

    $updated = $service->updateNote(
        1,
        "Tugas Pengujian 1",
        "Membuat Google Keep CLI",
        true,
        false
    );

    $this->assertNotNull($updated);
    $this->assertEquals("Tugas Pengujian 1", $updated->title);
    $this->assertEquals("Membuat Google Keep CLI", $updated->content);
    $this->assertTrue($updated->isPinned);
    $this->assertFalse($updated->isArchived);
    }

    public function test_delete_note_success()
    {
    $repository = new NoteRepository();
    $service = new NoteService($repository);

    $service->createNote(
        "Belajar PHPUnit",
        "Membuat unit testing"
    );

    $result = $service->deleteNote(1);

    $this->assertTrue($result);
    $this->assertCount(
        0,
        $service->getAllNotes()
    );
    }

    public function test_search_note_success()
    {
    $repository = new NoteRepository();

    $service = new NoteService($repository);

    $service->createNote(
        "Tugas Pengujian",
        "Membuat fitur Google Keep"
    );

    $service->createNote(
        "Belajar PHPUnit",
        "Membuat unit testing"
    );

    $result = $service->searchNote("Google");

    $this->assertCount(1, $result);

    $this->assertEquals(
        "Tugas Pengujian",
        $result[0]->title
    );

    $this->assertEquals(
        "Membuat fitur Google Keep",
        $result[0]->content
    );
    }

    public function test_get_archived_notes_success()
    {
    $repository = new NoteRepository();

    $service = new NoteService($repository);

    $service->createNote(
        "Tugas Pengujian",
        "Membuat fitur Google Keep"
    );

    $service->createNote(
        "Belajar PHPUnit",
        "Membuat unit testing",
        false,
        true
    );

    $notes = $service->getArchivedNotes();

    $this->assertCount(1, $notes);

    $this->assertEquals(
        "Belajar PHPUnit",
        $notes[0]->title
    );
    }
}