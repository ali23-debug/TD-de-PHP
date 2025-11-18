<?php

$filename = "contact.txt";

$contents = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

$newContacts = ["Alice Dupont", "John Doe", "Jean Martin"];

foreach ($newContacts as $c) {
    if (!in_array($c, $contents)) {
        file_put_contents($filename, $c . PHP_EOL, FILE_APPEND);
    }
}

echo "Mise à jour terminée.";
