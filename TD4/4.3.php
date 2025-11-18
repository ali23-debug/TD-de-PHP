<?php
$filename = "table.txt";
if (!file_exists($filename)) {
    die("Le fichier $filename n'existe pas.\n");
}

$lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

$erreurs = [];

foreach ($lines as $rowIndex => $line) {
    $line = trim($line);
    $parts = preg_split('/\s+/', $line);
    if ($rowIndex === 0) {
        continue;
    }

    $facteur = (int)$parts[0];
    for ($col = 1; $col < count($parts); $col++) {
        $val = (int)$parts[$col];
        $multiplicateur = $col;  
        $correct = $facteur * $multiplicateur;
        if ($val !== $correct) {
            $erreurs[] = "{$facteur}x{$multiplicateur}";
        }
    }
}

$erreurs = array_unique($erreurs);

if (count($erreurs) > 0) {
    echo "Les erreurs sont " . implode(", ", $erreurs) . "\n";
} else {
    echo "Aucune erreur trouvée.\n";
}
