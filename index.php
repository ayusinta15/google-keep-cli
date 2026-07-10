<?php

require_once __DIR__ . '/vendor/autoload.php';

use Ayusinta15\GoogleKeepCli\Config\Database;

try {
    Database::getConnection();
    echo "Database connected successfully!";
} catch (Exception $e) {
    echo $e->getMessage();
}