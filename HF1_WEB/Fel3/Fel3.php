<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<?php

echo '3. Feladat <br>';

function dividingBoard()
{
    echo '<br>Osztótábla 1-10-ig';
    echo ' <table class="divdBoard"><tbody>';
    echo '<tr>';
    for ($i = 1; $i < 11; $i++) {
        echo '<td class = "column">';
        for ($j = 1; $j < 11; $j++) {
            echo "<br>" . ($i * $j) . "/" . $i . " = " . round((($i * $j) / $i), 2);
        }
        echo '</td>';
    }
    echo '</tr>';
    echo '</tbody></table>';
}

dividingBoard();
?>
</body>
</html>

