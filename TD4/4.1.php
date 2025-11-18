<?php
$eleves = [
    ["nom" => "Alice",  "notes" => [15, 14, 16]],
    ["nom" => "Bob",    "notes" => [12, 10, 11]],
    ["nom" => "Claire", "notes" => [18, 17, 16]]
];

foreach ($eleves as $eleve) {
    $nom = $eleve['nom'];
    $notes = $eleve['notes'];

    $somme = 0;
    foreach ($notes as $n) {
        $somme += $n;
    }

    $count = count($notes);
    $moyenne = $count > 0 ? $somme / $count : 0;

   
    echo $nom . " : " . number_format($moyenne, 2) . PHP_EOL;
}
