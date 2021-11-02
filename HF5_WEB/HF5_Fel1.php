<?php
if (isset($_POST['submit'])) {
    $valid_formats = array("application/pdf");
    if ((isset($_POST['firstName']) && $_POST['firstName'] !== '') && (isset($_POST['lastName']) && $_POST['lastName'] !== '') && (isset($_POST['email']) && $_POST['email'] !== '')
        && isset($_POST['attend']) && $_FILES['abstract']['error'] == 0 && $_FILES['abstract']['size'] < 1024 * 1024 * 3 && in_array($_FILES['abstract']['type'], $valid_formats)
        && isset($_POST['terms'])) {
        echo "Form submitted!<br>";
        echo "First name: " . $_POST['firstName'] . "<br>";
        echo "Last name: " . $_POST['lastName'] . "<br>";
        echo "Email: " . $_POST['email'] . "<br>";
        echo "Attend: ";
        foreach ($_POST['attend'] as $theAttend) {
            echo $theAttend . " ";
        }
        echo "<br>";
        if (isset($_POST['tshirt'])) {
            if ($_POST['tshirt'] == "P")
                echo "T-Shirt size: Not selected<br>";
            else
                echo "T-Shirt size: " . $_POST['tshirt'] . "<br>";
        }
        echo "Abstract: " . $_FILES['abstract']['name'] . "<br>";
    } else {
        echo "Unable to Submit Form!<br>";
        echo "The problem is: <br>";
        if (!(isset($_POST['firstName']) && $_POST['firstName'] !== '')) {
            echo "The First Name field is empty!<br>";
        }
        if (!(isset($_POST['lastName']) && $_POST['lastName'] !== '')) {
            echo "The Last Name field is empty!<br>";
        }
        if (!(isset($_POST['email']) && $_POST['email'] !== '')) {
            echo "The email field is empty!<br>";
        }
        if (!isset($_POST['attend'])) {
            echo "No attend selected!<br>";
        }
        if (!($_FILES['abstract']['error'] == 0)) {
            echo "Error in upload!<br>";
        }
        if (!($_FILES['abstract']['size'] < 1024 * 1024 * 3)) {
            echo "The file size is bigger than 3mb!<br>";
        }
        if (!(in_array($_FILES['abstract']['type'], $valid_formats))) {
            echo "The file is not a PDF!<br>";
        }
        if (!(isset($_POST['terms']))) {
            echo "Did not accept the terms and conditions!";
        }
    }
}
?>

<h3>Online conference registration</h3>

<form method="post" action="" ENCTYPE="multipart/form-data">
    <label for="fname"> First name:
        <input type="text" name="firstName">
    </label>
    <br><br>
    <label for="lname"> Last name:
        <input type="text" name="lastName">
    </label>
    <br><br>
    <label for="email"> E-mail:
        <input type="text" name="email">
    </label>
    <br><br>
    <label for="attend"> I will attend:<br>
        <input type="checkbox" name="attend[]" value="Event1">Event 1<br>
        <input type="checkbox" name="attend[]" value="Event2">Event2<br>
        <input type="checkbox" name="attend[]" value="Event3">Event2<br>
        <input type="checkbox" name="attend[]" value="Event4">Event3<br>
    </label>
    <br><br>
    <label for="tshirt"> What's your T-Shirt size?<br>
        <select name="tshirt">
            <option value="P">Please select</option>
            <option value="S">S</option>
            <option value="M">M</option>
            <option value="L">L</option>
            <option value="XL">XL</option>
        </select>
    </label>
    <br><br>
    <label for="abstract"> Upload your abstract<br>
        <input type="file" name="abstract"/>
    </label>
    <br><br>
    <input type="checkbox" name="terms" value="">I agree to terms & conditions.<br>
    <br><br>
    <input type="submit" name="submit" value="Send registration"/>
</form>

