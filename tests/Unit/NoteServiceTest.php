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

        $note = $service->createNote(
            "Tugas Pengujian",
            "Membuat fitur Google Keep"
        );

        $this->assertEquals(
            "Tugas Pengujian",
            $note->title
        );

        $this->assertEquals(
            "Membuat fitur Google Keep",
            $note->content
        );
    }


    public function test_get_all_notes_success()
    {
        $repository = new NoteRepository();

        $service = new NoteService($repository);

        $service->createNote(
            "Belajar PHP",
            "Membuat Google Keep CLI"
        );

        $notes = $service->getAllNotes();

        $this->assertCount(
            1,
            $notes
        );

        $this->assertEquals(
            "Belajar PHP",
            $notes[0]->title
        );

        $this->assertEquals(
            "Membuat Google Keep CLI",
            $notes[0]->content
        );
    }
}