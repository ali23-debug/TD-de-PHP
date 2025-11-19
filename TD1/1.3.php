<?php
function generatePattern($n) {
    $result = "";
    for ($i = 1; $i <= $n; $i++) {
        $result .= str_repeat($i, $i);
        if ($i != $n) {
            $result .= "/";
        }
    }
    return $result;
}
echo generatePattern(10);  
?>