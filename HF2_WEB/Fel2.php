<?php
echo '2. Feladat<br><br>';

$orszagok = array(" Magyarország " => " Budapest", " Románia" => " Bukarest", "Belgium" => "Brussels", "Austria" => "Vienna", "Poland" => "Warsaw");

foreach ($orszagok as $key => $value) {
    echo "$key fővárosa $value<br>";
}