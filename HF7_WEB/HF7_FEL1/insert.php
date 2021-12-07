<?php
require_once "db.php";
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $image_temp = isset($_FILES['image']['tmp_name']) ? $_FILES['image']['tmp_name'] : "";

    if ($image_temp != "") {
        $filename = $_FILES['image']['name'];
        if (move_uploaded_file($_FILES['image']['tmp_name'], 'upload/' . $filename)) {
            $sql = "INSERT INTO products (title, price, category, image)
            VALUES ('$title', '$price', '$category', '$filename')";
            if (isset($conn)) {
                if ($conn->query($sql)) {
                    echo 'Data inserted successfully!';
                    echo "<a href='listing.php'>→Listing</a>";
                    $conn->close();
                } else {
                    echo 'Error: ' . $conn->error;
                }
            }
        } else {
            echo 'Error in uploading file - ' . $_FILES['image']['name'] . '<br/>';
        }

    } else {
        echo "Error: No image selected!";
    }
}
?>

<form method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'] ?>">
    Title:<input type="Text" name="title"><br>
    Price:<input type="Number" min="1" name="price"><br>
    Category:<input type="Text" name="category"><br>
    Image:<input type="file" name="image" accept="image/png, image/jpeg">
    <br>
    <input type="Submit" name="submit" value="ADD">
</form>
