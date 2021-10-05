<?php
echo '1. Feladat<br><br>';

$arr = array(5, '5', '05', 12.3, '16.7', 'five', 0xDECAFBAD, '10e200');

foreach ($arr as $value) {
    echo "$value → típus: " . gettype($value) . " → Numerikus:  " . ((is_numeric($value)) ? "IGEN<br>" : "NEM<br>");
}