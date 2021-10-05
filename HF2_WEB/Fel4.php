<?php
echo '4. Feladat<br><br>';
$szinek = array('A' => 'Kek', 'B' => 'Zold', 'c' => 'Piros');

function arrToLowerOrUpper(string $lowerOrUpper, array $arr)
{
    $lowerOrUpper = strtolower($lowerOrUpper);
    switch ($lowerOrUpper) {
        case "kisbetus":
            foreach ($arr as $key => $value) {
                $arr[$key] = strtolower($value);
            }
            return $arr;
        case "nagybetus":
            foreach ($arr as $key => $value) {
                $arr[$key] = strtoupper($value);
            }
            return $arr;
        default:
            return 'A művelet nem hajtható végre!';
    }
};

$resultArr = $szinek;
echo 'Alap: <br>';
print_r($resultArr);

$resultArr = arrToLowerOrUpper("kisbetus", $szinek);
echo '<br><br>Kisbetus: <br>';
print_r($resultArr);

$resultArr = arrToLowerOrUpper("nagybetus", $szinek);
echo '<br><br>Nagybetus: <br>';
print_r($resultArr);

$resultArr = arrToLowerOrUpper("nem jó", $szinek);
echo '<br><br>Nem jó paraméter: <br>';
print_r($resultArr);
