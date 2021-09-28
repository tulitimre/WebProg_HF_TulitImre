<?php
echo '2. Feladat <br>';

function basicOperations($num1, $num2)
{
    try {
        echo "<br>" . $num1 . "+" . $num2 . " = " . round(($num1 + $num2), 2);
        echo "<br>" . $num1 . "-" . $num2 . " = " . round(($num1 - $num2), 2);
        echo "<br>" . $num1 . "*" . $num2 . " = " . round(($num1 * $num2), 2);
        echo "<br>" . $num1 . "/" . $num2 . " = " . round(($num1 / $num2), 2);
    } catch (DivisionByZeroError $ex) {
        echo "<br>Nullával nem lehet osztani";
    }
}

basicOperations(42, 9);