<?php
function my_str_contains(string $haystack, string $needle): bool {
    $lenH = strlen($haystack);
    $lenN = strlen($needle);

    // si needle vide => true
    if ($lenN === 0) {
        return true;
    }

    // si needle plus long que haystack => impossible
    if ($lenN > $lenH) {
        return false;
    }

    // parcourir chaque position possible dans haystack
    for ($i = 0; $i <= $lenH - $lenN; $i++) {
        $match = true;
        for ($j = 0; $j < $lenN; $j++) {
            // utiliser isset pour éviter warnings si index non existant
            if (!isset($haystack[$i + $j]) || !isset($needle[$j]) || $haystack[$i + $j] !== $needle[$j]) {
                $match = false;
                break;
            }
        }
        if ($match) {
            return true;
        }
    }

    return false;
}

// Tests donnés dans l'énoncé
var_export(my_str_contains("hello", "hello world")); echo PHP_EOL;           // FALSE
var_export(my_str_contains("hello world", "hello")); echo PHP_EOL;          // TRUE
var_export(my_str_contains("the hello the world", "the w")); echo PHP_EOL;  // TRUE
var_export(my_str_contains("hello the world", "world")); echo PHP_EOL;      // TRUE
var_export(my_str_contains("hello the world", "world is big")); echo PHP_EOL; // FALSE
