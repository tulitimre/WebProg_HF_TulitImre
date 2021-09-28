<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Fel4</title>

</head>
<body>
<?php
//4. Feladat
echo '4. Feladat <br>';

echo '<br>';
echo ' <table class="chess"><tbody>';

for ($i = 1; $i <= 8; $i++) {
    if ($i % 2 == 0) {
        echo
        '<tr>                    
                    <td class="white"></td>
                    <td class="black"></td>
                    <td class="white"></td>
                    <td class="black"></td>
                    <td class="white"></td>
                    <td class="black"></td>
                    <td class="white"></td>
                    <td class="black"></td>
                </tr>';
    } else {
        echo
        '<tr>                    
                    <td class="black"></td>
                    <td class="white"></td>
                    <td class="black"></td>
                    <td class="white"></td>
                    <td class="black"></td>
                    <td class="white"></td>
                    <td class="black"></td>
                    <td class="white"></td>
                </tr>';
    }
}
echo '</tbody></table>';
?>
</body>
</html>