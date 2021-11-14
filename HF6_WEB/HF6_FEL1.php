<?php
session_start();

if (isset($_POST['elkuldott'])) {
    if (is_numeric($_POST['talalgatas']) && is_int(filter_input(INPUT_POST, 'talalgatas', FILTER_VALIDATE_INT)) && $_POST['talalgatas'] <= 10 && $_POST['talalgatas'] >= 1) {
        if (!isset($result) || !isset($_SESSION['gNum'])) {
            if (!isset($_SESSION['gNum'])) {
                general();
            }
            echo $result = check($_POST['talalgatas'], $_SESSION['gNum']);
            if (str_contains($result, "Talalt")) {
                session_destroy();
            }
        } else {
            general();
        }
    } else {
        echo "A mező értéke 1 és 10 közötti pozitív egész szám kell legyen!";
    }
}

function check($talNum, $genNum): string
{
    return $genNum > $talNum ? "A szam nagyobb, mint $talNum!" : ($genNum < $talNum ?
        "A szam kisebb, mint $talNum!" : "Talalt! A szám " . $genNum . " volt!<br> Írjon be egy számot ha szerene még játszani! ");
}

function general()
{
    $_SESSION['gNum'] = rand(1, 10);
}

?>
<form method="POST" action="HF6_FEL1.php">
    <input type="hidden" name="elkuldott" value="true">
    Melyik számra gondoltam 1 és 10 között?
    <input name="talalgatas" type="text">
    <br>
    <br>
    <input type="submit" value="Elküld">
</form>
</body>
</html>
