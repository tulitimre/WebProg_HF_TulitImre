<?php
echo '3.Feladat<br><br>';

$napok = array(
    "HU" => array("H", "K", "Sze", "Cs", "P", "Szo", "V"),
    "EN" => array("M", "Tu", "W", "Th", "F", "Sa", "Su"),
    "DE" => array("Mo", "Di", "Mi", "Do", "F", "Sa", "So"),
);

foreach ($napok as $lang => $langDay) {
    echo "<strong>$lang: ";
    foreach ($langDay as $day) {
        echo "$day" . ((!($day === "V" || $day === "Su" || $day === "So")) ? ", " : "");
    }
    echo '</strong><br>';
}