<?php
echo '5. Feladat <br><br>';

function spongCase(string $str)
{
    $str = strtolower($str);
    $str = ucfirst($str);
    $num = 1;
    for ($i = 2; $i < strlen($str); $i++) {
        if ($str[$i] != " ") {
            $num++;
        }
        if ($num % 2 == 0) {
            $str[$i] = strtoupper($str[$i]);
        }
    }
    echo $str;
}

spongCase("Hello");
echo "<br>";
spongCase("How are you?");

