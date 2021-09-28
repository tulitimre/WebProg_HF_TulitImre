<?php
echo '1. Feladat <br><br>';

function today()
{
    $days = [1 => "Hétfő", 2 => "Kedd", 3 => "Szerda", 4 => "Csütörtök", 5 => "Péntek", 6 => "Szombat", 7 => "Vasárnap"];
    echo "Ma " . $days[date("w")] . " van!";
}

today();