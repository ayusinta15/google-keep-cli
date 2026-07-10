<?php

require_once __DIR__ . '/vendor/autoload.php';

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
            echo PHP_EOL . "=== Add Note ===" . PHP_EOL;
            break;

        case 2:
            echo PHP_EOL . "=== View Notes ===" . PHP_EOL;
            break;

        case 3:
            echo PHP_EOL . "=== Update Note ===" . PHP_EOL;
            break;

        case 4:
            echo PHP_EOL . "=== Delete Note ===" . PHP_EOL;
            break;

        case 5:
            echo PHP_EOL . "=== Search Note ===" . PHP_EOL;
            break;

        case 6:
            echo PHP_EOL . "=== Pin Note ===" . PHP_EOL;
            break;

        case 7:
            echo PHP_EOL . "=== Archive Note ===" . PHP_EOL;
            break;

        case 0:
            echo PHP_EOL . "Thank you for using Google Keep!" . PHP_EOL;
            exit;

        default:
            echo PHP_EOL . "Invalid choice!" . PHP_EOL;
    }

    readline(PHP_EOL . "Press Enter to continue...");
}