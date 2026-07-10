<?php
use Ayusinta15\GoogleKeepCli\Repositories\NoteRepository;
use Ayusinta15\GoogleKeepCli\Services\NoteService;

require_once __DIR__ . '/vendor/autoload.php';

$repository = new NoteRepository();
$service = new NoteService($repository);

while (true) {

    echo PHP_EOL;
    echo " -- GOOGLE KEEP -- "   . PHP_EOL;

    echo "1. Add Note" . PHP_EOL;
    echo "2. View Notes" . PHP_EOL;
    echo "3. Update Note" . PHP_EOL;
    echo "4. Delete Note" . PHP_EOL;
    echo "5. Search Note" . PHP_EOL;
    echo "6. Pin Note" . PHP_EOL;
    echo "7. Archive Note" . PHP_EOL;
    echo "0. Exit" . PHP_EOL;

    $choice = readline("Choose: ");

    switch ($choice) {

        case 1:

    echo PHP_EOL . " -- Add Note -- " . PHP_EOL;

    $title = readline("Title : ");
    $content = readline("Content : ");

    $service->createNote(
        $title,
        $content
    );

    echo " Note berhasil ditambahkan!" . PHP_EOL;

    break;

                case 2:
            echo PHP_EOL . " -- View Notes -- " . PHP_EOL;

            $notes = $service->getAllNotes();

            echo "Jumlah note: " . count($notes) . PHP_EOL;

            if (empty($notes)) {
                echo "Belum ada note." . PHP_EOL;
            } else {
                foreach ($notes as $note) {
                    echo PHP_EOL;
                    echo "ID       : " . $note->id . PHP_EOL;
                    echo "Title    : " . $note->title . PHP_EOL;
                    echo "Content  : " . $note->content . PHP_EOL;
                    echo "Pinned   : " . ($note->isPinned ? "Yes" : "No") . PHP_EOL;
                    echo "Archived : " . ($note->isArchived ? "Yes" : "No") . PHP_EOL;
}
            }

            break;

        case 0:
            echo PHP_EOL . "Thank you for using Google Keep!" . PHP_EOL;
            exit;

        default:
            echo PHP_EOL . "Invalid choice!" . PHP_EOL;   
    }

    readline(PHP_EOL . "Press Enter to continue...");
}