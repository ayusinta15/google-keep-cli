<?php

use PHPUnit\Framework\TestCase;
use Ayusinta15\GoogleKeepCli\Models\Note;
use Ayusinta15\GoogleKeepCli\Services\NoteService;
use Ayusinta15\GoogleKeepCli\Repositories\NoteRepository;

class NoteRepositoryMockTest extends TestCase
{
    protected function tearDown(): void
    {
        \Mockery::close();
    }

    public function testCreateNoteCallsSaveMethod()
    {
    $repository = \Mockery::mock(NoteRepository::class);

    $repository
        ->shouldReceive('save')
        ->once()
        ->with(\Mockery::type(Note::class));

    $service = new NoteService($repository);

    $note = $service->createNote(
        "Tugas Pengujian",
        "Membuat fitur Google Keep"
    );

    $this->assertInstanceOf(Note::class, $note);

    $this->assertEquals(
        "Tugas Pengujian",
        $note->title
    );

    $this->assertEquals(
        "Membuat fitur Google Keep",
        $note->content
    );
    }
}